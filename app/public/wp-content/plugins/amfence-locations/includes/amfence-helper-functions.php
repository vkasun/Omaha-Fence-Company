<?php

function get_amfence_location_posts(){
    $args = array(
        'post_type'         => 'location',
        'post_status'       => 'publish',
        'posts_per_page'    => -1,
    );
    $query = new WP_Query($args);

    return $query->posts;

}

