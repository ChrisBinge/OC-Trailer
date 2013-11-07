<?php
/* Menu Support */
function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' ),
      'footer-menu' => __( 'Footer Menu' ),
	  'social-menu' => __( 'Social Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );
/**
 * enqueue scripts and styles
 */
function theme_name_scripts() {
	wp_enqueue_style( 'primary-style', get_stylesheet_uri() );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.custom.84042.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
add_theme_support( 'post-thumbnails' );
?>