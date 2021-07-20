<?php
/**
 * Block Registration
 *
 * Block name: Image Overlap News
 * Author: Nic Lindh
 * v 0.1
 * 
 * Based on:
 * Content Image Overlap
 *
 * @package UDS WordPress Theme
 *
 * Notes: A block created from the XD design document directly, as opposed to "downstream"
 * from the UDS Boostrap project. Notes found with the Misc. Content section under the heading of Content Image Overlap
 */

acf_register_block_type(
	array(
		'name'              => 'cronkite-image-overlap-news',
		'title'             => __( 'CS Image Overlap News', 'uds-wordpress-theme' ),
		'description'       => __( 'Displays latest press release in a configurable category in a large image box', 'uds-wordpress-theme' ),
		'icon'              => 'awards',
		'render_template'   => 'templates-blocks/image-overlap-news/image-overlap-news.php',
		'category'          => 'uds',
		'keywords'          => array( 'overlap', 'news', 'section' ),
        'supports'          => array(
            'align' => false, // Remove the align button in the editor toolbar.
        ),
        'mode'              => 'preview',
	)
);
