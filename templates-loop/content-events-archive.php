<?php

/**
 * Single post partial template
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<h3 style="padding-top: 2rem;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>


		<div class="entry-meta">

			<?php
			// Fancy-pants AP Style
			// $event_date = get_field( "event_date" );

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

			$event_start_time = get_field("event_start_time");
			$show_end_date = get_field("show_end_date");
			$event_end_time = get_field("event_end_time");
			//$event_subhead = get_field( "event_subhead" );
			//$event_location = get_field( "event_location" );  

			echo '<i class="fa fa-calendar" aria-hidden="true"></i> ' . $event_start_time . ' - ' . $event_end_time;

			//echo 'DATE: ' . date('d-m-Y');

			?>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="row">
			<div class="col-md-8">
				<?php
				echo '<h3>' . $event_subhead . '</h3>';
				the_content(); ?>
			</div>
			<div class="col-md-4">

			</div>
		</div>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __('Pages:', 'uds-wordpress-theme'),
				'after' => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->



</article><!-- #post-## -->