<?php

/**
 * Template Name: stretching
 */
get_header();
?>


<section class="content section-blog-wrapper small-container services-page">
  <div class="container-sm container-xs">
  <h1 class="sport-med  "> <?= get_field('page_heading'); ?> </h1>
        <!-- Page Repeater  -->
        <h2 class="fs-4 fw-light"><?php echo get_field('page_heading_content_title'); ?></h2>
        <p class="fw-light" > <?php echo get_field('page_heading_content_paragraph'); ?> </p>

        <div class="row">
            <div class="col-md-8">
                <p class="fw-light">
                    <?php echo get_field('page_content'); ?>
                </p>
            </div>
            <div class="col-md-4 align-items-end d-flex img justify-content-center mb-5">
                <img class="img-fluid" src="<?php echo get_field('page_image');  ?>" alt="heat"/>
            </div>
        </div>

        <?php  if(have_rows('exercise_heading_repeater')):
            while( have_rows( 'exercise_heading_repeater' ) ): the_row();?>
                <h2 class="mt-2" ><?php  echo get_sub_field('exercise_heading_title_'); ?></h2>
                <p><?php echo get_sub_field('exercise_info_details'); ?></p>
                <?php  if(have_rows('exercise_image_repeater')):
                    while( have_rows( 'exercise_image_repeater' ) ): the_row();?>
                        <div class="align-items-end d-flex img justify-content-center mb-2" >
                        <img class="img-fluid" src="<?php echo esc_url(get_sub_field('exercise_image')['url']); ?>" alt="<?php echo esc_attr(get_sub_field('exercise_image')['alt']); ?>" />
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
</section>



<?php get_footer();
?>