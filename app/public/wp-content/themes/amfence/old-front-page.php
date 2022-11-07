<?php get_header(); ?>

<?php echo do_shortcode('[smartslider3 slider=2]'); ?>

<?php /*if(get_field('home_top_blurb')): ?>
    <section id="top-blurb">
        <div class="container">
        	<div class="row">
        		<div class="col">
	        	    <?php if(get_field('home_top_blurb_title')) { ?>
	        	        <h2><?php the_field('home_top_blurb_title'); ?></h2>
	        	    <?php } ?>
	        	</div>
        	</div>
            <div class="row">
                <div class="col">
                    <?php the_field('home_top_blurb'); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; */ ?>

<?php

// our products grid
set_query_var('args', array('num_items' => '8'));
get_template_part('template-parts/section', 'our-products');

// Customer Experience
get_template_part('template-parts/section', 'customer-experience');

// CTA - Project manager
get_template_part('template-parts/section', 'basic-cta');

// CAD Teaser
set_query_var('args', array('title' => 'CAD Drawings and Specifications', 'num_items' => '4'));
get_template_part('template-parts/section', 'cad-grid');

get_footer();

?>