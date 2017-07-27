<!DOCTYPE html>
<html>
<head>
<title>@yield('title')</title>
<!-- for-mobile-apps -->
@yield('y')
<!-- //animation-effect -->
</head>

<!-- header -->
	
<body>
	<div class="side-nav-right" role="navigation" >
		<ul class="nav-side-nav-right"  >
			<li class="cart" style="display: block; position: relative; left: -40px;"><a href="cart" class="glyphicon glyphicon-shopping-cart"><div style="display: block;"><br />购<br />物<br />车<br /></div></a></li>

		</ul>
	</div>
<!-- //fix_right -->

<!-- header -->
<!-- header -->
	<div class="header">
		<div class="container">
			<div class="header-grid">
				<div class="header-grid-left animated wow slideInLeft" data-wow-delay=".5s">
					<ul>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">@example.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 892</li>
						@if (session("CURR_USER") != null)

						<li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="login">{{session('CURR_USER')[0][0]['email']}}</a></li>
							<li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="myOrder">我的订单</a></li>

							<li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="logout" id="logout">退出</a></li>
						@else
						<li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="login">登录</a></li>
						@endif
						<li><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="register">注册</a></li>
					</ul>
					<script>
						
// 							$('#logout').click(function(){
// 								$.ajax({
// 									type:"post",
// 									url:"logout",
// 									data:{
// 										_token:'{{csrf_token()}}'
// 									},
// 									success:function(resp){
// 										if(resp.status == 1){
// 											alert('s');
// 										}
// 									}	
// 								});
// 							});
					
					</script>
				</div>
				<div class="header-grid-right animated wow slideInRight" data-wow-delay=".5s">
					<ul class="social-icons">
						<li><a href="javascript:void(0)" class="facebook"></a></li>
						<li><a href="javascript:void(0)" class="twitter"></a></li>
						<li><a href="javascript:void(0)" class="g"></a></li>
						<li><a href="javascript:void(0)" class="instagram"></a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="logo-nav">
				<div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">
					<h1><a href="index.html">Best Store <span>Shop anywhere</span></a></h1>
				</div>
				<div class="logo-nav-left1">
					<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div> 
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav">
							<li class="active"><a href="index" class="act">首页</a></li>	
							<!-- Mega Menu -->

							<li class="dropdown">
								<a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">餐品<b class="caret"></b></a>

								<ul class="dropdown-menu multi-column columns-3">
									<div class="row">
										@foreach($parentcate as $parent )
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">
												<h6>{{$parent->cname}}</h6>
												@foreach ($categoryList as $c)
													@if ($c->parent_id == $parent->cid)
													<li><a href="search?cid={{$c->cid}}&path={{$c->path}}">{{$c->cname}}</a></li>
													@endif
												@endforeach
											</ul>
										</div>
										@endforeach
											<div class="clearfix"></div>
									</div>

								</ul>
							</li>

						</ul>
					</div>
					</nav>
				</div>
				<div class="logo-nav-right">
					<div class="search-box">
						<div id="sb-search" class="sb-search">
							<form>
								<input class="sb-search-input" placeholder="Enter your search term..." type="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search"> </span>
							</form>
						</div>
					</div>
						<!-- search-scripts -->
						<script src="{{asset('js/classie.js')}}"></script>
						<script src="{{asset('js/uisearch.js')}}"></script>
							<script>
								new UISearch( document.getElementById( 'sb-search' ) );
							</script>
						<!-- //search-scripts -->
				</div>
				
				<div class="clearfix"> </div>
				<div class="sb-search-open" id="search_result" style="display:none;width:623px;position: absolute;left:405px;background: #ffffff;z-index: 4;">
					
				</div>
			</div>
			<script>
				$('.cart').mouseover(function(){

					$(this).css('left','0px');
					$('.side-nav-right').css('right','0px');
				});
				$('.side-nav-right').mouseleave(function(){
					$('.cart').css('left','-40px');
					$('.side-nav-right').css('right','-40px');
				});
				$('#search').click(function(){
					var searchValues = $('#search').val();
					if(searchValues == ''){
						searchValues = 1;
					}
					$('#search_result').show();
					$.ajax({
						type:"post",
						url:"search_up",
						async:true,
						data:{
							searchValues:searchValues,
							_token:'{{csrf_token()}}'
						},
						success:function(resp){
							$('#search_result').find('a').remove();
							$('#search_result').find('div').remove();
							for(var i = 0; i < resp.length; i++){
								var div = $('<div>').text(resp[i]);
								$('#search_result').append(div);
							}
						}
					});
					$(this).keyup(function(){
						searchValues = $('#search').val();
						$.ajax({
							type:"post",
							url:"search_up",
							async:true,
							data:{
								searchValues:searchValues,
								_token:'{{csrf_token()}}'
							},
							success:function(resp){
								$('#search_result').find('div').remove();
								$('#search_result').find('a').remove();
								for(var i = 0; i < resp.length; i++){
									var respCid = resp[i].cid;
									var a = $('<a>').attr("href","search?cid="+respCid).css('display','block').text(resp[i].cname);
									$('#search_result').append(a);
								}
							}
						});
					});
				});
				$('.header').click(function(){
					$('#search_result').hide();
				});
				$('.sb-search-submit').click(function(){
					$('#search_result').hide();
				});
				
			</script>
			
		</div>
	</div>
<!-- //header -->
@yield('content')
<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="footer-grids">
				<div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".5s">
					<h3>关于我们</h3>
					<p>对你无微不至的服务是我们的宗旨，让你愉快是我们的追求<span>我们来自一座神秘的海滨小城，这里碧水蓝天，这里的海水像梦里一样蓝，这儿是购物的天堂</span></p>
				</div>
				<div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".6s">
					<h3>联系我们</h3>
					<ul>
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>软件园观日路51号之一<span>厦门市</span><>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567<>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="footer-logo animated wow slideInUp" data-wow-delay=".5s">
				<h2><a href="index.html">Best Store <span>shop anywhere</span></a></h2>
			</div>
		</div>
	</div>
<!-- //footer -->
<script>
	
</script>
</body>
</html>
