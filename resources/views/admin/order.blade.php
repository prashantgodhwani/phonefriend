@extends('layouts.dashboard')

@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h3 class="header-title">Order ID : {{$order->order_id}}</h3>

                    <div class="text-center mt-4 mb-4">
                        <div class="row">
                            <div class="col-xs-6 col-sm-3">
                                <div class="card-box widget-flat border-custom bg-custom text-white">
                                    <i class="fi-tag"></i>
                                    <h3 class="m-b-10">{{$order->nop}} items</h3>
                                    <p class="text-uppercase m-b-5 font-13 font-600">NOP</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3">
                                <div class="card-box bg-primary widget-flat border-primary text-white">
                                    <i class="fi-archive"></i>
                                    <h3 class="m-b-10">{{strtoupper($order->payment_mode)}}</h3>
                                    <p class="text-uppercase m-b-5 font-13 font-600">Payment Mode</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3">
                                <div class="card-box widget-flat border-success bg-success text-white">
                                    <i class="fi-help"></i>
                                    <h3 class="m-b-10">{{$order->order_status}}</h3>
                                    <p class="text-uppercase m-b-5 font-13 font-600">PAYMENT STATUS</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3">
                                <div class="card-box bg-danger widget-flat border-danger text-white">
                                    <i class="fi-server"></i>
                                    <h3 class="m-b-10">₹ {{number_format($order->amount,2)}}</h3>
                                    <p class="text-uppercase m-b-5 font-13 font-600">TOTAL ORDER VALUE</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">
                        <thead>
                            <tr>
                                <th>
                                    Phone ID
                                </th>
                                <th>Phone</th>
                                <th>Color</th>
                                <th>Amount</th>
                                <th>Merchant Name</th>
                                <th>Merchant Contact</th>
                                <th>Pickup Address</th>
                                <th class="hidden-sm">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $orderdevices=$order->orderdevices()->get(); ?>
                            @foreach($orderdevices as $orderd)
                            <tr>
								<?php if (strpos($orderd->phone_color, 'Warranty') !== false) { 
													$exp = explode(' ',$orderd->phone_color);
													$month = $exp[1];
                                                    //dd($month);
								?>
								
								 <td><b>#{{$orderd->phone_id}}</b></td>
                                <td>
                                    <a href="javascript: void(0);">
                                        <span class="ml-2">{{ucwords(\App\Data::find(\App\Phone::find($orderd->phone_id)->data_id)->company." ".\App\Data::find(\App\Phone::find($orderd->phone_id)->data_id)->model." ".\App\Data::find(\App\Phone::find($orderd->phone_id)->data_id)->storage." GB")}} with {{$orderd->phone_color}}</span>
                                    </a>
                                </td>
                                <td>
                                    {{$orderd->phone_color}}
                                </td>
                                <td>
                                    ₹{{number_format(\App\Phone::find($orderd->phone_id)->price,2)}} + {{number_format(\App\Phone::find($orderd->phone_id)->price*$month/100,2)}}
                                </td>

                                <td>
                                    <a href="javascript: void(0);">
                                        {{ucwords(\App\User::find(\App\Phone::find($orderd->phone_id)->user_id)->name)}}
                                    </a>
                                </td>

                                <td>
                                    <a href="javascript: void(0);">
                                        +91-{{ucwords(\App\User::find(\App\Phone::find($orderd->phone_id)->user_id)->phone)}}
                                    </a>
                                </td>

                                <td></td>

                                <td> </td>
								
								
								
								
								<?php }else{?>
									 <td><b>#{{$orderd->phone_id}}</b></td>
                                <td>
                                    <a href="javascript: void(0);">
                                        <span class="ml-2">{{ucwords(\App\Data::find(\App\Phone::find($orderd->phone_id)->data_id)->company." ".\App\Data::find(\App\Phone::find($orderd->phone_id)->data_id)->model." ".\App\Data::find(\App\Phone::find($orderd->phone_id)->data_id)->storage." GB")}}</span>
                                    </a>
                                </td>
                                <td>
                                    {{$orderd->phone_color}}
                                </td>
                                <td>
                                    ₹ {{number_format(\App\Phone::find($orderd->phone_id)->price,2)}}
                                </td>

                                <td>
                                    <a href="javascript: void(0);">
                                        {{ucwords(\App\User::find(\App\Phone::find($orderd->phone_id)->user_id)->name)}}
                                    </a>
                                </td>

                                <td>
                                    <a href="javascript: void(0);">
                                        +91-{{ucwords(\App\User::find(\App\Phone::find($orderd->phone_id)->user_id)->phone)}}
                                    </a>
                                </td>

                                <td>
                                    <?php $md=\App\MerchantDetails::where('user_id',\App\Phone::find($orderd->phone_id)->user_id)->get(); ?>
                                    {{ucwords($md[0]->caddress).", ".$md[0]->pincode}}<br>

                                    @if(is_null($order->deliver_cityid) || $order->deliver_cityid == "")
                                    {{$order->district}}<br>
                                    @else
                                    <?php $city = DB::table('statelist')->select(['city_name','state'])->where('city_id',$md[0]->deliver_cityid)->get(); ?> {{$city[0]->city_name." - ".$city[0]->state}}
                                    @endif
                                </td>

                                <td>
                                    <div class="btn-group dropdown">
                                        <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{route('device.view',[$orderd->phone_id])}}"><i class="fa fa-eye vertical-middle"></i> &nbsp; &nbsp;        View Device</a>
                                            <a class="dropdown-item" id="book" href="{{route('ship.order',[$order->id,$orderd->phone_id])}}"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Schedule Shipment</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>Close</a>
                                        </div>
                                    </div>
                                </td>
									<?php } ?>
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="margin-top: 5%">
                        <hr>
                        <h4><b>DELIVER DETAILS  </b></h4><br>
                        <div class="row">
                        <div class="col-md-6">
                            <b>{{$order->deliver_fname." ".$order->deliver_lname}},</b><br>
                            {{$user->email}}<br>
                            +91-{{$order->deliver_phone}}<br><br>
                            <b>Number Of Products : {{$order->nop}}</b><br><br>
                        </div>
                        <div class="col-md-6">
                            <b>Address</b><br>
                            {{$order->deliver_add1.", ".$order->deliver_add2}}<br>
                            {{$order->postcode}}

                            {{$order->district}}
                            <br>
                            {{$order->state}}
                        </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container -->

</div> <!-- content -->
@endsection


