@extends('layouts.home')
@section('title','订单')
@section('y')
<meta charset="UTF-8">
<title>cart</title>
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

<link rel="stylesheet" type="text/css" href="{{asset('css/firmorder.css')}}"/>
<script src="{{asset('js/firmorder.js')}}"></script>
@endsection
@section('content')

<div class="wrap">			        
            <div class="selectaddr">
            	<p>选择收货地址</p>
            	<ul class="listaddr">
            	@foreach ($reicvAddress as $r)
            		<li>
            			<a class="addrId" href="javascript:void(0);" data-aid="{{$r['id']}}">
            				<h3>{{$r['name']}}</h3>
            				<p>{{$r['province']}}{{$r['city']}}</p>
            				<p>{{$r['street']}}</p>
            				<p>{{$r['detail']}}</p>
            				<p>{{$r['postcode']}}</p>
            				<p>{{$r['tel']}}</p>
            			</a>
            		</li>
            	@endforeach
            	</ul>
            </div>
			
			<div class="content">	
				<p>确认商品信息</p>
			<table>
				<tr>
					<td>编号</td>
					<td>商品图片</td>
					<td>商品名称</td>
					<td>口味</td>
					<td>份量</td>
					<td>单价(元)</td>
					<td>数量</td>
					<td>小计(元)</td>
				</tr>
				@foreach ($cartList as $c)
				<tr>
					<td class="id" title="{{$c['id']}}">{{$c['id']}}</td>
					<td><img src="{{asset($c['art_path'])}}"/></td>
					<td class="gid" title="{{$c['gid']}}">{{$c['gname']}}</td>
					@foreach ($attrArray as $atr)
						@if ($c->id == $atr['id'])
						<td>{{$atr['attr']}}</td>
						@endif
					@endforeach
					<td>{{$c['price']*$c['discount']}}</td>
					<td><span class="storeNum" title="{{$c['num']}}">{{$c['num']}}</span></td>
					<td class="priceSum">{{$c['price']*$c['discount']*$c['num']}}</td>
				</tr>
				@endforeach			
				<tr class="total">
					<td>　&nbsp;&nbsp;　&nbsp;&nbsp;</td>
					<td colspan="6" class="total_c">总计  :<span id="priceTotal" style="color: #F13E3A;" class="span10"></span> 
					<a style="display:block;height: 60px;width: 100px;background:#FFA701;text-align: center;color:#000000;" class="button1">确认并付款</a></td>
				</tr>
			</table>	
			</div>
			<script>
				$(function(){
					var priceSum = 0;
					var price = document.getElementsByClassName('priceSum');
					for(var k = 0; k < price.length; k++){
						priceSum = priceSum + parseInt(price.item(k).innerText);
					}
					$('#priceTotal').text(priceSum);
				});

			</script>
		</div>
            <script>
                $('.button1').click(function(e){
                    var onLength = $('.listaddr').find('.on').length;

                    if(onLength != 1){
                        alert('请选择地址');
                    }else{
                        var addrId = $('.on').attr('data-aid');
                        var gidList = $('.gid');
                        var storeNum = $('.storeNum');
						var id = $('.id').attr('title');
                        var gidString = gidList[0].getAttribute('title') + '.' + storeNum[0].getAttribute('title');
						var idString = id[0];
                        for(var i = 1; i < gidList.length; i++){
                            var gidString = gidString + '_' + gidList[i].getAttribute('title') + '.' + storeNum[i].getAttribute('title');
                       		var idString = idString + '_' + idString[i];
                        }
                        var href = '../store/{{$userId}}?gid=' + gidString + '&addrId=' + addrId + '&id=' +idString;

                        $(e.target).attr('href',href);
                    }
                });
            </script>
		@endsection