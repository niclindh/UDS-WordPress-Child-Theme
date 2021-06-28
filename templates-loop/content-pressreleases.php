<?php

/**
 * Single post partial template
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<!-- 
<h3>HERO IMAGE</h3>
<p>yoast</p>
<h1 class="article"><?php the_title(); ?></h1> -->

<section class="uds-story-hero">
	<img class="hero" src="https://source.unsplash.com/random/1920x512" alt="Be sure to include alt text in your image tag.">
	<div class="content">
		<nav aria-label="breadcrumbs">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item"><a href="#">Second Nav Item</a></li>
				<li class="breadcrumb-item active" aria-current="page">Current Page</li>
			</ol>
		</nav>
		<h1 class="article">ASU is measured not by whom we exclude, but rather by whom we include and how they succeed.</h1>
	</div>
</section>


<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">



		<?php
		// Fancy-pants AP Style
		$release_date = apstyle_post_date(get_the_date('l'), get_the_date('j'), get_the_date('m'), get_the_date('Y'));
		echo $release_date;
		?>

		<div class="entry-meta">

			<?php

			// 18 means no time before 10, 19 time after
			// useful for processing ap style dates
			//echo 'LENGTH: ' . strlen($event_start_time);

			// echo 'START:' . $event_start_time . '<br />';
			// echo 'SHOW END:' . $show_end_date . '<br />';
			// echo 'END:' . $event_end_time . '<br />';
			// echo 'SUBHEAD:' . $event_subhead . '<br />';
			// echo 'LOCATION:' . $event_location . '<br />';

			// Fancy-pants AP Style  

			// $day = substr($event_date, 0, 2);
			// $month = substr($event_date, 3, 2);
			// $year = substr($event_date, 6, 4);

			// switch ($month) {
			// 	case '01':
			// 		$apmonth = 'Jan. ';
			// 		break;
			// 	case '02':
			// 		$apmonth = 'Feb. ';
			// 		break;
			// 	case '03':
			// 		$apmonth = 'March ';
			// 		break;
			// 	case '04':
			// 		$apmonth = 'April ';
			// 	break;
			// 	case '05':
			// 		$apmonth = 'May ';
			// 		break;
			// 	case '06':
			// 		$apmonth = 'June ';
			// 		break;
			// 	case '07':
			// 		$apmonth = 'July ';
			// 		break;
			// 	case '08':
			// 		$apmonth = 'Aug. ';
			// 		break;
			// 	case '09':
			// 		$apmonth = 'Sept. ';
			// 		break;
			// 	case '10':
			// 		$apmonth = 'Oct. ';
			// 		break;
			// 	case '11':
			// 		$apmonth = 'Nov. ';
			// 		break;
			// 	case '12':
			// 		$apmonth = 'Dec. ';
			// 		break;						
			// }

			// // drop leading zero on the day
			// if (substr($day, 0, 1) == '0') {
			// 	$day = substr($day, 1,1);
			// }

			// echo 'START:' . $event_start_time . '<br />';
			// echo 'SHOW END:' . $show_end_date . '<br />';
			// echo 'END:' . $event_end_time . '<br />';
			// echo 'SUBHEAD:' . $event_subhead . '<br />';
			// echo 'LOCATION:' . $event_location . '<br />';


			//echo $apmonth . ' ' . $day . ', ' . $year;



			?>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<!-- <?php echo get_the_post_thumbnail($post->ID, 'large', array('class' => 'img-fluid')); ?> -->

	<div class="entry-content">

		<?php
		the_content();
		?>


		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __('Pages:', 'uds-wordpress-theme'),
				'after' => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php uds_wp_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->