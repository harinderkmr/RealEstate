<?php

/**
 * Template Name: hip 
 */

get_header();
?>


<section class="content section-blog-wrapper small-container services-page">
  <div class="container-sm container-xs">
        <div class="row justify-content-center">
        <h1 class="sport-med ">
                    <?= get_field('page_heading'); ?>
                </h1>
                <ul class="mb-5">
                    <?php if (have_rows('button_repeater')) :
                        while (have_rows('button_repeater')) : the_row(); ?>
                            <?php $button = get_sub_field('section_link'); ?>
                            <li class="fs-4">
                                <a class="fw-light text-xl" href="<?php echo esc_url($button['url']); ?>"><?php echo esc_html($button['title']); ?></a>
                            </li>
                        <?php endwhile; ?>
                    <?php endif ?>
                </ul>
                <div class="image-placement text-center">
                    <img class="w-100" src="<?php echo get_field('page_image'); ?>" alt="Page Image">
                </div>
            
        </div>
    </div>
</section>
<?php $number = 1;
if (have_rows('exercise_repeater')) :
    while (have_rows('exercise_repeater')) : the_row(); ?>
        <section id="heading<?php echo $number; ?>" class="pad-scroll  pb-4">
            <div class="bgblue py-4 text-center">
                <h2 class="fs-2 lh-1 mb-0 text-white"><?php echo get_sub_field('exercise_heading') ?></h2>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <?php if (have_rows('exercise_image_repeater')) :
                        while (have_rows('exercise_image_repeater')) : the_row(); ?>
                            <div class="col-md-3 align-items-center d-flex flex-column justify-content-end mt-5">
                                <div class="align-items-end d-flex img justify-content-center mb-2" style="width:240px">
                                    <img class="img-fluid" src="<?php echo get_sub_field('exercise_image')['url']  ?>" alt="<?php echo get_sub_field('exercise_image')['alt']  ?>" />
                                </div>
                                <p><?php echo get_sub_field('exercise_name') ?></p>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php $number++;
    endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>