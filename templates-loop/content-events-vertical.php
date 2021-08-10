<?php

/**
 * Single post partial template
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<?php

$no_featured_image = '';

$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'large', false);
$thumb_url = $thumb_url_array[0];

// somebody forgot to add a thumbnail and should feel bad about themselves
if ($thumb_url == '') {
	$thumb_url = get_stylesheet_directory_uri() . '/img/generic-event-image.jpg';
	$no_featured_image = 'missing';
}

// TODO code to check for featured image and if it doesn't exist find the category and insert the generic image for that category

$event_start_time = get_field("event_start_time", get_the_ID());
$show_end_date = get_field("show_end_date", get_the_ID());
$event_end_time = get_field("event_end_time", get_the_ID());
$event_description = get_field("card_description", get_the_ID());
$event_title = get_field("card_title", get_the_ID());
$event_subhead = get_field("event_subhead", get_the_ID());
$event_location = get_field("event_location", get_the_ID());

$event_time = apstyle_event_date($event_start_time, $event_end_time, $show_end_date);

?>


<div class="card card-event">
	<?php
	if ($no_featured_image == 'missing') { // post has no featured image, so using generic image
	?>
		<img class="card-img-top" src="<?php echo $thumb_url; ?>" alt="" />
	<?php
	} elseif ($no_featured_image == '') {
		echo wp_get_attachment_image($thumb_id, 'medium', '', ['class' => 'card-img-top']);
	}
	?>
	<div class="card-header">
		<h3 class="card-title">
			<?php
			if ($event_title) {
				echo $event_title;
			} else the_title();
			?>
		</h3>
	</div>
	<div class="card-body">
		<p class="card-text">
			<?php
			if ($event_description) {
				echo $event_description;
			} else the_content();
			?>
		</p>
	</div>
	<div class="card-event-details">
		<div class="card-event-icons">
			<div><svg class="svg-inline--fa fa-calendar fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
					<path fill="currentColor" d="M12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm436-44v-36c0-26.5-21.5-48-48-48h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v36c0 6.6 5.4 12 12 12h424c6.6 0 12-5.4 12-12z"></path>
				</svg>
			</div>
			<div>

				<?php
				echo $event_time;
				?>
			</div>
		</div>
		<div class="card-event-icons">
			<div><svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
					<path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path>
				</svg><!-- <i class="fas fa-map-marker-alt"></i> Font Awesome fontawesome.com -->
			</div>
			<div>
				<?php echo $event_location; ?>
			</div>
		</div>
	</div>
	<div class="card-link">
		<a href="<?php the_permalink(); ?>">More Information</a>
	</div>
	<!-- <div class="card-tags">
		<?php
		// get custom categories
		$terms = wp_get_post_terms($post->ID, 'kinds');
		foreach ($terms as $term) {
			$term_link = get_term_link($term);
			echo '<a class="btn btn-tag btn-tag-alt-white" href="' . $term_link . '">' . $term->name . '</a>' . ' ';
		}
		?>
	</div> -->
</div>