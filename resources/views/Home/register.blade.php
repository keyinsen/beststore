@extends('layouts.home')
@section('title','注册')

@section('y')
<!-- for-mobile-apps -->
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


<!-- //animation-effect -->
@endsection('y')

@section('content')
<!-- header -->

<!-- //header -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>主页</a></li>
				<li class="active">注册页面</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->

<!-- register -->
	<div class="register">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">注 册</h3>
<!-- 			<p class="est animated wow zoomIn" data-wow-delay=".5s">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia  -->
<!-- 				deserunt mollit anim id est laborum.</p> -->
			<div class="login-form-grids">
				<h5 class="animated wow slideInUp" data-wow-delay=".5s">个人信息</h5>
				<form class="animated wow slideInUp" data-wow-delay=".5s" method="post" action="registers">
					<input type="hidden" name="_token" value="{{csrf_token()}}"/>
					<input type="text" name="username" placeholder="用户名" required=" " >
					<input type="text" name="usertel" placeholder="电话号码" required=" " >
					<input type="text" name="useremail" placeholder="邮箱" required=" " ><br>
					<input type="password" name="userpassword" placeholder="密码" required=" " ><br/>
					<input type="password" name="userpsw" placeholder="确认密码" required=" " ><br/>
					<input type="submit" name="submit" value="注册">
				</form>
				<div class="register-check-box animated wow slideInUp" data-wow-delay=".5s">
					<div class="check">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>记住密码</label>
					</div>
				</div><br/>
			</div>
		</div>
	</div>
<!-- //register -->
@endsection