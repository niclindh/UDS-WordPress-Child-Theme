<?php
/**
 * Block Registration
 *
 * Block name: People
 * Author: Nic Lindh
 * v 0.1
  *
 * @package UDS WordPress Theme
 *
 */

acf_register_block_type(
	array(
		'name'              => 'cronkite-people',
		'title'             => __( 'CS People', 'uds-wordpress-theme' ),
		'description'       => __( 'Presents a person', 'uds-wordpress-theme' ),
		'icon'              => 'admin-users',
		'render_template'   => 'templates-blocks/people/people.php',
		'category'          => 'uds',
		'keywords'          => array( 'people', 'section' ),
        'supports'          => array(
            'align' => false, // Remove the align button in the editor toolbar.
        ),
        'mode'              => 'preview',
	)
);
