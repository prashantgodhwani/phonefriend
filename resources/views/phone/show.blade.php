@extends('layouts.product')

@section('meta')
    <title>Buy {{ucwords($phone->data->company)}} {{$phone->data->model}} - {{$phone->data->storage}} GB at Phone Friend</title>
    <meta name="description" content="Buy superb condition second hand {{ucwords($phone->data->company)}} {{$phone->data->model}} - {{$phone->data->storage}} GB online at Phone Friend. We have a collection of second hand and used iphones with all the accessories and guarantee. Phone repair service."/>
@endsection

@section('content')
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        @keyframes highlight {
            0% {
                background: #ffff99;
            }
            100% {
                background: none;
            }
        }

        .highlight {
            animation: highlight 2s;
        }

        .fas{
            color: #fed700;
        }
        .far{
            color: rgba(0, 0, 0, 0.2);
        }

        #sptbl tr th,td{
            color:#000;
        }
        .green{
            color:#3e84b9;
        }
        .grey{
            color:grey;
        }
        .card {position: relative; border-radius: 3px; background-color: #fff;color: #4f5256;border: 1px solid #f2f2f2;margin-bottom: 16px;background:#fff;}
        .card-header{ padding: 16px;margin:0px;}
        .card-body {position: relative; padding: 16px;}
        .gaadiex-list {list-style-type: none; margin: 0;padding: 0;}
        .gaadiex-list>.gaadiex-list-item {padding: 0 22px;}
        .gaadiex-list-item-img  {
            float: left;
            width: 58px;
            height: 58px;
            margin-top: 20px;
            margin-bottom: 8px;
            margin-right: 20px;
            border-radius: 50%;
        }
        .gaadiex-list-item i  {
            float: left;
            font-size:48px;
            width: 58px;
            height: 58px;
            margin-top: 20px;
            margin-bottom: 8px;
            margin-right: 20px;
            border-radius: 50%;
        }
        .green {
            color: #e85561 !important;
        }
        .border-b-1 {border-bottom: 1px solid rgba(162,162,162,.16);}
    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <div id="content" class="site-content" tabindex="-1">
        <div class="container">
            <nav class="woocommerce-breadcrumb">
                <a href="https://www.phonefriend.in/">Home</a>
                <span class="delimiter"><i class="fa fa-angle-right"></i></span>
                <a href="https://www.phonefriend.in/store/">Phones</a>
                <span class="delimiter"><i class="fa fa-angle-right"></i></span>
                <a href="https://www.phonefriend.in/store/{{$phone->data->company}}">{{ucfirst($phone->data->company)}}</a>
                <span class="delimiter"><i class="fa fa-angle-right"></i>
         </span>{{ucwords($phone->data->company)}} {{$phone->data->model}} - {{$phone->data->storage}} GB
            </nav>
            <!-- /.woocommerce-breadcrumb -->
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="availability in-stock">
                        Availablity: <span><?php if($phone->units>=1){?>In stock<?php } else{ echo "Out of Stock";}?></span><br>
                    </div>
                    <div class="product" id="mobileView">
                        <div class="single-product-wrapper">
                            <div class="product-images-wrapper">
                                <!-- .availability -->
                                @if($phone->age == '11 - 12 Months' || $phone->age == '12+ Months')
                                    <span class="onsale">REFURBISHED <i class="icon-check-sign"></i></span>
                                @else
                                    <span class="onsale" style="background: #ef4956;">REFURBISHED <i class="icon-check-sign"></i></span>
                                @endif
                                <span class="onsale" style="right: 0; background: none; width : 152px;">
                                     <img style=" width : 110px;" src="https://www.phonefriend.in/assets/images/warranty.png" alt="" style="right: 0;">
                                </span>
                                <div class="images electro-gallery">
                                    <div class="thumbnails-single  owl-carousel" id="menu">
                                        @foreach($phone->photos as $photo)
                                            <a class="MagicZoom" href="https://www.phonefriend.in/storage{{str_replace("public", "", $photo->filename)}}" ><img src="https://www.phonefriend.in/storage{{str_replace("public", "", $photo->filename)}}"    class="wp-post-image" alt=""></a>
                                        @endforeach
                                    </div>
                                    <!-- .thumbnails-single -->
                                    <div class="thumbnails-all columns-5 owl-carousel">
                                        @foreach($phone->photos as $photo)
                                            <a href="" class="first" title="">
                                                <img src="https://www.phonefriend.in/storage{{str_replace("public", "", $photo->filename)}}"  class="wp-post-image" alt="">
                                            </a>
                                        @endforeach
                                    </div>
                                    <!-- .thumbnails-all -->
                                </div>
                                <!-- .electro-gallery -->
                            </div>
                            <!-- /.product-
                               images-wrapper -->
                            <div class="summary entry-summary" >
                     <span class="loop-product-categories">
                     <a href="" rel="tag">SmartPhones</a>
                     </span><!-- /.loop-product-categories -->
                                <h1 itemprop="name" class="product_title entry-title">{{ucwords($phone->data->company)}} {{$phone->data->model}} -
                                    {{$phone->data->storage}} GB </br>
                                </h1>
                                <div class="row">
                                    @if($avg > 0)
                                        <div class="col-xs-4">
                                            <div class="rating" title="{{($avg / 5) * 100}}%">
                                                <div class="back-stars">
                                                    <span class="fa fa-star" aria-hidden="true"></span>
                                                    <span class="fa fa-star" aria-hidden="true"></span>
                                                    <span class="fa fa-star" aria-hidden="true"></span>
                                                    <span class="fa fa-star" aria-hidden="true"></span>
                                                    <span class="fa fa-star" aria-hidden="true"></span>

                                                    <div class="front-stars" style="width: {{($avg / 5) * 100}}%">
                                                        <span class="fa fa-star" aria-hidden="true"></span>
                                                        <span class="fa fa-star" aria-hidden="true"></span>
                                                        <span class="fa fa-star" aria-hidden="true"></span>
                                                        <span class="fa fa-star" aria-hidden="true"></span>
                                                        <span class="fa fa-star"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            @if(!Jenssegers\Agent\Facades\Agent::isMobile())<div style="    display: inline-block;
        padding-left: 7px; padding-right : 0px;
        bottom: 4px;"><span class="grey font" style="display: inline;">{{$avg}} / <b>5.0</b></span></div>@endif
                                        </div>
                                    @endif
                                    <div class="col-xs-7">
                                        Seller
                                        <b><a href="product-category.html">
                                                @if($phone->user->role == 2)
                                                    {{ucwords($phone->user->name)}}
                                                @else
                                                    #PHONEFR-A1Z{{ucwords($phone->user->id)}}
                                                @endif
                                            </a></b>
                                    </div>


                                    <!-- .brand --><br>
                                </div>
                                <!-- .brand -->
                                <div>
                                    </span>
                                </div>
                                <hr class="single-product-title-divider"><br>
                                <div itemprop="description">

                                    <span style="padding-top: 2%; "><i class="far fa-calendar-check" style="color: rgb(135, 125, 125)"></i>&nbsp; EMIs start from &nbsp;<i class="fa fa-inr"></i>&nbsp;<?php echo intval($phone->price / 12);?>/month. <a data-toggle="modal" data-target="#emiModal" style="cursor:pointer; font-weight: bold;">View Plans &nbsp;<i class="fas fa-chevron-right" style="color: #0275d8"></i> </a><br><br>
                                        <i class="fas fa-tags" style="color: rgb(135, 125, 125)"></i>&nbsp; <b>Special Price</b> Smartphone available at discounted price of &nbsp;<i class="fa fa-inr"></i>&nbsp; {{ number_format($phone->price, 2) }}.<br><br>
                                        <i class="fas fa-shield-alt" style="color: rgb(135, 125, 125)"></i>&nbsp; <b>12 Months Seller Warranty</b>  bundled with Smartphone.<br><br>
                                        <i class="fas fa-shopping-bag" style="color: rgb(135, 125, 125)"></i>&nbsp; Get {{ucwords($phone->data->company)}} {{$phone->data->model}} for &nbsp;<b><i class="fa fa-inr"></i>&nbsp;{{number_format($phone->price - ($phone->price * 1.5) / 100, 2)}}, </b> if you pay online. <a style="cursor:pointer; font-weight: bold;">T&C</a><br>
                                    </span><br><br>
                                    <hr class="single-product-title-divider">

                                    <p class="price">
                           <span class="electro-price">
                              <ins><span class="amount"><i class="fa fa-inr"></i> {{ number_format($phone->price, 2) }}
                              </span></ins><del><span class="amount"><i class="fa fa-inr"></i> {{number_format($phone->data->price,2)}}</span></del>
                              <span class="onsale" style="background: #e85561;" data-toggle="tooltip" title="Price Marked Down"><i class="icon-check-sign"></i>You Save {{round((($phone->data->price - $phone->price) / $phone->data->price )*100)}} % </span>
                                    <p class="amount">Inclusive of all taxes.</p></span></p>
                                    <h6 style="color: #5cb85c; font-weight: bold; margin: -15px 0px -7px 0px;display:none"></br>10 days return / replacement warranty available on this product.</h6>
                                    <?php $phoneColor = explode(',', $phone->color); ?>
                                    <select style="display:none" name="" id="phone_color" class="input-text" style="Display: none">
                                        @foreach($phoneColor as $color)
                                            <option value="{{$color}}">{{$color}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if(!Jenssegers\Agent\Facades\Agent::isMobile())
                                    <div class="single_variation_wrap">
                                        <div class="woocommerce-variation single_variation"></div>
                                        <?php $flag=0; ?>
                                        @foreach (Cart::content() as $content)
                                            @if($content->id==$phone->id)
                                                <?php $flag=1; ?>
                                            @else
                                                <?php $flag=0; ?>
                                            @endif
                                        @endforeach
                                        @if($flag==0)
                                            <button  style=" color: #fff;background-color: #e85561;
                           border-color: #5cb85c;" id="cart" data-phoneid="{{$phone->id}}"><i class="fa fa-cart-plus" style="font-size: 16px;"></i> &nbsp; Add to Cart </button>
                                            <a id="addtocartButton" href="javascript:void(0)"
                                               data-url="{{URL('/phone/purchase/'.$phone->id.'/'.str_slug($phone->data->company.' '.$phone->data->model.' '.$phone->data->storage.' GB', '-'))}}"
                                            >
                                                <button id="buynow"  style=" color: #fff;background-color: #e85561;
                           border-color: #5cb85c;">
                                                    <i class="fa fa-shopping-bag"></i>
                                                    &nbsp;Buy Now</button></a>
                                            <a id="goToCart" style="display: none" href="https://phonefriend.in/cart"><span class="btn btn-danger" style="background-color: #ef5b15"><b>&nbsp; Go to Cart &nbsp; <i class="fa fa-arrow-right"></i></b></span></a>

                                        @else
                                            <a href="https://phonefriend.in/cart"><span class="btn btn-danger" style="background-color: #ef5b15"><b>&nbsp; Go to Cart &nbsp; <i class="fa fa-arrow-right"></i></b></span></a>
                                        @endif
                                    </div>
                                @endif
                                <div style="padding-top: 2%">
                                    <span style="color:red; font-weight:bold; margin-top: 2%">Note:</span>  Due to huge stock shifts we provide colour availability on call confirmation.<br>
                                    Call confirmation is done within 24 hours after the order has been placed<br>
                                    For more info or assistance : <br><i class="fa fa-phone-square" aria-hidden="true"></i> or <i class="fa fa-whatsapp" aria-hidden="true"></i>  on +91-8448444313  (Between Mon-Sat, 10:30-6:30)
                                    <br>
                                </div>
                            </div>
                        </div>
                        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

                        <div class="modal fade bd-example-modal-lg" tabindex="-1" id="emiModal" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">EMI Payment Options</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-responsive" style="width: 100%; border-style: solid; border-color: #1f1f1f;" border="0"  cellspacing="0" cellpadding="0">
                                            <tbody>
                                            <tr>
                                                <td style="width: 55px;" width="42">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">No.</p>
                                                </td>
                                                <td style="width: 207px;" width="161">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Issuing Banks</strong></p>
                                                </td>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center"><strong>&nbsp;&nbsp;&nbsp;&nbsp; Tenures</strong></p>
                                                </td>
                                                <td style="width: 187px;" nowrap="nowrap" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal"><strong>Processing Fee.(P.A)</strong></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 55px;" rowspan="4" width="42">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">1</p>
                                                </td>
                                                <td style="width: 207px;" rowspan="4" nowrap="nowrap" width="161">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">Central Bank of India</p>
                                                </td>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">3&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">13 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">6&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">13 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">9&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">14 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">12&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">14 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 55px;" rowspan="6" width="42">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">2</p>
                                                </td>
                                                <td style="width: 207px;" rowspan="6" width="161">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">&nbsp; Kotak Mahindra Bank</p>
                                                </td>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">3&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">12 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">6&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">12 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">9&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">14 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">12&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">14 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" nowrap="nowrap" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">18&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">15 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" nowrap="nowrap" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">24&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">15 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 55px;" rowspan="4" width="42">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">3</p>
                                                </td>
                                                <td style="width: 207px;" rowspan="4" width="161">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">&nbsp; ICICI Bank</p>
                                                </td>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">3&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">13 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">6&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">13 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">9&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">13 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">12&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">13 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 55px;" rowspan="4" width="42">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">4</p>
                                                </td>
                                                <td style="width: 207px;" rowspan="4" width="161">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">Axis Bank</p>
                                                </td>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">3&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">12 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">6&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">12 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">9&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">13 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">12&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">13 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 55px;" rowspan="4" width="42">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">5</p>
                                                </td>
                                                <td style="width: 207px;" rowspan="4" width="161">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">&nbsp; IndusInd Bank</p>
                                                </td>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">3&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">14 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">6&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">14 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">9&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">14 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">12&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">14 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 55px;" rowspan="5" width="42">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">6</p>
                                                </td>
                                                <td style="width: 207px;" rowspan="5" width="161">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">&nbsp; HSBC Bank</p>
                                                </td>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">3&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" nowrap="nowrap" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">12.5 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">6&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" nowrap="nowrap" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">12.5 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">9&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" nowrap="nowrap" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">13.5 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">12&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" nowrap="nowrap" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">13.5 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" nowrap="nowrap" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">18&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" nowrap="nowrap" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">13.5 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 55px;" rowspan="6" width="42">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">7</p>
                                                </td>
                                                <td style="width: 207px;" rowspan="6" width="161">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">Standard Chartered Bank</p>
                                                </td>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">3&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" nowrap="nowrap" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">13 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">6&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" nowrap="nowrap" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">13 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">9&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" nowrap="nowrap" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">14 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">12&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" nowrap="nowrap" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">14 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" nowrap="nowrap" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">18&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" nowrap="nowrap" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">15 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">24 months</p>
                                                </td>
                                                <td style="width: 187px;" nowrap="nowrap" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">15 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 55px;" rowspan="3" width="42">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">8</p>
                                                </td>
                                                <td style="width: 207px;" rowspan="3" width="161">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">Corporation Bank</p>
                                                </td>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">6&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" nowrap="nowrap" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">16 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">9&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">18 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">12&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">18 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 55px;" rowspan="4" width="42">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">&nbsp; 9</p>
                                                </td>
                                                <td style="width: 207px;" rowspan="4" width="161">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">Pay Gate (Amex EMI)</p>
                                                </td>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">3&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">15 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">6&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">15 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">9&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">15 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">12&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">15 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 55px;" rowspan="6" width="42">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">10</p>
                                                </td>
                                                <td style="width: 207px;" rowspan="6" width="161">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">Ratnakar bank Limited</p>
                                                </td>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">3&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">13 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">6&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">13 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">9&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">13 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">12&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">13 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">18&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">13 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">24&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">13 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 55px;" rowspan="5" width="42">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal">12</p>
                                                </td>
                                                <td style="width: 207px;" rowspan="5" nowrap="nowrap" width="161">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal">&nbsp;</p>
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes bank</p>
                                                </td>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">3&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">12 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">6&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">12 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">9&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">13 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">12&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">13 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">18&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">14 %</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 55px;">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">&nbsp;</p>
                                                </td>
                                                <td style="width: 207px;">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal">&nbsp;</p>
                                                </td>
                                                <td style="width: 121px;" width="93">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">24&nbsp;months</p>
                                                </td>
                                                <td style="width: 187px;" width="144">
                                                    <p class="m_344490766976183737m_-8327240553580730625x_1485003048MsoNormal" align="center">15 %</p>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="single-product-title-divider" />
                        <div class="action-buttons">
                            <div class="sharethis-inline-share-buttons"></div>
                        </div>
                        <!-- .action-buttons -->
                        <!-- .description -->
                        <br>
                        <!-- /itemprop -->
                        <hr>
                    </div>
                    <!-- .summary -->
                </main>
            </div>

            <!-- /.single-product-wrapper -->
            <div class="woocommerce-tabs wc-tabs-wrapper">

                <ul class="nav nav-tabs electro-nav-tabs tabs wc-tabs" role="tablist">
                    <li class="nav-item accessories_tab">
                        <a href="#tab-specification" data-toggle="tab">Specifications</a>
                    </li>

                    <li class="nav-item description_tab">
                        <a href="#tab-reviews" data-toggle="tab">Reviews</a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active panel entry-content wc-tab" id="tab-specification">
                        <h3>Technical Specifications</h3>
                        <table class="table" id="sptbl">
                            <tbody>
                            <tr>
                                <td>Brand</td>
                                <td>{{ucwords($phone->data->company)}}</td>
                            </tr>
                            <tr>
                                <td>Model</td>
                                <td>{{ucwords($phone->data->model)}}</td>
                            </tr>
                            <tr>
                                <td>Storage</td>
                                <td>{{ucwords($phone->data->storage)}} GB</td>
                            </tr>
                            @if(isset($phone->imei1))
                                <tr>
                                    <td>IMEI-1</td>
                                    <td>{{ucwords($phone->imei1)}}</td>
                                </tr>
                            @endif
                            <tr class="item-model-number">
                                <td>Physical Condition</td>
                                <td>{{ucwords($phone->physical_condition)}}</td>
                            </tr>
                            @if(empty($specs->status))
                                @if(!empty($specs[0]->technology))
                                    <tr class="item-model-number">
                                        <td>Technology</td>
                                        <td>{{$specs[0]->technology}}</td>
                                    </tr>
                                @endif
                                @if(!empty($specs[0]->announced))
                                    <tr class="item-model-number">
                                        <td>Announced</td>
                                        <td>{{$specs[0]->announced}}</td>
                                    </tr>
                                @endif
                                @if(!empty($specs[0]->dimensions))
                                    <tr class="item-model-number">
                                        <td>Dimensions</td>
                                        <td>{{$specs[0]->dimensions}}</td>
                                    </tr>
                                @endif
                                @if(!empty($specs[0]->weight))
                                    <tr class="item-model-number">
                                        <td>Weight</td>
                                        <td>{{$specs[0]->weight}}</td>
                                    </tr>
                                @endif
                                @if(!empty($specs[0]->sim))
                                    <tr class="item-model-number">
                                        <td>Sim</td>
                                        <td>{{$specs[0]->sim}}</td>
                                    </tr>
                                @endif
                                @if(!empty($specs[0]->type))
                                    <tr class="item-model-number">
                                        <td>Screen</td>
                                        <td>{{$specs[0]->type}}</td>
                                    </tr>
                                @endif
                                @if(!empty($specs[0]->size))
                                    <tr class="item-model-number">
                                        <td>Size</td>
                                        <td>{{$specs[0]->size}}</td>
                                    </tr>
                                @endif
                                @if(!empty($specs[0]->resolution))
                                    <tr class="item-model-number">
                                        <td>Resolution</td>
                                        <td>{{$specs[0]->resolution}}</td>
                                    </tr>
                                @endif
                                @if(!empty($specs[0]->battery_c))
                                    <tr class="item-model-number">
                                        <td>Battery</td>
                                        <td>{{$specs[0]->battery_c}}</td>
                                    </tr>
                                @endif
                                @if(!empty($specs[0]->cpu))
                                    <tr class="item-model-number">
                                        <td>CPU</td>
                                        <td>{{$specs[0]->cpu}}</td>
                                    </tr>
                                @endif
                                @if(!empty($specs[0]->internal))
                                    <tr class="item-model-number">
                                        <td>Storage</td>
                                        <td>{{$specs[0]->internal}}</td>
                                    </tr>
                                @endif
                                @if(!empty($specs[0]->primary_))
                                    <tr class="item-model-number">
                                        <td>Primary Camera</td>
                                        <td>{{$specs[0]->primary_}}</td>
                                    </tr>
                                @endif
                                @if(!empty($specs[0]->secondary))
                                    <tr class="item-model-number">
                                        <td>Secondary Camera</td>
                                        <td>{{$specs[0]->secondary}}</td>
                                    </tr>
                                @endif
                                @if(!empty($specs[0]->video))
                                    <tr class="item-model-number">
                                        <td>Video</td>
                                        <td>{{$specs[0]->video}}</td>
                                    </tr>
                                @endif
                                @if(!empty($specs[0]->chipset))
                                    <tr class="item-model-number">
                                        <td>Chipset</td>
                                        <td>{{$specs[0]->chipset}}</td>
                                    </tr>
                                @endif
                                @if(!empty($specs[0]->gpu))
                                    <tr class="item-model-number">
                                        <td>GPU</td>
                                        <td>{{$specs[0]->gpu}}</td>
                                    </tr>
                                @endif
                                @if(!empty($specs[0]->sensors))
                                    <tr class="item-model-number">
                                        <td>Sensors</td>
                                        <td>{{$specs[0]->sensors}}</td>
                                    </tr>
                                @endif
                            @endif
                            <tr>
                                <td>Remarks</td>
                                <td>{{$phone->remarks?ucwords($phone->remarks): 'N/A'}}</td>
                            </tr>
                            </tbody>
                        </table>
                        @if(isset($phone->specifications))
                            <div class="table">
                                <h3>Other Specifications</h3>
                                <?php echo htmlspecialchars_decode(htmlspecialchars_decode($phone->specifications)); ?>
                            </div>
                        @endif
                    </div><!-- /.panel -->
                    <div class="tab-pane panel entry-content wc-tab" id="tab-reviews" style="color:black">
                        <div id="reviews" class="electro-advanced-reviews">
                            <div class="advanced-review row">
                                <div class="col-xs-12 col-md-6">
                                    <h2 class="based-title">Based on {{$comments->count()}} reviews</h2>
                                    <div class="avg-rating">
                                        <span class="avg-rating-number">{{$avg}}</span> overall
                                    </div>

                                    <div class="rating-histogram">
                                        <div class="rating-bar">
                                            <div class="star-rating" title="Rated 5 out of 5">
                                                <span style="width:100%"></span>
                                            </div>
                                            <div class="rating-percentage-bar">
                                                                    <span style="width:{{($comments->count() === 0) ? 0 : ($comments->where('rating', 5)->count() / $comments->count())*100}}%" class="rating-percentage">

                                                                    </span>
                                            </div>
                                            <div class="rating-count">{{$comments->where('rating', 5)->count()}}</div>
                                        </div><!-- .rating-bar -->

                                        <div class="rating-bar">
                                            <div class="star-rating" title="Rated 4 out of 5">
                                                <span style="width:80%"></span>
                                            </div>
                                            <div class="rating-percentage-bar">
                                                <span style="width:{{($comments->count() === 0) ? 0 : ($comments->where('rating', 4)->count() / $comments->count())*100}}%" class="rating-percentage"></span>
                                            </div>
                                            <div class="rating-count">{{$comments->where('rating', 4)->count()}}</div>
                                        </div><!-- .rating-bar -->

                                        <div class="rating-bar">
                                            <div class="star-rating" title="Rated 3 out of 5">
                                                <span style="width:60%"></span>
                                            </div>
                                            <div class="rating-percentage-bar">
                                                <span style="width:{{($comments->count() === 0) ? 0 : ($comments->where('rating', 3)->count() / $comments->count())*100}}%" class="rating-percentage"></span>
                                            </div>
                                            <div class="rating-count zero">{{$comments->where('rating', 3)->count()}}</div>
                                        </div><!-- .rating-bar -->

                                        <div class="rating-bar">
                                            <div class="star-rating" title="Rated 2 out of 5">
                                                <span style="width:40%"></span>
                                            </div>
                                            <div class="rating-percentage-bar">
                                                <span style="width:{{($comments->count() === 0) ? 0 : ($comments->where('rating', 2)->count() / $comments->count())*100}}%" class="rating-percentage"></span>
                                            </div>
                                            <div class="rating-count zero">{{$comments->where('rating', 2)->count()}}</div>
                                        </div><!-- .rating-bar -->

                                        <div class="rating-bar">
                                            <div class="star-rating" title="Rated 1 out of 5">
                                                <span style="width:20%"></span>
                                            </div>
                                            <div class="rating-percentage-bar">
                                                <span style="width:{{($comments->count() === 0) ? 0 : ($comments->where('rating', 1)->count() / $comments->count())*100}}%" class="rating-percentage"></span>
                                            </div>
                                            <div class="rating-count zero">{{$comments->where('rating', 1)->count()}}</div>
                                        </div><!-- .rating-bar -->
                                    </div>
                                </div><!-- /.col -->
                                @if(Auth::check())
                                    <div class="col-xs-12 col-md-6">
                                        <div id="review_form_wrapper">
                                            <div id="review_form">
                                                <div id="respond" class="comment-respond">
                                                    <h3 id="reply-title" class="comment-reply-title">Add a review
                                                        <small><a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display:none;">Cancel reply</a>
                                                        </small>
                                                    </h3>
                                                    @include('layouts.error')
                                                    <form action="/store/saveComment" method="POST" id="commentform" class="comment-form">
                                                        {{csrf_field()}}
                                                        <p class="comment-form-rating">
                                                            <label>Your Rating</label>
                                                        </p>
                                                        <input class="rating stars" data-active-icon="fas fa-star" data-inactive-icon="far fa-star" value="3" data-max="5" data-min="1" name="rating" type="number" style="color:#fed700"/>

                                                        <p class="comment-form-comment">
                                                            <label for="comment">Your Review</label>
                                                            <textarea id="comment" name="reviewComment" cols="45" rows="8" aria-required="true"></textarea>
                                                        </p>

                                                        <p class="form-submit">
                                                            <input name="submit" type="submit" id="submit" class="submit" value="Add Review">
                                                            <input type="hidden" name="phoneIdHide" value="{{$phone->id}}" id="comment_phone_ID">
                                                        </p>
                                                    </form><!-- form -->
                                                </div><!-- #respond -->
                                            </div>
                                        </div>

                                    </div><!-- /.col -->
                                @endif
                            </div><!-- /.row -->

                            <div id="comments" style="max-height: 500px; overflow-y: auto;">

                                <ol class="commentlist">
                                    @if($comments->count() > 0)
                                        @foreach($comments as $comment)
                                            <li itemprop="review" class="comment even thread-even depth-1">

                                                <div id="comment-390" class="comment_container">

                                                    <img alt="" src="assets/images/blog/avatar.jpg" class="avatar" height="60" width="60">
                                                    <div class="comment-text">

                                                        <div class="star-rating" title="Rated 4 out of 5">
                                                            <span style="width:{{($comment->rating / 5)*100}}%"><strong itemprop="ratingValue">{{$comment->rating}}</strong> out of 5</span>
                                                        </div>


                                                        <p class="meta">
                                                            <strong>John Doe</strong> –
                                                            <time itemprop="datePublished" datetime="2016-03-03T14:13:48+00:00">March 3, 2016</time>:
                                                        </p>



                                                        <div itemprop="description" class="description">
                                                            <p>{{$comment->content}}
                                                            </p>
                                                        </div>


                                                        <p class="meta">
                                                            <strong itemprop="author">{{ucwords($comment->name)}}</strong> –  <i class="fa fa-check-circle" style="color: #719e04;"></i>&nbsp; Certified Buyer, &nbsp; <time itemprop="datePublished" datetime="2016-03-03T14:13:48+00:00">{{$comment->created_at->diffForHumans()}}</time>
                                                        </p>


                                                    </div>
                                                </div>
                                            </li><!-- #comment-## -->
                                        @endforeach
                                    @else
                                        No Comments yet.
                                    @endif


                                </ol><!-- /.commentlist -->

                            </div><!-- /#comments -->

                            <div class="clear"></div>
                        </div><!-- /.electro-advanced-reviews -->
                    </div>
                </div>
                <br>
            </div><!-- /.woocommerce-tabs -->
            </main><!-- /.site-main -->
        </div>
        <!-- /.content-area -->
    </div>
    <!-- /.container -->
    </div><!-- /.site-content -->
    @if(\Jenssegers\Agent\Facades\Agent::isMobile())

        <div class="container" id="bottombar">
            <?php $flag=0; ?>
            @foreach (Cart::content() as $content)
                @if($content->id==$phone->id)
                    <?php $flag=1; ?>
                @else
                    <?php $flag=0; ?>
                @endif
            @endforeach
            @if($flag==0)
                <div class="row">
                    <div class="col-sm-6 btn btn-primary" style="float:left; width:50%;" id="cart" data-phoneid="{{$phone->id}}">
                        <p>Add to Cart </p>
                    </div>
                    <div class="col-sm-6 btn" style="float:right; width:50%; background-color: #3c3c3c;" id="buynow">
                        <a href="javascript:void(0)"
                           data-url="{{URL('/phone/purchase/'.$phone->id.'/'.str_slug($phone->data->company.' '.$phone->data->model.' '.$phone->data->storage.' GB', '-'))}}"
                        > <p style="color: white"><b>Buy Now</b></p></a>
                    </div>
                    <a href="https://phonefriend.in/cart"><div class="col-md-12" style="display: none; background-color: #e85560;" id="goToCart"><span class="btn" style="background-color: #e85560"><b>&nbsp; Go to Cart &nbsp; <i class="fa fa-arrow-right"></i></b></span></div></a>
                    <div class="col-md-12" style="display: none; background-color: #e85560;" id="adding" ><span class="btn btn-danger" style="color:white"><b>  <i class="fas fa-circle-notch fa-spin"></i>&nbsp; Checking availability.. &nbsp;</b></span></div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-12" style="background-color: #e85560;" ><a href="https://phonefriend.in/cart"><span class="btn" style="background-color: #e85560"><b>&nbsp; Go to Cart &nbsp; <i class="fa fa-arrow-right"></i></b></span></a>
                    </div>
                    @endif
                </div>



            @endif
            @endsection
            @section('scripts')
                <script type="text/javascript" src="{{secure_asset('assets/js/tether.min.js')}}"></script>
                <script
                        src="https://code.jquery.com/jquery-2.2.4.js"
                ></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                <script>
                    $( document ).ready(function() {
                        $('[data-toggle="tooltip"]').tooltip({'placement': 'right'});
                    });
                </script>
                <?php
                use Jenssegers\Agent\Agent;
                $agent = new Agent(); ?>
                @if($agent->isDesktop())
                    <script type="text/javascript" src="{{secure_asset('assets/js/magiczoom.js')}}"></script>
                @endif
                <script type="text/javascript">
                    window.onscroll = function() {myFunction()};

                    var navbar = document.getElementById("bottombar");

                    function myFunction() {
                        if (window.pageYOffset >= 250) {
                            navbar.classList.add("sticky")
                        } else {
                            navbar.classList.remove("sticky");
                        }
                    }

                    $(document).ready(function() {
                        $('.comment:first').addClass("highlight");
                        setTimeout(function () {
                            $('.comment:first').removeClass('highlight');
                        }, 2000);
                    });

                    $(document).ready(function(){
                        $("td").css("color","#000");
                        var radioVal = '';
                        $('.extendedWarranty').click(function() {
                            $('.warrantyShow').toggle("slide");
                        });
                        $(".warrantyRadio").change(function(){
                            if( $(this).is(":checked") ){
                                radioVal = $(this).val();
                                //alert(radioVal);
                            }
                        });

                        $('#addtocartButton').on('click',function(){

                            if($('#addtocartButton').data('url') != ""){
                                var phone_color = $('#phone_color option:selected').val();

                                window.location.href =  $('#addtocartButton').data('url')+'/'+phone_color+'?warranty='+radioVal;
                            }
                        })

                        $(document).on('click','#cart',function(){
                            var phone = $(this).attr("data-phoneid");
                            var op=" ";
                            $("#cart").css("display", "none");
                            document.getElementById('buynow').style.display='none';
                            $("#adding").css("display", "block");
                            $.ajax({
                                type:'post',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url:'{!!URL::to('/apis/addtocart')!!}',
                                data:{'phone':phone},
                                success:function(data){
                                    $("#cart").css("display", "none");
                                    $('#goToCart').css("display", "block");
                                    $("#adding").css("display", "none");
                                    document.getElementById('buynow').style.display='none';
                                    var quan= data.count;
                                    var cartValue = data.cart_subtotal;
                                    $('.cart-items-count').fadeOut(500, function() {
                                        $(this).html(quan).fadeIn(500);
                                    });
                                    $('.cart-items-total-price').fadeOut(500, function() {
                                        $(this).html(`<i class="fa fa-inr"></i><b> ${cartValue}</b>`).fadeIn(500);
                                    });

                                },
                                error:function(){
                                    $("#adding").css("display", "none");
                                    $("#cart").css("display", "block");
                                    document.getElementById('buynow').style.display='block';
                                }
                            });
                        });

                    });


                </script>
                <script type="text/javascript" src="{{secure_asset('assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
                <script type="text/javascript" src="{{secure_asset('assets/js/owl.carousel.min.js')}}"></script>
                <script type="text/javascript" src="{{secure_asset('assets/js/echo.min.js')}}"></script>
                <script type="text/javascript" src="{{secure_asset('assets/js/wow.min.js')}}"></script>
                <script type="text/javascript" src="{{secure_asset('assets/js/jquery.easing.min.js')}}"></script>
                <script type="text/javascript" src="{{secure_asset('assets/js/jquery.waypoints.min.js')}}"></script>
                <script type="text/javascript" src="{{secure_asset('assets/js/electro.js')}}"></script>
                <script src="{{secure_asset('js/bootstrap-rating-input.js')}}" type="text/javascript"></script>
                <script src="https://platform-api.sharethis.com/js/sharethis.js#property=5b4776e1e1ceeb001b842cb7&product=inline-share-buttons"></script>
@endsection