<?php

namespace App\Http\Middleware;

use App\Phone;
use Closure;
use Illuminate\Support\Facades\Auth;

class UcanAccess
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
        if(Auth::user()->id==$request->phone->user_id)
            return $next($request);
        else
            return redirect()->route('phones.show');
    }
}
