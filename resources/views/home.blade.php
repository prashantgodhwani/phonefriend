@extends('layouts.other')

@section('meta')
    <meta name="google-site-verification" content="9WYKJcqAcjJhjbevMcfLfpdijZXhyb79nIORBkfMAEs"/>
    <title>Phone Friend | Second Hand Smartphone store in Delhi NCR</title>
    <meta name="description"
          content="Buy refurbished, box opened and certified pre owned mobile phones online in India with huge discounts, 1 year warranty, free shipping, and COD. Phone repair service in delhi."/>
@endsection

@section('content')
    <style>
        .loading-bg {
            background: #44444473;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: 0px auto;
            z-index: 9;
            position: fixed;
        }

        .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 150px;
            height: 150px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
            position: absolute;
            left: 0;
            right: 0;
            margin: 0px auto;
            top: 50%;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        color: #e85561;
        font-size: 12 px;
        }

        .modal {
            text-align: center;
            padding: 0 !important;
        }

        .toast__svg {
            fill: #fff;
        }

        .product_disc {
            border: 1px solid #b5b5b5;
            background: #fff;
            display: inline-block;
            font-size: 10px;
            color: #b5b5b5;
            padding: 5px;
            border-radius: 1px;
            margin-top: -4px;
        }

        .toast {
            text-align: left;
            padding: 21px 0;
            background-color: #fff;
            border-radius: 4px;
            max-width: 500px;
            top: 0px;
            position: relative;
            box-shadow: 1px 7px 14px -5px rgba(0, 0, 0, 0.2);
        }


        .toast:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;

        }

        .toast__type {
            color: #e85561;;
            font-weight: 700;
            margin-top: 0;
            font-family: 'Raleway', sans-serif;
            margin-bottom: 8px;
            font-size: 17px;
        }

        .toast__icon {
            position: absolute;
            top: 49%;
            left: 4px;
            transform: translateY(-50%);
            width: 21%;
            padding: 7px;
            border-radius: 50%;
            display: inline-block;
        }

        .toast__message {
            margin-top: 0;
            font-family: 'Raleway', sans-serif;
            margin-bottom: 0;
            color: #878787;
        }

        .toast__content {
            padding-left: 70px;
            padding-right: 60px;
            text-align: center;
            font-family: 'Raleway', sans-serif;
        }

        .toast__close {
            position: absolute;
            right: 22px;
            top: 50%;
            width: 14px;
            cursor: pointer;
            height: 14px;
            fill: #878787;
            transform: translateY(-50%);
        }


        .toast--green:before {
            background-color: #77b43f;;
        }

        .modal:before {
            content: '';
            display: inline-block;
            height: 100%;
            vertical-align: middle;
            margin-right: -4px;
        }

        .modal-dialog {
            display: inline-block;
            text-align: left;
            vertical-align: middle;
        }

        .popup-body .title {
            font-size: 90px;
            line-height: 100px;
            display: block;
            color: #f6f6f6;
            text-transform: uppercase;
            margin: 0;
            font-family: "Montserrat", sans-serif;
            font-weight: 700;
            position: relative;
        }

        .popup-body .txt {
            display: block;
            font-size: 18px;
            line-height: 21px;
            margin: 0 0 47px;
            color: #757575;
            font-weight: bold;
        }

        .modal-backdrop {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1040;
            background-color: #000;
        }

        .popup-body .form-control {
            border-radius: 5px;
            padding: 7px;
            width: 100%;
            height: 47px;
            -webkit-box-shadow: none;
            box-shadow: none;
            border-radius: 25px;
            border: none;
            outline: none;
            /* font-size: 14px; */
            /* line-height: 16px; */
            padding: 11px 10px 10px 22px;
            /* margin: 0 0 8px; */
            background: #f2f2f2;
            color: #757575;
        }

        .cutoff {
            text-decoration: line-through;
            color: #3c3c3c;
            font-size: 0.6em;
            line-height: 1.5em;
        }

        @media only screen and (max-width: 600px) {
            .popup-body .title {
                font-size: 50px;
            }

            .font {
                font-size: 10px
            }

            .product_disc {
                padding: 0px;
            }

            .product_disc .font {
                font-size: 9px
            }

            .show-nav .h1 {
                font-size: 1.4em;
            }
        }

        .grey {
            color: grey;
        }

        .green {
            color: #eb0;
        }

        .popup-content {
            border: 0px;
        }

        .popup-body {
            padding: 0px;
            padding-right: 15px;
        }

        .rating {
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
            height: 1em;
            line-height: 1;
            font-size: 1em;
            width: 5.5em;
            font-family: 'star';
        }

        .back-stars {
            display: flex;
            color: #808080;
            position: relative;
        }

        .front-stars {
            display: flex;
            color: #eb0;
            overflow: hidden;
            position: absolute;
            top: 0;
        }

        .fa-star {
            margin-right: 3px;
        }
    </style>
    <!-- loader start -->
    <div class="loading-bg" style="display: none;">
        <div class="loader"></div>
    </div>

    <!-- loader end -->
    <div id="content" class="site-content" tabindex="-1">

        <ul class="rslides">
            <li><img src="assets/images/slider/banner-1.jpg" alt="" class="img img-responsive"></li>
            <li><img src="assets/images/slider/banner-10.jpg" alt=""></li>
            <li><img src="assets/images/slider/banner-11.jpg" alt=""></li>
            <li><img src="assets/images/slider/banner-12.jpg" alt=""></li>
            <li><img src="assets/images/slider/banner-3.jpg" alt=""></li>
            <li><img src="assets/images/slider/banner-2.jpg" alt=""></li>
            <li><img src="images/banner-1.jpg" alt="" class="img img-responsive"></li>
        </ul>

        <section class="products-with-category-image container" style="margin-top: 4%; margin-bottom: 0;">
            <header class="show-nav" style="margin-bottom: 0">
                <h2 class="h1">Best Selling Smartphones</h2>

            </header>
        </section>
        @if(!Jenssegers\Agent\Facades\Agent::isMobile())
            <section class="products-with-category-image">
                <div class="container">
                    <div class="products-with-category-image-inner">

                        <div class="products-block">
                            <div class="woocommerce columns-3">
                                <ul data-view="grid" data-toggle="regular-products"
                                    class="products columns-3 columns__wide--4">

                                    @foreach($bestseller as $phone)

                                        <li class="product product-card bestselling-card">

                                            <div class="product-outer" style="height: 215px;">
                                                <div class="media product-inner" style="    padding: 0.786em 1.429em;">

                                                    <a class="media-left"
                                                       href="https://phonefriend.in/store/show/{{$phone->id}}/{{str_slug($phone->data->company." ".$phone->data->model." ".$phone->data->storage." GB", "-")}}#mobileView"
                                                       title="Pendrive USB 3.0 Flash 64 GB">
                                                        <img class="media-object wp-post-image img-responsive"
                                                             src="https://www.phonefriend.in/storage/{{str_replace("public", "", $phone->dp)}}"
                                                             alt="{{ucwords($phone->data->company)}} {{$phone->data->model}} - {{$phone->data->storage}} GB second hand phone at phonefriend"
                                                             title="{{ucwords($phone->data->company)}} {{$phone->data->model}} - {{$phone->data->storage}} GB">
                                                    </a>

                                                    <div class="media-body">
														 <span class="loop-product-categories">
                                                                        <a href="/store" rel="tag">Best Selling</a>
                                                                    </span>

                                                        <a href="https://phonefriend.in/store/show/{{$phone->id}}/{{str_slug($phone->data->company." ".$phone->data->model." ".$phone->data->storage." GB", "-")}}#mobileView">
                                                            <h3>{{ucwords($phone->data->company)}} {{$phone->data->model}}
                                                                - {{$phone->data->storage}} GB</h3>
                                                        </a>

                                                        <div class="price-add-to-cart">
                                                            <div style="margin-bottom: -3px;font-size: 16px;">

                                                                @if($phone->rating > 0)

                                                                    <div class="rating col-md-5"
                                                                         title="{{($phone->rating / 5) * 100}}%">
                                                                        <div class="back-stars">
                                                                            <span class="fa fa-star"
                                                                                  aria-hidden="true"></span>
                                                                            <span class="fa fa-star"
                                                                                  aria-hidden="true"></span>
                                                                            <span class="fa fa-star"
                                                                                  aria-hidden="true"></span>
                                                                            <span class="fa fa-star"
                                                                                  aria-hidden="true"></span>
                                                                            <span class="fa fa-star"
                                                                                  aria-hidden="true"></span>

                                                                            <div class="front-stars"
                                                                                 style="width: {{($phone->rating / 5) * 100}}%">
                                                                                <span class="fa fa-star"
                                                                                      aria-hidden="true"></span>
                                                                                <span class="fa fa-star"
                                                                                      aria-hidden="true"></span>
                                                                                <span class="fa fa-star"
                                                                                      aria-hidden="true"></span>
                                                                                <span class="fa fa-star"
                                                                                      aria-hidden="true"></span>
                                                                                <span class="fa fa-star"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                @else
                                                                    <div class="product_disc"><b class="font">NEW
                                                                            ARRIVAL</b></div>
                                                                @endif
                                                            </div>
                                                            <span class="price">
                                                                            <span class="electro-price">
                                                                                <ins><span class="woocommerce-Price-amount amount"><i
                                                                                                class="fa fa-inr"></i> {{number_format($phone->price, 0) }}</span></ins>&nbsp;
                                                        <span class="woocommerce-Price-amount amount cutoff"><i
                                                                    class="fa fa-inr"></i>{{number_format($phone->data->price,0)}}</span><br>

                                                                            </span>
                                                                        </span>

                                                            <a href="https://phonefriend.in/store/show/{{$phone->id}}/{{str_slug($phone->data->company." ".$phone->data->model." ".$phone->data->storage." GB", "-")}}#mobileView"
                                                               class="button add_to_cart_button">Add to cart</a>
                                                        </div><!-- /.price-add-to-cart -->

                                                    </div>
                                                </div><!-- /.product-inner -->
                                            </div><!-- /.product-outer -->

                                        </li><!-- /.products -->
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section class="products-carousel-tabs animate-in-view fadeIn animated" data-animation="fadeIn">
                <div class="container">
                    <div class="tab-content">


                        <div role="tabpanel" class="tab-pane active" id="grid-extended" aria-expanded="true">

                            <ul class="products columns-3">
                                @foreach($bestseller as $phone)
                                    <li class="product col-md-4 ">
                                        <div class="product-outer">
                                            <div class="product-inner highlight">
                                                <span class="onsale">BEST SELLING<i class="icon-check-sign"></i></span>

                                                <a href='https://phonefriend.in/store/show/{{$phone->id}}/{{str_slug($phone->data->company." ".$phone->data->model." ".$phone->data->storage." GB", "-")}}#mobileView'>

                                                    <h3 class="">{{ucwords($phone->data->company)}} {{$phone->data->model}}
                                                        - {{$phone->data->storage}} GB</h3>
                                                    <div class="product-thumbnail" style="">

                                                        <img class="img img-responsive lazyload"
                                                             src="https://www.phonefriend.in/storage/{{str_replace("public", "", $phone->dp)}}"
                                                             alt="{{ucwords($phone->data->company)}} {{$phone->data->model}} - {{$phone->data->storage}} GB second hand phone at phonefriend"
                                                             title="{{ucwords($phone->data->company)}} {{$phone->data->model}} - {{$phone->data->storage}} GB">

                                                        <span class="sale pad" style="display: none"
                                                              data-toggle="tooltip" title="Price Marked Down"><b>{{round((($phone->data->price - $phone->price) / $phone->data->price )*100)}} %</b><br><span
                                                                    style="    font-size: 10px;">OFF</span></span><br>
                                                    </div>
                                                </a>
                                                <h3 class="">{{ucwords($phone->data->company)}} {{$phone->data->model}}
                                                    - {{$phone->data->storage}} GB</h3>


                                                <div class="price-add-to-cart"
                                                     style="padding-top: 5%; padding-bottom: 5%; margin-bottom: 1%">

                                                    <div style="margin-bottom: -3px;font-size: 16px;">

                                                        @if($phone->rating > 0)

                                                            <div class="rating col-md-5"
                                                                 title="{{($phone->rating / 5) * 100}}%">
                                                                <div class="back-stars">
                                                                    <span class="fa fa-star" aria-hidden="true"></span>
                                                                    <span class="fa fa-star" aria-hidden="true"></span>
                                                                    <span class="fa fa-star" aria-hidden="true"></span>
                                                                    <span class="fa fa-star" aria-hidden="true"></span>
                                                                    <span class="fa fa-star" aria-hidden="true"></span>

                                                                    <div class="front-stars"
                                                                         style="width: {{($phone->rating / 5) * 100}}%">
                                                                        <span class="fa fa-star"
                                                                              aria-hidden="true"></span>
                                                                        <span class="fa fa-star"
                                                                              aria-hidden="true"></span>
                                                                        <span class="fa fa-star"
                                                                              aria-hidden="true"></span>
                                                                        <span class="fa fa-star"
                                                                              aria-hidden="true"></span>
                                                                        <span class="fa fa-star"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @if(!Jenssegers\Agent\Facades\Agent::isMobile())
                                                                <div class="col-md-4" style="    display: inline-block;
        padding-left: 7px; padding-right : 0px;
        bottom: 4px;"><span class="grey font" style="display: inline;">{{$phone->rating}} / <b>5.0</b></span>
                                                                </div>@endif

                                                        @else
                                                            <div class="product_disc"><b class="font">NEW ARRIVAL</b>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <span class="price">
                                                <span class="electro-price">
                                                    <ins><span class="amount"><i class="fa fa-inr"></i> {{number_format($phone->price, 0) }}</span></ins>&nbsp;
                                                    <del class=""><span class="amount "><i class="fa fa-inr"></i>{{number_format($phone->data->price,0)}}</span></del><br>

                                                </span>
                                            </span>
                                                <!--  <a rel="nofollow" href='https://phonefriend.in/store/show/{{$phone->id}}/{{str_slug($phone->data->company." ".$phone->data->model." ".$phone->data->storage." GB", "-")}}' class="button add_to_cart_button pull-right">Add to cart</a>-->
                                                </div><!-- /.price-add-to-cart -->

{{--                                                <div class="hover-area" style=" display: block !important;--}}
{{--                                        padding-top: 0.214em !important;--}}
{{--                                        border-top: 1px solid #eaeaea !important;">--}}
{{--                                                    <div class="action-buttons" style="    font-weight: bold;--}}
{{--                                        color: #949494;">--}}
{{--                                                        @if(Auth::check())--}}
{{--                                                            @if(Auth::user()->role == 2)--}}
{{--                                                                <?php $phoneColor = explode(',', $phone->color); ?>--}}
{{--                                                                <?php if($phone->units_rem){?><a--}}
{{--                                                                        href="{{URL('/phone/purchase/'.$phone->id.'/'.str_slug($phone->data->company.' '.$phone->data->model.' '.$phone->data->storage.' GB', '-').'/'.$phoneColor[0])}}"><b--}}
{{--                                                                            class="buynow" style=" /*background-color:#72BAD1;--}}
{{--                                        border: none;*/--}}
{{--                                        color: rgb(93, 96, 184);--}}
{{--                                        padding: 10px 20px;--}}
{{--                                        text-align: center;--}}
{{--                                        text-decoration: none;--}}
{{--                                        display: inline-block;--}}
{{--                                        font-size: 14px;--}}
{{--                                        margin: 4px 2px;--}}
{{--                                        cursor: pointer;"><i class="fa fa-shopping-cart" aria-hidden="true"></i>--}}
{{--                                                                        &nbsp;Buy Now</b></a><?php }--}}
{{--                                                                else{?>--}}
{{--                                                                <div>Out of Stock</div><?php } ?>--}}
{{--                                                            @endif--}}
{{--                                                        @else--}}
{{--                                                            <?php $phoneColor = explode(',', $phone->color); ?>--}}
{{--                                                            <?php if($phone->units_rem){?><a--}}
{{--                                                                    href='https://phonefriend.in/store/show/{{$phone->id}}/{{str_slug($phone->data->company." ".$phone->data->model." ".$phone->data->storage." GB", "-")}}#mobileView'>--}}
{{--                                                                <b class="buynow" style="border-radius: 0%; /*background-color:rgb(93, 96, 184);--}}
{{--                                        border: none;*/--}}
{{--                                        color: #e85561;--}}
{{--                                        padding: 9px;--}}
{{--                                        text-align: center;--}}
{{--                                        text-decoration: none;--}}
{{--                                        display: inline-block;--}}
{{--                                        font-size: 14px;--}}
{{--                                        margin: 4px 2px;--}}
{{--                                        cursor: pointer;"><i class="fa fa-shopping-cart" aria-hidden="true"></i>--}}
{{--                                                                    &nbsp; Buy Now</b></a><?php }--}}
{{--                                                            else{?>--}}
{{--                                                            <div>Out of Stock</div><?php } ?>--}}
{{--                                                        @endif--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
                                            </div><!-- /.product-inner -->
                                        </div><!-- /.product-outer -->
                                    </li>
                                @endforeach

                            </ul>
                        </div>


                    </div>
                </div>
            </section><!-- /.products-carousel-tabs -->
        @endif

        <section class="home-categories-block full-width">
            <div class="container">
                <header>
                    <h2 class="h1">Shop by Brand</h2>
                </header>
                <div class="categories-block columns-5">
                    <ul class="categories">
                        @foreach($brands as $brand)
                            <li class="category">
                                <div class="category-inner">
                                    <a href="{{route('store.all',[$brand->company])}}">
                                        @if($brand->company == "apple")
                                            <div class="media-img"><img
                                                        src="https://image.flaticon.com/icons/png/512/23/23656.png"
                                                        sizes="(max-width: 300px) "></div>
                                        @elseif($brand->company == "samsung")
                                            <div class="media-img"><img src="{{asset('images/5ed902c9-a40a.jpg')}}"
                                                                        sizes="(max-width: 300px) "></div>
                                        @elseif($brand->company == "honor")
                                            <div class="media-img"><img src="{{asset('images/honor.png')}}"
                                                                        sizes="(max-width: 300px) "></div>
                                        @elseif($brand->company == "lenovo")
                                            <div class="media-img"><img src="{{asset('images/lenovo.jpg')}}"
                                                                        sizes="(max-width: 300px) "></div>
                                        @elseif($brand->company == "oneplus")
                                            <div class="media-img"><img src="{{asset('images/oneplus.jpg')}}"
                                                                        sizes="(max-width: 300px) "></div>
                                        @elseif($brand->company == "mi")
                                            <div class="media-img"><img src="{{asset('images/mi.jpg')}}"
                                                                        sizes="(max-width: 300px) "></div>
                                        @elseif($brand->company == "google")
                                            <div class="media-img"><img src="{{asset('images/google.jpg')}}"
                                                                        sizes="(max-width: 300px) "></div>
                                        @elseif($brand->company == "vivo")
                                            <div class="media-img"><img src="{{asset('images/vivo.png')}}"
                                                                        sizes="(max-width: 300px) "></div>
                                        @elseif($brand->company == "oppo")
                                            <div class="media-img"><img src="{{asset('images/oppo.jpg')}}"
                                                                        sizes="(max-width: 300px) "></div>
                                        @elseif($brand->company == "nokia")
                                            <div class="media-img"><img
                                                        src="https://www.multichannel.com/.image/t_share/MTU0MDYzOTI5Nzk2MTQyMTYy/nokia-logojpg.jpg"
                                                        sizes="(max-width: 300px) "></div>
                                        @elseif($brand->company == "motorola")
                                            <div class="media-img"><img src="{{asset('images/motorola.jpg')}}"
                                                                        sizes="(max-width: 300px) "></div>
                                        @elseif($brand->company == "lg")
                                            <div class="media-img"><img src="{{asset('images/lg.jpg')}}"
                                                                        sizes="(max-width: 300px) "></div>
                                        @elseif($brand->company == "panasonic")
                                            <div class="media-img"><img src="{{asset('images/panasonic.jpg')}}"
                                                                        sizes="(max-width: 300px) "></div>
                                        @endif
                                        <div class="category-title">
                                            <h4 class="title" style="font-weight: bold;">{{ucwords($brand->company)}}
                                                SmartPhones</h4>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>

        <div class="container">
            <div id="">
            </div>
            <div class="col-md-12" data-animation=" animated fadeIn">
                <div class="ads-block row">
                    <div class="ad col-xs-12 col-sm-4">
                        <div class="media">
                            <div class="media-left media-middle"><img src="assets/images/ad-block/1.jpg"
                                                                      alt="second hand smartphones at phonefriend"/>
                            </div>
                            <div class="media-body media-middle">
                                <div class="ad-text">
                                    <strong>Apple </strong><br> Smartphones
                                </div>
                                <div class="ad-action">
                                    <a href="https://www.phonefriend.in/store/apple">Shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ad col-xs-12 col-sm-4">
                        <div class="media">
                            <div class="media-left media-middle"><img src="assets/images/ad-block/2.png"
                                                                      alt="second hand smartphones at phonefriend"/>
                            </div>
                            <div class="media-body media-middle">
                                <div class="ad-text">
                                    <strong>Samsung </strong><br> Smartphones
                                </div>
                                <div class="ad-action">
                                    <a href="https://www.phonefriend.in/store/samsung">Shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ad col-xs-12 col-sm-4">
                        <div class="media">
                            <div class="media-left media-middle"><img src="assets/images/ad-block/3.jpg"
                                                                      alt="second hand smartphones at phonefriend"/>
                            </div>
                            <div class="media-body media-middle">
                                <div class="ad-text">
                                    <strong> All Premium</strong><br> Smartphones<br>
                                </div>
                                <div class="ad-action">
                                    <a href="https://www.phonefriend.in/store/">Shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(!Jenssegers\Agent\Facades\Agent::isMobile() || 1==1)
                <div id="sidebar" class="sidebar" role="complementary">

                    <aside class="widget widget_electro_products_filter">
                        <h3 class="widget-title">Filters</h3>
                        <aside class="widget woocommerce">
                            <h3 class="widget-title">Brands</h3>
                            <ul>
                                <div id="company" class="companies">
                                    <div class="ais-refinement-list">
                                        <div class="checkbox">
                                            <label class="ais-refinement-list__label">
                                                <input type="checkbox" name="brand[]"
                                                       class="ais-refinement-list__checkbox" value="Samsung">
                                                <span class="ais-refinement-list__value">Samsung</span>
                                            </label>

                                        </div>
                                        <div class="checkbox">
                                            <label class="ais-refinement-list__label">
                                                <input type="checkbox" name="brand[]"
                                                       class="ais-refinement-list__checkbox" value="Apple"> <span
                                                        class="ais-refinement-list__value">Apple</span>
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="ais-refinement-list__label">
                                                <input type="checkbox" name="brand[]"
                                                       class="ais-refinement-list__checkbox" value="Vivo"> <span
                                                        class="ais-refinement-list__value">Vivo</span>
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="ais-refinement-list__label">
                                                <input type="checkbox" name="brand[]"
                                                       class="ais-refinement-list__checkbox" value="Honor"> <span
                                                        class="ais-refinement-list__value">Honor</span>
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="ais-refinement-list__label">
                                                <input type="checkbox" name="brand[]"
                                                       class="ais-refinement-list__checkbox" value="Mi"> <span
                                                        class="ais-refinement-list__value">Mi</span>
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="ais-refinement-list__label">
                                                <input type="checkbox" name="brand[]"
                                                       class="ais-refinement-list__checkbox" value="Oppo"> <span
                                                        class="ais-refinement-list__value">Oppo</span>
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="ais-refinement-list__label">
                                                <input type="checkbox" name="brand[]"
                                                       class="ais-refinement-list__checkbox" value="Oneplus"> <span
                                                        class="ais-refinement-list__value">Oneplus</span>
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="ais-refinement-list__label">
                                                <input type="checkbox" name="brand[]"
                                                       class="ais-refinement-list__checkbox" value="Motorola"> <span
                                                        class="ais-refinement-list__value">Motorola</span>
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="ais-refinement-list__label">
                                                <input type="checkbox" name="brand[]"
                                                       class="ais-refinement-list__checkbox" value="Nokia"> <span
                                                        class="ais-refinement-list__value">Nokia</span>
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="ais-refinement-list__label">
                                                <input type="checkbox" name="brand[]"
                                                       class="ais-refinement-list__checkbox" value="Lenovo"> <span
                                                        class="ais-refinement-list__value">Lenovo</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </aside>

                        <aside class="widget woocommerce">
                            <h3 class="widget-title">Price</h3>
                            <ul>
                                <div class="storages">
                                    <div class="ais-refinement-list">
                                        <div class="checkbox">
                                            <label class="ais-refinement-list__label">
                                                <input type="radio" name="price" class="ais-refinement-list__checkbox"
                                                       value="1000-2000"> <span class="ais-refinement-list__value">1000-2000</span>
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="ais-refinement-list__label">
                                                <input type="radio" name="price" class="ais-refinement-list__checkbox"
                                                       value="2000-5000"> <span class="ais-refinement-list__value">2000-5000</span>
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="ais-refinement-list__label">
                                                <input type="radio" name="price" class="ais-refinement-list__checkbox"
                                                       value="5000-10000"> <span class="ais-refinement-list__value">5000-10000</span>
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="ais-refinement-list__label">
                                                <input type="radio" name="price" class="ais-refinement-list__checkbox"
                                                       value="10000-15000"> <span class="ais-refinement-list__value">10000-15000</span>
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="ais-refinement-list__label">
                                                <input type="radio" name="price" class="ais-refinement-list__checkbox"
                                                       value="15000-20000"> <span class="ais-refinement-list__value">15000-20000</span>
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="ais-refinement-list__label">
                                                <input type="radio" name="price" class="ais-refinement-list__checkbox"
                                                       value="20000-1000000"> <span class="ais-refinement-list__value">20000+</span>
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </ul>
                        </aside>
                    </aside>


                    <aside class="widget woocommerce">
                        <h3 class="widget-title">Storage</h3>
                        <ul>
                            <div class="storages">
                                <div class="ais-refinement-list">
                                    <div class="checkbox">
                                        <label class="ais-refinement-list__label">
                                            <input type="checkbox" name="storage[]"
                                                   class="ais-refinement-list__checkbox" value="32"> <span
                                                    class="ais-refinement-list__value">32</span>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label class="ais-refinement-list__label">
                                            <input type="checkbox" name="storage[]"
                                                   class="ais-refinement-list__checkbox" value="16"> <span
                                                    class="ais-refinement-list__value">16</span>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label class="ais-refinement-list__label">
                                            <input type="checkbox" name="storage[]"
                                                   class="ais-refinement-list__checkbox" value="64"> <span
                                                    class="ais-refinement-list__value">64</span>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label class="ais-refinement-list__label">
                                            <input type="checkbox" name="storage[]"
                                                   class="ais-refinement-list__checkbox" value="8"> <span
                                                    class="ais-refinement-list__value">8</span>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label class="ais-refinement-list__label">
                                            <input type="checkbox" name="storage[]"
                                                   class="ais-refinement-list__checkbox" value="128"> <span
                                                    class="ais-refinement-list__value">128</span>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label class="ais-refinement-list__label">
                                            <input type="checkbox" name="storage[]"
                                                   class="ais-refinement-list__checkbox" value="256"> <span
                                                    class="ais-refinement-list__value">256</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </aside>
                    </aside>

                    <aside id="electro_features_block_widget-2" class="widget widget_electro_features_block_widget">
                        <div class="features-list columns-1">
                            <div class="feature">
                                <div class="media">
                                    <div class="media-left media-middle feature-icon">
                                        <i class="ec ec-transport"></i>
                                    </div>
                                    <div class="media-body media-middle feature-text">
                                        <strong>Low cost </strong> Delivery
                                    </div>
                                </div>
                            </div>
                            <div class="feature">
                                <div class="media">
                                    <div class="media-left media-middle feature-icon">
                                        <i class="ec ec-customers"></i>
                                    </div>
                                    <div class="media-body media-middle feature-text">
                                        <strong>99% Positive</strong> Feedbacks
                                    </div>
                                </div>
                            </div>
                            <div class="feature">
                                <div class="media">
                                    <div class="media-left media-middle feature-icon">
                                        <i class="ec ec-returning"></i>
                                    </div>
                                    <div class="media-body media-middle feature-text">
                                        <strong>48 Hours</strong> replacement gurranty
                                    </div>
                                </div>
                            </div>
                            <div class="feature">
                                <div class="media">
                                    <div class="media-left media-middle feature-icon">
                                        <i class="ec ec-payment"></i>
                                    </div>
                                    <div class="media-body media-middle feature-text">
                                        <strong>Payment</strong> Secure System
                                    </div>
                                </div>
                            </div>
                            <div class="feature">
                                <div class="media">
                                    <div class="media-left media-middle feature-icon">
                                        <i class="ec ec-tag"></i>
                                    </div>
                                    <div class="media-body media-middle feature-text">
                                        <strong>Only Best</strong> Brands
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>

                </div>
            @endif


            <div class="mobile-filter-open">
                <img src="{{URL('assets/images/filter.png')}}"/>
            </div>
            <div class="mobile-filter-close">
                <img src="{{URL('assets/images/filter_ok.png')}}"/>
            </div>


            <div id="primary" class="content-area">
                <main id="main" class="site-main ">
                    @if(!Jenssegers\Agent\Facades\Agent::isMobile())
                        <section class=" section-onsale-product-carousel" data-animation="fadeIn">

                            <header>
                                <h1 class="h1">Deal of the Day</h1>
                            </header>

                            <div id="onsale-products-carousel-57176fb23fad9">
                                <div class="onsale-product-carousel owl-carousel owl-loaded owl-drag">


                                    <div class="owl-stage-outer">
                                        <div class="owl-stage"
                                             style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1627px;">
                                            <div class="owl-item active" style="width: 813.012px;">
                                                <div class="onsale-product">
                                                    <div class="onsale-product-thumbnails">

                                                        <div class="images"><a
                                                                    href="https://phonefriend.in/store/show/{{$deal->id}}/{{str_slug($deal->data->company." ".$deal->data->model." ".$deal->data->storage." GB", "-")}}#mobileView"
                                                                    itemprop="image" class="woocommerce-main-image"
                                                                    title=""><img width="600" height="600"
                                                                                  src="https://www.phonefriend.in/storage/{{str_replace("public", "", $deal->dp)}}"
                                                                                  class="wp-post-image"
                                                                                  alt="{{ucwords($deal->data->company)}} {{$deal->data->model}} - {{$deal->data->storage}} GB"
                                                                                  title="{{ucwords($deal->data->company)}} {{$deal->data->model}} - {{$deal->data->storage}} GB"></a>
                                                            <div class="thumbnails columns-3">
                                                                @foreach($deal->photos as $photo)
                                                                    <a href="https://phonefriend.in/store/show/{{$deal->id}}/{{str_slug($deal->data->company." ".$deal->data->model." ".$deal->data->storage." GB", "-")}}#mobileView"
                                                                       title=""><img width="180" height="180"
                                                                                     src="https://www.phonefriend.in/storage{{str_replace("public", "", $photo->filename)}}"
                                                                                     class="attachment-shop_thumbnail size-shop_thumbnail"
                                                                                     alt="{{ucwords($deal->data->company)}} {{$deal->data->model}} - {{$deal->data->storage}} GB"
                                                                                     title="{{ucwords($deal->data->company)}} {{$deal->data->model}} - {{$deal->data->storage}} GB"></a>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="onsale-product-content" style="margin-top: 0.429em;">
                                                        <span class="onsale" style="margin-bottom:1.4em">DEAL OF THE DAY<i
                                                                    class="icon-check-sign"></i></span>
                                                        <a href="https://phonefriend.in/store/show/{{$deal->id}}/{{str_slug($deal->data->company." ".$deal->data->model." ".$deal->data->storage." GB", "-")}}#mobileView">
                                                            <h3>{{ucwords($deal->data->company)}} {{$deal->data->model}}
                                                                - {{$deal->data->storage}} GB</h3></a>
                                                        <span class="price"><span class="electro-price"><ins><span
                                                                            class="amount"><i class="fa fa-inr"></i> {{number_format($deal->price, 0) }}</span></ins> <del><span
                                                                            class="amount"><i class="fa fa-inr"></i> {{number_format($deal->data->price, 0) }}</span></del></span></span>
                                                        <div class="deal-progress">
                                                            <div class="deal-stock">
                                                                <span class="stock-sold" style="color:black">Already Sold: <strong>{{$deal->units}}</strong></span>
                                                                <span class="stock-available" style="color:black">Available: <strong>{{$deal->units + 10}}</strong></span>
                                                            </div>
                                                            <div class="progress">
                                                                <span class="progress-bar"
                                                                      style="width:{{$deal->units / ($deal->units + 10) * 100}}%">{{$deal->units / ($deal->units + 10) * 100}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="deal-countdown-timer">
                                                            <div class="marketing-text text-xs-center">Hurry Up! Offer
                                                                ends in:
                                                            </div>
                                                            <span class="deal-end-date"
                                                                  style="display:none;">{{date('Y-m-d', strtotime("+1 days"))}}</span>
                                                            <div id="deal-countdown" class="countdown"><span
                                                                        class="hours"><span class="value">00</span><b>Hours</b></span><span
                                                                        class="minutes"><span class="value">00</span><b>Mins</b></span><span
                                                                        class="seconds"><span class="value">00</span><b>Secs</b></span>
                                                            </div>
                                                            <script>
                                                                // set the date we're counting down to
                                                                var deal_end_date = document.querySelector(".deal-end-date").textContent;
                                                                var target_date = new Date(deal_end_date).getTime();

                                                                // variables for time units
                                                                var days, hours, minutes, seconds;

                                                                // get tag element
                                                                var countdown = document.getElementById('deal-countdown');

                                                                // update the tag with id "countdown" every 1 second
                                                                setInterval(function () {

                                                                    // find the amount of "seconds" between now and target
                                                                    var current_date = new Date().getTime();
                                                                    var seconds_left = (target_date - current_date) / 1000;

                                                                    // do some time calculations
                                                                    seconds_left = seconds_left % 86400;

                                                                    hours = parseInt(seconds_left / 3600);
                                                                    seconds_left = seconds_left % 3600;

                                                                    minutes = parseInt(seconds_left / 60);
                                                                    seconds = parseInt(seconds_left % 60);

                                                                    // format countdown string + set tag value
                                                                    countdown.innerHTML = '<span class="hours"><span class="value">' + hours + '</span><b>Hours</b></span><span class="minutes"><span class="value">'
                                                                        + minutes + '</span><b>Mins</b></span><span class="seconds"><span class="value">' + seconds + '</span><b>Secs</b></span>';

                                                                }, 1000);
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @else
                        <section class="section-onsale-product" style="margin-top: 10px">
                            <header class="onsale-product" style="margin-bottom:0em">
                                <h2 class="h1">Deal Of the Day </h2>
                                <div class="deal-countdown-timer" style="padding-top:1em">
                                    <div id="deal-countdown" class="countdown"><span class="hours"><span class="value">00</span><b>Hours</b></span><span
                                                class="minutes"><span class="value">00</span><b>Mins</b></span><span
                                                class="seconds"><span class="value">00</span><b>Secs</b></span></div>
                                    <span class="deal-end-date"
                                          style="display:none;">{{date('Y-m-d', strtotime("+1 days"))}}</span>
                                    <script>
                                        // set the date we're counting down to
                                        var deal_end_date = document.querySelector(".deal-end-date").textContent;
                                        var target_date = new Date(deal_end_date).getTime();

                                        // variables for time units
                                        var days, hours, minutes, seconds;

                                        // get tag element
                                        var countdown = document.getElementById('deal-countdown');

                                        // update the tag with id "countdown" every 1 second
                                        setInterval(function () {

                                            // find the amount of "seconds" between now and target
                                            var current_date = new Date().getTime();
                                            var seconds_left = (target_date - current_date) / 1000;

                                            // do some time calculations
                                            days = parseInt(seconds_left / 86400);
                                            seconds_left = seconds_left % 86400;

                                            hours = parseInt(seconds_left / 3600);
                                            seconds_left = seconds_left % 3600;

                                            minutes = parseInt(seconds_left / 60);
                                            seconds = parseInt(seconds_left % 60);

                                            // format countdown string + set tag value
                                            countdown.innerHTML = '<span class="hours"><span class="value">' + hours + '</span><b>Hours</b></span><span class="minutes"><span class="value">'
                                                + minutes + '</span><b>Mins</b></span><span class="seconds"><span class="value">' + seconds + '</span><b>Secs</b></span>';

                                        }, 1000);
                                    </script>
                                </div>
                            </header><!-- /header -->

                            <div class="onsale-products products-with-category-image-inner">
                                <ul data-view="grid" data-toggle="regular-products"
                                    class="products columns-3 columns__wide--4">
                                    <li class="product product-card bestselling-card" style="width:100%">

                                        <div class="product-outer">
                                            <div class="media product-inner" style="    padding: 0.786em 1.429em;">

                                                <a class="media-left" style="vertical-align: middle;"
                                                   href="https://phonefriend.in/store/show/{{$deal->id}}/{{str_slug($deal->data->company." ".$deal->data->model." ".$deal->data->storage." GB", "-")}}#mobileView"
                                                   title="Pendrive USB 3.0 Flash 64 GB">
                                                    <img class="media-object wp-post-image img-responsive"
                                                         src="https://www.phonefriend.in/storage/{{str_replace("public", "", $deal->dp)}}"
                                                         alt="{{ucwords($deal->data->company)}} {{$deal->data->model}} - {{$deal->data->storage}} GB second hand phone at phonefriend"
                                                         title="{{ucwords($deal->data->company)}} {{$deal->data->model}} - {{$deal->data->storage}} GB">
                                                </a>

                                                <div class="media-body">
														 <span class="loop-product-categories">
                                                            <a href="/store" rel="tag">Deal of the Day</a>
                                                         </span>

                                                    <a href="https://phonefriend.in/store/show/{{$deal->id}}/{{str_slug($deal->data->company." ".$deal->data->model." ".$deal->data->storage." GB", "-")}}#mobileView">
                                                        <h3>{{ucwords($deal->data->company)}} {{$deal->data->model}}
                                                            - {{$deal->data->storage}} GB</h3>
                                                    </a>

                                                    <div class="price-add-to-cart">
                                                        <div style="margin-bottom: -3px;font-size: 16px;">

                                                            @if($deal->rating > 0)

                                                                <div class="rating col-md-5"
                                                                     title="{{($deal->rating / 5) * 100}}%">
                                                                    <div class="back-stars">
                                                                        <span class="fa fa-star"
                                                                              aria-hidden="true"></span>
                                                                        <span class="fa fa-star"
                                                                              aria-hidden="true"></span>
                                                                        <span class="fa fa-star"
                                                                              aria-hidden="true"></span>
                                                                        <span class="fa fa-star"
                                                                              aria-hidden="true"></span>
                                                                        <span class="fa fa-star"
                                                                              aria-hidden="true"></span>

                                                                        <div class="front-stars"
                                                                             style="width: {{($deal->rating / 5) * 100}}%">
                                                                            <span class="fa fa-star"
                                                                                  aria-hidden="true"></span>
                                                                            <span class="fa fa-star"
                                                                                  aria-hidden="true"></span>
                                                                            <span class="fa fa-star"
                                                                                  aria-hidden="true"></span>
                                                                            <span class="fa fa-star"
                                                                                  aria-hidden="true"></span>
                                                                            <span class="fa fa-star"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            @else
                                                                <div class="product_disc"><b class="font">NEW
                                                                        ARRIVAL</b></div>
                                                            @endif
                                                        </div>
                                                        <span class="price">
                                                                            <span class="electro-price">
                                                                                <ins><span class="woocommerce-Price-amount amount"><i
                                                                                                class="fa fa-inr"></i> {{number_format($deal->price, 0) }}</span></ins>&nbsp;
                                                                            </span>
                                                                        </span>

                                                        <a href="https://phonefriend.in/store/show/{{$deal->id}}/{{str_slug($deal->data->company." ".$deal->data->model." ".$deal->data->storage." GB", "-")}}#mobileView"
                                                           class="button add_to_cart_button">Add to cart</a>
                                                    </div><!-- /.price-add-to-cart -->

                                                </div>

                                            </div><!-- /.product-inner -->
                                        </div><!-- /.product-outer -->

                                    </li><!-- /.products -->
                                </ul>
                            </div>
                        </section>

                    @endif


                    <section class="products-carousel-tabs animate-in-view fadeIn animated" data-animation="fadeIn">
                        <h2 class="sr-only">Product Carousel Tabs</h2>

                        <div class="tab-content">


                            <div role="tabpanel" class="tab-pane active" id="grid-extended" aria-expanded="true">

                                <ul class="products columns-3" id="product_list">
                                    @foreach($phones as $phone)
                                        <li class="product col-md-4 ">
                                            <div class="product-outer">
                                                <div class="product-inner highlight">

                                                    @if($phone->age == '11 - 12 Months' || $phone->age == '12+ Months')
                                                        <span class="onsale"
                                                              style="background: #3c3c3c; color:white;    width: 100%;">REFURBISHED <i
                                                                    class="icon-check-sign"></i></span>
                                                    @else
                                                        <span class="onsale"
                                                              style="background: #3c3c3c; color:white;    width: 100%;">REFURBISHED<i
                                                                    class="icon-check-sign"></i></span>
                                                    @endif


                                                    <a href='https://phonefriend.in/store/show/{{$phone->id}}/{{str_slug($phone->data->company." ".$phone->data->model." ".$phone->data->storage." GB", "-")}}#mobileView'>

                                                        <h3 class="">{{ucwords($phone->data->company)}} {{$phone->data->model}}
                                                            - {{$phone->data->storage}} GB</h3>
                                                        <div class="product-thumbnail" style="">

                                                            <img class="img img-responsive lazyload"
                                                                 src="https://plugins.iamrohit.in/img/Facebook-Style-Content-Loader-For-React.png"
                                                                 data-src="https://www.phonefriend.in/storage/{{str_replace("public", "", $phone->dp)}}"
                                                                 alt="{{ucwords($phone->data->company)}} {{$phone->data->model}} - {{$phone->data->storage}} GB second hand phone at phonefriend"
                                                                 title="{{ucwords($phone->data->company)}} {{$phone->data->model}} - {{$phone->data->storage}} GB">

                                                            <span class="sale pad" style="display: none"
                                                                  data-toggle="tooltip" title="Price Marked Down"><b>{{round((($phone->data->price - $phone->price) / $phone->data->price )*100)}} %</b><br><span
                                                                        style="    font-size: 10px;">OFF</span></span><br>
                                                        </div>
                                                    </a>
                                                    <h3 class="">{{ucwords($phone->data->company)}} {{$phone->data->model}}
                                                        - {{$phone->data->storage}} GB</h3>


                                                    <div class="price-add-to-cart"
                                                         style="padding-top: 5%; padding-bottom: 5%; margin-bottom: 1%">

                                                        <div style="margin-bottom: -3px;font-size: 16px;">

                                                            @if($phone->rating > 0)

                                                                <div class="rating col-md-5"
                                                                     title="{{($phone->rating / 5) * 100}}%">
                                                                    <div class="back-stars">
                                                                        <span class="fa fa-star"
                                                                              aria-hidden="true"></span>
                                                                        <span class="fa fa-star"
                                                                              aria-hidden="true"></span>
                                                                        <span class="fa fa-star"
                                                                              aria-hidden="true"></span>
                                                                        <span class="fa fa-star"
                                                                              aria-hidden="true"></span>
                                                                        <span class="fa fa-star"
                                                                              aria-hidden="true"></span>

                                                                        <div class="front-stars"
                                                                             style="width: {{($phone->rating / 5) * 100}}%">
                                                                            <span class="fa fa-star"
                                                                                  aria-hidden="true"></span>
                                                                            <span class="fa fa-star"
                                                                                  aria-hidden="true"></span>
                                                                            <span class="fa fa-star"
                                                                                  aria-hidden="true"></span>
                                                                            <span class="fa fa-star"
                                                                                  aria-hidden="true"></span>
                                                                            <span class="fa fa-star"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @if(!Jenssegers\Agent\Facades\Agent::isMobile())
                                                                    <div class="col-md-4" style="    display: inline-block;
    padding-left: 7px; padding-right : 0px;
    bottom: 4px;"><span class="grey font" style="display: inline;">{{$phone->rating}} / <b>5.0</b></span></div>@endif

                                                            @else
                                                                <div class="rating col-md-5 product_disc"><b
                                                                            class="font">NEW ARRIVAL</b></div>
                                                            @endif
                                                        </div>
                                                        <span class="price">
											<span class="electro-price">
												<ins><span class="amount"><i class="fa fa-inr"></i> {{number_format($phone->price, 0) }}</span></ins>&nbsp;
												<del class=""><span class="amount "><i class="fa fa-inr"></i>{{number_format($phone->data->price,0)}}</span></del><br>

											</span>
										</span>
                                                    <!--  <a rel="nofollow" href='https://phonefriend.in/store/show/{{$phone->id}}/{{str_slug($phone->data->company." ".$phone->data->model." ".$phone->data->storage." GB", "-")}}' class="button add_to_cart_button pull-right">Add to cart</a>-->
                                                    </div><!-- /.price-add-to-cart -->

{{--                                                    <div class="hover-area" style=" display: block !important;--}}
{{--									padding-top: 0.214em !important;--}}
{{--									border-top: 1px solid #eaeaea !important;">--}}
{{--                                                        <div class="action-buttons" style="    font-weight: bold;--}}
{{--									color: #949494;">--}}
{{--                                                            @if(Auth::check())--}}
{{--                                                                @if(Auth::user()->role == 2)--}}
{{--                                                                    <?php $phoneColor = explode(',', $phone->color); ?>--}}
{{--                                                                    <?php if($phone->units){?><a--}}
{{--                                                                            href="{{URL('/phone/purchase/'.$phone->id.'/'.str_slug($phone->data->company.' '.$phone->data->model.' '.$phone->data->storage.' GB', '-').'/'.$phoneColor[0])}}"><b--}}
{{--                                                                                class="buynow" style=" /*background-color:#72BAD1;--}}
{{--									border: none;*/--}}
{{--									color: #e85561;--}}
{{--									padding: 10px 20px;--}}
{{--									text-align: center;--}}
{{--									text-decoration: none;--}}
{{--									display: inline-block;--}}
{{--									font-size: 14px;--}}
{{--									margin: 4px 2px;--}}
{{--									cursor: pointer;"><i class="fa fa-shopping-cart" aria-hidden="true"></i>--}}
{{--                                                                            &nbsp;Buy Now</b></a><?php }--}}
{{--                                                                    else{?>--}}
{{--                                                                    <div>Out of Stock</div><?php } ?>--}}
{{--                                                                @endif--}}
{{--                                                            @else--}}
{{--                                                                <?php $phoneColor = explode(',', $phone->color); ?>--}}
{{--                                                                <?php if($phone->units){?><a--}}
{{--                                                                        href='https://phonefriend.in/store/show/{{$phone->id}}/{{str_slug($phone->data->company." ".$phone->data->model." ".$phone->data->storage." GB", "-")}}#mobileView'>--}}
{{--                                                                    <b class="buynow" style="border-radius: 0%; /*background-color:#e85561;--}}
{{--									border: none;*/--}}
{{--									color: #e85561;--}}
{{--									padding: 9px;--}}
{{--									text-align: center;--}}
{{--									text-decoration: none;--}}
{{--									display: inline-block;--}}
{{--									font-size: 14px;--}}
{{--									margin: 4px 2px;--}}
{{--									cursor: pointer;"><i class="fa fa-shopping-cart" aria-hidden="true"></i>--}}
{{--                                                                        &nbsp; Buy Now</b></a><?php }--}}
{{--                                                                else{?>--}}
{{--                                                                <div>Out of Stock</div><?php } ?>--}}
{{--                                                            @endif--}}

{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                </div><!-- /.product-inner -->
                                            </div><!-- /.product-outer -->
                                        </li>
                                    @endforeach

                                </ul>
                            <!--   <a href="{{route('store.all')}}">
                                    <div class="col-md-4 col-offset-4" style="float: right; padding-bottom: 5%;">
                                        <a href="{{route('store.all')}}" rel="nofollow" class="btn btn-success" style="    color: #fff;
    background-color: #e85561;
    border-color: #5cb85c;">
                                            See More Products &nbsp; &nbsp;<i class="fa fa-angle-right" style="font-size:1.2em"></i> </a>
                                    </div>
                                </a> -->
                            </div>


                        </div>
                    </section><!-- /.products-carousel-tabs -->


                    <div class="home-v2-banner-block animate-in-view fadeIn animated" data-animation=" animated fadeIn">
                        <div class="home-v2-fullbanner-ad fullbanner-ad" style="margin-bottom: 70px;">
                            <a href="{{route('store.all')}}">
                                <img src="images/banner-lazyload.jpg" data-src="images/banner.jpg"
                                     class="img-fluid lazyload" alt="second hand smartphones at phonefriend">
                            </a>
                        </div>
                    </div>

                </main><!-- #main -->
            </div><!-- #primary -->

        </div><!-- .container -->
    </div><!-- #content -->
@endsection
@section('modals')
    @if(!Auth::check() || (Auth::check() && Auth::user()->role == 2))
        <div id="offerModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg ">
                <!-- Modal content-->
                <div class="modal-content popup-content">
                    <div class="modal-body popup-body" id="popup-box-content">
                        <div class="row container">
                            @if(!Jenssegers\Agent\Facades\Agent::isMobile())
                                <div class="col-md-5"
                                     style="max-height: 600px; background-image: url('https://www.phonefriend.in/assets/images/popup.jpg'); height: -webkit-fill-available;"></div>
                            @endif
                            <div class="col-md-7">
                                <div class="container" style="margin-top: 7%;">
                                    <span class="title">OFFERS</span>
                                    <span class="txt">AVAIL DISCOUNTS WORTH <i class="fa fa-inr"></i> 200</span>
                                    <form action="{{URL('/subscribe-to-offers')}}" accept-charset="UTF-8"
                                          name="excitingForm" id="excitingForm">
                                        {{csrf_field()}}
                                        <div class="form-group col-md-12" style="border-top:0px">
                                            <label>Enter Name:</label>
                                            <input type="text" name="offer_name" id="offer_name" class="form-control"
                                                   required="required">

                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Enter Email:</label>
                                            <input type="email" name="offer_email" id="offer_email" class="form-control"
                                                   required="required">

                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Enter Mobile No:</label>
                                            <input type="number" name="offer_mobile" id="offer_mobile"
                                                   class="form-control" required="required">
                                        </div>
                                        <div class="form-group col-md-8 col-md-offset-6">
                                            <button type="button" class="btn btn-success" name="subscribe"
                                                    style="background-color:#89249d">Submit
                                            </button>
                                            <button type="button" class="btn btn-default popup-close"
                                                    style="background-color:#252525" data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('scripts')

    <script type="text/javascript" src="assets/js/tether.min.js"></script>
    <script
            src="https://code.jquery.com/jquery-2.2.4.js"
    ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            var brands = [];
            var storages = [];
            $('input[name="brand[]"]').on('change', function (e) {
                e.preventDefault();
                brands = [];
                storages = [];
                var price = $("input[name='price']:checked").val();
                $('.loading-bg').show();
                $('input[name="brand[]"]:checked').each(function () {
                    brands.push($(this).val());
                });
                $('input[name="storage[]"]:checked').each(function () {
                    storages.push($(this).val());
                });
                $.post('/api/store/filter-phones', {
                    brands: brands,
                    price: price,
                    storages: storages
                }, function (markup) {
                    $('#product_list').html(markup);
                    $('.loading-bg').hide();
                });

            });
            $('input[name="storage[]"]').on('change', function (e) {
                e.preventDefault();
                brands = [];
                storages = [];
                var price = $("input[name='price']:checked").val();
                $('.loading-bg').show();
                $('input[name="brand[]"]:checked').each(function () {
                    brands.push($(this).val());
                });
                $('input[name="storage[]"]:checked').each(function () {
                    storages.push($(this).val());
                });
                $.post('/api/store/filter-phones', {
                    brands: brands,
                    price: price,
                    storages: storages
                }, function (markup) {
                    $('#product_list').html(markup);
                    $('.loading-bg').hide();
                });

            });
            $('input[name="price"]').on('change', function (e) {
                e.preventDefault();
                brands = [];
                storages = [];
                var price = $("input[name='price']:checked").val();
                $('.loading-bg').show();
                $('input[name="brand[]"]:checked').each(function () {
                    brands.push($(this).val());
                });
                $('input[name="storage[]"]:checked').each(function () {
                    storages.push($(this).val());
                });
                $.post('/api/store/filter-phones', {
                    brands: brands,
                    price: price,
                    storages: storages
                }, function (markup) {
                    $('#product_list').html(markup);
                    $('.loading-bg').hide();
                });

            });


            $('[data-toggle="tooltip"]').tooltip({'placement': 'bottom'});

            var delay = 10000;
            var cookie_expire = 0;
            var cookie = localStorage.getItem("list-builder");
            console.log(cookie);
            if (cookie == undefined || cookie == null || cookie == "") {
                if (((new Date()).getTime() - cookie) / (1000 * 60 * 60 * 24) > cookie_expire) {

                    // $("#offerModal").delay(delay).fadeIn("fast", () => {
                    // $("#offerModal").delay(delay).fadeIn("fast", () => {
                    // 	$('#offerModal').modal('toggle');
                    // });

                    $("button[name=subscribe]").click((e) = > {
                        console.log("clicked");
                    e.preventDefault();
                    if ($('#offer_name').val() == "") {
                        alert('Please Enter Name');
                    } else if ($('#offer_email').val() == "") {
                        alert('Please Enter Email');
                    } else if ($('#offer_mobile').val() == "") {
                        alert('Please Enter Mobile Number');
                    } else {
                        $.ajax({
                            type: "POST",
                            url: $("#excitingForm").attr("action"),
                            data: $("#excitingForm").serialize(),
                            success: (data) = > {
                            var data = JSON.parse(data);
                        if (data.flag) {
                            $("#popup-box-content").html(`
										<div class="col-md-10 col-md-offset-2">
										<div class="toast toast--green">
  <div class="toast__icon">
 <img src="assets/images/200Coupon.png">
  </div>
  <div class="toast__content">
    <p class="toast__type">CONGRATS !</p>
    <p class="toast__message">Use code <b>Get200</b> to get discount at checkout!</p>
  </div>
  <div class="toast__close" data-dismiss="modal">
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.642 15.642" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 15.642 15.642">
  <path fill-rule="evenodd" d="M8.882,7.821l6.541-6.541c0.293-0.293,0.293-0.768,0-1.061  c-0.293-0.293-0.768-0.293-1.061,0L7.821,6.76L1.28,0.22c-0.293-0.293-0.768-0.293-1.061,0c-0.293,0.293-0.293,0.768,0,1.061  l6.541,6.541L0.22,14.362c-0.293,0.293-0.293,0.768,0,1.061c0.147,0.146,0.338,0.22,0.53,0.22s0.384-0.073,0.53-0.22l6.541-6.541  l6.541,6.541c0.147,0.146,0.338,0.22,0.53,0.22c0.192,0,0.384-0.073,0.53-0.22c0.293-0.293,0.293-0.768,0-1.061L8.882,7.821z"></path>
</svg>
  </div>
</div>
										`);
                            $("button[name=subscribe]").hide();
                        } else {
                            alert(data.message);
                        }
                    }
                    })
                    }
                })
                    $(".popup-close").click(() = > {
                        $("#offerModal";
                ).
                    modal('toggle');
                    localStorage.setItem("list-builder", (new Date()).getTime());
                })
                }
            }
        });
    </script>

    <script type="text/javascript" src="assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="assets/js/echo.min.js"></script>
    <script type="text/javascript" src="assets/js/wow.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="assets/js/electro.js"></script>
    <script type="text/javascript" src="assets/js/responsiveslides.min.js"></script>
    <script>
        $(function () {
            $(".rslides").responsiveSlides({
                auto: true,
                speed: 500,
                timeout: 2500,
                prevText: "Previous",
                nextText: "Next",
                namespace: "rslides",
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#loadmost").load("https://phonefriend.in/home1");
            $('#myModal').modal('show');
            $('#aa-search-input').on('keydown', function (e) {
                if (e.which == 13) {
                    window.location = 'https://phonefriend.in/store/' + document.getElementById('aa-search-input').value.split(' ').join('-');
                }

            });
            $('#searchBtn').on('click', function (e) {
                if (document.getElementById('aa-search-input').value.trim() === "") {
                    window.location = 'https://phonefriend.in/store/' + document.getElementById('aa-search-input').value.split(' ').join('-');
                }

            });
            $(".mobile-filter-open").click(function () {
                $("#content #sidebar").addClass("open");
                $(".mobile-filter-close").addClass("open");
            });
            $(".mobile-filter-close").click(function () {
                $("#content #sidebar").removeClass("open");
                $(".mobile-filter-close").removeClass("open");
            });
        });
    </script>

    <script>
        setTimeout(function () {
            $('.content-placeholder').removeClass('content-placeholder');

            var elems = document.getElementsByClassName('buy');
            for (var i = 0; i < elems.length; i += 1) {
                elems[i].style.display = 'block';
            }

            var elems = document.getElementsByClassName('pad');
            for (var i = 0; i < elems.length; i += 1) {
                elems[i].style.display = 'inline-block';
            }
        }, 3000);
    </script>
@endsection

