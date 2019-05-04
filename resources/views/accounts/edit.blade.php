@extends('layouts.other')
<style>
<style>
* {
    box-sizing: border-box;
}

.column {
    float: left;
    width: 33.33%;
    padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
    content: "";
    clear: both;
    display: table;
}
</style>
</style>
@section('content')
<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <nav class="woocommerce-breadcrumb" ><a href="home.html">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Laptops &amp; Computers</nav>

        <div id="primary" class="content-area">


            <div >
                <main id="main" class="site-main">
                    <article class="page type-page status-publish hentry">


                        {!! Form::open(['route' => ['phone.store',$phone->id], 'method' => 'patch','files' => true]) !!}

                        <div id="customer_details" class="col2-set">
                            <div class="yup col-md-12">
                                <div class="woocommerce-billing-fields">

                                    <h3>Edit Phone Details</h3>
                                    @include('layouts.error')

                                    <p id="billing_first_name_field" class="form-row form-row form-row-first validate-required"><label class="" for="billing_first_name">Company<abbr title="required" class="required">*</abbr></label>
                                        <select name="company" id="company" class="input-text company" name="company">
                                            <option value="{{$phone->data->company}}" disabled="true" selected="true">{{ucwords($phone->data->company)}}</option>
                                            <option value="apple">Apple</option>
                                            <option value="nokia">Nokia</option>
                                            <option value="micromax">Micromax</option>
                                            <option value="samsung">Samsung</option>
                                            <option value="motorola">Motorola</option>
                                            <option value="vivo">Vivo</option>

                                            <option value="oppo">Oppo</option>
                                            <option value="sony">Sony</option>
                                            <option value="oneplus">One Plus</option>
                                            <option value="mi">Mi</option>
                                            <option value="panasonic">Panasonic</option>
                                            <option value="blackberry">Blackberry</option>                                               
                                            <option value="honour">Honour</option>
                                            <option value="google">Google</option>
                                            <option value="lenovo">Lenovo</option>
                                            <option value="gionee">Gionee</option>
                                            <option value="xolo">Xolo</option>
                                        </select>
                                    </p>


                                    <p id="billing_last_name_field" class="form-row form-row form-row-last validate-required"><label class="" for="billing_last_name">Model<abbr title="required" class="required">*</abbr></label>
                                        <select class="input-text modd" id="modd" name="model">
                                            <option value="{{$phone->data->id}}"  selected="true">{{$phone->data->model." - ".$phone->data->storage}} GB</option>
                                        </select>
                                    </p>
                                    @if($phone->imei1)
                                    <p id="billing_email_field" class="form-row  form-row form-row-wide  validate-required"><label class="" for="billing_email">IMEI-1<abbr title="required" class="required">*</abbr></label>{!!Form::text('imei1', $phone->imei1, ['class'=>'input-text','maxlength'=>'15']) !!}</p>
                                    @else

                                    @endif
                                    <p id="billing_email_field" class="form-row  form-row form-row-wide  validate-required"><label class="" for="billing_email">Units of Product<abbr title="required" class="required">*</abbr></label><input type="number" value="{{$phone->units}}" name="units" class="input-text"> </p>

                                    <p id="billing_city_field" class="form-row form-row form-row-wide address-field validate-required" data-o_class="form-row form-row form-row-wide address-field validate-required"><label class="" for="billing_city">Phone Color<abbr title="required" class="required">*</abbr></label>

                                     <select class="input-text selectt form-control" name="color[]" id="phone_color" multiple="multiple">
                                        <?php $phoneColor =  explode(',', $phone->color); ?>
                                        <option value="White" {{ in_array("White",$phoneColor) ? "selected":""}}>White</option>
                                        <option value="Black" {{ in_array("Black",$phoneColor) ? "selected":""}}>Black</option>
                                        <option value="Blue" {{ in_array("Blue",$phoneColor) ? "selected":""}}>Blue</option>
                                        <option value="Red" {{ in_array("Red",$phoneColor) ? "selected":""}}>Red</option>
                                        <option value="Green" {{ in_array("Green",$phoneColor) ? "selected":""}}>Green</option>
                                        <option value="Maroon" {{ in_array("Maroon",$phoneColor) ? "selected":""}}>Maroon</option>
                                        <option value="Orange" {{ in_array("Orange",$phoneColor) ? "selected":""}}>Orange</option>
                                        <option value="Yellow" {{ in_array("Yellow",$phoneColor) ? "selected":""}}>Yellow</option>
                                        <option value="Purple" {{ in_array("Purple",$phoneColor) ? "selected":""}}>Purple</option>
                                        <option value="Tan" {{ in_array("Tan",$phoneColor) ? "selected":""}}>Tan</option>
                                        <option value="Olive" {{ in_array("Olive",$phoneColor) ? "selected":""}}>Olive</option>
                                        <option value="Lime" {{ in_array("Lime",$phoneColor) ? "selected":""}}>Lime</option>
                                        <option value="Silver" {{ in_array("Silver",$phoneColor) ? "selected":""}}>Silver</option>
                                        <option value="Pink" {{ in_array("Pink",$phoneColor) ? "selected":""}}>Pink</option>
                                        <option value="Grey" {{ in_array("Grey",$phoneColor) ? "selected":""}}>Grey</option>
                                    </select>   

                                </p><div class="clear"></div>


                                <p id="billing_city_field" class="form-row form-row form-row-wide address-field validate-required" data-o_class="form-row form-row form-row-wide address-field validate-required">
                                    <label class="" for="specification">Specifications<abbr title="required" class="required">*</abbr>
                                    </label>
                                    <!-- <textarea name="specifications" class="input-text" id="specifications" cols="30" rows="10">{{$phone->specifications}}</textarea> -->
                                    <textarea class="input-text ckeditor" name="specifications" id="specifications"></textarea>
                                    

                                </p><div class="clear"></div>


                                <p id="billing_country_field" class="form-row form-row form-row-wide validate-required validate-email"><label class="" for="billing_country">Device Age<abbr title="required" class="required">*</abbr></label>

                                 <select class="input-text" name="age">

                                     <option value="newest" <?php if($phone->age=='0 - 1 Month'){ echo "selected";}?>>0 - 1 Month</option>
                                     <option value="newer" <?php if($phone->age=='1 - 2 Month'){ echo "selected";}?>>1 - 2 Months</option>
                                     <option value="newerer" <?php if($phone->age=='2 - 3 Month'){ echo "selected";}?>>2 - 3 Months</option>
                                     <option value="new" <?php if($phone->age=='3 - 4 Month'){ echo "selected";}?>>3 - 4 Months</option>
                                     <option value="seminew" <?php if($phone->age=='4 - 5 Month'){ echo "selected";}?>>4 - 5 Months</option>
                                     <option value="moderatenew" <?php if($phone->age=='5 - 6 Month'){ echo "selected";}?>>5 - 6 Months</option>
                                     <option value="moderatenormal" <?php if($phone->age=='6 - 7 Month'){ echo "selected";}?>>6 - 7 Months</option>
                                     <option value="normal" <?php if($phone->age=='7 - 8 Month'){ echo "selected";}?>>7 - 8 Months</option>
                                     <option value="moderateold" <?php if($phone->age=='8 - 9 Month'){ echo "selected";}?>>8 - 9 Months</option>
                                     <option value="semiold" <?php if($phone->age=='9 - 10 Month'){ echo "selected";}?>>9 - 10 Months</option>
                                     <option value="old"  <?php if($phone->age=='10 - 11 Months'){ echo "selected";}?>>10 - 11 Months</option>
                                     <option value="older"<?php if($phone->age=='11 - 12 Months'){ echo "selected";}?>>11 - 12 Months</option>
                                     <option value="oldest"<?php if($phone->age=='12+ Months'){ echo "selected";}?>>12+ Months</option></select>

                                 </p><div class="clear"></div>

                                 <p id="billing_address_1_field" class="form-row form-row form-row-wide address-field validate-required"><label class="" for="billing_address_1">Price <abbr title="required" class="required">*</abbr></label><input type="text" value="{{$phone->price}}" placeholder="Price"  name="price" class="input-text "></p>

                                 <p id="billing_city_field" class="form-row form-row form-row-wide address-field validate-required" data-o_class="form-row form-row form-row-wide address-field validate-required"><label class="" for="billing_city">Mobile Condition <abbr title="required" class="required">*</abbr></label>
                                    {!!Form::select('conditions[]', $conditions, $phone->conditions->pluck('id')->toArray(), ['id'=>'conditions_list','class' => 'form-control','selectt','input-text','multiple'])!!}


                                </p>

                                <p id="billing_state_field" class="form-row form-row form-row-first validate-required validate-email"><label class="" for="billing_state">Accessories <abbr title="required" class="required">*</abbr></label>
                                    {!!Form::select('accessories[]', $accessories, $phone->accessories->pluck('id')->toArray(), ['id'=>'accessory_list','class' => 'form-control','selectt','input-text','multiple'])!!}
                                </p>

                                <p id="billing_postcode_field" class="form-row form-row form-row-last address-field validate-postcode validate-required" data-o_class="form-row form-row form-row-last address-field validate-required validate-postcode"><label class="" for="billing_postcode">Physical Condition<abbr title="required" class="required">*</abbr></label>
                                    {!!Form::select('condition', ['good'=>'Good','average'=>'Average','belowavg'=>'Below Average'], null, ['class' => 'input-text'])!!}

                                </p>



                                <div class="clear"></div>


                                <div style="position: relative">

                                    <div class="col-md-4 imagex"> <img id="blah" src="{{URL('/storage/'.str_replace('public','',$phone->dp))}}" alt="your image" /></div>

                                    <div class="col-md-8">
                                        <span id="billing_company_field" class="form-row form-row form-row-wide"><label class="" for="billing_company">Display Picture<abbr title="Display Picture" class="required">*</abbr></label><input type="file" id="imgInp" class="input-text " name="update_dp" /></span>
                                        <input type="hidden" name="dp" value="{{$phone->dp}}">

                                        <div class="row">
                                            @foreach($photos as $photo)
                                            <div class="column">
                                                <img src="{{URL('/storage/'.str_replace('public','',$photo->filename))}}" alt="Image" style="width:100%">
                                            </div>
                                            @endforeach
                                        </div>

                                        <span id="billing_company_field" class="form-row form-row form-row-wide"><label class="" for="billing_company">More photos (can attach more than one)<abbr title="Only 4 Required" class="required">*</abbr></label><input type="file" class="input-text " name="photos[]" multiple accept="image/*"/></span>
                                    </div>

                                </div>

                                <input type="submit" name="submit" value="Save Changes" class="btn btn-success">

                            </div>
                        </div>


                    </div>
                </form>
            </article>
        </main><!-- #main -->
    </div><!-- #primary -->
</div>

<div id="sidebar" class="sidebar" role="complementary">
    <aside class="widget woocommerce widget_product_categories electro_widget_product_categories">
        <ul class="product-categories category-single">
            <li class="product_cat">

                <ul>
                    <li class="cat-item current-cat"><a href="{{route('account')}}">Manage Your Account</a> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>

                        <ul class='children'>
                            <li class="cat-item"><a href="{{route('phone.add')}}">Sell a Phone</a> </li>
                            <li class="cat-item"><a href="{{route('phones.show')}}"><b>My Phones</b></a> </li>


                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>


</div>

</div><!-- .container -->
</div><!-- #content -->
@endsection

@section('scripts')

<script type="text/javascript" src="https://phonefriend.in/assets/js/ckeditor/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript">
CKEDITOR.replace( 'specifications',
         {
          customConfig : 'config.js',
          toolbar : 'simple'
          })
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

        $("#phone_color").select2({
            theme: "classic",
            width: 'resolve',
            allowClear: true
        });

        $(document).on('change', '#imgInp', function () {
            $('.badge').toggleClass('hidden');
            readURL(this);
        });
    });


    $(document).ready(function(){

        $(document).on('change','.company',function(){
            var company=$(this).val();
            var div=$(this).parent().parent();

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
                },
                error:function(){

                }
            });
        });

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
<script type="text/javascript" src="{{asset('assets/js/tether.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/echo.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/wow.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.easing.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/electro.js')}}"></script>
@endsection


