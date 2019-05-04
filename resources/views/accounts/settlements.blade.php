@extends('layouts.other')

@section('content')

    <div id="content" class="site-content" tabindex="-1">
        <div class="container">

            <nav class="woocommerce-breadcrumb" ><a href="https://phonefriend.in">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>My Phones</nav>

            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <section>
                        <div class="text-center mt-4 mb-4 widget woocommerce widget_product_categories electro_widget_product_categories">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6">
                                    <div class="card-box widget-flat border-success bg-success text-white">
                                        <i class="fi-help"></i>
                                        <h3 class="m-b-10">@if(isset($totals))₹ {{number_format($totals->total_settled,2)}} @else NO SETTLEMENT  @endif</h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">TOTAL SETTLED</p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6">
                                    <div class="card-box bg-danger widget-flat border-danger text-white">
                                        <i class="fi-server"></i>
                                        <h3 class="m-b-10">@if(isset($totals))₹ {{number_format($dt->total_sales - $totals->total_settled,2)}} @elseif(isset($dt->total_sales)) ₹ {{number_format($dt->total_sales,2)}} @else N.A. @endif</h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">TOTAL OUTSTANDING</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <header>
                            <h2 class="h1">Settlements</h2>
                        </header>
                        <div class="woocommerce columns-12">
                            <div class="tab-pane active panel entry-content wc-tab" id="tab-specification">
                                @include('layouts.success')
                                @if(isset($dt->total_sales))
                                    <table class="table">
                                    <tbody>
                                    <thead>
                                    <tr>
                                        <th>S. No</th>
                                        <th>Payment Mode</th>
                                        <th>Transaction ID</th>
                                        <th>Settled Amount</th>
                                        <th>Settled On</th>


                                    </tr>
                                    </thead>
                                    <?php $i=1; ?>
                                    @foreach($datas as $dt)
                                        <tr>
                                            <td>#{{$i++}}</td>
                                            <td>{{strtoupper($dt->method)}}</td>
                                            <td><b>{{$dt->transaction_id}}</b></td>
                                            <td>₹ {{number_format($dt->amount,2)}}</td>
                                            <td> {{$dt->created_at->toDayDateTimeString()}}</td>
                                        </tr>
                                        @endforeach


                                        </tbody>
                                </table>
                                    @else
                                        No Settlements yet.
                                @endif
                            </div><!-- /.panel -->

                        </div>
                    </section>
                    <div class="pull-right">
                        {{$datas->links('pagination.default')}}
                    </div>



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
                                        <li class="cat-item"><a href="{{route('phones.show')}}">My Phones</a> </li>
                                        <li class="cat-item"><a href="{{route('account.settlements')}}"><b>Settlements</b></a> </li>


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
    <script
            src="https://code.jquery.com/jquery-2.2.4.js"
    ></script>
    <script>
        $( document ).ready(function() {
            $('#aa-search-input').on('keydown', function (e) {
                if (e.which == 13) {
                    window.location = 'https://phonefriend.in/store/'+document.getElementById('aa-search-input').value.split(' ').join('-');
                }

            });
        });
    </script>
@endsection


