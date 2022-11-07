<?php

$link = get_sub_field('cta_banner_link');
if(get_sub_field('cta_background')){
	$bg = get_sub_field('cta_background');
}
else{
	$bg = "/wp-content/themes/amfence/images/pm-bg.jpeg";
}
if(get_sub_field('cta_heading_type')){
	$htag = get_sub_field('cta_heading_type');
}
else{ 
	$htag = 'h2'; 
}
?>

<section id="basic-cta" style="background-image:url(<?php echo $bg; ?>">
	<div class="bg-container">
		<div class="container">
			<div class="row">
				<div class="col">
					<<?php echo $htag; ?>><?php echo get_sub_field('cta_banner_title'); ?></<?php echo $htag; ?>>
					<?php
						if(get_sub_field('cta_banner_text')){
							echo get_sub_field('cta_banner_text');
						}
						?>
					<a href="<?php echo  $link['url']; ?>" class="pm-btn"><?php echo $link['title']; ?></a>
				</div>
			</div>
		</div>
	</div>
</section>