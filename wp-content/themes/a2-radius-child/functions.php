<?php

require( get_stylesheet_directory() . '/includes/widgets/text-column.php' );
require( get_stylesheet_directory() . '/includes/widgets/homepage-portfolio.php' );
require( get_stylesheet_directory() . '/lib/a2-employees.php' );

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

/* Register employee post-type and related taxonomies and custom fields */
function a2_employees() {
  new A2Employees();
}
add_action( 'init', 'a2_employees', 0 );

add_image_size( 'portfolio-employee-thumb', 320, 410, true ); // Portfolio page thumb
add_image_size( 'portfolio-photo-thumb', 320, 320, true ); // Portfolio page thumb
add_image_size( 'portfolio-logo-thumb', 320, 320, false ); // Portfolio page thumb
add_image_size( 'portfolio-employee', 620, 0, true ); // Portfolio page thumb
add_image_size( 'portfolio-photo', 620, 0, false ); // Portfolio page thumb
add_image_size( 'portfolio-logo', 620, 0, false ); // Portfolio page thumb

if( function_exists('register_field_group') ):

register_field_group(array (
	'key' => 'group_53f4f62b2ccbc',
	'title' => 'Portfolio image',
	'fields' => array (
		array (
			'key' => 'field_53f4f6f496f09',
			'label' => 'Type of image',
			'name' => 'image_type',
			'prefix' => '',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'choices' => array (
				'logo' => 'Logo',
				'photo' => 'Photo',
			),
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 'logo',
			'layout' => 'vertical',
		),
		array (
			'key' => 'field_53f4f71d96f0a',
			'label' => 'Logo',
			'name' => 'logo',
			'prefix' => '',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_53f4f6f496f09',
						'operator' => '==',
						'value' => 'logo',
					),
				),
			),
			'return_format' => 'array',
			'preview_size' => 'portfolio-logo-thumb',
			'library' => 'all',
		),
		array (
			'key' => 'field_53f4f7b496f0b',
			'label' => 'Photo',
			'name' => 'photo',
			'prefix' => '',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_53f4f6f496f09',
						'operator' => '==',
						'value' => 'photo',
					),
				),
			),
			'return_format' => 'array',
			'preview_size' => 'portfolio-photo-thumb',
			'library' => 'all',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'array-portfolio',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'featured_image',
	),
));

endif;
