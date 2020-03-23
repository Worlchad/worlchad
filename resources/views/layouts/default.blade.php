<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from wrappixel.com/ampleadmin/ampleadmin-html/ampleadmin-material/400.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Oct 2018 23:57:00 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
<title>@yield('page_title') - Worlchad Admin</title>
<!-- Bootstrap Core CSS -->
<link href="{{asset('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
<!-- animation CSS -->
<link href="{{asset('css/animate.css')}}" rel="stylesheet">

<!-- Custom CSS -->
<link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
<!-- color CSS -->
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
@yield('page_styles')
</head>
<body>
<!-- Preloader -->

@yield('content')
<!-- jQuery -->
<script src="{{asset('/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('bootstrap/dist/js/bootstrap.min.js')}}"></script>


</body>

<!-- Mirrored from wrappixel.com/ampleadmin/ampleadmin-html/ampleadmin-material/400.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Oct 2018 23:57:00 GMT -->
</html>
