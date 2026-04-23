<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            // Jika request AJAX/API, return JSON error
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthorized. Admin access required.'], 403);
            }
            // Jika request Blade, redirect dengan flash message
            return redirect()->route('home')
                ->with('error', 'Akses ditolak. Anda tidak memiliki izin sebagai admin.');
        }

        return $next($request);
    }
}