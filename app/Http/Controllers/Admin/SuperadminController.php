<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organizer;
use App\Models\Transaction;
use Illuminate\Http\Request;

class SuperadminController extends Controller
{
    /**
     * Menampilkan daftar pengawasan seluruh penyelenggara (Organisasi/HIMA) oleh Superadmin.
     */
    public function index()
    {
        $organizers = Organizer::with('user', 'events')->latest()->get();

        $totalPlatformRevenue = Transaction::whereIn('status', ['settlement', 'success'])->sum('total_price');
        $totalOrganizers = $organizers->count();
        $pendingCount = $organizers->where('status', 'pending')->count();

        return view('admin.organizers.index', compact(
            'organizers',
            'totalPlatformRevenue',
            'totalOrganizers',
            'pendingCount'
        ));
    }

    /**
     * Memperbarui status kelayakan/verifikasi penyelenggara.
     */
    public function updateStatus(Request $request, Organizer $organizer)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $organizer->update([
            'status' => $request->status,
            'is_verified' => $request->status === 'approved',
        ]);

        return back()->with('success', 'Status kelayakan organisasi ' . $organizer->name . ' berhasil diperbarui.');
    }
}
