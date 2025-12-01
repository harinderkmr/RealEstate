
<?php

// Template Name: Chiropractic Care in Mississauga

get_header();
?>

<section class="sec content small-container services-page" >
            <div class="container-sm container-xs">  
                 <div class="row justify-content-center ">
                    <div >
                    <?= get_field('heading'); ?>
                    <div class=" py-4 ">
                         <?= get_field('description'); ?>
                    </div>
                </div>                
                <?php if (have_rows('keyaspects')) : while (have_rows('keyaspects')) : the_row(); ?>
                    <div class="row justify-content-center  p-0">
                        <div >
                            <?=  get_sub_field('sub_heading'); ?>
                        </div>
                         <div  >
                             <?php echo get_sub_field('sub_description'); ?>
                        </div>
                        
                    </div>
                <?php endwhile;
                 endif; ?>
                 <?php if (have_rows('benefits')) : while (have_rows('benefits')) : the_row(); ?>
                    <div class="row justify-content-center  p-0">
                        <div>
                            <?=  get_sub_field('sub_heading'); ?>
                        </div>
                         <div>
                             <?php echo get_sub_field('sub_description'); ?>
                        </div>
                        
                    </div>
                <?php endwhile;
                 endif; ?>
                 <?php if (have_rows('evidence')) : while (have_rows('evidence')) : the_row(); ?>
                    <div class="row justify-content-center  p-0">
                        <div class="fw-light ">
                           <?=  get_sub_field('head'); ?>
                        </div>
                        <div class="fw-light  mb-5">
                             <?php echo get_sub_field('evidence_parts'); ?>
                        </div>
                    </div>
                <?php endwhile;
                 endif; ?>
                   
                </div>
</section>

<?php
get_footer();
?>