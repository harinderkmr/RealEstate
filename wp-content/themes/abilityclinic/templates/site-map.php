<?php 
/**
 * Template Name: site-map
 */
 get_header();
?>


<section class="margine-heading content small-container">
    <div class="container-sm container-xs">
        <div class="heading line-through referral-head mb-5 white d-flex justify-content-center">
        <h1 class="sport-med  "> <?= get_field('page_heading'); ?> </h1>
        </div>
        <ul class="list-unstyled px-md-1 site-link" >
            <!-- site_map_pages_link_Repeater -->
            <?php if (have_rows('site_map_pages_link_repeater')) :
                while (have_rows('site_map_pages_link_repeater')) : the_row(); ?>
                    <h2 class="fs-5  fw-bold mt-3 text-decoration-underline"><?php echo get_sub_field('site_map_heading'); ?></h2>
                    <ul>
                        <!-- Site Map Link Repeater -->
                        <?php if (have_rows('site_map_link_repeater')) :
                            while (have_rows('site_map_link_repeater')) : the_row(); ?>
                                <?php $siteMapLink = get_sub_field('site_map_link'); ?>
                                <li class="fw-light mb-0 px-3">
                                    <a href="<?php echo esc_url($siteMapLink['url']); ?>" class="" style="color: #00305b;"><?php echo esc_html($siteMapLink['title']); ?></a>
                                </li>

                                <ul>
                                    <!-- Map Link Repeater  -->
                                    <?php if( have_rows( 'map_link_repeater' ) ):
                                        while( have_rows( 'map_link_repeater' ) ): the_row(); ?>
                                            <?php $MapLink = get_sub_field('map_link'); ?>
                                            <li class="fw-light px-3 mb-0">
                                                <a href="<?php echo esc_url($MapLink['url']); ?>" class="" style="color: #00305b;"><?php echo esc_html($MapLink['title']); ?></a>
                                            </li>

                                            <ul>
                                            <!--Under  Map Link Repeater  -->
                                            <?php if( have_rows( 'under_map_link_repeater' ) ):
                                                while( have_rows( 'under_map_link_repeater' ) ): the_row(); ?>
                                                    <?php $MapLink = get_sub_field('under_map_link'); ?>
                                                    <li class="fw-light px-3 mb-0">
                                                        <a href="<?php echo esc_url($MapLink['url']); ?>" class="" style="color: #00305b;"><?php echo esc_html($MapLink['title']); ?></a>
                                                    </li>
                                                         <ul>
                                                         <!--Under   Link Repeater  -->
                                                        <?php if( have_rows( 'link_repeater' ) ):
                                                             while( have_rows( 'link_repeater' ) ): the_row(); ?>
                                                                <?php $MLink = get_sub_field('links'); ?>
                                                                    <li class="fw-light px-3 mb-0"><a href="<?php echo esc_url($MLink['url']); ?>" class="" style="color: #00305b;"><?php echo esc_html($MLink['title']); ?></a></li>
                                                            <?php endwhile;
                                                         endif; ?>
                                                        </ul>
                                                <?php endwhile;
                                            endif; ?>
                                            </ul>

                                        <?php endwhile;
                                    endif; ?>
                                </ul>
                                
                            <?php endwhile;
                        endif; ?>
                    </ul>
                <?php endwhile;
            endif; ?>
        </ul>    
    </div>
</section>

<?php get_footer();
?>












