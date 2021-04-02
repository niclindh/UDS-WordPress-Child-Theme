<?php
/**
 * Template Name: Events
 * Template Post Type: events
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="skip-to-content" <?php post_class( 'container' ); ?>>

	<div class="row">
		<div class="col">

			<?php
			if ( have_posts() ) {

				?>
				<header class="page-header">

					<h1 class="article">Cronkite events</h1>

					<p>Paragraph about the upcoming events.  Skateboard sriracha jean shorts, mlkshk 3 wolf moon prism gluten-free. Asymmetrical drinking vinegar palo santo vinyl, 90's ennui single-origin coffee pinterest bespoke listicle organic meggings la croix.</p>
					<p><a href="/past-events">View past Cronkite School events.</a></p>

					</header><!-- .page-header -->

				<?php
				// Start the loop.
				while ( have_posts() ) {
					the_post();

					/*
					* Include the Post-Format-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Format name) and that will be used instead.
					*/
					get_template_part( 'templates-loop/content', 'events-archive' );

                    //echo 'HHHH ' . get_post_format();
				}
			} else {
				get_template_part( 'templates-loop/content', 'none' );
			}
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
