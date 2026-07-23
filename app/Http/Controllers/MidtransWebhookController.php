<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MidtransWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $payload = $request->all();
        $orderId = $payload['order_id'] ?? null;
        $transactionStatus = $payload['transaction_status'] ?? null;
        $fraudStatus = $payload['fraud_status'] ?? null;

        if (!$orderId) {
            return response()->json(['message' => 'Invalid payload'], 400);
        }

        // Mencari ID transaksi tersebut di database lokal kita
        $transaction = Transaction::with('event')->where('order_id', $orderId)->first();

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        // Cegah proses berulang jika status sudah lunas/sukses
        if ($transaction->status === 'settlement' || $transaction->status === 'success') {
            return response()->json(['message' => 'Already processed']);
        }

        // Logika Penerjemahan Status Midtrans API & Pengembalian Stok Tiket
        if ($transactionStatus == 'capture') {
            if ($fraudStatus == 'challenge') {
                $transaction->status = 'challenge';
            } else if ($fraudStatus == 'accept') {
                $transaction->status = 'success';
            }
        } else if ($transactionStatus == 'settlement') {
            $transaction->status = 'settlement';
        } else if (in_array($transactionStatus, ['cancel', 'deny', 'expire'])) {
            // --- LOGIKA PELEPASAN STOK TIKET (RELEASE RESERVED TICKET) ---
            // Jika pembayaran kadaluarsa/dibatalkan, kembalikan stok (+1) agar dapat direbut pembeli lain
            if ($transaction->status === 'pending') {
                DB::transaction(function () use ($transaction) {
                    if ($transaction->event) {
                        $transaction->event->increment('stock');
                    }
                    $transaction->status = 'expire';
                });
            } else {
                $transaction->status = 'failed';
            }
        } else if ($transactionStatus == 'pending') {
            $transaction->status = 'pending';
        }

        $transaction->save();
        return response()->json(['message' => 'OK']);
    }
}
