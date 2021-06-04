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

			<!-- if( isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'events' && $query->query_vars['pagename'] == 'past-events') {
			$query->set('orderby', 'meta_value');
			$query->set('meta_key', 'event_start_time');
			$query->set('order', 'ASC');
			$query->set('posts_per_page', '2'); // very low number just to test pagination
			$query->set('meta_query', array(
			array(
			'key' => 'event_start_time',
			'compare' => '<=', 'value'=> date('Ymd'),
				'type' => 'datetime',
				)
				) ); -->


			<header class="page-header">

				<h1 class="article">Past Cronkite events</h1>

				<p><strong>Paragraph about why you should care.</strong> Skateboard sriracha jean shorts, mlkshk 3 wolf moon prism gluten-free. Asymmetrical drinking vinegar palo santo vinyl, 90's ennui single-origin coffee pinterest bespoke listicle organic meggings la croix. Pabst bitters polaroid franzen, readymade pok pok copper mug semiotics lumbersexual fashion axe af. Messenger bag polaroid DIY woke tbh, literally paleo gastropub tofu kinfolk hot chicken poutine intelligentsia.</p>

			</header><!-- .page-header -->

			<?php

			$args = array(
				'post_type' => 'events',
				'ispast' => 'past', // used a query argument to filter out past events in pre_get_posts for future events
				'orderby' => 'meta_value',
				'meta_key' => 'event_start_time',
				'order' => 'DESC',
				'posts_per_page' => '2',
				'meta_query' => array(
					'key' => 'event_start_time',
					'compare' => '<=',
					'value'   => date('Ymd'),
					'type'    => 'datetime'
				)
			);


			$the_query = new WP_Query($args);

			if ($the_query->have_posts()) {

				while ($the_query->have_posts()) {
					$the_query->the_post();

					get_template_part('templates-loop/content', 'events-archive');

					//echo 'HHHH ' . get_post_format();
				}
			} else {
				get_template_part('templates-loop/content', 'none');
			}

			// wp_reset_postdata();

			?>

		</div>
	</div>

	<div class="row">
		<div class="col">
			<!-- The pagination component -->
			pagination goes here
			<?php uds_wp_pagination(); ?>
		</div>
	</div>

</main><!-- #main -->

<?php
get_footer();
