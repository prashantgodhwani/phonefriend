@extends('layouts.master')

@section('content')

    <?php

    function number_unformat($number, $force_number = true, $dec_point = '.', $thousands_sep = ',') {
        if ($force_number) {
            $number = preg_replace('/^[^\d]+/', '', $number);
        } else if (preg_match('/^[^\d]+/', $number)) {
            return false;
        }
        $type = (strpos($number, $dec_point) === false) ? 'int' : 'float';
        $number = str_replace(array($dec_point, $thousands_sep), array('.', ''), $number);
        settype($number, $type);
        return $number;
    }

    ?>
    <div id="content" class="site-content" tabindex="-1">
        <div class="container">

            <nav class="woocommerce-breadcrumb" id="cartmain"><a href="https://phonefriend.in">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Cart</nav>
            @include('layouts.success')
            <div class="content-area">
                <main id="main" class="site-main" autofocus>
                    <article class="page type-page status-publish hentry">
                        <header class="entry-header"><h1 itemprop="name" class="entry-title">Cart</h1></header><!-- .entry-header -->

                        @if(Cart::count() === 0)
                            <img src="{{asset('images/empty-cart.jpg')}}" class="img img-responsive" style="width:80% ; padding-left:20%">
                            @include('layouts.error')
                        @else



                            <table class="shop_table shop_table_responsive cart">
                                <thead>
                                <tr>
                                    <th class="product-remove">&nbsp;</th>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <!-- <th class="product-price">Color</th> -->
                                    <!-- <th class="product-quantity">Quantity</th>-->
                                    <th class="product-subtotal">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php //echo'<pre>'; print_r(Cart::content()); die;?>
                                @foreach(Cart::content() as $product)

                                    <tr class="cart_item" id="{{$product->rowId}}">
                                        <td class="product-remove">
                                    <span class="remove" data-cartid="{{$product->rowId}}" style="color: #e61010;
                                    font-weight: bold;
                                    font-size: 26px; cursor: pointer;">×</span>
                                        </td>

                                        <td class="product-thumbnail">
                                            <a href='https://phonefriend.in/store/show/{{\App\Phone::find($product->id)->id}}/{{str_slug(\App\Phone::find($product->id)->data->company." ".\App\Phone::find($product->id)->data->model." ".\App\Phone::find($product->id)->data->storage." GB", "-")}}#mobileView'><img width="180" height="180" src="https://www.phonefriend.in/storage{{str_replace("public", "", \App\Phone::find($product->id)->photos->first()->filename)}}" alt=""></a>
                                        </td>

                                        <td data-title="Product" class="product-name">
                                            <a href='https://phonefriend.in/store/show/{{\App\Phone::find($product->id)->id}}/{{str_slug(\App\Phone::find($product->id)->data->company." ".\App\Phone::find($product->id)->data->model." ".\App\Phone::find($product->id)->data->storage." GB", "-")}}#mobileView'>{{$product->name}}</a><br>
                                            @if(\App\Phone::find($product->id)->units_rem > 10)
                                                <b> <span style="color:green;font-size: 12px;">AVAILABLE</span></b>
                                            @elseif(\App\Phone::find($product->id)->units_rem <= 10 && \App\Phone::find($product->id)->units_rem != 0)
                                                <b> <span style="color:orange;font-size: 12px;">FEW PIECES LEFT</span></b>
                                            @elseif(\App\Phone::find($product->id)->units_rem <= 0)
                                                <b> <span style="color:darkred;font-size: 12px;">OUT OF STOCK</span></b>
                                            @endif |
                                            <span class="offer" onclick="clickHandler(this);" id="{{$product->id}}" style="color:green; font-weight: bold; font-size: 12px; cursor:pointer;" >&nbsp; 1 Offer Available &nbsp <i class="fa fa-info-circle "></i> </span>
                                            <div id="popover_content_wrapper_{{$product->id}}" style="display: none">
                                                <div class="_2h52bo">
                                                    <div class="_3m0XII">
                                                        <div id="couponsavebutton" class="couponbutton clearfix" style="display: block; width:100%"><div id="copybtn" class="copybtn text-center font-weight-bold ">PREPAID OFF</div></div>
                                                        <div class="Qvjl-4">
                                                            <div class="_2Ag0gA row">
                                                                <div class="Booz7F col-md-6">MRP</div>
                                                                <div class="_1USjzt _1OrWRU col-md-6"><i class="fa fa-inr"></i>&nbsp; {{number_format(\App\Phone::find($product->id)->data->price,2)}}</div>
                                                            </div>
                                                            <div class="_2Ag0gA row">
                                                                <div class="Booz7F col-md-6">Selling Price</div>
                                                                <div class="_1USjzt col-md-6"><i class="fa fa-inr"></i>&nbsp; {{number_format($product->price,2)}}</div>
                                                            </div>
                                                            <div class="_2Ag0gA row">
                                                                <div class="Booz7F col-md-6">Extra Discount</div>
                                                                <div class="_1USjzt npPxF6 col-md-6">− <i class="fa fa-inr"></i>&nbsp; {{number_format(($product->price * 1.5) / 100,2)}}</div>
                                                            </div>
                                                            <div class="_2Ag0gA row">
                                                                <div class="Booz7F col-md-6">Special Price</div>
                                                                <div class="_1USjzt col-md-6"><i class="fa fa-inr"></i>&nbsp; {{number_format(($product->price - (($product->price * 1.5) / 100)),2)}}</div>
                                                            </div>
                                                            <div class="_1wkosQ row" style="padding-bottom: 6px;">
                                                                <div class="_2Ag0gA">
                                                                    <div class="Booz7F wVKMrh col-md-6">Total</div>
                                                                    <div class="_1USjzt wVKMrh col-md-6"><i class="fa fa-inr"></i>&nbsp; {{number_format(($product->price - (($product->price * 1.5) / 100)),2)}}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="_2DlcOv" style="text-align: center;">
                                                            <span class="wyVy-B">Save more with these offers</span>
                                                            <div class="_1_sTAg" style="    font-size: 12px;
    font-weight: 600;">Extra 1.5% off* with all Online Payment methods.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td data-title="Price" class="product-price">
                                            <span class="price"><i class="fa fa-inr"></i>&nbsp; {{number_format($product->price,2)}}</span>
                                        </td>
                                    <!-- <td data-title="Price" class="product-price">
                                    {{$product->options->color}}</span>
                                </td> -->

                                    <!-- <td data-title="Quantity" class="product-quantity">
                                        <div class="quantity buttons_added"><input type="button" data-cartid="{{$product->rowId}}" class="minus" value="-">
                                            <label>Quantity:</label>
                                            <input type="number" id="number" size="4" class="input-text qty text" title="Qty" value="{{$product->qty}}" max="10" min="0" step="1">
                                            <input type="button" class="plus" data-cartid="{{$product->rowId}}" value="+">
                                        </div>
                                    </td>
                                -->

                                        <td data-title="Total" class="product-subtotal">
                                            <span class="amount"><i class="fa fa-inr"></i> &nbsp;{{number_format($product->subtotal,2)}}</span>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td class="actions" colspan="6">
                                        @if(Session::has('coupon'))
                                            <div class="coupon">
                                                <p>Copupon <b>{{Session::get('coupon') }}</b> is applied. &nbsp;
                                                    &nbsp; &nbsp; <a href="{{URL('/remove-coupon/'.Session::get('coupon'))}}"><i class="fa fa-times"></i></a>
                                                </p>
                                                @if(Session::has('success'))
                                                    <div class="alert alert-success">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        {{ Session::get('success')}}
                                                    </div>
                                                @endif
                                            </div>
                                        @else
                                            <form action="{{URL('/apply-coupon')}}" accept-charset="UTF-8" class="row" name="applyCouponForm" id="applyCouponForm" method="post">
                                                {{csrf_field()}}
                                                <div class="coupon">
                                                    <label for="coupon_code">Coupon:</label> <input type="text" placeholder="Coupon code" value="" id="coupon_code" class="input-text" name="coupon_code">

                                                    <button type="submit"  name="apply_coupon" class="button">Apply Coupon</button>
                                                    @if(Session::has('success'))
                                                        <div class="alert alert-success">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                            {{ Session::get('success')}}
                                                        </div>
                                                    @endif
                                                    @if(Session::has('error'))
                                                        <div class="alert alert-danger">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                            {{ Session::get('error')}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </form>
                                        @endif

                                        <div class="wc-proceed-to-checkout">

                                            <a class="checkout-button button alt wc-forward" href="{{route('checkout')}}">Proceed to Checkout</a>
                                        </div>

                                        <input type="hidden" value="1eafc42c5e" name="_wpnonce" id="_wpnonce"><input type="hidden" value="/electro/cart/" name="_wp_http_referer">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="cart-collaterals">

                                <div class="cart_totals ">

                                    <h2>Cart Totals</h2>

                                    <table class="shop_table shop_table_responsive">

                                        <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td data-title="Subtotal"><i class="fa fa-inr"></i> <span class="sub">&nbsp;{{Cart::subtotal()}}</span></td>
                                        </tr>


                                        <tr class="shipping">
                                            <th>Shipping</th>
                                            <td data-title="Shipping"><i class="fa fa-inr"></i> <span class="shp">&nbsp;{{number_format($shipping, 2)}}</span> <input type="hidden" class="shipping_method" value="international_delivery" id="shipping_method_0" data-index="0" name="shipping_method[0]">


                                            </td>
                                        </tr>
                                        @if(Session::has('coupon'))
                                            <tr class="shipping">
                                                <th>Discount</th>
                                                <td data-title="Shipping"><i class="fa fa-inr"></i> <span class="amount">{{ Session::get('coupon_value') }}</span> <input type="hidden" class="shipping_method" value="international_delivery" id="shipping_method_0" data-index="0" name="shipping_method[0]">


                                                </td>
                                            </tr>
                                        @endif

                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td data-title="Total"><strong><span class="tamt"><i class="fa fa-inr"></i> &nbsp;
                                          @if(Session::has('coupon'))
                                                            {{ number_unformat(Cart::subtotal())-(Session::get('coupon_value'))}}
                                                        @else
                                                            {{number_format(number_unformat(Cart::subtotal()) + $shipping, 2)}}
                                                        @endif
                                      </span></strong> </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        @endif
                    </article>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection


@section('scripts')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script type="text/javascript">
        window.onload = function(e){
            ///document.getElementById('cartmain').focus();
            window.location.hash = '#cartmain';
        }
        $(document).ready(function(){

            $(document).on('click','.plus',function() {
                var cartid = $(this).attr("data-cartid");
                var value = $('#'+cartid).find('#number').val();
                value = isNaN(value) ? 0 : value;
                if (value < 10) {
                    value++;

                    $('#'+cartid).find('#number').val(value);
                    $.ajax({
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '{!!URL::to('/apis/updatecart')!!}',
                        data: {'cartid': cartid, 'value': value},
                        success: function (data) {
                            $('#'+cartid).find('.amount').text(data.subtotal);
                            $.ajax({
                                type: 'post',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url: '{!!URL::to('/apis/updatetotal')!!}',
                                success: function (data) {
                                    $('.sub').text(data);
                                    $('.tamt').text(data);

                                },
                                error: function () {

                                }
                            });
                        },
                        error: function () {

                        }
                    });
                }
            })
        });
        $(document).ready(function() {
            $(document).on('click', '.minus', function () {
                var cartid = $(this).attr("data-cartid");
                var value = $('#'+cartid).find('#number').val();
                value = isNaN(value) ? 0 : value;
                if (value > 1) {
                    value--;
                    var cartid = $(this).attr("data-cartid");
                    $('#'+cartid).find('#number').val(value);
                    $.ajax({
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '{!!URL::to('/apis/updatecart')!!}',
                        data: {'cartid': cartid, 'value': value},
                        success: function (data) {
                            $('#'+cartid).find('.amount').text(data.subtotal);
                            $.ajax({
                                type: 'post',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url: '{!!URL::to('/apis/updatetotal')!!}',
                                success: function (data) {
                                    $('.sub').text(data);
                                    $('.tamt').text(data);
                                },
                                error: function () {

                                }
                            });
                        },
                        error: function () {

                        }
                    });
                }
            })
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){

            $(document).on('click','.remove',function(){
                var cartid = $(this).attr("data-cartid");
                var op=" ";
                console.log(cartid);
                $.ajax({
                    type:'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:'{!!URL::to('/apis/removecart')!!}',
                    data:{'cartid':cartid},
                    success:function(data){
                        $('#'+cartid).fadeOut(300, function() { $(this).remove(); });
                        $.ajax({
                            type: 'post',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: '{!!URL::to('/apis/updatetotal')!!}',
                            success: function (data) {
                                $('.sub').text(data.cartTotal);
                                $('.tamt').text(data.cartTotal);
                                $('.shp').text(data.shippingCharges);
                            },
                            error: function () {

                            }
                        });
                    },
                    error:function(){

                    }
                });
            });

            $("button[name=apply_coupon]").click((e) => {
                e.preventDefault();
            if($('#coupon_code').val() == ""){
                alert('Please Enter Coupon Code');
            }else{
                $("#applyCouponForm").submit();
                // $.ajax({
                //     type: "POST",
                //     url: $("#applyCouponForm").attr("action"),
                //     data: $("#applyCouponForm").serialize(),
                //     success: (data) => {
                //         if(data){
                //             $("#coupon_section").html(`<p>Copupon <b>$`+('#coupon_code').val()+`</b> is applied. &nbsp;
                //                 &nbsp; &nbsp; <i class="fa fa-times" onclick="removeCoupon();"></i></p>`);
                //         }else{
                //             alert('Something Went Wrong');
                //         }
                //     }
                // });
            }
        });

        });


        $('body').on('click', function (e) {
            $('.offer').each(function () {
                // hide any open popovers when the anywhere else in the body is clicked
                if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                    $(this).popover('destroy');
                }
            });
        });
        function clickHandler(object){
            $('.offer').popover({
                placement: 'auto right',
                trigger: 'manual',
                html : true,
                content: function() {
                    return $('#popover_content_wrapper_'+object.id).html();

                }
            }).popover("show");
        }
    </script>


@endsection


