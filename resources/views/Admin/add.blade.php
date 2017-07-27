<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>

		<script src="{{asset('js/jquery.js')}}"></script>
        <script type="text/javascript" src=""></script>		
		
	</head>
	<body>
		<div id="goodList_header">
			<h2 align="center">商品添加</h2>
		</div>
		
		
		<div id = "add">
		<form align="center" name="addpro_form" method="post" action="good/add">
		                  {{ csrf_field() }}
                         <label for="pro_name">商品名称:</label>
                         <input type="text" name="pro_name" /><br /><br />
                         
                        <label for="pro_cate">商品大类别:</label>
                        <select name="pro_cate"> 
                        @foreach ($cate as $c)
                        @if($c->parent_id == 0)
                      <option value="{{$c->cid}}">{{$c->cname}}</option> 
                         @endif
                         @endforeach
                        </select>
                        
                         <label for="pro_cate2">商品小类别:</label>
                        <select name="pro_cate2"> 
                        @foreach ($cate as $c)
                        @if($c->parent_id != 0)
                      <option value="{{$c->cid}}">{{$c->cname}}</option> 
                         @endif
                         @endforeach
                        </select><br /><br />
                         
                       <label for="pro_price">商品价格:</label>
                       <input type="text" name="pro_price" /><br /><br />
                         <label for="pro_discount">商品折扣:</label>
                         <input type="text" name="pro_discount" /><br /><br />
                        <label for="pro_num">商品数量:</label>
                        <input type="text" name="pro_num" /><br /><br />
                       
                        <label for="pro_img">商品图片:</label>
                        <input type="file" name="pro_img" /><br /><br />
                 
                       <label for="pro_intro">商品说明:</label>
                       <textarea style="width: 300px;height:200px" name="pro_intro"></textarea><br /><br /><br />
                 <input type="submit" value="添加" />
        </form>
		</div>
	</body>
</html>
