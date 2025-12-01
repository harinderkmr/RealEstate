<?php
/**
 * Template Name: accessibility
 */
    get_header();
?>
<section class="sec content small-container services-page">
    <div class="container-sm container-xs">
        <div class="row justify-content-center">
            <div >
            <h1 class="sport-med">
                    <?= get_field('page_heading'); ?>
                </h1>
                <p class="fw-light">
                    <?php echo get_field('page_content'); ?>
                </p>
                <div class="fw-light" >
                    <?php echo get_field('accomodation'); ?>
                </div>
            </div>
     </div>
    </div>
</section>
<?php get_footer(); ?>