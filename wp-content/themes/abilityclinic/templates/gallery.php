<?php /* Template Name: gallery */
get_header();
?>

<section class="clinic-gallery">
    <div class="container-fluid">
        <div class="gallery" id="gallery">
            <!-- image gallery -->
            <?php $i = 1;
            if (have_rows('clinic_gallery')) : while (have_rows('clinic_gallery')) : the_row(); ?>
                    <div class="gallery__images-item <?php echo $i % 2 == 0 ? "two" : "one"; ?>">
                        <a href="#<?php echo $i; ?>" class="gallery__images-link">
                            <span class="overlay"></span>
                            <img src="<?php echo get_sub_field('gallery_image'); ?>" class="gallery__images-small" />
                        </a>
                    </div>
            <?php $i++;
                endwhile;
            endif; ?>

            <!-- gallery lightbox -->
            <?php $j = 1;
            if (have_rows('clinic_gallery')) : while (have_rows('clinic_gallery')) : the_row(); ?>
                    <div class="gallery__lightbox" id="<?php echo $j; ?>">
                        <div class="gallery__lightbox-content">
                            <a href="#" class="close"> × </a>
                            <img src="<?php echo get_sub_field('gallery_image'); ?>" class="gallery__lightbox-image" />
                            <?php if ($j == 1) { ?>
                                <a href="#2" class="next">
                                    <i class="fas fa-chevron-right"></i>
                                </a><?php } else { ?>
                                <a href="#<?php echo $j; ?>" class="back">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                                <a href="#<?php echo $j + 1; ?>" class="next">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
            <?php $j++;
                endwhile;
            endif; ?>

        </div>
    </div>
</section>





<?php get_footer(); ?>