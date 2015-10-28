var win_height=$(window).height();
var main=function(){
    //$('.push-back').hide();
    $('.sign-up-tab').hide();
	$('.xcontainer').height(win_height);
	$('.sign-but').click(function() {
    $('.logins').animate({
      left: "-200px"
    }, 200);

    $('.para').animate({
    	opacity:0.00
    	},150);
    

	 $('.push-back').animate({ left: "-200px"},200);
    $('.push-back').animate({opacity:1,left:"22%"},200);
    $('.sign-up-tab').show(200);
    $('.push-back').show();
    });
   
   $('.push-back').click(function(){
   
    $('.logins').animate({
        left:"0px"
    },200);

    $('.para').animate({
    
        opacity:1
    },200);
    $('.push-back').animate({opacity:'0'},200);
    $('.push-back').toggle();
    $('.sign-up-tab').toggle(200);
   });
};


$(document).ready(main);
