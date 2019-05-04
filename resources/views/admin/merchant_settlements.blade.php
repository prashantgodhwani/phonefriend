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

@include('layouts.success')
                        <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">
                            <thead>
                            <tr>
                                <th>
                                    Settlement ID
                                </th>
                                <th>Payment Mode</th>
                                <th>Transaction ID</th>
                                <th>Settled Amount</th>
                                <th>Settled On</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($data as $dt)
                                <tr>
                                    <td>#{{$dt->id}}</td>
                                    <td>{{strtoupper($dt->method)}}</td>
                                    <td><b>{{$dt->transaction_id}}</b></td>
                                    <td>₹ {{number_format($dt->amount,2)}}</td>
                                    <td> {{$dt->created_at->toDayDateTimeString()}}</td>
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


