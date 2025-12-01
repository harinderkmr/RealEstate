<?php /* Template Name: Patient info */
get_header();
?>
<section class="sec content pb-0 services-page">
    <div class="bgblue py-4 text-center mb-5">
         <?= get_field('page_heading'); ?>
    </div> 
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
              
                <div class="row">
                    <div class="col-md-12">
                        <ul class="mb-3">
                            <?php $counter = 1;
                            if (have_rows('page_link_repeater')) : while (have_rows('page_link_repeater')) : the_row(); ?>
                                    <li class="fs-5 fw-light"><a href="#s<?php echo $counter; ?>"><?= get_sub_field('page_link'); ?></a></li>
                            <?php $counter++;
                                endwhile;
                            endif; ?>
                        </ul>
                    </div>
                    <div class="col-lg-10 mx-auto">
                        <div class="img-meta position-relative">
                            <img class="w-100" src="<?= get_field('page_image'); ?>" alt="page_image" />
                            <div class="cta-air position-absolute start-50 translate-middle-x" style="top: 100px"><a class="cta d-inline-flex rounded-0 shadow" href="<?php echo get_field('patient_education_button')['url']; ?>"><?php echo get_field('patient_education_button')['title']; ?></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<p id="s1">&nbsp;</p>
<section class="pad-scroll  pb-0 mt-2" >
    <?php if (have_rows('page_contant_group')) : while (have_rows('page_contant_group')) : the_row(); ?>
            <div class="bgblue py-4 text-center mb-3">
               <?= get_sub_field('page_content_heading'); ?>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xl-8">
                        <?php echo get_sub_field('page_content'); ?>
                    </div>
                </div>
            </div>
    <?php endwhile;
    endif; ?>
</section>

<p id="s2">&nbsp;</p>
<section class="pad-scroll  pb-0 mt-3" >
    <div class="bgblue py-4 text-center mb-3">
        <?php echo get_field('appointment_heading'); ?>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <?php if (have_rows('appointment_repeater')) : while (have_rows('appointment_repeater')) : the_row(); ?>
                    <?php $accessibility =  get_sub_field('appointment_heading'); ?>
                    <?php if($accessibility == 'Accessibility'){ ?>
                        
                        <h3 class="mt-3 pt-4 mb-3 icon-before pad-scroll selected-links" id="accessibility">
                            <span class="icon-head"><img src="<?php echo get_sub_field('appointment_heading_image')['url']; ?>" alt="<?php echo get_sub_field('appointment_heading_image')['alt']; ?>"/></span> <a class="text-decoration-none fw-light fs-5 fw-bold"  href="#"><?php echo get_sub_field('appointment_heading'); ?></a>
                        </h3>
                    <?php }else{ ?>
                        <h3 class="mt-3 pt-3 mb-3 icon-before" >
                        <?php 
                            $image = get_sub_field('appointment_heading_image'); 
                            $heading = get_sub_field('appointment_heading'); 
                            ?>
                        <?php if (!empty($image) && is_array($image) && isset($image['url'])) : ?>
                            <span class="icon-head">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>" />
                            </span>
                        <?php endif; ?>
                        <a class="text-decoration-none fw-light fs-5 fw-bold" href="#"><?php echo get_sub_field('appointment_heading'); ?></a>
                    </h3>
                    <?php } ?>
                        <ul>
                            <?php if (have_rows('appoinment_data_repeater')) : while (have_rows('appoinment_data_repeater')) : the_row(); ?>
                                    <li class="fw-light"><?php echo get_sub_field('appointment_data'); ?></li>
                            <?php endwhile;
                            endif; ?>
                        </ul>
                <?php endwhile;
                endif; ?>

                <h6 class="mt-5 fw-bold mb-3"><a href="/what-to-expect-during-your-emg-appointment/">For nerve conduction and EMG appointments</a></h3>

                    <h6 class="fw-bold"><a href="/what-to-expect-during-your-us-appointment/">For ultrasound-guided injection appointments</a></h3>
            </div>
        </div>
    </div>
</section>

<p id="s3" >&nbsp;</p>
<section class="pad-scroll my-4" >
    <?php if (have_rows('fee_group')) : while (have_rows('fee_group')) : the_row(); ?>
            <div class="bgblue py-4 text-center mb-5">
              <?php echo get_sub_field('fee_section_name'); ?>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xl-8">
                        <?php echo get_sub_field('fee_description'); ?>
                    </div>
                </div>
            </div>
    <?php endwhile;
    endif; ?>
</section>




<?php get_footer(); ?>