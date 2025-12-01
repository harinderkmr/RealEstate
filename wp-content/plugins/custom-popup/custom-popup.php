<?php
/*
Plugin Name: Custom Popup (Promo)
Description: Popup plugin powered by ACF — supports Promotion templates (flash sale, coupon, exit-intent).
Version: 1.1
Author: Harry
*/

// Exit if accessed directly
if (! defined('ABSPATH')) exit;

// Load scripts
add_action('wp_enqueue_scripts', 'cp_enqueue_scripts');
function cp_enqueue_scripts()
{
    wp_enqueue_style('cp-style', plugin_dir_url(__FILE__) . 'assets/popup.css', [], '1.1');
    wp_enqueue_script('cp-script', plugin_dir_url(__FILE__) . 'assets/popup.js', ['jquery'], '1.1', true);

    // localize timezone-safe Date parsing fallback if needed (not required)
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

    // ACF option fields (see list in message)
    $popup_type     = get_field('popup_type', 'option'); // modal | banner | slide-left | slide-right
    $popup_heading  = get_field('popup_heading', 'option');
    $popup_content  = get_field('popup_content', 'option');
    $popup_button   = get_field('popup_button_text', 'option');
    $popup_icon     = get_field('popup_icon', 'option');
    $popup_pages    = get_field('popup_pages', 'option'); // page restriction

    // Promotion-specific
    $promo_template = get_field('promo_template', 'option'); // flash-sale | coupon | exit
    $promo_coupon   = get_field('promo_coupon', 'option');
    $promo_end_at   = get_field('promo_end_at', 'option'); // Y-m-d H:i:s
    $promo_auto     = get_field('promo_auto', 'option');   // '' | pageload | scroll50 | exit
    $promo_freq_key = get_field('promo_freq_key', 'option');
    $promo_freq_ttl = get_field('promo_freq_ttl', 'option'); // hours

    // Stop if no type
    if (!$popup_type) {
        return;
    }

    // Restrict to certain pages (if set)
    if ($popup_pages) {
        return;
    }

    // Popup wrapper classes
    $classes = ['custom-popup', $popup_type];
    if ($popup_type === 'banner' && get_field('popup_position', 'option') === 'bottom') {
        $classes[] = 'banner-bottom';
    }
?>
    <div id="custom-popup"
        class="<?php echo esc_attr(implode(' ', $classes)); ?>"
        data-promo-template="<?php echo esc_attr($promo_template ?: 'default'); ?>"
        data-promo-auto="<?php echo esc_attr($promo_auto ?: ''); ?>"
        data-promo-freq-key="<?php echo esc_attr($promo_freq_key ?: ''); ?>"
        data-promo-freq-ttl="<?php echo esc_attr($promo_freq_ttl ?: ''); ?>"
        data-promo-end="<?php echo esc_attr($promo_end_at ?: ''); ?>">

        <div class="popup-content">
            <?php if ($popup_icon): ?>
                <img class="popup-icon" src="<?php echo esc_url($popup_icon); ?>" alt="">
            <?php endif; ?>

            <?php if ($popup_heading): ?>
                <h2><?php echo esc_html($popup_heading); ?></h2>
            <?php endif; ?>

            <?php if ($popup_content): ?>
                <div class="popup-text"><?php echo wp_kses_post($popup_content); ?></div>
            <?php endif; ?>

            <?php
            // --- Promo Templates ---
            switch ($promo_template) {
                case 'coupon':
                    if ($promo_coupon): ?>
                        <div class="promo-coupon">
                            <strong>Use Code:</strong>
                            <span class="code"><?php echo esc_html($promo_coupon); ?></span>
                        </div>
                    <?php endif;
                    break;

                case 'flash-sale':
                    if ($promo_end_at): ?>
                        <div class="promo-flash-sale">
                            <p><strong>Hurry! Sale ends soon:</strong></p>
                            <div class="countdown" data-end="<?php echo esc_attr($promo_end_at); ?>"></div>
                        </div>
                    <?php endif;
                    break;

                case 'exit': ?>
                    <div class="promo-exit">
                        <p><strong>Wait!</strong> Before you leave, don’t miss this offer.</p>
                    </div>
            <?php
                    break;
            }
            ?>

            <?php if ($popup_button): ?>
                <button id="popup-thanks-btn" class="popup-btn">
                    <?php echo esc_html($popup_button); ?>
                </button>
            <?php endif; ?>

            <button class="popup-close" aria-label="Close">&times;</button>
        </div>
    </div>
<?php
}
