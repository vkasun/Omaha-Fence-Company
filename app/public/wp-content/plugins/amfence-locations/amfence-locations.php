<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.linkedin.com/in/robcruiz/
 * @since             1.0.0
 * @package           Amfence_Locations
 *
 * @wordpress-plugin
 * Plugin Name:       American Fence Locations
 * Plugin URI:        https://www.linkedin.com/in/robcruiz/
 * Description:       Manage all branch locations from one central site and disseminate all location info to slave sites
 * Version:           1.0.0
 * Author:            Rob Ruiz
 * Author URI:        https://www.linkedin.com/in/robcruiz/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       amfence-locations
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if (!function_exists('write_log')) {

    function write_log($log) {

        if (is_array($log) || is_object($log)) {
            error_log(print_r($log, true));
        } else {
            error_log($log);
        }

    }

}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'AMFENCE_LOCATIONS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-amfence-locations-activator.php
 */
function activate_amfence_locations() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-amfence-locations-activator.php';
	Amfence_Locations_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-amfence-locations-deactivator.php
 */
function deactivate_amfence_locations() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-amfence-locations-deactivator.php';
	Amfence_Locations_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_amfence_locations' );
register_deactivation_hook( __FILE__, 'deactivate_amfence_locations' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-amfence-locations.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_amfence_locations() {

	$plugin = new Amfence_Locations();
	$plugin->run();

}
run_amfence_locations();
