<div class="container">
    <div class="row">
        <?php

        $args = array(
            'post_type' => 'pressreleases',
            'order' => 'DESC',
            'topics' => 'perma-promo',
            'posts_per_page' => 1
        );

        $wp_query = new WP_Query($args);

        if ($wp_query->have_posts()) {

            while ($wp_query->have_posts()) {

                $wp_query->the_post();

                $thumb_id = get_post_thumbnail_id();
                $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'large', false);
                $thumb_url = $thumb_url_array[0];

                // somebody forgot to add a thumbnail and should feel bad about themselves
                if ($thumb_url == '') {
                    $thumb_url = get_stylesheet_directory_uri() . '/img/generic-pressrelease-image.jpg';
                }

                $card_description = get_field("card_description", get_the_ID());

                ?>
<div class="container-fluid bg network-black mt-md-6 mt-sm-3 pt-md-6 pt-sm-3 pb-md-6 pb-sm-3">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="<?php the_permalink(); ?>">
                <img class="img-fluid" src="<?php echo $thumb_url; ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>"></a>
            </div>
            <div class="col-md-8">
                <h3><span class="highlight-gold"><?php the_title(); ?></span></h3>
                <h4 style="color: white;"><?php echo $card_description; ?></h4>
                <p> <a href="<?php the_permalink(); ?>" class="text-gold">Read story</a></p>
            </div>
        </div>
    </div>
</div>
                <?php
            }
        } else {
            get_template_part('templates-loop/content', 'none');
        }


        ?>

        <?php
        wp_reset_postdata();

        ?>


    </div>
</div>