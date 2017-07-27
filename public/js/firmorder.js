$(function(){
	$('.cart').on('mouseenter',function(e){
		$('.acart').css({'text-decoration':'none','color':'#FF2832'});
	  	$('.cartlist').show();
  })	
	$('.cart').on('mouseleave',function(e){
		$('.acart').css({'text-decoration':'none','color':'#BABABA'});
		$('.cartlist').hide();
   })
	$('.acart').click(function(){
		$('.acart').css({'text-decoration':'none','color':'#BABABA'});
	})
	
   $('.button1').click(function(){
   	    
   })
    $('.wrap .selectaddr ul li a').click(function(){
    	for(var i=0;i<$('.wrap .selectaddr ul li a').length;i++){
    		$($('.wrap .selectaddr ul li a')[i]).removeClass('on');
    	}
    	  $(this).addClass('on');
    });	
});