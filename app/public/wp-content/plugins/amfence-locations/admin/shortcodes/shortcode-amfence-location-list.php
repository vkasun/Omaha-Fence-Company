<?php

function render_amfence_locations( $atts ) {
    $a = shortcode_atts( array(
        'linkto' => 'microsite',
        'class' => '',
        'phone' => false,
        'address' => false,
        'id' => 'branch-locations',
        'cols' => '5',
        'include_fakes' => false
    ), $atts );

    $locations_obj = new AMFence_Locations();
    $is_slave = $locations_obj->site_is_slave();

    if(!$is_slave){
        $locations = get_amfence_location_posts();
    } else {
        $locations = $locations_obj->get_locations_data();
    }
    $html = '<div id="'.$a['id'].'" class="container '.$a['class'].'"><ol>';
    $cols = (int)$a['cols'];
    foreach($locations as $location_i => $location){
        if(empty($location->address) && !$a['include_fakes']){
            continue;
        }
        $new_row = ($location_i == 0 || is_int(($location_i+1)/($cols+1)));
        $end_row = ($location_i == count($locations)-1 || is_int(($location_i+1)/($cols)));
        if($new_row && $cols > 1){
            $html .= '<div class="row">';
        }
        $title_display = $location->title;
        if($location->corpName){
            $title_display = $location->title.' - '.$location->corpName;
        }
        if($is_slave){
            $link_external = true;
            switch($a['linkto']){
                case 'internal':
                    break;
            }
            $html .= '<li class="col" style="max-width:'.(100/$cols).'%;"><a href="'.$location->website.'" '.($link_external ? ' target=_blank ' : '').' data-target="'.slugify_city_name($location->title).'">'.$location->title.' '.$location->corp.'</a></li>';
        } else {
            $location_meta = get_post_meta($location->ID, '', true);
            $link = $location_meta['location_website'][0];
            $link_external = true;
            switch($a['linkto']){
                case 'internal':
                    break;
            }
            $html .= '<li class="col"><a href="'.$link.'" '.($link_external ? ' target=_blank ' : '').' data-target="'.slugify_city_name($location->post_title).'">'.$location->post_title.'</a></li>';
        }
        if($end_row && $cols > 1){
            $html .= '</div>';
        }
    }
    $html .= '</ol></div>';
    return $html;
}
add_shortcode( 'amfence-locations', 'render_amfence_locations' );

function slugify_city_name($city_name){
    return sanitize_title(explode(', ', $city_name)[0]);
}