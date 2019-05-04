<?php

namespace App\Http\Middleware;

use App\Phone;
use Closure;
use Gloudemans\Shoppingcart\Facades\Cart;

class AllAvailable
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
        foreach(Cart::content() as $product) {
            if (Phone::find($product->id)->units_rem > 0) {
                $flag = 0;
            } elseif (Phone::find($product->id)->units_rem == 0) {
                $flag = 1;
            }
        }
            if ($flag == 1) {
                \request()->session()->flash('alert', 'Remove Out of Stock Items from Cart to Checkout.');
                return redirect('/cart');
            } else
                return $next($request);
        }
}
