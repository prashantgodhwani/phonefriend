<?php

namespace App\Http\Middleware;

use Closure;

class ifotp
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
        if(session()->get('onthep')){
            return $next($request);
        }else{
            return redirect()->route('home');
        }
    }
}
