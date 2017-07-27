<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<script src="{{asset('js/jquery.min.js')}}"></script>
		<script src="{{asset('js/jquery.Jcrop.min.js')}}"></script>
		<link rel="stylesheet" href="{{asset('css/jquery.Jcrop.min.css')}}" type="text/css" /> 
	</head>
	<body>
		<p id="p1"></p>
		<form method="get" action="images">
			<input type="file" name="image" />
			<input type="submit" />
		</form>
		<form method="get" action="cropImages">
			<input type="hidden" id="x1" name="x1" value="0" />
	        <input type="hidden" id="y1" name="y1" value="0" />
	        <input type="hidden" id="cw" name="cw" value="0" />
	        <input type="hidden" id="ch" name="ch" value="0" />
	        @if (isset($path))
	         <input type="hidden" id="img" name="img" value="{{$path}}" />
			@endif
			<input type="submit" />
		</form>
		@if (isset($path))
		<div style="width:200px;height:200px;overflow:hidden; border:1px solid gray;">  
		   <img id="preview" width="200px" height="200px" />  
		</div>
  		<img src="{{$path}}" id="target" alt="" />  
		@endif
		<script type="text/javascript">
	        var x;
			var y;
			var width;
			var height;
			$(function(){
				alert(123);
				var jcrop_api, boundx, boundy;
				//使原图具有裁剪功能

				$('#target').Jcrop({
					bgColor: 'black',
                    bgOpacity: .5,
                    setSelect: [100, 100, 150,150],  //设定4个角的初始位置
                    aspectRatio: 1 / 1,
               		minSize:[200,200],
               		maxSize:[200,200],
               		onChange: showCoords,   //当裁剪框变动时执行的函数
                    onSelect: showCoords,   //当选择完成时执行的函数
				},function(){
					// Use the API to get the real image size
					var bounds = this.getBounds();
					boundx = bounds[0];
					boundy = bounds[1];
					// Store the API in the jcrop_api variable
					jcrop_api = this;
					jcrop_api.animateTo([100,100,400,300]);
				});
				function releaseCheck()
			    {
			      jcrop_api.setOptions({ allowSelect: true });
			      $('#can_click').attr('checked',false);
			    };
			    
			    function showCoords(c) {
		            $("#p1").text(c.x + "   " + c.y + "   " + c.w + "   " + c.h );
		            $("#x1").val(c.x);
		            $("#y1").val(c.y);
		            $("#cw").val(c.w);
		            $("#ch").val(c.h);
		        }

			});
		</script>
	</body>
</html>
