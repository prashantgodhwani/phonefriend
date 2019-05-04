<div id="applic">
    <ais-index
            app-id="Q5IYJ43XF9"
            api-key="eb9bda691044aed1d217db64608643dc"
            index-name="phones"

            :query-parameters="{
                             numericFilters:['sold != 1','sold != 2'],
                             distinct: 2,
                            }"
    >


        <div class="top-bar">
    <div class="container">
	 <div class="col-md-3" id="pagetitle"><a title="Welcome to India's best preowned Smartphone Store" href="#" style="color: #fff;
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
				<li><a title="Sign Out" href="{{ route('logout') }}" onclick="event.preventDefault();                                                document.getElementById('logout-form').submit();" style=" font-size: 15px; color:rgb(214, 38, 38)">
				Sign Out</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form></li>
							@endif
				
			  
			  
			  </ol>
	 
	 
			  
		</div>
	 
	 </div>
	
	<div class="col-md-2"><a href="https://www.phonefriend.in" class="header-logo-link">
                            <img src="{{asset('images/logo1.png')}}" class="logo">
                        </a></div>
	<div class="col-md-6" id="searchbardiv"><div class="input-group" id="aa-input-container">
                        <div id="aa-input-container">
                            <input type="search" id="aa-search-input" style="display: inline;" class="form-control search-field" placeholder="Search for phones..." name="search" autocomplete="off" />
                        </div>
                       
                        <div class="input-group-btn">
                            <button class="btn btn-secondary searchbtn" type="submit">
                                <i class="ec ec-search"></i>
                            </button>
                        </div>
                    </div></div>
	<div class="col-md-4"  id="loginbardiv"><div class="media-body">
                        @if (Auth::guest())
                            <div class="top-right links">
                                <a href="{{ route('login') }}" style="font-size: 16px; color:#ffffff"><b>Login</b></a> &nbsp; &nbsp;
                                <a href="{{ route('register') }}" style="font-size: 16px; color:#ffffff"><b>Signup</b></a>
                            </div>
                        @else

                            <a href="{{route('accnt')}}" class="nav-link" role="button" aria-expanded="false" style="font-size: 16px; color:#ffffff">
                                <b>{{ucwords(Auth::user()->name) }} </b>
                            </a>

                        @endif
						 @if(Auth::check())
            @if(Auth::user()->role==2)
                <a href="/cart" class="nav-link" style="    color: #fff;
    font-size: 30px;">
                            <i class="ec ec-shopping-bag" style="font-size: 1.5em;"></i>
                            <span class="cart-items-count count">{{Cart::count()}}</span>
                        </a>
            @endif
        @endif
                    </div></div>
       

       
    </div>
	
	
</div><nav class="navbar navbar-primary navbar-full" id="mainnavmenu">
    <ul id="menu-main-menu" class="nav nav-inline yamm">
                                    <li class="menu-item "><a title="Home" href="https://www.phonefriend.in" >Home</a>

                                    </li>
                                    <li class="menu-item"><a title="Store" href="https://www.phonefriend.in/store">Store</a></li>

                                    <li class="menu-item"><a title="About Us" href="{{route('other.about')}}#aboutView">About Us</a></li>


                                    <li class="menu-item"><a title="Contact Us" href="{{route('contact')}}#mapView">Contact Us</a></li>
                                </ul>
</nav><!-- /.top-bar -->

        <!-- #masthead -->


        

        <ais-results>
            <template scope="{ result }">
                <div class="search">
                <ul class="results" id="results">
                    <li style="height: 76px"><a :href='result.url' style="height: 76px"><div class="col-md-2"><img :src="result.photo" alt="" style="height: 65px"></div> <div class="col-md-10"> <ais-highlight :class-names="{'ais-highlight': 'highlight'}" :result="result" attribute-name="company"></ais-highlight> <ais-highlight :result="result" attribute-name="model"></ais-highlight> -  @{{ result.storage }} GB<br /><span><b>₹ @{{ result.price }} </b></span></div></a></li>
                </ul>
                </div>

            </template>
        </ais-results>


    </ais-index>
</div>

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
</div><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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