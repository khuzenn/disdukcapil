<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class OperatorMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 'operator') {
            return $next($request);
        }

        return redirect('/'); // Redirect to home or other appropriate page
    }
}
