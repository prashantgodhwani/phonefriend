@extends('layouts.other')

@section('content')
    <div id="content" class="site-content" tabindex="-1">
        <div class="container">

            <nav class="woocommerce-breadcrumb" ><a href="https://phonefriend.in">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Laptops &amp; Computers</nav>

            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <section>
                        <header>
                            <h2 class="h1">My Orders</h2>
                        </header>
                        <div class="woocommerce columns-6">
                            <div class="tab-pane active panel entry-content wc-tab" id="tab-specification">
                                @include('layouts.success')
                                @foreach($orders as $order)
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                        <div class="col-md-10">
                                        <b>ORDER ID : </b>{{$order->order_id}}
                                        </div>
                                        <div class="col-md-2">
                                                <b>
                                                    @if($order->order_status == "Success")
                                                        <span style="color:green">SUCCESSFUL</span>
                                                    @endif
                                                </b><br>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group">

                                            @foreach($order->orderdevices as $device)
                                            <?php 
                                            $warranty = 0;

												if (strpos($device->phone_color, 'Warranty') !== false) { 
													$exp = explode(' ',$device->phone_color);
													$month = $exp[1];
													
													?>
													 <li class="list-group-item">
                                                    <div class="row">
                                                    <div class="col-md-3">

                                                        <img style="width:70px" src="https://www.phonefriend.in/storage{{str_replace("public", "", App\Phone::find($device->phone_id)->photos->first()->filename)}}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <!--<b>{{ucwords(App\Phone::find($device->phone_id)->data->company)}} {{App\Phone::find($device->phone_id)->data->model}}</b><br>-->
                                                        <!--<span>Seller : #PHONEFR01{{App\Phone::find($device->phone_id)->user->id}}</span>-->
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>
															
                                                            {{ucwords(App\Phone::find($device->phone_id)->data->company)}} {{App\Phone::find($device->phone_id)->data->model}} with {{$device->phone_color}}
                                                        </b>
                                                    </div>
                                                        <div class="col-md-3">
                                                            <b> ₹ {{ number_format(App\Phone::find($device->phone_id)->price)}} + {{ number_format(App\Phone::find($device->phone_id)->price*$month/100)}}</b><br>
                                                            <!--<span style="color:darkred">NO OFFERS</span>-->
                                                        </div>

                                                    </div>
                                                </li>
													
												
												<?php }else{?>
													 <li class="list-group-item">
                                                    <div class="row">
                                                    <div class="col-md-3">

                                                        <img style="width:70px" src="https://www.phonefriend.in/storage{{str_replace("public", "", App\Phone::find($device->phone_id)->photos->first()->filename)}}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>{{ucwords(App\Phone::find($device->phone_id)->data->company)}} {{App\Phone::find($device->phone_id)->data->model}}</b><br>
                                                        <span>Seller : #PHONEFR01{{App\Phone::find($device->phone_id)->user->id}}</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>
															
                                                            {{$device->phone_color}}
                                                        </b>
                                                    </div>
                                                        <div class="col-md-3">
                                                            <b> ₹ {{ number_format(App\Phone::find($device->phone_id)->price)}}</b><br>
                                                            <span style="color:darkred">NO OFFERS</span>
                                                        </div>

                                                    </div>
                                                </li>
													
													<?php }?>
                                               
                                        </ul>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="card-footer text-muted">
                                        <div class="row">
                                        <div class="col-md-6">
                                            <b>ORDERED : </b> {{\Carbon\Carbon::parse($order->created_at)->toDayDateTimeString()}}
                                        </div>
                                        <div class="col-md-4">
                                            <b>ORDER TOTAL : </b> ₹ {{ number_format($order->amount, 2) }}
                                        </div>  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
										<div class="col-md-2">
										<?php $datetime1 = new DateTime();
$datetime2 = new DateTime($order->created_at);
 $order->created_at."<br>";
$interval = $datetime1->diff($datetime2);
 $hourse = $interval->format('%h');
 $day = $interval->format('%a');
if($hourse<=12 && $day<=1)
{?>
<input type="button" id="{{$order->id}}" data-toggle="modal" data-target="#myModal" class="cancel" value="Cancel Order" style="background-color: brown;
    color: #fff;
    margin-right: 20px !important;
    width: 130px;
">
 
<?php } ?>
										
										</div>
                                    </div>
                                    </div>
                                </div>
                                   @endforeach
                                <div class="card">
                                    <div class="card-header">
                                        <P style="text-align: center"><B>NO MORE ORDERS </B></P>
                                    </div>
                                </div>
                            </div><!-- /.panel -->
                        </div>
                    </section>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Please give us a reason why you want to cancel this order!</h4>
      </div>
      <div class="modal-body">
	  
	 {!! Form::open(array('url' => 'account/cancelorder', 'method' => 'post','class'=>'row','name'=>'repairform','id'=>'repairform','file'=>true, 'enctype'=>"multipart/form-data" )) !!}
      <div class="form-group">
	  <label>Reason</label>
	  <input type="hidden" name="id" id="id" value="">
	  <textarea class="form-control" name="reason" style="border: 1px solid #eeeeee;"></textarea>
	  
	  </div>
	  <div class="form-group">
	   <button type="submit" class="btn btn-default">Cancel</button>
	  </div>
	  </form>
	  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



                </main><!-- #main -->
            </div><!-- #primary -->

            <div id="sidebar" class="sidebar" role="complementary">
                <aside class="widget woocommerce widget_product_categories electro_widget_product_categories">
                    <ul class="product-categories category-single">
                        <li class="product_cat">

                            <ul>
                                <li class="cat-item current-cat"><a>Manage</a> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>

                                    <ul class='children'>
                                        <li class="cat-item"><a href="{{route('phones.orders')}}"><b>My Orders</b></a> </li>

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
    <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/tether.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/echo.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/wow.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.easing.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.waypoints.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/electro.js')}}"></script>
    <script
            src="https://code.jquery.com/jquery-2.2.4.js"
    ></script>
    <script>
        $( document ).ready(function() {
			$(".cancel").click(function(){
				
				var id=$(this).attr("id");
				$("#id").val(id);
				
			});
			
			
            $('#aa-search-input').on('keydown', function (e) {
                if (e.which == 13) {
                    window.location = 'https://phonefriend.in/store/'+document.getElementById('aa-search-input').value.split(' ').join('-');
                }

            });
        });
    </script>
@endsection


