<?php
// Template Name: Deep Tissue Massage Therapy
get_header();
?>
<section class="content section-blog-wrapper small-container services-page" >
            <div class="container-sm container-xs">  
                 <div class="row justify-content-center ">
                    <?= get_field('heading'); ?>
                    <?= get_field('description'); ?>
                </div>
                <?php if (have_rows('keyaspects')) : while (have_rows('keyaspects')) : the_row(); ?>
                    <div class="row justify-content-center  pt-3">
                            <?=  get_sub_field('sub_heading'); ?>
                         <div class=" mb-3">
                             <?php echo get_sub_field('sub_description'); ?>
                        </div>
                    </div>
                <?php endwhile;
                 endif; ?>
                 <?php if (have_rows('benefits')) : while (have_rows('benefits')) : the_row(); ?>
                    <div class="row justify-content-center">
                            <?=  get_sub_field('sub_heading'); ?>
                         <div class=" mb-3">
                             <?php echo get_sub_field('sub_description'); ?>
                        </div>
                        
                    </div>
                <?php endwhile;
                 endif; ?>
                 <?php if (have_rows('evidence')) : while (have_rows('evidence')) : the_row(); ?>
                    <div class="row justify-content-center  p-0">
                           <?=  get_sub_field('head'); ?>
                        <div class=" mb-5">
                             <?php echo get_sub_field('evidence_parts'); ?>
                        </div>
                    </div>
                <?php endwhile;
                 endif; ?>
                    <div class="book-now text-center">
                        <a href="https://abilityclinic.janeapp.com/" target="_blank">Book Now</a>
                    </div>
            </div>
</section>

<?php
get_footer();
?>