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
	$thumb_url = get_stylesheet_directory_uri() . '/img/generic-pressrelease-image.jpg';
	$no_featured_image = 'missing';
}

$card_description = get_field("card_description", get_the_ID());
$card_title = get_field("card_title", get_the_ID());

// $publication_date = apstyle_post_date(get_the_date('l'), get_the_date('j'), get_the_date('m'), get_the_date('Y'));
?>



<div class="card card-story" id="post-<?php the_ID(); ?>">
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
</div>