<?php
/**
 * Template Name: CAD Parent
 * Template Post Type: cad_drawing
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
				<?php
					if(get_field('specifications_document')){
						echo '<a href="' . get_field('specifications_document') . '">DOWNLOAD SPECIFICATIONS</a>';
					}
				?>
			</div>
		</div>
	</div>
</section>
<?php
}
?>
<section id="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col">
			<?php
				$url = $_SERVER['REQUEST_URI'];
				$path = parse_url($url);
				//var_dump($path);
				$path_items = explode('/', $path['path']);
				//var_dump($path_items);
				$url_str = "/";
				$path_items = array_splice($path_items, 1, -2);
				echo '<a href="/">Home</a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;';
				foreach($path_items as $path_item){
					if($path_item){
						$url_str .= $path_item . "/";
						$path_item = str_replace('cad', 'CAD', $path_item);
						echo '<a href="' . $url_str . '">' . str_replace('-', ' ', $path_item) . '</a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;';
					}
				}
			?>
				<?php the_title(); ?>
			</div>
		</div>
	</div>
</section>

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
//CAD Drawings
set_query_var('args', array('title' => get_the_title(), 'parent_id' => get_the_ID(), 'num_items' => '-1'));
get_template_part('template-parts/section', 'cad-children');

//CAD Drawings - Universal Components
if(get_the_title() != 'Hardware'){
	set_query_var('args', array('title' => 'Hardware', 'parent_id' => 297, 'num_items' => '-1'));
	get_template_part('template-parts/section', 'cad-children');
}

// CAD Teaser
$show_related = get_field('show_related_cad_products');
//var_dump($show_related);
if($show_related){
set_query_var('args', array('title' => 'Other PalmShield Products', 'num_items' => sizeof($show_related), 'product_array' => $show_related));
get_template_part('template-parts/section', 'cad-grid');
}

?>
</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>