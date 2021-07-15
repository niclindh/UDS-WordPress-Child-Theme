<?php

/**
 * Template Name: Events Categories
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

//get_template_part('templates-global/hero');

get_template_part('templates-global/global-banner');

?>

<main id="skip-to-content" <?php post_class('container'); ?>>

    <div class="container py-6">
        <?php the_archive_title('<h1 class="article page-title mb-6">', ' events</h1>');
        ?>

        <div class="row">

            <div class="col-md-8">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                $current_term = single_term_title("", false);
                // echo 'TERM: ' . $current_term;

                // the rest of the args are in /inc/custom-sort.php
                $args = array(
                    'post_type' => 'events',
                    'the_kind' => $current_term,
                    'ispast' => 'no', // used a query argument to filter out past events in pre_get_posts for future events
                    'paged' => $paged
                );

                $wp_query = new WP_Query($args);

                if ($wp_query->have_posts()) {

                    while ($wp_query->have_posts()) {
                        $wp_query->the_post();

                        get_template_part('templates-loop/content', 'events-archive');
                    }
                } else {
                    get_template_part('templates-loop/content', 'events-none');
                }

                wp_reset_postdata();

                ?>

            </div>
            <div class="col-md-4">

                <nav id="sidebar-left" class="sidebar accordion" aria-label="Secondary">
                    <?php

                    $taxonomy = 'kinds';
                    $terms = get_terms($taxonomy); // Get all terms of a taxonomy

                    if ($terms && !is_wp_error($terms)) :
                    ?>

                        <?php foreach ($terms as $term) {

                            if ($current_term == $term->name) {
                        ?>
                                <a class="nav-link active" href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name; ?></a>
                            <?php } else {
                            ?>
                                <a class="nav-link" href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name; ?></a>
                        <?php
                            }
                        } ?>
                    <?php endif; ?>
                </nav><!-- end .sidebar -->


            </div>
        </div>

        <div class="row">
            <div class="col">
                <!-- The pagination component -->
                <?php uds_wp_pagination(); ?>
            </div>
        </div>

</main><!-- #main -->

<?php
get_footer();
