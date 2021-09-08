<?php

/**
 * Template Name: Upcoming Events
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
	include get_stylesheet_directory() . '/inc/breadcrumbs.php';
	?>

	<div class="row">

		<div class="col-md-8 order-2 order-md-1">

			<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			// the rest of the args are in /inc/custom-sort.php
			$args = array(
				'post_type' => 'events',
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
		<div class="col-md-4 pb-3 order-1 order-md-2">
			<nav id="sidebar-left" class="sidebar accordion ml-0 mr-0" aria-label="Kinds of events">
				<?php

				$taxonomy = 'kinds';
				$terms = get_terms($taxonomy); // Get all terms of a taxonomy

				if ($terms && !is_wp_error($terms)) :
				?>
				<!-- use class "active" for the active link -->
				<?php foreach ($terms as $term) { ?>
				<a class="nav-link" href="<?php echo get_term_link($term->slug, $taxonomy); ?>">
					<?php echo $term->name; ?>
				</a>
				<?php } ?>
				<?php endif; ?>
				<a class="nav-link" href="/cronkite-events/past-events">Past Events</a>
			</nav><!-- end .sidebar -->

			<div class="pt-md-6 pt-sm-3">
				<a class="btn btn-maroon btn-md" href="/cronkite-events/convocation/">Convocation Information</a>
			</div>

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