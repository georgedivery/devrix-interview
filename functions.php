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
        'style',
        $theme_uri . '/assets/css/style.css',
        [],
        file_exists($theme_dir . '/assets/css/style.css') ? filemtime($theme_dir . '/assets/css/style.css') : null
    );

    $headroom_path = $theme_dir . '/html/assets/js/headroom.js';
    $headroom_ver  = file_exists($headroom_path) ? filemtime($headroom_path) : null;

    wp_enqueue_script(
        'headroom',
        $theme_uri . '/html/assets/js/headroom.js',
        [],
        $headroom_ver,
        true
    );

    wp_enqueue_script(
        'slickjs',
        $theme_uri . '/assets/js/vendor/slick/slick.min.js',
        ['jquery'],
        file_exists($theme_dir . '/assets/js/vendor/slick/slick.min.js') ? filemtime($theme_dir . '/assets/js/vendor/slick/slick.min.js') : null,
        true
    );

    wp_enqueue_script(
        'theme-functions',
        $theme_uri . '/assets/js/functions.js',
        [],
        file_exists($theme_dir . '/assets/js/functions.js') ? filemtime($theme_dir . '/assets/js/functions.js') : null,
        true
    );

    wp_enqueue_script(
        'theme-weather',
        $theme_uri . '/assets/js/loadWeather.js',
        [],
        file_exists($theme_dir . '/assets/js/loadWeather.js') ? filemtime($theme_dir . '/assets/js/loadWeather.js') : null,
        true
    );
}
add_action('wp_enqueue_scripts', 'webbeb_scripts');


// Create custom post type "Campaigns"
// Example
// $campaigns = new CustomPostType('Campaigns', 'Campaign', 'campaigns', ['category']);

