<?php

/**
 * Single post partial template
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<article <?php post_class(); ?> id="post-
	<?php the_ID(); ?>">



	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<?php
				wptexturize(the_title('<h1 class="article">', '</h1>'));
				?>

			</div>
		</div>
	</div>

	<?php

	$event_start_time = get_field("event_start_time");
	$show_end_date = get_field("show_end_date");
	$event_end_time = get_field("event_end_time");
	$event_subhead = get_field("event_subhead");
	$event_location = get_field("event_location");

	$event_time = apstyle_event_date(get_field("event_start_time"), get_field("event_end_time"), $show_end_date);
	?>

	<div class="entry-content">

		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h4><i class="fa fa-calendar" aria-hidden="true"></i> Date and Time:</h4>
					<?php
					echo $event_time;
					?>

				</div>
				<div class="col-md-4">
					<h4><i class="fa fa-map-marker-alt" aria-hidden="true"></i> Location:</h4>
					<?php
					echo $event_location;
					?>
				</div>
			</div>
		</div>
		<!-- pt-md-6 pt-sm-3 -->
		<div class="container">
			<div class="row">
				<div class="col-md-10">
					<?php
					$thumb_id = get_post_thumbnail_id();
					$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'large', false);
					$thumb_url = $thumb_url_array[0];
					// somebody forgot to add a thumbnail and should feel bad about themselves
					if ($thumb_url == '') {
						$thumb_url = get_stylesheet_directory_uri() . '/img/generic-event-image.jpg';
					}
					?>
					<img class="img-fluid" style="width: 100%;" src="<?php echo $thumb_url; ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>">
				</div>
			</div>
		</div>
		<!-- pt-md-6 pt-sm-3 -->
		<div class="container pb-md-6 pb-sm-3">
			<div class="row">
				<div class="col-md-6">
					<?php
					echo '<h4>' . $event_subhead . '</h4>';
					the_content();
					?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<?php
					// get custom categories
					$terms = wp_get_post_terms($post->ID, 'kinds');
					foreach ($terms as $term) {
						$term_link = get_term_link($term);
						echo '<a class="btn btn-tag btn-tag-alt-white" href="' . $term_link . '">' . $term->name . '</a>' . ' ';
					}
					?>
					<hr />
					<h4>Share this event:</h4>
					<?php
					include get_stylesheet_directory() . '/inc/social-share.php';
					?>
				</div>
			</div>

		</div><!-- .entry-content -->

		<footer class="entry-footer">

			<?php uds_wp_entry_footer(); ?>

		</footer><!-- .entry-footer -->

</article><!-- #post-## -->