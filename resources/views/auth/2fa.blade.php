@extends('layouts.dashboard')
@section('content')
    <div class="container" style="padding-top: 5%">
        <div class="row">

            <div class="card text-center">
                <div class="card-header">
                    Featured
                </div>
                <div class="card-body">
                    <h5 class="card-title">Two Factor Authentication </h5>
                    <p class="card-text">
                        <p>Two factor authentication (2FA) strengthens access security by requiring two methods (also referred to as factors) to verify your identity. Two factor authentication protects against phishing, social engineering and password brute force attacks and secures your logins from attackers exploiting weak or stolen credentials.</p>
                        <br/>
                        <p>To Enable Two Factor Authentication on your Account, you need to do following steps</p>
                        <strong>
                            <ol>
                                1. Click on Generate Secret Button , To Generate a Unique secret QR code for your profile</br>
                                2. Verify the OTP from Google Authenticator Mobile App
                            </ol>
                        </strong>
                    <br/>

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(!count($data['user']->passwordSecurity))
                            <form class="form-horizontal" method="POST" action="{{ route('generate2faSecret') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="col-md-12 ">
                                        <button type="submit" class="btn btn-primary">
                                            Generate Secret Key to Enable 2FA
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @elseif(!$data['user']->passwordSecurity->google2fa_enable)
                            <strong>1. Scan this barcode with your Google Authenticator App:</strong><br/>
                            <img src="{{$data['google2fa_url'] }}" alt="">
                            <br/><br/>
                            <strong>2.Enter the pin the code to Enable 2FA</strong><br/><br/>
                            <form class="form-horizontal" method="POST" action="{{ route('enable2fa') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('verify-code') ? ' has-error' : '' }}">
                                    <label for="verify-code" class="col-md-4 control-label">Authenticator Code</label>
                                    <div class="col-md-12">
                                        <input id="verify-code" type="password" class="form-control" name="verify-code" required>
                                        @if ($errors->has('verify-code'))
                                            <span class="help-block">
<strong>{{ $errors->first('verify-code') }}</strong>
</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Enable 2FA
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @elseif($data['user']->passwordSecurity->google2fa_enable)
                            <div class="alert alert-success">
                                2FA is Currently <strong>Enabled</strong> for your account.
                            </div>
                            <p>If you are looking to disable Two Factor Authentication. Please confirm your password and Click Disable 2FA Button.</p>
                            <form class="form-horizontal" method="POST" action="{{ route('disable2fa') }}">
                                <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                    <label for="change-password" class="col-md-4 control-label">Current Password</label>
                                    <div class="col-md-12">
                                        <input id="current-password" type="password" class="form-control" name="current-password" required>
                                        @if ($errors->has('current-password'))
                                            <span class="help-block">
<strong>{{ $errors->first('current-password') }}</strong>
</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-md-offset-5">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-primary ">Disable 2FA</button>
                                </div>
                            </form>
                            @endif
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{asset('assets/js/bootstrap-pincode-input.js')}}"></script>

    <script type="text/javascript">

        $('#verify-code').pincodeInput({

            // 4 input boxes = code of 4 digits long
            inputs:6,

            // hide digits like password input
            hideDigits:true,

            // keyDown callback
            keydown : function(e){},

            // callback on every input on change (keyup event)
            change: function(input,value,inputnumber){
                //input = the input textbox DOM element
                //value = the value entered by user (or removed)
                //inputnumber = the position of the input box (in touch mode we only have 1 big input box, so always 1 is returned here)
            },

            // callback when all inputs are filled in (keyup event)
            complete : function(value, e, errorElement){
                // value = the entered code
                // e = last keyup event
                // errorElement = error span next to to this, fill with html
                // e.g. : $(errorElement).html("Code not correct");
            }

        });
    </script>
@endsection
