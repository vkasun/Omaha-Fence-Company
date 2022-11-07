jQuery(document).ready(function($){
	//console.log('jquery menu ready');
    function toggleMenuFunctions(){
        //if($(window).width() > 960 && $(window).height() > 639){
		if($(window).width() > 960){
            $('#menu-main-nav > li').on('mouseenter', function(){
				//console.log('active menu');
				$('.menu-active').removeClass('menu-active');
				//$(this).addClass('menu-active');
			});
			$('#menu-main-nav > li').on('mouseleave', function(){
				//$(this).removeClass('menu-active');
			});
        }
        else{
            //console.log('mobile menu');
            function hideMenuOnResize(){
                //if($(window).width() > 960 && $(window).height() > 639){
				if($(window).width() > 960){
                    //hideMobileMenu();
                }
                else{
                    //showMobileMenu();
                    if($('.sub-manu').hasClass('visible')){
                        $('#main-nav li').unbind('mouseenter');
                        $('.sub-menu').removeClass('visible');
                    }
                }
            };
            $(window).on('resize', function(){
                //hideMenuOnResize();
            });
        }
		
		$('.sub-menu').on('mouseleave', function(){
			$(this).parent('li').removeClass('menu-active');
		});
		
				
			
		
    }
    $(window).on('resize', function(){
        toggleMenuFunctions();
    });
    toggleMenuFunctions();
	
	var headerH = $('header').outerHeight();
	var lastScrollTop = 0;
	$(window).scroll(function(){
		//console.log('Header H = ' + headerH);
		var st = $(this).scrollTop();
		//if(st > (headerH) && st < (headerH + 52) ){
			//$('body').addClass('hide-nav');
		//}
		//else if(st > (headerH + 52)){
			//$('body').removeClass('hide-nav');
			//$('body').addClass('fixed-nav');
			
			//if (st > lastScrollTop){
			   //console.log('downscroll');
			   //$('#main-nav').removeClass('show-mobile-nav');
			//} else {
			  //console.log('upscroll');
			  //$('#main-nav').addClass('show-mobile-nav');
			//}
			//lastScrollTop = st;
		//}
		//else{
			//$('body').removeClass('fixed-nav hide-nav');
		//}
		if(st > headerH && $(window).width() > 1110){
			$('body').addClass('fixed-nav');
		}
		else if(st > 0 && $(window).width() <= 1110){
			$('body').addClass('fixed-nav');
		}
		else{
			$('body').removeClass('fixed-nav');
		}
	});
	
	$('.mobile-nav').on('click', function(){
		$('body').toggleClass('show-mobile');
	});
	
	$('.clickable').on('click', function(){
		 document.location = $(this).attr("data-target");
	});
});