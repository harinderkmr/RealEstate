<section class="latest-property-news py-5">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2>Our Latest Property News</h2>
            <p>There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some</p>
        </div>

        <div class="row">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3
            );
            $latest_posts = new WP_Query($args);

            if ($latest_posts->have_posts()) :
                while ($latest_posts->have_posts()) : $latest_posts->the_post();
                    $categories = get_the_category();
                    $category_name = !empty($categories) ? $categories[0]->name : '';
            ?>
                <div class="col-md-4 mb-4">
                    <div class="news-card card border-0 shadow-sm h-100">
                        <div class="position-relative">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium_large', ['class' => 'card-img-top']); ?>
                            <?php endif; ?>
                            <div class="news-date  bg-success text-white px-3 py-2 text-center">
                                <strong><?php echo get_the_date('d'); ?></strong><br>
                                <small><?php echo get_the_date('F'); ?></small>
                            </div>
                        </div>
                        <div class="card-body">
                            <small class="text-success cat "><?php echo esc_html($category_name); ?></small>
                            <h5 class="card-title mt-2"><?php the_title(); ?></h5>
                            <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
                        </div>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p class="text-center">No news found.</p>';
            endif;
            ?>
        </div>

        <div class="text-center mt-4">
            <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn btn-green">See All Cities</a>
        </div>
    </div>
</section>
