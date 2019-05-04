<?php

namespace App\Http\Middleware;

use Closure;

class isSold
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
        if($request->phone->units_rem == 0)
            return redirect()->route('phones.show');
        else
        return $next($request);
    }
}
