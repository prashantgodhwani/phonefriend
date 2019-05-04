<?php

namespace App\Http\Middleware;

use App\Phone;
use Closure;

class isAvailable
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

        if(Phone::findOrFail($request->id)->units_rem==0)
        {
            return redirect()->route('store.all');
        }
        else
            return $next($request);
    }
}
