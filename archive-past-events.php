<?php
/**
 * Template Name: Past events
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
					'posts_per_page' => 2,
					'paged' => $paged,
                    'post_type' => 'events',
                    'orderby' => 'meta_value',
                    'meta_key' => 'event_start_time',
                    'order' => 'ASC',
					// 'meta_value'   => date('Ymd'),
					// 'meta_type' => 'datetime',
					// 'meta_compare' => '<='
					'meta_query' => array(
						array(
							'key' => 'event_start_time',
							'compare' => '<=',
							'value'   => date('Ymd'),
							'type'    => 'datetime',
						)
					) );  
            
            $past = new WP_Query($args);
			

				?>
				<header class="page-header">

                <h1 class="article">Past Cronkite events</h1>

                <p><strong>Paragraph about why you should care.</strong> Skateboard sriracha jean shorts, mlkshk 3 wolf moon prism gluten-free. Asymmetrical drinking vinegar palo santo vinyl, 90's ennui single-origin coffee pinterest bespoke listicle organic meggings la croix. Pabst bitters polaroid franzen, readymade pok pok copper mug semiotics lumbersexual fashion axe af. Messenger bag polaroid DIY woke tbh, literally paleo gastropub tofu kinfolk hot chicken poutine intelligentsia.</p>

				</header><!-- .page-header -->

				<?php

if ( $past->have_posts() ) {

                //var_dump($past);
                // echo 'xx';
				while ( $past->have_posts() ) {
                    
					$past->the_post();
                    

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