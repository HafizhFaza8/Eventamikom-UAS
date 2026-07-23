<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display Tenant-Scoped Revenue Analytics and Event Management Dashboard.
     */
    public function index()
    {
        $user = Auth::user();
        $organizer = $user->organizer;

        if ($organizer) {
            $eventIds = $organizer->events()->pluck('id');
            $events = $organizer->events()->with('category', 'reviews')->latest()->get();
        } else {
            // Superadmin atau Admin Legacy
            $eventIds = Event::pluck('id');
            $events = Event::with('category', 'reviews')->latest()->get();
        }

        // 1. Analitik Pendapatan Mandiri (Khusus Organisasi Ini)
        $totalRevenue = Transaction::whereIn('event_id', $eventIds)
            ->whereIn('status', ['settlement', 'success'])
            ->sum('total_price');

        // 2. Tiket Terjual
        $ticketsSold = Transaction::whereIn('event_id', $eventIds)
            ->whereIn('status', ['settlement', 'success'])
            ->count();

        // 3. Jumlah Event Aktif
        $activeEvents = $events->where('date', '>=', now())->count();

        // 4. Transaksi Terbaru untuk Event Organisasi Ini
        $recentTransactions = Transaction::whereIn('event_id', $eventIds)
            ->with('event')
            ->latest()
            ->take(5)
            ->get();

        return view('organizer.dashboard', compact(
            'organizer',
            'events',
            'totalRevenue',
            'ticketsSold',
            'activeEvents',
            'recentTransactions'
        ));
    }
}
