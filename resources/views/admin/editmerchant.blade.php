@extends('layouts.dashboard')

@section('content')
    <?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

    ?>
    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 m-b-30 header-title">Add Merchant</h4>
                        @include('layouts.error')
                        <form role="form" id="MerchantForm" data-toggle="validator" action="{{route('merchant.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{ method_field('PATCH') }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Merchant Company Name</label>
                                <input type="text" name="cname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Company Name" value="{{ old('cname', $mrchntinfo[0]->cname) }}" required>
                                <small id="emailHelp" class="form-text text-muted">Company / Shop name.</small>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Merchant Key Person Name</label>
                                <input type="text" name="ckeypersonname" class="form-control" id="exampleInputPassword1" placeholder="Name" value="{{ old('ckeypersonname', $user->name) }}" required>
                                <small id="emailHelp" class="form-text text-muted">Owner Name</small>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Mobile</label>
                                <input type="number" name="cmobile" class="form-control" id="exampleInputPassword1" placeholder="Mobile" value="{{ old('cmobile', $user->phone) }}"required>
                                <small id="emailHelp" class="form-text text-muted">Owner's Mobile number</small>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="text" name="cemail" class="form-control" id="exampleInputPassword1" placeholder="Email" value="{{ old('cemail', $user->email) }}" required>
                                <small id="emailHelp" class="form-text text-muted">Owner's Email</small>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Address</label>
                                <textarea name="caddress" class="form-control" id="exampleInputPassword1" required>{{ old('caddress', $mrchntinfo[0]->caddress) }}</textarea>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">City</label>

                                <select class="form-control selectpicker" data-live-search="true" name="deliver_cityid" id="city" style="width: 100%" required>
                                    <option value="{{$citty->city_id}}" selected="selected">{{$citty->city_name}}</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->city_id}}">{{$city->city_name}}</option>
                                    @endforeach
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">State</label>
                                <input type="text" placeholder="" id="billing_state" name="billing_state" class="form-control" value="{{$citty->state}}" disabled="disabled" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">PIN CODE</label>
                                <input type="text" value="{{ old('pincode', $mrchntinfo[0]->pincode) }}" placeholder="" id="billing_state" name="pincode" class="form-control" required>
                                <div class="help-block with-errors"></div>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputPassword1">CIN Number</label>
                                <input type="text" value="{{ old('cin', $mrchntinfo[0]->cin) }}" placeholder="" id="billing_state" name="cin" class="form-control" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Aadhar Number</label>
                                <input type="text" value="{{ old('caadhar', $mrchntinfo[0]->caadhar) }}" placeholder="" id="billing_state" name="caadhar" class="form-control" required>
                                <div class="help-block with-errors"></div>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputPassword1">GSTIN</label>
                                <input type="text" value="{{ old('gstin', $mrchntinfo[0]->gstin) }}" placeholder="" id="billing_state" name="gstin" class="form-control" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">PAN CARD </label>
                                <input type="text" value="{{ old('pan', $mrchntinfo[0]->pan) }}" placeholder="" id="billing_state" name="pan" class="form-control" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Financial Scale</label>
                                <select class="form-control" name="financial" id="city" style="width: 100%" required>
                                    <option value="$mrchntinfo[0]->financial" selected="selected">{{ucwords($mrchntinfo[0]->financial)}}</option>
                                    <option value="small">Small</option>
                                    <option value="medium">Medium</option>
                                    <option value="large">Large</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Occupation Period (in months) </label>
                                <input type="text" value="{{ old('period', $mrchntinfo[0]->period) }}" placeholder="" id="billing_state" name="period" class="form-control" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Market Score</label>
                                <select class="form-control" name="score" id="city" style="width: 100%" required>
                                    <option value="{{$mrchntinfo[0]->score}}" selected="selected">{{$mrchntinfo[0]->score}}</option>
                                    @for($i=1;$i<=10;$i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Marketed By</label>
                                <input type="text" value="{{ old('marketedby', $mrchntinfo[0]->marketedby) }}" placeholder="" id="billing_state" name="marketedby" class="form-control" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Aadhar Scanned Copy</label><br>
                                <img src="https://www.phonefriend.in/storage{{str_replace("public", "", $mrchntinfo[0]->aadharphoto)}}" style="width: 10%;padding-bottom:1%">
                                <input type="file"  id="billing_state" name="aadharphoto" class="form-control">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">MOU Scanned Copy</label><br>
                                <img src="https://www.phonefriend.in/storage{{str_replace("public", "", $mrchntinfo[0]->mouphoto)}}" style="width: 10%;padding-bottom:1%">
                                <input type="file"  id="billing_state" name="mouphoto" class="form-control">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Account Number</label>
                                <input type="text"  value="{{ old('account', $mrchntinfo[0]->account) }}" id="account" name="account" class="form-control" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Beneficiary Name</label>
                                <input type="text"  value="{{ old('beneficiary', $mrchntinfo[0]->beneficiary) }}" id="beneficiary" name="beneficiary" class="form-control" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">IFSC</label>
                                <input type="text"  value="{{ old('ifsc', $mrchntinfo[0]->ifsc) }}" id="ifsc" name="ifsc" class="form-control" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Bank</label>
                                <input type="text" value="{{ old('bankk', $mrchntinfo[0]->bank) }}" id="bank" name="bankk" class="form-control" readonly required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Branch</label>
                                <input type="text"  id="branch" name="branch" class="form-control" readonly required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">City</label>
                                <input type="text"  id="cityy" name="city" class="form-control" readonly required>
                                <div class="help-block with-errors"></div>
                            </div>

                            </p>
                            <input value="Generate Merchant" type="submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->
        </div>
    </div>
@endsection

@section('scripts')

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.js"></script>

    <script type="text/javascript">$('#MerchantForm').validator().on('submit', function (e) {
            if (e.isDefaultPrevented()) {
                console.log("eroor");
            }
        })</script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('change', '#city', function () {
                var city = $('#city').val();
                $.ajax({
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{!!URL::to('/apis/getstate')!!}',
                    data: {'city': city},
                    success: function (data) {
                        console.log(data[0]);
                        $("#billing_state").val(data[0].state);
                    },
                    error: function () {

                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('keypress', '#ifsc', function (e) {
                var key = e.which;
                if(key == 13)  // the enter key code
                {
                    var ifsc = $('#ifsc').val();
                    console.log(ifsc);
                    $.ajax({
                        type: "GET",
                        url: "https://ifsc.razorpay.com/" + ifsc,
                        data: {},
                        dataType: "json"
                    })
                        .done(function (response) {

                            $("#bank").val(response.BANK);
                            $("#branch").val(response.BRANCH);
                            $("#cityy").val(response.CITY);
                        })
                        .fail(function (jqXHR, exception) {
                            var msg_err = "";
                            if (jqXHR.status === 0) {
                                msg_err = "Not connect. Verify Network.";
                            } else if (jqXHR.status == 404) {
                                msg_err = "Invalid IFSC Code. [404]";
                            } else if (jqXHR.status == 500) {
                                msg_err = "Internal Server Error [500].";
                            } else if (exception === "parsererror") {
                                msg_err = "Requested JSON parse failed.";
                            } else if (exception === "timeout") {
                                msg_err = "Time out error.";
                            } else if (exception === "abort") {
                                msg_err = "Ajax request aborted.";
                            } else {
                                msg_err = "Uncaught Error. " + jqXHR.responseText;
                            }
                            alert(msg_err);
                        })
                        .always(function () {

                        });
                }
            });
        });
    </script>
@endsection