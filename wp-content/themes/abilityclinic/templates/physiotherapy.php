<?php
// Template Name:Physiotherapy
get_header();
?>
    <section class="sec content section-blog-wrapper small-container services-page">
        <div class="container-sm container-xs">
                <?php echo the_content(); ?>
            <?php $APPOINTEMENT  = get_field('book_appointment');?>
            <?php if($APPOINTEMENT){ ?>
                <div class="book-now text-center">
                    <a href="https://abilityclinic.janeapp.com/" target="_blank">Book Now</a>
               <!-- <a href="<?php echo $APPOINTEMENT['url']; ?>" class="btn btn-outline-primary appoint text-uppercase" ><img src="https://abilityclinic.ca/wp-content/uploads/2024/01/logo-icon.webp" class="img-fluid" > <?php echo $APPOINTEMENT['title']; ?> </a> -->
                </div>
            <?php } ?>    
        </div>
    </section>

<!-- <section class="sec content section-blog-wrapper small-container services-page" >
            <div class="container-sm container-xs">  
                 <div class="row justify-content-center">
                    <?= get_field('heading'); ?>
                    <?= get_field('description'); ?>
                   
                </div>   
                <?php if (have_rows('keyaspects')) : while (have_rows('keyaspects')) : the_row(); ?>
                    <div class="row justify-content-center pt-3">
                        <?=  get_sub_field('sub_heading'); ?>
                         <div class="mb-3">
                             <?php echo get_sub_field('sub_description'); ?>
                        </div>
                    </div>
                <?php endwhile;
                 endif; ?>
                 <?php if (have_rows('evidence')) : while (have_rows('evidence')) : the_row(); ?>
                    <div class="row justify-content-center p-0">
                        <div class="">
                            <?=  get_sub_field('head'); ?>
                        </div>
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
</section> -->
<?php
get_footer();
?>