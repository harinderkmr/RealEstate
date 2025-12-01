<?php /* Template Name: Clinic Tour */
get_header();
?>

<section class="fluid-sec">
			<video class="w-100 video-cover" src="<?php echo get_field('clinic_tour_vedio'); ; ?>" muted autoplay controls loop poster="<?php echo get_field('clinic_image_poster'); ?>"style="height=100%"></video>
</section>
<section class="p-4 content small-container">
    <div class="container-sm container-xs">

                
                <?php if( have_rows('recovery_and_wellness') ): ?>
        <?php while( have_rows('recovery_and_wellness') ): the_row(); ?>
            <?php 
                $header = get_sub_field('heading'); ?>
                
                <h1 class="sport-med  mb-3 text-center"><?php echo $header; ?></h1>
            

        <?php endwhile; ?>
    <?php endif; ?>
                
    </div>
    
</section>
<?php echo do_shortcode(get_field('foogallery_section_1')); ?>
<p class="p-4"></p>
<?php echo do_shortcode(get_field('foogallery_section_2')); ?>



<section class="parking-link my-5 text-center">
    <div class="container-fluid">
        <?php $Parking = get_field('_link_'); ?>
        <p class="fw-light fs-5" >Click here for <a href="<?php echo esc_url($Parking['url']); ?>" class="fw-light fs-5"><?php echo esc_html($Parking['title']); ?></a></p>
    </div>
</section>
<?php get_footer(); ?>