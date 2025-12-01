<?php
/**
 * Template Name: patient eduction
 */

    get_header();
?>

<section class="sec content">
    <div class="container mb-4">
        <div class="row mb-2 justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <h2 class="font-bold mb-4">
                    <?= get_field('page_heading'); ?>
                </h2>
                <p class="fs-4 fw-light mb-4">
                    <?php echo get_field('page_content'); ?>
                    <?php $button = get_field('page_content_link'); ?>
                    <a class="fw-light text-xl" href="<?php echo esc_url($button['url']); ?>">
                        <?php echo esc_html($button['title']); ?>
                    </a>
                </p>
                <div class="row">
                    <?php if (have_rows('services_repeater')) :
                        while (have_rows('services_repeater')) : the_row(); 
                            $buttons = get_sub_field('services_link'); ?>
                            <div class="col-md-4 mb-4">
                                <a class="fw-light text-xl text-decoration-none" href="<?php echo esc_url($buttons['url']); ?>" >
                                    <div class="align-items-end d-flex img justify-content-center">
                                        <img class="img-fluid" src="<?php echo esc_url(get_sub_field('services_image')); ?>" alt="<?php echo esc_url(get_sub_field('services_image')); ?>" />
                                    </div>
                                    <div class="bggray py-2 text-center">
                                        <p class="fs-5 lh-2 mb-0 fw-light">
                                            <?php echo esc_html(get_sub_field('services_name')); ?>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>


                <h2 class="fw-light">
                    <?php echo get_field('services_description'); ?>
                </h2>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>



