<?php
/**
 * UDS Content Sections: Cronkite Image Overlap News
 *
 * @package UDS WordPress Theme
 */

$name = get_field('cs_name');
$title = get_field('cs_title');
$profile = get_field('cs_profile');

// Get our image data from the array provided by ACF.
$image_url = '';
$image_alt = '';

$image_data = get_field( 'cs_image' );

if ( ! empty( $image_data ) ) {
	$image_url = $image_data['url'];
	$image_alt = $image_data['alt'];
}

// If additional classes were requested, clean up the input and add them.
$additional_classes = '';
if ( isset( $block['className'] ) && ! empty( $block['className'] ) ) {
	$additional_classes = trim( sanitize_text_field( $block['className'] ) );
}
$classes .= $additional_classes;
?>

<div class="container <?php echo $classes; ?>">
	<div class="row">
		<div class="col-12">
			<div class="profile profile-type-standard">
				<div class="profile-row">
					<div class="profile-photo-column">
						<img class="pictureOriginal" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>"></div>
					<div class="profile-bio-column">
						<h3 class="profile-name"><?php echo $name; ?></h3>
						<div class="profile-title">
							<p class="titleOriginal"><?php echo $title; ?></p>
						</div>
						<div class="profile-contact-row">
							<?php
						while( have_rows('cs_contact') ): the_row(); 
							$contact_text = get_sub_field('cs_contact_text');
							$contact_link = get_sub_field('cs_contact_link');
						?>
						<div class="">
							<p><a class="linkOriginal" href="<?php echo $contact_link; ?>"><?php echo $contact_text; ?></a></p>
						</div>
						<?php
						endwhile;
						?>
						</div>
						<p><?php echo $profile; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>