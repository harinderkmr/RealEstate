<?php
/**
 * Template Name: Blog Template
 */
 get_header(); 
?>


<section class="sec content section-blog-wrapper small-container services-page">
    <div class="container-sm container-xs">
        <div class="row justify-content-center">
            <div class="">
                    <?= get_field('page_heading'); ?>
                    <?php echo get_field('page_content'); ?>
                <?php
                    $img = get_field('page_image');
                    if ( $img ) : ?>
                        <div class="image-placement text-center">
                            <img class="w-100 img-fluid" src="<?php echo $img; ?>" alt="Page Image">
                        </div>
                    <?php endif; ?>

           
                    <?php if (have_rows('page_faq_repeater')) :
                        while (have_rows('page_faq_repeater')) : the_row(); ?>
                             <?php echo get_sub_field('page_question') ?>
                            <?php echo get_sub_field('page_answer'); ?>
                           
                        <?php endwhile; ?>
                    <?php endif; ?>
                
            </div>
        </div>
    </div>
</section>


<?php get_footer( ); ?>
