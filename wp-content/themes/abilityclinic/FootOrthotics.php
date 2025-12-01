
<?php

// Template Name:Foot Orthotics

get_header();
?>

<section class="sec content section-blog-wrapper small-container services-page" >
            <div class="container-sm container-xs">  
                 <div class="row justify-content-center">
                       <?= get_field('heading'); ?>
                        <?= get_field('description'); ?>
                       <?= get_field('sub_heading'); ?>
                        <?= get_field('sub_description'); ?>
                </div>
                <div  style="display: flex; justify-content: center; align-items: center;">
                <?php $ortho_image = get_field('ortho_image'); 
                    if ($ortho_image) {
                        echo '<img src="' . esc_url($ortho_image['url']) . '" alt="' . esc_attr($ortho_image['alt']) . '" />';
                    }
                ?>

                </div>
                <?php if (have_rows('game_changer')) : while (have_rows('game_changer')) : the_row(); ?>
                    <div class="row justify-content-center">
                            <?=  get_sub_field('sub_heading'); ?>
                             <?php echo get_sub_field('sub_description'); ?>
                    </div>
                <?php endwhile;
                 endif; ?>
                  <?php if (have_rows('experience')) : while (have_rows('experience')) : the_row(); ?>
                    <div class="row justify-content-center">
                        <?=  get_sub_field('head'); ?>
                         <div class=" mb-5">
                            <?php echo get_sub_field('sub_description'); ?>
                        </div>
                    </div>
                <?php endwhile;
                 endif; ?>
                    <div class="book-now text-center">
                        <a href="https://www.getaligned.com/foot-care/align-orthotics/" target="_blank">Book an Appointment</a>
                    </div>
            </div>
</section>
<?php
get_footer();
?>