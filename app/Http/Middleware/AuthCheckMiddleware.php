<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // Tambahkan ini

class AuthCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // {{ edit_1 }}
        if (!Auth::check()) { // Cek apakah pengguna sudah login
            return redirect('/login')->with('error', 'Silahkan login terlebih dahulu'); // Kembalikan respons tidak terautentikasi
        }
        // {{ edit_2 }}
        return $next($request);
    }
}
