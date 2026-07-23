<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil semua event terbaru dari database beserta kategori & penyelenggara
        $events = Event::with('category', 'organizer')->latest()->get();

        return view('welcome', compact('events'));
    }
}
