<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.linkedin.com/in/robcruiz/
 * @since      1.0.0
 *
 * @package    Amfence_Locations
 * @subpackage Amfence_Locations/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Amfence_Locations
 * @subpackage Amfence_Locations/includes
 * @author     Rob Ruiz <r.ruiz@americafence.com>
 */
class Amfence_Locations_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		Amfence_Locations_Activator::crons();
	}

	public static function crons(){
		if (! wp_next_scheduled ( 'hourly_locations_refresh' )) {
			wp_schedule_event(time(), 'hourly', 'hourly_locations_refresh');
		}
	}

	public function do_this_hourly() {
		// do something every hour
	}

}
