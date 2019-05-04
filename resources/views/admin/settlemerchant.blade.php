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
                        @include('layouts.error')
                        @include('layouts.success')
                        <form role="form" id="MerchantForm" data-toggle="validator" action="{{route('merchant.store_settlement',$user->id)}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputPassword1">Payment Mode</label>
                                <select class="form-control selectpicker" data-live-search="true" name="method" id="method" style="width: 100%" required>
                                        <option value="neft">NEFT</option>
                                    <option value="rtgs">RTGS</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Transaction ID</label>
                                <input type="text" name="transaction_id" class="form-control" id="exampleInputPassword1" placeholder="Transaction ID" required>
                                <small id="emailHelp" class="form-text text-muted">Transaction ID</small>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Amount</label>
                                <input type="number" name="amount" class="form-control" id="exampleInputPassword1" placeholder="Amount" required>
                                <small id="emailHelp" class="form-text text-muted">Amount Settled</small>
                                <div class="help-block with-errors"></div>
                            </div>

                            <button type="submit" class="btn btn-primary">Settle Outstanding</button>
                        </form>

                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->
@endsection


