
<style>

    .topnavnew {
        overflow: hidden;
        background-color: #a3d133;
    }

    .topnavnew a {
        float: right;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    .topnavnew a:hover {
        background-color: #ddd;
        color: black;
    }

    .active {
        background-color:#fff;
        color: white;
    }

    .topnavnew .icon {
        display: none;
    }

    @media screen and (max-width: 600px) {
        .topnavnew a:not(:first-child) {display: none;}
        .topnavnew a.icon {
            float: left;
            display: block;
        }
    }

    @media screen and (max-width: 600px) {
        a.restmenu {
            margin-top: 50px;
        }
        .topnavnew.responsive {position: relative;}
        .topnavnew.responsive .icon {
            position: absolute;
            left: 0;
            top: 0;
        }
        #mytopnavnew a.active {
            float: right;
        }
        .topnavnew.responsive a {
            float: none;
            display: block;
            text-align: left;
        }
    }
    .col-xs-4.someicons {
        text-align: center;
        padding: 5px;
        font-size: 10px;
    }
    .module {
        position: relative;
    }
    .notice-module {
        overflow: hidden;
        -webkit-box-ordinal-group: -99;
        -ms-flex-order: -100;
        order: -100;
    }
    .module-header_notice-56 .module-body {
        height: auto;
        flex-direction: row;
        background: rgb(60, 60, 60);
        padding-top: 7px;
        padding-bottom: 7px;
        color: aliceblue;
    }
    .module-header_notice-56 .hn-body {
        display: flex;
    }
    .notice-module .module-body, .notice-module .hn-body {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
    }
    .module-header_notice-56 .hn-content {
        line-height: 1.4;
        text-align: center;
    }
</style>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

<div class="notice-module module module-header_notice module-header_notice-56" id="newsTicker" style="display:none">
    <div class="module-body">
        <div class="hn-body">
            <div class="hn-content col-md-12"><img src="https://phonefriend.in/images/yay_png_1547446.png" style="height: 27px; display:inline;">&nbsp;&nbsp;<b>Phone Friend </b>now a trusted partner of <b>Amazon India</b> for Reburbished Phones.</div>
        </div>

    </div>

    <div class="module-body">
        <div class="hn-body">
            <div class="hn-content col-md-12"><img src="https://phonefriend.in/images/yay_png_1547446.png" style="height: 27px; display:inline;">&nbsp;&nbsp;<b>Phone Friend </b>now provides low cost shipping upto <b>&nbsp;<i class="fa fa-inr"></i>50,000</b> for all Reburbished Phones.</div>
        </div>

    </div>
</div>
<div class="topnavnew" id="mytopnavnew">
    <a href="https://www.phonefriend.in" class="active" style="    width: 135px;"><img src="{{asset('images/logo1.png')}}"></a>
    <a  class="restmenu" href="https://www.phonefriend.in/">Home</a>

    <a href="https://www.phonefriend.in/store">Store</a>
    <a href="{{route('other.about')}}#aboutView">About Us</a>
    <a href="{{route('contact')}}#mapView">Contact Us</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>
</div>


<script>
    function hide() {

        var el = document.getElementById('newsTicker');

        el.style.display = 'none';

    }
    function myFunction() {
        var x = document.getElementById("mytopnavnew");
        if (x.className === "topnavnew") {
            x.className += " responsive";
        } else {
            x.className = "topnavnew";
        }
    }
</script>


<div class="top-bar">
    <div class="row" id="mobilemenuicons">
        @if (Auth::guest())
            <div class="col-xs-4 someicons">
                <a  title="Track Your Order" style="color:#fff"  data-toggle="modal" data-target="#repairModal"><i class="fa fa-cogs" style="font-size:25px;"></i><br>
                    Phone Repair</a>
            </div>

            <div class="col-xs-4 someicons">
                <a title="Track Your Order"  style="color:#fff"  href="{{route('track-show')}}">
                    <i class="fa fa-location-arrow" style="font-size:25px;"></i><br>
                    Track Your Order
                </a>
            </div>

            <div class="col-xs-4 someicons">
                <a title="Become a Merchant"  style="color:#fff"  href="{{route('merchant')}}"><i class="	fa fa-group" style="font-size:25px;"></i><br>
                    Become a Merchant</a>
            </div>
        @endif

        @if (!Auth::guest())
            @if (Auth::user()->role==1)
                <div class="col-xs-4 someicons">
                    <a  title="Track Your Order" style="color:#fff"  data-toggle="modal" data-target="#repairModal"><i class="fa fa-cogs" style="font-size:25px;"></i><br>
                        Phone Repair</a>
                </div>
                <div class="col-xs-4 someicons">
                    <a title="Become a Merchant"  style="color:#fff"  href="{{ route('account') }}"><i class="	fa fa-group" style="font-size:25px;"></i><br>
                        Marchant Dashboard</a>
                </div>
                <div class="col-xs-4 someicons">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();                                                document.getElementById('logout-form').submit();"  style="color:#fff" >
                        <i class="	fa fa-sign-out"  style="font-size:25px;"></i>
                        <br>
                        Sign Out</a>
                </div>
            @elseif (Auth::user()->role==2)

                <div class="col-xs-4 someicons">
                    <a title="Become a Merchant"  style="color:#fff"  href="{{ route('phones.orders') }}"><i class="fa fa-truck" style="font-size:25px;"></i><br>
                        My Orders</a>
                </div>
                <div class="col-xs-4 someicons">
                    <a title="Track Your Order"  style="color:#fff"  href="{{route('track-show')}}">
                        <i class="fa fa-location-arrow" style="font-size:25px;"></i><br>
                        Track Your Order
                    </a>
                </div>
                <div class="col-xs-4 someicons">
                    <a href="/cart"  style="color:#fff" >
                        <i class="ec ec-shopping-bag"  style="font-size:25px;"></i>
                        <br>
                        {{Cart::count()}}  Items In Cart</a>
                </div>


            @elseif (Auth::user()->role==3)
                <div class="col-xs-4 someicons">
                    <a title="Become a Merchant"  style="color:#fff"  href="{{route('merchant')}}"><i class="	fa fa-group" style="font-size:25px;"></i><br>
                        Become a Merchant</a>
                </div>

                <div class="col-xs-4 someicons">
                    <a title="Become a Merchant"  style="color:#fff"  {{ route('logout') }}"  ><i class="	fa fa-group" style="font-size:25px;"></i><br>
                    Sign Out</a>
                </div>

            @endif
        @endif
    </div>
    <div class="container">
        <div class="col-md-3"  id="pagetitle"><a title="Welcome to India's best preowned Smartphone Store" href="#" style="color: #fff;
    font-size: 20px;">The Smartphone Store</a></div>
        <div class="col-md-9">
            <div class="row customiconmenu" style="text-align:center">
                <ol>
                    <li><a  title="Track Your Order" style="color:#fff"  data-toggle="modal" data-target="#repairModal">
                            Phone Repair</a></li>
                    <li><a title="Track Your Order"  style="color:#fff"  href="{{route('track-show')}}">
                            Track Your Order</a></li>
                    @if (Auth::guest())
                        <li><a title="Become a Merchant"  style="color:#fff"  href="{{route('merchant')}}">
                                Become a Merchant</a></li>
                    @endif
                    @if (!Auth::guest())
                        @if (Auth::user()->role==1)
                            <li><a title="Merchant Dashboard" href="{{ route('account') }}">
                                    Merchant Dashboard</a></li>
                        @elseif (Auth::user()->role==2)
                            <li><a title="Orders" href="{{ route('phones.orders') }}" style="color:#fff">
                                    My Orders</a></li>
                        @elseif (Auth::user()->role==3)
                            <li><a title="Admin Dashboard" href="{{ route('admin.dashboard') }}">
                                    Admin Dashboard</a></li>
                        @endif

                    @endif



                </ol>



            </div>

        </div>

        <div class="col-md-2"><a href="https://www.phonefriend.in" class="header-logo-link">
                <img src="{{asset('images/logo1.png')}}" class="logo" id="biglogo">
            </a></div>
        <div class="col-md-6" id="searchbardiv"><div class="input-group" id="aa-input-container">
                <div id="aa-input-container">
                    <input type="search" id="aa-search-input" style="display: inline;" class="form-control search-field" placeholder="Search for phones..." name="search" autocomplete="off" />
                </div>

                <div class="input-group-btn">
                    <button class="btn btn-secondary searchbtn" type="submit">
                        <i class="ec ec-search" style="font-size: 24px;     background: white;
    border-radius: 0 5px 5px 0;"></i>
                    </button>
                </div>
            </div></div>
        <div class="col-md-4"  id="loginbardiv"><div class="media-body">
                @if (Auth::guest())
                    <div class="top-right links">

                        <ul class="navbar-mini-cart navbar-nav animate-dropdown nav flip" >
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}" style="font-size: 16px; color:#ffffff"><b>Login</b></a></li> &nbsp; &nbsp;
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}" style="font-size: 16px; color:#ffffff"><b>Signup</b></a></li>
                            <li class="nav-item dropdown">
                                <a href="{{ route('cart') }}" class="nav-link" aria-expanded="false" style="font-size: 16px; color:#ffffff">
                                    <i class="ec ec-shopping-bag" style="font-size: 1.829em;"></i>
                                    <span class="cart-items-count count" style="background-color: #3c3c3c;">{{Cart::count()}}</span>
                                    <span class="cart-items-total-price total-price"><span class="amount"><b><i class="fa fa-inr"></i> {{Cart::subtotal()}}</b></span></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                @else

                    <a href="{{route('accnt')}}" class="nav-link" role="button" aria-expanded="false" style="font-size: 16px; color:#ffffff">
                        <b>Welcome ! {{ucwords(Auth::user()->name) }} </b>
                    </a>

                    &nbsp; &nbsp; &nbsp; &nbsp; <a href="{{ route('logout') }}" onclick="event.preventDefault();                                                document.getElementById('logout-form').submit();"  style="color:#fff" >
                        <i class="	fa fa-sign-out"  style="font-size:25px;"></i>

                        Sign Out</a>

                @endif
                @if(Auth::check())
                    @if(Auth::user()->role==2)
                        <a href="/cart" id="bigcart" class="nav-link" style="    color: #fff;
    font-size: 30px;">
                            <i class="ec ec-shopping-bag" style="font-size: 1.5em;"></i>
                            <span class="cart-items-count count">{{Cart::count()}}</span>
                        </a>
                    @endif
                @endif
            </div></div>



    </div>


</div><!-- /.top-bar -->


<nav class="navbar navbar-primary navbar-full"  id="mainnavmenu">
    <ul id="menu-main-menu" class="nav nav-inline yamm">
        <li class="menu-item "><a title="Home" href="https://www.phonefriend.in" >Home</a>

        </li>
        <li class="menu-item"><a title="Store" href="https://www.phonefriend.in/store">Store</a></li>

        <li class="menu-item"><a title="About Us" href="{{route('other.about')}}#aboutView">About Us</a></li>


        <li class="menu-item"><a title="Contact Us" href="{{route('contact')}}#mapView">Contact Us</a></li>
    </ul>
</nav>
</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>

<div id="repairModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    {{ csrf_field() }}
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Fill the form we will receive your phone for repair</h4>
            </div>
            {!! Form::open(array('url' => 'home/repair', 'method' => 'post','class'=>'row','name'=>'repairform','id'=>'repairform','file'=>true, 'enctype'=>"multipart/form-data" )) !!}
            <div class="modal-body col-md-12">
                <div class="form-group col-md-12">
                    <label>Enter Name:</label>
                    <input type="text" name="name" id="name" class="form-control" style="border-radius: 5px;padding: 7px;">

                </div>
                <div class="form-group col-md-12">
                    <label>Enter Email:</label>
                    <input type="email" name="email" id="email" class="form-control" style="border-radius: 5px;padding: 7px;">

                </div>
                <div class="form-group col-md-6" >
                    <label>Select Location:</label>
                    <select id="city" class="form-control" name="city"  style="border-radius: 5px;padding: 7px;border: 1px solid #3333 !important;">
                        <option value="1">Delhi/NCR</option>
                        <option value="2">Bangalore</option>
                        <option value="3">Pune</option>
                        <option value="4">Chennai</option>
                        <option value="5">Hydrabad</option>
                        <option value="6">Mumbai</option>
                        <option value="7">Gurugram</option>
                        <option value="8">Ghaziabad</option>
                    </select>

                </div>
                <div class="form-group col-md-6" >
                    <label>Enter Mobile No:</label>
                    <input type="number" name="mobile" id="mobile" class="form-control" style="border-radius: 5px;padding: 7px;">

                </div>
                <div class="form-group col-md-12">
                    <label>Enter Description:</label>
                    <textarea class="form-control" name="description" id="description" style="    border: 1px solid #3333;
    border-radius: 5px;"></textarea>

                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Submit</button> <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>

    </div>
</div>


<script>
    $(document).ready(function(){

        $("#repairform").submit(function(){
            if($("#name").val()=='')
            {
                alert("Please enter name");
                return false;


            }
            if($("#email").val()=='')
            {
                alert("Please enter email");
                return false;


            }

            if($("#city").val()=='')
            {
                alert("Please select location");
                return false;


            }
            if($("#city").val()!='1' && $("#city").val()!='8')
            {
                alert("Repair service is available for Delhi/NCR only");
                return false;


            }
            if($("#mobile").val()=='')
            {
                alert("Please enter mobile no");
                return false;


            }
            if($("#description").val()=='')
            {
                alert("Please enter description/issue");
                return false;


            }
            else
            {

                return true
            }


        });



    });




</script>



