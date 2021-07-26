<?php
add_action('init', 'create_events_hierarchical_taxonomy', 0);

function create_events_hierarchical_taxonomy()
{

    // Add new taxonomy, make it hierarchical like categories
    //first do the translations part for GUI

    $labels = array(
        'name' => _x('Kinds', 'taxonomy general name'),
        'singular_name' => _x('Kind', 'taxonomy singular name'),
        'search_items' =>  __('Search Kinds'),
        'all_items' => __('All Kinds'),
        'parent_item' => __('Parent Kind'),
        'parent_item_colon' => __('Parent Kind:'),
        'edit_item' => __('Edit Kind'),
        'update_item' => __('Update Kind'),
        'add_new_item' => __('Add New Kind'),
        'new_item_name' => __('New Kind Name'),
        'menu_name' => __('Kinds'),
    );

    // Now register the taxonomy
    register_taxonomy('kinds', array('events'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'cronkite-events/kind'),
    ));
}

add_action('init', 'create_pressreleases_hierarchical_taxonomy', 0);

function create_pressreleases_hierarchical_taxonomy()
{

    // Add new taxonomy, make it hierarchical like categories
    //first do the translations part for GUI

    $labels = array(
        'name' => _x('Topics', 'taxonomy general name'),
        'singular_name' => _x('Topic', 'taxonomy singular name'),
        'search_items' =>  __('Search Topics'),
        'all_items' => __('All Topics'),
        'parent_item' => __('Parent Topic'),
        'parent_item_colon' => __('Parent Topic:'),
        'edit_item' => __('Edit Topic'),
        'update_item' => __('Update Topic'),
        'add_new_item' => __('Add New Topic'),
        'new_item_name' => __('New Topic Name'),
        'menu_name' => __('Topics'),
    );

    // Now register the taxonomy
    register_taxonomy('topics', array('pressreleases'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'topic'),
        'default_term' => [ //(string|array) Default term to be used for the taxonomy.
            'name' => 'All', //(string) Name of default term.
            'slug' => 'all', //(string) Slug for default term.
            'description' => 'Every press release needs to be in this category', //(string) Description for default term.
        ],
    ));
}
