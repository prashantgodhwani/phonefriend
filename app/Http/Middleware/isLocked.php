<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Session;

class isLocked
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( Carbon::now()->diffInSeconds(Session::get('last_activity_at')) <= 400 ) {
            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    }
}
