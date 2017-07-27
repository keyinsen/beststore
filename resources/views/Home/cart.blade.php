@extends('layouts.home')
@section('title','购物车')
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
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>首页</a></li>
				<li class="active">结帐页</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- checkout -->
	<div class="checkout">
		<div class="container">
			<h3 class="animated wow slideInLeft" data-wow-delay=".5s">您的购物车中包含： <span>{{$i}}种产品</span></h3>
			<div class="checkout-right animated wow slideInUp" data-wow-delay=".5s">
				<table class="timetable_sub">
					<thead>
						<tr>
							
							<th>序号</th>	
							<th>餐品图</th>
							<th>属性值1</th>
							<th>属性值2</th>
							<th>数量</th>
							<th>餐品名称</th>
							<th>价格</th>
							<th>删除</th>
						</tr>
					</thead>
					@foreach ($cartList as $c)
					<tr class="rem1">
						<td class="invert id">
							<input class="inputCheck" value="{{$c->id}}" type="checkbox" name="check">
						</td>
						<td class="invert-image"><a href="single"><img src="{{asset($c->art_path)}}" alt=" " class="img-responsive"  /></a></td>
						@foreach ($attrArray as $atr)
						@if ($c->id == $atr['id'])
						<td>{{$atr['attr']}}</td>
						@endif
						@endforeach
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">   
									<input class="id" type="hidden" value="{{$c->id}}" />          
									<button class="decr">-</button>
									<span class="num">{{$c->num}}</span>
									<button class="incr">+</button>
								</div>
							</div>
						</td>
						<td class="invert">{{$c->gname}}</td>
						<td class="invert cartPrice" title="{{$c->price * $c->discount}}">${{$c->price * $c->discount}}</td>
						<td class="invert">
							<div class="rem">
									<input type="hidden" class="cartid" value="{{$c->id}}" name="cartid">
									<button class="del">删除</button>
							</div>
							
						</td>
					</tr>
					@endforeach
				</table>
			</div>
			<div class="checkout-left">	
				<div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
					<h4>购物车总金额</h4>
					<ul>
					@foreach ($cartList as $c)
						<li>{{$c->gname}} <i>-</i> <span class="priceCart" data-id = "{{$c->id}}" title="{{$c->price * $c->discount * $c->num}}">${{$c->price * $c->discount * $c->num}}</span></li>
					@endforeach	
						<li>总额 <i>-</i> <span id="priceSum"></span></li>
						
					</ul>
					<script>
							$(function(){
								var incr = document.getElementsByClassName('incr');
								var decr = document.getElementsByClassName('decr');
								for(var i = 0; i < decr.length; i++){
									decr.item(i).onclick = function(e){
										updateNum(e);
									};
									incr.item(i).onclick = function(e){
										updateNum(e);
										console.log('a');
									};
								}
								$('.del').click(function(){

									var cartid=$(this).parent().find(".cartid").val();
									$.ajax({
										type: "POST",
										url: "cart/del",
										async: true,
										data: {
											cartid: cartid,
											_token: '{{csrf_token()}}'
										},
										success: function (resp) {
											if(resp.status==1){
												window.location.reload();
											}else{
												alert("删除失败");
											}
										}
									});
										});
								function updateNum(e){
									var parent = $(e.target).parent().parent().parent().parent();
									
									var op = 0;
									if($(e.target).prop('class') == 'incr'){
										op = 1;
									}
									var numSpan = $(e.target).parent().find('.num'); 
									var num = parseInt(numSpan.text());
									if (op == 0 && num == 1) {
										op = -1;
									}
									var id = $(e.target).parent().find('.id').val();
									$.ajax({
										type:"POST",
										url:"cart/update/" + id,
										async:true,
										data: {
											op: op,
											_token:'{{csrf_token()}}'
										},
										success: function(resp) {
											if (resp.status == 1) {
												
												if (op == 0) {
													num--;
												} else if (op == 1) {
													num++;
												} else {
													// 删除
													$(e.target).parents('tr').remove();
												}
												numSpan.text(num);
											}
											var id = parent.find('.id').text();
											var p = parent.find('.cartPrice').attr('title');
											var n = parent.find('.num').text();
											var pn = parseInt(p) * parseInt(n);
											var dataId = $('.priceCart');
											for(var i = 0; i < dataId.length; i++){
												if(dataId[i].getAttribute('data-id') == id){
													dataId[i].setAttribute('title',pn);
													dataId[i].innerText = '$' + pn;
												}
											}
											var priceCart = document.getElementsByClassName('priceCart');
											var priceCartList = parseInt(0);
											for(var i = 0; i < priceCart.length; i++){
												var priceCartList = priceCartList + parseInt(priceCart.item(i).getAttribute('title'));
											}
											$('#priceSum').text('$' + priceCartList);
										}
									});
								}
							});
						   </script>
					<script>
						$(document).ready(function(c) {
							var priceCart = document.getElementsByClassName('priceCart');
							var priceCartList = parseInt(0);
							for(var i = 0; i < priceCart.length; i++){
								var priceCartList = priceCartList + parseInt(priceCart.item(i).getAttribute('title'));
							}
							$('#priceSum').text('$' + priceCartList);
						});
						
					</script>
				</div>
				
				<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
					<a href="search"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>继续购物</a>
				</div>
				<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
					<a id="orderGo"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>去结算</a>
				</div>
				<script>

						$('.inputCheck').click(function(){
							if($('.inputCheck').attr('checked')){
								$('#orderGo').attr('href','javascript:void(0);');
							}else{
								$('#orderGo').removeAttr('href');
							}
						});
						$('#orderGo').click(function(){
							var idArray = [];
							var is=false;
							var inputCheck = document.getElementsByClassName('inputCheck');
							$("input[type='checkbox']").each(function(){
								if($(this).is(':checked')){
									is=true;
								}
							})
							if(!is){
								alert("请选中要购买的餐品");
								return -1;
							}

							for(var i = 0; i < inputCheck.length; i++){
								if(inputCheck.item(i).checked){
									idArray.push(inputCheck.item(i).getAttribute("value"));
								}
							}
							$idString = idArray.join('_');
							var href = 'order/{{$userId}}?id=' + $idString;
							$('#orderGo').attr('href',href);
						});
				</script>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //checkout -->
@endsection