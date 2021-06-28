<?php

/**
 * The template for displaying all single events.
 *
 * This template includes an intrinsic Bootstrap container to make the process of
 * content creation easier for the post author. To escape from the original container
 * and layout other parts of the page, consider inserting a custom HTML block to deliver the closing <div>'s.
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>

<main id="skip-to-content">

    <?php

    while (have_posts()) {

        the_post();


        echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col">';
   
        get_template_part('templates-loop/content', 'events');

        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    ?>

</main><!-- #main -->

<?php
get_footer();