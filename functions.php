<?php 

function bamshrown_theme_support() {
    // This adds dynamic title tag support
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'bamshrown_theme_support');

// This adds menus
function bamshrown_menus() {

    $locations = array(
        'primary' => "Desktop Primary Left Sidebar",
        'footer' => "Footer Menu Items"
    );

    register_nav_menus($locations);
}

add_action('init', 'bamshrown_menus');

// This adds styles to header
function bamshrown_register_styles() {

    // This variable matches the version to the version in the CSS file
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('bamshrown-style', get_template_directory_uri() . "/style.css", array('bamshrown-bootstrap'), $version, 'all');
    wp_enqueue_style('bamshrown-bootstrap',"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('bamshrown-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
}

add_action( 'wp_enqueue_scripts', 'bamshrown_register_styles');

// This add scripts to footer
function bamshrown_register_scripts() {

    // This variable matches the version to the version in the CSS file
    $version = wp_get_theme()->get('Version');
    wp_enqueue_script('bamshrown-jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true);
    wp_enqueue_script('bamshrown-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0', true);
    wp_enqueue_script('bamshrown-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true);
    wp_enqueue_script('bamshrown-main', get_template_directory_uri()."/assets/js/main.js", array(), $version, true);

}

add_action( 'wp_enqueue_scripts', 'bamshrown_register_scripts');



function bamshrown_widget_areas() {

    // For sidebar to have widgets
    register_sidebar(
        array (
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
            'after_widget' => '</ul>',
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area'
        )

    );

    // For footer to have widgets
    register_sidebar(
        array (
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'Footer Area',
            'id' => 'footer-1',
            'description' => 'Footer Widget Area'
        )

    );

}

add_action('widgets_init', 'bamshrown_widget_areas');


?>