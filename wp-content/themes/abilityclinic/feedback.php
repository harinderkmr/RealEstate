<?php

/**
 * Template Name: Feedback
 */
get_header();
?>

<section class="margine-heading">
  <div class="container-fluid">
    <div class="heading line-through referral-head  mb-5 white d-flex justify-content-center">
        <?php $heading = get_field('heading'); ?>  
        <?php echo $heading; ?>
    </div>
    
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <?= get_field('sub_heading'); ?>
                <div class="form mt-5 mt-md-0">
                    <?php echo do_shortcode('[contact-form-7 id="49c2869" title="Referral Form"]'); ?>
                </div>
            </div>
        </div>
        <?= get_field('description'); ?>

       
    </div>
</section>


<?php get_footer(); ?>