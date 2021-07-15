<?php

/**
 * Block Registration
 *
 * Block name: Latest Newz
 * Author: Nic Lindh
 * Version: 0.1
 *
 * @package UDS WordPress Theme
 */

acf_register_block_type(
    array(
        'name'              => 'cronkite-upcoming-events', // internal name, like a slug.
        'title'             => __('CS Upcoming Events', 'uds-wordpress-theme'), // name the user will see.
        'description'       => __('The three events from the Cronkite School coming up next in event cards', 'uds-wordpress-theme'), // description the user will see.
        'icon'              => 'buddicons-groups', // Dashicon, or custom SVG code, for the icon.
        'render_template'   => 'templates-blocks/upcoming-events/upcoming-events.php', // location of the block's template.
        'category'          => 'uds', // category this block appears in.
        'keywords'          => array('events', 'frontpage'),
        'supports'          => array(
            'align' => false, // Remove the align button in the editor toolbar.
        ),
        'mode'              => 'preview', // make this block default to full edit mode when added to the page.
    )
);
