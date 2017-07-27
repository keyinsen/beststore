@extends('layouts.home')
@section('title','我的订单')
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


        <div class="content" style="margin-left: 450px;color: #0c9c6e;font-size: 20px;">
            @foreach($order as $o)
            <p>{{$o->order_num}}</p>
            <table border="3" bordercolor="#ABECFF" cellpadding="10" cellspacing="10">
                <tr>
                    <td>状态</td>
                    <td>商品名称</td>
                    <td>单价(元)</td>
                    <td>数量</td>
                    <td>小计(元)</td>
                    <td>操作</td>
                </tr>
                @foreach ($orderList as $c)
                    @if($o->oid == $c->oid)
                    <tr>
                        <td>{{$o->status}}</td>
                        <td class="gid" title="{{$c->gid}}">{{$c->gname}}</td>
                        <td>{{$c->price*$c->discount}}</td>
                        <td><span class="storeNum" title="{{$c->num}}">{{$c->num}}</span></td>
                        <td class="priceSum">{{$c->price*$c->discount*$c->num}}</td>
                        <td><a href="myOrder/del?oid={{$c->oid}}">删除</a></td>
                    </tr>
                    @endif
                @endforeach

            </table>
            @endforeach
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
@endsection