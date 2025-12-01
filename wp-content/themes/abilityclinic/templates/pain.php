<?php

/**
 * Template Name: pain
 */
get_header();
?>


<section class="content section-blog-wrapper small-container services-page">
  <div class="container-sm container-xs">
  <h1 class="sport-med  "> <?= get_field('page_heading'); ?> </h1>
        <!-- Page Repeater  -->
        <ul>
        <?php  if(have_rows('info_link_repeater')):
            while( have_rows( 'info_link_repeater' ) ): the_row();?>
            <?php $link = get_sub_field('info_link'); ?>
                <li class="fw-light fs-3" ><a href="<?php echo esc_url($link['url']); ?>" > <?php echo esc_html($link['title']); ?> </a> </li>
            <?php endwhile; ?>
        <?php endif; ?>
        </ul>
    </div>
</div>
</section>


<section class="content">
    <div class="container-fluid p-0 m-0">
        <div class="align-items-center d-flex justify-content-center">
            <img src="<?php echo get_field('page_image'); ?>" class="img-fluid" alt="pain" style="width: 100%;">
        </div>
    </div>
</section>

<section class=" content small-container">
    <div class="container-sm container-xs">
        <?php $Number = 1;  if(have_rows('page_content_repeater')):
            while( have_rows( 'page_content_repeater' ) ): the_row();?>
            <p id="pain_sec_<?php echo $Number; ?>">&nbsp;</p>
                <h2 class="fw-bold fw-light fs-3 pt-5 mb-3" ><?php echo get_sub_field('page_content_title'); ?></h2>
                <ul class="list-unstyled">
                    <?php if(have_rows('page_content_value_repeater')):
                        while(have_rows('page_content_value_repeater')): the_row(); ?>
                            <li class="fw-light mb-3"><?php echo get_sub_field('page_content_value_'); ?></li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
                <?php $ReadMore = get_sub_field('read_more'); ?>
                <?php if($ReadMore){ ?>
                <p class="text-center"><a 
                    href="<?php echo esc_url($ReadMore['url']); ?>" 
                    class="fw-light text-center">
                    <?php echo esc_html($ReadMore['title']); ?>
                </a></p>
                <?php } ?>
                <p class="fw-light mb-4 p-3 text-center"> <?php echo get_sub_field('description'); ?> </p>
                <?php $Number++; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>








<?php get_footer();
?>