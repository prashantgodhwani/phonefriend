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
                                    <h3 class="m-b-10">@if(isset($phone)){{$phone->units}} @else NO SALES  @endif</h3>
                                    <p class="text-uppercase m-b-5 font-13 font-600">TOTAL UNITS</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <div class="card-box bg-danger widget-flat border-danger text-white">
                                    <i class="fi-server"></i>
                                    <h3 class="m-b-10">@if(isset($phone)){{$phone->units - $phone->units_rem}} @endif</h3>
                                    <p class="text-uppercase m-b-5 font-13 font-600">UNITS SOLD</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <header>
                        <?php $dvce= ucwords($phone->data->company).' '.$phone->data->model.' - '.$phone->data->storage.'GB'; ?>
                        <h2 class="h1">Orders</h2>
                    </header>
                    <div class="woocommerce columns-6">
                        <div class="tab-pane active panel entry-content wc-tab" id="tab-specification">
                            @include('layouts.success')

                            @if(isset($phones))
                            <table class="table">
                                <tbody>
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Name</th>
                                            <th>Date</th>


                                        </tr>
                                    </thead>

                                    @foreach($phones as $phone)
                                    <?php $device= \App\Order::where('id',$phone->order_id)->first(); ?>
                                    <tr>
                                        <td style="padding-top: 7px;">{{$device->order_id}}</td>
                                        <td style="padding-top: 7px;">{{$dvce}}</td>
                                        <td>{{\Carbon\Carbon::parse($device->created_at)->toDayDateTimeString()}}</td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                            @else
                            No Orders yet.
                            @endif
                        </div><!-- /.panel -->

                    </div>
                </section>
                <div class="pull-right">
                    {{$phones->links('pagination.default')}}
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
                                    <li class="cat-item"><a href="{{route('phones.show')}}"><b>My Phones</b></a> </li>
                                    <li class="cat-item"><a href="{{route('account.settlements')}}">Settlements</a> </li>


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


