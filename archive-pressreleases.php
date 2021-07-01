<?php

/**
 * Template Name: Pressreleases
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

get_template_part('templates-global/hero');
get_template_part('templates-global/global-banner');


?>

<main id="skip-to-content" <?php post_class('container'); ?>>

<?php
	if (function_exists('yoast_breadcrumb')) {
	?>

		<nav aria-label="breadcrumbs">
			<?php
			yoast_breadcrumb('<ol class="breadcrumb bg-white">', '</ol>');
			?>
		</nav>


	<?php
	}
	?>


	<div class="row">
		

			<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			// the rest of the args are in /inc/custom-sort.php
			$args = array(
				'post_type' => 'pressreleases',
				'paged' => $paged,
				'order' => 'DESC'
			);

			$wp_query = new WP_Query($args);

			if ($wp_query->have_posts()) {

				while ($wp_query->have_posts()) {
					$wp_query->the_post();

					get_template_part('templates-loop/content', 'pressreleases-archive');
				}
			} else {
				get_template_part('templates-loop/content', 'none');
			}

			wp_reset_postdata();

			?>

		
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
