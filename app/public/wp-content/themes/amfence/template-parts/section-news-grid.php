<section id="news">

<?php
$sub_text = get_query_var('sub_text');

$args = array(
    'post_type'      => 'post',
    'posts_per_page' => -1,
	'post_status'	 => 'publish'
 );


$products = new WP_Query( $args );

if ( $products->have_posts() ) : ?>
	<div class="container">
		
		<div class="row">
			<?php 
			while ( $products->have_posts() ) : $products->the_post(); ?>
				<?php
					$class = '';
					if(get_the_post_thumbnail_url() == ''){
						$class = 'hidebg';
					}
				?>
				<div id="products-<?php the_ID(); ?>" class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<a href="<?php the_permalink(); ?>">
					<div class="product-grid hideimg <?php echo $class; ?>" style="background-image:url(<?php echo get_the_post_thumbnail_url($products->ID, 'large'); ?>)"></div>
					<h3><?php the_title(); ?></h3>
					</a>
					
					<p><?php the_excerpt(); ?></p>
					
				</div>

			<?php 
				
			endwhile; ?>
		</div>
	</div>

<?php endif; wp_reset_postdata(); ?>

</section>