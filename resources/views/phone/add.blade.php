@extends('layouts.other')

@section('content')

<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <nav class="woocommerce-breadcrumb"><a href="home.html">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Sell Phone</nav>

        <div class="content-area">
            <main id="main" class="site-main">
                <article class="page type-page status-publish hentry">
                    <header class="entry-header"><h1 itemprop="name" class="entry-title">Sell Phone</h1></header><!-- .entry-header -->



                    <div id="customer_details" class="col2-set">
                        <div class="col-md-12">
                            <div class="woocommerce-billing-fields">
                                <h3>Phone Details</h3>
                            </div>
                            <div id="status" style="display: none;">
                                <div class="col-md-3"></div>
                                <div class="col-md-7">
                                    <img src="https://cdn.dribbble.com/users/26878/screenshots/2383608/upload2.gif" >
                                    <h3 style="color: #5cdb7a; padding-left:5%">WE ARE WORKING ON YOUR ADVERTISEMENT.</h3>
                                    <h4 style="
                                    color: #1e1e1e;
                                    PADDING-LEFT: 19%;
                                    ">IT WILL BE LIVE WITHIN A MOMENT</h4>
                                    <p style="padding-left:37%"> Do not click back or refresh</p>
                                </div>
                            </div>

                        </div>
                        @include('layouts.error')
                        <form id="phoness" enctype="multipart/form-data" action="{{route('phone.add')}}" class="checkout woocommerce-checkout" method="post" name="checkout">

                            {{csrf_field()}}
                            <h2>Choose Phone Brand</h2>
                            <section class="col-md-offset-1" data-step="0">


                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3" id="apple">
                                    <img src="{{asset('images/5791fc16d33c7.jpg')}}" class="productimg">
                                </div>

                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3" id="samsung">
                                    <img src="{{asset('images/5ed902c9-a40a.jpg')}}" class="productimg">
                                </div>

                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3" id="asus">
                                    <img src="{{asset('images/asus.jpg')}}" class="productimg">
                                </div>

                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3" id="blackberry">
                                    <img src="{{asset('images/blackberry.png')}}" class="productimg">
                                </div>

                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3" id="nokia">
                                    <img src="{{asset('images/nokia.png')}}" style="     height: 25px;
                                    width: 105px;
                                    margin-left: 32%;
                                    margin-top: 19%;">
                                </div>

                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3" id="gionee">
                                    <img src="{{asset('images/gionee.jpg')}}" class="productimg">
                                </div>

                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3" id="google">
                                    <img src="{{asset('images/google.jpg')}}" class="productimg">
                                </div>

                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3" id="htc">
                                    <img src="{{asset('images/Htc.jpg')}}" class="productimg">
                                </div>

                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3" id="huawei">
                                    <img src="{{asset('images/huawei.jpg')}}" class="productimg">
                                </div>

                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3" id="intex">
                                    <img src="{{asset('images/intex.jpg')}}" class="productimg">
                                </div>

                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3" id="karbon">
                                    <img src="{{asset('images/karbon.jpg')}}" class="productimg">
                                </div>

                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3" id="lenovo">
                                    <img src="{{asset('images/lenovo.jpg')}}" class="productimg">
                                </div>

                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3" id="lg">
                                    <img src="{{asset('images/lg.jpg')}}" class="productimg">
                                </div>

                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3" id="mi">
                                    <img src="{{asset('images/mi.jpg')}}" class="productimg">
                                </div>

                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3" id="micromax">
                                    <img src="{{asset('images/micromax.jpg')}}" class="productimg">
                                </div>

                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3" id="motorola">
                                    <img src="{{asset('images/motorola.jpg')}}" class="productimg">
                                </div>

                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3" id="oneplus">
                                    <img src="{{asset('images/oneplus.jpg')}}" class="productimg">
                                </div>

                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3" id="oppo">
                                    <img src="{{asset('images/oppo.jpg')}}" class="productimg">
                                </div>

                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3" id="panasonic">
                                    <img src="{{asset('images/panasonic.jpg')}}" class="productimg">
                                </div>

                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3" id="vivo">
                                    <img src="{{asset('images/vivo.png')}}" class="productimg">
                                </div>

                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3" id="xolo">
                                    <img src="{{asset('images/xolo.jpg')}}" class="productimg">
                                </div>

                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3" id="sony">
                                    <img src="{{asset('images/sony.png')}}" class="productimg">
                                </div>

                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3" id="honor">
                                    <img src="{{asset('images/honor.png')}}" class="productimg">
                                </div>

                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3 " id="lava">
                                    <img src="{{asset('images/lava.png')}}" class="productimg">
                                </div>

                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3  m-b-1" id="lyf">
                                    <img src="{{asset('images/lyf.png')}}" class="productimg">
                                </div>

                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3" id="coolpad">
                                    <img src="{{asset('images/coolpad.png')}}" class="productimg">
                                </div>

                                <div class="col-sm-6 col-md-3 thumbnail yo m-r-3" id="vertu">
                                    <img src="{{asset('images/vertu.png')}}" class="productimg">
                                </div>


                            </section>

                            <h2>Choose Model</h2>

                            <section data-step="1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <select class="input-text modd" id="modd" name="model">
                                            <option value="0" disabled="true" selected="true">Model</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="padding-top:3%">
                                    <div class="col-md-12"><span id="billing_email_field" class="validate-required"><label class="" for="billing_email">Multiple Quantitiy ?<abbr title="required" class="required">*</abbr></label></span>
                                        &nbsp; &nbsp; <input type="checkbox" id="isMore" name="isMore" onclick="showQuantity()" >
                                    </div>
                                </div><br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <p id="billing_postcode_field" class="address-field validate-postcode validate-required" data-o_class="form-row-last address-field validate-required validate-postcode"><label class="" for="billing_postcode">Physical Condition<abbr title="required" class="required">*</abbr></label>
                                            <select class="input-text" name="physical_condition">
                                                <option value="good" selected="true">Good</option>
                                                <option value="average">Average</option>
                                                <option value="belowavg">Below Average</option>
                                            </select>
                                        </p>
                                    </div>

                                </div>

                            </section>

                            <h2>Plan how your Product looks ? </h2>
                            <section data-step="2">
                                <div style="position: relative">

                                    <div class="col-md-4 imagex"> <img id="blah" src="{{asset('images/logo1.png')}}" alt="your image" /></div>
                                    <div class="badge hidden stamp"><img src="https://phonefriend.in/images/phonefriend-logo.png" style="height:150px"></div>
                                    <div class="col-md-8">
                                        <span id="billing_company_field" class="form-row form-row form-row-wide"><label class="" for="billing_company">Display Picture<abbr title="Display Picture" class="required">*</abbr></label><input type="file" id="imgInp" class="input-text " name="dp" /></span>
                                        <span id="billing_company_field" class="form-row form-row form-row-wide"><label class="" for="billing_company">More photos (can attach more than one)<abbr title="Only 4 Required" class="required">*</abbr></label><input type="file" class="input-text " name="photos[]" multiple accept="image/*"/></span>
                                    </div>

                                </div>
                            </section>

                            <h2>Tell us some details</h2>
                            <section data-step="3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p id="billing_state_field" class="form-row form-row validate-required validate-email"><label class="" for="billing_state">Unavailable Accessories (if any)<abbr title="required" class="required">*</abbr></label>
                                            <select id="accessory_list" class="input-text selectt" name="accessories[]" multiple="multiple" style="width: 100%">
                                                @foreach($accessories as $id=>$accessory)
                                                <option value="{{$id}}">{{$accessory}}</option>
                                                @endforeach
                                            </select>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p id="billing_city_field" class="form-row form-row form-row-wide address-field validate-required" data-o_class="form-row form-row form-row-wide address-field validate-required"><label class="" for="billing_city">Physical Appearence<abbr title="required" class="required">*</abbr></label>
                                            <select id="conditions_list" class="input-text selectt" name="conditions[]" multiple="multiple" style="width: 100%">
                                                @foreach($conditions as $id=>$condition)
                                                <option value="{{$id}}">{{$condition}}</option>
                                                @endforeach
                                            </select>
                                        </p>

                                    </div>
                                </div>
                                <div class="row"  id="imei">
                                    <div class="col-md-12"><span id="billing_email_field" class="validate-required"><label class="" for="billing_email">IMEI-1<abbr title="required" class="required">*</abbr></label></span><input type="text" value="" placeholder="" id="imei11" name="imei1" class="input-text " maxlength="15"></div>
                                </div>
                                <div class="row" style=" display:none" id="quantity">
                                    <div class="col-md-12"><span id="billing_email_field" class="validate-required"><label class="" for="billing_email">Number Of Units<abbr title="required" class="required">*</abbr></label></span><input type="number"  placeholder="" id="units" name="units" class="input-text "></div>
                                </div>
                                <br>
                                <div class="row" id="color">
                                    <div class="col-md-6">
                                        <p id="billing_city_field" class="form-row form-row form-row-wide address-field validate-required" data-o_class="form-row form-row form-row-wide address-field validate-required"><label class="" for="billing_city">Phone Color<abbr title="required" class="required">*</abbr></label>
                                            <select id="phone_color" class="input-text selectt" name="color[]" multiple="multiple" style="width: 100%"> 
                                                <option value="White">White</option>
                                                <option value="Black">Black</option>
                                                <option value="Blue">Blue</option>
                                                <option value="Red">Red</option>
                                                <option value="Green">Green</option>
                                                <option value="Maroon">Maroon</option>
                                                <option value="Orange">Orange</option>
                                                <option value="Yellow">Yellow</option>
                                                <option value="Purple">Purple</option>
                                                <option value="Tan">Tan</option>
                                                <option value="Olive">Olive</option>
                                                <option value="Lime">Lime</option>
                                                <option value="Silver">Silver</option>
                                                <option value="Pink">Pink</option>
                                                <option value="Grey">Grey</option>
                                            </select>
                                        </p>

                                    </div>
                                </div>

                                <br>

                                <div class="row" id="color">
                                    <div class="col-md-6">
                                        <p id="billing_city_field" class="form-row form-row form-row-wide address-field validate-required" data-o_class="form-row form-row form-row-wide address-field validate-required">
                                            <label class="" for="specifications">Specifications
                                                <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <!-- <textarea name="specifications" class="input-text" id="specifications" cols="30" rows="10"></textarea> -->

                                            <textarea class="input-text " name="testingAdd" id="testingAdd"></textarea>
                                        </p>

                                    </div>
                                </div>

                                <br>
                                <div class="row ">
                                   <div class="col-md-12">
                                       <p id="billing_country_field" class="form-row-wide validate-required validate-email"><label class="" for="billing_country">Device Age<abbr title="required" class="required">*</abbr></label><select class="input-text" name="age">
                                           <option value="newest" selected="true">0 - 1 Month</option>
                                           <option value="newer">1 - 2 Months</option>
                                           <option value="newerer">2 - 3 Months</option>
                                           <option value="new">3 - 4 Months</option>
                                           <option value="seminew" >4 - 5 Months</option>
                                           <option value="moderatenew" >5 - 6 Months</option>
                                           <option value="moderatenormal" >6 - 7 Months</option>
                                           <option value="normal" >7 - 8 Months</option>
                                           <option value="moderateold" >8 - 9 Months</option>
                                           <option value="semiold" >9 - 10 Months</option>
                                           <option value="old" >10 - 11 Months</option>
                                           <option value="older" >11 - 12 Months</option>
                                           <option value="oldest" >12+ Months</option>


                                       </select></p><div class="clear"></div>
                                   </div>
                               </div>
                               <div class="row">
                                <div class="col-md-12">
                                    <span id="billing_address_1_field" class="form-row-wide address-field validate-required"><label class="" for="billing_address_1">Price <abbr title="required" class="required">*</abbr></label></span><input type="text" value="" placeholder="Price"  id="price" name="price" class="input-text ">

                                </div>
                            </div><br>
                        </section>
                    </form>
                </div>



            </div></p>


        </article>
    </main><!-- #main -->
</div><!-- #primary -->
</div><!-- .container -->
</div><!-- #content -->




@endsection


@section('scripts')
<script type="text/javascript" src="https://phonefriend.in/assets/js/ckeditor/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('assets/js/formvalidation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/pure.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.steps.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<script type="text/javascript">
   //ckInstance.removeAllListeners();
//CKEDITOR.remove(ckInstance);

    CKEDITOR.replace( 'testingAdd',
         {
          customConfig : 'config.js',
          toolbar : 'simple'
          })
    $(document).ready(function(){

        $(document).on('click','.yo',function(){
            var company=$(this).attr('id');
            var div=$(this).parent().parent();
            console.log(company);
            var op=" ";

            $.ajax({
                type:'get',
                url:'{!!URL::to('/apis/getmodel')!!}',
                data:{'company':company},
                success:function(data){
                    console.log(data.length);
                    op+='<option value="0" selected disabled>Choose Model</option>';
                    for(var i=0;i<data.length;i++){
                        op+='<option value="'+data[i].id+'">'+data[i].model+'  -  '+data[i].storage+'GB'+'</option>';
                    }

                    div.find('#modd').html(" ");
                    div.find('#modd').append(op);
                    $("#phoness").steps("next");
                },
                error:function(){

                }
            });
        });

    });
</script>





<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
    function showQuantity() {
        // Get the checkbox
        var checkBox = document.getElementById("isMore");
        // Get the output text
        var imei = document.getElementById("imei");
        var imei1 = document.getElementById("imei11");
        var qty = document.getElementById("quantity");
        var units = document.getElementById("units");

        // If the checkbox is checked, display the output text
        if (checkBox.checked == true){
            imei.style.display = "none";
            imei1.value="";
            units.value="";
            qty.style.display = "block";
        } else {
            imei.style.display = "block";
            imei1.value='';
            units.value='';
            qty.style.display = "none";
        }
    }
</script>

<script>
    var form = $("#phoness");
    $(function () {
        $("#phoness").steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            labels: {finish: "Sell Phone"},
            onStepChanging: function (e, currentIndex, newIndex) {
                if(currentIndex < newIndex) {
                    var fv = $('#phoness').data('formValidation'), // FormValidation instance
                        // The current step container
                        $container = $('#phoness').find('section[data-step="' + currentIndex + '"]');

                    // Validate the container
                    fv.validateContainer($container);

                    var isValidStep = fv.isValidContainer($container);
                    if (isValidStep === false || isValidStep === null) {
                        // Do not jump to the next step
                        return false;
                    }
                }

                return true;

            },
            // Triggered when clicking the Finish button
            onFinishing: function (e, currentIndex) {
                var fv = $('#phoness').data('formValidation'),
                $container = $('#phoness').find('section[data-step="' + currentIndex + '"]');

                // Validate the last step container
                fv.validateContainer($container);

                var isValidStep = fv.isValidContainer($container);
                if (isValidStep === false || isValidStep === null) {
                    return false;
                }

                document.getElementById("phoness").submit();
                return true;
            },
            onFinished: function (e, currentIndex) {
                document.getElementById("phoness").submit();
                $("#phoness").hide();
                $("#status").show();
            }
        }).formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'fa fa-check',
                invalid: 'fa fa-exclamation',
                validating: 'glyphicon glyphicon-refresh'
            },
            // This option will not ignore invisible fields which belong to inactive panels
            excluded: ':disabled',
            fields: {
                model: {
                    validators: {
                        notEmpty: {
                            message: 'Phone Model is required'
                        },
                    }
                },
                'accessories[]': {
                    validators: {
                        notEmpty: {
                            message: 'No accessories ? Select No accessories'
                        },
                    }
                },
                'conditions[]': {
                    validators: {
                        notEmpty: {
                            message: 'No Damage ? Select No conditions'
                        },
                    }
                },
                'dp': {
                    validators: {
                        notEmpty: {
                            message: 'Providing us with an impressive Display Image helps attract buyers'
                        },
                    }
                },
                'photos[]': {
                    validators: {
                        notEmpty: {
                            message: 'Providing us with impressive Product Images helps attract buyers'
                        },
                    }
                },
                'imei1': {
                    validators: {
                        numeric: {
                            message: 'Your IMEI-1 should be numeric'
                        },
                        stringLength: {
                            min: 15,
                            max: 15,
                            message: 'The IMEI-1 must be of 15 characters long'
                        },
                    }
                },
                'age': {
                    validators: {
                        notEmpty: {
                            message: 'Select how old is your device'
                        },
                    }
                },
                'price': {
                    validators: {
                        notEmpty: {
                            message: 'Please input your Price'
                        },
                        numeric: {
                            message: 'Your price should be numeric'
                        },
                    }
                },
                'units': {
                    validators: {
                        greaterThan: {
                            message: 'The no of units must be greater than 1',
                            value: 2,
                            inclusive: true
                        },
                        numeric: {
                            message: 'Units should be numeric'
                        },
                    }
                },
                'condition': {
                    validators: {
                        notEmpty: {
                            message: 'Please input your Devices Physical Condition'
                        },
                    }
                },

            }
        })


        $("#conditions_list").select2({
            theme: "classic",
            width: 'resolve',
            allowClear: true
        });
        $("#accessory_list").select2({
            theme: "classic",
            width: 'resolve',
            allowClear: true
        });
    });

</script>

<script>
    $(document).ready(function() {
        var addclass = 'color';
        var $cols=$('.yo');
        $(document).on('click', '.yo', function (e) {
            $cols.removeClass(addclass);
            $(this).addClass(addclass);
        });
    });
</script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function() {
        $(document).on('change', '#imgInp', function () {
            $('.badge').toggleClass('hidden');
            readURL(this);
        });
    });
</script>

<script>
    $( document ).ready(function() {
       $("#phone_color").select2({
        theme: "classic",
        width: 'resolve',
        allowClear: true
    });

       $('#aa-search-input').on('keydown', function (e) {
        if (e.which == 13) {
            window.location = 'https://phonefriend.in/store/'+document.getElementById('aa-search-input').value.split(' ').join('-');
        }

    });
   });
</script>
@endsection


