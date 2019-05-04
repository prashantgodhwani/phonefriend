<!DOCTYPE html>
<html>
<head><!-- Global site tag (gtag.js) - Google Ads: 801041161 --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-801041161"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-801041161'); </script>
   
    <meta charset="utf-8" />
    <title>Administration Panel | Phone Friend</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />

    <!-- App css -->
    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
    <script src="{{asset('admin/assets/js/modernizr.min.js')}}"></script>
    <link href="{{asset('assets/css/bootstrap-pincode-input.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL('assets/css/jquery.dataTables.min.css')}}" media="screen" rel="stylesheet" type="text/css" />
    <link href="{{URL('assets/css/buttons.dataTables.min.css')}}" media="screen" rel="stylesheet" type="text/css" />
    <link href="{{URL('assets/css/custom.dataTables.css')}}" media="screen" rel="stylesheet" type="text/css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    

  
    
    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '341098883103018');
        fbq('track', 'PageView');
    </script>
    

</head>

<body>
    <script>
  gtag('event', 'conversion', {'send_to': 'AW-801041161/raLiCIGHqoUBEInW-_0C'});
</script>
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MGB9VQV" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- Begin page -->
    <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">

            <div class="slimscroll-menu" id="remove-scroll">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="{{route('admin.dashboard')}}" class="logo">
                        <span>
                                <img src="{{asset('images/logo1.png')}}" alt="" height="35">
                            </span>
                        <i>
                                <img src="{{asset('images/logo1.png')}}" alt="" height="38">
                            </i>
                    </a>
                </div>

                <!-- User box -->
                <div class="user-box">
                    <div class="user-img">
                        <img src="https://i2.wp.com/www.aiwebdesigns.com/wp-content/uploads/2016/10/mystery-man.png?resize=250%2C250" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                    </div>
                    <h5><a href="#">{{ucwords(Auth::user()->name) }} </a> </h5>
                    <p class="text-muted">Administrator</p>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul class="metismenu" id="side-menu">

                        <!--<li class="menu-title">Navigation</li>-->

                        <li>
                            <a href="{{route('admin.dashboard')}}">
                                <i class="fi-air-play"></i><span> Dashboard </span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);"><i class="fi-layers"></i> <span> Data </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{route('admin.brands')}}">Brands</a></li>
                                <li><a href="{{route('admin.models')}}">Models</a></li>
                                <li><a href="{{route('phones.all')}}">Advertisements</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);"><i class="icon-handbag"></i><span> Orders </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{route('admin.orders')}}">All</a></li>
                                <li><a href="{{route('orders.success')}}">Successful</a></li>
                                <li><a href="{{route('orders.failed')}}">Failed</a></li>
                                <li><a href="{{route('orders.unprocessed')}}">Not Processed</a></li>
                                <li><a href="{{route('orders.cancelled')}}">Cancelled</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{route('admin.accounts')}}"><i class="mdi mdi-account-convert"></i><span> Accounts </span> <span class="menu-arrow"></span></a>
                        </li>

                        <li>
                            <a href="javascript: void(0);"><i class="icon-user-following"></i><span> User Management <span class="menu-arrow"></span></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{route('admins.all')}}">Admins</a></li>
                                <li><a href="{{route('merchant.all')}}">Merchants</a></li>
                                <li><a href="{{route('users.all')}}">Users</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{route('admin.merchantrequests')}}">
                                <i class="fi-air-play"></i><span> Merchant Requests</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('admin.contacted')}}">
                                <i class="icon-user"></i><span> Contact Requests</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('admin.repair')}}"><i class="fa fa-cogs"></i>

                                    <span> Repair </span> <span class="menu-arrow"></span></a>
                        </li>

                        <li>
                            <a href="{{URL('/admin/offer-subscribers')}}"><i class="fa fa-users"></i>
                                        <span> Offer Subscribers </span> <span class="menu-arrow"></span></a>
                        </li>
                        <li>
                             <a href="{{route('admin.comments')}}"><i class="fa fa-cogs"></i>

                                    <span> Review & Comment </span> <span class="menu-arrow"></span></a>
                        </li>

                    </ul>

                </div>
                <!-- Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <div class="content-page">

            <!-- Top Bar Start -->
            <div class="topbar">

                <nav class="navbar-custom">

                    <ul class="list-unstyled topbar-right-menu float-right mb-0">

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="https://i2.wp.com/www.aiwebdesigns.com/wp-content/uploads/2016/10/mystery-man.png?resize=250%2C250" alt="user" class="rounded-circle"> <span class="ml-1">{{ucwords(Auth::user()->name) }}  <i class="mdi mdi-chevron-down"></i> </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="{{route('accnt')}}" class="dropdown-item notify-item">
                                    <i class="fi-head"></i> <span>My Account</span>
                                </a>

                                <a href="{{route('twofactor.authenticate')}}" class="dropdown-item notify-item">
                                    <i class="fi-lock"></i> <span>2F Authentication</span>
                                </a>

                                <a class="dropdown-item notify-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    <i class="fi-power"></i> <span>Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left disable-btn">
                                <i class="dripicons-menu"></i>
                            </button>
                        </li>
                        <li>
                            <div class="page-title-box">
                                <h4 class="page-title">Dashboard </h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">PhoneFriend</a></li>
                                    <li class="breadcrumb-item active">Admin</li>
                                </ol>
                            </div>
                        </li>

                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->

            <!-- Start Page content -->
            @yield('content') 
            <footer class="footer text-right">
                2018 © Phone Friend
            </footer>

        </div>

        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/waves.js')}}"></script>
    <script src="{{asset('admin/assets/js/jquery.slimscroll.js')}}"></script>
<script>
$(document).ready(function(){
	
	$(".tracklink").click(function()
	{
		var phone=$(this).attr("id");
		
		$("#mobileno").val(phone);
		
	});
	
});

</script>
    <!-- KNOB JS -->
    <!--[if IE]>
<script type="text/javascript" src="{{asset('admin/plugins/jquery-knob/excanvas.js')}}"></script>
<![endif]-->
    <script src="{{asset('admin/plugins/jquery-knob/jquery.knob.js')}}"></script>

    <!-- Counter Up  -->
    <script src="{{asset('admin/plugins/waypoints/lib/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('admin/plugins/counterup/jquery.counterup.min.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('admin/assets/js/jquery.core.js')}}"></script>
    <script src="{{asset('admin/assets/js/jquery.app.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script>
        $('.selectpicker').selectpicker();
    </script>
    <script type="text/javascript" src="{{URL('assets/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{URL('assets/js/dataTables.buttons.min.js')}}"></script>
    <script type="text/javascript" src="{{URL('assets/js/buttons.flash.min.js')}}"></script>
    <script type="text/javascript" src="{{URL('assets/js/jszip.min.js')}}"></script>
    <script type="text/javascript" src="{{URL('assets/js/pdfmake.min.js')}}"></script>
    <script type="text/javascript" src="{{URL('assets/js/vfs_fonts.js')}}"></script>
    <script type="text/javascript" src="{{URL('assets/js/buttons.html5.min.js')}}"></script>
    <script type="text/javascript" src="{{URL('assets/js/buttons.print.min.js')}}"></script>
    <script type="text/javascript" src="{{URL('assets/js/buttons.colVis.min.js')}}"></script>
    <script type="text/javascript" src="{{URL('assets/js/custom-datatable.js')}}"></script>
   
    @yield('scripts')
    </body> 
</html>