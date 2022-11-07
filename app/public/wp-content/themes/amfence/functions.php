<?php
/* Functions */
require( get_template_directory().'/inc/easy-customizer-settings-class/class-ezcustomizer-settings.php');

// Remove Canonical Link
// add_filter( 'wpseo_canonical', '__return_false' );
// remove_action('wp_head', 'rel_canonical');

function amfence_scripts(){
	wp_register_script('menu-responsive', '/wp-content/themes/amfence/js/menu.js', array('jquery'), '0.0.1');
    wp_enqueue_script('menu-responsive');

    // bootsrap grid
	wp_enqueue_style( 'bootstrap-grid', '/wp-content/themes/amfence/css/bootstrap-grid.min.css', array(), '4.0.0' );

    // main site style sheet
    wp_enqueue_style('wavethrasher', '/wp-content/themes/amfence/style.css', array(), '1.0.0');

    // social logos
	wp_enqueue_style('social-logos', '/wp-content/themes/amfence/social-logos/social-logos.css', array(), '0.0.1');

	//Azos fonts
	wp_enqueue_style('azos-fonts', 'https://use.typekit.net/tiy0gmm.css', array(), '0.0.1');
    $ga_id = get_theme_mod('ga_id');
    if($ga_id){
        wp_register_script('amfence-google-scripts', get_template_directory_uri().'/js/amfence-ga.js', array('jquery'), null);
        wp_enqueue_script('amfence-google-scripts');
        wp_localize_script('amfence-google-scripts', 'amFenceGA', array(
            'id' => $ga_id
        ));
    }

    //Font Awesome
    wp_enqueue_script('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'amfence_scripts');

$settings_config = array(
    'theme_name' => 'amfence',
    'settings_id' => 'amfence_theme',
    'sections' => array(
        array (
            'id' => 'global',
            'title' => __( 'American Fence Settings', 'amfence' ),
            'priority' => 30
        )
    ),
    'settings' => array(
        array(
            'id' => 'ga_id',
            'label' => 'Google Analytics ID',
            'section' => 'global',
            'refresh' => false
        ),
        array(
            'id' => 'enable_fontawesome',
            'label' => 'Enable Font Awesome Icons',
            'type' => 'checkbox',
            'section' => 'global',
            'refresh' => false
        )
    )
);

$theme_settings = new EZ_Customizer_Settings($settings_config);


function get_post_id_by_name($page_name){
	$page = get_page_by_title($page_name);
	return $page->ID;
}


add_action('init', 'waveinteractive_custom_init');
/**
 * Add excerpt support to pages
 */
function waveinteractive_custom_init() {
	//add_post_type_support( 'post', 'editor' );
	//add_post_type_support( 'page', 'editor' );
	add_theme_support( 'post-thumbnails' );
	add_post_type_support( 'page', 'excerpt', 'resources' );
	add_theme_support( 'title-tag' );
}

function amfence_custom_logo_setup() {
    $defaults = array(
        'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true,
    );

    add_theme_support( 'custom-logo', $defaults );
}

add_action( 'after_setup_theme', 'amfence_custom_logo_setup' );

add_filter( 'upload_mimes', 'my_myme_types', 1, 1 );
function my_myme_types( $mime_types ) {
  $mime_types['dwg'] = 'application/acad'; 
  $mime_types['svg'] = 'image/svg+xml'; 
  return $mime_types;
}

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
        return $data;
    }

    $filetype = wp_check_filetype( $filename, $mimes );

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];

}, 10, 4 );

function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );

/*******   populate button group with Custom Post Types  *******/
function my_acf_load_field( $field ) {
	
	$args = array(
		'post_type'      => 'products',
		'orderby'		 => 'menu_order',
		'order'			 => 'ASC',
		'post_parent'	 => 0
	 );
	
	$products = new WP_Query( $args );

	if ( $products->have_posts() ) :
		while ( $products->have_posts() ) : $products->the_post();
			$field['choices'][get_the_ID()] = get_the_title();
		endwhile;
	endif;
	wp_reset_query();
    return $field;
	
    
}
// all
// add_filter('acf/load_field', 'my_acf_load_field');

// type
//add_filter('acf/load_field/type=select', 'my_acf_load_field');

// name
add_filter('acf/load_field/name=show_child_pages', 'my_acf_load_field');

// key
// add_filter('acf/load_field/key=field_508a263b40457', 'my_acf_load_field');


/*******   populate button group with Custom Post Types  *******/
function my_acf_load_field_CAD( $field ) {
	$args = array(
		'post_type'      => 'cad_drawing',
		'orderby'		 => 'menu_order',
		'order'			 => 'ASC',
		'post_parent'	 => 0
	 );
	$parent_array = array();
	
	$cad_parents = new WP_Query( $args );

	if ( $cad_parents->have_posts() ) :
		while ( $cad_parents->have_posts() ) : $cad_parents->the_post();
			$parent_array[get_the_ID()] = get_the_title();
		endwhile;
	endif;
	//var_dump($parent_array);
	wp_reset_query();
	$children = array();
	$mid_children = array();
	foreach($parent_array as $parent_id => $parent_title){
		//echo "parent id = " . $parent_id . "<br>";
		$args_parent = array('post_parent' => $parent_id, 'post_type' => 'cad_drawing', 'orderby' => 'menu_order', 'order' => 'ASC');
		$cad_parents = new WP_Query( $args_parent );

		if ( $cad_parents->have_posts() ) :
			while ( $cad_parents->have_posts() ) : $cad_parents->the_post();
			//echo "title = " . get_the_title() . "<br>";
				//$mid_children[get_the_ID()] = $parent_title . " " . get_the_title();
				$field['choices'][get_the_ID()] = $parent_title . " " . get_the_title();
			endwhile;
	endif;
	}
	//var_dump($mid_children);
	
		//var_dump($children);
	wp_reset_query();
    return $field;
	
    
}
add_filter('acf/load_field/name=show_related_cad_products_copy', 'my_acf_load_field_CAD');


/*******   populate Footer options button group with Menus  *******/
function my_acf_load_field_Menus( $field ) {
	
	$products = wp_get_nav_menus();
	//var_dump($products);
	foreach( $products as $product){
		//echo "product " . $product->name . "<br>";
		$field['choices'][$product->name] = $product->name;
	}
    return $field;
}
add_filter('acf/load_field/name=footer_menu', 'my_acf_load_field_Menus');


/*********    	CUSTOM THEME SETTINGS FROM ACF   	 ***********/
if( function_exists('acf_add_options_page') ) {

    // add parent
	$parent = acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title' 	=> 'Theme Settings',
		'redirect' 		=> false
	));


	// add sub page

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title' 	=> 'Footer',
		'parent_slug' 	=> $parent['menu_slug'],
	));
}



/*************     RICH TEXT EXCERPT    ****************/
add_action( 'add_meta_boxes', array ( 'T5_Richtext_Excerpt', 'switch_boxes' ) );

/**
 * Replaces the default excerpt editor with TinyMCE.
 */
class T5_Richtext_Excerpt
{
    /**
     * Replaces the meta boxes.
     *
     * @return void
     */
    public static function switch_boxes()
    {
        if ( ! post_type_supports( $GLOBALS['post']->post_type, 'excerpt' ) )
        {
            return;
        }

        remove_meta_box(
            'postexcerpt' // ID
        ,   ''            // Screen, empty to support all post types
        ,   'normal'      // Context
        );

        add_meta_box(
            'postexcerpt2'     // Reusing just 'postexcerpt' doesn't work.
        ,   __( 'Excerpt' )    // Title
        ,   array ( __CLASS__, 'show' ) // Display function
        ,   null              // Screen, we use all screens with meta boxes.
        ,   'normal'          // Context
        ,   'core'            // Priority
        );
    }

    /**
     * Output for the meta box.
     *
     * @param  object $post
     * @return void
     */
    public static function show( $post )
    {
    ?>
        <label class="screen-reader-text" for="excerpt"><?php
        _e( 'Excerpt' )
        ?></label>
        <?php
        // We use the default name, 'excerpt', so we don’t have to care about
        // saving, other filters etc.
        wp_editor(
            self::unescape( $post->post_excerpt ),
            'excerpt',
            array (
            'textarea_rows' => 15
        ,   'media_buttons' => FALSE
        ,   'teeny'         => TRUE
        ,   'tinymce'       => TRUE
            )
        );
    }

    /**
     * The excerpt is escaped usually. This breaks the HTML editor.
     *
     * @param  string $str
     * @return string
     */
    public static function unescape( $str )
    {
        return str_replace(
            array ( '&lt;', '&gt;', '&quot;', '&amp;', '&nbsp;', '&amp;nbsp;' )
        ,   array ( '<',    '>',    '"',      '&',     ' ', ' ' )
        ,   $str
        );
    }
}

/* Google Analytics Track Confirmation Page landing from CTA */
add_filter( 'gform_confirmation', function ( $confirmation, $form, $entry ) {
    if(is_array($confirmation) && isset($confirmation['redirect'])){
        $confirmation['redirect'] .= '?formId='.$entry['form_id'];
    }
    return $confirmation;
}, 11, 3 );
function add_ga_tracking_from_confirmation_page($content){
    $page_to_track = 'thank-you';
    if(!empty($_GET) && isset($_GET['formId']) && strpos($_SERVER['HTTP_REFERER'], 'contact') !== false && strpos($_SERVER['REQUEST_URI'], $page_to_track) !== false){
        $ga_id = get_theme_mod('ga_id');
        $form = GFAPI::get_form( $_GET['formId'] );
        $redirect_uri = explode('?',$_SERVER['REQUEST_URI'])[0];
        $content .= "<script>
        ga('create', '".$ga_id."', 'auto');
        ga('send', {
            hitType: 'event',
            eventCategory: 'CTA Converts',
            eventAction: '".$form['title']."',
            hitCallback: function() {
               window.location.href='".$redirect_uri."';
            }
        });
        </script>";
    }
    return $content;
}
add_filter( 'the_content', 'add_ga_tracking_from_confirmation_page' );