<?php
/**
 * UDS WordPress Child Theme functions and definitions
 *
 * @package uds-wordpress-child-theme
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

add_theme_support('post-thumbnails');

if (!function_exists('custom_post_type')) {

    // Register Custom Post Type
    function custom_post_type()
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
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'post',
            'show_in_rest' => true,
            'rewrite' => array('slug' => 'eventvideos/%year%', 'with_front' => false),
        );
        register_post_type('eventvideos', $args);

    }
    add_action('init', 'custom_post_type', 0);

}

function eventvideos_permalink($url, $post)
{
    if ('eventvideos' == get_post_type($post)) {
        $url = str_replace("%year%", get_the_date('Y'), $url);
    }
    return $url;
}
add_filter('post_type_link', 'eventvideos_permalink', 10, 2);

/**
 * Enqueue child scripts and styles.
 */
function uds_wordpress_child_scripts()
{
    // Get the theme data.
    $the_theme = wp_get_theme();
    $theme_version = $the_theme->get('Version');

    $css_child_version = $theme_version . '.' . filemtime(get_stylesheet_directory() . '/css/child-theme.min.css');
    wp_enqueue_style('uds-wordpress-child-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array('uds-wordpress-styles'), $css_child_version);

    $js_child_version = $theme_version . '.' . filemtime(get_stylesheet_directory() . '/js/child-theme.js');
    wp_enqueue_style('uds-wordpress-child-styles', get_stylesheet_directory_uri() . '/js/child-theme.js', array('jquery'), $js_child_version);
}
add_action('wp_enqueue_scripts', 'uds_wordpress_child_scripts');

// from https://www.advancedcustomfields.com/resources/local-json/
add_filter('acf/settings/load_json', 'parent_theme_field_groups');
function parent_theme_field_groups($paths)
{
    $path = get_template_directory() . '/acf-json';
    $paths[] = $path;
    $path = get_stylesheet_directory() . '/acf-json';
    $paths[] = $path;
    return $paths;
}

add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point($path)
{
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
    // return
    return $path;
}

function ap_date($thedate)
{ // ap-formats date of post
    $month = date ('m', strtotime($thedate));
    //echo 'month: ' . $month;
    //echo date('Y', $argh);
    //$theapdate = new Datetime( $thedate);
    //print_r ($argh);
    //$month =  $theapdate->format('m');
    if ($month == '01'):
        $apmonth = 'Jan. ';
    elseif ($month == '02'):
        $apmonth = 'Feb. ';
    elseif ($month == '08'):
        $apmonth = 'Aug. ';
    elseif ($month == '09'):
        $apmonth = 'Sept. ';
    elseif ($month == '10'):
        $apmonth = 'Oct. ';
    elseif ($month == '11'):
        $apmonth = 'Nov. ';
    elseif ($month == '12'):
        $apmonth = 'Dec. ';
    endif;
    // $thedate = get_the_time('l') . ', ' . $apmonth . ' ' . get_the_time('j') . ', ' . get_the_time('Y');
    //return $thedate;
    return 'DATE: ' . $apmonth;
}

// Make months AP style, no weekday
function ap_date_no_weekday($thedate)
{ // ap-formats date of post
    $theapdate = DateTime::createFromFormat('Ymd', $thedate);
    if ($theapdate->format('m') == '01'):
        $apmonth = 'Jan. ';
    elseif ($theapdate->format('m') == '02'):
        $apmonth = 'Feb. ';
    elseif ($theapdate->format('m') == '08'):
        $apmonth = 'Aug. ';
    elseif ($theapdate->format('m') == '09'):
        $apmonth = 'Sept. ';
    elseif ($theapdate->format('m') == '10'):
        $apmonth = 'Oct. ';
    elseif ($theapdate->format('m') == '11'):
        $apmonth = 'Nov. ';
    elseif ($theapdate->format('m') == '12'):
        $apmonth = 'Dec. ';
    else:
        $apmonth = ($theapdate->format('F'));
    endif;
    $thedate = $apmonth . ' ' . $theapdate->format('j') . ', ' . $theapdate->format('Y');

    return $thedate;
}

function ap_show_date($thedate)
{
    $theapdate = DateTime::createFromFormat('Ymd', $thedate);
    if ($theapdate->format('m') == '01'):
        $apmonth = 'Jan. ';
    elseif ($theapdate->format('m') == '02'):
        $apmonth = 'Feb. ';
    elseif ($theapdate->format('m') == '08'):
        $apmonth = 'Aug. ';
    elseif ($theapdate->format('m') == '09'):
        $apmonth = 'Sept. ';
    elseif ($theapdate->format('m') == '10'):
        $apmonth = 'Oct. ';
    elseif ($theapdate->format('m') == '11'):
        $apmonth = 'Nov. ';
    elseif ($theapdate->format('m') == '12'):
        $apmonth = 'Dec. ';
    else:
        $apmonth = ($theapdate->format('F'));
    endif;
    $thedate = $theapdate->format('l') . ', ' . $apmonth . ' ' . $theapdate->format('j') . ', ' . $theapdate->format('Y');

    return $thedate;
}
