@extends('layouts.dashboard')

@section('content')
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
                                        <h3 class="m-b-10">₹ {{number_format($total_settled->total_settled,2)}}</h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">TOTAL SETTLED</p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6">
                                    <div class="card-box bg-danger widget-flat border-danger text-white">
                                        <i class="fi-server"></i>
                                        <h3 class="m-b-10">₹ {{number_format($total_sales - $total_settled->total_settled,2)}}</h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">TOTAL OUTSTANDING</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">
                            <thead>
                            <tr>
                                <th>
                                    Merchant ID
                                </th>
                                <th>Merchant Name</th>
                                <th>Total Sales</th>
                                <th>Settled</th>
                                <th>Un Settled</th>
                                <th class="hidden-sm">Action</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($data as $dt)
                                <tr>
                                    <?php
                                    $totals = DB::table('settlements')
                                        ->select('user_id', DB::raw('SUM(amount) as total_settled'))
                                        ->where('user_id',$dt->user_id)
                                        ->groupBy('user_id')
                                        ->first();
                                            ?>


                                    <td><b>#{{$dt->user_id}}</b></td>
                                    <td><b>{{ucwords(\App\User::find($dt->user_id)->name)}}</b></td>
                                    <td><b>₹ {{number_format($dt->total_sales,2)}}</b></td>
                                    <td><b>@if(isset($totals))₹ {{number_format($totals->total_settled,2)}} @else <span class="badge badge-danger">NO SETTLEMENT</span>@endif</b></td>
                                    <td><b>@if(isset($totals))₹ {{number_format($dt->total_sales - $totals->total_settled,2)}} @else ₹ {{number_format($dt->total_sales,2)}}@endif</b></td>


                                    <td>
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" id="book" href="{{route('admin.merchant_transactions',$dt->user_id)}}"><i class="mdi mdi-eye text-muted font-18 vertical-middle"></i> &nbsp;View Transaction Details</a>
                                                <a class="dropdown-item" id="book" href="{{route('admin.settle_merchant',$dt->user_id)}}"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Settle Amount</a>
                                                <a class="dropdown-item" id="book" href="{{route('admin.view_settlements',$dt->user_id)}}"><i class="mdi mdi-cash-multiple mr-2 text-muted font-18 vertical-middle"></i>View Settlements</a>
                                                <a class="dropdown-item" href="#"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>Close</a>
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


