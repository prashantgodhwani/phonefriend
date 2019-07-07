@extends('layouts.other')

@section('content')
    <script>
        gtag('event', 'conversion', {'send_to': 'AW-801041161/raLiCIGHqoUBEInW-_0C'});
    </script>
    <style>
        @media (min-width: 768px) {
            .success-icon {
                padding-left: 29%;
                height: 354px;
            }
        }
        @media (max-width: 554px) {
            .success-icon{
                padding-left: 0;
            }
        }
    </style>
    <div id="content" class="site-content" tabindex="-1">
        <div class="container">

            <nav class="woocommerce-breadcrumb"><a href="/">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Checkout</nav>

            <div >
                <main id="main" class="site-main">
                    <article class="page type-page status-publish hentry">
                        <header class="entry-header">
                            <h1 itemprop="name" class="entry-title">Order placed Successfully.</h1>
                            <h4>#{{$order_id}}</h4>
                        </header><!-- .entry-header -->

                        <div class="col-md-12">
                            <div class="row">
                                <img src="https://cdn.dribbble.com/users/159981/screenshots/2112264/checkmark.gif" class="success-icon">
                            </div>
                            <div class="row">
                                <div id="map" class="col-md-6"><iframe src="https://maps.google.com/maps?&q={{$order->state}}&output=embed" width="100%" height="200" frameborder="0" style="border:0" ></iframe></div>
                                <div class="woocommerce-checkout-review-order imagex col-md-6" id="order_review">
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
                                                    <span class="amount"><i class="fa fa-inr"></i> &nbsp;{{$product->subtotal}}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>

                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span class="amount"><i class="fa fa-inr"></i> &nbsp; {{Cart::subtotal()}}</span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Shipping</th>
                                            <td data-title="Shipping"><span class="amount"><i class="fa fa-inr"></i>  {{number_format($shipping,2) }}</span> <input type="hidden" class="shipping_method" value="international_delivery" id="shipping_method_0" data-index="0" name="shipping_method[0]"></td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td><strong><span class="amount"><i class="fa fa-inr"></i> &nbsp;{{number_format((int)str_replace(",", "", Cart::subtotal()) + $shipping, 2)}}</span></strong> </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <div class="badge stamp" style="top: 67%;
    left: 69%;"><img src="https://phonefriend.in/images/phonefriend-logo.png" style="height:71px; transform: rotate(-14deg);"></div>
                                </div>

                            </div>
                            <h3 style="text-align: center;padding-top: 5%;">Thank you {{ucwords($order->deliver_fname)}} !</h3>
                            <br><br><br><br>
                            <div class="row">
                                <b><a href="{{route('store.all')}}">Buy more products? Head back to Store</a></b>
                            </div>
                        </div>
                    </article>
                    {{Cart::destroy()}}
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection


@section('scripts')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
@endsection


