<?php

/**
 * Displays the story hero image or background color on the top of a post.
 * Should always return some kind of formatting based on the default settings within ACF.
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

/**
 * Determine if the user has chosen a background color or an image.
 */
$bgchoice = get_field('uds_story_hero_background_choice');
$hero_size = get_field('uds_story_hero_background_image_size');

// Build initial section tag with correct hero size.
$section_open = '<section class="uds-story-hero entry-header';
$section_close = '">';

if ('large' === $hero_size) {
	$section_open .= ' uds-story-hero-lg';
}

if ('image' === $bgchoice) {

	echo $section_open . $section_close;

	$bgimage = get_field('uds_story_hero_background_image');
	if (!empty($bgimage)) {
		echo '<img class="hero" src="' . esc_url($bgimage['url']) . '" alt="' . esc_attr($bgimage['alt']) . '" />';
	}
} else {

	// 'color' === $bgchoice
	$bgcolor = get_field('uds_story_hero_background_color');

	if (!empty($bgcolor)) {

		echo $section_open . ' no-image ' . $bgcolor . $section_close;
	} else {

		// This should never really be possible given a default ACF control value.
		echo $section_open . $section_close;
	}
}

// Return the rest of the section.
?>

<div class="content">

	<?php
	// Handmade breadcrumbs to avoid the issue with the year in the path becoming a hyperlink to nowhere
	?>

	<nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs" itemprop="breadcrumb">
		<ol class="breadcrumb bg-white" itemscope="" itemtype="https://schema.org/BreadcrumbList">
			<li class="breadcrumb-item breadcrumb-item--home" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"><a href="/" itemprop="item"><span itemprop="name">Home</span></a>
				<meta itemprop="position" content="1" />
			</li>
			<li class="breadcrumb-item breadcrumb-item--post" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"><a href="/news/" itemprop="item"><span itemprop="name">News</span></a>
				<meta itemprop="position" content="2" />
			</li>
			<li class="breadcrumb-item breadcrumb-item--post" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"><span itemprop="item"><span itemprop="name"><?php the_title(); ?></span></span>
				<meta itemprop="position" content="3" />
			</li>
		</ol>
	</nav>

	<?php the_title('<h1 class="article entry-title">', '</h1>'); ?>

	<p><i>
			<?php
			echo apstyle_post_date(get_the_date('l'), get_the_date('j'), get_the_date('m'), get_the_date('Y'));
			?>
		</i></p>

	<?php
	include get_stylesheet_directory() . '/inc/social-share.php';
	?>

</div>
</section>