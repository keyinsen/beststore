@extends('layouts.home')
@section('title','首页')
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
<script src="{{asset('js/jquery.countdown.js')}}"></script>
<!-- <script src="{{asset('js/script.js')}}"></script> -->
<!-- //js -->
<!-- cart -->
<script src="{{asset('js/simpleCart.min.js')}}"></script>
<!-- cart -->
<!-- for bootstrap working -->
<script type="text/javascript" src="{{asset('js/bootstrap-3.1.1.min.js')}}"></script>
<!-- //for bootstrap working -->

<!-- timer -->
<link rel="stylesheet" href="{{asset('css/jquery.countdown.css')}}" />
<!-- //timer -->
<!-- animation-effect -->
<link href="{{asset('css/animate.min.css')}}" rel="stylesheet"> 
<script src="{{asset('js/wow.min.js')}}"></script>
<script>
 new WOW().init();
</script>
@endsection
@section('content')
<!-- //header -->
<!-- banner -->
	<div class="banner">
		<div class="container">
			<div class="banner-info animated wow zoomIn" data-wow-delay=".5s">
				<h3>Free Online Shopping</h3>
				<h4>Up to <span>50% <i>Off/-</i></span></h4>
				<div class="wmuSlider example1">
					<div class="wmuSliderWrapper">
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<div class="banner-info1">
									<p>奶茶+汉堡+手抓饼</p>
								</div>
							</div>
						</article>
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<div class="banner-info1">
									<p>美食天天享</p>
								</div>
							</div>
						</article>
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<div class="banner-info1">
									<p>休闲娱乐美食</p>
								</div>
							</div>
						</article>
					</div>
				</div>
					<script src="{{asset('js/jquery.wmuSlider.js')}}"></script> 
					<script>
						$('.example1').wmuSlider();         
					</script> 
			</div>
		</div>
	</div>

	<div class="new-collections">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">美味餐品</h3>
			<p class="est animated wow zoomIn" data-wow-delay=".5s">既养胃又经济实惠，香喷喷、酸溜溜、香甜可口、甜丝丝、香气扑鼻、滑嫩、爽口、甘香、苦涩、甘甜</p>
			<div class="new-collections-grids">
				
				@foreach ($goodsList as $g)
				@if($g -> gid < 15)
				<div class="col-md-3 new-collections-grid" style="margin-top:5px;">
					<div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
						<div class="new-collections-grid1-image">
							<a href="{{URL('home/single',array('gid'=>$g->gid))}}" class="product-image"><img src="{{asset($g->art_path)}}" alt=" " class="img-responsive" style="width: 90%;height:250px;"/></a>
							<div class="new-collections-grid1-image-pos">
								<a href="{{URL('home/single')}}?gid={{$g->gid}}">快速查看</a>
							</div>
						</div>
						<h4><a href="{{URL('home/single')}}?gid={{$g->gid}}">{{$g->gname}}</a></h4>
						<p>{{$g->Description}}</p>
						<div class="new-collections-grid1-left simpleCart_shelfItem">
							<p><i>${{$g->price}}</i> <span class=".price">${{$g->price * $g->discount}}</span><a href="{{URL('home/single')}}?gid={{$g->gid}}">购买</a></p>
						</div>
					</div>
					
				</div>
				@endif
				@endforeach
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

@endsection