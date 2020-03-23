<!DOCTYPE html>
<html class="no-js" lang="zxx">

<!-- Mirrored from codeboxr.net/themedemo/unialumni/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Dec 2018 15:53:39 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title') | WorlChad</title>

    <meta name="description" content="Worlchad "/>
<meta name="keywords" content="worldchad, talent"/>
<meta name="author" content="Samfield Hawb"/>
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- twitter card starts from here, if you don't need remove this section -->
<meta name="twitter:card" content="summary"/>
<meta name="twitter:site" content="@yourtwitterusername"/>
<meta name="twitter:creator" content="@yourtwitterusername"/>
<meta name="twitter:url" content="{{url()->current()}}"/>
<meta name="twitter:title" content="@yield('title')"/> <!-- maximum 140 char -->
<meta name="twitter:description" content=""/> <!-- maximum 140 char -->
<meta name="twitter:image"
      content="assets/img/twittercardimg/twittercard-144-144.png"/>  <!-- when you post this page url in twitter , this image will be shown -->
<!-- twitter card ends here -->

<!-- facebook open graph starts from here, if you don't need then delete open graph related  -->
<meta property="og:title" content="@yield('title')"/>
<meta property="og:url" content="{{url()->current()}}"/>
<meta property="og:locale" content="en_US"/>
<meta property="og:site_name" content="Worlchad"/>
<!--meta property="fb:admins" content="" /-->  <!-- use this if you have  -->
<meta property="og:type" content="website"/> <!-- 'article' for single page  -->
<meta property="og:image"
      content="{{asset('assets/img/opengraph/fbphoto-476-476.png')}}"/> <!-- when you post this page url in facebook , this image will be shown -->
<!-- facebook open graph ends here -->

<!-- desktop bookmark -->
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="{{asset('assets/img/favicon/ms-icon-144x144.png')}}">
<meta name="theme-color" content="#ffffff">

<!-- icons & favicons -->
<link rel="shortcut icon" type="image/x-icon"  href="{{asset('assets/img/favicon/favicon.ico')}}"/>  <!-- this icon shows in browser toolbar -->
<link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon/favicon.ico')}}"/> <!-- this icon shows in browser toolbar -->
<link rel="apple-touch-icon" sizes="57x57" href="{{asset('assets/img/favicon/apple-icon-57x57.png')}}">
<link rel="apple-touch-icon" sizes="60x60" href="{{asset('assets/img/favicon/apple-icon-60x60.png')}}">
<link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/img/favicon/apple-icon-72x72.png')}}">
<link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/favicon/apple-icon-76x76.png')}}">
<link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/img/favicon/apple-icon-114x114.png')}}">
<link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets/img/favicon/apple-icon-120x120.png')}}">
<link rel="apple-touch-icon" sizes="144x144" href="{{asset('assets/img/favicon/apple-icon-144x144.png')}}">
<link rel="apple-touch-icon" sizes="152x152" href="{{asset('assets/img/favicon/apple-icon-152x152.png')}}">
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/img/favicon/apple-icon-180x180.png')}}">
<link rel="icon" type="image/png" sizes="192x192" href="{{asset('assets/img/favicon/android-icon-192x192.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/img/favicon/favicon-32x32.png')}}">
<link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/favicon/favicon-96x96.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/img/favicon/favicon-16x16.png')}}">
<link rel="manifest" href="{{asset('assets/img/favicon/manifest.json')}}">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}" />
<link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}" />

<!-- Fallback For IE 9 [ Media Query and html5 Shim] -->
<!--[if lt IE 9]>
<script src="assets/vendor/css3-mediaqueries-js/css3-mediaqueries.js"></script>
<![endif]-->

<!-- GOOGLE FONT -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet" />

<!-- BOOTSTRAP CSS -->
<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" /> 
<link rel="stylesheet" href="{{asset('assets/vendor/navbar/bootstrap-4-navbar.css')}}" /> 

<!--Animate css -->
<link rel="stylesheet" href="{{asset('assets/vendor/animate/animate.css')}}" media="all" />

<!-- FONT AWESOME CSS -->
<link rel="stylesheet" href="{{asset('assets/vendor/fontawesome/css/font-awesome.min.css')}}" />

<!--owl carousel css -->
<link rel="stylesheet" href="{{asset('assets/vendor/owl-carousel/owl.carousel.css')}}" media="all" />
<link rel="stylesheet" href="{{asset('assets/vendor/owl-carousel/owl.theme.default.min.css')}}" media="all" />

<!--Magnific Popup css -->
<link rel="stylesheet" href="{{asset('assets/vendor/magnific/magnific-popup.css')}}" media="all" />

<!--Nice Select css -->
<link rel="stylesheet" href="{{asset('assets/vendor/nice-select/nice-select.css')}}" media="all" />

<!--Offcanvas css -->
<link rel="stylesheet" href="{{asset('assets/vendor/js-offcanvas/css/js-offcanvas.css')}}" media="all" />



<!-- Main Master Style  CSS  -->
<link id="cbx-style" data-layout="1" rel="stylesheet" href="{{asset('assets/css/style.css')}}" media="all" />
@yield('page_styles')
</head>
<body>

<!--[if lt IE 7]>
<p class="browsehappy">We are Extreamly sorry, But the browser you are using is probably from when civilization started. Which is way behind to view this site properly. Please update to a modern browser, At least a real browser. </p>
<![endif]-->
    @include('inc.menu')
      @yield('content')

    @include('inc.footer_main')


<script src="{{asset('/js/app.js')}}"></script>
<script src="{{asset('/assets/js/main.js')}}"></script>
@include('sweet::alert')
@yield('page_scripts')
</body>
</html>
