<?php

/**
 * Template Name: self-massage
 */
get_header();
?>


<section class="content section-blog-wrapper small-container services-page">
  <div class="container-sm container-xs">
  <h1 class="sport-med  "> <?= get_field('page_heading'); ?> </h1>
        <!-- Page Repeater  -->
        <h2 class="fs-4"><?php echo get_field('page_content_heading') ?> </h2>

        <?php if(have_rows('page_content_repeater')):
            while( have_rows('page_content_repeater') ): the_row(); ?>
                <div>
                    <?php echo get_sub_field('page_content'); ?>
                </div>

                <div class="row align-items-end d-flex img justify-content-center">
                    <?php  if(have_rows('self_massage_repeater')):
                        while( have_rows( 'self_massage_repeater' ) ): the_row();?>
                            <div class="col-md-4 align-items-end d-flex img justify-content-center mb-2" >
                            <img class="img-fluid" src="<?php echo get_sub_field('massage_image')['url']; ?>" alt="<?php echo get_sub_field('massage_image')['alt']; ?>" />
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
</section>





<?php get_footer();
?>