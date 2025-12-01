<?php

// Template Name: Dexa 

get_header();
?>

<section class="sec content small-container services-page">
    <div class="container-sm container-xs">
        <?php if (have_rows('content')) : while (have_rows('content')) : the_row(); ?>
            <?= get_field('sub_heading'); ?>
            <?= get_field('_description_'); ?>        
            <?php echo get_sub_field('content_description'); ?>   
        <?php endwhile;
        endif; ?>
    </div>    
</section>

<?php
get_footer();
?>