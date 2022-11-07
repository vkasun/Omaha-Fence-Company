<?php
$vars = get_query_var('args');
$counter = $vars['counter'];
$class = '';
if(get_sub_field('background_color')){
	$class = get_sub_field('background_color');
}
if(get_sub_field('section_width_basic')){
	$width_class = get_sub_field('section_width_basic');
}
$field_obj = get_sub_field_object('products_basic_content');
//var_dump($field_obj);
?>
<section class="product-basic-content-editor <?php echo $class . " " . $width_class; ?>" id="section<?php echo $counter; ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<?php echo get_sub_field('products_basic_content'); ?>
			</div>
		</div>
	</div>
</section>