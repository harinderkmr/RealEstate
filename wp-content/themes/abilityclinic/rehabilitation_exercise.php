<?php
/**
 * Template Name: rehabilitation exercise
 */
get_header();
?>
<section class="content section-blog-wrapper small-container services-page">
  <div class="container-sm container-xs">
    <h1 class="sport-med text-center"><?php echo get_field('page_heading'); ?></h1>
    <div class="row justify-content-center">

        <div class="exercise-text text-center">
          <?php if (have_rows('body_type_category')) : while (have_rows('body_type_category')) : the_row(); ?>
              <h3 class="fw-bold fw-text fw-light"><?= get_sub_field('category_name'); ?></h3>
              <ul class="cta-list mb-5 list-unstyled">
                <?php if (have_rows('buttons')) : while (have_rows('buttons')) : the_row();
                    $buttons = get_sub_field('part_category_button'); ?>
                    <li class="mt-3 fw-text fw-light"><a class="cta d-inline-flex dark-orange solid justify-content-center  px-4" href="<?= $buttons['url']; ?>"><?= $buttons['title']; ?></a></li>
                <?php endwhile;
                endif; ?>
              </ul>
          <?php endwhile;
          endif; ?>
          <?php echo get_field('body_description'); ?>
        </div>
        <div class="exercise-map position-relative">
          <div class="img"><img src="<?php echo get_field('body_image')['url']; ?>" alt="<?php echo get_field('body_image')['alt']; ?>" class="img-fluid" alt="" />
          </div>
          <div class="map-exercise-ctas">
            <?php if (have_rows('arrow-repeater')) :
              while (have_rows('arrow-repeater')) : the_row();
                $body_parts = get_sub_field('arrow_body_parts');
                $body_array = ['knee', 'shoulder', 'hand'];
                $parts = get_sub_field('span_class'); ?>
                <span class="part <?php echo $parts; ?>">
                  <?php if (in_array($parts, $body_array)) { ?>
                    <span class="arrow"><img src="<?php echo get_sub_field('arrow')['url']; ?>" alt="<?php echo get_sub_field('arrow')['alt']; ?>"width="75" height="65" /></span>
                    <a class="cta fw-light d-inline-block text-center" href="<?php echo $body_parts['url']; ?>"><?php echo $body_parts['title']; ?></a>
                  <?php } else { ?>
                    <a class="cta fw-light d-inline-block text-center" href="<?php echo $body_parts['url']; ?>"><?php echo $body_parts['title']; ?></a>
                    <span class="arrow"><img src="<?php echo get_sub_field('arrow')['url']; ?>"alt="<?php echo get_sub_field('arrow')['alt']; ?>"width="75" height="65" /></span>
                  <?php } ?>
                </span>
            <?php endwhile;
            endif; ?>
          </div>
        </div>
     
    </div>
  </div>
</section>
<?php if (have_rows('rehab_main_section')) : while (have_rows('rehab_main_section')) : the_row(); ?>
    <section class="pad-scroll sec small-container pb-0" id="<?php echo get_sub_field('scroll_id'); ?>">
      <div class="bgblue py-4 text-center">
        <h2 class="fs-2 lh-1 mb-0 text-white"><?php echo get_sub_field('head_name'); ?></h2>
      </div>
      <div class="container container-sm container-xs mb-2">
        <div class="row justify-content-center">
          <?php if (have_rows('body_part_repeater')) : while (have_rows('body_part_repeater')) : the_row(); ?>
              <div class="col-md-4 align-items-center d-flex flex-column justify-content-end mt-5">
                <div class="img align-items-end d-flex justify-content-center mb-2" style="width: 240px"><img class="img-fluid" src="<?php echo get_sub_field('part_image')['url']; ?>" alt="<?php echo get_sub_field('part_image')['alt']; ?>" /></div>
                <p><?php echo get_sub_field('part_name'); ?></p>
              </div>
          <?php endwhile;
          endif; ?>
        </div>
      </div>
    </section>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>