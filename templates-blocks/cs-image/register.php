<?php

/**
 * Block Registration
 *
 * Block name: Cronkite Image
 * Author: Nic Lindh
 * v 0.1
 *
 * @package UDS WordPress Theme
 *
 */

acf_register_block_type(
	array(
		'name'              => 'cronkite-image',
		'title'             => __('CS Image', 'uds-wordpress-theme'),
		'description'       => __('UDS formats an image', 'uds-wordpress-theme'),
		'icon'              => 'format-image',
		'render_template'   => 'templates-blocks/cs-image/cs-image.php',
		'category'          => 'uds',
		'keywords'          => array('image', 'section'),
		'supports'          => array(
			'align' => false, // Remove the align button in the editor toolbar.
		),
		'mode'              => 'preview',
	)
);
