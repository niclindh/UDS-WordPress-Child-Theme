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

require get_stylesheet_directory() . '/inc/custom-post-types.php';
require get_stylesheet_directory() . '/inc/custom-sort.php';
require get_stylesheet_directory() . '/inc/acf-register.php';

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

/**
 * Enqueue the child-theme.css into the editor.
 */
function uds_wp_gutenberg_child_css() {
	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/child-theme.min.css' );
}
add_action( 'after_setup_theme', 'uds_wp_gutenberg_child_css' );

add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point($path)
{
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
    // return
    return $path;
}

// Make months AP style
function ap_date() { // ap-formats date of post
    if (get_the_time('m')=='01') :
        $apmonth = 'Jan. ';
    elseif (get_the_time('m')=='02') :
        $apmonth = 'Feb. ';
    elseif (get_the_time('m')=='08') :
        $apmonth = 'Aug. ';
    elseif (get_the_time('m')=='09') :
        $apmonth = 'Sept. ';
    elseif (get_the_time('m')=='10') :
        $apmonth = 'Oct. ';
    elseif (get_the_time('m')=='11') :
        $apmonth = 'Nov. ';
    elseif (get_the_time('m')=='12') :
        $apmonth = 'Dec. ';
    else:
        $apmonth = (get_the_time('F'));
    endif;
    $thedate = get_the_time('l') . ', ' . $apmonth . ' ' . get_the_time('j') . ', ' . get_the_time('Y');
    return $thedate;
}

// Make months AP style, no weekday
function ap_date_no_weekday() { // ap-formats date of post
    if (get_the_time('m')=='01') :
        $apmonth = 'Jan. ';
    elseif (get_the_time('m')=='02') :
        $apmonth = 'Feb. ';
    elseif (get_the_time('m')=='08') :
        $apmonth = 'Aug. ';
    elseif (get_the_time('m')=='09') :
        $apmonth = 'Sept. ';
    elseif (get_the_time('m')=='10') :
        $apmonth = 'Oct. ';
    elseif (get_the_time('m')=='11') :
        $apmonth = 'Nov. ';
    elseif (get_the_time('m')=='12') :
        $apmonth = 'Dec. ';
    else:
        $apmonth = (get_the_time('F'));
    endif;
    $thedate = $apmonth . ' ' . get_the_time('j') . ', ' . get_the_time('Y');
    return $thedate;
  }

add_action( 'wp_enqueue_scripts', 'uds_wordpress_child_scripts' );

