<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if (!in_array(auth()->user()->role, $roles)) {

            dd([
                'login_as' => auth()->user()->email,
                'role_user' => auth()->user()->role,
                'role_yang_dibutuhkan' => $roles,
                'url' => request()->url()
            ]);

        }

        return $next($request);
    }
}