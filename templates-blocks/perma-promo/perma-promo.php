<div class="container">
    <div class="row">
        <?php

        $args = array(
            'post_type' => 'pressreleases',
            'order' => 'DESC',
            'topic' => 'perma-promo',
            'posts_per_page' => 1
        );

        $wp_query = new WP_Query($args);

        if ($wp_query->have_posts()) {

            while ($wp_query->have_posts()) {

                $wp_query->the_post();

                echo the_title();
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