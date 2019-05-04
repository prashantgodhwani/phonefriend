@extends('layouts.other')

@section('content')
    <div id="content" class="site-content" tabindex="-1">
        <div class="container">

            <nav class="woocommerce-breadcrumb" ><a href="home.html">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Laptops &amp; Computers</nav>

            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <section>
                        <header>
                            <h2 class="h1">Bids For - {{ucwords(\App\Phone::find($bids->first()->phone_id)->data->company. " ". \App\Phone::find($bids->first()->phone_id)->data->model)}}</h2>
                        </header>
                        <div class="woocommerce columns-6">
                            <div class="tab-pane active panel entry-content wc-tab" id="tab-specification">
                                @include('layouts.success')
                                <table class="table">
                                    <tbody>
                                    <thead>
                                    <tr>
                                        <th>Bid ID</th>
                                        <th>Bid Amount</th>
                                        <th>Time of Bid</th>
                                        <th>Status</th>
                                        <th>Operations</th>
                                    </tr>
                                    </thead>
                                    @foreach($bids as $bid)
                                        <tr>
                                            <td style="padding-top: 7px;">#BB-0A{{$bid->id}}</td>
                                            <td style="padding-top: 7px;">₹ {{ number_format($bid->bidamt, 2) }}</td>
                                            <td style="padding-top: 7px;">{{\Carbon\Carbon::parse($bid->created_at)->toDayDateTimeString()}}</td>
                                            <td style="padding-top: 7px;"><b>@if($bid->status==0)<span style="color: #ff5c00">Waitlist</span>@elseif($bid->status==1)<span style="color: green">Accepted</span>@else<span style="color: darkred">Rejected</span>@endif</b></td>
                                            <td style="padding-top: 7px;">@if($bid->status==0 && !in_array(1, $bid->phone->bids->pluck('status')->toArray()))<a href="{{route('bid.accept',$bid->id)}}"><i class="fa fa-check" aria-hidden="true" style="color: green; font-size: 1.7em"></i></a>&nbsp;&nbsp; <a href="{{route('bid.reject',$bid->id)}}"><i class="fa fa-times" aria-hidden="true" style="color: darkred; font-size: 1.7em"></i></a>@else <span style="color: darkred;"><b>N.A.</b>@endif</span> </td>
                                        </tr>
                                        @endforeach


                                        </tbody>
                                </table>
                            </div><!-- /.panel -->
                        </div>
                    </section>




                </main><!-- #main -->
            </div><!-- #primary -->

            <div id="sidebar" class="sidebar" role="complementary">
                <aside class="widget woocommerce widget_product_categories electro_widget_product_categories">
                    <ul class="product-categories category-single">
                        <li class="product_cat">

                            <ul>
                                <li class="cat-item current-cat"><a href="{{route('account')}}">Manage Your Account</a> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>

                                    <ul class='children'>
                                        <li class="cat-item"><a href="{{route('phone.add')}}">Sell a Phone</a> </li>
                                        <li class="cat-item"><a href="{{route('phones.show')}}"><b>My Phones</b></a> </li>
                                        <li class="cat-item"><a href="{{route('account.mybids')}}">My Bids</a> </li>
                                        <li class="cat-item"><a href="{{route('account.history')}}">History</a></li>

                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </aside>


            </div>

        </div><!-- .container -->
    </div><!-- #content -->
@endsection


@section('scripts')
    <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
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


