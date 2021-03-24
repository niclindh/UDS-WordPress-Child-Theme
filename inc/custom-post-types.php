<?php

    // Register Custom Post Type
function eventvideos_post_type()
{
    $labels = array(
        'name' => _x('Event videos', 'Post Type General Name', 'uds-wordpress-theme-child'),
        'singular_name' => _x('Event video', 'Post Type Singular Name', 'uds-wordpress-theme-child'),
        'menu_name' => __('Event Videos', 'uds-wordpress-theme-child'),
        'name_admin_bar' => __('Event Videos', 'uds-wordpress-theme-child'),
        'archives' => __('Item Archives', 'uds-wordpress-theme-child'),
        'attributes' => __('Item Attributes', 'uds-wordpress-theme-child'),
        'parent_item_colon' => __('Parent Item:', 'uds-wordpress-theme-child'),
        'all_items' => __('All Items', 'uds-wordpress-theme-child'),
        'add_new_item' => __('Add New Item', 'uds-wordpress-theme-child'),
        'add_new' => __('Add New', 'uds-wordpress-theme-child'),
        'new_item' => __('New Item', 'uds-wordpress-theme-child'),
        'edit_item' => __('Edit Item', 'uds-wordpress-theme-child'),
        'update_item' => __('Update Item', 'uds-wordpress-theme-child'),
        'view_item' => __('View Item', 'uds-wordpress-theme-child'),
        'view_items' => __('View Items', 'uds-wordpress-theme-child'),
        'search_items' => __('Search Item', 'uds-wordpress-theme-child'),
        'not_found' => __('Not found', 'uds-wordpress-theme-child'),
        'not_found_in_trash' => __('Not found in Trash', 'uds-wordpress-theme-child'),
        'featured_image' => __('Featured Image', 'uds-wordpress-theme-child'),
        'set_featured_image' => __('Set featured image', 'uds-wordpress-theme-child'),
        'remove_featured_image' => __('Remove featured image', 'uds-wordpress-theme-child'),
        'use_featured_image' => __('Use as featured image', 'uds-wordpress-theme-child'),
        'insert_into_item' => __('Insert into item', 'uds-wordpress-theme-child'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'uds-wordpress-theme-child'),
        'items_list' => __('Items list', 'uds-wordpress-theme-child'),
        'items_list_navigation' => __('Items list navigation', 'uds-wordpress-theme-child'),
        'filter_items_list' => __('Filter items list', 'uds-wordpress-theme-child'),
    );
    $args = array(
        'label' => __('Event video', 'uds-wordpress-theme-child'),
        'description' => __('Cronkite event videos', 'uds-wordpress-theme-child'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'custom-fields'),
        'taxonomies' => array('category', 'post_tag'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-video-alt3',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => false,
        'can_export' => true,
        'has_archive' => 'eventvideos',
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'eventvideos/%year%', 'with_front' => false),
    );
    register_post_type('eventvideos', $args);

}
add_action('init', 'eventvideos_post_type', 0);

function eventvideos_permalink($url, $post)
{
if ('eventvideos' == get_post_type($post)) {
    $url = str_replace("%year%", get_the_date('Y'), $url);
}
return $url;
}
add_filter('post_type_link', 'eventvideos_permalink', 10, 2);

function events_post_type() {

	$labels = array(
		'name'                  => _x( 'Events', 'Post Type General Name', 'uds-wordpress-theme-child' ),
		'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'uds-wordpress-theme-child' ),
		'menu_name'             => __( 'Events', 'uds-wordpress-theme-child' ),
		'name_admin_bar'        => __( 'Event', 'uds-wordpress-theme-child' ),
		'archives'              => __( 'Event Archives', 'uds-wordpress-theme-child' ),
		'attributes'            => __( 'Event Attributes', 'uds-wordpress-theme-child' ),
		'parent_item_colon'     => __( 'Parent Item:', 'uds-wordpress-theme-child' ),
		'all_items'             => __( 'All Items', 'uds-wordpress-theme-child' ),
		'add_new_item'          => __( 'Add New Item', 'uds-wordpress-theme-child' ),
		'add_new'               => __( 'Add New', 'uds-wordpress-theme-child' ),
		'new_item'              => __( 'New Item', 'uds-wordpress-theme-child' ),
		'edit_item'             => __( 'Edit Item', 'uds-wordpress-theme-child' ),
		'update_item'           => __( 'Update Item', 'uds-wordpress-theme-child' ),
		'view_item'             => __( 'View Item', 'uds-wordpress-theme-child' ),
		'view_items'            => __( 'View Items', 'uds-wordpress-theme-child' ),
		'search_items'          => __( 'Search Item', 'uds-wordpress-theme-child' ),
		'not_found'             => __( 'Not found', 'uds-wordpress-theme-child' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'uds-wordpress-theme-child' ),
		'featured_image'        => __( 'Featured Image', 'uds-wordpress-theme-child' ),
		'set_featured_image'    => __( 'Set featured image', 'uds-wordpress-theme-child' ),
		'remove_featured_image' => __( 'Remove featured image', 'uds-wordpress-theme-child' ),
		'use_featured_image'    => __( 'Use as featured image', 'uds-wordpress-theme-child' ),
		'insert_into_item'      => __( 'Insert into item', 'uds-wordpress-theme-child' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'uds-wordpress-theme-child' ),
		'items_list'            => __( 'Items list', 'uds-wordpress-theme-child' ),
		'items_list_navigation' => __( 'Items list navigation', 'uds-wordpress-theme-child' ),
		'filter_items_list'     => __( 'Filter items list', 'uds-wordpress-theme-child' ),
	);
	$args = array(
        'label' => __('Events', 'uds-wordpress-theme-child'),
        'description' => __('Cronkite event videos', 'uds-wordpress-theme-child'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'custom-fields'),
        'taxonomies' => array('category', 'post_tag'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-calendar-alt',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => false,
        'can_export' => true,
        'has_archive' => 'events',
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'events/%year%', 'with_front' => false),
	);
	register_post_type( 'events', $args );

}
add_action( 'init', 'events_post_type', 0 );

function events_permalink($url, $post)
{
if ('events' == get_post_type($post)) {
    $url = str_replace("%year%", get_the_date('Y'), $url);
}
return $url;
}
add_filter('post_type_link', 'events_permalink', 10, 2);

?>