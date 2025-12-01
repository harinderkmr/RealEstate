<?php



/**

 * Template Name: saecopenia

 */

get_header();

?>

<section class="content section-blog-wrapper small-container services-page">
  <div class="container-sm container-xs">
  <h1 class="sport-med  "> <?= get_field('page_heading'); ?> </h1>

        

                <p class="fw-light"><?php echo get_field('page_content');  ?>  </p>



                

                    <!-- Page Repeater  -->

                    <?php  if(have_rows('page_data_repeater')):

                        while( have_rows( 'page_data_repeater' ) ): the_row();?>

                            <p class="fs-4 font-bold">

                                <?php echo get_sub_field('page_data_title'); ?> 

                            </p>  

                            <ul class="  px-md-5">

                            <?php  if(have_rows('page_data_list_repeater')):

                                while( have_rows( 'page_data_list_repeater' ) ): the_row();?>

                                    <li class="fw-light">

                                         <?php echo get_sub_field('page_value'); ?> 

                                    </li>    

                                <?php endwhile; ?>

                            <?php endif; ?>  

                            </ul>

                        <?php endwhile; ?>

                    <?php endif; ?>



          





                <p class="text-center fs-4 px-5 fw-light"><?php echo get_field('description'); ?></p>

        </div>

    </div>

</section>



<?php get_footer();

?>