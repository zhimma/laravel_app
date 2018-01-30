<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>芝麻开门</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="芝麻开门 blog PHP Laravel Mysql BUG" />
    <meta name="keywords" content="芝麻开门 blog PHP Laravel Mysql BUG" />
    {{--<meta name="author" content="freehtml5.co" />--}}

    <!--
    //////////////////////////////////////////////////////

    FREE HTML5 TEMPLATE
    DESIGNED & DEVELOPED by FreeHTML5.co

    Website: 		http://freehtml5.co/
    Email: 			info@freehtml5.co
    Twitter: 		http://twitter.com/fh5co
    Facebook: 		https://www.facebook.com/fh5co

    //////////////////////////////////////////////////////
     -->

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('home/css/animate.css') }}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('home/css/icomoon.css') }}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css')}}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('home/css/magnific-popup.css') }}">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="{{ asset('home/css/flexslider.css') }}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">

    <!-- Modernizr JS -->
    <script src="{{ asset('home/js/modernizr-2.6.2.min.js') }}"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="{{ asset('home/js/respond.min.js') }}"></script>
    <![endif]-->

</head>
<body>

<div class="fh5co-loader"></div>

<div id="page">
    @include('home.layout.header')
    @yield('content')
    @include('home.layout.footer')
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="{{ asset('home/js/jquery.min.js') }}"></script>
<!-- jQuery Easing -->
<script src="{{ asset('home/js/jquery.easing.1.3.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('home/js/bootstrap.min.js') }}"></script>
<!-- Waypoints -->
<script src="{{ asset('home/js/jquery.waypoints.min.js') }}"></script>
<!-- Flexslider -->
<script src="{{ asset('home/js/jquery.flexslider-min.js') }}"></script>
<!-- Magnific Popup -->
<script src="{{ asset('home/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('home/js/magnific-popup-options.js') }}"></script>
<!-- Main -->
<script src="{{ asset('home/js/main.js') }}"></script>

</body>
</html>

