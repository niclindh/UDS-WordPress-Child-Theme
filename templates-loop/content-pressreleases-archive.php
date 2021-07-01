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

$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'large', false);
$thumb_url = $thumb_url_array[0];

// somebody forgot to add a thumbnail and should feel bad about themselves
if ($thumb_url == '') {
	$thumb_url = get_stylesheet_directory_uri() . '/img/generic-pressrelease-image.jpg';
}

$card_description = get_field("card_description");
$card_title = get_field("card_title");

$publication_date = apstyle_post_date(get_the_date('l'), get_the_date('j'), get_the_date('m'), get_the_date('Y'));
?>


<div class="col col-12 col-md-6 col-lg-4 mb-4">

	<div class="card card-story" id="post-<?php the_ID(); ?>" >
		<img class="card-img-top" src="<?php echo $thumb_url; ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>">
		<div class="card-content-wrapper">
			<div class="card-header">
				<h3 class="card-title">
					<?php
					if ($card_title) {
						echo $card_title;
					} else the_title();
					?></h3>
			</div>
			<div class="card-body">
				<p class="card-text">
					<?php echo $card_description; ?>
				</p>
			</div>
			<div class="card-link">
				<a href="<?php the_permalink(); ?>">Read more</a>
			</div>

		</div> <!-- close horizontal content -->
	</div>
</div>
