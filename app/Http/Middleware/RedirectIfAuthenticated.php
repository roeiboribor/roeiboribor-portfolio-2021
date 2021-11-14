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
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect($this->redirectTo());
            }
        }

        return $next($request);
    }


    /**
     * This is connected to AuthenticatedSessionController
     *
     * @return void
     */
    private function redirectTo()
    {
        $role = auth()->user()->role;

        switch ($role) {
            case "super":
                return '/dashboard';
                break;
            default:
                return '/dashboard';
                break;
        }
    }
}
