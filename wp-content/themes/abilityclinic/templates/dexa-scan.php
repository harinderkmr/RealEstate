<?php
/**
 * Template Name: Dexa Scan
 */
 get_header();
?>


<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [{
    "@type": "Question",
    "name": "What preparation is required ?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Please avoid calcium supplements 24 hours prior to the test.
Please avoid food 3 hours prior to the test.
Please wear loose fitting clothing and remove jewelry prior to the test"
    }
  },{
    "@type": "Question",
    "name": "What is the cost for the test?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "The first scan is $100, while subsequent scans are $75
If seeing a Lifestyle and Preventative Medicine specialist, the first scan is complimentary
As your family doctor for a referral to have your scan results professionally interpreted"
    }
  },{
    "@type": "Question",
    "name": "What do I need to wear for a DEXA scan?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "For your DEXA scan, we suggest wearing soft, comfortable clothes without any metal fastenings like hooks, zippers, or buttons. This will allow you to lie down comfortably on the padded table and ensure that no metal objects interfere with or degrade the quality of the images. You may be asked to change into a hospital gown if necessary."
    }
  },{
    "@type": "Question",
    "name": "Are DEXA scans accurate?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "A DEXA scan is regarded as the Gold Standard for measuring bone density and body composition. It offers highly accurate and detailed insights into your body composition and is the preferred imaging test for diagnosing and tracking osteoporosis."
    }
  },{
    "@type": "Question",
    "name": "Is a DEXA scan safe?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "DEXA scans are very safe. They use a much lower level of radiation (X-Rays), than a standard x-ray examination. This means that the Radiographer will stay with you in the room during your examination.

We compare radiation doses to natural background levels of radiation we receive from the environment. A DEXA scan is equivalent less than a few days exposure, whilst for comparison, a Chest X-Ray uses the equivalent of about 3 days exposure."
    }
  },{
    "@type": "Question",
    "name": "What happens after the scan?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "There are no restrictions on normal activity, you can eat and drink normally, drive and return to work immediately after the scan.

The results will be checked by our kinesiology and/or Lifestyle Physician depending on Appointment type"
    }
  }]
}
</script>




<?php 
$hero_group = get_field('hero_section'); 
if ( $hero_group ) : 
?>
<!-- old method for to set background image  -->
<?php if(2==1) : ?>
<section class="dexa-hero" style="background-image: none;" 
    data-bg-url="<?php echo esc_url( $hero_group['hero_image']['url'] ); ?>"
    aria-label="<?php echo esc_attr( $hero_group['hero_image']['alt'] ); ?>">
<?php endif; ?>

<!-- new method -->
<section class="dexa-hero" style="position: relative; overflow: hidden;" aria-label="<?php echo esc_attr( $hero_group['hero_image']['alt'] ); ?>">
  <img 
    src="<?php echo esc_url( $hero_group['hero_image']['url'] ); ?>" 
    alt="<?php echo esc_attr( $hero_group['hero_image']['alt'] ); ?>" 
    style=" position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1;" fetchpriority="high" decoding="async"
  />
    <div class="container">
        <div class="dexa-hero-text">
            <?php if ( ! empty( $hero_group['hero_title'] ) ) : ?>
            <h1>
                <?php echo esc_html( $hero_group['hero_title'] ); ?>
                <?php if ( ! empty( $hero_group['hero_subtitle'] ) ) : ?>
                <?php echo strip_tags( wp_kses_post( $hero_group['hero_subtitle'] ), '<br><strong><em>' ); ?>
                <?php endif; ?>
            </h1>
            <?php endif; ?>

            

            <?php if ( ! empty( $hero_group['hero_description'] ) ) : ?>
            <?php echo wpautop( $hero_group['hero_description'] ); ?>
            <?php endif; ?>

            <div class="book-now mt-4">
               <a href="<?php echo get_field('appointment_url')['url']?>" target="_blank">
                   <?php echo get_field('appointment_url')['title']?>
               </a>
            </div>
        </div>

        <div class="d-none hero-slider-wrap">
            <div class="hero-slider hero-carousel owl-carousel">
                <?php if ( ! empty( $hero_group['hero_slides'] ) ) : ?>
                    <?php foreach ( $hero_group['hero_slides'] as $slide ) : 
                        $image = $slide['slide_image'];
                        $text  = $slide['slide_text'];
                    ?>
                    <div class="hero-slide">
                        <a href="#">
                            <?php if ( ! empty( $image ) ) : ?>
                            <img loading="lazy" src="<?php echo esc_url( $image['url'] ); ?>"
                                alt="<?php echo esc_attr( $image['alt'] ); ?>">
                            <?php endif; ?>

                            <?php if ( ! empty( $text ) ) : ?>
                            <p>
                                <?php echo esc_html( $text ); ?>
                            </p>
                            <?php endif; ?>
                        </a>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php 
endif; 
?>

<section class="dexa-body-composition">
    <div class="container">
        <?php 
        // Fetch the main group field
        $body_composition_section = get_field('body_composition_section');
        if ($body_composition_section) :
        ?>
        <div class="head">
            <?php if (!empty($body_composition_section['head']['head_title'])) : ?>
            <h2>
                <?php echo esc_html($body_composition_section['head']['head_title']); ?>
            </h2>
            <?php endif; ?>

            <?php if (!empty($body_composition_section['head']['head_description'])) : ?>
            <p>
                <?php echo wp_kses_post($body_composition_section['head']['head_description']); ?>
            </p>
            <?php endif; ?>
        </div>

        <div class="body-copy">
            <?php if (!empty($body_composition_section['body_copy']['body_copy_descritpion'])) : ?>
            <p>
                <?php echo wp_kses_post($body_composition_section['body_copy']['body_copy_descritpion']); ?>
            </p>
            <?php endif; ?>

            <ul>
                <?php if (!empty($body_composition_section['body_copy']['body_copy_list'])) : ?>
                <?php echo wp_kses_post($body_composition_section['body_copy']['body_copy_list']); ?>
                <?php endif; ?>
            </ul>
        </div>

        <!-- Copy Blocks Repeater -->
        <?php $body_section = get_field('body_composition_section'); ?>
        <div id="desktop">
            <?php if (!empty($body_section['copy_blocks'])) : ?>
            <?php foreach ($body_section['copy_blocks'] as $index => $copy_block) : ?>
            <div class="copy-block desktop">    
                <?php if ($index % 2 == 0) : //Even indexed : show the image on the left side ?>  
                <div class="image-block text-md-start">
                    <?php if (!empty($copy_block['copy_block_image'])) : ?>
                    <img loading="lazy" src="<?php echo esc_url($copy_block['copy_block_image']['url']); ?>"
                        alt="<?php echo esc_attr($copy_block['copy_block_image']['alt']); ?>">
                    <?php endif; ?>
                </div>
                <div class="text-wrap">
                    <?php if (!empty($copy_block['copy_block_title'])) : ?>
                    <h3>
                        <?php echo esc_html($copy_block['copy_block_title']); ?>
                    </h3>
                    <?php endif; ?>

                    <?php if (!empty($copy_block['copy_block_description'])) : ?>
                    <p>
                        <?php echo wp_kses_post($copy_block['copy_block_description']); ?>
                    </p>
                    <?php endif; ?>

                    <?php if (!empty($copy_block['button_text'])) : ?>
                    <div class="d-flex justify-content-center">
                        <a class="cta-btn" href="<?php echo esc_url($copy_block['button_url'] ?: '#'); ?>">
                            <span>
                                <?php echo esc_html($copy_block['button_text']); ?>
                            </span>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
                <?php else : // Odd index: show image on the right ?>
                <div class="text-wrap">
                    <?php if (!empty($copy_block['copy_block_title'])) : ?>
                    <h3>
                        <?php echo esc_html($copy_block['copy_block_title']); ?>
                    </h3>
                    <?php endif; ?>

                    <?php if (!empty($copy_block['copy_block_description'])) : ?>
                    <p>
                        <?php echo wp_kses_post($copy_block['copy_block_description']); ?>
                    </p>
                    <?php endif; ?>

                    <?php if (!empty($copy_block['button_text'])) : ?>
                    <div class="d-flex justify-content-center">
                        <a class="cta-btn" href="<?php echo esc_url($copy_block['button_url'] ?: '#'); ?>">
                            <span>
                                <?php echo esc_html($copy_block['button_text']); ?>
                            </span>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="image-block ">
                    <?php if (!empty($copy_block['copy_block_image'])) : ?>
                    <img  loading="lazy" src="<?php echo esc_url($copy_block['copy_block_image']['url']); ?>"
                        alt="<?php echo esc_attr($copy_block['copy_block_image']['alt']); ?>">
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>

            <?php else : ?>
            <p>No copy blocks available.</p>
            <?php endif; ?>
        </div>

        <!-- For mobile view -->
        <div id="mobile">
            <?php if (!empty($body_section['copy_blocks'])) : ?>
            <?php foreach ($body_section['copy_blocks'] as $index => $copy_block) : ?>
            <div class="copy-block mob">
                <div class="text-wrap">
                    <?php if (!empty($copy_block['copy_block_title'])) : ?>
                    <h3>
                        <?php echo esc_html($copy_block['copy_block_title']); ?>
                    </h3>
                    <?php endif; ?>

                    <?php if (!empty($copy_block['copy_block_description'])) : ?>
                    <p>
                        <?php echo wp_kses_post($copy_block['copy_block_description']); ?>
                    </p>
                    <?php endif; ?>

                    <div class="image-block text-md-start">
                        <?php if (!empty($copy_block['copy_block_image'])) : ?>
                        <img loading="lazy" src="<?php echo esc_url($copy_block['copy_block_image']['url']); ?>"
                            alt="<?php echo esc_attr($copy_block['copy_block_image']['alt']); ?>">
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($copy_block['button_text'])) : ?>
                    <div class="d-flex justify-content-center">
                        <a class="cta-btn" href="<?php echo esc_url($copy_block['button_url'] ?: '#'); ?>">
                            <span>
                                <?php echo esc_html($copy_block['button_text']); ?>
                            </span>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>

            <?php else : ?>
            <p>No copy blocks available.</p>
            <?php endif; ?>
        </div>


        <?php endif; ?>
    </div>
</section>
<?php if ( have_rows( 'medical_clinic_text' ) ) : ?>
<?php while ( have_rows( 'medical_clinic_text' ) ) : the_row(); ?>
<section class="find-dexa-scan"
    style="background-position: center; background-image: url(<?php echo esc_url( get_sub_field('medical_clinic_image')['url'] ); ?>)"
    aria-label="<?php echo esc_attr( get_sub_field('medical_clinic_image')['alt'] ); ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="medical-clinic-text">
                    <h2>
                        <?php echo esc_html( get_sub_field('medical_clinic_text_heading') ); ?>
                    </h2>
                    <a class="cta-btn" href="/#map">
                        <span>
                            <?php echo esc_html( get_sub_field('medical_clinic_text_link') ); ?>
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" id="Calque_2" data-name="Calque 2"
                            viewBox="0 0 384 320">
                            <g id="Calque_1-2" data-name="Calque 1">
                                <path
                                    d="m380.38,170.14c.14-.17.27-.36.4-.54.18-.24.36-.47.53-.72.15-.22.27-.45.41-.67.13-.22.27-.44.4-.67.12-.23.23-.47.34-.7.11-.24.23-.47.33-.72.09-.23.17-.46.25-.69.09-.26.2-.52.28-.79.07-.23.12-.46.18-.69.07-.27.15-.55.2-.83.05-.26.08-.53.12-.79.04-.25.08-.5.11-.76.05-.47.07-.95.07-1.42,0-.05,0-.1,0-.15s0-.1,0-.15c0-.47-.03-.95-.07-1.42-.03-.26-.07-.5-.11-.76-.04-.26-.07-.53-.12-.79-.06-.28-.13-.55-.2-.83-.06-.23-.11-.46-.18-.69-.08-.27-.18-.53-.28-.79-.08-.23-.16-.46-.25-.69-.1-.24-.22-.48-.33-.72-.11-.23-.21-.47-.34-.7-.12-.23-.26-.45-.4-.67-.13-.23-.26-.45-.41-.67-.17-.25-.35-.48-.53-.72-.13-.18-.26-.36-.4-.54-.34-.41-.69-.8-1.07-1.18L235.31,4.69c-6.25-6.25-16.38-6.25-22.63,0-6.25,6.25-6.25,16.38,0,22.63l116.69,116.69H16c-8.84,0-16,7.16-16,16s7.16,16,16,16h313.37l-116.69,116.69c-6.25,6.25-6.25,16.38,0,22.63s16.38,6.25,22.63,0l144-144c.37-.37.73-.77,1.07-1.18Z"
                                    style="fill-rule: evenodd;"></path>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
</section>
<?php endwhile; ?>
<?php endif; ?>


<!-- this section is not used in frontend -->
<?php if(2==1) : ?>
<section class="d-none dexa-fitnes-block">

    <div class="container">
        <?php 
    $dexa_fitnes_block = get_field('dexa_fitnes_block');
    if ( $dexa_fitnes_block ) :
    ?>
        <div class="row">
            <!-- Left Column: Section Heading and Description -->
            <div class="col-md-6">
                <div class="head">
                    <?php if ( !empty($dexa_fitnes_block['dexa_fitness_heading']) ) : ?>
                    <h2>
                        <?php echo esc_html($dexa_fitnes_block['dexa_fitness_heading']); ?>
                    </h2>
                    <?php endif; ?>

                    <?php if ( !empty($dexa_fitnes_block['dexa_fitness_description']) ) : ?>
                    <p>
                        <?php echo wp_kses_post($dexa_fitnes_block['dexa_fitness_description']); ?>
                    </p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Right Column: Slider -->
            <div class="col-md-6">
                <?php 
          // Check for slides within the group.
          $dexa_fitness_slides = $dexa_fitnes_block['dexa_fitness_slides'];
          $total_slides = is_array($dexa_fitness_slides) ? count($dexa_fitness_slides) : 0;
          ?>
                <div class="slider-counter">
                    <span id="current-slide">01</span>/<span id="total-slides">
                        <?php echo sprintf('%02d', $total_slides); ?>
                    </span>
                </div>

                <div class="fitnes-block-slider fitnes-carousel owl-carousel">
                    <?php if ( !empty($dexa_fitness_slides) ) : ?>
                    <?php foreach ( $dexa_fitness_slides as $slide ) : 
                // Get slide data.
                $slide_image        = isset( $slide['slide_image'] ) ? $slide['slide_image'] : false;
                $slide_title        = isset( $slide['slide_title'] ) ? $slide['slide_title'] : '';
                $slide_description  = isset( $slide['slide_description'] ) ? $slide['slide_description'] : '';
                $slide_button_text  = isset( $slide['button_text'] ) ? $slide['button_text'] : '';
                $slide_button_url   = isset( $slide['button_url'] ) ? $slide['button_url'] : '';
              ?>
                    <div class="slide-block">
                        <!-- Slide Image -->
                        <div class="slide-image">
                            <?php if ( $slide_image ) : ?>
                            <img loading="lazy" src="<?php echo esc_url( $slide_image['url'] ); ?>"
                                alt="<?php echo esc_attr( $slide_image['alt'] ); ?>">
                            <?php endif; ?>
                        </div>
                        <!-- Slide Content -->
                        <div class="slide-content">
                            <?php if ( $slide_title ) : ?>
                            <h3>
                                <?php echo esc_html( $slide_title ); ?>
                            </h3>
                            <?php endif; ?>

                            <?php if ( $slide_description ) : ?>
                            <p>
                                <?php echo wp_kses_post( $slide_description ); ?>
                            </p>
                            <?php endif; ?>

                            <div class="request-btn-holder">
                                <?php if ( $slide_button_text ) : ?>
                                <div class="d-flex justify-content-center">
                                    <a class="request-btn" href="<?php echo esc_url( $slide_button_url ?: '#' ); ?>">
                                        <?php echo esc_html( $slide_button_text ); ?>
                                    </a>
                                </div>


                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div><!-- .fitnes-block-slider -->
            </div><!-- .col-md-6 -->
        </div><!-- .row -->
        <?php endif; ?>
    </div><!-- .container -->
</section>
<?php endif; ?>

<!-- this section is not used in frontend -->

<section class="d-none dexa-healthy-block">
    <?php if (have_rows('dexa_healthy_block')): ?>
    <?php while (have_rows('dexa_healthy_block')): the_row(); ?>
    <div class="container-xxl container">
        <div class="row g-0">
            <div class="col-md-6">
                <div class="over-weight-block">
                    <h2>
                        <?php echo get_sub_field('heading'); ?>
                    </h2>
                    <?php echo get_sub_field('description'); ?>
                    <a class="healthy-cta-btn" href="#">
                        <!-- <span>
                      <svg xmlns="http://www.w3.org/2000/svg" id="Calque_2" data-name="Calque 2" viewBox="0 0 384 320"><g id="Calque_1-2" data-name="Calque 1"><path d="m380.38,170.14c.14-.17.27-.36.4-.54.18-.24.36-.47.53-.72.15-.22.27-.45.41-.67.13-.22.27-.44.4-.67.12-.23.23-.47.34-.7.11-.24.23-.47.33-.72.09-.23.17-.46.25-.69.09-.26.2-.52.28-.79.07-.23.12-.46.18-.69.07-.27.15-.55.2-.83.05-.26.08-.53.12-.79.04-.25.08-.5.11-.76.05-.47.07-.95.07-1.42,0-.05,0-.1,0-.15s0-.1,0-.15c0-.47-.03-.95-.07-1.42-.03-.26-.07-.5-.11-.76-.04-.26-.07-.53-.12-.79-.06-.28-.13-.55-.2-.83-.06-.23-.11-.46-.18-.69-.08-.27-.18-.53-.28-.79-.08-.23-.16-.46-.25-.69-.1-.24-.22-.48-.33-.72-.11-.23-.21-.47-.34-.7-.12-.23-.26-.45-.4-.67-.13-.23-.26-.45-.41-.67-.17-.25-.35-.48-.53-.72-.13-.18-.26-.36-.4-.54-.34-.41-.69-.8-1.07-1.18L235.31,4.69c-6.25-6.25-16.38-6.25-22.63,0-6.25,6.25-6.25,16.38,0,22.63l116.69,116.69H16c-8.84,0-16,7.16-16,16s7.16,16,16,16h313.37l-116.69,116.69c-6.25,6.25-6.25,16.38,0,22.63s16.38,6.25,22.63,0l144-144c.37-.37.73-.77,1.07-1.18Z" style="fill-rule: evenodd;"></path></g></svg>           
                </span> -->
                        <span>
                            <?php echo get_sub_field('get_in_touch_button'); ?>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="over-weight-block bones-block">
                    <h2>
                        <?php echo get_sub_field('sub_heading'); ?>
                    </h2>
                    <?php echo get_sub_field('sub_description'); ?>
                    <a class="healthy-cta-btn" href="#">
                        <!-- <span>
                      <svg xmlns="http://www.w3.org/2000/svg" id="Calque_2" data-name="Calque 2" viewBox="0 0 384 320"><g id="Calque_1-2" data-name="Calque 1"><path d="m380.38,170.14c.14-.17.27-.36.4-.54.18-.24.36-.47.53-.72.15-.22.27-.45.41-.67.13-.22.27-.44.4-.67.12-.23.23-.47.34-.7.11-.24.23-.47.33-.72.09-.23.17-.46.25-.69.09-.26.2-.52.28-.79.07-.23.12-.46.18-.69.07-.27.15-.55.2-.83.05-.26.08-.53.12-.79.04-.25.08-.5.11-.76.05-.47.07-.95.07-1.42,0-.05,0-.1,0-.15s0-.1,0-.15c0-.47-.03-.95-.07-1.42-.03-.26-.07-.5-.11-.76-.04-.26-.07-.53-.12-.79-.06-.28-.13-.55-.2-.83-.06-.23-.11-.46-.18-.69-.08-.27-.18-.53-.28-.79-.08-.23-.16-.46-.25-.69-.1-.24-.22-.48-.33-.72-.11-.23-.21-.47-.34-.7-.12-.23-.26-.45-.4-.67-.13-.23-.26-.45-.41-.67-.17-.25-.35-.48-.53-.72-.13-.18-.26-.36-.4-.54-.34-.41-.69-.8-1.07-1.18L235.31,4.69c-6.25-6.25-16.38-6.25-22.63,0-6.25,6.25-6.25,16.38,0,22.63l116.69,116.69H16c-8.84,0-16,7.16-16,16s7.16,16,16,16h313.37l-116.69,116.69c-6.25,6.25-6.25,16.38,0,22.63s16.38,6.25,22.63,0l144-144c.37-.37.73-.77,1.07-1.18Z" style="fill-rule: evenodd;"></path></g></svg>           
                </span> -->
                        <span>
                            <?php echo get_sub_field('quiz_button'); ?>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</section>



<section class="d-none dexa-dr-block">
    <?php if (have_rows('dexa_dr_block')): ?>
    <?php while (have_rows('dexa_dr_block')): the_row(); ?>
    <div class="container">
        <div class="head">
            <h2>
                <?php echo get_sub_field('dexa_dr_heading'); ?>
            </h2>
            <?php echo get_sub_field('dexa_dr_description'); ?>
        </div>
        <div class="dr-info-block">
            <div class="row">
                <?php if (have_rows('doctor_info_block')): ?>
                <?php while (have_rows('doctor_info_block')): the_row(); ?>
                <div class="col-md-6">
                    <div class="info-block">
                        <?php  echo '<img loading="lazy" src="' . get_sub_field('doctor_img')['url'] . '" alt="' .  get_sub_field('doctor_img')['alt'] . '">';?>
                        <h3>
                            <?php echo get_sub_field('doctor_name'); ?>
                        </h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <?php echo get_sub_field('doctor_description'); ?>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="cpsbc-block">
            <div class="row">
                <div class="col-md-6">
                    <div class="cpsbc-logo w-100">
                        <?php  
                  $cpsbc_logo = get_sub_field('cpsbc-logo');
                  if (!empty($cpsbc_logo) && !empty($cpsbc_logo['url'])) {
                      echo '<img loading="lazy" class="w-100" src="' . esc_url($cpsbc_logo['url']) . '" alt="' . esc_attr($cpsbc_logo['alt']) . '">';
                  }
                  ?>
                    </div>


                </div>
                <div class="col-md-6">
                    <div class="cpsbc-contant">
                        <?php echo get_sub_field('cpsbc-description'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</section>



<section class="dexa-medical-clinic">
    <?php if (have_rows('dexa_medical_clinic')): ?>
    <?php while (have_rows('dexa_medical_clinic')): the_row(); ?>
    <div class="dexa-medical-bottom ">
        <div class="container">
            <div class="dexa-medical-wrap justify-content-md-between">
                <div class="dexa-medical-process">
                    <h3>
                        <?php echo get_sub_field('dexa_medical_process_heading'); ?>
                    </h3>
                    <?php echo get_sub_field('dexa_medical_process_description'); ?>

                    <!-- Brochure section -->
                   
                    <div class="more-form broucher">
                        <div class="row select-form align-items-center">
                          <?php if (have_rows('brochure_pdf_repeater')) :
                            while (have_rows('brochure_pdf_repeater')) : the_row(); ?>
                            
                            <?php
                              $link = get_sub_field('pdf_link');
                              $pdf = get_sub_field('_file_'); // This should be a file field
                              $pdf_url = is_array($pdf) ? $pdf['url'] : '';
                              $image = get_sub_field('pdf_image');
                              $pdf_name = get_sub_field('pdf_name');
                            ?>
                      
                            <div class="col-md py-2 px-3">
                              <div class="form-get text-center">
                                <a class="img d-flex flex-column" href="<?php echo esc_url($pdf_url); ?>" download>
                                  <img src="<?php echo esc_url($image['url']); ?>" alt="" style="cursor: pointer;" />
                                  <div class="text">
                                    <p>                
                                        <?php echo esc_html($pdf_name); ?>                                    
                                    </p>
                                  </div>
                                </a>
                              </div>
                            </div>
                      
                          <?php endwhile; endif; ?>
                        </div>
                    </div>
                   
                </div>

                <div class="the-result-block">
                    <h2>
                        <?php echo get_sub_field('the_result_heading'); ?>
                    </h2>
                    <p>
                        <?php echo get_sub_field('the_result_description'); ?>
                    </p>
                    <div class="ue-text">
                        <ul class="dexa-carousel-content owl-carousel">
                            <?php if (have_rows('dexa-carousel-content')): ?>
                            <?php while (have_rows('dexa-carousel-content')): the_row(); ?>
                            <div class="d-flex justify-content-center align-items-center flex-column">
                              <img  loading="lazy" src="<?= get_sub_field('description')['url']; ?>" alt="<?= get_sub_field('description')['alt']; ?>" style="max-width: 300px;height: 300px;" /> 
                              <div class="book-now text-center pt-2 mb-0">
                                 <a href="/wp-content/uploads/2025/03/Sample-Report-w-Trend-Analysis.pdf" target="_blank">See Full Report</a>
                              </div>
                             <?php //echo get_sub_field('description'); ?>
                            </div>
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                        <div class="slide-counter">
                            <span id="active-slide">01</span>/<span id="total-slide">04</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dexa-medical-topblock"
        style=" background-position: center;background-image:url(<?php echo get_sub_field('clinic_image')['url']; ?>)">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="medical-clinic-text">
                        <h2>
                            <?php echo get_sub_field('heading'); ?>
                        </h2>
                        <a class="cta-btn" href="/#map">
                            <span>
                                <?php echo get_sub_field('description_link'); ?>
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" ...>
                                <!-- SVG content -->
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </div>

    <?php endwhile; ?>
    <?php endif; ?>
</section>

<!-- this is not used in frontend -->
 <?php if(2==1) : ?>
<section class="d-none dexa-scan">
    <div class="container-xxl container">
        <?php 
    // Fetch the entire parent field 'dexa_scan' once
    $dexa_scan = get_field('dexa_scan');
    if ($dexa_scan) :

      $dexa_scan_heading = $dexa_scan['dexa_scan_heading'] ?? '';
      $dexa_scan_intro = $dexa_scan['dexa_scan_intro'] ?? '';
      $dexa_scan_secondary_text = $dexa_scan['dexa_scan_secondary_text'] ?? '';
      $dexa_scan_accordion = $dexa_scan['dexa_scan_accordion'] ?? '';
      $bottom_question=$dexa_scan['dexa_scan_question'];
      $dexa_features = $dexa_scan['dexa_features'] ?? [];
      $upper_features = $dexa_features['upper_features'] ?? [];
      $below_features = $dexa_features['below_features'] ?? [];
    ?>

        <!-- Section Heading -->
        <?php if ($dexa_scan_heading || $dexa_scan_intro) : ?>
        <div class="head">
            <?php if ($dexa_scan_heading) : ?>
            <h3>
                <?php echo esc_html($dexa_scan_heading); ?>
            </h3>
            <?php endif; ?>

            <?php if ($dexa_scan_intro) : ?>
            <p>
                <?php echo wp_kses_post($dexa_scan_intro); ?>
            </p>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <div class="dexa-scan-text">
            <div class="row">
                <div class="col-md-6">
                    <div class="dexa-scan-tab">
                        <?php if ($dexa_scan_secondary_text) : ?>
                        <p>
                            <?php echo wp_kses_post($dexa_scan_secondary_text); ?>
                        </p>
                        <?php endif; ?>

                        <?php if (!empty($dexa_scan_accordion)) : ?>
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        <?php echo esc_html($dexa_scan_accordion['accordion_title']); ?>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <?php if (!empty($dexa_scan_accordion['accordion_items'])) : ?>
                                            <?php foreach ($dexa_scan_accordion['accordion_items'] as $item) : ?>
                                            <li>
                                                <?php echo esc_html($item['item_text']); ?>
                                            </li>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <p>
                            <?php echo esc_html($bottom_question); ?>
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="dexa-text-wrap">
                        <?php if (!empty($upper_features)) : ?>
                        <?php foreach ($upper_features as $feature) : ?>
                        <div class="dexa-text-copy">
                            <?php if (!empty($feature['feature_title'])) : ?>
                            <h4>
                                <?php echo esc_html($feature['feature_title']); ?>
                            </h4>
                            <?php endif; ?>

                            <?php if (!empty($feature['feature_description'])) : ?>
                            <p>
                                <?php echo wp_kses_post($feature['feature_description']); ?>
                            </p>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <div class="dexa-text-wrap last-one">
                        <?php if (!empty($below_features)) : ?>
                        <?php foreach ($below_features as $feature) : ?>
                        <div class="dexa-text-copy">
                            <?php if (!empty($feature['feature_title'])) : ?>
                            <h4>
                                <?php echo esc_html($feature['feature_title']); ?>
                            </h4>
                            <?php endif; ?>

                            <?php if (!empty($feature['feature_description'])) : ?>
                            <p>
                                <?php echo wp_kses_post($feature['feature_description']); ?>
                            </p>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<section class="case-study">
    
    <div class="container-xxl container">
        <div class="head">
            <?php
            $case_study = get_field('case_study'); // Get the group field

            if (!empty($case_study) && isset($case_study['heading'])) {
              echo '<h2>' . esc_html(wp_strip_all_tags($case_study['heading'])) . '</h2>';
            }
            ?>
        </div>
        <div>
            <p>
                <?php echo $case_study['text'];?>
            </p>
        </div>
        <div class="row d-grid d-md-flex align-items-center text-center text-md-start justify-content-center">
            <!-- Image Column (1 Column on Desktop, Full Width & Centered on Mobile) -->
            <?php if (!empty($case_study['image']) && isset($case_study['image']['url'])) : ?>
                <div class="col-12 col-md-3 d-flex justify-content-center py-2">
                    <img loading="lazy" style="height: 375px;" src="<?php echo esc_url($case_study['image']['url']); ?>"
                    alt="<?php echo esc_attr($case_study['image']['alt']); ?>" class="img-fluid">
                </div>
                <?php endif; ?>
                
                <!-- Video Column (3 Columns on Desktop, Full Width & Centered on Mobile) -->
                <div class="col-12 col-md-9">
                    <!-- < echo $case_study['video']; ?> -->
                    <div style="text-align: center;"><iframe loading="lazy" title="What a DEXA can show you about longevity | Peter Attia" src="https://www.youtube.com/embed/FYW82ii_RFQ" width="100%" height="369" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>
                </div>
            </div>
        </div>
 </section>
<section class="container">
        <div class="disclaimer">
        <?= get_field('disclaimer'); ?>
    </div>
</section>
<?php if (have_rows('testimonial')) : ?>
    <section class="services-home bgblue pb-5 mt-5" style="border-bottom: 0.5px solid #fff;">
        <div class="container-xxl sticky-heading-media">
            <div class="heading p-4 line-through d-flex justify-content-center">
                <h4 class="home-heading-sec text-white mb-0"><?php echo get_field('test_heading'); ?></h4>
            </div>
        </div>
        <div class="container">
            <div class="testimonial-block testimonial-section-carousel">
                <?php while (have_rows('testimonial')) : the_row(); ?>
                    <div class="card d-flex flex-column">
                        <div class="mt-2">
                            <?php
                            $rating = (int) get_sub_field('rating');
                            $rating = max(1, min($rating, 5)); // Ensures rating is between 1 and 5
                            for ($i = 0; $i < $rating; $i++) { ?>
                                <span class="fas fa-star active-star"></span>
                            <?php } ?>
                        </div>
                        <div class="testimonial">
                            <i class="fa fa-quote-left fa-2x"></i>
                            <p><?= get_sub_field('comment'); ?></p>
                        </div>
                        <div class="d-flex flex-row profile pt-4 mt-auto">
                            <div class="d-flex flex-column pl-2">
                                <div class="name"><b><?= get_sub_field('author'); ?></b></div>
                                <p class="text-muted designation"><?= get_sub_field('time'); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<section class="dexa-faq">
    <div class="container-xxl container">
        <?php 
    // Fetch the entire parent field 'dexa_faq_section'
    $dexa_faq_section = get_field('dexa_faq_section');
    if ($dexa_faq_section) :

      $faq_heading = $dexa_faq_section['faq_heading'] ?? '';
      $faq_items = $dexa_faq_section['faq_items'] ?? [];
    ?>

        <!-- FAQ Section Heading -->
        <?php if ($faq_heading) : ?>
        <div class="head">
            <h2>
                <?php echo esc_html($faq_heading); ?>
            </h2>
        </div>
        <?php endif; ?>

        <!-- FAQ Items -->
        <div class="faq-items">
            <div class="accordion accordion-flush" id="faqAccordion">
                <?php foreach ($faq_items as $index => $faq) : 
            $question = $faq['faq_question'] ?? '';
            $answer_type = $faq['faq_answer_type'] ?? '';
            $text_answer = $faq['faq_answer_text'] ?? '';
            $list_answer = $faq['faq_answer_list'] ?? [];
          ?>
                <div class="accordion-item">
                    <h3 class="accordion-header" id="heading<?php echo $index; ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse<?php echo $index; ?>" aria-expanded="false"
                            aria-controls="collapse<?php echo $index; ?>">
                            <?php echo esc_html($question); ?>
                        </button>
                    </h3>
                    <div id="collapse<?php echo $index; ?>" class="accordion-collapse collapse"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <?php if ($answer_type === 'text') : ?>
                            <p>
                                <?php echo wp_kses_post($text_answer); ?>
                            </p>
                            <?php elseif ($answer_type === 'list' && !empty($list_answer)) : ?>
                            <ul>
                                <?php foreach ($list_answer as $list_item) : ?>
                                <li>
                                    <?php echo wp_kses_post($list_item['list_item']); ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<section class="dexa-button pt-5">
    <div class="book-now text-center">
        <a href="<?php echo get_field('appointment_url')['url']?>" target="_blank">
            <?php echo get_field('appointment_url')['title']?>
        </a>
    </div>
</section>


<style>
    /* Default: Desktop styles */
    @media screen and (min-width: 767px) {
        #desktop {
            display: block;
        }

        #mobile {
            display: none;
        }
    }

    /* Mobile styles: adjust breakpoint as needed */
    @media screen and (max-width: 767px) {
        #desktop {
            display: none;
        }

        #mobile {
            display: block;
        }
    }
</style>


<!-- old js -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
  const lazyBackgrounds = document.querySelectorAll("[data-bg-url]");
  
  if ("IntersectionObserver" in window) {
    const backgroundObserver = new IntersectionObserver(function(entries, observer) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          const element = entry.target;
          element.style.backgroundImage = `url(${element.dataset.bgUrl})`;
          backgroundObserver.unobserve(element);
        }
      });
    });
    
    lazyBackgrounds.forEach(function(lazyBackground) {
      backgroundObserver.observe(lazyBackground);
    });
  } else {
    // Fallback for browsers that don't support IntersectionObserver
    lazyBackgrounds.forEach(function(lazyBackground) {
      lazyBackground.style.backgroundImage = `url(${lazyBackground.dataset.bgUrl})`;
    });
  }
});
    $('.hero-carousel').owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            768: {
                items: 4
            }
        }
    })


    $(document).ready(function () {
        const $carousel = $('.dexa-carousel-content');
        const $currentSlide = $('#active-slide');
        const $totalSlides = $('#total-slide');

        $carousel.owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            items: 1,
            onInitialized: function (event) {
                updateCounter(event);
            },
            onChanged: function (event) {
                updateCounter(event);
            },
        });
        function updateCounter(event) {
            const total = event.item.count;
            const current = event.item.index - event.relatedTarget._clones.length / 2 + 1;
            const normalizedCurrent = current > total ? current % total : (current <= 0 ? total + current : current);
            $currentSlide.text(String(normalizedCurrent).padStart(2, '0'));
            $totalSlides.text(String(total).padStart(2, '0'));
            $('.owl-item').removeClass('current');
            $('.owl-item').eq(event.item.index).addClass('current');
        }

    });

    $(document).ready(function () {
        const $carousel = $('.fitnes-carousel');
        const $currentSlide = $('#current-slide');
        const $totalSlides = $('#total-slides');

        $carousel.owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            items: 1,
            onInitialized: function (event) {
                updateCounter(event);
            },
            onChanged: function (event) {
                updateCounter(event);
            },
        });
        function updateCounter(event) {
            const total = event.item.count;
            const current = event.item.index - event.relatedTarget._clones.length / 2 + 1;
            const normalizedCurrent = current > total ? current % total : (current <= 0 ? total + current : current);
            $currentSlide.text(String(normalizedCurrent).padStart(2, '0'));
            $totalSlides.text(String(total).padStart(2, '0'));
            $('.owl-item').removeClass('current');
            $('.owl-item').eq(event.item.index).addClass('current');
        }
    });

</script>



<!-- minified js -->
<!-- <script>
document.addEventListener("DOMContentLoaded",function(){let e=document.querySelectorAll("[data-bg-url]");if("IntersectionObserver"in window){let t=new IntersectionObserver(function(e,n){e.forEach(function(e){if(e.isIntersecting){let n=e.target;n.style.backgroundImage=`url(${n.dataset.bgUrl})`,t.unobserve(n)}})});e.forEach(function(e){t.observe(e)})}else e.forEach(function(e){e.style.backgroundImage=`url(${e.dataset.bgUrl})`})}),$(".hero-carousel").owlCarousel({loop:!0,margin:20,nav:!1,dots:!1,autoplay:!0,autoplayTimeout:3e3,autoplayHoverPause:!0,responsive:{0:{items:1},600:{items:2},768:{items:4}}}),$(document).ready(function(){let e=$(".dexa-carousel-content"),t=$("#active-slide"),n=$("#total-slide");function o(e){let o=e.item.count,a=e.item.index-e.relatedTarget._clones.length/2+1;t.text(String(a>o?a%o:a<=0?o+a:a).padStart(2,"0")),n.text(String(o).padStart(2,"0")),$(".owl-item").removeClass("current"),$(".owl-item").eq(e.item.index).addClass("current")}e.owlCarousel({loop:!0,margin:10,nav:!0,dots:!1,items:1,onInitialized:function(e){o(e)},onChanged:function(e){o(e)}})}),$(document).ready(function(){let e=$(".fitnes-carousel"),t=$("#current-slide"),n=$("#total-slides");function o(e){let o=e.item.count,a=e.item.index-e.relatedTarget._clones.length/2+1;t.text(String(a>o?a%o:a<=0?o+a:a).padStart(2,"0")),n.text(String(o).padStart(2,"0")),$(".owl-item").removeClass("current"),$(".owl-item").eq(e.item.index).addClass("current")}e.owlCarousel({loop:!0,margin:10,nav:!0,items:1,onInitialized:function(e){o(e)},onChanged:function(e){o(e)}})});
</script> -->

<?php get_footer(); ?>