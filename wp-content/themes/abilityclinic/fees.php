<?php

/**
 * Template Name: Fees
 */
get_header();
?>
<section class="sec content small-container services-page">
    <div class="container-sm container-xs">

       <h1 class="sport-med">
            <?php
            if(have_rows('no_show_policy')):
                while(have_rows('no_show_policy')):
                    the_row();
                    ?>
            <?php
            $main_heading= get_sub_field('main_head');
            if($main_heading):
                echo esc_html($main_heading);
            ?>
            <?php
                endif;
            endwhile;
        endif;
    ?>
        
        </h1>

        <p class="fw-light">
        <?php
            if(have_rows('no_show_policy')):
                while(have_rows('no_show_policy')):
                    the_row();
                    ?>
            <?php
            $main_para= get_sub_field('para');
            if($main_para):
                echo wp_kses_post($main_para);
            ?>
            <?php
                endif;
            endwhile;
        endif;
    ?>
        </p>


        <h2 class="font-bold fs-4 fw-bold p-3 mb-3 text-center"> 
            <?php
            if(have_rows('wait')):
                while(have_rows('wait')):
                    the_row();
                    ?>
            <?php
            $head= get_sub_field('head');
            if($head):
                echo esc_html($head);
            ?>
            <?php
                endif;
            endwhile;
        endif;
    ?>
    </h2>

        <p class="fw-light">
        <?php
            if(have_rows('wait')):
                while(have_rows('wait')):
                    the_row();
                    ?>
            <?php
            $para1= get_sub_field('para1');
            if($para1):
                echo wp_kses_post($para1);
            ?>
            <?php
                endif;
            endwhile;
        endif;
    ?>
        </p>    

    </div>
</section>



<?php get_footer(); ?>