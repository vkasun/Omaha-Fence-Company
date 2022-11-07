jQuery(document).ready(function(){ 
					if ( typeof jQuery().superfish != "function" )
						return false;

					jQuery("#block-708").find("ul.menu").superfish({
						delay: 200,
						animation: {opacity:"show"},
						speed: 'fast',
						onBeforeShow: function() {
							var parent = jQuery(this).parent();
							
							var subMenuParentLink = jQuery(this).siblings('a');
							var subMenuParents = jQuery(this).parents('.sub-menu');

							if ( subMenuParents.length > 0 || jQuery(this).parents('.nav-vertical').length > 0 ) {
								jQuery(this).css('marginLeft',  parent.outerWidth());
								jQuery(this).css('marginTop',  -subMenuParentLink.outerHeight());
							}
						}
					});		
				});

jQuery(document).ready(function(){

					if ( typeof window.selectnav != "function" )
						return false;

					selectnav(jQuery("#block-708").find("ul.menu")[0], {
						label: "-- Navigation --",
						nested: true,
						indent: "-",
						activeclass: "current-menu-item"
					});

					jQuery("#block-708").find("ul.menu").addClass("selectnav-active");

				});


		jQuery(document).ready(function() {
			if(typeof jQuery != 'function' || typeof jQuery().cycle1 != 'function') return false;
		    jQuery('#slider-331').after('<div class="slider-nav-331 slider-bullets slider-nav-defaults slider-bglight">').cycle1({
				timeout: 8000,
				pause: 0, // tried with it on but had jumpy problems
				fastOnEvent: true,
				height: 340,
				speed: 3500,pager: '.slider-nav-331',pagerAnchorBuilder: function(idx, slide) { return '<a href="#">&bull;</a>';},

				fx: 'scrollLeft' // choose your transition type, ex: fade, scrollUp, shuffle, etc...

			});
		});
		jQuery.noConflict();(function ($){jQuery(document).ready(function(){ $(".hwr-gallery").removeClass("no-js");});jQuery(window).load(function(){var i = 1;$(".slider-loading").remove();$(".hwr-album").each( function(){thumb_count = $(".pager-wrap").data("thumb-count");thumb_count_set = 4;pager_count = thumb_count < thumb_count_set ? thumb_count : thumb_count_set;pager_width = $(".carousel-item.pager").width();$("#slider-716-" + i).flexslider({namespace: "hwr-",animation: "fade",easing: "easeInQuad",useCSS: false,direction: "horizontal",animationSpeed: 500,animationLoop: true,slideshow: true,slideshowSpeed: 5000,directionNav: false,controlNav: false,smoothHeight: false,manualControls: $("#pager-716-" + i + " li, #pager-716-" + i + " div"),});i++;});});})(jQuery);jQuery.noConflict();(function ($){jQuery(document).ready(function(){ $(".hwr-gallery").removeClass("no-js");});jQuery(window).load(function(){var i = 1;$(".slider-loading").remove();$(".hwr-album").each( function(){thumb_count = $(".pager-wrap").data("thumb-count");thumb_count_set = 4;pager_count = thumb_count < thumb_count_set ? thumb_count : thumb_count_set;pager_width = $(".carousel-item.pager").width();$("#slider-715-" + i).flexslider({namespace: "hwr-",animation: "fade",easing: "swing",useCSS: false,direction: "horizontal",animationSpeed: 300,animationLoop: true,slideshow: true,slideshowSpeed: 5000,directionNav: true,controlNav: false,smoothHeight: false,manualControls: $("#pager-715-" + i + " li, #pager-715-" + i + " div"),});i++;});});})(jQuery);

