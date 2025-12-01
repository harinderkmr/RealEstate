<?php 
/**
 * Template Name: sports medicine
 */
 get_header();
?>

<section class="sec content small-container  services-page">
    <div class="container-sm container-xs">
                <?= get_field('page_heading'); ?>
               <?php echo get_field('content');  ?> 

                <ul class="list-unstyled px-1 px-md-1">
                      <?php echo get_field('neurology-repeater'); ?> 
                    <!-- Page Description -->
                    <?php echo  get_field('description'); ?>

                </ul>
        </div>
    </div>
</section>

<?php get_footer();
?>