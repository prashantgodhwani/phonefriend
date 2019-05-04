<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Session;

class LastActivity
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
        if ( Carbon::now()->diffInSeconds(Session::get('last_activity_at')) >= 1500 ) {
            return redirect()->route('admin.locked');
        }

        return $next($request);
    }
}
