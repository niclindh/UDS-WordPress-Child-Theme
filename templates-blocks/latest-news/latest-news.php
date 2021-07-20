<div class="container pt-md-6 pt-sm-3">
    <div class="row">
        <div class="col-sm-8">
            <h2>News</h2>
        </div>
        <div class="col-sm-4 pt-md-6 pt-sm-3">
            <p style="text-align: right;"><a href="/news">Read more stories</a></p>
        </div>
    </div>
    <div class="row">
        <?php

        $args = array(
            'post_type' => 'pressreleases',
            'order' => 'DESC',
            'posts_per_page' => 3,
            'tax_query' => array(
                array(
                    'taxonomy'  => 'topics',
                    'field'     => 'slug',
                    'terms'     => 'perma-promo', // exclude perma-promo items
                    'operator'  => 'NOT IN')           
                    ),               
        );

        $wp_query = new WP_Query($args);

        if ($wp_query->have_posts()) {

            while ($wp_query->have_posts()) {
                echo '<div class="col-md-4">';
                $wp_query->the_post();

                get_template_part('templates-loop/content', 'pressreleases-archive');
                echo '</div>';
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