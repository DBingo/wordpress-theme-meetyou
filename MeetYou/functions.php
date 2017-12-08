<?php
// css import
function css_resources() {
    wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'css_resources');

// Excerpt length
function custom_excerpt_length(){
    return 200;
}

add_filter('excerpt_length', 'custom_excerpt_length');


// Theme setup
function Meetyoutheme_setup() {

    // Nav Menus
    register_nav_menus(array(
        'primary' => __('Primary Menu'),
        'footer' => __('Footer Menu')
    ));

    // Add feature image support
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnail', 358, 200, true);
    add_image_size('banner-thumbnail', 1320, 500, true);
}

add_action('after_setup_theme', 'Meetyoutheme_setup');