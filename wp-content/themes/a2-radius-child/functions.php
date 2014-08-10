<?php

require( get_stylesheet_directory() . '/includes/widgets/text-column.php' );
require( get_stylesheet_directory() . '/includes/widgets/homepage-portfolio.php' );

/* Enqueue Scripts and Styles */
function a2_scripts_styles() {

  $version = wp_get_theme()->Version;

  //Font Awesome CSS
  wp_enqueue_style( 'font-awesome-css-4', get_stylesheet_directory_uri() . "/includes/fonts/font-awesome-4.1.0/css/font-awesome.min.css", array(), $version, 'screen' );

}
add_action( 'wp_enqueue_scripts', 'a2_scripts_styles' );
