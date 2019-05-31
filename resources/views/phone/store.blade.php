@extends('layouts.search')
@section('meta')
    @if($model === "apple")
        <title>Second Hand iphones for sale in India | iPhone Repair Service in delhi</title>
        <meta name="description" content="Buy superb condition second hand iphones online at Phone Friend. We have a collection of second hand and used iphones with all the accessories and guarantee. iPhone repair service."/>
    @elseif($model === "samsung")
        <title>Buy Second Hand Samsung Phones online in india | Phone Repair in delhi</title>
        <meta name="description" content="Buy second hand, used or refurbished Samsung Mobile Phones online at cheap Price in India. Phone repair services in delhi. Place an order online and get free delivery!"/>
    @elseif($model === "oneplus")
        <title>Buy refurbished oneplus phones online in India | Oneplus Phone Repair in Delhi</title>
        <meta name="description" content="Browse the best quality second hand , refurbished and used Oneplus mobiles online at www.phonefriend.in. Contact us for oneplus mobile phone repair services in delhi"/>
    @elseif($model === "oppo")
        <title>Second hand oppo mobile phone in India | oppo phone repair service in delhi</title>
        <meta name="description" content="Are you looking to buy second hand and used oppo mobile phone? Phone Friend has a complete range of Oppo phones at discounted price. Contact us for Phone repair services"/>
    @elseif($model === "vivo")
        <title>Buy second hand and used vivo mobile phone online at Phone Friend</title>
        <meta name="description" content="Looking to buy second hand and used vivo mobile phone? Phone Friend has a collection of refurbished vivo phones at discounted price. COD Available. Vivo mobile repair service in delhi"/>
    @elseif($model === "mi")
        <title>Mi second hand phone for sale in India | Mi phone repair in delhi</title>
        <meta name="description" content="Buy used second hand refurbished mi mobile phones online at affordable prices in India. Contact us for Mi repairing services in Delhi. 1 year warranty, free shipping, and COD. "/>
    @elseif($model === "motorola")
        <title>Buy Motorola second hand phone online at affordable prices in India</title>
        <meta name="description" content="Phone Friend has a wide range of motorola second hand and refurbished mobile phones in India. We also offer motorola phone repair services at affordable prices in delhi."/>
    @elseif($model === "nokia")
        <title>Nokia second hand phones for sale in India | Nokia repair services in Delhi</title>
        <meta name="description" content="Buy refurbished, Second hand and certified pre-owned Nokia mobile phones online in india at lowest price with 1 year warranty, free shipping, and COD. Contact us for repair services"/>
    @elseif($model === "blackberry")
        <title>Blackberry second hand phones in India| Blackberry phone repair in Delhi</title>
        <meta name="description" content="Buy blackberry secondhand and used mobile phones online at cheapest price in India 1 year warranty, free shipping, and COD. We offer Blackberry mobile phone repair service in Delhi."/>
    @elseif($model === "gionee")
        <title>Buy Gionee second hand phone online | Gionee phone repair services in delhi</title>
        <meta name="description" content="Are you looking to buy second hand and used vivo mobile phone? Phone Friend has a collection of refurbished Gionee phones at discounted price. COD Available. Gionee repair services"/>
    @elseif($model === "lenovo")
        <title>Buy lenovo second hand phones online in India at affordable prices</title>
        <meta name="description" content="Buy lenovo secondhand phones online at cheapest price in india at phonefriend.in. Phone Friend has a wide range of lenovo secondhand Mobiles at discounted price. Lenovo repair service."/>
    @else
        <title>Store | Second Hand Smartphone store</title>
        <meta name="description" content="Buy refurbished, box opened and certified pre owned mobile phones, tablets & laptops online in India with huge discounts, 1 year warranty, free shipping, and COD."/>
    @endif
@endsection
@section('content')
@include('layouts.app')
    @stop
@section('scripts')

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>



    <script type="text/javascript" src="{{asset('assets/js/tether.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/echo.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/wow.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.easing.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.waypoints.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/electro.js')}}"></script>

@endsection


