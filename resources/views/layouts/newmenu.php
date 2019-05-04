<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Smart Responsive Navigation</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" rel="stylesheet" type="text/css">
<style>
html, * { box-sizing: border-box; }

body {
  padding: 50px;
  background-color: #333;
  font-family: 'Roboto', sans-serif;
  font-size: 1rem;
  line-height: 1.5;
  color: #000;
  font-weight: 100;
  -webkit-font-smoothing: antialiased;
  -webkit-text-size-adjust: 100%;
}

section {
  height: 100vh;
  color: #fff;
}

section#about { text-align: center; }

section h1 { text-align: center; }

.container { padding: 0px 15px 0px 15px; }
@media (min-width: 0) {

.container {
  max-width: 100%;
  margin-left: auto;
  margin-right: auto;
}

.container:after {
  content: " ";
  display: block;
  clear: both;
}
}
@media (min-width: 576px) {

.container {
  max-width: 540px;
  margin-left: auto;
  margin-right: auto;
}

.container:after {
  content: " ";
  display: block;
  clear: both;
}
}
@media (min-width: 768px) {

.container {
  max-width: 720px;
  margin-left: auto;
  margin-right: auto;
}

.container:after {
  content: " ";
  display: block;
  clear: both;
}
}
@media (min-width: 992px) {

.container {
  max-width: 960px;
  margin-left: auto;
  margin-right: auto;
}

.container:after {
  content: " ";
  display: block;
  clear: both;
}
}
@media (min-width: 1200px) {

.container {
  max-width: 1170px;
  margin-left: auto;
  margin-right: auto;
}

.container:after {
  content: " ";
  display: block;
  clear: both;
}
}

a {
  text-decoration: none;
  color: rgba(34, 34, 34, 0.8);
}

a:hover, a :focus { color: black; }

.menu-left a {
  display: inline-block;
  position: relative;
  padding-bottom: 0px;
  transition: color .35s ease;
}

.menu-left a:before {
  content: '';
  display: block;
  position: absolute;
  left: 0;
  bottom: 0;
  height: 2px;
  width: 0;
  transition: width 0s ease, background .35s ease;
}

.menu-left a:after {
  content: '';
  display: block;
  position: absolute;
  right: 0;
  bottom: 0;
  height: 2px;
  width: 0;
  background: #000;
  transition: width .35s ease;
}

.menu-left a:hover:before {
  width: 100%;
  background: #000;
  transition: width .35s ease;
}

.menu-left a:hover:after {
  width: 100%;
  background: transparent;
  transition: all 0s ease;
}

header {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
 padding: .5rem 0;
  background: rgba(255, 255, 255, 0.92);
  z-index: 3;
  will-change: transform;
  transition: background 0.3s, -webkit-transform 0.5s cubic-bezier(0.694, 0.048, 0.335, 1);
  transition: transform 0.5s cubic-bezier(0.694, 0.048, 0.335, 1), background 0.3s;
  transition: transform 0.5s cubic-bezier(0.694, 0.048, 0.335, 1), background 0.3s, -webkit-transform 0.5s cubic-bezier(0.694, 0.048, 0.335, 1);
  transform: translateY(0);
  -webkit-transform: translateY(0);
}

header nav .logo {
  float: left;
 padding-top: .25rem;
 padding-bottom: .25rem;
  margin-right: 1rem;
  font-size: 1.25rem;
  line-height: inherit;
  font-weight: 500;
  color: black;
}

header nav .logo:after {
  content: '';
  display: table;
  clear: both;
}

header nav ul {
  list-style: none;
  padding-left: 0;
  margin: 0;
}

header nav ul li {
  float: none;
  margin-left: 0;
}
@media (min-width: 768px) {

header nav ul li {
  float: left;
  margin-left: 1rem;
}
}

header nav ul li a { display: block; }
@media (min-width: 576px) {

header nav ul li a { display: block;  padding: .425rem 0rem;
}
}
 @media (max-width: 768px) {

ul { clear: both; }

ul li { padding: .5em 0; }
}

.hide-nav {
 transform: translateY(-120% !important); -webkit-transform: translateY(-120%) !important; }

ul.menu-left {
  display: block;
  max-height: 0;
  overflow: hidden;
  -webkit-transition: all 0.3s ease-out;
  -moz-transition: all 0.3s ease-out;
  -ms-transition: all 0.3s ease-out;
  -o-transition: all 0.3s ease-out;
  transition: all 0.3s ease-out;
  z-index: 10;
}
@media (min-width: 768px) {

ul.menu-left {
  display: block !important;
  float: right;
  max-height: none;
}
}

ul.menu-left:before {
  content: '';
  display: table;
  clear: both;
}

ul.menu-left.collapse { max-height: 15em !important; }

.nav-toggle {
  display: block;
  border-radius: 5px;
  background-color: transparent;
  float: right;
  height: 38px;
  width: 38px;
  cursor: pointer;
  padding: 8px 8px;
}

.nav-toggle.open span:first-child { transform: rotate(45deg) translate(4.4px, 4.4px); }

.nav-toggle.open span:nth-child(2) {
  width: 0%;
  opacity: 0;
}

.nav-toggle.open span:last-child { transform: rotate(-45deg) translate(4.4px, -4.4px); }
@media (min-width: 768px) {

.nav-toggle { display: none; }
}

.nav-toggle span {
  position: relative;
  display: block;
  height: 2px;
  width: 100%;
  margin-top: 4px;
  background-color: #000;
  transition: all .25s;
}

.signature {
  position: fixed;
  font-weight: 100;
  bottom: 10px;
  color: #000;
  left: 0;
  letter-spacing: 4px;
  font-size: 10px;
  width: 100vw;
  text-align: center;
  text-transform: uppercase;
  text-decoration: none;
}
</style>
</head>

<body>
<header>
  <div class="container">
    <nav id="navigation"> <a href="#" class="logo">Home</a> <a aria-label="mobile menu" class="nav-toggle"> <span></span> <span></span> <span></span> </a>
      <ul class="menu-left">
        <li><a href="#cat">Category</a></li>
        <li><a href="#rec">Recommoended</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#blog">Blog</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
  </div>
</header>


<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script> 
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script> 
<script>
// back to top 
$('.logo').on('click', function(e) {
  e.preventDefault();
  $('.nav-toggle').removeClass('open');
  $('.menu-left').removeClass('collapse');
  $('html, body').animate({
    scrollTop: 0
  }, 750, 'easeInOutQuad')
});

// smooth scroll between sections
$('a[href^="#"]').on('click', function(event) {

  var $target = $(this.getAttribute('href'));

  if($target.length) {
    event.preventDefault();
    $('html, body').stop().animate({
      scrollTop: $target.offset().top
    }, 750, 'easeInOutQuad');
  }
});

// TOGGLE HAMBURGER & COLLAPSE NAV
$('.nav-toggle').on('click', function() {
  $(this).toggleClass('open');
  $('.menu-left').toggleClass('collapse');
});
// REMOVE X & COLLAPSE NAV ON ON CLICK
$('.menu-left a').on('click', function() {
  $('.nav-toggle').removeClass('open');
  $('.menu-left').removeClass('collapse');
});

// SHOW/HIDE NAV

// Hide Header on on scroll down
var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $('header').outerHeight();

$(window).scroll(function(event){
    didScroll = true;
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);

function hasScrolled() {
    var st = $(this).scrollTop();

    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;

    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        $('header').removeClass('show-nav').addClass('hide-nav');
        $('.nav-toggle').removeClass('open');
        $('.menu-left').removeClass('collapse');
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
            $('header').removeClass('hide-nav').addClass('show-nav');
        }
    }

    lastScrollTop = st;
}
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
