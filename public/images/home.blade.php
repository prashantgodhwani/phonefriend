@extends('layouts.other')

@section('content')
<style>
.loading-bg {background: #44444473;top: 0;bottom: 0;left: 0;right: 0;margin: 0px auto;z-index: 9;position: fixed;}
.loader{border:16px solid #f3f3f3;border-radius:50%;border-top:16px solid #3498db;width:150px;height:150px;-webkit-animation:spin 2s linear infinite;animation:spin 2s linear infinite;position:absolute;left:0;right:0;margin:0px auto;top:50%;}
@-webkit-keyframes spin {
	0% { -webkit-transform: rotate(0deg); }
	100% { -webkit-transform: rotate(360deg); }
}
@keyframes spin {
	0% { transform: rotate(0deg); }
	100% { transform: rotate(360deg); }
}
.green{
    color:#e85561;
	font-size:12px;
}
.grey{
    color:grey;
	font-size:12px;
}
</style>
<!-- loader start -->
<div class="loading-bg" style="display: none;">  
	<div class="loader"></div>
</div>
<!-- loader end -->
<div id="content" class="site-content" tabindex="-1">




	<div id="" class="content-area">
   <main id="main" class="site-main main-slider">
      <div class="home-v2-slider" >
         <!-- ========================================== SECTION – HERO : END========================================= -->
         <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
            <div class="item" style="background-size: cover;">
               <img src="assets/images/slider/banner-2.jpg" class="sliderheight">
               <!--<div class="caption vertical-center text-left" style="position:absolute; top:0">
                  <h1 class="hero-2">
                      Enjoy Faster surfing <br> on the <b> PhoneFriend</b><br>  Mobile Application
                  </h1>
                  
                  <div class="hero-subtitle">
                      POWERED FOR SEAMLESS EXPERIENCE.
                  <a href="https://play.google.com/store/apps/details?id=com.phonefriend" target="_blank"> <img src="{{asset('images/android-store.png')}}" style="width:100px;"></a>
                  </div>
                  
                  </div>-->
            </div>
            <!-- /.item -->
            <div class="item" style="background-size: cover;">
               <img src="assets/images/slider/banner-1.jpg" class="sliderheight">
               <!--<div class="caption vertical-center text-left"  style="position:absolute; top:0">
                  <h1 class="hero-2">
                       EMI's now available on
                   </h1>     <h1 class="hero-2">
                      <B>preowned smartphones</B>
                   </h1>
                  
                   <div class="hero-subtitle">
                       CRAFTED FOR YOU WITH &nbsp;<i class="fa fa-heart"></i>
                   </div>
                  <a href="https://www.phonefriend.in/store" class="le-button ">Start Buying</a>
                  </div>-->
            </div>
            <div class="item" style="background-size: cover;">
               <img src="assets/images/slider/banner-3.jpg" class="sliderheight">
               <!-- <div class="caption vertical-center text-left"  style="position:absolute; top:0">
                  <h1 class="hero-2">
                                                           RECEIVING MADE EASIER.
                                                       </h1>
                  
                                                       <div class="hero-subtitle">
                                                             Pay on Delivery with<BR><strong> 48 hours Replacement Guarantee ! </strong>
                                                       </div>
                  
                  <a href="https://www.phonefriend.in/store/samsung" class="le-button ">Start Buying</a>
                  </div>-->
            </div>
         </div>
         <!-- /.owl-carousel -->
         <!-- ========================================= SECTION – HERO : END ========================================= -->
      </div>
      <!-- /.home-v1-slider -->
   </main>
</div>

<div class="bestdiv col-md-12">
<div class="col-md-2 col-xs-12">
<h3 style="    font-size: 22px;
    margin-top: 20px;">Top Selling Mobile</h3>
<img class="img img-responsive" src="https://www.phonefriend.in/images/topselling.png">
</div>
<div class="col-md-10 col-xs-12">
@foreach($bestseller as $phone)
<div class="col-md-3 col-xs-6">
								<div class="product-inner highlight">

									@if($phone->age == '11 - 12 Months' || $phone->age == '12+ Months')
									<span class="onsale" style="background: #3c3c3c; color:white;    width: 100%;">CERTIFIED REFURBISHED <i class="icon-check-sign"></i></span>
									@else
									<span class="onsale" style="background: #3c3c3c; color:white;    width: 100%;">CERTIFIED USED  <i class="icon-check-sign"></i></span>
									@endif



									<a href='https://phonefriend.in/store/show/{{$phone->id}}/{{str_slug($phone->data->company." ".$phone->data->model." ".$phone->data->storage." GB", "-")}}#mobileView'>

										<h3 class="bestselheadingtop">{{ucwords($phone->data->company)}} {{$phone->data->model}} - {{$phone->data->storage}} GB</h3>
										<div class="product-thumbnail" style="">

											<img class="img img-responsive" src="https://www.phonefriend.in/storage/{{str_replace("public", "", $phone->dp)}}" alt="{{ucwords($phone->data->company)}} {{$phone->data->model}} - {{$phone->data->storage}} GB second hand phone at phonefriend" title="{{ucwords($phone->data->company)}} {{$phone->data->model}} - {{$phone->data->storage}} GB" >
                                            <div style=" margin-left: 20px;margin-bottom: -3px;font-size: 16px;">
                                                @for($i=1; $i<=5; $i++)
                                            @if($i <= $phone->rating)
                                            <span class="fa fa-star green"></span>
                                            @else
                                              <span class="fa fa-star grey"></span>
                                            @endif
                                          @endfor
                                            </div>
											<span class="bestsale pad" style="display: none" data-toggle="tooltip" title="Price Marked Down"><b>{{round((($phone->data->price - $phone->price) / $phone->data->price )*100)}} %</b><br><span style="    font-size: 10px;">OFF</span></span><br>
										</div>
									</a>
									



									<div class="price-add-to-cart" style="padding-top: 5%; padding-bottom: 5%; margin-bottom: 1%">
										<span class="price">
											<span class="electro-price">
												<ins><span class="amount"><i class="fa fa-inr"></i> {{number_format($phone->price, 2) }}</span></ins>&nbsp;
												<del class=""><span class="amount "><i class="fa fa-inr"></i>{{number_format($phone->data->price,2)}}</span></del><br>

											</span>
										</span>
										<!--  <a rel="nofollow" href='https://phonefriend.in/store/show/{{$phone->id}}/{{str_slug($phone->data->company." ".$phone->data->model." ".$phone->data->storage." GB", "-")}}' class="button add_to_cart_button pull-right">Add to cart</a>-->
									</div><!-- /.price-add-to-cart -->

									<div class="hover-area" style=" display: block !important;
									padding-top: 0.214em !important;
									border-top: 1px solid #eaeaea !important;">
									<div class="action-buttons" style="    font-weight: bold;
									color: #949494;">
									@if(Auth::check())
									@if(Auth::user()->role == 2)
									<?php $phoneColor = explode(',', $phone->color); ?>
									<?php if($phone->units){?><a href="{{URL('/phone/purchase/'.$phone->id.'/'.str_slug($phone->data->company.' '.$phone->data->model.' '.$phone->data->storage.' GB', '-').'/'.$phoneColor[0])}}" ><b class="buynow"  style=" /*background-color:#72BAD1;
									border: none;*/
									color: #e85561;
									padding: 10px 20px;
									text-align: center;
									text-decoration: none;
									display: inline-block;
									font-size: 14px;
									margin: 4px 2px;
									cursor: pointer;"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
									&nbsp;Buy Now</b></a><?php } 
									else{?><div>Out of Stock</div><?php } ?>
										@endif
									@else
									<?php $phoneColor = explode(',', $phone->color); ?>
									<?php if($phone->units){?><a href="{{URL('/phone/purchase/'.$phone->id.'/'.str_slug($phone->data->company.' '.$phone->data->model.' '.$phone->data->storage.' GB', '-').'/'.$phoneColor[0])}}"" ><b class="buynow" style="border-radius: 0%; /*background-color:#e85561;
									border: none;*/
									color: #e85561;
									padding: 9px;
									text-align: center;
									text-decoration: none;
									display: inline-block;
									font-size: 14px;
									margin: 4px 2px;
									cursor: pointer;"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
									&nbsp; Buy Now</b></a><?php } 
									else{?><div>Out of Stock</div><?php } ?>
										@endif

								</div>
							</div>
						</div><!-- /.product-inner -->
					</div>
@endforeach
</div>
<div class="col-md-12">View All</div>
						
						
				

			

</div>








	<div class="container">
		

<div class="col-md-12" data-animation=" animated fadeIn">
	<div class="ads-block row">
		<div class="ad col-xs-12 col-sm-4">
			<div class="media">
				<div class="media-left media-middle"><img src="assets/images/ad-block/1.jpg" alt="second hand smartphones at phonefriend" /></div>
				<div class="media-body media-middle">
					<div class="ad-text">
						<strong>Apple </strong><br> Smartphones
					</div>
					<div class="ad-action">
						<a href="https://www.phonefriend.in/store/apple">Shop now</a>
					</div>
				</div>
			</div>
		</div>
		<div class="ad col-xs-12 col-sm-4">
			<div class="media">
				<div class="media-left media-middle"><img src="assets/images/ad-block/2.png" alt="second hand smartphones at phonefriend" /></div>
				<div class="media-body media-middle">
					<div class="ad-text">
						<strong>Samsung </strong><br> Smartphones
					</div>
					<div class="ad-action">
						<a href="https://www.phonefriend.in/store/samsung">Shop now</a>
					</div>
				</div>
			</div>
		</div>
		<div class="ad col-xs-12 col-sm-4">
			<div class="media">
				<div class="media-left media-middle"><img src="assets/images/ad-block/3.jpg" alt="second hand smartphones at phonefriend" /></div>
				<div class="media-body media-middle">
					<div class="ad-text">
						<strong> All Premium</strong><br> Smartphones<br>
					</div>
					<div class="ad-action">
						<a href="https://www.phonefriend.in/store/">Shop now</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>










@if(!Jenssegers\Agent\Facades\Agent::isMobile() || 1==1)
            <div id="sidebar" class="sidebar" role="complementary" >

            	<aside class="widget widget_electro_products_filter">
            		<h3 class="widget-title">Filters</h3> 
            		<aside class="widget woocommerce">
            			<h3 class="widget-title">Brands</h3> 
            			<ul>
            				<div id="company" class="companies">
            					<div class="ais-refinement-list"> 
            						<div class="checkbox">
            							<label class="ais-refinement-list__label">
            								<input type="checkbox" name="brand[]" class="ais-refinement-list__checkbox" value="Samsung">
            								<span class="ais-refinement-list__value">Samsung</span> 
            							</label>

            						</div>
            						<div class="checkbox">
            							<label class="ais-refinement-list__label">
            								<input type="checkbox" name="brand[]" class="ais-refinement-list__checkbox" value="Apple"> <span class="ais-refinement-list__value">Apple</span> 
            							</label>
            						</div>
            						<div class="checkbox">
            							<label class="ais-refinement-list__label">
            								<input type="checkbox" name="brand[]" class="ais-refinement-list__checkbox" value="Vivo"> <span class="ais-refinement-list__value">Vivo</span> 
            							</label>
            						</div>
            						<div class="checkbox">
            							<label class="ais-refinement-list__label">
            								<input type="checkbox" name="brand[]" class="ais-refinement-list__checkbox" value="Honor"> <span class="ais-refinement-list__value">Honor</span> 
            							</label>
            						</div>
            						<div class="checkbox">
            							<label class="ais-refinement-list__label">
            								<input type="checkbox" name="brand[]" class="ais-refinement-list__checkbox" value="Mi"> <span class="ais-refinement-list__value">Mi</span> 
            							</label>
            						</div>
            						<div class="checkbox">
            							<label class="ais-refinement-list__label">
            								<input type="checkbox" name="brand[]" class="ais-refinement-list__checkbox" value="Oppo"> <span class="ais-refinement-list__value">Oppo</span> 
            							</label>
            						</div>
            						<div class="checkbox">
            							<label class="ais-refinement-list__label">
            								<input type="checkbox" name="brand[]" class="ais-refinement-list__checkbox" value="Oneplus"> <span class="ais-refinement-list__value">Oneplus</span> 
            							</label>
            						</div>
            						<div class="checkbox">
            							<label class="ais-refinement-list__label">
            								<input type="checkbox" name="brand[]" class="ais-refinement-list__checkbox" value="Motorola"> <span class="ais-refinement-list__value">Motorola</span> 
            							</label>
            						</div>
            						<div class="checkbox">
            							<label class="ais-refinement-list__label">
            								<input type="checkbox" name="brand[]" class="ais-refinement-list__checkbox" value="Nokia"> <span class="ais-refinement-list__value">Nokia</span> 
            							</label>
            						</div>
            						<div class="checkbox">
            							<label class="ais-refinement-list__label">
            								<input type="checkbox" name="brand[]" class="ais-refinement-list__checkbox" value="Lenovo"> <span class="ais-refinement-list__value">Lenovo</span> 
            							</label>
            						</div> 
            					</div>
            				</div>
            			</ul>
            		</aside> 

            		<aside class="widget woocommerce">
            			<h3 class="widget-title">Price</h3> 
            			<ul>
            				<div class="storages">
            					<div class="ais-refinement-list"> 
            						<div class="checkbox">
            							<label class="ais-refinement-list__label">
            								<input type="radio" name="price" class="ais-refinement-list__checkbox" value="1000-2000"> <span class="ais-refinement-list__value">1000-2000</span> 
            							</label>
            						</div>
            						<div class="checkbox">
            							<label class="ais-refinement-list__label">
            								<input type="radio" name="price" class="ais-refinement-list__checkbox" value="2000-5000"> <span class="ais-refinement-list__value">2000-5000</span> 
            							</label>
            						</div>
            						<div class="checkbox">
            							<label class="ais-refinement-list__label">
            								<input type="radio" name="price" class="ais-refinement-list__checkbox" value="5000-10000"> <span class="ais-refinement-list__value">5000-10000</span> 
            							</label>
            						</div>
            						<div class="checkbox">
            							<label class="ais-refinement-list__label">
            								<input type="radio" name="price" class="ais-refinement-list__checkbox" value="10000-15000"> <span class="ais-refinement-list__value">10000-15000</span> 
            							</label>
            						</div>
            						<div class="checkbox">
            							<label class="ais-refinement-list__label">
            								<input type="radio" name="price" class="ais-refinement-list__checkbox" value="15000-20000"> <span class="ais-refinement-list__value">15000-20000</span> 
            							</label>
            						</div>
            						<div class="checkbox">
            							<label class="ais-refinement-list__label">
            								<input type="radio" name="price" class="ais-refinement-list__checkbox" value="20000-1000000"> <span class="ais-refinement-list__value">20000+</span> 
            							</label>
            						</div>
            						
            					</div>
            				</div>
            			</ul>
            		</aside>
            	</aside>


            	<aside class="widget woocommerce">
            		<h3 class="widget-title">Storage</h3> 
            		<ul>
            			<div class="storages">
            				<div class="ais-refinement-list"> 
            					<div class="checkbox">
            						<label class="ais-refinement-list__label">
            							<input type="checkbox" name="storage[]" class="ais-refinement-list__checkbox" value="32"> <span class="ais-refinement-list__value">32</span> 
            						</label>
            					</div>
            					<div class="checkbox">
            						<label class="ais-refinement-list__label">
            							<input type="checkbox" name="storage[]" class="ais-refinement-list__checkbox" value="16"> <span class="ais-refinement-list__value">16</span> 
            						</label>
            					</div>
            					<div class="checkbox">
            						<label class="ais-refinement-list__label">
            							<input type="checkbox" name="storage[]" class="ais-refinement-list__checkbox" value="64"> <span class="ais-refinement-list__value">64</span> 
            						</label>
            					</div>
            					<div class="checkbox">
            						<label class="ais-refinement-list__label">
            							<input type="checkbox" name="storage[]" class="ais-refinement-list__checkbox" value="8"> <span class="ais-refinement-list__value">8</span> 
            						</label>
            					</div>
            					<div class="checkbox">
            						<label class="ais-refinement-list__label">
            							<input type="checkbox" name="storage[]" class="ais-refinement-list__checkbox" value="128"> <span class="ais-refinement-list__value">128</span> 
            						</label>
            					</div>
            					<div class="checkbox">
            						<label class="ais-refinement-list__label">
            							<input type="checkbox" name="storage[]" class="ais-refinement-list__checkbox" value="256"> <span class="ais-refinement-list__value">256</span> 
            						</label>
            					</div> 
            				</div>
            			</div>
            		</ul>
            	</aside>
            </aside>

            <aside id="electro_features_block_widget-2" class="widget widget_electro_features_block_widget">
            	<div class="features-list columns-1">
            		<div class="feature">
            			<div class="media">
            				<div class="media-left media-middle feature-icon">
            					<i class="ec ec-transport"></i>
            				</div>
            				<div class="media-body media-middle feature-text">
            					<strong>Free </strong> Delivery
            				</div>
            			</div>
            		</div>
            		<div class="feature">
            			<div class="media">
            				<div class="media-left media-middle feature-icon">
            					<i class="ec ec-customers"></i>
            				</div>
            				<div class="media-body media-middle feature-text">
            					<strong>99% Positive</strong> Feedbacks
            				</div>
            			</div>
            		</div>
            		<div class="feature">
            			<div class="media">
            				<div class="media-left media-middle feature-icon">
            					<i class="ec ec-returning"></i>
            				</div>
            				<div class="media-body media-middle feature-text">
            					<strong>48 Hours</strong> replacement gurranty
            				</div>
            			</div>
            		</div>
            		<div class="feature">
            			<div class="media">
            				<div class="media-left media-middle feature-icon">
            					<i class="ec ec-payment"></i>
            				</div>
            				<div class="media-body media-middle feature-text">
            					<strong>Payment</strong> Secure System
            				</div>
            			</div>
            		</div>
            		<div class="feature">
            			<div class="media">
            				<div class="media-left media-middle feature-icon">
            					<i class="ec ec-tag"></i>
            				</div>
            				<div class="media-body media-middle feature-text">
            					<strong>Only Best</strong> Brands
            				</div>
            			</div>
            		</div>
            	</div>
            </aside>

        </div>
        @endif










<div class="mobile-filter-open">
	<img src="{{URL('assets/images/filter.png')}}" />
</div>
<div class="mobile-filter-close">
	<img src="{{URL('assets/images/filter_ok.png')}}" />
</div>






<div id="primary" class="content-area">
	<main id="main" class="site-main ">
		<section class="products-carousel-tabs animate-in-view fadeIn animated" data-animation="fadeIn">
			<h2 class="sr-only">Product Carousel Tabs</h2>

			<div class="tab-content">


				<div role="tabpanel" class="tab-pane active" id="grid-extended" aria-expanded="true">

					<ul class="products columns-3" id="product_list">
						@foreach($phones as $phone)
						<li class="product col-md-4 ">
							<div class="product-outer">
								<div class="product-inner highlight">

									@if($phone->age == '11 - 12 Months' || $phone->age == '12+ Months')
									<span class="onsale" style="background: #3c3c3c; color:white;    width: 100%;">CERTIFIED REFURBISHED <i class="icon-check-sign"></i></span>
									@else
									<span class="onsale" style="background: #3c3c3c; color:white;    width: 100%;">CERTIFIED USED  <i class="icon-check-sign"></i></span>
									@endif



									<a href='https://phonefriend.in/store/show/{{$phone->id}}/{{str_slug($phone->data->company." ".$phone->data->model." ".$phone->data->storage." GB", "-")}}#mobileView'>

										<h3 class="">{{ucwords($phone->data->company)}} {{$phone->data->model}} - {{$phone->data->storage}} GB</h3>
										<div class="product-thumbnail" style="">

											<img class="img img-responsive" src="https://www.phonefriend.in/storage/{{str_replace("public", "", $phone->dp)}}" alt="{{ucwords($phone->data->company)}} {{$phone->data->model}} - {{$phone->data->storage}} GB second hand phone at phonefriend" title="{{ucwords($phone->data->company)}} {{$phone->data->model}} - {{$phone->data->storage}} GB" >
                                            <div style=" margin-left: 20px;margin-bottom: -3px;font-size: 16px;">
                                                @for($i=1; $i<=5; $i++)
                                            @if($i <= $phone->rating)
                                            <span class="fa fa-star green"></span>
                                            @else
                                              <span class="fa fa-star grey"></span>
                                            @endif
                                          @endfor
                                            </div>
											<span class="sale pad" style="display: none" data-toggle="tooltip" title="Price Marked Down"><b>{{round((($phone->data->price - $phone->price) / $phone->data->price )*100)}} %</b><br><span style="    font-size: 10px;">OFF</span></span><br>
										</div>
									</a>
									<h3 class="">{{ucwords($phone->data->company)}} {{$phone->data->model}} - {{$phone->data->storage}} GB</h3>




									<div class="price-add-to-cart" style="padding-top: 5%; padding-bottom: 5%; margin-bottom: 1%">
										<span class="price">
											<span class="electro-price">
												<ins><span class="amount"><i class="fa fa-inr"></i> {{number_format($phone->price, 2) }}</span></ins>&nbsp;
												<del class=""><span class="amount "><i class="fa fa-inr"></i>{{number_format($phone->data->price,2)}}</span></del><br>

											</span>
										</span>
										<!--  <a rel="nofollow" href='https://phonefriend.in/store/show/{{$phone->id}}/{{str_slug($phone->data->company." ".$phone->data->model." ".$phone->data->storage." GB", "-")}}' class="button add_to_cart_button pull-right">Add to cart</a>-->
									</div><!-- /.price-add-to-cart -->

									<div class="hover-area" style=" display: block !important;
									padding-top: 0.214em !important;
									border-top: 1px solid #eaeaea !important;">
									<div class="action-buttons" style="    font-weight: bold;
									color: #949494;">
									@if(Auth::check())
									@if(Auth::user()->role == 2)
									<?php $phoneColor = explode(',', $phone->color); ?>
									<?php if($phone->units){?><a href="{{URL('/phone/purchase/'.$phone->id.'/'.str_slug($phone->data->company.' '.$phone->data->model.' '.$phone->data->storage.' GB', '-').'/'.$phoneColor[0])}}" ><b class="buynow"  style=" /*background-color:#72BAD1;
									border: none;*/
									color: #e85561;
									padding: 10px 20px;
									text-align: center;
									text-decoration: none;
									display: inline-block;
									font-size: 14px;
									margin: 4px 2px;
									cursor: pointer;"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
									&nbsp;Buy Now</b></a><?php } 
									else{?><div>Out of Stock</div><?php } ?>
										@endif
									@else
									<?php $phoneColor = explode(',', $phone->color); ?>
									<?php if($phone->units){?><a href="{{URL('/phone/purchase/'.$phone->id.'/'.str_slug($phone->data->company.' '.$phone->data->model.' '.$phone->data->storage.' GB', '-').'/'.$phoneColor[0])}}"" ><b class="buynow" style="border-radius: 0%; /*background-color:#e85561;
									border: none;*/
									color: #e85561;
									padding: 9px;
									text-align: center;
									text-decoration: none;
									display: inline-block;
									font-size: 14px;
									margin: 4px 2px;
									cursor: pointer;"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
									&nbsp; Buy Now</b></a><?php } 
									else{?><div>Out of Stock</div><?php } ?>
										@endif

								</div>
							</div>
						</div><!-- /.product-inner -->
					</div><!-- /.product-outer -->
				</li>
				@endforeach

			</ul>
                              <!--   <a href="{{route('store.all')}}">
                                    <div class="col-md-4 col-offset-4" style="float: right; padding-bottom: 5%;">
                                        <a href="{{route('store.all')}}" rel="nofollow" class="btn btn-success" style="    color: #fff;
    background-color: #e85561;
    border-color: #5cb85c;">
                                            See More Products &nbsp; &nbsp;<i class="fa fa-angle-right" style="font-size:1.2em"></i> </a>
                                    </div>
                                </a> -->
                            </div>


                        </div>
                    </section><!-- /.products-carousel-tabs -->


                    <div class="home-v2-banner-block animate-in-view fadeIn animated" data-animation=" animated fadeIn">
                    	<div class="home-v2-fullbanner-ad fullbanner-ad" style="margin-bottom: 70px;">
                    		<a href="{{route('store.all')}}">
                    			<img src="images/banner.jpg" class="img-fluid" alt="second hand smartphones at phonefriend">
                    		</a>
                    	</div>
                    </div>

                </main><!-- #main -->
            </div><!-- #primary -->
            
    </div><!-- .container -->
</div><!-- #content -->


@if(!Auth::check() || (Auth::check() && Auth::user()->role == 2))
<div id="offerModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close popup-close">×</button>
				<h4 class="modal-title">Avail Huge shopping discount coupons Here.</h4>
			</div>
			<form action="{{URL('/subscribe-to-offers')}}" accept-charset="UTF-8" class="row" name="excitingForm" id="excitingForm" >

				{{csrf_field()}} 

				<div class="modal-body col-md-12" id="popup-box-content">



					<div class="form-group col-md-12">
						<label>Enter Name:</label>
						<input type="text" name="offer_name" id="offer_name" class="form-control" style="border-radius: 5px;padding: 7px;" required="required">

					</div>
					<div class="form-group col-md-12">
						<label>Enter Email:</label>
						<input type="email" name="offer_email" id="offer_email" class="form-control" style="border-radius: 5px;padding: 7px;" required="required">

					</div>
					<div class="form-group col-md-12">
						<label>Enter Mobile No:</label>
						<input type="number" name="offer_mobile" id="offer_mobile" class="form-control" style="border-radius: 5px;padding: 7px;" required="required">

					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success" name="subscribe">Submit</button> 
					<button type="button" class="btn btn-default popup-close" >Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endif
@endsection


@section('scripts')

<script type="text/javascript" src="assets/js/tether.min.js"></script>
<script
src="https://code.jquery.com/jquery-2.2.4.js"
></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
	$( document ).ready(function() {
		var brands = [];
		var storages = [];
		$('input[name="brand[]"]').on('change', function (e) {
			e.preventDefault();
			brands = [];
			storages = [];
			var price = $("input[name='price']:checked").val();
			$('.loading-bg').show();
			$('input[name="brand[]"]:checked').each(function()
			{
				brands.push($(this).val());
			});
			$('input[name="storage[]"]:checked').each(function()
			{
				storages.push($(this).val());
			});
			$.post('/api/store/filter-phones', {brands: brands,price:price,storages: storages}, function(markup)
			{
				$('#product_list').html(markup);
				$('.loading-bg').hide();
			});            

		});
		$('input[name="storage[]"]').on('change', function (e) {
			e.preventDefault();
			brands = [];
			storages = [];
			var price = $("input[name='price']:checked").val();
			$('.loading-bg').show();
			$('input[name="brand[]"]:checked').each(function()
			{
				brands.push($(this).val());
			});
			$('input[name="storage[]"]:checked').each(function()
			{
				storages.push($(this).val());
			});
			$.post('/api/store/filter-phones', {brands: brands,price:price,storages: storages}, function(markup)
			{
				$('#product_list').html(markup);
				$('.loading-bg').hide();
			});            

		});
		$('input[name="price"]').on('change', function (e) {
			e.preventDefault();
			brands = [];
			storages = [];
			var price = $("input[name='price']:checked").val();
			$('.loading-bg').show();
			$('input[name="brand[]"]:checked').each(function()
			{
				brands.push($(this).val());
			});
			$('input[name="storage[]"]:checked').each(function()
			{
				storages.push($(this).val());
			});
			$.post('/api/store/filter-phones', {brands: brands,price:price,storages: storages}, function(markup)
			{
				$('#product_list').html(markup);
				$('.loading-bg').hide();
			});            

		});


		$('[data-toggle="tooltip"]').tooltip({'placement': 'bottom'});

		var delay = 10000; 
		var cookie_expire = 0; 
		var cookie = localStorage.getItem("list-builder");
		console.log(cookie);
		if(cookie == undefined || cookie == null || cookie == "") {
			if(((new Date()).getTime() - cookie) / (1000 * 60 * 60 * 24) > cookie_expire) {


				$("#offerModal").delay(delay).fadeIn("fast", () => {
					$('#offerModal').modal('toggle');
				});

				$("button[name=subscribe]").click((e) => {
					e.preventDefault();
					if($('#offer_name').val() == ""){
						alert('Please Enter Name');
					}else if($('#offer_email').val() == ""){
						alert('Please Enter Email');
					}else if($('#offer_mobile').val() == ""){
						alert('Please Enter Mobile Number');
					}else{
						$.ajax({
							type: "POST",
							url: $("#excitingForm").attr("action"),
							data: $("#excitingForm").serialize(),
							success: (data) => {
								var data  = JSON.parse(data);
								if(data.flag){
									$("#popup-box-content").html(`
										<div class="col-md-10 col-md-offset-2">
										<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<strong>Thanks !
										<h5 class="text-info">Use code <b>Get200</b> to get discount at checkout!</h5>
										</div>
										</div>
										`);
									$("button[name=subscribe]").hide();
								}else{
									alert(data.message);
								}
							}
						});
					}
				});

				$(".popup-close").click(() => {
					$("#offerModal").modal('toggle');
					localStorage.setItem("list-builder", (new Date()).getTime());
				});
			}
		}
	});
</script>

<script type="text/javascript" src="assets/js/bootstrap-hover-dropdown.min.js"></script>
<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/js/echo.min.js"></script>
<script type="text/javascript" src="assets/js/wow.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="assets/js/electro.js"></script>

<script>
	$( document ).ready(function() {
		$('#myModal').modal('show');
		$('#aa-search-input').on('keydown', function (e) {
			if (e.which == 13) {
				window.location = 'https://phonefriend.in/store/'+document.getElementById('aa-search-input').value.split(' ').join('-');
			}

		});
		$(".mobile-filter-open").click(function(){
			$("#content #sidebar").addClass("open");
			$(".mobile-filter-close").addClass("open");
		});
		$(".mobile-filter-close").click(function(){
			$("#content #sidebar").removeClass("open");
			$(".mobile-filter-close").removeClass("open");
		});
	});
</script>

<script>
	setTimeout(function(){
		$('.content-placeholder').removeClass('content-placeholder');

		var elems = document.getElementsByClassName('buy');
		for (var i=0;i<elems.length;i+=1){
			elems[i].style.display = 'block';
		}

		var elems = document.getElementsByClassName('pad');
		for (var i=0;i<elems.length;i+=1){
			elems[i].style.display = 'inline-block';
		}
	},3000);
</script>
@endsection

