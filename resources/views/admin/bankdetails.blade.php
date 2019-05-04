@extends('layouts.dashboard')

@section('content')
    <div class="content" style="padding-top: 10%">
        <div class="container-fluid">

            <div class="row text-center">
                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box widget-flat border-custom bg-custom text-white">
                        <i class="fi-tag"></i>
                        <h3 class="m-b-10">{{$order->bank_ref_no}}</h3>
                        <p class="text-uppercase m-b-5 font-13 font-600">Bank Ref No.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box bg-primary widget-flat border-primary text-white">
                        <i class="fi-archive"></i>
                        <h3 class="m-b-10">₹ {{number_format($order->amount,2)}}</h3>
                        <p class="text-uppercase m-b-5 font-13 font-600">Order Amount</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box widget-flat border-success bg-success text-white">
                        <i class="fi-help"></i>
                        <h3 class="m-b-10">{{$order->card_name}}</h3>
                        <p class="text-uppercase m-b-5 font-13 font-600">Card Name</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box bg-danger widget-flat border-danger text-white">
                        <i class="fi-delete"></i>
                        <h3 class="m-b-10">{{$order->tracking_id}}</h3>
                        <p class="text-uppercase m-b-5 font-13 font-600">Tracking ID</p>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card-box tilebox-one">
                        <i class="icon-layers float-right text-muted"></i>
                        <h6 class="text-muted text-uppercase mt-0">Payment Mode</h6>
                        <h2 class="m-b-20">{{$order->payment_mode}}</h2>

                    </div>
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card-box tilebox-one">
                        <i class=" icon-social-dropbox float-right text-muted"></i>
                        <h6 class="text-muted text-uppercase mt-0">Order Status</h6>
                        <h2 class="m-b-20"><span >{{$order->order_status}}</span></h2>

                    </div>
                </div>
                <!-- end row -->

            </div>
        </div>
@endsection