<?php

/**
 * UDS Content Sections: Cronkite Image Overlap News
 *
 * @package UDS WordPress Theme
 */

$slug = get_field('cs_topic_slug');
$orientation = get_field('cs_image_orientation');

$no_featured_image = '';

// If additional classes were requested, clean up the input and add them.
$additional_classes = '';
if (isset($block['className']) && !empty($block['className'])) {
	$additional_classes = trim(sanitize_text_field($block['className']));
}

$args = array(
	'post_type' => 'pressreleases',
	'order' => 'DESC',
	'topics' => $slug,
	'posts_per_page' => 1
);

$wp_query = new WP_Query($args);

if ($wp_query->have_posts()) {

	while ($wp_query->have_posts()) {

		$wp_query->the_post();

		$thumb_id = get_post_thumbnail_id();
		$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'medium', false);
		$thumb_url = $thumb_url_array[0];

		// somebody forgot to add a thumbnail and should feel bad about themselves
		if ($thumb_url == '') {
			$thumb_url = get_stylesheet_directory_uri() . '/img/generic-pressrelease-image.jpg';
			$no_featured_image = 'missing';
		}

		$card_description = get_field("card_description", get_the_ID());
		$card_title = get_field("card_title", get_the_ID());
	}
}
// Combine the base, orientation, and advanced classes into one string.
$classes = 'uds-image-overlap ';

if ('right' === $orientation) {
	$classes .= 'content-left ';
}

$classes .= $additional_classes;

?>

<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="<?php echo $classes; ?>">
				<?php
				if ($no_featured_image == 'missing') { // post has no featured image, so using generic image
				?>
					<img class="img-fluid" src="<?php echo $thumb_url; ?>" alt="" />
				<?php
				} elseif ($no_featured_image == '') {
					echo wp_get_attachment_image($thumb_id, 'medium', '', ['class' => 'img-fluid']);
				}
				?>
				<div class="content-wrapper">
					<h3><span class="highlight-gold"><?php if ($card_title) {
															echo $card_title;
														} else the_title(); ?></span></h3>
					<p><?php echo $card_description; ?></p>
					<p><a href="<?php the_permalink(); ?>">Read more</a></p>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
?>