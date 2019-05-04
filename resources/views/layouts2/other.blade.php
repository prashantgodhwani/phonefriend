


<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head><!-- Global site tag (gtag.js) - Google Ads: 801041161 --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-801041161"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-801041161'); </script>
   
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Phone Friend | Second Hand Smartphone store</title>
<meta name="description" content="Buy refurbished, box opened and certified pre owned mobile phones, tablets & laptops online in India with huge discounts, 1 year warranty, free shipping, and COD."/>
<meta name="keywords" content=" buy refurbished mobile phones online, unboxed mobile phones, box opened mobiles, certified pre owned phones, refurbishd cell phones, used cell phones, unboxed cell phones, box open phones, open box phones, online shopping India, refurbished smart phones, shop refurbished mobiles online, refurbished mobiles India
"><link rel="canonical" href="https://www.phonefriend.in/">

<meta name="csrf-token" content="{{ csrf_token() }}">
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
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}" media="all" />
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}" media="all" />
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.min.css')}}" media="all" />
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-electro.css')}}" media="all" />
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl-carousel.css')}}" media="all" />
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css?v=1.0')}}" media="all" />
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/colors/green.css')}}" media="all" />
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendor-prefixes.css')}}" media="all" />
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

      <link href="{{asset('assets/css/jquery.steps.css')}}" rel="stylesheet" type="text/css" media="all" />

      <link href="{{asset('assets/css/c588c3c0468f4633c99de6e16289c863.css')}}" rel="stylesheet" type="text/css" media="all" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" />
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,700italic,800,800italic,600italic,400italic,300italic' rel='stylesheet' type='text/css'>
      <link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css' rel='stylesheet' type='text/css'>

      <link rel="shortcut icon" href="{{asset('assets/images/fav-icon.png')}}">
      <style>
      .fa-stack[data-count]:after{
        position:absolute;
        right:0%;
        top:1%;
        content: attr(data-count);
        font-size:30%;
        padding:.6em;
        border-radius:999px;
        line-height:.75em;
        color: white;
        background:rgb(232, 34, 45);;
        text-align:center;
        min-width:2em;
        font-weight:bold;
    }
</style>
<!-- Global site tag (gtag.js) - Google Analytics -->


</head>

<body class="home-v2">
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MGB9VQV"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <div id="page" class="hfeed site">
            <a class="skip-link screen-reader-text" href="#site-navigation">Skip to navigation</a>
            <a class="skip-link screen-reader-text" href="#content">Skip to content</a>

            @include('layouts.othernav')

            @yield('content')

            @include('layouts.footer')

        </div><!-- #page -->



        @yield('scripts')
        <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
        <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>

        <!-- Initialize autocomplete menu -->
        <script>
            var client = algoliasearch('Q5IYJ43XF9', '32f4e1a21b5c4916e28414258fab3ade');
            var index = client.initIndex('phones');
    //initialize autocomplete on search input (ID selector must match)
    autocomplete('#aa-search-input',
        { hint: false }, {
            source: autocomplete.sources.hits(index, {hitsPerPage: 5, filters: 'units_rem!=0 AND sold!=2'}),
            //value to be displayed in input control after user's suggestion selection
            displayKey: 'name',
            //hash of templates used when rendering dataset
            templates: {
                //'suggestion' templating function used to render a single suggestion
                suggestion: function(suggestion) {
                    var str=suggestion.dp;

                    return '<span><a href="' +
                    suggestion.url +
                    '">' +
                    suggestion._highlightResult.company.value+" "+suggestion._highlightResult.model.value + '</span><span>' +
                    '<img src="../storage/' +
                    str.replace("public","")+
                    '" style="width: 60px">' + '</a></span>';
                }
            }
        });
    </script>

</body>

</html>
