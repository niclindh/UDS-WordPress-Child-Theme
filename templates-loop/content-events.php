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
			<div class="col-md-7">
				<?php
			wptexturize(the_title('<h2>', '</h2>'));
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

			echo 'START:' . $event_start_time . '<br />';
			echo 'SHOW END:' . $show_end_date . '<br />';
			echo 'END:' . $event_end_time . '<br />';
			echo 'SUBHEAD:' . $event_subhead . '<br />';
			echo 'LOCATION:' . $event_location . '<br />';

			//echo '<i class="fa fa-calendar" aria-hidden="true"></i> ' . $event_start_time . ' - ' . $event_end_time;
			//echo $apmonth . ' ' . $day . ', ' . $year;

			?>

	<div class="entry-content">

		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<p style="font-weight: bold;"><i class="fa fa-calendar" aria-hidden="true"></i> Date and Time:</p>
					<?php
					echo $event_start_time . ' - ' . $event_end_time;
					?>

				</div>
				<div class="col-md-4">
					<p style="font-weight: bold;"><i class="fa fa-map-marker-alt" aria-hidden="true"></i> Location:</p>
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
					<img class="img-fluid" src="<?php echo $thumb_url; ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>">
				</div>
			</div>
		</div>

		<?php
		echo '<h4>' . $event_subhead . '</h4>';
		the_content();
		echo $event_location;

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