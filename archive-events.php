<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="skip-to-content" <?php post_class( 'container' ); ?>>

	<div class="row">
		<div class="col">

			<?php
                // Start custom loop.
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $args = array(
					'posts_per_page' => 3,
					'paged' => $paged,
                    'post_type' => 'events',
                    'orderby' => 'meta_value',
                    'meta_key' => 'event_start_time',
                    'order' => 'DESC',
					'meta_value'   => date('Ymd'),
					'meta_type' => 'datetime',
					'meta_compare' => '>='

					// 'offset' => (max(1, get_query_var('paged')) - 1) * 2,
                    // 'meta_query', array(
                    //     array(
					// 		'key' => 'event_start_time',
					// 		'compare' => '<=',
					// 		'value'   => date('Ymd') . '00:00:00',
					// 		'type'    => 'DATETIME',
                    //     ))
                );

				// 		$query->set('orderby', 'meta_value');	
// 		$query->set('meta_key', 'event_start_time');	 
// 		$query->set('order', 'ASC');  
//         $query->set('meta_query', array(
//             array(
//                 'key' => 'event_start_time',
//                 'compare' => '>=',
//                 'value'   => date('Ymd'),
//                 'type'    => 'datetime',
//             )
                            
            
            $future = new WP_Query($args);
            //var_dump($past);
			if ( $future->have_posts() ) {

				?>
				<header class="page-header">

                <h1 class="article">Cronkite events</h1>

                <p><strong>Paragraph about the upcoming events.</strong> Skateboard sriracha jean shorts, mlkshk 3 wolf moon prism gluten-free. Asymmetrical drinking vinegar palo santo vinyl, 90's ennui single-origin coffee pinterest bespoke listicle organic meggings la croix. Pabst bitters polaroid franzen, readymade pok pok copper mug semiotics lumbersexual fashion axe af. Messenger bag polaroid DIY woke tbh, literally paleo gastropub tofu kinfolk hot chicken poutine intelligentsia.</p>

				</header><!-- .page-header -->

				<?php
				// Start the loop.
				//echo '<pre>' . var_dump($future) . '</pre>';
				while ( $future->have_posts() ) {
					$future->the_post();

					/*
					* Include the Post-Format-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Format name) and that will be used instead.
					*/
					get_template_part( 'templates-loop/content', 'events-archive' );

                    //echo 'HHHH ' . get_post_format();
				}
			} else {
				get_template_part( 'templates-loop/content', 'none' );
			}
			?>

		</div>
	</div>

	<div class="row">
		<div class="col">
			<!-- The pagination component -->
			<?php uds_wp_pagination(); ?>
		</div>
	</div>

</main><!-- #main -->

<?php
get_footer();
