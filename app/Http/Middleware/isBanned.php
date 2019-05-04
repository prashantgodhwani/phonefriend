<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->banned) {
                auth()->logout();
                return redirect()->route('login')->with('warning', 'We have banned your account due to suspicious activities.');
            }
            return $next($request);
        } else {
            return $next($request);
        }

    }
}
