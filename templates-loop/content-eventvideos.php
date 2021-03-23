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
    the_title('<h1 class="article">', '</h1>');}
?>

		<div class="entry-meta">
			
<?php
	// Fancy-pants AP Style
	$event_date = get_field( "event_date" );

	$day = substr($event_date, 0, 2);
	$month = substr($event_date, 3, 2);
	$year = substr($event_date, 6, 4);

	if ($month=='01') :
        $apmonth = 'Jan. ';
    elseif ($month=='02') :
        $apmonth = 'Feb. ';
	elseif ($month=='03') :
		$apmonth = 'March ';
	elseif ($month=='04') :
		$apmonth = 'April ';
	elseif ($month=='05') :
		$apmonth = 'May ';
	elseif ($month=='06') :
		$apmonth = 'June ';
	elseif ($month=='07') :
		$apmonth = 'July ';
    elseif ($month=='08') :
        $apmonth = 'Aug. ';
    elseif ($month=='09') :
        $apmonth = 'Sept. ';
    elseif ($month=='10') :
        $apmonth = 'Oct. ';
    elseif ($month=='11') :
        $apmonth = 'Nov. ';
    elseif ($month=='12') :
        $apmonth = 'Dec. ';
    endif;

		echo $apmonth . ' ' . $day . ', ' . $year;

			?>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail($post->ID, 'large'); ?>

	<div class="entry-content">

		<?php the_content();?>

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
