<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head><!-- Global site tag (gtag.js) - Google Ads: 801041161 --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-801041161"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-801041161'); </script><script async src="https://www.googletagmanager.com/gtag/js?id=AW-801041161"></script>
<!-- Global site tag (gtag.js) - Google Ads: 801041161 --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-801041161"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-801041161'); </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')


    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.min.css')}}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-electro.css')}}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl-carousel.css')}}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/$deal')}}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/colors/green.css')}}" media="all" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/dropzone.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" />
    <meta name="keywords" content="cheap second hand phones for sale, buy refurbished iphone in india, box opened mobile phones, certified pre owned mobile phones, tablets & laptops online in india with huge discounts, smartphone store in noida, second hand iphones for sale, old samsung phones for sale, second hand samsung phones for sale, refurbished oneplus phones, second hand and used oppo mobile phone, second hand vivo mobile phone, mi second hand phone, motorola second hand phone, nokia second hand phones, blackberry second hand phone, gionee second hand phone, lenovo second hand phone">
    <link rel="canonical" href="https://www.phonefriend.in/">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,700italic,800,800italic,600italic,400italic,300italic' rel='stylesheet' type='text/css'>
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window,document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '2250243695224974');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1"
             src="https://www.facebook.com/tr?id=2250243695224974&ev=PageView
&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
    <link rel="shortcut icon" href="{{asset('assets/images/fav-icon.png')}}">
    <style>

        .badge {
            display: inline-block;
            min-width: 10px;
            padding: 3px 7px;
            font-size: 12px;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            background-color: #777;
            border-radius: 10px;
        }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-121571191-1"></script>
    <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-121571191-1');
</script>
    
</head>

<body class="home-v2">
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MGB9VQV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<div id="page" class="hfeed site">
  
    @yield('content')

    @include('layouts.footer')

</div><!-- #page -->

@yield('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
<script>
    $( document ).ready(function() {
        $('#aa-search-input').on('keydown', function (e) {
            if (e.which == 13) {
                window.location = 'https://phonefriend.in/store/'+document.getElementById('aa-search-input').value.split(' ').join('-');
            }

        });
    });
</script>

</body>

</html>
