@extends('layouts.other')

@section('meta')
    <title>Login to buy second hand mobile phones online | Mobile Phone repair | Phone Friend</title>
    <meta name="description" content="Login to buy refurbished, second hand, used, box opened and certified pre owned mobile phones online at affordable prices in India. Mobile Repair Services in Delhi"/>
@endsection

@section('content')
    <style>
        .vl {
            border-left: 2px solid #cccccc;
            height: 50px;
            float: left;
            margin: 0px 10px;
        }

        button.logsign.btn.btn-primary {
            padding: 15px;
        }
        .btn-facebook {
            color: #fff;
            background-color: #3b5998;
            border-color: rgba(0,0,0,0.2);
            width: 100%;
        }
    </style>
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

                                        <div class="col-1">


                                            <h2>Login</h2>

                                            <form method="post" class="login">

                                                <p class="before-login-text">
                                                    Welcome back! Sign in to your account
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
                                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                                    {{ csrf_field() }}

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
                                                        <div class="col-md-6 col-md-offset-4">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                                </label><br>
                                                                <a class="" href="{{ route('password.request') }}">
                                                                    Forgot Password?
                                                                </a>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <?php if(Session::get('newreg')!=='Yes')
                                                    {?>

                                                    <div class="col-md-12 col-md-offset-4">
                                                        <div class="col-md-3 col-xs-4" align="right">
                                                            <button type="submit" class="logsign btn btn-primary" style="float:left;">
                                                                Login
                                                            </button>
                                                        </div>

                                                        <div class="col-md-8 col-xs-6">

                                                            <a class="btn btn-primary logsign" href="{{route('register')}}" >New User! Signup</a>

                                                        </div>
                                                    </div>
                                                    <?php }
                                                    else
                                                    {	?>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary" style="float:left;margin-top: 23px;">
                                                            Login
                                                        </button>
                                                    </div>
                                                    <div class="col-xs-12">&nbsp;</div>
                                                    <hr>
                                                    <?php }?>                                               </form>

                                            </form>


                                            <div class="col-md-12 col-xs-12" style="padding-top:3%">

                                                <div class="col-md-6 social-login" style="padding-top:3%">
                                                    <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> &nbsp; &nbsp; Continue with Facebook</a>
                                                </div>
                                                <div class="col-md-6 social-login" style="padding-top:3%">
                                                    <a href="{{ url('/auth/google') }}" class="btn btn-google"><i class="fa fa-google"></i> &nbsp; &nbsp; Continue with Google</a>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="col-2">


                                            <h2>Checkout as a Guest</h2>

                                            <div class="register-benefits">
                                                <h3>Sign up today and you will be able to :</h3>
                                                <ul>
                                                    <li>Speed your way through checkout</li>
                                                    <li>Track your orders easily</li>
                                                    <li>Keep a record of all your purchases</li>
                                                </ul>
                                            </div>


                                            <div class="col-md-12 col-xs-12" style="padding-top:3%">

                                                <a class="btn col-md-12" style="background-color: #333e48;" href="{{route('checkout')}}" >Checkout as a Guest</a>

                                            </div>
                                            <!-- .col-2 -->

                                        </div><!-- .col2-set -->

                                    </div><!-- /.customer-login-form -->
                                </div><!-- .woocommerce -->
                            </div>
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
