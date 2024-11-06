<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Logika pengecekan admin
        if (auth()->user() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        return redirect()->route('login')->with('failed', 'Akses ditolak, hanya admin yang dapat mengakses!');
    }
}

