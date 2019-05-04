<!DOCTYPE html>
<html>

<!-- Mirrored from coderthemes.com/highdmin/layout/widgets.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Feb 2018 17:11:14 GMT -->
<head><!-- Global site tag (gtag.js) - Google Ads: 801041161 --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-801041161"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-801041161'); </script>

    <meta charset="utf-8" />
    <title>Highdmin - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet" type="text/css" />

    <script src="{{asset('admin/assets/js/modernizr.min.js')}}"></script>
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '341098883103018');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=341098883103018&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
</head>


<body>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MGB9VQV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- Begin page -->
<div id="wrapper">

    @yield('content')

</div>
<!-- jQuery  -->
<script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
<script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/assets/js/metisMenu.min.js')}}"></script>
<script src="{{asset('admin/assets/js/waves.js')}}"></script>
<script src="{{asset('admin/assets/js/jquery.slimscroll.js')}}"></script>

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

</body>
</html>