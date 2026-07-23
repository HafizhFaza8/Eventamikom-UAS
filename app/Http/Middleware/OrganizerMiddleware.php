<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user || ($user->role !== 'organizer' && $user->role !== 'admin')) {
            return redirect()->route('organizer.register')->with('error', 'Silakan daftar akun Kepanitiaan/HIMA terlebih dahulu.');
        }

        return $next($request);
    }
}
