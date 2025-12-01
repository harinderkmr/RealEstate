<?php

/**
 * Template Name: Privacy
 */
get_header();
?>

<section class="sec content small-container services-page ">
    <div class="container-sm container-xs">
        <div class="row justify-content-center">
            <?= get_field('heading'); ?> 
            <h6 class=" text-center">The Ability Clinic is strongly committed to protecting the privacy of its <a href="/privacy">patients</a> and website <a href="/privacy">visitors</a>.</h6>
            <?php if (have_rows('privacy_content_repeater')) :
                while (have_rows('privacy_content_repeater')) : the_row(); ?>
                    <h6 class="mt-2"><?php echo get_sub_field('privacy_title'); ?></h6>
                    <p class="fw-light"> <?php echo get_sub_field('privacy_content') ?> </p>
            <?php endwhile;
            endif; ?>
        </div>
    </div>
</section>


<section class="sec content small-container pt-3">
    <div class="container-sm container-xs">
        <div class="row justify-content-center">
            <p class="fw-bold" style="color:orange">Contact us if:</p>
            <div class="row">
                <div class="col-md">
                    <ul>
                        <li class="fw-light">You would like more information about our information practices</li>
                        <li class="fw-light">You have any privacy related questions and/or complaints</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>





<?php get_footer(); ?>