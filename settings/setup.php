<?php

function webbeb_setup()
{
    $defaults = array();
    add_theme_support('custom-logo', $defaults);
    add_theme_support('menus');
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menus(array(
        'header-menu' => __('Header Menu', 'devrix'),
        'footer-menu' => __('Footer Menu', 'devrix'),
    ));
}
add_action('after_setup_theme', 'webbeb_setup');

include('options-page.php');
