<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLoketAccess
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Ambil loket ID dari user yang sedang login
        $loketId = $user->loket_id;

        // Jika user tidak memiliki loket ID atau tidak memiliki akses ke loket
        if (!$loketId) {
            return response()->json(['message' => 'Anda tidak memiliki akses ke loket manapun'], 403);
        }

        // Lakukan pengecekan akses berdasarkan loket ID atau loket yang sedang dioperasikan

        return $next($request);
    }
}
