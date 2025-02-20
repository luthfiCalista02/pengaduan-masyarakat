<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PegawaiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $level)
    {
        if (!Auth::guard('pegawais')->check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil user yang sedang login
        $user = Auth::guard('pegawais')->user();

        // Cek apakah level pengguna sesuai dengan yang diminta
        if ($user->level !== $level) {
            return redirect('/dashboard_' . strtolower($user->level))->with('error', 'Anda tidak memiliki akses.');
        }

        return $next($request);
    }
}
