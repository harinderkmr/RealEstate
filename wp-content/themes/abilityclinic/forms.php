<?php

/**
 * Template Name: Forms
 */
get_header();
?>

<section class="margine-heading">
  <div class="container-fluid">
    <div class="  heading line-through referral-head  mb-5 white d-flex justify-content-center">
      <h1 class="sport-med bg-white mb-0 px-5">
        <?php echo get_field('page_heading'); ?>
      </h1>
    </div>
    <div class="row justify-content-center mt-5">
      <div class="col-lg-11 col-xl-8 text-center" id="pdf-fram-doc">
        <h2 class="">The Ability Clinic</h2>
        <p class="fw-light">
          <small>755 Queensway East, Suite 304 Mississauga, ON, L4Y 4C5</small>
        </p>
        
        <p class="fw-light">
          <small
            >Thank you for choosing The Ability Clinic. Please fill out this
            form to ensure that your patient receives the appropriate care. All
            information is Private and Confidential</small
          >
        </p>
        <div class="pdf-fram">
          <?php echo do_shortcode('[contact-form-7 id="c6522cc" title="Referral Form Default"]'); ?>
        </div>
        <br>
       
        <div class="more-form mt-5">
          <div class="heading py-3 px-4">
            <h2 class="lh-1 mb-0 text-white">Physicians</h2>
          </div>
          <div class="row select-form align-items-center">
            <?php $number=1; if( have_rows('page_pdf_image_repeater') ):
                            while( have_rows( 'page_pdf_image_repeater' ) ): the_row(); ?>

            <div class="col-md py-5 px-3">
              <?php $link = get_sub_field('pdf_link'); ?>
              <?php $pdf = get_sub_field("_file_"); ?>
              <div class="form-get text-center">
                <?php if($number === 2) {?>
                <img
                  id="patient-refferal"
                  src="<?php echo get_sub_field('pdf_image') ?>"
                  alt="adobe"
                  style="cursor: pointer;"
                />

                <?php } else {?>
                <a
                  class="img d-inline-flex"
                  href="<?php echo esc_url($link['url']); ?>"
                  ><img src="<?php echo get_sub_field('pdf_image') ?>" alt="ocean"
                /></a>
                <?php } ?>
                <div class="text">
                  <p>
                  <?php if($number === 2) {?>
                    <a  id="pdf_name_refferal" style="text-decoration: underline;" >
                      <?php echo get_sub_field('pdf_name');  ?>
                  </a>
                  <?php } else {?>
                    <a href="<?php echo esc_url($link['url']); ?>" >
                      <?php echo get_sub_field('pdf_name');  ?>
                    </a>
                  <?php } ?>
                    <br />
                    <span class="fst-italic"
                      >(
                      <?php echo get_sub_field('pdf_type');  ?>)
                    </span>
                  </p>
                </div>
              </div>
            </div>
            <?php if( $number === 1 ): ?>
            <!-- <div class="col-md-auto py-5 px-3">
              <p class="text-center"><span class="fst-italic">(OR)</span></p> 
            </div> -->
            <?php $number++ ?>
            <?php endif; ?>

            <?php endwhile; 
                        endif; ?>
          </div>
        </div>
      </div>
    </div>
    <p style="visibility: hidden" id="referralpdf">
        <?php echo $pdf['url']; ?>
    </p>
  </div>
  <div class="row justify-content-center">
      <div class="col-lg-10 col-xl-8 justify-content-center text-center">
        <?php echo get_field('page_content'); ?>
      </div>
  </div>
</section>

<?php get_footer(); ?>
