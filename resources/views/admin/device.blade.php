@extends('layouts.dashboard')

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h3 class="header-title"><span class="loop-product-categories">
		<a href="" rel="tag">SmartPhones</a>
	</span><!-- /.loop-product-categories -->

                            <h1 itemprop="name" class="product_title entry-title">{{ucwords($phone->data->company)}} {{$phone->data->model}} -

                                {{$phone->data->storage}} GB</h1>
                        </h3><br>
                        <div class="row text-center text-lg-left">
                            @foreach($phone->photos as $photo)
                            <div class="col-lg-3 col-md-4 col-xs-6">

                                    <a href="https://www.phonefriend.in/storage{{str_replace("public", "", $photo->filename)}}" class="d-block mb-4 h-100">
                                        <img class="img-fluid img-thumbnail"src="https://www.phonefriend.in/storage{{str_replace("public", "", $photo->filename)}}" alt=""></a>
                                </a>
                            </div>
                            @endforeach

                        </div>
                    <div class="summary entry-summary">




                        <div class="brand">
                            Being Sold by
                            <a href="#">
                                    {{ucwords($phone->user->name)}} - <b>PHONEFR-A1Z{{ucwords($phone->user->id)}}</b>
                                </a>
                        </div><!-- .brand --><br>
                        <div>
                            <?php if($phone->age == '0 - 1 Month'){
                                $warranty = '11 Months';
                            }
                            else if($phone->age == '1 - 2 Months'){
                                $warranty = '10 Months';
                            }
                            else if($phone->age == '2 - 3 Months'){
                                $warranty = '9 Months';
                            }
                            else if($phone->age == '3 - 4 Months'){
                                $warranty = '8 Months';
                            }
                            else if($phone->age == '4 - 5 Months'){
                                $warranty = '7 Months';
                            }
                            else if($phone->age == '5 - 6 Months'){
                                $warranty = '6 Months';
                            }
                            else if($phone->age == '6 - 7 Months'){
                                $warranty = '5 Months';
                            }
                            else if($phone->age == '7 - 8 Months'){
                                $warranty = '4 Months';
                            }
                            else if($phone->age == '8 - 9 Months'){
                                $warranty = '3 Months';
                            }
                            else if($phone->age == '9 - 10 Months'){
                                $warranty = '2 Months';
                            }
                            else if($phone->age == '10 - 11 Months'){
                                $warranty = '1 Month';
                            }
                            else{
                                $warranty = 'Out of Warranty';
                            }
                            ?>
                            @if($phone->age == '11 - 12 Months' || $phone->age == '12+ Months')

                            @else
                                <span style="color: #5cb85c; font-weight: bold;"><i class="fa fa-circle"></i> {{strtoupper($warranty)}} WARRANTY</span>
                            @endif
                        </div><br>

                        <div itemprop="description">
                            <ul>
                                <li>{{$phone->age}} Old</li>
                                <li>{{ucwords($phone->data->storage)}} GB Storage</li>
                                <li>{{ucwords($phone->physical_condition)}} Physical Condition</li>
                                <li>
                                    <?php $con='';?>
                                    @foreach ($conditions as $condition)
                                        <?php $con = $con.DB::table('conditions')
                                                ->where('id', $condition->condition_id)
                                                ->first()->condition.', '; ?>
                                    @endforeach
                                        {{substr($con,0,-2)}}
                                </li>

                                <?php $acc='';?>
                                @foreach ($accessories as $condition)
                                    <?php
                                    if($condition->accessory_id != 7){
                                        $acc = $acc. DB::table('accessories')
                                                ->where('id', $condition->accessory_id)
                                                ->first()->accessory.', ';
                                    } else{
                                        $acc = 'All Accessories Availabale'.', ';
                                    }

                                    ?>
                                @endforeach
                                @if($condition->accessory_id != 7)
                                    <li> <b> Unavailable Accessories : </b>{{substr($acc,0,-2)}}</li>
                                    @else
                                    <li>{{substr($acc,0,-2)}}</li>
                                @endif

                                    @if(isset($phone->imei1))
                                    <li><b>IMEI-1</b> {{$phone->imei1}}</li>
                                    @else
                                    <li><b>Total Units  : </b>{{$phone->units}}</li>
                                    <li><b>Color  : </b>{{$phone->color}}</li>
                                    <li><b>Units Available  : </b>{{$phone->units_rem}}</li>
                                    @endif</li>
                            </ul>



                        </div><!-- .description -->
                        <hr><h3 style="color:green"><i class="fa fa-inr"></i> {{ number_format($phone->price, 2) }}</h3>
                        <h4><del><i class="fa fa-inr"></i>{{number_format($phone->data->price,2)}}</del></h4>

                        <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

                        </div><!-- /itemprop -->



                        <hr>



                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->
@endsection


