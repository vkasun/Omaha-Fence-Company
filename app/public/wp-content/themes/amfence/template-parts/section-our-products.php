<section id="our-products">

<?php

$vars = array();
$vars = get_query_var('args');
$num_cols = 3;
$post_type = 'products';
$heading = 'Our Products';
$num_items = -1;
//var_dump($vars);
if($vars){
	if($vars['num_items']){
		$num_items = $vars['num_items'];
		if($num_items > 1){
			$num_cols = 12/$vars['num_items'];
		}
	}
	if($vars['num_cols']){
		//$num_cols = 12/$vars['num_cols'];
	}
	if($vars['post_type']){
		$post_type = $vars['post_type'];
	}
	if($vars['heading']){
		$heading = $vars['heading'];
	}
	
}


//var_dump($vars);
//echo $num_items;

	$args = array(
		'post_type'      => $post_type,
		'posts_per_page' => $num_items,
		'orderby'		 => 'menu_order',
		'order'			 => 'ASC',
		'post_parent'	 => 0,
		'post_status'		 => 'publish'
	 );

$sub_text = get_query_var('sub_text');

$products = new WP_Query( $args );

if ( $products->have_posts() ) : ?>
	<div class="container">
		<div class="row">
			<div class="col">
				<h2><?php echo $heading; ?></h2>
				<?php if($sub_text) echo "<p>" . $sub_text . "</p>"; ?>
			</div>
		</div>
		<div class="row">
			<?php 
			while ( $products->have_posts() ) : $products->the_post(); ?>

				<div id="products-<?php the_ID(); ?>" class="col-lg-<?php echo $num_cols; ?> col-md-<?php echo $num_cols; ?> col-sm-6 col-xs-12 featured-products-grid">
					<a href="<?php the_permalink(); ?>">
					<div style="background-image:url(<?php echo get_the_post_thumbnail_url($products->ID, 'large'); ?>)"></div>	
					<h3><?php the_title(); ?></h3>
					</a>
					<div class="product-text">
						<?php the_excerpt(); ?>
						<!--<a class="learn-more-btn" href="<?php the_permalink(); ?>">PRODUCT DETAILS</a>-->
					</div>
				</div>

			<?php 
				
			endwhile; ?>
		</div>
	</div>

<?php endif; wp_reset_postdata(); ?>

</section>