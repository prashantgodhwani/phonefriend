@extends('layouts.search')
@section('meta')
    @if($model === "apple")
        <title>Second Hand iphones for sale in Delhi NCR | Phone Friend</title>
        <meta name="description" content="Buy superb condition second hand iphones online at Phone Friend. We have a collection of second hand and used iphones with all the accessories and guarantee. Phone repair service."/>
    @elseif($model === "samsung")
        <title>Second Hand Samsung Phones for Sale in Delhi NCR | phonefriend.in</title>
        <meta name="description" content="Buy second hand or refurbished Samsung Mobile Phones online at cheap Price in Delhi NCR at phonefriend.in. Place an order online and get free delivery!"/>
    @elseif($model === "oneplus")
        <title>Buy Refurbished OnePlus phones online in Delhi NCR</title>
        <meta name="description" content="Browse the best quality refurbished Oneplus mobiles online at www.phonefriend.in. Oneplus mobiles are a great Smartphone with advanced features and elegant look."/>
    @elseif($model === "oppo")
        <title>Buy Second Hand and used Oppo mobile phones online | Phone Friend</title>
        <meta name="description" content="Are you looking to buy second hand and used oppo mobile phone? Phone Friend has a complete range of Oppo phones at discounted price. Contact us for Phone repair services"/>
    @elseif($model === "vivo")
        <title>Buy Second Hand and used Vivo mobile phone online at Phone Friend</title>
        <meta name="description" content="Looking to buy second hand and used vivo mobile phone? Phone Friend has a collection of refurbished vivo phones at discounted price. COD Available. Buy online today!!!"/>
    @elseif($model === "mi")
        <title>Mi second hand phone for sale in Delhi NCR | Phone Friend</title>
        <meta name="description" content="Buy used second hand refurbished mi mobile phones online at affordable prices in Fridabad,Gurgaon,Noida, Ghaziabad & Greator Noida. Contact us for mobile repairing."/>
    @elseif($model === "motorola")
        <title>Buy Motorola second hand phone online at affordable prices</title>
        <meta name="description" content="Phone Friend has a wide range of Motorola second hand mobile phones in Fridabad,Gurgaon,Noida, Ghaziabad & Greator Noida with 1 year warranty, free shipping, and COD. "/>
    @elseif($model === "nokia")
        <title>Nokia second hand phones for sale in Delhi NCR | Phone Friend</title>
        <meta name="description" content="Buy refurbished, Second hand and certified pre-owned Nokia mobile phones online in Delhi NCR at lowest price with 1 year warranty, free shipping, and COD."/>
    @elseif($model === "blackberry")
        <title>Blackberry second hand phones in Delhi at affordable prices</title>
        <meta name="description" content="Buy blackberry secondhand phones online at cheapest price in Fridabad,Gurgaon,Noida, Ghaziabad & Greator Noida. 1 year warranty, free shipping, and COD."/>
    @elseif($model === "gionee")
        <title>Buy Gionee second hand phone online at affordable prices</title>
        <meta name="description" content="Are you looking to buy second hand and used Gionee mobile phone? Phone Friend has a collection of refurbished Gionee phones at discounted price. COD Available."/>
    @elseif($model === "lenovo")
        <title>Lenovo second hand phones in Delhi NCR at affordable prices</title>
        <meta name="description" content="Buy lenovo secondhand phones online at cheapest price in Delhi NCR at phonefriend.in. Phone Friend has a wide range of lenovo secondhand Mobiles at discounted price."/>
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


