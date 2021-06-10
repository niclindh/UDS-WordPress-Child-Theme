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
	if (function_exists('yoast_breadcrumb')) {
	?>
		<div class="container">
			<nav aria-label="breadcrumbs">
				<?php
				yoast_breadcrumb('<ol class="breadcrumb bg-white">', '</ol>');
				?>
			</nav>
		</div>

	<?php
	}
	?>


	<div class="row">
		<div class="col">

			<header class="page-header">

				<p><strong>A paragraph about why you should care.</strong> Skateboard sriracha jean shorts, mlkshk 3 wolf moon prism gluten-free. Asymmetrical drinking vinegar palo santo vinyl, 90's ennui single-origin coffee pinterest bespoke listicle organic meggings la croix. Pabst bitters polaroid franzen, readymade pok pok copper mug semiotics lumbersexual fashion axe af. Messenger bag polaroid DIY woke tbh, literally paleo gastropub tofu kinfolk hot chicken poutine intelligentsia.</p>

				<p><a href="/cronkite-events/past-events">View past Cronkite School events.</a></p>

				<p>List the events categories and link to them</p>

			</header><!-- .page-header -->

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
				get_template_part('templates-loop/content', 'none');
			}

			wp_reset_postdata();

			?>

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
