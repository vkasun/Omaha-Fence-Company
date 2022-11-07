jQuery(document).ready(function($){
    $('#vinyl-step-1').hide();
    $('.selectable').on('click', function(e){
		//show proper step content
		$('.choose-fence-step').hide();
		var showDiv = '.' + $(this).data("target");
		console.log('showDiv = ' + showDiv);
		$(showDiv).show();
		
		//show proper breadcrumb
		if($(showDiv).hasClass('step1')){
			console.log('step 1');
			$('.fencebreadcrumb.step1').html($(showDiv).data("src")); 
			console.log('set target = ' + $('.fencebreadcrumb.step1').data("target"));
			$('.fencebreadcrumb.step1').attr("data-target", showDiv); 
			$('.fencebreadcrumb.step1').addClass('visible'); 
			$('.fencebreadcrumb.step2').removeClass('visible');
			$('.fencebreadcrumb.step3').removeClass('visible');
		}
		if($(showDiv).hasClass('step2')){
			console.log('*****step 2 + ' + showDiv);
			$('.fencebreadcrumb.step2').html($(showDiv).data("src")); 
			$('.fencebreadcrumb.step2').attr("data-target", showDiv); 
			$('.fencebreadcrumb.step2').addClass('visible'); 
			$('.fencebreadcrumb.step3').removeClass('visible');
		}
		if($(showDiv).hasClass('step3')){
			console.log('step 3');
			$('.fencebreadcrumb.step3').html($(showDiv).data("src")); 
			$('.fencebreadcrumb.step3').addClass('visible'); 
		}
    })
	$('.fencebreadcrumb').on('click', function(){
		var mystep = $(this).attr('data-target');
		$('.choose-fence-step').hide();
		console.log('show div from breadcrumb = ' + mystep);
		$(mystep).show();
		if($(mystep).hasClass('step0')){
			$('.fencebreadcrumb.step1').removeClass('visible');
			$('.fencebreadcrumb.step2').removeClass('visible');
			$('.fencebreadcrumb.step3').removeClass('visible');
		}
		if($(mystep).hasClass('step1')){
			$('.fencebreadcrumb.step2').removeClass('visible');
			$('.fencebreadcrumb.step3').removeClass('visible');
		}
		if($(mystep).hasClass('step2')){
			$('.fencebreadcrumb.step3').removeClass('visible');
		}
	});



  
        $('#form-type').select2('data');
        $('#form-style').select2('data');
        $('#form-height').select2('data');
        $('#form-color').select2('data');

})