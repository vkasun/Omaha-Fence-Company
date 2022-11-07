<section id="cad-grid">

<?php

$vars = get_query_var('args');
$vars = get_query_var('args');
$related_products = array();
$num_cols = 3;
$title = "Blog";

$args = array(
		'post_type'      => 'post',
		'posts_per_page' => 3,
		'orderby'		 => 'publish',
		'order'			 => 'DESC'
	 );
	 $num_cols = 4;


$cad = new WP_Query( $args );
$count = 0;
if ( $cad->have_posts() ) : ?>
	<div class="container">
		<div class="row">
			<div class="col"><h2><?php echo $title; ?></h2></div>
		</div>
		<div class="row">
			<?php 
			while ( $cad->have_posts() ) : $cad->the_post(); 
				if($count<3){
			?>
				<div id="cad-<?php the_ID(); ?>" class="col-lg-<?php echo $num_cols; ?> col-md-<?php echo $num_cols; ?> col-sm-6 col-xs-12 cad-grid featured-posts">
					<a href="<?php the_permalink(); ?>">
					<div class="item" style="background-image:url(<?php echo get_the_post_thumbnail_url($cad->ID, 'medium');; ?>)">
						
					</div>
					<h3><?php the_title(); ?></h3>
					</a>
					
					<p><?php the_excerpt(); ?></p>
					<a class="learn-more-btn" href="<?php the_permalink(); ?>">Read More</a>
				</div>

			<?php 
				}
				$count++;
			endwhile; ?>
		</div>
		<div class="row">
				<div class="col">
					<a class="view-all" href="/blog/">View All Blog Posts</a>
				</div>
			</div>
	
	</div>

<?php endif; wp_reset_postdata(); ?>

</section>