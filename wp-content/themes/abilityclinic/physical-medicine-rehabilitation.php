<?php
// Template Name: physical medicine
get_header();
?>
<section class="content section-blog-wrapper small-container services-page">
<div class="container-sm container-xs">
                 <div class="row justify-content-center">
                       <?= get_field('heading'); ?>
                        <div class=" py-4 ">
                           <?= get_field('description'); ?>
                        </div>
                    
                </div>   
                <?php if (have_rows('keyaspects')) : while (have_rows('keyaspects')) : the_row(); ?>
                    <div class="row justify-content-center">
                             <?=  get_sub_field('sub_heading'); ?>
                             <?php echo get_sub_field('sub_description'); ?>
                    </div>
                <?php endwhile;
                 endif; ?>
                  <?php if (have_rows('benefits')) : while (have_rows('benefits')) : the_row(); ?>
                    <div class="row justify-content-center">
                             <h3><?=  get_sub_field('sub_heading'); ?></h3>
                             <?php echo get_sub_field('sub_description'); ?>
                    </div>
                <?php endwhile;
                 endif; ?>
              <?php
                $image = get_field('_handwrist_image_');
                if (!empty($image) && is_array($image)) { 
                    $image_url = esc_url($image['url']); 
                    ?>
                    <div class="image-container">
                        <img src="<?= $image_url; ?>" alt='Handwrist Image' />
                    </div>
                <?php 
                } else { 
                    echo '<p>No image found.</p>';
                } 
                ?>

                 <?php if (have_rows('evidence')) : while (have_rows('evidence')) : the_row(); ?>
                    <div class="row justify-content-center">
                            <?=  get_sub_field('head'); ?>
                             <?php echo get_sub_field('evidence_parts'); ?>
                    </div>
                <?php endwhile;
                 endif; ?>
                 <?php if ($video = get_field('_video_field_')) : ?>
                    <div class="video-container">
                        <video controls autoplay muted>
                            <source src="<?= $video['url']; ?>" type="<?= $video['mime_type']; ?>">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                <?php endif; ?>
            </div>
</section>
<?php
get_footer();
?>