<?php

namespace App\Http\Middleware;

use Closure;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartHasItems
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
        if(Cart::count() === 0) {
            \request()->session()->flash('status', 'Please add items to cart and try again');
            return redirect('/cart');
        }else
             return $next($request);
    }
}
