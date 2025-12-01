<?php

/**
 * The template for displaying all single posts and attachments
 *
 *
 */

get_header(); ?>





<?php

    $post_id = get_the_ID();
    $selected_template = get_post_meta( $post_id, '_custom_post_template', true );
    
    $post_template = 'post-single';
    $page_template = 'page-single';
    if( $selected_template == '' || $selected_template == null ){
        $template_to_use = 'post-single';
    }else{

        $template_to_use = !empty($selected_template) ? ($selected_template == 'post' ? $post_template : $page_template ): $page_template;
    }

    get_template_part('templates/'.$template_to_use);
    


?>


<?php get_footer(); ?>