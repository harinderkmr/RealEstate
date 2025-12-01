<?php 

/**

 * Template Name: Cortisone and Other Injectables

 */

get_header();

?>





<section class="sec content small-container services-page">

    <div class="container-sm container-xs">

    <h1 class="sport-med"><?= get_field('page_heading'); ?></h1>

        <div class="row mb-1">
                    <?php  if(have_rows('content-repeater')):

                        while( have_rows( 'content-repeater' ) ): the_row();?>

                            <p class="fw-light">

                                <?php echo get_sub_field('content'); ?>

                            </p>    

                        <?php endwhile; ?>

                    <?php endif; ?>

            

            <p class="text-underline"> <?php echo get_field('sub_heading')  ?> </p>

                    <?php  if(have_rows('cortisone-repeater')):

                        while( have_rows( 'cortisone-repeater' ) ): the_row();?>

                            <p class="fw-light">

                                <?php echo get_sub_field('sub_heading_list'); ?>

                            </p>    

                        <?php endwhile; ?>

                    <?php endif; ?>

           

        </div>

        <p class="fw-light text-center">Thank you for your understanding!</p>

    </div>

</section>

























<?php get_footer();?>