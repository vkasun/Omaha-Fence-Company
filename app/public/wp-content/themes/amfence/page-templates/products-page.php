<?php
/**
 * Template Name: Products
 * Template Post Type: post, page, products, cad_drawing, architectural_gates, hardware, gates
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage amfence
 * @since 1.0.0
 */

$header_version = '';
if(get_field('header_version')){
	$header_version = get_field('header_version', get_the_ID());
}
get_header($header_version);
$counter = 0;
?>

<main id="site-content" role="main">
<?php
get_template_part('template-parts/section', 'hero-slider');
?>

	<?php

			// are there any rows within within our flexible content?
			if( have_rows('products_flexible_content_section') ): 
				// loop through all the rows of flexible content
				while ( have_rows('products_flexible_content_section') ) : the_row();
					$counter++;
					// Icon list
					if( get_row_layout() == 'product_icon_list' )
						//set_query_var('args', array('counter' => $counter));
						get_template_part('partials/product', 'icon-list');
					
					// Basic Content
					if( get_row_layout() == 'product_basic_content_editor' ){
						set_query_var('args', array('counter' => $counter));
						get_template_part('partials/product', 'basic-content-editor');
					}
					
					// Panel Types
					if( get_row_layout() == 'panel_options' ){
						set_query_var('args', array('counter' => $counter));
						get_template_part('partials/product', 'panel-types');
					}
					
					// CTA Banner
					if( get_row_layout() == 'cta_banner' ){
						set_query_var('args', array('counter' => $counter));
						get_template_part('partials/product', 'cta-banner');
					}
					
					// CAD Teaser
					if(get_row_layout() == 'related_cad_drawings'){
						$show_related = get_sub_field('show_related_cad_products_copy');
						//var_dump($show_related);
						$title = 'CAD Drawings';
						if(get_sub_field('related_cad_heading')){
							$title = get_sub_field('related_cad_heading');
						}
						
						if($show_related){
							set_query_var('args', array('title' => $title, 'num_items' => '-1', 'product_array' => $show_related, 'post_parent' => $show_related, 'counter' => $counter));
							get_template_part('template-parts/section', 'cad-grid');
						}
					}
					
					// Products Grid
					if(get_row_layout() == 'related_products_grid'){
						// our products grid
						$post_type = 'products';
						$heading = 'Our Products';
						$num_items = -1;
						$num_cols = 4;
						if(get_sub_field('rpg_type_of_product_to_show')){
							$post_type = get_sub_field('rpg_type_of_product_to_show');
						}
						if(get_sub_field('rpg_num_items')){
							$num_items = get_sub_field('rpg_num_items');
						}
						if(get_sub_field('rpg_heading')){
							$heading = get_sub_field('rpg_heading');
						}
						if(get_sub_field('rpg_num_cols')){
							$num_cols = get_sub_field('rpg_num_cols');
						}
						//echo $post_type;
						set_query_var('args', array('heading' => $heading, 'post_type' => $post_type, 'num_items' => $num_items, 'num_cols' => $num_cols));
						get_template_part('template-parts/section', 'our-products');
					}

					// Child Grid
					if(get_row_layout() == 'child_pages_grid'){
						// our products grid
						$post_type = 'products';
						$heading = 'Our Products';
						$num_cols = 3;
						$post_parent = get_sub_field('show_child_pages');
						/*if(get_sub_field('rpg_type_of_product_to_show')){
							$post_type = get_sub_field('rpg_type_of_product_to_show');
						}*/
						if(get_sub_field('items_per_row')){
							$num_cols = get_sub_field('items_per_row');
						}
							
						if(get_sub_field('product_child_section_title')){
							$heading = get_sub_field('product_child_section_title');
						}
						//echo $post_type;
						set_query_var('args', array('heading' => $heading, 'post_type' => $post_type, 'num_items' => -1, 'post_parent' => $post_parent, 'num_cols' => $num_cols));
						get_template_part('template-parts/section', 'products-child-grid');
					}
					
					// Related Posts
					if( get_row_layout() == 'related_posts' ){
						get_template_part('template-parts/section', 'related-posts');
					}

				endwhile; // close the loop of flexible content
			endif; // close flexible content conditional
	

	?>

<section id="main">
	<div class="container">
		<div class="row">
			<div class="col">
				<?php

				if ( have_posts() ) {

					while ( have_posts() ) {
						the_post();

						the_content();
					}
				}

				?>
			</div>
		</div>
	</div>
</section>
</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>