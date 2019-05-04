@extends('layouts.dashboard')

@section('content')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">


    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">

            <?php $mdetail=\App\MerchantDetails::where
            ('user_id',$user->id)->first(); ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mr-2">

                            <button id="demo-btn-addrow" class="btn btn-primary"><i class="mdi mdi-plus-circle mr-2"></i> Reset Password</button>

                    </div>
                    <div class="card-box">
                        <h4 class="m-t-0 m-b-30 header-
title">Merchant Information</h4>
                        @include('layouts.error')
                        <div class="form-group">
                            <label
                                    for="exampleInputEmail1">Company Name</label>
                            <span class="form-control"
                                  id="exampleInputEmail1" aria-describedby="emailHelp" >
{{$mdetail->cname}}</span>
                        </div>
                        <div class="form-group">
                            <label
                                    for="exampleInputEmail1">Key Person Name</label>
                            <span class="form-control"
                                  id="exampleInputEmail1" aria-describedby="emailHelp" >
{{$user->name}}</span>
                        </div>

                        <div class="form-group">
                            <label
                                    for="exampleInputEmail1">Email ID</label>
                            <span class="form-control"
                                  id="exampleInputEmail1" aria-describedby="emailHelp" >
{{$user->email}}</span>
                        </div>

                        <div class="form-group">
                            <label
                                    for="exampleInputEmail1">Mobile</label>
                            <span class="form-control"
                                  id="exampleInputEmail1" aria-describedby="emailHelp" >
{{$user->phone}}</span>
                        </div>

                        <div class="form-group">
                            <label
                                    for="exampleInputEmail1">Account Number</label>
                            <span class="form-control"
                                  id="exampleInputEmail1" aria-describedby="emailHelp" >
{{$mdetail->account}}</span>
                        </div>

                        <div class="form-group">
                            <label
                                    for="exampleInputEmail1">Bank</label>
                            <span class="form-control"
                                  id="exampleInputEmail1" aria-describedby="emailHelp" >
{{$mdetail->bank}}</span>
                        </div>

                        <div class="form-group">
                            <label
                                    for="exampleInputEmail1">IFSC</label>
                            <span class="form-control"
                                  id="exampleInputEmail1" aria-describedby="emailHelp" >
{{$mdetail->ifsc}}</span>
                        </div>

                        <div class="form-group">
                            <label
                                    for="exampleInputEmail1">Beneficiary</label>
                            <span class="form-control"
                                  id="exampleInputEmail1" aria-describedby="emailHelp" >
{{$mdetail->beneficiary}}</span>
                        </div>

                        <div class="form-group">
                            <label
                                    for="exampleInputEmail1">Address</label>
                            <span class="form-control"
                                  id="exampleInputEmail1" aria-describedby="emailHelp" >
{{$mdetail->caddress}}</span>
                        </div>

                        <div class="form-group">
                            <label
                                    for="exampleInputEmail1">City</label>
                            <span class="form-control"
                                  id="exampleInputEmail1" aria-describedby="emailHelp" >
                                {{DB::table('statelist')->where('city_id',$mdetail->deliver_cityid)->first()->city_name}}</span>
                        </div>

                        <div class="form-group">
                            <label
                                    for="exampleInputEmail1">State</label>
                            <span class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                {{DB::table('statelist')
                                        ->where('city_id',$mdetail->deliver_cityid)->first()->state}}
                            </span>
                        </div>

                        <div class="form-group">
                            <label
                                    for="exampleInputEmail1">PINCODE</label>
                            <span class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                {{$mdetail->pincode}}
                            </span>
                        </div>

                        <div class="form-group">
                            <label
                                    for="exampleInputEmail1">CIN</label>
                            <span class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                {{$mdetail->cin}}
                            </span>
                        </div>

                        <div class="form-group">
                            <label
                                    for="exampleInputEmail1">AADHAR CARD NO.</label>
                            <span class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                {{$mdetail->caadhar}}
                            </span>
                        </div>

                        <div class="form-group">
                            <label
                                    for="exampleInputEmail1">GSTIN</label>
                            <span class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                {{$mdetail->gstin}}
                            </span>
                        </div>

                        <div class="form-group">
                            <label
                                    for="exampleInputEmail1">PAN CARD NUMBER</label>
                            <span class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                {{$mdetail->pan}}
                            </span>
                        </div>

                        <div class="form-group">
                            <label
                                    for="exampleInputEmail1">Financial Status</label>
                            <span class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                {{$mdetail->financial}}
                            </span>
                        </div>

                        <div class="form-group">
                            <label
                                    for="exampleInputEmail1">Period</label>
                            <span class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                {{$mdetail->period}} Months
                            </span>
                        </div>

                        <div class="form-group">
                            <label
                                    for="exampleInputEmail1">Phone Friend Score</label>
                            <span class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                {{$mdetail->score}}
                            </span>
                        </div>

                        <div class="form-group">
                            <label
                                    for="exampleInputEmail1">Marketed By</label>
                            <span class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                {{$mdetail->marketedby}}
                            </span>
                        </div>

                        <div class="form-group">
                            <label
                                    for="exampleInputEmail1">AADHAR CARD COPY</label><br>
                            <img src="https://www.phonefriend.in/storage{{str_replace("public", "", $mdetail->aadharphoto)}}" style="width: 40%">
                        </div>

                        <div class="form-group">
                            <label
                                    for="exampleInputEmail1">MOU COPY</label><br>
                            <img src="https://www.phonefriend.in/storage{{str_replace("public", "", $mdetail->mouphoto)}}" style="width: 40%">
                        </div>


                    </div>
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->
@endsection
@section('scripts')
                    <script>$('.btn-primary').confirm({
                            title: 'Recover and Update Merchant Password?',
                            theme:'material',
                            content: 'Changing and resetting password, this may be serious',
                            type: 'red',
                            typeAnimated: true,
                            buttons: {
                                tryAgain: {
                                    text: 'Reset',
                                    btnClass: 'btn-red',
                                    action: function(){
                                        window.location = "http://phonefriend.in/admin/merchant/<?php echo $user->id; ?>/reset";
                                    }
                                },
                                close: function () {
                                }
                            }
                        });</script>
    @endsection