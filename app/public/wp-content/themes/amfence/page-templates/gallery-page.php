<?php
/**
 * Template Name: Gallery Page
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

<?php
//Gallery
set_query_var('args', array('title' => 'Gallery Pages', 'num_items' => '-1'));
get_template_part('template-parts/section', 'gallery-grid');

?>
</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>