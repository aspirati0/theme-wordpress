<?php

add_filter('show_admin_bar', '__return_false');


function enqueue_my_styles() {
    wp_enqueue_style( 'my-style', get_template_directory_uri() . '/assets/style.css', array(), '1.0.0', 'all' );
}
add_action('wp_enqueue_scripts', 'enqueue_my_styles' );

function my_theme_scripts() {
    wp_enqueue_script('jquery');    
    wp_enqueue_script('my-script', get_template_directory_uri() . '/js/script.js', array(), '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );

add_theme_support( 'custom-logo' );

function register_my_menu() {
  register_nav_menu('primary-menu',__( 'Primary Menu' ));
}
add_action( 'init', 'register_my_menu' );

?>

