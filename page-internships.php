<?php

/**
 *
 * Template Name: Internships page
 *
 * Depends on ACF Pro blocks to populate a repeater field
 * with information on each internship
 * 
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>

<main id="skip-to-content" <?php post_class(); ?>>

    <?php

    while (have_posts()) {

        the_post();

        get_template_part('templates-global/hero');

        get_template_part('templates-global/global-banner');

        include get_stylesheet_directory() . '/inc/breadcrumbs.php';
    ?>
        <div class="container">
<div class="row">
            <div class="col-md-6">
                <?php
                the_content();

                ?>
            </div>
    </div>
        </div>
        <?php

        if (have_rows('internship')) {
        ?>
            <div class="container my-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="accordion pb-3" id="internships">
                          <?php
                            while (have_rows('internship')) {
                                the_row();
                                $unique = get_sub_field('unique_name');
                                $name = get_sub_field('name_and_semester');
                                $company = get_sub_field('company_name');
                                $application_link = get_sub_field('link_to_application');
                                $instructions = get_sub_field('application_instructions');
                                $deadline_raw = get_sub_field('deadline');
                                $paidornot = get_sub_field('paid_or_unpaid');
                            ?>
                                <div class="card card-foldable mt-3 card-maroon">
                                    <div class="card-header">
                                        <h4>
                                            <a aria-controls="<?php echo $unique; ?>Header" aria-expanded="false" class="collapsed" data-target="#<?php echo $unique; ?>Panel" data-toggle="collapse" href="#<?php echo $unique; ?>Panel" id="<?php echo $unique; ?>" role="button">
                                                <?php echo $name; ?>
                                                <span class="fas fa-chevron-up" />
                                            </a>
                                        </h4>
                                    </div>
                                    <div aria-labelledby="<?php echo $unique; ?>" class="collapse card-body" data-parent="#internships" id="<?php echo $unique; ?>Panel">
                                        <h3><?php echo $company; ?></h3>
                                        <?php 

                                        if ($deadline_raw) {

                                        $post_day = DateTime::createFromFormat('d/m/Y', $deadline_raw)->format('l');
                                        $post_daynum = DateTime::createFromFormat('d/m/Y', $deadline_raw)->format('j');
                                        $post_month = DateTime::createFromFormat('d/m/Y', $deadline_raw)->format('m');
                                        $post_year = DateTime::createFromFormat('d/m/Y', $deadline_raw)->format('Y');

                                        $deadline = apstyle_post_date($post_day, $post_daynum, $post_month, $post_year);
                                        ?>
                                        <p><strong>Deadline:</strong> <?php echo $deadline; ?></p>
                                        <?php
                                        }
                                        ?>
                                        <p><strong>Wage:</strong> <?php echo $paidornot; ?></p>
                                        <p><strong>Instructions:</strong> <?php echo $instructions; ?></p>
                                        <?php if ($application_link) {
                                            ?>
                                            <p><a href="<?php echo $application_link; ?>" rel="noopener noreferrer"><button
          class="btn btn-md btn-gold"
          type="button"
        >Apply</button></a></p>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div> <!-- card -->
                            <?php
                            }


                            ?>

                        </div>
                    </div>

                <?php
            }
                ?>
                </div>
            </div>
        <?php

        // Display the edit post button to logged in users.
        echo '<footer class="entry-footer"><div class="container mb-2"><div class="row"><div class="col-md-12">';
        edit_post_link(__('Edit', 'uds-wordpress-theme'), '<span class="edit-link">', '</span>');
        echo '</div></div></div></footer><!-- end .entry-footer -->';
    }

        ?>

</main><!-- #main -->

<?php
get_footer();
