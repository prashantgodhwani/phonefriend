@extends('layouts.master')
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


                                            <h2>Become a Merchant</h2>

                                            <div class="register-benefits">
                                                <h3>Become a Merchant today and you will be able to :</h3>
                                                <ul>
                                                    <li>Speed your way through checkout</li>
                                                    <li>Track your orders easily</li>
                                                    <li>Keep a record of all your purchases</li>
                                                </ul>
                                            </div><BR>

                                            <p class="form-row">
                                                <a class="button" href="{{route('home')}}">Become a Merchant</a>
                                            </p>


                                        </div><!-- .col-1 -->

                                        <div class="col-md-6">

                                            <h2>Two Factor Authentication</h2>

                                            <form method="post" class="register">



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
                                                <form class="form-horizontal" method="POST" action="{{ route('verifyotp') }}">
                                                    {{ csrf_field() }}

                                                    <span class="col-md-10 col-md-offset-2" style="    padding-left: 5%;"> Check your email and click on the link to verify. </span><br>

                                                    <hr class="hr-text" data-content="OR">

                                                    <div class="userAuth-card form-group{{ $errors->has('otp') ? ' has-error' : '' }}">
                                                        <img src="{{asset('assets/images/userAuthSpritev3.png')}}" class="otpimg"><br>
                                                        <label for="otp" class="col-md-12 control-label otpimg">Please enter OTP sent to: {{Session::get('phone')}}</label>

                                                        <div class="col-md-12 form-group">
                                                            <input id="otp" type="number" min="0" style="width: 100%;   font-size: 2em;" data-validation="number,length" data-validation-length="6-6" class="form-control otpValueCode" name="password" required >

                                                            @if ($errors->has('otp'))
                                                                <span class="help-block">
                                        <strong>{{ $errors->first('otp') }}</strong>
                                    </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-8 col-md-offset-4">
                                                            <button type="submit" class="btn btn-primary">
                                                                Continue
                                                            </button>

                                                        </div>
                                                    </div>
                                                </form>


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





