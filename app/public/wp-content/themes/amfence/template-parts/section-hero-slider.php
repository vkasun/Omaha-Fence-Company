<?php
if(get_field('show_slider_instead') == 'Hero'){
	if(get_field('hero_image')){
		$bg_img = get_field('hero_image');
		if(get_field('hero_title')){
			$page_title = get_field('hero_title');
		}
		else{
			$page_title = get_the_title();
		}
	?>
	<section id="hero">
		<div class="hero-container" style="background-image:url(<?php echo $bg_img; ?>); ">
			<div class="hero-text-container">
				<div>
					<h1><?php echo $page_title; ?></h1>
					<p><?php echo get_field('hero_description'); ?></p>
				</div>
			</div>
		</div>
	</section>
	<?php
	}
}
elseif(get_field('slider_number')){
	$slider = get_field('slider_number');
	?>
	<?php echo do_shortcode('[smartslider3 slider=' . $slider . ']'); ?>
	<?php
}
	?>