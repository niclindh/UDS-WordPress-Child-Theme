<?php

/**
 * The template for displaying all single posts.
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

		get_template_part('templates-global/global-banner');
		get_template_part('templates-global/story-hero');

	?>

		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

			<!-- TODO: Figure out way to make paragraphs wrap to 50% width without a pattern -->

			<style>
				.pressreleases>p {}

				.wp-bootstrap-blocks-row {
					margin-left: -25px;
				}

				.wp-block-image {
					margin-left: -10px;
				}
			</style>
			<?php

			the_content();


			// get custom categories
			$terms = wp_get_post_terms($post->ID, 'topics');
			echo '<div class="container"><div class="row">';
			foreach ($terms as $term) {
			// don't show the perma promo topic in the list
			if ($term->name <> 'Perma Promo') {

				$term_link = get_term_link($term);
				echo '<a class="btn btn-tag btn-tag-alt-white" href="' . $term_link . '">' . $term->name . '</a>' . ' ';
			}
		}
			echo '</div></div>';


			$author_name = get_field('uds_news_author_name');
			$author_title = get_field('uds_news_author_title');
			$author_email = get_field('uds_news_author_email');
			$author_phone = get_field('uds_news_author_phone');

			if ($author_name || $author_title || $author_email || $author_phone) {
				echo '<div class="author_info">';
				if ($author_name) {
					echo '<h4><span class="highlight-gold">' . $author_name . '</span></h4>';
				}
				if ($author_title) {
					echo '<p>' . $author_title . '</p>';
				}
				if ($author_email || $author_phone) {
					echo '<p>';
					if ($author_email) {
						echo '<span class="fas fa-envelope-square"></span><a href="mailto:' . $author_email . '">' . $author_email . '</a>';
					}
					echo '</br>';
					if ($author_phone) {
						echo '<span class="fas fa-phone-square"></span><a href="tel:' . $author_phone . '">' . $author_phone . '</a>';
					}
					echo '</p>';
				}
				echo '</div>';
			}


			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __('Pages:', 'uds-wordpress-theme'),
					'after'  => '</div>',
				)
			);

			?>

			<footer class="entry-footer">

				<?php uds_wp_entry_footer(); ?>

			</footer><!-- .entry-footer -->

		</article><!-- #post-## -->

	<?php
	}

	echo '</main><!-- #main -->';

	get_footer();
