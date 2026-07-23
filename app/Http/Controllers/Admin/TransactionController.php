<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role !== 'admin' && $user->organizer) {
            $eventIds = $user->organizer->events()->pluck('id');
            $transactions = Transaction::whereIn('event_id', $eventIds)
                ->with('event')
                ->latest()
                ->paginate(20);
        } else {
            $transactions = Transaction::with('event')->latest()->paginate(20);
        }

        return view('admin.transactions', compact('transactions'));
    }
}
