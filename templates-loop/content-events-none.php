<?php

/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<section class="no-results not-found">

    <header class="page-header">

        <h2 class="page-title"><?php esc_html_e('No events found', 'uds-wordpress-theme'); ?></h2>

    </header><!-- .page-header -->

    <div class="page-content">

        <?php


        printf(
            '<p>%s<p>',
            esc_html__('Sorry, there are no events of that kind planned at this point.', 'uds-wordpress-theme')
        );
        // get_search_form();

        ?>
    </div><!-- .page-content -->

</section><!-- .no-results -->