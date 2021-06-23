<?php

/**
 * Single post partial template
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<h3 style="padding-top: 2rem;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>


		<div class="entry-meta">

			<?php
			// Fancy-pants AP Style
			$release_date = get_the_date();


			echo '<i class="fa fa-calendar" aria-hidden="true"></i> ';
			echo $release_date;



			?>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div class="entry-content">


		<?php
		echo the_field('summary');
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __('Pages:', 'uds-wordpress-theme'),
				'after' => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->



</article><!-- #post-## -->