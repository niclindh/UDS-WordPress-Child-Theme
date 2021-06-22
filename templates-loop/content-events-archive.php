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
if (!function_exists('apstyle_event_date')) {
function apstyle_event_date($event_date) {

	// echo 'DATE: ' . $event_date . '<br />';

	$day_of_week = DateTime::createFromFormat('d/m/Y g:i a', $event_date)->format('l');
	
	$day = substr($event_date, 0, 2);
	$month = substr($event_date, 3, 2);
	$year = substr($event_date, 6, 4);
	$hour = substr($event_date, 11, 8);
	
	// drop leading zero on the day
	if (substr($day, 0, 1) == '0') {
		$day = substr($day, 1,1);
	}
	
	// use a.m. and p.m. like civilized humans
	$hour = str_replace('pm', 'p.m.', $hour);
	$hour = str_replace('am', 'a.m.', $hour);
	
	// change 12 a.m. to midnight
	if ($hour == '12:00 a.m.') {
		$hour = 'Midnight';
	}

	// strip :00 from hours
	$hour = str_replace(':00', '', $hour);

	switch ($month) {
		case '01':
			$month = 'Jan. ';
			break;
		case '02':
			$month = 'Feb. ';
			break;
		case '03':
			$month = 'March ';
			break;
		case '04':
			$month = 'April ';
		break;
		case '05':
			$month = 'May ';
			break;
		case '06':
			$month = 'June ';
			break;
		case '07':
			$month = 'July ';
			break;
		case '08':
			$month = 'Aug. ';
			break;
		case '09':
			$month = 'Sept. ';
			break;
		case '10':
			$month = 'Oct. ';
			break;
		case '11':
			$month = 'Nov. ';
			break;
		case '12':
			$month = 'Dec. ';
			break;						
	}
	
	$currentyear = date("Y");
	
	// dont't print the year if same as current
	if ($currentyear == $year) {
		$year = '';
	}
	
	// only print year if different than current year
	if ($year) {
	$event_formatted = $month . ' ' . $day . ', ' . $year;
	}
	
	else {
		$event_formatted = $month . ' ' . $day;
	}
	
	return $the_event = array(
		'date' => $event_formatted,
		'time' => $hour,
		'weekday' => $day_of_week
	);

	}
}

?>


<?php

$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'large', true);
$thumb_url = $thumb_url_array[0];

// TODO code to check for featured image and if it doesn't exist find the category and insert the generic image for that category

// echo 'IMAGE: ' . $thumb_url;

$event_start_time = get_field("event_start_time");
$show_end_date = get_field("show_end_date");
$event_end_time = get_field("event_end_time");
$event_description = get_field("card_description");
$event_title = get_field("card_title");
$event_subhead = get_field("event_subhead");
$event_location = get_field("event_location");


// get AP Style array
// 'date', 'time', 'weekday'
$event_start_date = apstyle_event_date(get_field( "event_start_time" ));
if (get_field( "event_end_time" )) {
	$event_end_date = apstyle_event_date(get_field( "event_end_time" ));
}

// Get the times and offsets
$start_pm = strpos($event_start_date['time'], 'p.m.'); 
$end_pm = strpos($event_end_date['time'], 'p.m.');
$start_am = strpos($event_start_date['time'], 'a.m.'); 
$end_am = strpos($event_end_date['time'], 'a.m.');

// echo 'START: ' . $event_start_date['date'];
// echo '<br />END: ' . $event_end_date['date'];

// TODO figure out how to handle midnight

// if end time is not shown
if (!$show_end_date) {
	$event_time = $event_start_date['weekday'] . ', ' . $event_start_date['date'] . ' at ' . $event_start_date['time'];
}

// if end time is shown
if ($show_end_date) {

	if ($event_start_date['date'] != $event_end_date['date']) {
		$event_time = $event_start_date['weekday'] . ', ' . $event_start_date['date'] . ' at ' . $event_start_date['time'] . ' to ' . $event_end_date['weekday'] . ', ' . $event_end_date['date'] . ' at ' . $event_end_date['time'];
	}

	// p.m. event
	elseif ($start_pm !== false && $end_pm !== false) { 
		if ($event_start_date['time'] == '12 p.m.') {
			$start_it = 'Noon';
		}
		else {
			$start_it = substr($event_start_date['time'], 0, ($start_pm - 1));
		}
		$event_time = $event_start_date['weekday'] . ', ' . $event_start_date['date'] . ', ' . $start_it . ' - ' . $event_end_date['time'];
		// echo 'TIME: ' . $event_time;
	}

	// a.m. event
	elseif ($start_am !== false && $end_am !== false) { 
		$event_time = $event_start_date['weekday'] . ', ' . $event_start_date['date'] . ', ' . substr($event_start_date['time'], 0, ($start_am - 1)) . ' - ' . $event_end_date['time'];
		// echo 'TIME: ' . $event_time;
	}

	elseif ($start_am !==false && $end_pm !== false) {
		$event_time = $event_start_date['weekday'] . ', ' . $event_start_date['date'] . ', ' . $event_start_date['time'] . ' - ' . $event_end_date['time'];
		// echo 'xTIME: ' . $event_time;
	}


}


?>

<div class="pb-md-6 pb-sm-3">
	<div class="card card-event card-horizontal">
		<img class="card-img-top" src="<?php echo $thumb_url; ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>">
		<div class="card-content-wrapper">
			<div class="card-header">
				<h3 class="card-title">
					<?php
					if ($event_title) {
						echo $event_title;
					} else the_title();
					?></h3>
			</div>
			<div class="card-body">
				<p class="card-text">
					<?php
					if ($event_description) {
						echo $event_description;
					} else the_content();
					?>
				</p>
			</div>

			<div class="row">
				<div class="col-6">
					<div class="card-event-details">
						<div class="card-event-icons">
							<div><svg class="svg-inline--fa fa-calendar fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
									<path fill="currentColor" d="M12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm436-44v-36c0-26.5-21.5-48-48-48h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v36c0 6.6 5.4 12 12 12h424c6.6 0 12-5.4 12-12z"></path>
								</svg>
							</div>
							<div>

								<?php
								// TODO AP Style dates
								echo $event_time;
								?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="card-event-details">
						<div class="card-event-icons">
							<div><svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
									<path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path>
								</svg><!-- <i class="fas fa-map-marker-alt"></i> Font Awesome fontawesome.com -->
							</div>
							<div><?php echo $event_location; ?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-link">
				<a href="<?php the_permalink(); ?>">More Information</a>
			</div>
			<div class="card-tags">
				<?php
				// get custom categories
				$terms = wp_get_post_terms($post->ID, 'kinds');
				foreach ($terms as $term) {
					$term_link = get_term_link($term);
					echo '<a class="btn btn-tag btn-tag-alt-white" href="' . $term_link . '">' . $term->name . '</a>' . ' ';
				}
				?>
			</div>
		</div> <!-- close horizontal content -->
	</div>
</div>