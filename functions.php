<?php

/**
 * Setup the theme and theme settings such as sync ACF fields.
 */
require_once('vendor/class-tgm-plugin-activation.php');
require_once('settings/register-required-plugins.php');
require_once('settings/setup.php');
require_once('settings/theme-panel.php');
require_once('settings/hide-editor.php');
require_once('helpers/CustomPostType.php');

function webbeb_scripts()
{
    $theme_uri = get_stylesheet_directory_uri();
    $theme_dir = get_stylesheet_directory();

    wp_enqueue_style(
        'slickstyle',
        $theme_uri . '/assets/js/vendor/slick/slick.css',
        [],
        file_exists($theme_dir . '/assets/js/vendor/slick/slick.css') ? filemtime($theme_dir . '/assets/js/vendor/slick/slick.css') : null
    );

    wp_enqueue_style(
        'select2style',
        $theme_uri . '/assets/js/vendor/select2/select2.min.css',
        [],
        file_exists($theme_dir . '/assets/js/vendor/select2/select2.min.css') ? filemtime($theme_dir . '/assets/js/vendor/select2/select2.min.css') : null
    );

    wp_enqueue_style(
        'style',
        $theme_uri . '/assets/css/style.css',
        [],
        file_exists($theme_dir . '/assets/css/style.css') ? filemtime($theme_dir . '/assets/css/style.css') : null
    ); 

    wp_enqueue_script(
        'slickjs',
        $theme_uri . '/assets/js/vendor/slick/slick.min.js',
        ['jquery'],
        file_exists($theme_dir . '/assets/js/vendor/slick/slick.min.js') ? filemtime($theme_dir . '/assets/js/vendor/slick/slick.min.js') : null,
        true
    );

    wp_enqueue_script(
        'select2js',
        $theme_uri . '/assets/js/vendor/select2/select2.min.js',
        ['jquery'],
        file_exists($theme_dir . '/assets/js/vendor/select2/select2.min.js') ? filemtime($theme_dir . '/assets/js/vendor/select2/select2.min.js') : null,
        true
    );

    wp_enqueue_script(
        'theme-functions',
        $theme_uri . '/assets/js/functions.js',
        ['jquery', 'select2js'],
        file_exists($theme_dir . '/assets/js/functions.js') ? filemtime($theme_dir . '/assets/js/functions.js') : null,
        true
    );

    // Localize script for AJAX
    wp_localize_script('theme-functions', 'devrixAjax', [
        'ajaxurl' => admin_url('admin-ajax.php')
    ]);

    wp_enqueue_script(
        'theme-weather',
        $theme_uri . '/assets/js/loadWeather.js',
        [],
        file_exists($theme_dir . '/assets/js/loadWeather.js') ? filemtime($theme_dir . '/assets/js/loadWeather.js') : null,
        true
    );
}
add_action('wp_enqueue_scripts', 'webbeb_scripts');

// Customize search form HTML
function devrix_custom_search_form($form) {
    $form = '<div class="search-form">
        <form role="search" method="get" action="' . esc_url(home_url('/')) . '">
            <select id="search-select" name="s" class="search-select">
                <option value="">Search...</option>
            </select>
            <button type="submit">
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
            </button>
        </form>
    </div>';
    
    return $form;
}
add_filter('get_search_form', 'devrix_custom_search_form');

// AJAX handler for Select2 search
function devrix_select2_search() {
    $search_term = isset($_GET['q']) ? sanitize_text_field($_GET['q']) : '';
    
    if (strlen($search_term) < 2) {
        wp_send_json(['results' => []]);
        return;
    }
    
    $args = [
        's' => $search_term,
        'posts_per_page' => 10,
        'post_status' => 'publish'
    ];
    
    $query = new WP_Query($args);
    
    $results = [];
    
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $results[] = [
                'id' => get_the_ID(),
                'text' => get_the_title(),
                'url' => get_permalink()
            ];
        }
        wp_reset_postdata();
    }
    
    wp_send_json(['results' => $results]);
}
add_action('wp_ajax_devrix_select2_search', 'devrix_select2_search');
add_action('wp_ajax_nopriv_devrix_select2_search', 'devrix_select2_search');

// Create custom post type "Campaigns"
// Example
// $campaigns = new CustomPostType('Campaigns', 'Campaign', 'campaigns', ['category']);

