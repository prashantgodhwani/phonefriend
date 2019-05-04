@extends('layouts.other')

@section('content')
    <div id="content" class="site-content" tabindex="-1">
        <div class="container">

            <nav class="woocommerce-breadcrumb"><a href="home.html">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Checkout</nav>

            <div >
                <main id="main" class="site-main">
                    <article class="page type-page status-publish hentry">
                        <header class="entry-header"><h1 itemprop="name" class="entry-title">Checkout</h1></header><!-- .entry-header -->

                   <div class="col-md-12">
                       @include('layouts.success')
                       <div class="row">
                           <img src="http://www.freeiconspng.com/uploads/alert-icon--free-icons-24.png" style="padding-left: 35%;height: 354px;" class="img img-responsive">
                       </div>
                       <div class="row">
                           <h3 style="padding-left: 15%;">{{('Your Order with transaction number')}}<b> #{{$order_id}}</b> has failed.</h3><br><br>
                           <div class="woocommerce-checkout-review-order imagex" id="order_review">
                           <table class="shop_table woocommerce-checkout-review-order-table">
                               <thead>
                               <tr>
                                   <th class="product-name">Product</th>
                                   <th class="product-total">Total</th>
                               </tr>
                               </thead>
                               <tbody>
                               @foreach(Cart::content() as $product)
                                   <tr class="cart_item">
                                       <td class="product-name">
                                           {{$product->name}}&nbsp;
                                           <strong class="product-quantity">× {{$product->qty}}</strong>													</td>
                                       <td class="product-total">
                                           <span class="amount">{{$product->subtotal}}</span>
                                       </td>
                                   </tr>
                               @endforeach
                               </tbody>
                               <tfoot>

                               <tr class="cart-subtotal">
                                   <th>Subtotal</th>
                                   <td><span class="amount">{{Cart::subtotal()}}</span></td>
                               </tr>

                               <tr class="shipping">
                                   <th>Shipping</th>
                                   <td data-title="Shipping">Flat Rate: <span class="amount">$300.00</span> <input type="hidden" class="shipping_method" value="international_delivery" id="shipping_method_0" data-index="0" name="shipping_method[0]"></td>
                               </tr>

                               <tr class="order-total">
                                   <th>Total</th>
                                   <td><strong><span class="amount">{{Cart::subtotal()}}</span></strong> </td>
                               </tr>
                               </tfoot>
                           </table>
                           </div>

                       </div><br><br><br><br>
                       <div class="row">
                           <b><a href="{{route('store.all')}}">Buy more products? Head back to Store</a></b>
                       </div>
                   </div>
                    </article>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection


@section('scripts')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
@endsection


