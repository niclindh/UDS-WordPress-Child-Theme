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
        'name'              => 'cronkite-latest-news', // internal name, like a slug.
        'title'             => __('CS Latest News', 'uds-wordpress-theme'), // name the user will see.
        'description'       => __('The three latest press releases from the Cronkite School in story cards', 'uds-wordpress-theme'), // description the user will see.
        'icon'              => 'megaphone', // Dashicon, or custom SVG code, for the icon.
        'render_template'   => 'templates-blocks/latest-news/latest-news.php', // location of the block's template.
        'category'          => 'uds', // category this block appears in.
        'keywords'          => array('news', 'frontpage'),
        'supports'          => array(
            'align' => false, // Remove the align button in the editor toolbar.
        ),
        'mode'              => 'preview', // make this block default to full edit mode when added to the page.
    )
);
