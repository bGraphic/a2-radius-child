<?php

require( get_stylesheet_directory() . '/includes/widgets/text-column.php' );
require( get_stylesheet_directory() . '/includes/widgets/homepage-portfolio.php' );

/* Enqueue Scripts and Styles */
function a2_scripts_styles() {

  $version = wp_get_theme()->Version;

  //Font Awesome CSS
  wp_enqueue_style( 'font-awesome-css-4', get_stylesheet_directory_uri() . "/includes/fonts/font-awesome-4.1.0/css/font-awesome.min.css", array(), $version, 'screen' );
  //Custom JS
  wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/includes/js/custom/custom.js', array( 'jquery' ), $version, true );

}
add_action( 'wp_enqueue_scripts', 'a2_scripts_styles' );


/* Sort portfolio on last modified */
function last_modified_portfolio( $query ) {
    if ( $query->is_post_type_archive('array-portfolio')) {
        $query->set( 'orderby', 'modified' );
    }
}
add_action( 'pre_get_posts', 'last_modified_portfolio' );

/* Add service taxonomy */
if ( ! function_exists( 'a2_service' ) ) {

  // Register Custom Taxonomy
  function a2_service() {

  	$labels = array(
  		'name'                       => _x( 'Services', 'Taxonomy General Name', 'a2_radius_child' ),
  		'singular_name'              => _x( 'Service', 'Taxonomy Singular Name', 'a2_radius_child' ),
      'all_items'                  => __( 'All Services', 'a2_radius_child' ),
      'parent_item'                => __( 'Parent Item', 'a2_radius_child' ),
      'parent_item_colon'          => __( 'Parent Item:', 'a2_radius_child' ),
      'new_item_name'              => __( 'New Service Name', 'a2_radius_child' ),
      'add_new_item'               => __( 'Add New Service', 'a2_radius_child' ),
      'edit_item'                  => __( 'Edit Service', 'a2_radius_child' ),
      'update_item'                => __( 'Update Service', 'a2_radius_child' ),
      'separate_items_with_commas' => __( 'Separate services with commas', 'a2_radius_child' ),
      'search_items'               => __( 'Search Service', 'a2_radius_child' ),
      'add_or_remove_items'        => __( 'Add or remove services', 'a2_radius_child' ),
      'choose_from_most_used'      => __( 'Choose from the most used services', 'a2_radius_child' ),
      'not_found'                  => __( 'Not Found', 'a2_radius_child' ),
  	);
  	$args = array(
  		'labels'                     => $labels,
  		'hierarchical'               => true,
  		'public'                     => true,
  		'show_ui'                    => true,
  		'show_admin_column'          => true,
  		'show_in_nav_menus'          => true,
  		'show_tagcloud'              => true,
  	);
  	register_taxonomy( 'a2-service', array( 'array-portfolio' ), $args );

  }

  // Hook into the 'init' action
  add_action( 'init', 'a2_service', 0 );

}
