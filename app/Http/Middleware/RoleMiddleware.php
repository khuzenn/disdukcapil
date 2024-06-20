<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$role)
    {
        $user = Auth::user();

        // Jika pengguna adalah admin, izinkan akses ke semua rute
        if ($user->role === 'admin') {
            return $next($request);
        } 

        // Jika pengguna tidak sesuai dengan peran yang diperlukan, tolak akses
        if ($request->user()->role !== $role) {
            abort(403, 'Role anda tidak sesuai dengan menu yang ingin anda akses');
        }

        return $next($request);
    }
}
