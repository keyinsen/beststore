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
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>主页</a></li>
				<li class="active">商品</li>
			</ol>
		</div>
	</div>
	<div id="search_result_wrap">
		<div id="search_filter_titles">
			<div id="search_filter_title">
			@foreach ($categoryList as $c)
			@if ($c->cid == $cid)
				<strong>在<span style="color: #ED149D;">{{$c->cname}}</span>中筛选</strong>
			@endif
			@endforeach
			</div>
			@foreach ($getValuesByAvid as $t)
			<a class="avidTop" title="{{($t->avid).'_'.($t->attr_id)}}"  href="javascript:void(0);" style="text-align:center;display:block;float:left;height: 30px;width: 100px;border: 1px solid #E8E8E8;margin: 10px 10px 0px 10px;line-height: 25px;">{{$t->value}}</a>
			@endforeach
		</div>
		<script>
// 			$('.avidTop').click(function(e){
// 				function GetQueryString(name)
// 				{
// 				     var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
// 				     var r = window.location.search.substr(1).match(reg);
// 				     if(r!=null)return  unescape(r[2]); return null;
// 				}
// 				function checkAdult(a) {
// 				    return a != title;
// 				}
// 				var thisURL = document.URL;
// 				var attrString = GetQueryString("attr");
// 				var title = $(e.target).attr('title');
// 				var attrArray = attrString.split('.');
// 				var attrArrayBy = attrArray.filter(checkAdult);
// 				var m = thisURL.lastIndexOf('&');
// 				var	d = thisURL.slice(0,m);
// 				attrStringBy = attrArrayBy.join('.');
// 				if(attrArrayBy.length == 0){
// 					$(e.target).attr('href',d);
// 				}else{
// 					var a = d + '&attr=' + attrStringBy;
// 					$(e.target).attr('href',a);
// 				}
// 			});
		</script>
		<div id="search_filter">
		@foreach ($ar as $attr)
			@if ($attr->isKey == 1)
			<div class="filter_con">
				<div class="filter_title">{{$attr->title}}</div>
				<div class="filter_attrs">
					<ul>
						@foreach ($attrValue as $at)
						@if ($at->attr_id == $attr->attr_id)
						 @if (Input::get('attr') == '')
							<li><a href="{{Request::getRequestUri()}}&attr={{$at->avid}}_{{$at->attr_id}}">{{$at->value}}</a></li>
						 @else
						 	<li><a href="{{Request::getRequestUri()}}.{{$at->avid}}_{{$at->attr_id}}">{{$at->value}}</a></li>
						 @endif
						@endif
						@endforeach
					</ul>
				</div>
			</div>
			@endif
		@endforeach
<!-- 			<div class="filter_con"> -->
<!-- 				<div class="filter_title">分类</div> -->
<!-- 				<div class="filter_attrs"> -->
<!-- 					<ul> -->
<!-- 						@foreach ($categoryList as $c) -->
<!-- 						@if ($c->parent_id == 0) -->
<!-- 						<li><a href="search?cid={{$c->cid}}&path={{$c->path}}">{{$c->cname}}</a></li> -->
<!-- 						@endif -->
<!-- 						@endforeach -->
<!-- 					</ul> -->
<!-- 				</div> -->
<!-- 			</div> -->
			
		</div>
	</div>
	<div class="products">
		<div class="container">
			<div class="col-md-4 products-left">
				<div class="new-products animated wow slideInUp" data-wow-delay=".5s">
					<h3>新商品</h3>
					<div class="new-products-grids">
						@foreach($newgoods as $goodss)
						@if($goodss->gid < 5)
						<div class="new-products-grid">
							<div class="new-products-grid-left">
								<a href="single?gid={{$goodss['gid']}}"><img src="{{asset($goodss->art_path)}}" alt=" " class="img-responsive" style="width: 100%;height:150px;"/></a>
							</div>
							<div class="new-products-grid-right">
								<h4><a href="single?gid={{$goodss['gid']}}">{{$goodss->gname}}</a></h4>
								<div class="rating">
									<div class="rating-left">
										<img src="{{asset('images/2.png')}}" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="{{asset('images/2.png')}}" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="{{asset('images/2.png')}}" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="{{asset('images/1.png')}}" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="{{asset('images/1.png')}}" alt=" " class="img-responsive">
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="simpleCart_shelfItem new-products-grid-right-add-cart">
									<p> <span class="item_price">{{$goodss->price}}</span><a href="single?gid={{$goodss['gid']}}">查看详情</a></p>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
						@endif
						@endforeach
					</div>
				</div>
<!-- 分类页商品 -->
			</div>
			<div class="col-md-8 products-right">
				
				<div class="products-right-grids-bottom">
					@foreach ($goodList as $g)
					<div class="col-md-4 products-right-grids-bottom-grid">
						<div style="width: 300px;height:450px;background-color:#F0F0F0;" class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">
							<div class="new-collections-grid1-image">
								<a href="single?gid={{$g['gid']}}" class="product-image"><img class="art_path" style="width: 280px;height:250px;align:center" src="{{asset($g['art_path'])}}" alt=" " class="img-responsive"></a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="single?gid={{$g['gid']}}">查看详情</a>
								</div>
								<div class="new-collections-grid1-right products-right-grids-pos-right">
									<div class="rating">
										<div class="rating-left">
											<img style="width: 15px;height: 15px;" src="{{asset('images/2.png')}}" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img style="width: 15px;height: 15px;" src="{{asset('images/2.png')}}" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img style="width: 15px;height: 15px;" src="{{asset('images/2.png')}}" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img style="width: 15px;height: 15px;" src="{{asset('images/1.png')}}" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img style="width: 15px;height: 15px;" src="{{asset('images/1.png')}}" alt=" " class="img-responsive">
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
							</div>
							<h4><a class="gname" href="single?gid={{$g['gid']}}">{{$g['gname']}}</a></h4>
							<p class="discount" title="{{$g['discount']}}">打{{$g['discount']}}折</p>
							<div style="width: 250px;height: 50px;margin:5px 5px;" class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i class="price" title="{{$g['price']}}">${{$g['price']}}</i> <span class="item_price">${{$g['price'] * $g['discount']}}</span><a title="{{$g['gid']}}" class="item_add" href="javascript:void(0);">加入购物车 </a></p>
							</div>
						</div>
					</div>
				@endforeach
				</div>
			</div>
			{!! $goodList->appends(['cid' => $cid,'avid' => $avid])->render() !!}
			<div class="clearfix"> </div>
		</div>
	</div>
	
	<script>
		$('.item_add').click(function(e){
			var parent = $(e.target).parent().parent().parent();
			var sku = '1:4';
			var gid = $(e.target).attr('title');
			var gname = parent.find('.gname').text();
			var price = parent.find('.price').attr('title');
			var art_path = parent.find('.art_path').attr('src');
			var discount = parent.find('.discount').attr('title');
			$.ajax({
				type:"post",
				url:"cart/add",
				async:true,
				data:{
					sku:sku,
					gid:gid,
					gname:gname,
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
<!-- //breadcrumbs -->
@endsection
