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
     * @param  string  $role
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        // Jika pengguna adalah admin, izinkan akses ke semua rute
        if ($user->role === 'admin') {
            return $next($request);
        } 

        // Jika pengguna adalah operator
        if ($role === 'operator') {
            // Periksa apakah pengguna memiliki loket_id
            if (!$user->loket_id) {
                abort(403, 'Anda tidak memiliki akses ke loket manapun');
            }
        }

        // Jika pengguna tidak sesuai dengan peran yang diperlukan, tolak akses
        if ($request->user()->role !== $role) {
            abort(403, 'Role Anda tidak sesuai dengan menu yang ingin Anda akses');
        }

        return $next($request);
    }
}
