@extends('layouts.master')

@section('content')
    <style>
        /* Tooltip container */
        .tooltip {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted black; /* If you want dots under the hoverable text */
            opacity: 100 !important;
            font-family: inherit;
        }

        /* Tooltip text */
        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: black;
            color: #fff;
            text-align: center;
            padding: 5px 0;
            border-radius: 6px;
            opacity: 100 !important;

            /* Position the tooltip text - see examples below! */
            position: absolute;
            z-index: 1;
        }

        /* Show the tooltip text when you mouse over the tooltip container */
        .tooltip:hover .tooltiptext {
            visibility: visible;
        }
        .loading-bg {background: #44444473;top: 0;bottom: 0;left: 0;right: 0;margin: 0px auto;z-index: 9;position: fixed;}
        .loader{border:16px solid #f3f3f3;border-radius:50%;border-top:16px solid #3498db;width:150px;height:150px;-webkit-animation:spin 2s linear infinite;animation:spin 2s linear infinite;position:absolute;left:0;right:0;margin:0px auto;top:50%;}
        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
    <!-- loader start -->
    <div class="loading-bg" style="display: none;">
        <div class="loader"></div>
    </div>
    <!-- loader end -->

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

            <nav class="woocommerce-breadcrumb"><a href="home.html">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Checkout</nav>

            <div >
                <main id="main" class="site-main">
                    <article class="page type-page status-publish hentry">
                        <header class="entry-header"><h1 itemprop="name" class="entry-title">Checkout</h1></header><!-- .entry-header -->

                        <form enctype="multipart/form-data" id="productform" action="{{route('order.create')}}" class="checkout woocommerce-checkout" method="post" name="checkout" autocomplete="off">
                            {{csrf_field()}}
                            @include('layouts.error')
                            <div id="customer_details" class="col2-set" style="margin-bottom: 5%">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="woocommerce-billing-fields">

                                        <h3>Shipping Details</h3>

                                        <p id="billing_first_name_field" class="form-row form-row form-row-first validate-required"><label class="" for="billing_first_name">First Name <abbr title="required" class="required">*</abbr></label><input type="text" value="" data-validation="required" placeholder="" id="billing_first_name" name="deliver_fname" class="input-text " required></p>

                                        <p id="billing_last_name_field" class="form-row form-row form-row-last validate-required"><label class="" for="billing_last_name">Last Name <abbr title="required" class="required">*</abbr></label><input type="text" value="" data-validation="required" placeholder="" id="billing_last_name" name="deliver_lname" class="input-text " required></p><div class="clear"></div>

                                        <p id="billing_phone_field" class="form-row-wide validate-required validate-phone"><label class="" for="billing_phone">Phone <abbr title="required" class="required">*</abbr></label><input type="number" data-validation="number,length"  placeholder="" id="deliver_phone" name="deliver_phone" data-validation-length="10-10" class="input-text" required></p><div class="clear"></div>

                                        <p id="billing_address_1_field" class="form-row form-row form-row-wide address-field validate-required"><label class="" for="billing_address_1">Address <abbr title="required" class="required">*</abbr></label><input type="text" data-validation="required" value="" placeholder="House number / Street address" id="billing_address_1" name="deliver_add1" class="input-text " required></p>

                                        <p id="billing_address_2_field" class="form-row form-row form-row-wide address-field"><input type="text" value="" placeholder="Landmark (optional)" id="billing_address_2" name="deliver_add2" class="input-text "></p>

                                        <!-- 	<p id="billing_postcode_field" class="form-row form-row form-row-first address-field validate-postcode validate-required" data-o_class="form-row form-row form-row-last address-field validate-required validate-postcode"><label class="" for="billing_postcode">Postcode / ZIP <abbr title="required" class="required">*</abbr></label><input type="text" data-validation="required" value="" placeholder="" id="billing_postcode" name="postcode" class="input-text " autocomplete="false" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></p> -->

                                        <p id="billing_postcode_field" class="form-row form-row form-row-first address-field validate-postcode validate-required" data-o_class="form-row form-row form-row-last address-field validate-required validate-postcode"><label class="" for="billing_postcode">Postcode / ZIP <abbr title="required" class="required">*</abbr></label><input type="text" data-validation="required" value="" placeholder="" id="billing_postcode" name="postcode" class="input-text " onkeyup="getCityState()" autocomplete="false" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></p>
                                    <!--


									<p id="billing_state_field" class="form-row form-row form-row-first validate-required validate-email">
										<label class="" for="billing_state">State / County <abbr title="required" class="required">*</abbr></label>
										<select class="input-text selectt select2-selection" name="billing_state" id="billing_state" data-validation="required" style="width: 100%">
											<option value="">Select State</option>
											@foreach($states as $state)
                                        <option value="{{$state->state}}">{{$state->state}}</option>
											@endforeach
                                            </select></p>

                                            <p id="billing_city_field" class="form-row form-row form-row-last address-field validate-required" data-o_class="form-row form-row form-row-wide address-field validate-required" id="loadcity"><label class="" for="billing_city">Town / City <abbr title="required" class="required">*</abbr></label>
                                                <select class="input-text selectt select2-selection" name="deliver_cityid" id="city" data-validation="required" style="width: 100%">
                                                    <option value="">Select City</option>
@foreach($cities as $city)
                                        <option value="{{$city->city_id}}">{{$city->city_name}}</option>
												@endforeach
                                            </select></p>  -->


                                        <p id="billing_state_field" class="form-row form-row form-row-first validate-required validate-email">
                                            <label class="" for="billing_state">State / County <abbr title="required" class="required">*</abbr></label>
                                            <input type="text" name="billing_state" id="billing_state" data-validation="required" style="width: 100%" readonly="readonly">
                                        </p>

                                        <p id="billing_city_field1" class="form-row form-row form-row-last address-field validate-required" data-o_class="form-row form-row form-row-wide address-field validate-required" id="loadcity"><label class="" for="billing_city">Town / City <abbr title="required" class="required">*</abbr></label>
                                            <input type="text" name="deliver_cityid" id="city1" style="width: 100%" value="" >
                                            <br/>NOTE:- if you are unable to get your city then you can edit or enter it manually.
                                        </p>


                                    <!-- <p id="billing_city_field" class="form-row form-row form-row-last address-field validate-required" data-o_class="form-row form-row form-row-wide address-field validate-required" id="loadcity"><label class="" for="billing_city">Town / City <abbr title="required" class="required">*</abbr></label>
                                            <select class="input-text selectt select2-selection" name="deliver_cityid" id="city" data-validation="required" style="width: 100%">
                                                <option value="">Select City</option>
                                                @foreach($cities as $city)
                                        <option value="{{$city->city_id}}">{{$city->city_name}}</option>
                                                @endforeach
                                            </select></p>

                                        -->
                                        <div class="clear"></div>

                                    </div>
                                </div>

                            </div><br>

                            <br/><!---NOTE:- Get minimum 30 days warranty as standard on all products ..
To extend warranty on your product please write us at support@phonefeiend.in or call 8574763333.-->

                            <div class="woocommerce-checkout-review-order col-md-10 col-md-offset-1" id="order_review">
                                <h3 id="order_review_heading col-md-offset-1">Your order</h3>
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
                                            </td>
                                            <td class="product-total">
                                                <span class="amount"><i class="fa fa-inr"></i> &nbsp;{{number_format($product->subtotal,2)}}</span>
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
                                        <td data-title="Shipping"><span class="amount"><i class="fa fa-inr"></i> {{number_format($shipping,2) }}</span> <input type="hidden" class="shipping_method" value="international_delivery" id="shipping_method_0" data-index="0" name="shipping_method[0]"></td>
                                    </tr>
                                    @if(Session::has('coupon'))
                                        <tr class="shipping">
                                            <th>Discount</th>
                                            <td data-title="Shipping"><span class="amount"><i class="fa fa-inr"></i> {{ Session::get('coupon_value') }}</span> <input type="hidden" class="shipping_method" value="international_delivery" id="shipping_method_0" data-index="0" name="shipping_method[0]"></td>
                                        </tr>
                                    @endif
                                    <tr class="order-total">
                                        <th>
                                            Total
                                            <div class="couponbutton clearfix" id="couponsavebutton" style="display: none;">
                                                <div class="copybtn text-center font-weight-bold" id="copybtn">PREPAID OFF</div>
                                            </div>
                                        </th>
                                        <td><strong><span class="amount" id="amount"><i class="fa fa-inr"></i> &nbsp;
                        @if(Session::has('coupon'))
                                                        {{ number_format(number_unformat(Cart::subtotal())-(Session::get('coupon_value')) + $shipping, 2)}}
                                                    @else
                                                        {{number_format(number_unformat(Cart::subtotal()) + $shipping, 2)}}
                                                    @endif
                    </span></strong> </td>
                                    </tr>
                                    </tfoot>
                                </table>

                                <div class="woocommerce-checkout-payment" id="payment">
                                    <ul class="wc_payment_methods payment_methods methods">

                                        <li class="wc_payment_method payment_method_cod">
                                            <input type="radio" data-order_button_text="" value="cod"  data-validation="required" name="payment_method" class="input-radio" id="payment_method_cod">

                                            <label for="payment_method_cod">Pay &nbsp;<span style="color:green; font-weight: bold;"><i class="fa fa-inr"></i>{{number_format(number_unformat(Cart::subtotal()) + $shipping, 2)}}</span>&nbsp; at Cash on Delivery</label>
                                        </li>
                                        <li class="wc_payment_method payment_method_paypal">
                                            <input type="radio" data-order_button_text="Proceed to PayPal" value="ccdc" name="payment_method" class="input-radio" id="payment_method_paypal">

                                            <label for="payment_method_paypal">Pay &nbsp;<span style="color:green; font-weight: bold;"><i class="fa fa-inr"></i>{{number_format((number_unformat(Cart::subtotal()) + $shipping) - (((number_unformat(Cart::subtotal()) + $shipping) * 1.5) / 100),2) }}</span>&nbsp; by Credit / Debit Card  / Net Banking / EMI</span>
                                                <img alt="Credit Card / Debit Card" src="http://www.fa.ufl.edu/wp-content/uploads/cardops/Credit-Card-Logos.jpg"></label>
                                        </li>
                                        </li>
                                    </ul>
                                    <div class="form-row place-order">
                                        <input type="submit" data-value="Place order" value="Place order" class="button alt">
                                    </div>
                                </div>
                        </form>
                    </article>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .container -->
    </div><!-- #content -->
@endsection


@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // $(document).on('change', '#billing_state', function () {
            // 	var state = $('#billing_state').val();

            // 	$.ajax({
            // 		type: 'post',
            // 		headers: {
            // 			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // 		},
            // 		url: '{!!URL::to('/apis/getstate')!!}',
            // 		data: {'state': state},
            // 		success: function (data) {

            // 			$("#billing_city_field").html(data);
            // 		},
            // 		error: function () {

            // 		}
            // 	});
            // // });
        });
    </script>
    <script>
        // $("#city").select2({
        // 	theme: "classic",
        // 	width: 'resolve'
        // });
    </script>

    <script>
        $.validate();
    </script>

    <script>
        function getCityState(){
            var pincode = $('#billing_postcode').val();
            pincode = pincode.toString();
            if(pincode.length == 6){
                $('.loading-bg').show();
                var url = "{{URL('/api/get-city-state/')}}";
                var api = url+'/'+pincode;
                $.ajax({
                    url: api,
                    type: 'GET',
                    success:function(data){
                        $('.loading-bg').hide();
                        var data = JSON.parse(data);
                        if(data.length == 0){
                            alert('Invalid Pin code');
                            $('#billing_postcode').val('');
                            $('#billing_postcode').focus();
                            $('#billing_state').val('');
                            $('#city1').val('');
                        }else{
                            var postdata = data[0];
                            $('#billing_state').val(postdata.circle);
                            $('#city1').val(postdata.division);
                            $('#city1').focus();
                            // $.ajax({
                            // 	type: 'post',
                            // 	headers: {
                            // 		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            // 	},
                            // 	url: '{!!URL::to('/apis/getstate')!!}',
                            // 	data: {'state': postdata.State,'city': postdata.District},
                            // 	success: function (res) {
                            // 		console.log(res);
                            // 		$("#billing_city_field").html(res);
                            // 	},
                            // 	error: function () {

                            // 	}
                            // });
                        }
                    }
                })
            }
        }
    </script>
    <script>
        $(document).on("change","input[type=radio]",function(){
            var url = "{{URL('/api/isEligibleForDiscount/')}}";
            var payment_mode = $('[name="payment_method"]:checked').val();
            $.ajax({
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                data: {
                    'payment_mode': payment_mode,
                    'cart' : '{!! Cart::content()!!}'
                },
                success: function (res) {
                    let subttl = res.data.subtotal;
                    let ttl = res.data.total;
                    if(res.data.discount !== 0.0) {
                        document.getElementById("couponsavebutton").style.display="block";
                        span = document.getElementById("amount");
                        span.innerHTML = "<del style='color:grey'><i class='fa fa-inr'></i>&nbsp;"+ttl+"</del> &nbsp; <span style='color:green;text-weight:bold;'> <i class=\"fa fa-inr\"></i>&nbsp;" + Math.round(subttl * 100) / 100 + "&nbsp;<span class=\"label label-success\">You save  <i class=\"fa fa-inr\"></i> &nbsp;"+ Math.round(res.data.discount * 100) / 100 +"</span>\n";
                    }else{
                        document.getElementById("couponsavebutton").style.display="none";
                        span = document.getElementById("amount");
                        span.innerHTML = "<span id=\"amount\" class=\"amount\"><i class=\"fa fa-inr\"></i> &nbsp;"+ttl;
                    }
                },
                error: function () {

                }
            });
        });

    </script>
@endsection


