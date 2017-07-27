@extends('layouts.home')
@section('title','登录')
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
<!-- //animation-effect -->
@section('content')
	
<!-- //header -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>主页</a></li>
				<li class="active">登录页面</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">登录</h3>
			<p class="est animated wow zoomIn" data-wow-delay=".5s">欢迎回来，对你无微不至的服务是我们的宗旨，让你愉快是我们的追求</p>
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form>
					<div style="height:42px;margin-bottom: 25px;">
						<input class="username" type="email" placeholder="邮箱地址" required=" " >
						<div id="user_info" style="display:none;color:red;">请输入合法的邮箱</div>
					</div>
					<div style="height:42px;margin-bottom: 25px;">
						<input class="password" type="password" placeholder="密码" required=" " >
						<div id="pwd_info" style="display:none;color:red;">密码位数小于6位</div>
					</div>
					
					
<!-- 					<select name="gg"> -->
<!-- 					   <option  value ="1">a</option> -->
<!-- 					   <option  value ="2">b</option> -->
<!-- 					   <option  value ="3">c</option> -->
<!-- 					   <option  value ="4">d</option> -->
<!-- 					</select> -->
<!-- 				<div ></div> -->
					<div style="height:42px;margin-bottom: 25px;">
						<input class="sub1" type="button" value="登录">
						<div id="errorInfo" style="color:red;"></div>
					</div>
				</form>
				<script>
				$(function(){
					$('.username').focus(function(){
						$('#errorInfo').text('');
						$(this).keyup(function(){
							var username = $('.username').val();
							var regex = /^\w*@?\w*\.*\w+$/;
							if(regex.test(username) || username == ''){
								$('#user_info').hide();
							}else{
								$('#user_info').show();
							}
						});
					});
					
					$('.password').focus(function(){
						$('#errorInfo').text('');
						$(this).keyup(function(){
							var pwd = $('.password').val();
							if(pwd.length >= 6 || pwd.length == 0){
								$('#pwd_info').hide();
							}else{
								$('#pwd_info').show();
							}
						});
					});
										
					$('.sub1').click(function(){
						var user = $('.username').val();
						var pwd = $('.password').val();
						
						$.ajax({
							type:"post",
							url:"auth",
							data:{
								email:user,
								pwd:pwd,
								_token:'{{csrf_token()}}'
							},
							success:function(resp){
								if(resp.status == 200){
									alert(resp.date);
									window.location.href = "{{asset('home/index')}}"
								}else if(resp.status == 1000){
									$('#errorInfo').text(resp.msg);
								}
							},
							error:function(err){
								var e = $.parseJSON(err.responseText);
								if(e.email instanceof Array){
									$('#errorInfo').text(e.email[0]);
								}else if(e.pwd instanceof Array){
									$('#errorInfo').text(e.pwd[0]);
								}		
							}	
						});
					});
				});
				</script>
			</div>
			<h4 class="animated wow slideInUp" data-wow-delay=".5s">新用户</h4>
			<p class="animated wow slideInUp" data-wow-delay=".5s"><a href="register">点击注册</a> 或者回到 <a href="index">主页<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>
<!-- //login -->
@endsection
