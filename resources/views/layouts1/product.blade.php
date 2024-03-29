


<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head><!-- Global site tag (gtag.js) - Google Ads: 801041161 --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-801041161"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-801041161'); </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Phone Friend | Second Hand Smartphone store</title>
    <meta name="description" content="Buy refurbished, box opened and certified pre owned mobile phones, tablets & laptops online in India with huge discounts, 1 year warranty, free shipping, and COD."/>
    <meta name="keywords" content=" buy refurbished mobile phones online, unboxed mobile phones, box opened mobiles, certified pre owned phones, refurbishd cell phones, used cell phones, unboxed cell phones, box open phones, open box phones, online shopping India, refurbished smart phones, shop refurbished mobiles online, refurbished mobiles India

"><link rel="canonical" href="https://www.phonefriend.in/">
    <meta property="og:title" content="{{ucwords($phone->data->company)}} {{$phone->data->model}} - {{$phone->data->storage}} GB at Phone Friend" />
    <meta property="og:type" content="product" />

    <meta property="og:image" content="https://www.phonefriend.in/storage{{str_replace("public", "", $phone->photos[0]->filename)}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.min.css')}}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-electro.css')}}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl-carousel.css')}}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/colors/green.css')}}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/magiczoom.css')}}" media="all" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/dropzone.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" />
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
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,700italic,800,800italic,600italic,400italic,300italic' rel='stylesheet' type='text/css'>

    <link rel="shortcut icon" href="{{asset('assets/images/fav-icon.png')}}">
    <style>
        .highlight em{
            background-color: #BCE063;
            color:white;
        }
        .search input[type=search]:focus  + .results { display: block }
        .search .results {  display: none;
            position: absolute;
            top: 29%;
            left: 28%;
            right: 28%;
            z-index: 10;
            padding: 0;
            margin: 0;
            border-width: 1px;
            border-style: solid;
            border-color: #cbcfe2 #c8cee7 #c4c7d7;
            border-radius: 3px;
            background-color: #fdfdfd;
            background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fdfdfd), color-stop(100%, #eceef4));
            background-image: -webkit-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: -moz-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: -ms-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: -o-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: linear-gradient(top, #fdfdfd, #eceef4);
            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            -ms-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            -o-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .search .results li { display: block }

        .search .results li:first-child { margin-top: -1px }

        .search .results li:first-child:before, .search .results li:first-child:after {
            display: block;
            content: '';
            width: 0;
            height: 0;
            position: absolute;
            left: 50%;
            margin-left: -5px;
            border: 5px outset transparent;
        }

        .search .results li:first-child:before {
            border-bottom: 5px solid #c4c7d7;
            top: -11px;
        }

        .search .results li:first-child:after {
            border-bottom: 5px solid #fdfdfd;
            top: -10px;
        }

        .search .results li:first-child:hover:before, .search .results li:first-child:hover:after { display: none }

        .search .results li:last-child { margin-bottom: -1px }

        .search .results a {
            display: block;
            position: relative;
            margin: 0 -1px;
            padding: 6px 40px 6px 10px;
            color: #808394;
            font-weight: 500;
            text-shadow: 0 1px #fff;
            border: 1px solid transparent;
            border-radius: 3px;
        }

        .search .results a span { font-weight: 200 }

        .search .results a:before {
            content: '';
            width: 18px;
            height: 18px;
            position: absolute;
            top: 50%;
            right: 10px;
            margin-top: -9px;
            background: url("https://cssdeck.com/uploads/media/items/7/7BNkBjd.png") 0 0 no-repeat;
        }

        .search .results a:hover {
            text-decoration: none;
            color: #fff;
            text-shadow: 0 -1px rgba(0, 0, 0, 0.3);
            border-color: #2380dd #2179d5 #1a60aa;
            background-color: #338cdf;
            background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #59aaf4), color-stop(100%, #338cdf));
            background-image: -webkit-linear-gradient(top, #59aaf4, #338cdf);
            background-image: -moz-linear-gradient(top, #59aaf4, #338cdf);
            background-image: -ms-linear-gradient(top, #59aaf4, #338cdf);
            background-image: -o-linear-gradient(top, #59aaf4, #338cdf);
            background-image: linear-gradient(top, #59aaf4, #338cdf);
            -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
            -moz-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
            -ms-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
            -o-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
            box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
        }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    
</head>

<body class="single-product full-width">
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MGB9VQV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<div>
    
    @include('layouts.nav')

    @yield('content')


    @include('layouts.footer')

</div><!-- #page -->


<script src="{{ asset('js/app.js') }}"></script>
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
                    '<img src="../../../storage/' +
                    str.replace("public","")+
                    '" style="width: 60px">' + '</a></span>';
                }
            }
        });
</script>


<script>
    function showdiv() {
        document.getElementById("results").style.display = "block";
    }
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
