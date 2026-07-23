<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Review;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Menyimpan ulasan & penilaian bintang dari peserta.
     */
    public function store(Request $request, Event $event)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:5|max:1000',
            'customer_name' => Auth::check() ? 'nullable|string|max:255' : 'required|string|max:255',
            'customer_email' => Auth::check() ? 'nullable|email|max:255' : 'required|email|max:255',
        ]);

        $name = Auth::check() ? Auth::user()->name : $request->customer_name;
        $email = Auth::check() ? Auth::user()->email : $request->customer_email;

        // Cek apakah user sudah pernah memberi ulasan untuk event ini
        $existingReview = Review::where('event_id', $event->id)
            ->where(function ($query) use ($email) {
                if (Auth::check()) {
                    $query->where('user_id', Auth::id())->orWhere('customer_email', $email);
                } else {
                    $query->where('customer_email', $email);
                }
            })->first();

        if ($existingReview) {
            return back()->with('error', 'Anda sudah memberikan ulasan untuk acara ini sebelumnya.');
        }

        Review::create([
            'event_id' => $event->id,
            'user_id' => Auth::id(),
            'customer_name' => $name,
            'customer_email' => $email,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'organizer_name' => 'ABP Productions',
        ]);

        return back()->with('success', 'Terima kasih! Penilaian & testimoni Anda berhasil disimpan.');
    }

    /**
     * Menampilkan Halaman Profil Penyelenggara (Organizer Profile) & Rekam Jejak Penilaian.
     */
    public function showOrganizer($organizer_name = 'ABP Productions')
    {
        $organizerName = urldecode($organizer_name);
        $categories = Category::all();

        // Mengambil semua ulasan untuk penyelenggara ini
        $reviews = Review::with('event')
            ->where('organizer_name', $organizerName)
            ->latest()
            ->get();

        // Mengambil semua event penyelenggara ini
        $events = Event::with('reviews')->latest()->get();

        $totalReviews = $reviews->count();
        $averageRating = $totalReviews > 0 ? round($reviews->avg('rating'), 1) : 4.9;

        // Hitung distribusi bintang (5, 4, 3, 2, 1)
        $ratingBreakdown = [];
        for ($i = 5; $i >= 1; $i--) {
            $count = $reviews->where('rating', $i)->count();
            $percentage = $totalReviews > 0 ? round(($count / $totalReviews) * 100) : ($i === 5 ? 85 : 15);
            $ratingBreakdown[$i] = [
                'count' => $count,
                'percentage' => $percentage,
            ];
        }

        return view('organizer.show', compact(
            'organizerName',
            'reviews',
            'events',
            'totalReviews',
            'averageRating',
            'ratingBreakdown',
            'categories'
        ));
    }
}
