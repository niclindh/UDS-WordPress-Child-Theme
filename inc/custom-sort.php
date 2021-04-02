<?php

// custom sorting for ACF fields
// https://www.advancedcustomfields.com/resources/orde-posts-by-custom-fields/

function eventvideos_pre_get_posts( $query ) {
	
	// do not modify queries in the admin
	if( is_admin() ) {		
		return $query;
	}
	// only modify queries for 'eventvideos' post type
	if( isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'eventvideos' ) {
		$query->set('orderby', 'meta_value');	
		$query->set('meta_key', 'event_date');	 
		$query->set('order', 'DESC'); 
	}
	
	// return
	return $query;
}
add_action('pre_get_posts', 'eventvideos_pre_get_posts');

function events_pre_get_posts( $query ) {
	
	// do not modify queries in the admin
	if( is_admin() ) {		
		return $query;
	}

	if( isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'events') {
		$query->set('orderby', 'meta_value');	
		$query->set('meta_key', 'event_start_time');	 
		$query->set('order', 'ASC'); 
		$query->set('posts_per_page', '2'); // very low number just to test pagination
        $query->set('meta_query', array(
            array(
                'key' => 'event_start_time',
                'compare' => '>=',
                'value'   => date('Ymd'),
                'type'    => 'datetime',
            )
        ) );           
	}

	return $query;
}
add_action('pre_get_posts', 'events_pre_get_posts');


?>