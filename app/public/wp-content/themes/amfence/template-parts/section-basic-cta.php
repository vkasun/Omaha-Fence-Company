<?php
$link = get_field('pm_cta_link');
if(get_field('cta_banner_image')){
	$bg = get_field('cta_banner_image');
}
else{
	$bg = "/wp-content/themes/amfence/images/pm-bg.jpeg";
}
?>

<section id="basic-cta" style="background-image:url(<?php echo $bg; ?>">
	<div class="bg-container">
		<div class="container">
			<div class="row">
				<div class="col">
					<h2><?php echo get_field('pm_cta_title'); ?></h2>
					<a href="<?php echo $link['url']; ?>" class="pm-btn"><?php echo $link['title']; ?></a>
				</div>
			</div>
		</div>
	</div>
</section>