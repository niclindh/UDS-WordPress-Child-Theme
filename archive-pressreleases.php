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
	include get_stylesheet_directory() . '/inc/breadcrumbs.php';
	?>


	<div class="row">
		<div class="col-md-8 order-sm-2 order-md-1">
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

						echo '<div class="col-md-6 pb-md-6 pb-sm-3">';

						get_template_part('templates-loop/content', 'pressreleases-archive');

						echo '</div>';
					}
				} else {
					get_template_part('templates-loop/content', 'none');
				}

				wp_reset_postdata();

				?>
			</div>
		</div>
		<div class="col-md-4 pb-sm-3 order-sm-1 order-md-2">
			<nav id="sidebar-left" class="sidebar accordion" aria-label="Secondary">
				<?php

				$taxonomy = 'topics';
				$terms = get_terms($taxonomy); // Get all terms of a taxonomy

				if ($terms && !is_wp_error($terms)) :
				?>
					<!-- use class "active" for the active link -->
					<?php foreach ($terms as $term) {
						// don't show the perma promo topic in the list
						if ($term->name <> 'Perma Promo') {

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
