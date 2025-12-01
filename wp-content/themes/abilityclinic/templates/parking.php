<?php /* Template Name: Parking */
get_header();
?>


<section class="margine-heading">
	<div class="container-fluid">
        <div class="  heading line-through referral-head white d-flex justify-content-center">
            <?php echo get_field('heading'); ?>
        </div>
	</div>	
</section>
<section class="content small-container pb-3 hero">
    <div class="container-sm container-xs">
    <div class="badge" style="background: #c9c9c9; border-radius: 50%;"><a href="https://healthydebate.ca/2021/08/topic/equitable-accessible-clinic/"><img class="w-100" src="https://abilityclinic.ca/wp-content/uploads/2024/02/rhfac-gold-blue.webp" alt="rhfac-gold-blue" /></a></div>
       <?php echo get_field('address_info'); ?>
        <?php if (have_rows('parking')) : while (have_rows('parking')) : the_row(); ?>
                <div class="parking text-center">
                     <?= get_sub_field('parking_caption'); ?>
                        <img src="<?= get_sub_field('parking_image')['url']; ?>" alt="<?= get_sub_field('parking_image')['alt']; ?>"class="gallery__images-small w-100" />
                </div>
        <?php endwhile;
        endif; ?>

    </div>
    </div>
</section>


<?php get_footer(); ?>




