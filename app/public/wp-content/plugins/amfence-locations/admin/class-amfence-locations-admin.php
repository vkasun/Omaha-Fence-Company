<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.linkedin.com/in/robcruiz/
 * @since      1.0.0
 *
 * @package    Amfence_Locations
 * @subpackage Amfence_Locations/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Amfence_Locations
 * @subpackage Amfence_Locations/admin
 * @author     Rob Ruiz <r.ruiz@americafence.com>
 */
class Amfence_Locations_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The Slug of this plugin (auto set to plugin-name with _ instead of -.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_slug;

	/**
	 * The Admin Loader.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      object    $plugin_name    The ID of this plugin.
	 */
	private $loader;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version, $loader ) {

		$this->plugin_name = $plugin_name;
		$this->loader = $loader;
		$this->plugin_slug = str_replace('-', '_', $plugin_name);
		$this->version = $version;
		$this->setup_settings();
		$this->setup_custom_fields();
		//$this->refresh_locations(); <- use this when we refresh somewhere in the admin
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Amfence_Locations_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Amfence_Locations_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/amfence-locations-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Amfence_Locations_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Amfence_Locations_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/amfence-locations-admin.js', array( 'jquery' ), $this->version, false );

	}

	private function setup_settings(){
		$plugin_settings = new Amfence_Locations_Settings();
		$this->loader->add_filter( $this->plugin_slug.'_menu', $plugin_settings, $this->plugin_slug.'_add_menu' );
		$this->loader->add_filter( $this->plugin_slug.'_settings_tabs', $plugin_settings, $this->plugin_slug.'_settings_tabs' );
		$this->loader->add_filter( $this->plugin_slug.'_registered_settings_sections', $plugin_settings, $this->plugin_slug.'_settings_sections' );
		$this->loader->add_filter( $this->plugin_slug.'_registered_settings', $plugin_settings, $this->plugin_slug.'_settings' );
		$this->loader->add_action( $this->plugin_slug.'_refresh_cache_field', $plugin_settings, $this->plugin_slug.'_refresh_cache_field');
	}

    private function setup_custom_fields(){
        $this->loader->add_action( 'cmb2_admin_init', $this, 'register_location_metabox' );
    }

    public function register_location_metabox(){
        $locations_meta = new_cmb2_box( array(
            'id'            => 'location_fields',
            'title'         => esc_html__( 'Location Meta', 'amfence-locations' ),
            'object_types'  => array( 'location' ),
        ) );

        $locations_meta->add_field( array(
            'name'       => esc_html__( 'Name', 'amfence-locations' ),
            'desc'       => esc_html__( 'ex: American Fence Company of Omaha', 'amfence-locations' ),
            'id'         => 'location_name',
            'type'       => 'text',
            'column'     => true
        ) );

	    $locations_meta->add_field( array(
		    'name'       => esc_html__( 'Corp Name', 'amfence-locations' ),
		    'desc'       => esc_html__( 'Only if applicable ( anything other than American Fence Company )', 'amfence-locations' ),
		    'id'         => 'location_corp',
		    'type'       => 'text',
	    ) );

        $locations_meta->add_field( array(
            'name'       => esc_html__( 'Full Address', 'amfence-locations' ),
            'id'         => 'location_address',
            'type'       => 'text',
            'column'     => true,
        ) );

        $locations_meta->add_field( array(
            'name'       => esc_html__( 'City', 'amfence-locations' ),
            'id'         => 'city_name',
            'type'       => 'text',
        ) );

        $locations_meta->add_field( array(
            'name'       => esc_html__( 'State', 'amfence-locations' ),
            'id'         => 'state_name',
            'type'       => 'text',
        ) );

        $locations_meta->add_field( array(
            'name'       => esc_html__( 'Phone', 'amfence-locations' ),
            'desc'       => esc_html__( 'ex: 402-896-6722', 'amfence-locations' ),
            'id'         => 'location_phone',
            'type'       => 'text',
            'column'     => true
        ) );

        $locations_meta->add_field( array(
            'name'       => esc_html__( 'Branch Website Link', 'amfence-locations' ),
            'desc'       => esc_html__( 'ex: https://omahafencecompany.com', 'amfence-locations' ),
            'id'         => 'location_website',
            'type'       => 'text_url',
        ) );

        $locations_meta->add_field( array(
            'name'       => esc_html__( 'Shopify Store Link', 'amfence-locations' ),
            'desc'       => esc_html__( 'ex: Full link to the Shopify store (if one exists)', 'amfence-locations' ),
            'id'         => 'shopify_store_link',
            'type'       => 'text_url',
        ) );

        $locations_meta->add_field( array(
            'name'       => esc_html__( 'Google Maps Link', 'amfence-locations' ),
            'desc'       => esc_html__( 'ex: https://g.page/americanfenceomaha?share', 'amfence-locations' ),
            'id'         => 'location_maps_link',
            'type'       => 'text_url',
        ) );
    }

}
