@extends('layouts.other')

@section('content')

    <div id="content" class="site-content" tabindex="-1">
        <div class="container">

            <nav class="woocommerce-breadcrumb" >
                <a href="home.html">Home</a>
                <span class="delimiter"><i class="fa fa-angle-right"></i></span>
                My Account
            </nav><!-- .woocommerce-breadcrumb -->

            <div class="col-md-12">
                <main id="main" class="site-main">
                    <article id="post-8" class="hentry">

                        <div class="entry-content">
                            <div class="woocommerce">
                                <div class="customer-login-form">
                                    <span class="or-text">or</span>

                                    <div class="col2-set" id="customer_login">

                                        <div class="col-md-6">


                                            <h2>Be a Merchant</h2>

                                            <form method="post" class="login">

                                                <p class="before-login-text">
                                                    Be a Merchant at Phone Friend
                                                </p>
                                                @include('layouts.error')
                                                @if (session('status'))
                                                    <div class="alert alert-success">
                                                        {{ session('status') }}
                                                    </div>
                                                @endif
                                                @if (session('warning'))
                                                    <div class="alert alert-warning">
                                                        {{ session('warning') }}
                                                    </div>
                                                @endif
                                                <form class="form-horizontal" method="POST" action="{{ route('merchant') }}">
                                                    {{ csrf_field() }}

                                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                        <label for="name" class="col-md-4 control-label form-group">Name</label>

                                                        <div class="col-md-8 form-group">
                                                            <input id="name" type="text" class="form-control" name="mname" value="{{ old('name') }}" required autofocus>

                                                            @if ($errors->has('name'))
                                                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                        <label for="email" class="col-md-4 control-label form-group">E-Mail Address</label>

                                                        <div class="col-md-8 form-group">
                                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                                            @if ($errors->has('email'))
                                                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                        <label for="password" class="col-md-4 control-label">Phone Number</label>

                                                        <div class="col-md-8 form-group">
                                                            <input id="phone" type="text" class="form-control" name="phone" required>

                                                            @if ($errors->has('phone'))
                                                                <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-8 col-md-offset-4">
                                                            <button type="submit" class="btn btn-primary">
                                                                Request
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </form>


                                        </div><!-- .col-1 -->

                                        <div class="col-2">

                                            <h2>Login</h2>

                                            <form method="post" class="register">

                                                <p class="before-register-text">

                                                </p>

                                                <div class="register-benefits">
                                                    <h3>Sign up today and you will be able to :</h3>
                                                    <ul>
                                                        <li>Speed your way through checkout</li>
                                                        <li>Track your orders easily</li>
                                                        <li>Keep a record of all your purchases</li>
                                                    </ul>
                                                </div><BR>

                                                <p class="form-row">
                                                    <a class="button" href="{{route('login')}}">Login</a>
                                                </p>



                                            </form>

                                        </div><!-- .col-2 -->

                                    </div><!-- .col2-set -->

                                </div><!-- /.customer-login-form -->
                            </div><!-- .woocommerce -->
                        </div><!-- .entry-content -->

                    </article><!-- #post-## -->

                </main><!-- #main -->
            </div><!-- #primary -->


        </div><!-- .col-full -->
    </div><!-- #content -->

@endsection
@section('scripts')

    <script
            src="https://code.jquery.com/jquery-2.2.4.js"
    ></script>
@endsection
