@extends('layouts.home')
@section('title','搜索')
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
<div class="outdisplay" id="outdisplay" style="display: none;background:#444851;position:fixed;right: 40px;top:150px;z-index:44;height: 250px;width: 400px;">
	<div id="cartInfo" style="font-size: 35px;color: #AEAEAE;text-align: center;margin-top: 50px;">加入购物车成功</div>
	<input id="cartButton" type="button" value="关闭" style="height: 30px;width: 100px;background: #9B1CEB;margin: 30px 0px 0px 150px;" />
</div>
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>首页</a></li>
				<li class="active">订单页</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- single -->
	<div class="single">
		<div class="container">
			<div class="col-md-4 products-left">
				<div class="filter-price animated wow slideInUp" data-wow-delay=".5s">
					<h3>折后价</h3>
					<ul class="dropdown-menu1">
							<li><a href="javascript:void(0)">
							<div id="slider-range"></div>							
							<input type="text" id="amount" style="border: 0" />
							</a></li>	
					</ul>
						<script type='text/javascript'>//<![CDATA[ 
						$(window).load(function(){
						 $( "#slider-range" ).slider({
								range: true,
								min: 0,
								max: 100000,
								values: [ 10000, 60000 ],
								slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
								}
					 });
					$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );


						});//]]>
						</script>
						<script type="text/javascript" src="{{asset('js/jquery-ui.min.js')}}"></script>
					 <!---->
				</div>
				<div class="categories animated wow slideInUp" data-wow-delay=".5s">
					<h3>类别</h3>
					<ul class="cate">
						@foreach($parentcate as $parent)
						<li><a href="search?cid={{$parent->cid}}&path={{$parent->path}}">{{$parent->cname}}</a></li>
							<ul>
							@foreach($categoryList as $c)
								@if($c->parent_id==$parent->cid)
									<li><a href="search?cid={{$c->cid}}&path={{$c->path}}">{{$c->cname}}</a></li>
									@endif
							@endforeach
							</ul>
						@endforeach
					</ul>
				</div>
			</div>
			<div class="col-md-8 single-right">
				<div class="col-md-5 single-right-left animated wow slideInUp" data-wow-delay=".5s">
					<div class="flexslider">
						<ul class="slides">
							<li data-thumb="{{$goodList['art_path']}}">
								<div class="thumb-image"> <img id="art_path" title="{{$goodList['art_path']}}" src="{{asset($goodList['art_path'])}}" data-imagezoom="true" class="img-responsive"> </div>
							</li>
						</ul>
					</div>
					<!-- flixslider -->
						<script defer src="{{asset('js/jquery.flexslider.js')}}"></script>
						<link rel="stylesheet" href="{{asset('css/flexslider.css')}}" type="text/css" media="screen" />
						<script>
						// Can also be used with $(document).ready()
						$(window).load(function() {
						  $('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
						</script>
					<!-- flixslider -->
				</div>
				<div class="col-md-7 single-right-left simpleCart_shelfItem animated wow slideInRight" data-wow-delay=".5s">
					<h3 id = "gnameGid" title = "{{$goodList['gid']}}">{{$goodList['gname']}}</h3>
					<h4>$<span class="item_price" title="{{$goodList['discount']}}">{{$goodList['price']}} - ${{$goodList['price'] * $goodList['discount']}}</span></h4>
					<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked>
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>
					<div class="description">
						<h5><i>运输方式</i></h5>
						<p>快递</p>
					</div>
					<div class="description">
						<h5><i>库存</i></h5>
						<p id="kucun">{{$goodList['store_num']}}</p>
					</div>
					<div class="color-quality">
						@foreach ($attribute as $ab)
						@if ($ab['isSale'] == 1)
						<div class="color-quality-left">
							<h5>{{$ab['title']}}:</h5>
							<ul title="{{$ab['title']}}">
							@foreach ($attributeValues as $abv)
							@if ($ab['attr_id'] == $abv['attr_id'])
								<li value="{{$abv['avid']}}"><a href="javascript:void(0);">{{$abv['value']}}</a></li>
							@endif
							@endforeach
							</ul>
						</div>
						@endif
						@endforeach
						<div class="color-quality-right">
							<h5>数量 :</h5>
							<input type="number" aria-valuemax="{{$goodList['store_num']}}" id="num" />
						</div>
						<div class="clearfix"> </div>
					</div>

					<div class="occasion-cart">
						<a class="item_add" href="javascript:void(0);">加入购物车 </a>
					</div>
					<script>
						var skuArray = [];
						for(var i=0;i<$('.color-quality-left').find('ul').length;i++){
							skuArray[$('.color-quality-left').find('ul').eq(i).attr('title')]='';
						}
							$('.color-quality-left').find('li').click(function(){
								$(this).parent().find('li').css('border-color','#cccccc');
								var ul=$(this).parent().attr('title');
								$(this).css('border-color','red');
								skuArray[ul]=$(this).val();
							})
						$('.item_add').click(function(){
							var skuarr=[];
							var art_path = $('#art_path').attr('title');
							var gid = $('#gnameGid').attr('title');
							var gname = $('#gnameGid').text();
							var discount = $('.item_price').attr('title');
							var price = $('.item_price').text();
							var num = parseInt($('#num').val());
							for(var i=0;i<$('.color-quality-left').find('ul').length;i++){
								skuarr[i]=skuArray[$('.color-quality-left').find('ul').attr('title')];
							}
							var sku=skuarr.join(':');
							if(num>=5&&num>=parseInt($('#kucun').html())){
								$('#cartInfo').text("最多买5份且不能多于库存");
								$('#outdisplay').show();
								return -1;
							}
							if(isNaN(num)||num==0||num<0){
								$('#cartInfo').text("数量输入有错");
								$('#outdisplay').show();
								return -1;
							}
							$.ajax({
								type:"post",
								url:"cart/add",
								async:true,
								data:{
									sku:sku,
									gid:gid,
									gname:gname,
									num:num,
									price:price,
									art_path:art_path,
									discount:discount,
									_token:'{{csrf_token()}}'
								},
								success:function(resp){
									$('#cartInfo').text(resp.msg);
									$('#outdisplay').show();
									
								}
							});
						});
						$('#cartButton').click(function(){
							$('#outdisplay').hide();
						});
					</script>
					<div class="social">
						<div class="social-left">
							<p>分享 :</p>
						</div>
						<div class="social-right">
							<ul class="social-icons">
								<li><a href="javascript:void(0)" class="facebook"></a></li>
								<li><a href="javascript:void(0)" class="twitter"></a></li>
								<li><a href="javascript:void(0)" class="g"></a></li>
								<li><a href="javascript:void(0)" class="instagram"></a></li>
							</ul>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
				<div class="bootstrap-tab animated wow slideInUp" data-wow-delay=".5s">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">描述</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
								<h5>产品简介</h5>
								<p>{{$goodList['Description']?$goodList['Description']:'暂无商品描述信息'}}</p>
							</div>

								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //single -->
@endsection