<?php

// Template Name: Migraine(BotoxTM)

get_header();
?>

<section class="sec content small-container margine-heading ">
    <div class="container-sm container-xs">
        <?php if (have_rows('content')) : while (have_rows('content')) : the_row(); ?>
        <?= get_field('sub_heading'); ?>
            <div class="margine-page">
                <?= get_field('_description_'); ?>
                <?=  get_sub_field('content_heading'); ?>
                <?php echo get_sub_field('content_description'); ?>    
            </div>
        <?php endwhile;
        endif; ?>
    </div>   
</section>

<?php
get_footer();
?>