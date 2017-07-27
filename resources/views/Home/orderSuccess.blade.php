@extends('layouts.home')
@section('title','付款成功')
@section('y')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Best Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <!-- js -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <!-- //js -->
    <!-- cart -->
    <script src="{{asset('js/simpleCart.min.js')}}"> </script>
    <!-- cart -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui.css')}}">
    <!-- for bootstrap working -->
    <script type="text/javascript" src="{{asset('js/bootstrap-3.1.1.min.js')}}"></script>
    <!-- //for bootstrap working -->

    <!-- animation-effect -->
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script>
        new WOW().init();
    </script>
@endsection
@section('content')
    <!-- //header -->
    <!-- breadcrumbs -->
    <div style="text-align: center;font-size: 30px;color: #0c9c6e">付款成功</div>
    <div style="text-align: center"><a href="../myOrder">我的订单</a></div>
    <!-- //checkout -->
@endsection