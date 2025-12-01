<?php
/**
 * Template Name: Media
 */
    get_header();
 ?>


<section class="content section-blog-wrapper small-container services-page">
  <div class="container-sm container-xs">
  <h1 class="sport-med  ">Media</h1>
      <div class="media-block" id="media-block">
         <video class="w-100" id="media_video" src="<?php echo get_field('about_media_video'); ?>" controls muted autoplay loop poster=""></video>
         <div class="healthy-debate-article position-relative">
            <img src="<?php echo get_field('about_section_image');?>" alt="healthy-debate-article" class="img-fluid">
            <?php $ReadMore = get_field('about_section_image_url'); ?>
            <div class="cta-air position-absolute start-50 translate-middle-x">
               <a 
                  class="cta d-inline-flex rounded-0 shadow" 
                  href="<?php echo esc_url($ReadMore['url']); ?>">
                  <?php echo esc_html($ReadMore['title']); ?>
               </a>
            </div>
         </div>
      </div>
   </div>
</section>

   <section class="sec certification bgblue">
      <div class="container d-flex align-items-center justify-content-center">
         <div class="img mb-4"><img src="<?php echo get_field('certification_image'); ?>" alt="certification_image" class="img-fluid"></div>
         <div class="text media-block ms-5">
            <p class="text-white fw-light lh-sm">
               <?php echo get_field('certification_description_'); ?></p>
         </div>
      </div>
</section>


<section class="sec certification">
      <div class="container d-flex align-items-center justify-content-center">
         <?php $link_1 =  get_field('certification_badge_1_link'); ?>
         <div class="img mb-4"><a href="<?php echo esc_url($link_1['url']); ?>" ><img src=" <?php echo get_field('certification_badge_1_'); ?>" alt="certification_badge_1" class="img-fluid"></a></div>
         <?php $link_2 = get_field('certification_badge_2_link'); ?>
         <div class="img mb-4"><a href="<?php echo esc_url($link_2['url']); ?>"><img src="<?php echo get_field('certification_badge_2'); ?>" alt="certification_badge_2" class="img-fluid"></a></div>
      </div>
</section>







<?php get_footer(); ?>