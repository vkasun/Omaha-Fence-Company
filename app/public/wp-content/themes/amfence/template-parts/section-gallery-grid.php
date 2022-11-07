<section id="gallery-grid">

<?php

$vars = get_query_var('args');
$vars = get_query_var('args');
$related_products = array();
$num_cols = 3;
//var_dump($vars);
if($vars['product_array']){
	$related_products = $vars['product_array'];
}
//var_dump($related_products);
if(sizeof($related_products) > 0){
	$args = array(
		'post_type'      => 'palmshield_gallery',
		'orderby'		 => 'menu_order',
		'order'			 => 'ASC',
		'post__in'	 => $related_products
	);
	$num_cols = (12/sizeof($related_products));
}
else{
	$args = array(
		'post_type'      => 'palmshield_gallery',
		'posts_per_page' => $vars['num_items'],
		'orderby'		 => 'menu_order',
		'order'			 => 'ASC',
		'post_parent'	 => 0
	 );
}

$cad = new WP_Query( $args );

if ( $cad->have_posts() ) : ?>
	<div class="container">
		<div class="row">
			<div class="col"><h2><?php echo $vars['title']; ?></h2></div>
		</div>
		<div class="row">
			<?php 
			while ( $cad->have_posts() ) : $cad->the_post(); ?>
				<div id="cad-<?php the_ID(); ?>" class="col-lg-<?php echo $num_cols; ?> col-md-<?php echo $num_cols; ?> col-sm-6 col-xs-12 cad-grid">
					<a href="<?php the_permalink(); ?>">
					<div class="item" style="background-image:url(<?php echo get_the_post_thumbnail_url($cad->ID, 'medium'); ?>)">
						
					</div>
					<h3><?php the_title(); ?></h3>
					</a>
					
					<p><?php the_excerpt(); ?></p>
					<a class="learn-more-btn" href="<?php the_permalink(); ?>">View Gallery</a>
				</div>

			<?php 
				
			endwhile; ?>
		</div>
		<?php if($vars['num_items'] > 0): ?>
			<div class="row">
				<div class="col">
					<a class="view-all" href="/resources/cad-drawings-specs/">View More CAD Drawings and Specifications</a>
				</div>
			</div>
		<?php endif; ?>
	</div>

<?php endif; wp_reset_postdata(); ?>

</section>