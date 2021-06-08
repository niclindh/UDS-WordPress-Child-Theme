<?php

/**
 * Template Name: Past Events
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>

<main id="skip-to-content" <?php post_class('container'); ?>>

	<div class="row">
		<div class="col">

			<header class="page-header">

				<h1 class="article">Past Cronkite events</h1>

				<p><strong>Paragraph about why you should care.</strong> Skateboard sriracha jean shorts, mlkshk 3 wolf moon prism gluten-free. Asymmetrical drinking vinegar palo santo vinyl, 90's ennui single-origin coffee pinterest bespoke listicle organic meggings la croix. Pabst bitters polaroid franzen, readymade pok pok copper mug semiotics lumbersexual fashion axe af. Messenger bag polaroid DIY woke tbh, literally paleo gastropub tofu kinfolk hot chicken poutine intelligentsia.</p>

			</header><!-- .page-header -->

			<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			echo 'PAGED: ' . $paged;

			// the rest of the args are in /inc/custom-sort.php
			$args = array(
				'post_type' => 'events',
				'ispast' => 'past', // used a query argument to filter out past events in pre_get_posts for future events
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
