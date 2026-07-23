<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    // Method untuk katalog / halaman utama event
    public function index()
    {
        $events = Event::with('category', 'organizer')->latest()->get();

        return view('welcome', compact('events'));
    }

    // Method untuk melihat detail event dinamis
    public function show(Request $request, $id = null)
    {
        $targetId = $id ?: $request->query('id');

        if ($targetId) {
            $event = Event::with('reviews', 'category', 'organizer')->find($targetId);
        }

        if (empty($event)) {
            $event = Event::with('reviews', 'category', 'organizer')->first();
        }

        $reviews = $event ? $event->reviews()->latest()->get() : collect();

        return view('detail-event', compact('event', 'reviews'));
    }

    public function checkout()
    {
        $event = Event::first();

        return redirect()->route('checkout.create', $event->id);
    }
}
