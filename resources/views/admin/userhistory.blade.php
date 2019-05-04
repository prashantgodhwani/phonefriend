@extends('layouts.dashboard')

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="header-title">Manage User</h4>

                        <div class="text-center mt-4 mb-4">
                            <div class="row">
                                <div class="col-xs-6 col-sm-3">
                                    <div class="card-box widget-flat border-custom bg-custom text-white">
                                        <i class="fi-tag"></i>
                                        <h3 class="m-b-10">{{$user->orders->count()}}</h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">Total Orders</p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <div class="card-box bg-primary widget-flat border-primary text-white">
                                        <i class="fi-archive"></i>
                                        <h3 class="m-b-10">{{\App\Order::where('user_id',$user->id)->where('payment_mode','cod')->count()}}</h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">Cash on Delivery</p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <div class="card-box widget-flat border-success bg-success text-white">
                                        <i class="fi-help"></i>
                                        <h3 class="m-b-10">{{\App\Order::where('user_id',$user->id)->where('payment_mode','!=','cod')->count()}}</h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">PAYED ONLINE</p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <div class="card-box bg-danger widget-flat border-danger text-white">
                                        <i class="fi-server"></i>
                                        <h3 class="m-b-10">₹ {{number_format(\App\Order::where('user_id',$user->id)->sum('amount'),2)}}</h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">TOTAL REVENUE FROM USER</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">
                            <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>Ordered By</th>
                                <th>Amount</th>
                                <th>Payment Mode</th>
                                <th>Status</th>
                                <th>Ordered On</th>
                                <th class="hidden-sm">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($user->orders as $order)
                                <tr>
                                    <td><b>#{{$order->id}}</b></td>
                                    <td>
                                        <a href="javascript: void(0);">
                                            <span class="ml-2">{{$order->deliver_fname." ".$order->deliver_lname}}</span>
                                        </a>
                                    </td>

                                    <td>
                                        ₹ {{number_format($order->amount,2)}}
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);">
                                            {{strtoupper($order->payment_mode)}}
                                        </a>
                                    </td>

                                    <td>
                                        @if($order->order_status=="Success")
                                            <span class="badge badge-success">Success</span>
                                        @elseif($order->order_status=="Failure")
                                            <span class="badge badge-danger">Failure</span>
                                        @else
                                            <span class="badge badge-secondary">Under Process</span>
                                        @endif
                                    </td>

                                    <td>
                                        {{$user->created_at->toDayDateTimeString()}}
                                    </td>

                                    <td>
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{route('user.showorder',[$order->id])}}"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>View Order</a>
                                                @if($order->payment_mode!='cod')
                                                <a class="dropdown-item" href="{{route('order.bankdetails',$order->id)}}"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>Check Bank Details</a>
@endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->
@endsection