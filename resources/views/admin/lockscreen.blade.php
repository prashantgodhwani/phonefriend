@extends('layouts.lock')

@section('content')
    <!-- Begin page -->
    <div class="accountbg" style="background: url('assets/images/bg-2.jpg');background-size: cover;"></div>

    <div class="wrapper-page account-page-full">

        <div class="card">
            <div class="card-block">

                <div class="account-box">

                    <div class="card-box p-5">
                        <h2 class="text-uppercase text-center pb-4">
                            <a href="index-2.html" class="text-success">
                                <span><img src="{{asset('images/logo1.png')}}" alt="" height="50"></span>
                            </a>
                        </h2>

                        <div class="text-center">
                            <div class="mb-3">
                                <img src="assets/images/users/avatar-5.jpg" class="rounded-circle img-thumbnail thumb-lg" alt="thumbnail"><br>
                                <br><b>{{ucwords(Auth::user()->name)}}</b>
                            </div>

                            <p class="text-muted m-b-0 font-14">Enter your password to access the admin. </p>
                            @include('layouts.success')
                        </div>

                        <form class="form-horizontal" action="{{route('lockscreen')}}" method="POST">
{{csrf_field()}}                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" required="" id="password" placeholder="Enter your password" name="password">
                                </div>
                            </div>

                            <div class="form-group row text-center">
                                <div class="col-12">
                                    <button class="btn btn-block btn-custom  waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>

                        </form>

                        <div class="row m-t-50">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted">Not you? return<a href="page-login.html" class="text-dark ml-2"><b>Sign In</b></a></p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
@stop