<?php
/**
 * Template Name: News
 * Template Post Type: page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage amfence
 * @since 1.0.0
 */

get_header();
?>

<main id="site-content" role="main">
	
	<?php
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
	else{
		?>
		
		<section>
			<div class="container">
				<div class="row">
					<div class="col">
						<h1>Current news articles for <?php echo get_bloginfo(); ?></h1>
					</div>
				</div>
			</div>
		</section>
		
		<?php
	}

	if ( have_posts() ) : 
		while ( have_posts() ) : the_post(); 
			$sub_text = get_the_content();
			set_query_var('sub_text', $sub_text);
		endwhile; //ends main loop
	endif; //ends has posts

	// our products grid
	get_template_part('template-parts/section', 'news-grid');

	// CTA - Project manager
	if(get_field('pm_cta_title')){
		get_template_part('template-parts/section', 'basic-cta');
	}

	// CAD Teaser
	set_query_var('args', array('title' => 'CAD Drawings and Specifications', 'num_items' => '4'));
	get_template_part('template-parts/section', 'cad-grid');

?>
</main><!-- #site-content -->

<?php get_footer(); ?>