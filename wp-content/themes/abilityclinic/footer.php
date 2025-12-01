<?php wp_footer(); ?>

<?php if(have_rows('site_footer_section' , 'option')) :
    while(have_rows('site_footer_section' , 'option')): the_row(); ?>
        <section class="contact-text bgblue py-4">
            <div class="container-xxl text-center" style="max-width: 600px">
            <?php  echo get_sub_field('address'); ?>
                <div class="social mt-0 mb-4">
                    <ul class="nav justify-content-center">
                        <?php if(have_rows('social_icons' , 'option')): 
                            while(have_rows('social_icons' , 'option')): the_row(); ?>
                            <?php $img = get_sub_field('social_image'); ?>
                            <?php $btn = get_sub_field('social_image_url'); ?>
                                <li class="mx-1">
                                    <a target="_blank" href="<?php echo $btn['url']; ?>"><img src="<?php echo $img['url']; ?>" alt="Social media icon" /></a>
                                </li>
                            <?php endwhile; 
                        endif; ?>
                    </ul>
                </div>
                <?php $btn = get_sub_field('fee_button_link_' , 'option'); ?>
                <a class="cta" href="<?php echo $btn['url']; ?>" style="font-size: 19px; "><?php echo $btn['title']; ?></a>

            </div>
        </section>
    <?php endwhile; 
endif; ?>





<footer class="footer pt-5 pb-4 bgblue">
    <div class="container-xxl text-center">
        <?php //echo do_shortcode('[user_subscribe_form_shortcode]') ?>
        <p>&copy; <?php the_field('copyright', 'option'); ?></p>
        <ul class="nav justify-content-center mb-0">
            <?php $i = 1;
            if (have_rows('footer_', 'option')) : while (have_rows('footer_', 'option')) : the_row();
                    $footer_pages = get_sub_field('footer_pages'); ?>
                    <li><a href="<?php echo $footer_pages['url']; ?>"><?php echo $footer_pages['title']; ?></a></li>
                    <?php if ($i < 4) : ?> <li class="mx-3">|</li><?php endif; ?>
            <?php $i++;
                endwhile;
            endif; ?>
        </ul>
    </div>
</footer>



<div class="modal fade" id="responseModal" tabindex="-1" aria-labelledby="responseModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title fw-text">Ability Clinic</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="responseModalBody"> 
        Thanks for your Feedback
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
 <?php if (2==1) : ?>
<div class="modal fade" id="appointModal" tabindex="-1" aria-labelledby="appointModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-text" id="appointModalLabel">Appointment Booking Service Under Construction</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fw-text">
        <p class="" style="font-style: normal; font-weight: 300;">We are currently enhancing our appointment booking service to serve you better. We apologize for any inconvenience this may cause and appreciate your patience.</p>
      </div>
      <div class="modal-footer">
        <p class="" style="font-style: normal; font-weight: 300;">Thank you for your understanding and support.</p>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

</body>

</html>