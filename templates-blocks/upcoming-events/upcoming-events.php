<div class="container pt-md-6 pt-sm-3">
    <div class="row">
        <div class="col-sm-8">
            <h2>Events</h2>
        </div>
        <div class="col-sm-4 pt-md-6 pt-sm-3">
            <p style="text-align: right;"><a href="/events">See more events</a></p>
        </div>
    </div>
    <div class="row">
        <?php

        // the query is filtered in /inc/custom-sort.php
        // sending 'block' to be able to catch this particular query
        $args = array(
            'block' => 'upcoming-events',
            'post_type' => 'events',
        );
        

        $wp_query = new WP_Query($args);

        if ($wp_query->have_posts()) {

            while ($wp_query->have_posts()) {
                echo '<div class="col-md-4">';
                $wp_query->the_post();

                get_template_part('templates-loop/content', 'events-vertical');
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