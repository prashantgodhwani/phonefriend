@extends('layouts.master')

@section('content')
    <div id="content" class="site-content" tabindex="-1">
        <div class="container">

            <nav class="woocommerce-breadcrumb" ><a href="home.html">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>My Account</nav>

            <div class="content-area col-md-12">
                <main id="main" class="site-main">
                    <section>
                        <header>
                            <h2 class="h1">Manage your Account</h2>
                        </header>
                        @if(Auth::user()->role==1) <!--is Merchant-->
                        <div class="woocommerce columns-4">
                            <ul class="product-loop-categories">
                                <li class="product-category product first col-md-4"  style=" width: 33.33%;"><a href="{{route('phone.add')}}" style=" padding-top: 2%;"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 5em; color: #e85561"></i><h3><b>Sell a Phone</b></h3></a></li>
                                <li class="product-category product col-md-4" style=" width: 33.33%;"><a href="{{route('phones.show')}}" style=" padding-top: 2%;"><i class="fa fa-mobile" aria-hidden="true" style="font-size: 5.5em; color: #e85561"></i><h3><b>My Phones</b></h3></a></li>
                                <li class="product-category product col-md-4" style=" width: 33.33%;"><a href="{{route('account.settlements')}}" style="    padding-top: 5% !important;"><i class="fa fa-inr" aria-hidden="true" style="font-size: 4.5em; color: #e85561"></i><h3><b>Settlements</b></h3></a></li>

                            </ul>
                        </div>
                            @else <!--is user-->
                            <div class="woocommerce columns-4">
                                <ul class="product-loop-categories">
                                    <li class="product-category product col-md-6" style="width:50%;"><a href="{{route('phones.orders')}}" style=" padding-top: 2%;"><i class="fa fa-mobile" aria-hidden="true" style="font-size: 5.5em; color: #e85561"></i><h3><b>My Orders</b></h3></a></li>
                                    <li class="product-category product col-md-6" style="width:50%;"><a href="{{route('phones.show')}}" style=" padding-top: 2%;"><i class="fa fa-mobile" aria-hidden="true" style="font-size: 5.5em; color: #e85561"></i><h3><b>Profile</b></h3></a></li>
                                </ul>
                            </div>
                        @endif
                    </section>




                </main><!-- #main -->
            </div><!-- #primary -->



        </div><!-- .container -->
    </div><!-- #content -->
@endsection


@section('scripts')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script type="text/javascript">
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

        });
    </script>

@endsection


