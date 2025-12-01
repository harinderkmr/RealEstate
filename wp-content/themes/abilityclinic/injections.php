<?php
/**
 * Template Name: ultrasound-guided injections
 */
get_header();
?>
<section class="sec content small-container services-page">
    <div class="container-sm container-xs">
        <div class="row justify-content-center">
                <?= get_field('page_heading'); ?>
                    <?php if (have_rows('page_content_repeater')) :
                        while (have_rows('page_content_repeater')) : the_row(); ?>
                            <span class="fw-light" > <?php echo get_sub_field('page_content') ?></span>
                        <?php endwhile; ?>
                    <?php endif; ?>
                            
                    <?= get_field('page_content_heading'); ?>
                <ul style="padding-left:56px;" >
                    <?php if (have_rows('page_content_list')) :
                        while (have_rows('page_content_list')) : the_row(); ?>
                            <li class="fw-light" > <?php echo get_sub_field('content_view') ?></li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                </ul>
                    <?= get_field('page_procedure_heading'); ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 mb-3">
                            <?php if(have_rows('procedure_content_repeater')): 
                                while(have_rows('procedure_content_repeater')): the_row(); ?>
                                <?php $ProBtn = get_sub_field('procedure_content'); ?>
                                    <li class="fw-light" style="padding-left:25px;"> <a href="<?= $ProBtn['url'] ?>"><?php echo $ProBtn['title']; ?> </a> </li>
                                <?php endwhile; 
                            endif; ?>
                            <!-- <?php
                            $args = array(
                                'post_type' => 'post',
                                'category_name' => 'procedure',
                                'posts_per_page' => -1 , 
                                'order'          => 'ASC'
                            );
                            $the_query = new WP_Query($args); ?>
                            <ul>
                                <?php if ($the_query->have_posts()) : ?>
                                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                        <li class="fw-light"> <a href="<?= the_permalink(); ?>"><?php the_title(); ?> </a> </li>
                                    <?php endwhile;
                                    wp_reset_postdata();  ?>
                                <?php endif; ?>
                            </ul> -->
                        </div>
                        <div class="col-md-5 mobile-update">
                            <?php if (have_rows('page_procedure_image_repeater')) :
                                while (have_rows('page_procedure_image_repeater')) : the_row(); ?>
                                <?php $link = get_sub_field('page_procedure_image_links'); ?>
                                <a href="<?php echo esc_url($link['url']); ?>" >
                                <img class="img-fluid"  src="<?php echo esc_url(get_sub_field('page_procedure_image')['url']); ?>"  alt="<?php echo esc_attr(get_sub_field('page_procedure_image')['alt']); ?>" />
                                </a>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="image-placement d-none d-md-block text-center">
                    <img class="w-100" src="<?php echo get_field('page_image'); ?>" alt="Page Image">
                </div>
                    <?= get_field('page_information_'); ?>
                <ul style="padding-left:56px;">
                    <?php if (have_rows('page_information_link_repeater')) :
                        while (have_rows('page_information_link_repeater')) : the_row(); ?>
                            <?php $button = get_sub_field('page_information_link'); ?>
                            <li class="fw-light" ><a href="<?php echo esc_url($button['url']); ?>"> <?php echo esc_html($button['title']); ?> </a></li>
                        <?php endwhile; ?>
                    <?php endif ?>
                </ul>
          
        </div>
    </div>
</section>


<?php get_footer(); ?>