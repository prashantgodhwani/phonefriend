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

                                        <!-- .col-1 -->

                                        <div class="col-md-6">

                                            <h2>Signup</h2>

                                            <form method="post" class="register">

                                                <p class="before-register-text">
                                                    Create your very own account
                                                </p>

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
                                                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                                    {{ csrf_field() }}


                                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                        <label for="name" class="col-md-4 control-label">Name</label>

                                                        <div class="col-md-8 form-group">
                                                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                                            @if ($errors->has('name'))
                                                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                                        <div class="col-md-8 form-group">
                                                            <input id="email" type="email" data-validation="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                                            @if ($errors->has('email'))
                                                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                        <label for="email" class="col-md-4 control-label">Phone Number</label>

                                                        <div class="col-md-8 form-group">
                                                            <input id="phone" data-validation="number,length" data-validation-length="10-10" type="number" class="form-control" name="phone" value="{{ old('phone') }}" required>

                                                            @if ($errors->has('phone'))
                                                                <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                        <label for="password" class="col-md-4 control-label">Password</label>

                                                        <div class="col-md-8 form-group">
                                                            <input id="password" type="password" class="form-control" name="password" required>

                                                            @if ($errors->has('password'))
                                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                                        <div class="col-md-8 form-group">
                                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-8 col-md-offset-4">
                                                            <button type="submit" class="btn btn-primary" style="margin-top:3px;">
                                                                Signup
                                                            </button>
<!--<a class="btn btn-primary" href="{{route('home')}}" style="margin-top:3px;">Become a Merchant</a>-->
                                                        </div>
                                                    </div>
                                                </form>

                                                <div class="form-group" style="padding-top:3%">

                                                    <div class="col-md-6 social-login" style="padding-top:3%">
                                                        <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> &nbsp; &nbsp; Continue with Facebook</a>
                                                    </div>
                                                    <div class="col-md-6 social-login" style="padding-top:3%">
                                                        <a href="{{ url('/auth/google') }}" class="btn btn-google"><i class="fa fa-google"></i> &nbsp; &nbsp; Continue with Google</a>
                                                    </div>
                                                </div>

                                        </div>





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
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script>
        $.validate();
    </script>
@endsection





