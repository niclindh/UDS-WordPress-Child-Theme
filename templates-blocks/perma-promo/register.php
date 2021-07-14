<?php

/**
 * Block Registration
 *
 * Block name: Perma Promo
 * Author: Nic Lindh
 * Version: 0.1
 *
 * @package UDS WordPress Theme
 */

acf_register_block_type(
    array(
        'name'              => 'cronkite-perma-promo', // internal name, like a slug.
        'title'             => __('CS Perma Promo', 'uds-wordpress-theme'), // name the user will see.
        'description'       => __('A press release we want to keep on the home page', 'uds-wordpress-theme'), // description the user will see.
        'icon'              => 'visibility', // Dashicon, or custom SVG code, for the icon.
        'render_template'   => 'templates-blocks/perma-promo/perma-promo.php', // location of the block's template.
        'category'          => 'uds', // category this block appears in.
        'keywords'          => array('news', 'frontpage'),
        'supports'          => array(
            'align' => false, // Remove the align button in the editor toolbar.
        ),
        'mode'              => 'preview', // make this block default to full edit mode when added to the page.
    )
);
