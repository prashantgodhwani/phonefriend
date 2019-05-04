@extends('layouts.other')

@section('content')
    <div id="content" class="site-content" tabindex="-1">
        <div class="container">

            <nav class="woocommerce-breadcrumb" ><a href="home.html">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Laptops &amp; Computers</nav>

            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <article class="page type-page status-publish hentry" >

                        <header class="entry-header">
                            <h1 itemprop="name" class="entry-title">Account</h1>
                            <p class="entry-subtitle">Last updated {{\App\User::find(\Illuminate\Support\Facades\Auth::user()->id)->updated_at->diffForHumans()}}</p>
                        </header><!-- .entry-header -->

                        <div itemprop="mainContentOfPage" class="entry-content">
                            <div class="vc_row wpb_row vc_row-fluid">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper"><h2 class="vc_custom_heading faq-page-title" style="font-size: 25px;color: #434343;text-align: left;font-family:Open Sans;font-weight:400;font-style:normal">Personal Information</h2></div>
                                    </div>
                                </div>
                            </div>
@include('layouts.error')
                            @include('layouts.success')

                           @if(isset($error))
                                <div class="alert alert-danger">
                                    <ul>
                                        <i class="fa fa-exclamation-circle" aria-hidden="true" style="color: darkred; font-size: 1.3em"></i>&nbsp;&nbsp;

                                            <span class="sr-only">Error:</span>
                                            <b> {{$error}}</b>

                                    </ul>
                                </div>
                               @endif
                            <form role="form" method="POST" action="{{route('profile.update')}}">
                                {{csrf_field()}}
                                {{ method_field('PATCH') }}
                                <div class="vc_row wpb_row vc_row-fluid inner-bottom-xs">
                                    <div class="wpb_column vc_column_container vc_col-sm-6 col-sm-6">
                                        <div class="vc_column-inner ">
                                            <div class="wpb_wrapper">
                                                <div class="wpb_text_column wpb_content_element ">
                                                    <div class="wpb_wrapper">
                                                        <h3 style="text-align: left;" class="faq-title">Name</h3>
                                                        <div class="text-content">
                                                            <input type="text" name="name" value="{{ucwords(\App\User::find(\Illuminate\Support\Facades\Auth::user()->id)->name)}}" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-6 col-sm-6">
                                        <div class="vc_column-inner ">
                                            <div class="wpb_wrapper">
                                                <div class="wpb_text_column wpb_content_element ">
                                                    <div class="wpb_wrapper">
                                                        <h3 class="faq-title">Email ID</h3>
                                                        <div class="text-content">
                                                            <input type="text" name="name" value="{{\App\User::find(\Illuminate\Support\Facades\Auth::user()->id)->email}}" class="form-control" disabled="disabled">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vc_row wpb_row vc_row-fluid inner-bottom" style="padding-top: 12%">
                                    <div class="wpb_column vc_column_container vc_col-sm-6 col-sm-6">
                                        <div class="vc_column-inner ">
                                            <div class="wpb_wrapper">
                                                <div class="wpb_text_column wpb_content_element ">
                                                    <div class="wpb_wrapper">
                                                        <h3 class="faq-title">Mobile Number</h3>
                                                        <div class="text-content">
                                                            <input type="text" name="phone" value="{{\App\User::find(\Illuminate\Support\Facades\Auth::user()->id)->phone}}" class="form-control" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-6 col-sm-6">
                                        <div class="vc_column-inner ">
                                            <div class="wpb_wrapper">
                                                <div class="wpb_text_column wpb_content_element ">
                                                    <div class="wpb_wrapper">
                                                        <h3 class="faq-title">New Password</h3>
                                                        <div class="text-content input-group">
                                                            <input type="password" name="new_password" id="password" class="form-control">
                                                            <span class="input-group-btn">
			        <button id= "show_password" class="btn btn-secondary" type="button">
								<span class="icc fa fa-eye"></span>
							</button>
			      </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="vc_custom_heading faq-page-title" style="font-size: 17px;color: #434343;text-align: left;font-family:Open Sans;font-weight:400;font-style:normal;padding-top:5%">Current Password</h6>
                                <div class="text-content">
                                    <input type="password" name="curr_password" id="password" class="form-control">

                                    </button>
                                    </span>
                                </div>
                                <div class="form-group" style="padding-top: 5%">
                                    <input type="submit" class="form-control" value="Update Profile">
                                </div>
                            </form>

                        </div><!-- .entry-content -->
                    </article>
                </main><!-- #main -->
            </div><!-- #primary -->

            @if(Auth::user()->role==1)

            <div id="sidebar" class="sidebar" role="complementary">
                <aside class="widget woocommerce widget_product_categories electro_widget_product_categories">
                    <ul class="product-categories category-single">
                        <li class="product_cat">

                            <ul>
                                <li class="cat-item current-cat"><a href="{{route('account')}}">Manage Your Account</a> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>

                                    <ul class='children'>
                                        <li class="cat-item"><a href="{{route('phone.add')}}">Sell a Phone</a> </li>
                                        <li class="cat-item"><a href="{{route('phones.show')}}">My Phones</a> </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </aside>


            </div>

                @elseif(Auth::user()->role==2)
                <div id="sidebar" class="sidebar" role="complementary">
                    <aside class="widget woocommerce widget_product_categories electro_widget_product_categories">
                        <ul class="product-categories category-single">
                            <li class="product_cat">

                                <ul>
                                    <li class="cat-item current-cat"><a>Manage</a> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>

                                        <ul class='children'>
                                            <li class="cat-item"><a href="{{route('phones.orders')}}"><b>My Orders</b></a> </li>

                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </aside>
                    @endif

        </div><!-- .container -->
    </div><!-- #content -->
@endsection


@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('assets/js/tether.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/echo.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/wow.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.easing.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.waypoints.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/electro.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#show_password').hover(function functionName() {
                    //Change the attribute to text
                    $('#password').attr('type', 'text');
                    $('.icc').removeClass('fa-eye').addClass('fa-eye-slash');
                }, function () {
                    //Change the attribute back to password
                    $('#password').attr('type', 'password');
                    $('.icc').removeClass('fa-eye-slash').addClass('fa-eye');
                }
            );
        });

    </script>
@endsection


