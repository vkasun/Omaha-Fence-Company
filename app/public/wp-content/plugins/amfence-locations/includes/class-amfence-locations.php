<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.linkedin.com/in/robcruiz/
 * @since      1.0.0
 *
 * @package    Amfence_Locations
 * @subpackage Amfence_Locations/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Amfence_Locations
 * @subpackage Amfence_Locations/includes
 * @author     Rob Ruiz <r.ruiz@americafence.com>
 */
class Amfence_Locations {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Amfence_Locations_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	public $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	public $plugin_settings;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'AMFENCE_LOCATIONS_VERSION' ) ) {
			$this->version = AMFENCE_LOCATIONS_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'amfence-locations';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		$this->config_settings();
		$this->setup_cpts();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Amfence_Locations_Loader. Orchestrates the hooks of the plugin.
	 * - Amfence_Locations_i18n. Defines internationalization functionality.
	 * - Amfence_Locations_Admin. Defines all hooks for the admin area.
	 * - Amfence_Locations_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/amfence-helper-functions.php';

	    /**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-amfence-locations-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-amfence-locations-i18n.php';

		/**
		 * The class that manages all plugin settings
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/settings/source/class.s214-settings.php';

		/**cs
		 * The class that manages all plugin settings
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/settings/class-amfence-locations-settings.php';

        /**
         * [amfence-locations] shortcode
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/shortcodes/shortcode-amfence-location-list.php';

		/**
		 * The class that manages the registration of all things related to our custom post types.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/cpt/CPT.php';

        /**
         * The class that manages the registration of all things related to our custom post types.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/amfence-locations-endpoints.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-amfence-locations-admin.php';

		/**
		 * The CMB2 library is responsible for managing all of our custom metaboxes and custom fields.
		 * ACF is for noobs.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/CMB2/init.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-amfence-locations-public.php';

		$this->loader = new Amfence_Locations_Loader();

	}



	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Amfence_Locations_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Amfence_Locations_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Amfence_Locations_Admin( $this->get_plugin_name(), $this->get_version(), $this->loader );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action('hourly_locations_refresh', $plugin_admin, 'refresh_locations');
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Amfence_Locations_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Amfence_Locations_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Configure the plugin settings.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function config_settings() {
		$settings = new S214_Settings( 'amfence-locations', 'general' );
		$this->plugin_settings = $settings->get_settings();
	}


	/**
	 * Setup all custom post types.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function setup_cpts() {
		if(!$this->site_is_slave()){
			$locations = new AMFence_Locations\CPT('location',
				array(
					'supports' => array('title', 'editor', 'thumbnail', 'page-attributes')
				)
			);
			$locations->menu_icon('dashicons-location');
		}
	}

	public function site_is_slave(){
		return $this->plugin_settings['amfence_locations_mode'] == 'slave';
	}

	public function refresh_locations() {
		if($this->plugin_settings && $this->site_is_slave()){
			$location_data = $this->refresh_locations_data('?includeFakes=true');
			set_transient('amfence_locations_data', $location_data, 12 * HOUR_IN_SECONDS);
		}
	}

	public function get_location_data_from_posts($include_fakes=false){
		$location_data = array();
	    $location_posts = array_reverse(get_amfence_location_posts());
	    foreach($location_posts as $location_post){
	        $location_meta = get_post_meta($location_post->ID);
	        if(!$include_fakes && empty($location_meta['location_address'][0])){
	        	continue;
	        }
	        $location_data[] = array(
	            'id'        => $location_post->ID,
	            'name'      => $location_meta['location_name'][0],
	            'corpName'  => $location_meta['location_corp'][0],
	            'title'     => $location_post->post_title,
	            'city'      => $location_meta['city_name'][0],
	            'state'      => $location_meta['state_name'][0],
	            'address'   => $location_meta['location_address'][0],
	            'phone'     => $location_meta['location_phone'][0],
	            'website'   => $location_meta['location_website'][0],
	            'store'   => $location_meta['shopify_store_link'][0],
	            'mapsLink'  => $location_meta['location_maps_link'][0],
	        );
	    }
	    return $location_data;
	}

	public function get_locations_data(){
		if ( false === ( $amfence_locations_data = get_transient( 'amfence_locations_data' ) ) ) {
			if($this->site_is_slave()){
				$this->refresh_locations();
				return get_transient( 'amfence_locations_data' );
			} else {
				return $this->get_location_data_from_posts();
			}
		} else {
			return $amfence_locations_data;
		}
	}

	public function refresh_locations_data($params=''){
		return $this->request_locations('/locations'.$params);
	}

	public function request_locations($endpoint, $method='GET', $data=false){
		$master_site = $this->plugin_settings['amfence_locations_master_url'];
		$request_url = $master_site.'/wp-json/amfence/v1'.$endpoint;
		$response = wp_remote_request( $request_url,
			array(
				'method'     => $method
			)
		);

		return json_decode(wp_remote_retrieve_body($response));
	}

}
