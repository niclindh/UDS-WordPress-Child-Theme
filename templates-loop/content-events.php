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

			
			//echo $apmonth . ' ' . $day . ', ' . $year;

			?>

	<div class="entry-content">

		<div class="container pt-md-6 pt-sm-3">
			<div class="row">
				<div class="col-md-4">
					<h4><i class="fa fa-calendar" aria-hidden="true"></i> Date and Time:</h4>
					<?php
					echo $event_start_time . ' - ' . $event_end_time;
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

		<div class="container pt-md-6 pt-sm-3">
			<div class="row">
				<div class="col-md-10">
					<?php
						$thumb_id = get_post_thumbnail_id();
						$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'large', true);
						$thumb_url = $thumb_url_array[0];
?>
					<img class="img-fluid" style="width: 100%;" src="<?php echo $thumb_url; ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>">
				</div>
			</div>
		</div>

		<div class="container pt-md-6 pt-sm-3 pb-md-6 pb-sm-3">
			<div class="row">
				<div class="col-md-6">
					<?php
		echo '<h4>' . $event_subhead . '</h4>';
		the_content();
		?>


					<?php
		// get custom categories
		$terms = wp_get_post_terms($post->ID, 'kinds');
		foreach ($terms as $term) {
			$term_link = get_term_link($term);
			echo '<a class="btn btn-tag btn-tag-alt-white" href="' . $term_link . '">' . $term->name . '</a>' . ' ';
		}
		?>

				</div>
			</div>
			<div class="row  pt-md-6 pt-sm-3">
				<div class="col-md-4">
					DO WE WANT CONTACT INFORMATION?
				</div>
				<div class="col-md-8">
					<h4>Share this event:</h4>
					SHARE ICONS
				</div>
			</div>
		</div>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php uds_wp_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->