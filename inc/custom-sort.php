<?php

// custom sorting for ACF fields
// https://www.advancedcustomfields.com/resources/orde-posts-by-custom-fields/

function events_pre_get_posts($query)
{

	// do not modify queries in the admin
	if (is_admin()) {
		return $query;
	}

	// if ($query->query_vars['pagename'] == 'past-events') {
	// 	// echo 'RETURN';
	// 	// return $query;
	// 	// $query->set('exclude', 'yes');
	// 	$exclude = 'yes';
	//}
	// print_r($query->query_vars);
	//  && $query->query_vars['pagename'] <> 'past-events'
	// && $query->query_vars['is_single'] == 'false'

	// ispast query_var is set by the query loop on past events page
	// checking for name == '' avoids filtering individual events
	// which made past events throw 404s as they were filtered out
	// before they could be displayed

	// this has been a journey

	if (isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'events' && $query->query_vars['ispast'] <> 'past' && $query->query_vars['name'] == '') {
		// echo 'helo';
		$query->set('orderby', 'meta_value');
		$query->set('meta_key', 'event_start_time');
		$query->set('order', 'ASC');
		$query->set('posts_per_page', '3'); // very low number just to test pagination
		$query->set('meta_query', array(
			array(
				'key' => 'event_start_time',
				'compare' => '>=',
				'value'   => date('Ymd'),
				'type'    => 'datetime',
			)
		));
	}

	if (isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'events' && $query->query_vars['ispast'] == 'past' && $query->query_vars['name'] == '') {
		$query->set('orderby', 'meta_value');
		$query->set('meta_key', 'event_start_time');
		$query->set('order', 'DESC');
		$query->set('posts_per_page', '2'); // very low number just to test pagination
		$query->set('meta_query', array(
			array(
				'key' => 'event_start_time',
				'compare' => '<=',
				'value'   => date('Ymd'),
				'type'    => 'datetime',
			)
		));
	}

	return $query;
}
add_action('pre_get_posts', 'events_pre_get_posts');
