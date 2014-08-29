<?php

class A2Portfolio {
  public function __construct() {
    $this->register_a2_tax_service_type();
    $this->register_a2_employee_custom_fields();
  }

  /* Add service taxonomy */
  public function register_a2_tax_service_type() {

    $labels = array(
      'name'                       => _x( 'Services', 'Taxonomy General Name', 'radius' ),
      'singular_name'              => _x( 'Service', 'Taxonomy Singular Name', 'radius' ),
      'all_items'                  => __( 'All Services', 'radius' ),
      'parent_item'                => __( 'Service Parent Item', 'radius' ),
      'parent_item_colon'          => __( 'Service Parent Item:', 'radius' ),
      'new_item_name'              => __( 'New Service Name', 'radius' ),
      'add_new_item'               => __( 'Add New Service', 'radius' ),
      'edit_item'                  => __( 'Edit Service', 'radius' ),
      'update_item'                => __( 'Update Service', 'radius' ),
      'separate_items_with_commas' => __( 'Separate services with commas', 'radius' ),
      'search_items'               => __( 'Search Service', 'radius' ),
      'add_or_remove_items'        => __( 'Add or remove services', 'radius' ),
      'choose_from_most_used'      => __( 'Choose from the most used services', 'radius' ),
      'not_found'                  => __( 'Not Found', 'radius' ),
    );
    $args = array(
      'labels'                     => $labels,
      'hierarchical'               => true,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => true,
      'query_var'                  => true,
      'rewrite'                     => array('slug' => _x('service', 'Service slug', 'radius')),
    );
    register_taxonomy('a2-service', array( 'array-portfolio' ), $args );
  }

  public function register_a2_employee_custom_fields() {

    if( function_exists('register_field_group') ) {

      register_field_group(array (
      	'key' => 'group_53f4f62b2ccbc',
      	'title' => 'Portfolio',
      	'fields' => array (
          array (
        		'key' => 'field_53fa3cb1372fd',
        		'label' => __('Timeframe/Time', 'radius'),
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
      			'label' => __('Type of image', 'radius'),
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
      			'label' => __('Image', 'radius'),
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
