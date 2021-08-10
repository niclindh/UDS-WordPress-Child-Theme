<?php

/**
 * UDS Content Sections: Cronkite Image
 *
 * @package UDS WordPress Theme
 */

$caption = get_field('cs_caption');

// Get our image data from the array provided by ACF.
$image_url = '';
$image_alt = '';

$image_data = get_field('cs_image');

if (!empty($image_data)) {
	$image_id = $image_data['id'];
}

// If additional classes were requested, clean up the input and add them.
$additional_classes = '';
if (isset($block['className']) && !empty($block['className'])) {
	$additional_classes = trim(sanitize_text_field($block['className']));
}
$classes .= $additional_classes;
?>

<div class="wp-block-image uds-img <?php echo $classes; ?>">
	<figure class="figure uds-figure">
		<?php echo wp_get_attachment_image($image_id, 'full', '', ['class' => 'uds-img figure-img img-fluid']); ?>
		<figcaption class="figure-caption uds-figure-caption">
			<span class="uds-caption-text">
				<?php echo $caption; ?>
			</span>
		</figcaption>
	</figure>
</div>