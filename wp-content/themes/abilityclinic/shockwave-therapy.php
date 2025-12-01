<?php

 //Template Name: Shockwave Therapy 

 get_header();
 ?>

<section class="sec content small-container services-page">
            <div class="container-sm container-xs">  
                 <div class="row justify-content-center">
                       <?= get_field('heading'); ?>
                            <p><?= get_field('description'); ?></p>
                        <div class="w-100 d-flex justify-content-center">
                       
                        <?php
                        $url =get_field('ortho_image')['url'];
                        $alt =get_field('ortho_image')['alt'];
                        // print_r($url);
                         echo '<img src="' . esc_url($url) . '" alt="' . esc_attr($alt) . '" />';?>
                        </div>
                            <p><?= get_field('sub_description'); ?></p>
                </div>
                <?php if (have_rows('game_changer')) : while (have_rows('game_changer')) : the_row(); ?>
                    <div class="row justify-content-center">
                        <div class="fw-light">
                            <?=  get_sub_field('sub_heading'); ?>
                        </div>
                         <div class="">
                             <?php echo get_sub_field('sub_description'); ?>
                        </div>
                       
                    </div>
                <?php endwhile;
                 endif; ?>
</section>
<?php
get_footer();
?>
