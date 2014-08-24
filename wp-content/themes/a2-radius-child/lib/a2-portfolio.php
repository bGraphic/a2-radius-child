<?php

class A2Portfolio {
  public function __construct() {
    $this->register_a2_tax_service_type();
    $this->register_a2_employee_custom_fields();
  }

  /* Add service taxonomy */
  public function register_a2_tax_service_type() {

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
      'query_var'           => true,
      'rewrite'             => array('slug' => 'service'),
    );
    register_taxonomy( 'a2-service', array( 'array-portfolio' ), $args );
  }

  public function register_a2_employee_custom_fields() {

    if( function_exists('register_field_group') ) {

      register_field_group(array (
      	'key' => 'group_53f4f62b2ccbc',
      	'title' => 'Portfolio',
      	'fields' => array (
          array (
        		'key' => 'field_53fa3cb1372fd',
        		'label' => __('Timeframe/Time', 'a2_radius_child'),
        		'name' => 'timeframe',
        		'prefix' => '',
        		'type' => 'text',
        		'instructions' => '',
        		'required' => 0,
        		'conditional_logic' => 0,
        		'default_value' => '',
        		'placeholder' => '',
        		'prepend' => '',
        		'append' => '',
        		'maxlength' => '',
        		'readonly' => 0,
        		'disabled' => 0,
        	),
      		array (
      			'key' => 'field_53f4f6f496f09',
      			'label' => __('Type of image', 'a2_radius_child'),
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
      			'label' => __('Image', 'a2_radius_child'),
      			'name' => 'image',
      			'prefix' => '',
      			'type' => 'image',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'return_format' => 'array',
      			'preview_size' => 'portfolio-logo-thumb',
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
    }
  }
}
