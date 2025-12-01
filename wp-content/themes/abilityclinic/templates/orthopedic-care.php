<?php /* Template Name: Orthopedic Care */
get_header();
?>

<section class="sec content small-container">
    <div class="container-sm container-xs">
        <h2 class="font-bold mb-3"> <?php echo get_field('page_heading'); ?> </h2>
        <?php if (have_rows('part_care_repeater')) :
            while (have_rows('part_care_repeater')) : the_row(); ?>
                <h6 class="fw-light"><?php echo get_sub_field('part_care_heading');  ?></h6>
                <ul class=" px-3 px-md-5 ">
                    <?php if (have_rows('part_care_item_repeater')) :
                        while (have_rows('part_care_item_repeater')) : the_row(); ?>
                            <li class="fw-light"> <?php echo get_sub_field('part_care_list'); ?> </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            <?php endwhile; ?>
        <?php endif; ?>
        <img class="d-block m-auto" src="<?php echo get_field('page_image'); ?>">
    </div>
    </div>
</section>

<section class="content small-container">
    <div class="container-sm container-xs">
        <h6 class="fw-light"><?php echo get_field('part_condition_heading'); ?></h6>
        <ul class="list-unstyled px-3 px-md-5">
            <?php if (have_rows('part_condition_repeater')) :
                while (have_rows('part_condition_repeater')) : the_row(); ?>
                    <?php $button = get_sub_field('part_condition_title'); ?>
                    <li class="fw-light"><a class="fs-5 font-bold" href="<?php echo esc_url($button['url']); ?>"><?php echo esc_html($button['title']); ?></a>: &nbsp;<?php echo get_sub_field('part_condition_description'); ?> </li>
                <?php endwhile; ?>
            <?php endif; ?>
        </ul>
    </div>
    </div>
</section>

<?php get_footer(); ?>