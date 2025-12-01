<?php
/*
Plugin Name: Custom Popup
Description: Popup plugin powered by ACF
Version: 1.0
Author: Harry
*/

// Exit if accessed directly
if (! defined('ABSPATH')) exit;

// Load scripts
add_action('wp_enqueue_scripts', 'cp_enqueue_scripts');
function cp_enqueue_scripts()
{
    wp_enqueue_style('cp-style', plugin_dir_url(__FILE__) . 'assets/popup.css');
    wp_enqueue_script('cp-script', plugin_dir_url(__FILE__) . 'assets/popup.js', ['jquery'], null, true);
}

// ============================
// Load ACF options page
// ============================
add_action('acf/init', 'cp_register_acf_options');
function cp_register_acf_options()
{
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Popup Settings',
            'menu_title' => 'Popup Settings',
            'menu_slug'  => 'popup-settings',
            'capability' => 'edit_posts',
            'redirect'   => false,
            'icon_url'   => 'dashicons-format-image'
        ]);
    }
}

// ============================
// Render popup HTML in footer
// ============================
add_action('wp_footer', 'cp_render_popup');
function cp_render_popup()
{
    if (!function_exists('get_field')) return;

    $enabled = get_field('enable_popup', 'option');
    if (!$enabled) return;

    // Get ACF option fields
    $title            = get_field('popup_title', 'option');
    $popup_content    = get_field('popup_content', 'option');
    $bg               = get_field('popup_bg_color', 'option');
    $popup_button     = get_field('popup_button_text', 'option');
    $popup_icon       = get_field('popup_icon', 'option');
    $popup_pages      = get_field('popup_pages', 'option'); // Post Object type
    $popup_type       = get_field('popup_type', 'option') ?: 'modal'; // modal | banner | slide-in
    $banner_position  = get_field('banner_position', 'option') ?: 'top';   // top | bottom
    $slidein_position = get_field('slidein_side', 'option'); // left | right
    $popup_template   = get_field('popup_template', 'option') ?: 'simple'; // Get the chosen template
    


    if ($popup_pages) {
        global $post;
        if ($post && in_array($post->ID, wp_list_pluck($popup_pages, 'ID'))) {

            // Build dynamic classes
            //$classes = [$popup_type];
            $classes = [$popup_type, $popup_template]; // Add the new template class here
            if ($popup_type === 'banner') {
                $classes[] = 'banner-' . $banner_position;
            }
            if ($popup_type === 'slide') {
                $classes[] = 'slide-' . $slidein_position;
            }
?>
            <div id="custom-popup"
                class="custom-popup <?php echo esc_attr(implode(' ', $classes)); ?>"
                style="background:<?php echo esc_attr($bg); ?>;">

                <div class="popup-content">

                    <!-- Close Button (×) -->
                    <button class="popup-close" aria-label="Close">&times;</button>

                    <!-- Icon -->
                    <?php if ($popup_icon) : ?>
                        <img src="<?php echo esc_url($popup_icon['url']); ?>" alt="popup-icon" class="popup-icon">
                    <?php endif; ?>

                    <!-- Heading -->
                    <?php if ($title) : ?>
                        <h2><?php echo esc_html($title); ?></h2>
                    <?php endif; ?>

                    <!-- Content -->
                    <?php if ($popup_content) : ?>
                        <div class="popup-text"><?php echo wp_kses_post($popup_content); ?></div>
                    <?php endif; ?>

                    <!-- Thanks Button -->
                    <?php if ($popup_button) : ?>
                        <button class="popup-btn" id="popup-thanks-btn">
                            <?php echo esc_html($popup_button); ?>
                        </button>
                    <?php endif; ?>

                </div>
            </div>
<?php
        }
    }
}
