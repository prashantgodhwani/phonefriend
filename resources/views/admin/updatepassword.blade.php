@extends('layouts.dashboard')

@section('content')

    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mr-2">


                    </div>
                    <div class="card-box">
                        <h4 class="m-t-0 m-b-30 header-
title">Reset Password</h4>
                        @include('layouts.success')

                        <form method="post" action="{{route('merchant.reset',[$user->id])}}">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label
                                    for="exampleInputEmail1">OTP(One Time Password)</label>
                            <input class="form-control" type="number"
                                  id="exampleInputEmail1" aria-describedby="emailHelp" name="otp">
                        </div>
                        <div class="form-group">
                            <label
                                    for="exampleInputEmail1">New Password</label>
                            <input class="form-control" type="password"
                                   id="exampleInputEmail1" aria-describedby="emailHelp" name="password">
                        </div>
                        <div class="form-group">
                            <input class="form-control btn-danger" type="submit" value="Reset"
                                   id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        </form>



                    </div>
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->
            @endsection
