<?php wp_footer(); ?>

<footer class="footer pt-5 pb-4 bgblue">
    <?php //echo do_shortcode('[user_subscribe_form_shortcode]'); ?>
    <div class="container-xxl text-center">
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

<!-- <div class="modal" tabindex="-1" id="coupan-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <img class="w-100" src="https://abilityclinic.ca/wp-content/uploads/2024/10/TAC-Coupon-Draft-2_page-0001.jpg" alt="TAC Coupon" />
            </div>
        </div>
    </div>
</div> -->

<!-- <script>
    $(window).on('load', function() {
        $('#coupan-modal').modal('show');
    });
</script> -->
<script>
    AOS.init();
</script>
</body>

</html>