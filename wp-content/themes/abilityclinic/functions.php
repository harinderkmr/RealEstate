<?php

/**
 * Enqueue scripts 
 */
function custom_scripts()
{
    wp_enqueue_style('style-name', get_stylesheet_uri());
    wp_enqueue_style('bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css");
    wp_enqueue_style('custom', get_template_directory_uri() . '/css/app.min.css');
    wp_enqueue_style('custom-css', get_template_directory_uri() . "/css/custom_min.css", array(), rand(0000,9999));
    // wp_enqueue_style('dexa-css', get_template_directory_uri() . '/css/dexa.css');
    wp_enqueue_style('dexa-css', get_template_directory_uri() . '/css/dexa-min.css',  array(), rand(0000,9999));
    wp_enqueue_style('faq-css-css', get_template_directory_uri() . '/css/faq-css.css');
    wp_enqueue_style('bootstrap-icons', "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css");
    wp_enqueue_style('aos-style', "https://unpkg.com/aos@next/dist/aos.css");
    wp_enqueue_style('owl-carousel', "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css");
    wp_enqueue_style('font-awesome' , "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css");
    wp_enqueue_style('slick', "https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css");
    wp_enqueue_style('font-animate' , "https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css");




    wp_enqueue_script('bootstrap-bundle', "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js");
    // wp_enqueue_script('jquery', "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js");
    wp_enqueue_script('aos-script', "https://unpkg.com/aos@next/dist/aos.js");
    wp_enqueue_script('owl-carousel-script', "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js");
    wp_enqueue_script('base', get_template_directory_uri() . '/js/base.js');
    wp_enqueue_script('slick-script', "https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js");
    wp_enqueue_script('animation-script', "https://alexandrebuffet.fr/codepen/slider/slick-animation.min.js");

    




    wp_enqueue_script(
        'cube-gallery',
        get_template_directory_uri() . '/js/cube-gallery.min.js',
        array(
            'in_footer' => true,
        )
    );

    wp_enqueue_script(
        'base',
        get_template_directory_uri() . '/js/base.js',
        array(
            'in_footer' => true,
        )
    );

    
    wp_localize_script( 'base' , 'ajaxarticles' , array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce('ajax-nonce'),
    ) );
    
}
add_action('wp_enqueue_scripts', 'custom_scripts');




// Roles 
/**
 * 
 * ADDED USER ROLES TO HIDE THE PAGES AND CONTENT 
 * 
 */
function add_new_role() {
    add_role(
        'ability_editor',
        'Ability Editor',
        array(
            'read'         => true,
            'skimet_plugin_user' => true,
            'manage_options' => true,
        ),
    );
}
add_action( 'init', 'add_new_role' );

function restrict_admin_menu() {
    if (current_user_can('ability_editor')) {
        remove_menu_page('edit.php'); // Posts
        remove_menu_page('upload.php'); // Media
        remove_menu_page('edit-comments.php'); // Comments
        remove_menu_page('tools.php'); // Tools
        remove_menu_page('options-general.php'); // Settings
    }
}
add_action('admin_menu', 'restrict_admin_menu');

function my_theme_setup(){
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'my_theme_setup');

function restrict_plugins_menu() {
    if (current_user_can('ability_editor')) {
        // Check if the user has access to the specified plugin
        if (!current_user_can('skimet_plugin_user')) {
            // Remove the "Plugins" menu item
            remove_menu_page('plugins.php');
        }
    }
}
add_action('admin_menu', 'restrict_plugins_menu');

// Add Roles
/**
 * 
 * END CODE 
 */

// Custom Logo
add_theme_support('custom-logo');

// Register Menus
function register_my_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu'),
            // 'extra-menu' => __('Extra Menu')
            'article-menu' => __('Article Menu'),
        )
    );
}
add_action('init', 'register_my_menus');

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'    => 'Footer',
        'menu_title'    => 'Footer',
        'menu_slug'     => 'footer',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    acf_add_options_page(array(
        'page_title'    => 'Footer Alternate',
        'menu_title'    => 'Footer Alternate',
        'menu_slug'     => 'footer-alternate',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

add_filter('walker_nav_menu_start_el', 'parent_menu_dropdown', 10, 4);
function parent_menu_dropdown($item_output, $item, $depth, $args)
{

    if (is_nav_menu('Primary Menu') && !empty($item->classes) && in_array('menu-item-has-children', $item->classes)) {
        return $item_output . '<span class="arrow d-flex align-items-center justify-content-center text-white"><i class="bi bi-chevron-down d-xl-none"></i><i class="bi bi-chevron-right d-none d-xl-block"></i></span>';
    }

    return $item_output;
}


function ajax_articles() {
    check_ajax_referer('ajax-nonce', 'security');
    $query = isset($_POST['query']) ? sanitize_text_field($_POST['query']) : '';
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
    
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
    );

    if ($query) {
        $args['s'] = $query;
    }

    if ($category) {
        $args['category_name'] = $category;
    }
    $query = new WP_Query($args);
    $posts_data = array(); // Initialize the array outside the loop

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            // $post_id = get_the_ID();
            $post_title = get_the_title();

            $post_content = apply_filters('the_content', get_the_content());
            $content = strip_tags($post_content);
            $content = wp_trim_words($content , 20 , '...');

            $post_author = get_the_author();
            $post_url = get_permalink();
            $post_category = get_the_category();

            $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');

            // Store relevant data in an array
            $posts_data[] = array(
                'title' => $post_title,
                'content' => $content,
                'author' => $post_author ,
                'post_url' => $post_url,
                'post_category' => $post_category ,
                'featured_image' => $featured_image_url
            );
        }
        wp_reset_postdata();
    }

    // Send the array of post data as JSON after the loop
    wp_send_json($posts_data);
    die();
}
add_action('wp_ajax_ajax_articles', 'ajax_articles');
add_action('wp_ajax_nopriv_ajax_articles', 'ajax_articles');



add_action( 'admin_menu', 'create_post_template_meta_box' );
function create_post_template_meta_box() {
    add_meta_box(
        'post_template_meta_box', __( 'Select Template', 'my-domain' ), 'display_post_template_meta_box',
        'post',
        'side',
        'high'
    );
}

function display_post_template_meta_box( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'post_template_nonce' );

    $selected_template = get_post_meta($post->ID, '_custom_post_template', true);
    ?>
    <div class="components-panel__body">
        <div class="components-panel__template-dropdown">
            <!-- <label for="post_template"><?php _e('Select Template Type:', 'my-domain'); ?></label> -->
            <select id="post_template" name="post_template_type" >
                <option  value="post" <?php selected($selected_template, 'post'); ?>><?php _e('Post Template', 'my-domain'); ?></option>
                <option value="page" <?php selected($selected_template, 'page'); ?>><?php _e('Page Template', 'my-domain'); ?></option>
            </select>
        </div>
    </div>
    <?php
}


add_action( 'save_post', 'save_post_template_meta' );
function save_post_template_meta( $post_id ) {
    if ( ! isset( $_POST['post_template_nonce'] ) ) {
        return;
    }

    if ( ! wp_verify_nonce( $_POST['post_template_nonce'], basename( __FILE__ ) ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['post_template_type'] ) ) {
        update_post_meta( $post_id, '_custom_post_template', sanitize_text_field( $_POST['post_template_type'] ) );
    }
}

// remove_action(
// 	'wpcf7_swv_create_schema',
// 	'wpcf7_swv_add_checkbox_enum_rules',
// 	20, 2
// );







function more_post_ajax() {
    $ppp = isset($_POST['ppp']) ? intval($_POST['ppp']) : 6;
    $page = isset($_POST['pageNumber']) ? intval($_POST['pageNumber']) : 1;
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';


    $args = array(
        'suppress_filters' => true,
        'post_type'        => 'post',
        'posts_per_page'   => $ppp,
        'post_status'      => 'publish',
        // 'orderby'          => 'rand',
        'orderby'          => 'date', // Changed from 'rand'
        'order'            => 'desc',
        'paged'            => $page,
        'category__not_in' => 'procedure',
        'meta_query'       => array(
            'relation' => 'OR',
            array(
                'key'     => '_custom_post_template',
                'compare' => 'NOT EXISTS',
            ),
            array(
                'key'     => '_custom_post_template',
                'value'   => 'page',
                'compare' => '!=',
            ),
        ),
    );

    // if( !empty( $category ) && $category !== 'articles' ){
    //     $args['category'] = $category;
    // }
 if( !empty( $category ) && $category !== 'articles' ){
        $args['category_name'] = $category;
    }

    $loop = new WP_Query($args);
    $out = '';

    if ($loop->have_posts()) {
        while ($loop->have_posts()) : $loop->the_post();

        $out .= '<div class="col-md-6">
            <div class="border h-100">

                <div class="img d-md-flex justify-content-md-center align-items-md-center w-100 order-md-2" style="height: 196px;">';
                
                if (has_post_thumbnail()) {
                    $out .= get_the_post_thumbnail(null, 'large', array('class' => 'featured-image img-fluid wrap-image-article w-100 h-100', 'style' => 'object-fit: cover;'));
                } else {
                    $out .= '<img src="/wp-content/uploads/2024/01/cropped-logo-icon.webp" alt="Default Image" class="img-fluid wrap-image-article p-1" style="object-fit: cover; height: 100%; width: 100%;" />';
                }

                $out .= '</div>

                <div class="p-md-4 order-md-1 p-2 w-100 justify-content-between ">
                    <div class="post-content-article mb-md-0 mb-4 overflow-y-hidden">
                        <h2 class="fs-4 fw-bold"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>';

                        $Content = get_the_content(); 
                        $content = strip_tags($Content);
                        $content = wp_trim_words($content , 15 , '...');

                        $out .= '<small class="fw-light d-flex align-items-center mb-3">' . $content . '</small>
                        <small class="fw-bold d-flex align-items-center"><a class="text-decoration-none" style="color: #f97224;" href="' . get_the_permalink() . '">Read More &nbsp;&nbsp;<i class="fa-solid fa-arrow-right-long"></i></a></small>
                    </div>
                </div>
            </div>
        </div>';
         
        endwhile;
        wp_reset_postdata();
    }

    die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');






add_filter( 'manage_post_posts_columns', 'add_template_type_column' );
function add_template_type_column( $columns ) {
    $columns['template_type'] = 'Template';
    return $columns;
}
add_action( 'manage_post_posts_custom_column', 'populate_template_type_column', 10, 2 );
function populate_template_type_column( $column, $post_id ) {
    if ( $column === 'template_type' ) {
        $template_type = get_post_meta( $post_id, '_custom_post_template', true );
        if( $template_type == ''){
            echo 'Post';
        } else{
            echo ucfirst(esc_html( $template_type) );
        } 
    }
}





/**
 * Tinymce
 */

 function modify_bar_tinymce($init_array){
    $init_array['fontsize_formats'] = '8pt 10pt 12pt 14pt 16pt 18pt 20pt 22pt 24pt 26pt 28pt 30pt 32pt 64pt';
    return $init_array;
 }
 add_action( 'tiny_mce_before_init', 'modify_bar_tinymce' );

 
 function my_mce_buttons_2($buttons) {  
    array_unshift($buttons, 'fontsizeselect'); 
    return $buttons;
}
add_filter('mce_buttons_2', 'my_mce_buttons_2');



@ini_set('upload_max_size', '500M');
@ini_set('post_max_size', '400M');
@ini_set('max_execution_time', '900');

add_action('wp_enqueue_scripts', 'dequeue_cf7_styles_on_homepage');
function dequeue_cf7_styles_on_homepage() {
    if (is_front_page()) {
        wp_dequeue_style('contact-form-7');
        wp_dequeue_style('plugin_base_style');
        wp_dequeue_style('ct_public_css');
        wp_dequeue_script('base-page_plugin_script');
        wp_dequeue_script('swv');
        wp_dequeue_script('contact-form-7');
        wp_dequeue_script('contact-form-7-js-extra');
        wp_dequeue_script('ct-bot-detector-wrapper');  
        wp_dequeue_script('ct_public_functions'); 
        wp_dequeue_script('ct_bot_detector');
       
    }
}


/**
 * Enable support for Svg uploads
 */
add_filter( 'upload_mimes', 'my_img_mime_types' );
function my_img_mime_types( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');