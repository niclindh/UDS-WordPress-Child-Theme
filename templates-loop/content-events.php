<?php
/**
 * Single post partial template
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<article <?php post_class();?> id="post-<?php the_ID();?>">

	<header class="entry-header">

		<?php
if (!get_field('hide_page_title')) {
    wptexturize(the_title('<h1 class="article">', '</h1>'));}
?>

		<div class="entry-meta">
			
<?php

$event_start_time = get_field( "event_start_time" );
$show_end_date = get_field( "show_end_date" );
$event_end_time = get_field( "event_end_time" );
$event_subhead = get_field( "event_subhead" );
$event_location = get_field( "event_location" );  

echo 'LENGTH: ' . strlen($event_start_time);
//echo 'DEBUG: ' . var_dump($event_start_time);

echo 'START:' . $event_start_time . '<br />';
echo 'SHOW END:' . $show_end_date . '<br />';
echo 'END:' . $event_end_time . '<br />';
echo 'SUBHEAD:' . $event_subhead . '<br />';
echo 'LOCATION:' . $event_location . '<br />';

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



	echo '<i class="fa fa-calendar" aria-hidden="true"></i> ';
	//echo $apmonth . ' ' . $day . ', ' . $year;



			?>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail($post->ID, 'large'); ?>

	<div class="entry-content">

		<?php 
        echo 'THE CONTENT: ';
        the_content();?>

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

		<?php uds_wp_entry_footer();?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
