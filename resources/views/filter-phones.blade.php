
@foreach($phones as $phone)
<li class="product col-md-4 ">
    <div class="product-outer">
        <div class="product-inner highlight">
            @if($phone->age == '11 - 12 Months' || $phone->age == '12+ Months')
            <span class="onsale" style="background: #3c3c3c; color:white;    width: 100%;">CERTIFIED REFURBISHED <i class="icon-check-sign"></i></span>
            @else
            <span class="onsale" style="background: #3c3c3c; color:white;    width: 100%;">CERTIFIED USED  <i class="icon-check-sign"></i></span>
            @endif
            <a href='https://phonefriend.in/store/show/{{$phone->id}}/{{str_slug($phone->data->company." ".$phone->data->model." ".$phone->data->storage." GB", "-")}}'>

                <h3 class="">{{ucwords($phone->data->company)}} {{$phone->data->model}} - {{$phone->data->storage}} GB</h3>
                <div class="product-thumbnail " style="margin-bottom: 0px">

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
                        <ins><span class="amount "><i class="fa fa-inr"></i> {{number_format($phone->price, 2) }}</span></ins>&nbsp;
                        <del class=""><span class="amount "><i class="fa fa-inr"></i>{{number_format($phone->data->price,2)}}</span></del><br>

                    </span>
                </span>
            </div>
            <div class="hover-area" style=" display: block !important;
            padding-top: 0.214em !important;
            border-top: 1px solid #eaeaea !important;">
            <div class="action-buttons" style="    font-weight: bold;
            color: #949494;">
            @if(Auth::check())
            @if(Auth::user()->role == 2)
            <?php $phoneColor = explode(',', $phone->color); ?>
            <?php if($phone->units){?><a href="{{URL('/phone/purchase/'.$phone->id.'/'.str_slug($phone->data->company.' '.$phone->data->model.' '.$phone->data->storage.' GB', '-').'/'.$phoneColor[0])}}" ><b class="buynow"  style="border-radius: 30%; background-color:#72BAD1;
            border: none;
            color: white;
            padding: 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
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
</div>
</div>
</li>
@endforeach
