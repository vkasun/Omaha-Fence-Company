<?php

add_action( 'rest_api_init', function () {
	$locations_obj = new AMFence_Locations();
	if(!$locations_obj->site_is_slave()){
		register_rest_route( 'amfence/v1', '/locations/', array(
			'methods' => 'GET',
			'callback' => 'amfence_locations_endpoint',
		) );
	}
} );

function amfence_locations_endpoint($request){
	$params = $request->get_params();
	$include_fakes = false;
	if(!empty($params) && !empty($params['includeFakes'])){
		$include_fakes = true;
	}
	$locations_obj = new AMFence_Locations();
    $location_data = $locations_obj->get_location_data_from_posts($include_fakes);

    return rest_ensure_response($location_data);
}