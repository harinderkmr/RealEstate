<?php
/**
 * Template Name: physiotherapy-2025
 */
 get_header();
?>
<!-- Page Title -->
<title>
    <?php wp_title(''); ?>
</title>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [{
    "@type": "Question",
    "name": "What is Physiotherapy, and how can it help me?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Physiotherapy is a medical process that helps improve mobility, reduce pain, and improve general body function. If you have a sports injury, back pain, or any form of mobility problem, our physiotherapy clinic in Mississauga can help."
    }
  },{
    "@type": "Question",
    "name": "Do I need a doctor’s referral for Physiotherapy?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "No, You don’t need a doctor’s referral to visit a physiotherapist. However, you may need a referral to use some insurance plans."
    }
  },{
    "@type": "Question",
    "name": "How long does a Physiotherapy session last?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Sessions typically last 30 to 60 minutes, depending on your treatment plan."
    }
  },{
    "@type": "Question",
    "name": "How many Physiotherapy sessions will I need?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "The number of sessions varies based on your condition. Our team will guide you through the recovery process."
    }
  },{
    "@type": "Question",
    "name": "Is Physiotherapy painful?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Although some treatments may cause mild pain, generally, physiotherapy should not be painful. We always ensure a comfortable, pain-free experience."
    }
  },{
    "@type": "Question",
    "name": "Can Physiotherapy help with chronic pain?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Yes! Our expert physiotherapists offer effective treatments for chronic pain relief."
    }
  }]
}
</script>


<!-- Hero section -->
<?php 
$hero_group = get_field('therapy_hero_section'); 
if ( $hero_group ) : 
?>
<section class="dexa-hero therapy-hero" style="background-image: url(<?php echo esc_url( $hero_group['hero_image']['url'] ); ?>);"
    aria-label="<?php echo esc_attr( $hero_group['hero_image']['alt'] ); ?>">
    <div class="container">
        <div class="dexa-hero-text">
            <?php if ( ! empty( $hero_group['hero_title'] ) ) : ?>
            <h1>
                <?php echo ( $hero_group['hero_title'] ); ?>
                <?php if ( ! empty( $hero_group['hero_subtitle'] ) ) : ?>
                <?php echo strip_tags( wp_kses_post( $hero_group['hero_subtitle'] ), '<br><strong><em>' ); ?>
                <?php endif; ?>
            </h1>
            <?php endif; ?>

            

            <?php if(2==1) : ?>
            <?php if ( ! empty( $hero_group['hero_description'] ) ) : ?>
            <?php echo wpautop( $hero_group['hero_description'] ); ?>
            <?php endif; ?>
            <?php endif; ?>

            <div class="book-now mt-4">
                <a href="<?php echo get_field('appointment_link')['url']?>" target="_blank">
                    <?php echo get_field('appointment_link')['title']?>
                </a>
            </div>
        </div>

    </div>
</section>
<?php 
endif; 
?>



<!-- Physiotherapy body section -->
<section class="sec content section-blog-wrapper small-container services-page pb-0">
    <div class="container">
        <?php 
            // Fetch the main group field
            //  $head_section = get_field('head_section');
            // if ($head_section) :
            ?>
        <div class="massage-therapy-copy">
            <div class="copy-block">
                <?php if (have_rows('head_section')) : while (have_rows('head_section')) : the_row(); ?>
                <?= get_sub_field('heading'); ?>
                <?= get_sub_field('description'); ?>
            </div>
        </div>

        <div class="massage-therapy-copy">
            <?php if (have_rows('key_aspects_repeater')) : while (have_rows('key_aspects_repeater')) : the_row(); ?>
            <div class="copy-block pt-3">
                <?=  get_sub_field('sub_heading'); ?>
                <?php echo get_sub_field('sub_description'); ?>
            </div>
            <?php endwhile;
        endif; ?>
        </div>
        
        <div class="foo-gallery pt-3">
            <?php echo do_shortcode('[foogallery id="5448"]'); ?>
        </div>
        
             <!-- Swipe Image Crousel For Mobile -->
               <?php if (have_rows('slider_images')) : ?>
                    <div class="card-stack-wrapper">
                        <div class="card-stack">
                            <?php $i = 0; while (have_rows('slider_images')) : the_row(); 
                                $image = get_sub_field('image');
                                if (!$image) continue; 
                            ?>
                                <div class="card-inner <?php echo $i === 0 ? 'active' : ''; ?>">
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                </div>
                            <?php $i++; endwhile; ?>
                        </div>
                        <div class="navigation">
                            <?php $i = 0; while (have_rows('slider_images')) : the_row(); 
                                $image = get_sub_field('image');
                                if (!$image) continue; 
                            ?>
                                <div class="nav-dot <?php echo $i === 0 ? 'active' : ''; ?>" data-index="<?php echo $i; ?>">
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                </div>
                            <?php $i++; endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?> 


        <!-- <div class="book-now text-center">
                    <a href="https://abilityclinic.janeapp.com/" target="_blank">Book Now</a>
                </div> -->
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>



<!-- Conditoins We Treate Section -->

<section class="dexa-body-composition">
    
  <?php if (have_rows('conditions_we_treat')) : while(have_rows('conditions_we_treat')): the_row() ?> 
   <div class="bgblue py-4 text-center">
       <h2 class="fs-2 lh-1 mb-0 text-white"><?= get_sub_field('condition_heading'); ?></h2>
   </div>

    <div class="container">
        
        <!-- Copy Blocks Repeater -->
        <?php $body_section = get_sub_field('conditions'); ?>
        <div id="desktop" class="d-md-block d-none">
            <?php if (!empty($body_section)) : ?>
            <?php foreach ($body_section as $index => $copy_block) : ?>
            <div class="copy-block desktop">
                <?php if ($index % 2 == 0) : //Even indexed : show the image on the left side ?>
                <div class="image-block text-md-start">
                    <?php if (!empty($copy_block['condition_image'])) : ?>
                    <img src="<?php echo esc_url($copy_block['condition_image']['url']); ?>"
                        alt="<?php echo esc_attr($copy_block['condition_image']['alt']); ?>">
                    <?php endif; ?>
                </div>
                <div class="text-wrap">
                    <?php if (!empty($copy_block['condition_title'])) : ?>
                    <h3>
                        <?php echo esc_html($copy_block['condition_title']); ?>
                    </h3>
                    <?php endif; ?>

                    <?php if (!empty($copy_block['condition_description'])) : ?>
                    <p>
                        <?php echo wp_kses_post($copy_block['condition_description']); ?>
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
                    <?php if (!empty($copy_block['condition_title'])) : ?>
                    <h3>
                        <?php echo esc_html($copy_block['condition_title']); ?>
                    </h3>
                    <?php endif; ?>

                    <?php if (!empty($copy_block['condition_description'])) : ?>
                    <p>
                        <?php echo wp_kses_post($copy_block['condition_description']); ?>
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
                    <?php if (!empty($copy_block['condition_image'])) : ?>
                    <img src="<?php echo esc_url($copy_block['condition_image']['url']); ?>"
                        alt="<?php echo esc_attr($copy_block['condition_image']['alt']); ?>">
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
        <div id="mobile" class="d-md-none">
            <?php if (!empty($body_section)) : ?>
            <?php foreach ($body_section as $index => $copy_block) : ?>
            <div class="copy-block mob">
                <div class="text-wrap">
                    <?php if (!empty($copy_block['condition_title'])) : ?>
                    <h3>
                        <?php echo esc_html($copy_block['condition_title']); ?>
                    </h3>
                    <?php endif; ?>

                    <?php if (!empty($copy_block['condition_description'])) : ?>
                    <p>
                        <?php echo wp_kses_post($copy_block['condition_description']); ?>
                    </p>
                    <?php endif; ?>

                    <div class="image-block text-md-start">
                        <?php if (!empty($copy_block['condition_image'])) : ?>
                        <img src="<?php echo esc_url($copy_block['condition_image']['url']); ?>"
                            alt="<?php echo esc_attr($copy_block['condition_image']['alt']); ?>">
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

    </div>
  <?php endwhile; endif; ?>
</section>



<!-- Key Aspect section -->
<section class="dexa-faq physiotherapy pt-0 pb-5">
    
    <?php 
    // Fetch the entire parent field 'dexa_faq_section'
    $dexa_faq_section = get_field('key_aspect_section');
    if ($dexa_faq_section) :

      $faq_heading = $dexa_faq_section['key_aspect_heading'] ?? '';
      $faq_items = $dexa_faq_section['key_aspect_items'] ?? [];
    ?>

    <!-- FAQ Section Heading -->
    <?php if ($faq_heading) : ?>
        <div class="head bgblue py-4 text-center">
             <h2 class="fs-2 lh-1 mb-0 text-white">
                 <?php echo esc_html($faq_heading); ?>
             </h2>
        </div>
    <?php endif; ?>

 <div class="container-xxl container">
    <?php if ($faq_items) : ?>
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
    <?php endif; ?>
</section>



<!-- Types Of Physiotherapy section -->
<?php if (have_rows('types_of_physiotherapy')) : while (have_rows('types_of_physiotherapy')) : the_row(); ?>

<section class="pad-scroll sec small-container pb-0 pt-0" id="<?php echo get_sub_field('condition_id'); ?>">

    <div class="bgblue py-4 text-center">

        <h2 class="fs-2 lh-1 mb-0 text-white"><?php echo get_sub_field('condition_type'); ?></h2>

    </div>

    <div class="container container-sm container-xs mb-2">

        <div class="row justify-content-center">

            <?php if (have_rows('condition_body_repeater')) : while (have_rows('condition_body_repeater')) : the_row(); ?>

            <div class="col-6 col-md-4  align-items-center d-flex flex-column justify-content-end mt-5">

                <div class="img align-items-end d-flex justify-content-center mb-2">
                    <a href="<?php echo get_sub_field('condition_url')['url']?>" target="_blank">
                        <img class="img-fluid" src="<?php echo get_sub_field('condition_image')['url']; ?>" alt="" />
                    </a>
                </div>

                <div class="text-cta-wrap">

                <p><?php echo get_sub_field('condition_name'); ?></p>

                <div class="book-now therapy-types text-center">
                  <?php $url = get_sub_field('book_now_url'); ?>
                   <a href="<?php echo esc_url($url['url']); ?>" target="_blank">
                       <?php echo esc_html($url['title']); ?>
                   </a>
                </div>
            </div>

            </div>

            <?php endwhile;

          endif; ?>

        </div>

    </div>

</section>

<?php endwhile; endif; ?>




<!-- Treatment Technique section -->
<?php if( have_rows('our_treatment_techniques') ): while( have_rows('our_treatment_techniques') ): the_row(); ?>
<div class="our-services bg-radius-section">
    <div class="container">
        <div class="head">
            <h2><?= get_sub_field('technique_heading'); ?></h2>
        </div>
        <div class="row">
            <?php if( have_rows('technique_body_repeater') ): while ( have_rows('technique_body_repeater') ) : the_row(); ?>
            <?php 
                $title = get_sub_field('title');
                $icon = get_sub_field('icon');
                $description = get_sub_field('description');
                $image = get_sub_field('image');
                $url = get_sub_field('url');

                $icon_url = $icon ? $icon['url'] : ''; 
                $image_url = $image ? $image['url'] : ''; 
            ?>
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <div class="service-item-image">
                        <figure>
                            <img src="<?= esc_url($image_url); ?>" alt="<?= esc_attr($title); ?>">
                        </figure>
                    </div>
                    <div class="icon-box">
                        <img src="<?= esc_url($icon_url); ?>" alt="">
                    </div>
                    <div class="service-body">
                        <div class="service-content">
                            <h3><?= esc_html($title); ?></h3>
                            <p><?= wp_trim_words($description, 20, '...'); ?></p>
                        </div>

                        <?php if ($url):  ?>
                            <div class="text-cta-wrap">
                                <div class="book-now therapy-types text-start">
                                <a href="<?php echo $url['url'] ? $url['url'] : '#'; ?>" target="_blank">
                                    <?php echo $url['title']; ?>
                                </a>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <!-- <div class="service-btn">
                            <a href="">
                                <img src="/wp-content/themes/abilityclinic/images/arrow-readmore-btn.svg" alt="">
                            </a>
                        </div> -->
                    </div>
                </div>
            </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</div>
<?php endwhile; endif; ?>



<!-- Why choose us section -->
<?php if( have_rows('choose_us_group') ): while( have_rows('choose_us_group') ): the_row(); ?>
<div class="care-rehabilitation">
    <div class="container">

        <div class="head">
            <h2><?= get_sub_field('group_heading'); ?></h2>
            <p><?= get_sub_field('group_description'); ?></p>
        </div>

        <div class="row">
            <?php if( have_rows('group_body') ): while ( have_rows('group_body') ) : the_row(); ?>
            <?php 
                $icon = get_sub_field('icon');
                $title = get_sub_field('title');
                $icon_url = $icon ? $icon['url'] : ''; 
            ?>
            <div class="col-lg-2 col-md-4 col-6">
                <!-- Rehab Benefits Item Start -->
                <div class="rehab-benefits-item">
                    <div class="icon-box">
                        <img src="<?= esc_url($icon_url); ?>" alt="">
                    </div>
                    <div class="rehab-benefits-content">
                        <p><?= esc_html($title); ?></p>
                    </div>
                </div>
                <!-- Rehab Benefits Item End -->
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endwhile; endif; ?>



<!-- Additional Benefits Section -->
<?php if( have_rows('additional_benefits_group') ): while( have_rows('additional_benefits_group') ): the_row(); ?>
<div class="about-us-update">
    <div class="container">
        <!-- Section Title Start -->
        <div class="section-title">
            <h2><?php echo get_sub_field('title'); ?></h2>
        </div>
        <!-- Section Title End -->
        <div class="row align-items-center">
            <div class="col-lg-6 d-none">
                <!-- About Us Images Start -->
                <div class="about-us-images">
                    <div class="about-image img-box-1">
                        <?php $image = get_sub_field('image'); ?>
                        <?php if(!empty($image)): ?>
                        <figure class="image-anime">
                            <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
                        </figure>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- About Us Images End -->
            </div>

            <div class="col-lg-12">
                <div class="about-content">

                    <!-- About Content Body Start -->
                    <?php if(have_rows('content_repeater')): ?>
                    <div class="about-content-body">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <!-- About Content List Start -->
                                <div class="about-content-list">
                                    <!-- About List Item Start -->
                                    <?php while( have_rows('content_repeater')): the_row(); ?>
                                    <div class="about-list-item">
                                        <?php $icon_img = get_sub_field('icon_image'); ?>
                                        <?php if($icon_img) : ?>
                                        <div class="icon-box">
                                            <img src="<?php echo $icon_img['url']; ?>"
                                                alt="<?php echo $icon_img['alt']; ?>">
                                        </div>
                                        <?php endif; ?>

                                        <div class="about-list-content">
                                            <p><?php echo get_sub_field('description'); ?></p>
                                        </div>
                                    </div>
                                    <?php endwhile; ?>
                                    <!-- About List Item End -->

                                </div>
                                <!-- About Content List End -->
                            </div>

                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- About Content Body End -->

                </div>
            </div>
        </div>
    </div>
</div>
<?php endwhile; endif; ?>



<!--  Physiotherapy Process Section -->
<?php if( have_rows('our_process_group') ): while( have_rows('our_process_group') ): the_row(); ?>
<div class="our-quality">
    <div class="quality-treatment">
        <div class="container">
            <div class="quality-treatment-content">
                <div class="section-title">
                    <h2>
                        <?php echo get_sub_field('process_title'); ?>
                    </h2>
                </div>
                <?php if( have_rows('process_body') ): ?>
                <div class="quality-service">
                    <div class="row">
                        <?php while( have_rows('process_body')): the_row(); ?>
                        <div class="col-md-3">
                            <div class="service-box">
                                <h3><?php echo get_sub_field('sub_title'); ?></h3>

                                <?php $image = get_sub_field('process_image'); ?>
                                <?php if($image): ?>
                                <div class="image">
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $icon_img['url']; ?>">
                                </div>
                                <?php endif; ?>
                                <p><?php echo get_sub_field('process_description'); ?></p>
                            </div>
                        </div>
                        <?php endwhile; ?>

                        <!-- <div class="col-md-3">
                            <div class="service-box">
                                <h3>Contact us!</h3>
                                <div class="image">
                                    <img src="/wp-content/themes/abilityclinic/images/contact-img.png" alt="Contact us">
                                </div>
                                <p>Call, e-mail, or book directly online.</p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="service-box">
                                <h3>Bring any relevant reports</h3>
                                <div class="image">
                                    <img src="/wp-content/themes/abilityclinic/images/report-img.png" alt="report">
                                </div>
                                <p>If you don't have them, we can help find them.</p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="service-box">
                                <h3>Unsure ?</h3>
                                <div class="image">
                                    <img src="/wp-content/themes/abilityclinic/images/unsure-img.png" alt="unsure">
                                </div>
                                <p>Unsure ? Book a free 15 minute call to discuss your needs.</p>
                            </div>
                        </div> -->
                    </div>
                </div>
                <?php endif; ?>

                <!-- <div class="quality-treatment-body">
                    <?php //echo get_sub_field('process_description'); ?>
                </div> -->

            </div>
        </div>

    </div>
</div>
<?php endwhile; endif; ?>



<!-- Our PhysioTherapy Clinic Section -->

<section class="dexa-hero our-clinic"
    style="background-image: url(<?php echo esc_url( $hero_group['hero_image']['url'] ); ?>);"
    aria-label="<?php echo esc_attr( $hero_group['hero_image']['alt'] ); ?>">
    <?php if(have_rows('clinic_group')): while( have_rows('clinic_group')): the_row(); ?>

    <div class="hero-slider-wrap">

        <div class="container">
            <div class="head">
              <h2><?= get_sub_field('clinic_title'); ?></h2>
              <p><?= get_sub_field('clinic_description'); ?></p>
            </div>

            <?php if(have_rows('therapy_clinic_repeater')): ?>
            <div class="hero-slider hero-carousel owl-carousel">
               <?php while( have_rows('therapy_clinic_repeater')): the_row(); ?>
                <?php $image = get_sub_field('slide_image'); ?>
                <?php $text = get_sub_field('slide_text'); ?>
                <div class="hero-slide">
                    <a href="" onclick="return false;">
                        <?php if ( ! empty( $image ) ) : ?>
                        <img src="<?php echo esc_url( $image['url'] ); ?>"
                            alt="<?php echo esc_attr( $image['alt'] ); ?>">
                        <?php endif; ?>

                        <?php if ( ! empty( $text ) ) : ?>
                        <p><?php echo esc_html( $text ); ?></p>
                        <?php endif; ?>
                    </a>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endwhile; endif; ?>
</section>



<!-- Testimonial section -->
<?php if (have_rows('testimonial')) : ?>
<section class="services-home bgblue pb-5 mt-5 physiotherapy" style="border-bottom: 0.5px solid #fff;">
    <div class="container-xxl sticky-heading-media">
        <div class="heading p-4 line-through d-flex justify-content-center">
            <h4 class="home-heading-sec text-white mb-0">
                <?php echo get_field('test_heading'); ?>
            </h4>
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
                    <p>
                        <?= get_sub_field('comment'); ?>
                    </p>
                </div>
                <div class="d-flex flex-row profile pt-4 mt-auto">
                    <div class="d-flex flex-column pl-2">
                        <div class="name"><b>
                                <?= get_sub_field('author'); ?>
                            </b></div>
                        <p class="text-muted designation">
                            <?= get_sub_field('time'); ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>



<!-- Physiotherapy FAQ's section -->
<section class="dexa-faq physio-faq">
    <div class="container-xxl container">
        <?php 
    // Fetch the entire parent field 'dexa_faq_section'
    $dexa_faq_section = get_field('physiotherapy_faqs_section');
    if ($dexa_faq_section) :

      $faq_heading = $dexa_faq_section['physio_faq_heading'] ?? '';
      $faq_items = $dexa_faq_section['physio_faq_items'] ?? [];
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
            <div class="accordion accordion-flush" id="faqAccordion-physio">
                <?php foreach ($faq_items as $index => $faq) : 
            $question = $faq['faq_question'] ?? '';
            $answer_type = $faq['faq_answer_type'] ?? '';
            $text_answer = $faq['faq_answer_text'] ?? '';
            $list_answer = $faq['faq_answer_list'] ?? [];
          ?>
                <div class="accordion-item">
                    <h4 class="accordion-header" id="heading-physio<?php echo $index; ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse-physio<?php echo $index; ?>" aria-expanded="false"
                            aria-controls="collapse-physio<?php echo $index; ?>">
                            <?php echo esc_html($question); ?>
                        </button>
                    </h4>
                    <div id="collapse-physio<?php echo $index; ?>" class="accordion-collapse collapse"
                        data-bs-parent="#faqAccordion-physio">
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



<!-- insurance slider -->

<section class="partners insurance">
	<div class="container-fluid">
		<div class="row partners-logo-sec justify-content-between align-items-center">
			<div class="owl-carousel insurance-icons align-items-center">
				<?php if( have_rows('insurance_slider') ):
					while( have_rows('insurance_slider') ): 
						the_row(); ?>
				<?php 
						$insurance_image = get_sub_field('insurance_icon');
						?>
				<?php if (!empty($insurance_image['url'])): ?>
				<div class="member text-center " style="max-height: 100%;">
					<img src="<?php echo $insurance_image['url']; ?>" alt="partners" />
				</div>
				<?php endif; endwhile; 
				endif; ?>
			</div>
		</div>
	</div>
</section>




<!-- Appointment button -->
<!-- <section class="dexa-button pt-5">
    <div class="book-now text-center">
        <a href="<?php echo get_field('appointment_url')['url']?>" target="_blank">
            <?php echo get_field('appointment_url')['title']?>
        </a>
    </div>
</section> -->


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


<script>
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


$(document).ready(function() {
    const $carousel = $('.dexa-carousel-content');
    const $currentSlide = $('#active-slide');
    const $totalSlides = $('#total-slide');

    $carousel.owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        items: 1,
        onInitialized: function(event) {
            updateCounter(event);
        },
        onChanged: function(event) {
            updateCounter(event);
        },
    });

    function updateCounter(event) {
        const total = event.item.count;
        const current = event.item.index - event.relatedTarget._clones.length / 2 + 1;
        const normalizedCurrent = current > total ? current % total : (current <= 0 ? total + current :
            current);
        $currentSlide.text(String(normalizedCurrent).padStart(2, '0'));
        $totalSlides.text(String(total).padStart(2, '0'));
        $('.owl-item').removeClass('current');
        $('.owl-item').eq(event.item.index).addClass('current');
    }

});

$(document).ready(function() {
    const $carousel = $('.fitnes-carousel');
    const $currentSlide = $('#current-slide');
    const $totalSlides = $('#total-slides');

    $carousel.owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        items: 1,
        onInitialized: function(event) {
            updateCounter(event);
        },
        onChanged: function(event) {
            updateCounter(event);
        },
    });

    function updateCounter(event) {
        const total = event.item.count;
        const current = event.item.index - event.relatedTarget._clones.length / 2 + 1;
        const normalizedCurrent = current > total ? current % total : (current <= 0 ? total + current :
            current);
        $currentSlide.text(String(normalizedCurrent).padStart(2, '0'));
        $totalSlides.text(String(total).padStart(2, '0'));
        $('.owl-item').removeClass('current');
        $('.owl-item').eq(event.item.index).addClass('current');
    }
});
</script>



<!-- Swipe image slider style & script -->

<style>
/* For mobile screens (max-width 768px) */
@media only screen and (max-width: 768px) {
  .card-stack-wrapper {
    display: block;  /* Show card-stack-wrapper on mobile */
  }
  .foo-gallery {
    display: none;   /* Hide foo-gallery on mobile */
  }
}

/* For devices larger than mobile (min-width 768px) */
@media only screen and (min-width: 769px) {
  .card-stack-wrapper {
    display: none !important;   /* Hide card-stack-wrapper on larger screens */
  }
  .foo-gallery {
    display: block;  /* Show foo-gallery on larger screens */
  }
}


.card-stack-wrapper {
    height: 500px;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    perspective: 1000px;
    background: white;
    overflow: hidden;
    padding: 20px;
}

.card-stack {
    position: relative;
    width: 350px;
    height: 350px;
    transform-style: preserve-3d;
}

.card-inner {
    position: absolute;
    width: 100%;
    height: 100%;
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
    overflow: hidden;
}

.card-inner img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.card-inner.active {
    transform: translateX(0) scale(1) !important;
    opacity: 1;
    z-index: 5;
}

.card-inner:not(.active) {
    opacity: 0.7;
    pointer-events: none;
}

.navigation {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 12px;
}

.nav-dot {
    width: 50px;
    height: 50px;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    overflow: hidden;
    opacity: 0.6;
}

.nav-dot img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.nav-dot.active {
    opacity: 1;
    transform: scale(1.1);
    box-shadow: 0 2px 8px rgba(0,0,0,0.2);
}
</style>

<!-- Swipe Image Slider Script -->

<script>
document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.card-inner');
    const dots = document.querySelectorAll('.nav-dot');
    let currentIndex = 0;

    function updateCards() {
        cards.forEach((card, index) => {
            const offset = index - currentIndex;
            card.classList.toggle('active', index === currentIndex);
            
            if (offset === 0) {
                card.style.transform = `translateX(0) scale(1)`;
                card.style.zIndex = 5;
            } else if (offset > 0) {
                card.style.transform = `translateX(${offset * 30}px) scale(${1 - offset * 0.1}) rotate(${offset * 3}deg)`;
                card.style.zIndex = 4 - offset;
            } else {
                card.style.transform = `translateX(${offset * 30}px) scale(${1 + offset * 0.1}) rotate(${offset * 3}deg)`;
                card.style.zIndex = 4 + offset;
            }
        });

        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentIndex);
        });
    }

    // Initialize cards
    updateCards();
    
    // Add click handlers to cards
    cards.forEach((card, index) => {
        card.addEventListener('click', () => {
            currentIndex = index;
            updateCards();
        });
    });
    
    // Add click handlers to navigation dots
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentIndex = index;
            updateCards();
        });
    });
    
    // Add swipe functionality
    let touchStartX = 0;
    const wrapper = document.querySelector('.card-stack-wrapper');
    
    wrapper.addEventListener('touchstart', (e) => {
        touchStartX = e.touches[0].clientX;
    });
    
    wrapper.addEventListener('touchend', (e) => {
        const touchEndX = e.changedTouches[0].clientX;
        const diff = touchStartX - touchEndX;
        
        if (Math.abs(diff) > 50) { // minimum swipe distance
            if (diff > 0 && currentIndex < cards.length - 1) {
                currentIndex++;
            } else if (diff < 0 && currentIndex > 0) {
                currentIndex--;
            }
            updateCards();
        }
    });
});
</script>
<script>
   document.addEventListener('DOMContentLoaded', () => {
    const items = document.querySelectorAll('#faqAccordion-physio .accordion-item');

    items.forEach(item => {
        const collapse = item.querySelector('.accordion-collapse');
        const button = item.querySelector('.accordion-button');

        // OPEN all items by default
        collapse.classList.add('show');
        button.classList.remove('collapsed');
        button.setAttribute('aria-expanded', 'true');

        button.addEventListener('click', function () {
            items.forEach(it => {
                const btn = it.querySelector('.accordion-button');
                if (!btn.classList.contains('signed')) {
                    btn.classList.add('signed');
                }
            });
        });
    });
});
</script>

<?php get_footer(); ?>