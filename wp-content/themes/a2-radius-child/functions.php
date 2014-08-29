<?php

require( get_stylesheet_directory() . '/includes/widgets/text-column.php' );
require( get_stylesheet_directory() . '/includes/widgets/homepage-portfolio.php' );
require( get_stylesheet_directory() . '/lib/a2-employees.php' );
require( get_stylesheet_directory() . '/lib/a2-portfolio.php' );

require( get_stylesheet_directory() . '/lib/loop-modifications.php' );
require( get_stylesheet_directory() . '/lib/thumbnails.php' );

function remove_grunion_style() {
  wp_dequeue_style('grunion.css');
  wp_deregister_style('grunion.css');
}
add_action('wp_print_styles', 'remove_grunion_style');

/* Enqueue Scripts and Styles */
function a2_scripts_styles() {

  $version = wp_get_theme()->Version;

  //Custom JS
  wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/includes/js/custom/custom.js', array( 'jquery' ), $version, true );

}
add_action( 'wp_enqueue_scripts', 'a2_scripts_styles' );

function a2_init() {
  /* Register employee post-type and related taxonomies and custom fields */
  new A2Employees();
/* Register taxonomies and custom fields for array portfolio */
  new A2Portfolio();
}
add_action( 'init', 'a2_init', 0 );

function a2_setup() {
  /* Make theme available for translation */
  load_child_theme_textdomain( 'radius', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'a2_setup' );
