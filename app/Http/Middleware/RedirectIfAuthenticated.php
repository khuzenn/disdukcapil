<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();
                // Redirect based on user role
                switch ($user->role) {
                    case 'admin':
                        return redirect('/admin/dashboard');
                        break;
                    case 'operator':
                        return redirect('/operator/dashboard');
                        break;
                    // Add more cases for other roles as needed
                    default:
                        return abort(403, 'Role Anda tidak sesuai dengan menu yang ingin Anda akses'); // Redirect to default route if role not defined
                        break;
                }
        }

        return $next($request);
     }
    }
}
