@extends('layouts.dashboard')

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row text-center">
                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box widget-flat border-custom bg-custom text-white">
                        <i class="fi-tag"></i>
                        <h3 class="m-b-10">{{DB::table('orders')->whereDate('created_at', DB::raw('CURDATE()'))->count()}}</h3>
                        <p class="text-uppercase m-b-5 font-13 font-600">Orders Today</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box bg-primary widget-flat border-primary text-white">
                        <i class="fi-archive"></i>
                        <h3 class="m-b-10">{{DB::table('users')->where('role',2)->count()}}</h3>
                        <p class="text-uppercase m-b-5 font-13 font-600">User Base</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box widget-flat border-success bg-success text-white">
                        <i class="fi-help"></i>
                        <h3 class="m-b-10">{{DB::table('phones')->selectRaw('SUM((units_rem)) as total')->first()->total}}</h3>
                        <p class="text-uppercase m-b-5 font-13 font-600">Total Handsets</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box bg-danger widget-flat border-danger text-white">
                        <i class="fi-delete"></i>
                        <h3 class="m-b-10">{{DB::table('users')->where('role',1)->count()}}</h3>
                        <p class="text-uppercase m-b-5 font-13 font-600">Merchants Associated</p>
                    </div>
                </div>
            </div>
            <!-- end row -->




            <div class="row">
                <div class="col-sm-3 col-lg-3 col-xl-3">
                    <div class="card-box widget-chart-two">
                        <div class="float-right">
                            <?php $total=DB::table('phones')->sum('price'); $sold=DB::table('orders')->where('order_status','Success')->sum('amount'); $per=($sold/$total)*100;?>
                            <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                   data-fgColor="#0acf97" value="{{$per}}" data-skin="tron" data-angleOffset="180"
                                   data-readOnly=true data-thickness=".1"/>
                        </div>
                        <div class="widget-chart-two-content">
                            <p class="text-muted mb-0 mt-2">Total Revenue</p>
                            <h3 class="">₹ {{number_format(DB::table('orders')->where('order_status','Success')->sum('amount'),2)}}</h3>
                        </div>

                    </div>
                </div>

                <div class="col-sm-3 col-lg-3 col-xl-3">
                    <div class="card-box widget-chart-two">
                        <div class="widget-chart-two-content">

                            <?php $total=DB::table('phones')->selectRaw('SUM(price*(units-units_rem)) as total_sales')->first()->total_sales; ?>
                            <p class="text-muted mb-0 mt-2">Total Value of Handsets</p>
                            <h3 class="">₹ {{number_format($total,2)}}</h3>
                        </div>

                    </div>
                </div>


                <div class="col-xs-12 col-md-3 col-lg-3 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class=" mdi mdi-square-inc-cash float-right text-muted" style="color: green"></i>
                        <h6 class="text-muted text-uppercase mt-0">Orders Successful</h6>
                        <h2 class="m-b-20"><span data-plugin="counterup">{{DB::table('orders')->where('order_status','Success')->count()}}</span></h2>
                        <span class="badge badge-custom"> > </span> <span class="text-muted">From beginning of time</span>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3 col-lg-3 col-xl-3">
                    <div class="card-box tilebox-one">

                        <i class="  mdi mdi-minus-circle-outline float-right text-muted" style="color: green"></i>
                        <h6 class="text-muted text-uppercase mt-0">Orders Not Processed / Failed</h6>
                        <h2 class="m-b-20"><span >{{DB::table('orders')->where('order_status','UP')->count()}} / {{DB::table('orders')->where('order_status','Failure')->count()}}</span></h2>
                        <span class="badge badge-custom"> > </span> <span class="text-muted">From beginning of time</span>
                    </div>
                </div>

            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-xs-12 col-md-3 col-lg-3 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="icon-layers float-right text-muted"></i>
                        <h6 class="text-muted text-uppercase mt-0">Total Orders</h6>
                        <h2 class="m-b-20" data-plugin="counterup">{{DB::table('orders')->count()}}</h2>
                        <span class="badge badge-custom"> > </span> <span class="text-muted">From beginning of time</span>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3 col-lg-3 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class=" icon-social-dropbox float-right text-muted"></i>
                        <h6 class="text-muted text-uppercase mt-0">COD</h6>
                        <h2 class="m-b-20"><span data-plugin="counterup">{{DB::table('orders')->where('payment_mode','cod')->count()}}</span></h2>
                        <span class="badge badge-danger"> > </span> <span class="text-muted">From beginning of time</span>
                    </div>
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class=" icon-credit-card float-right text-muted"></i>
                        <h6 class="text-muted text-uppercase mt-0">Online Payment</h6>
                        <h2 class="m-b-20"><span data-plugin="counterup">{{DB::table('orders')->where('payment_mode','!=','cod')->count()}}</span></h2>
                        <span class="badge badge-custom"> > </span> <span class="text-muted">From beginning of time</span>
                    </div>
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box tilebox-one">
                        <i class="icon-rocket float-right text-muted"></i>
                        <h6 class="text-muted text-uppercase mt-0">Product Sold</h6>
                        <h2 class="m-b-20" data-plugin="counterup">{{DB::table('phones')->selectRaw('SUM((units-units_rem)) as total')->whereRaw('`units_rem` < `units` AND `sold`!=2')->first()->total}}</h2>
                        <span class="badge badge-custom"> > </span> <span class="text-muted">From beginning of time</span>
                    </div>
                </div>
            </div>
            <!-- end row -->



            <div class="row">

                <div class="col-lg-12">
                    <div class="card-box">
                        <h4 class="header-title mb-4">Last Transactions</h4>

                        <ul class="list-unstyled transaction-list slimscroll mb-0" style="max-height: 370px;">
                            @foreach(\App\Order::latest()->get() as $order)
                                <li>
                                    <i class="dripicons-arrow-down text-success"></i>
                                    <span class="tran-text">#PHONEFR-A1Z{{$order->id}}</span>
                                    <span class="tran-text">{{strtoupper($order->payment_mode)}}</span>
                                    <span class="pull-right text-muted tran-price">{{$order->created_at->diffForHumans()}}</span>
                                    <span class=" pull-right text-success tran-price"><b> ₹ {{number_format($order->amount,2)}}</b></span>

                                    <span class="pull-right text-muted tran-price">
                                        @if($order->order_status=="Success")
                                            <b style="color:green">{{$order->order_status}}</b>
                                        @elseif($order->order_status=="UP")
                                            <b style="color:orange">{{$order->order_status}}</b>
                                        @else
                                        <b style="color:darkred">{{$order->order_status}}</b>
                                        @endif
                                    </span>&nbsp;&nbsp;

                                    <span class="clearfix"></span>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>

            </div>
            <!-- end row -->



        </div> <!-- container -->

    </div> <!-- content -->
    @stop