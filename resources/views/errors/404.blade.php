@extends('layouts.other')

@section('content')

    <div class="site-content" tabindex="-1">
        <div class="container">

            <nav class="woocommerce-breadcrumb"><a href="https://www.phonefriend.in/">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Error 404</nav>
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="center-block">
                        <div class="info-404">
                            <div class="inner-bottom-xs">
                                <h2 class="text-xs-center  display-3">404!</h2>
                                <div class="col-md-6" style="padding-top: 5%">
                                <p style="font-size: 32px; font-weight: 600;     line-height: 1.0em; padding-top: 12%">The page you are looking for does not exist. Sasquatch, on the other hand, just might.</p>
                                   <hr class="m-y-2">
                                    <p class="lead">Not looking for Sasquatch ? Try this : </p><br>
                                    <p style="font-size: 17px;"><span style="color: darkred"> 1. </span>If you typed in a URL, double-check the spelling.<br><span style="color: darkred"> 2. </span> If you clicked on a link and found this page, drop us an email at <span style="color: darkred"> tech@phonefriend.in </span></p>
                                    <br><br><br><br>
                                    <span style="font-style: italic; font-size: 23px; color: #5f5f5f">Head back to the store by clicking <a href="https://phonefriend.in" style="color: darkred">here</a>. </span><br><br><br><br>
                                </div>
                                <div class="col-md-6">
                                    <img src="{{asset('images/sas.png')}}" class="img img-responsive" style="width: 100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>


@endsection


@section('scripts')
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/tether.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="assets/js/echo.min.js"></script>
    <script type="text/javascript" src="assets/js/wow.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="assets/js/electro.js"></script>
@endsection