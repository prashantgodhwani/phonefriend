@extends('layouts.dashboard')

@section('content')
    <?php
    $totals = DB::table('settlements')
        ->select('user_id', DB::raw('SUM(amount) as total_settled'))
        ->where('user_id',$user->id)
        ->groupBy('user_id')
        ->first();
    ?>
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h3 class="header-title">PHONEFRIEND ACCOUNTS</h3>

                        <div class="text-center mt-4 mb-4">
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
                                        <h3 class="m-b-10">@if(isset($totals))₹ {{number_format($dt->total_sales - $totals->total_settled,2)}} @else ₹ {{number_format($dt->total_sales,2)}} @endif</h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">TOTAL OUTSTANDING</p>
                                    </div>
                                </div>
                            </div>
                        </div>



                            @foreach($phones as $device)
                                @foreach(\App\OrderDevice::where('phone_id',$device->id)->get() as $phone)
                                    <div class="card" style="margin-bottom: 5%">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <b>ORDER ID : </b>{{$phone->order_id}}
                                                </div>
                                                <div class="col-md-2">
                                                    <b>
                                                        @if(\App\Order::where('id',$phone->order_id)->first()->order_status == "Success")
                                                            <span style="color:green">SUCCESSFUL</span>
                                                            @else
                                                            <span style="color:orange">{{strtoupper(\App\Order::where('id',$phone->order_id)->first()->order_status)}}</span>
                                                        @endif
                                                    </b><br>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-md-3">

                                                                <img style="width:70px" src="https://www.phonefriend.in/storage{{str_replace("public", "", App\Phone::find($phone->phone_id)->photos->first()->filename)}}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <b>{{ucwords(App\Phone::find($phone->phone_id)->data->company)}} {{App\Phone::find($phone->phone_id)->data->model}} - {{App\Phone::find($phone->phone_id)->imei1}}</b><br>
                                                                <span>Seller : #PHONEFR01{{App\Phone::find($phone->phone_id)->user->id}}</span>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <b> ₹ {{ number_format(App\Phone::find($phone->phone_id)->price)}}</b><br>
                                                                <span style="color:darkred">NO OFFERS</span>
                                                            </div>

                                                        </div>
                                                    </li>
                                            </ul>
                                            </ul>
                                        </div>
                                        <div class="card-footer text-muted">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <b>ORDERED : </b> {{\Carbon\Carbon::parse($phone->created_at)->toDayDateTimeString()}}
                                                </div>
                                                <div class="col-md-4">
                                                    <b> TOTAL : </b>  ₹ {{ number_format(App\Phone::find($phone->phone_id)->price)}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endforeach




                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->
@endsection


