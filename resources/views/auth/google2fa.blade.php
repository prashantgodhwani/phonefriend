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
            <p class="card-text">Two factor authentication (2FA) strengthens access security by requiring two methods (also referred to as factors) to verify your identity. Two factor authentication protects against phishing, social engineering and password brute force attacks and secures your logins from attackers exploiting weak or stolen credentials.</p>
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
            <strong>Enter the pin from Google Authenticator Enable 2FA</strong><br/><br/>
            <form class="form-horizontal" action="{{ route('2faVerify') }}" method="POST">
                {{ csrf_field() }}
                <div class="text-center form-group{{ $errors->has('one_time_password-code') ? ' has-error' : '' }}">
                    <label for="one_time_password" class="col-md-4 control-label">One Time Password</label><br>
                    <div class="col-md-12">
                        <input id="demo" name="one_time_password" class="form-control col-md-offset-8"  type="text" required/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Authenticate</button>
                    </div>
                </div>
            </form>

        </div>
        <div class="card-footer text-muted">
           Check your Google Authenticator Application.
        </div>
    </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('assets/js/bootstrap-pincode-input.js')}}"></script>

    <script type="text/javascript">

    $('#demo').pincodeInput({

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

