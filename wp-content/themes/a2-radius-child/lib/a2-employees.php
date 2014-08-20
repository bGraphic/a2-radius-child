<?php

class A2Employees {
  public function __construct() {
    $this->register_post_type_a2_employee();
    $this->register_a2_tax_employee_skill();
    $this->register_a2_employee_custom_fields();
  }

  public function register_post_type_a2_employee() {
    	$labels = array(
    		'name'                => _x( 'Employees', 'Post Type General Name', 'a2_radius_child' ),
    		'singular_name'       => _x( 'Employee', 'Post Type Singular Name', 'a2_radius_child' ),
    		'menu_name'           => __( 'Employee', 'a2_radius_child' ),
    		'parent_item_colon'   => __( '', 'a2_radius_child' ),
    		'all_items'           => __( 'All Employees', 'a2_radius_child' ),
    		'view_item'           => __( 'View Employee', 'a2_radius_child' ),
    		'add_new_item'        => __( 'Add New Employee', 'a2_radius_child' ),
    		'add_new'             => __( 'Add New', 'a2_radius_child' ),
    		'edit_item'           => __( 'Edit Employee', 'a2_radius_child' ),
    		'update_item'         => __( 'Update Employee', 'a2_radius_child' ),
    		'search_items'        => __( 'Search Employee', 'a2_radius_child' ),
    		'not_found'           => __( 'Not found', 'a2_radius_child' ),
    		'not_found_in_trash'  => __( 'Not found in Trash', 'a2_radius_child' ),
    	);
    	$args = array(
    		'label'               => __( 'a2-employee', 'a2_radius_child' ),
    		'description'         => __( 'A2 Employees', 'a2_radius_child' ),
    		'labels'              => $labels,
    		'supports'            => array( 'title', 'custom-fields', ),
    		'hierarchical'        => false,
    		'public'              => true,
    		'show_ui'             => true,
    		'show_in_menu'        => true,
    		'show_in_nav_menus'   => true,
    		'show_in_admin_bar'   => true,
    		'menu_position'       => 5,
    		'can_export'          => true,
    		'has_archive'         => true,
    		'exclude_from_search' => false,
    		'publicly_queryable'  => true,
    		'capability_type'     => 'page',
        'rewrite'             => array('slug' => 'employee'),
    	);
    	register_post_type( 'a2-employee', $args );
  }

  public function register_a2_tax_employee_skill() {

    $labels = array(
      'name'          => _x( 'Skills', 'Skills General Name', 'a2_radius_child' ),
      'singular_name' => _x( 'Skill', 'Skills Singular Name', 'a2_radius_child' ),
    );

    $args = array(
      'labels'              => $labels,
      'hierarchical'        => false,
      'public'              => true,
      'show_ui'             => true,
      'show_admin_column'   => true,
      'show_in_nav_menus'   => true,
      'show_tagcloud'       => true,
      'query_var'           => true,
      'rewrite'             => array('slug' => 'skill'),
    );

    register_taxonomy( 'a2-employee-skill', array('a2-employee'), $args);
  }

  public function register_a2_employee_custom_fields() {
    if( function_exists('register_field_group') )
    {
      register_field_group(array (
      	'key' => 'group_53ea424d8b345',
      	'title' => __('Employee', 'a2_radius_child'),
      	'fields' => array (
      		array (
      			'key' => 'field_53ea428b42c2b',
      			'label' => __('Photo', 'a2_radius_child'),
      			'name' => 'photo',
      			'prefix' => '',
      			'type' => 'image',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'return_format' => 'object',
      			'preview_size' => 'thumbnail',
      			'library' => 'all',
      		),
      		array (
      			'key' => 'field_53ea44ca1c1dc',
      			'label' => __('Phone', 'a2_radius_child'),
      			'name' => 'phone',
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
      			'key' => 'field_53ea44d71c1dd',
      			'label' => __('E-mail', 'a2_radius_child'),
      			'name' => 'email',
      			'prefix' => '',
      			'type' => 'email',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'default_value' => '',
      			'placeholder' => '',
      			'prepend' => '',
      			'append' => '',
      		),
      		array (
      			'key' => 'field_53ea44f41c1de',
      			'label' => __('Links', 'a2_radius_child'),
      			'name' => 'links',
      			'prefix' => '',
      			'type' => 'repeater',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'min' => '',
      			'max' => '',
      			'layout' => 'table',
      			'button_label' => __('Add Row', 'a2_radius_child'),
      			'sub_fields' => array (
      				array (
      					'key' => 'field_53ea45121c1df',
      					'label' => __('Tag', 'a2_radius_child'),
      					'name' => 'tag',
      					'prefix' => '',
      					'type' => 'text',
      					'instructions' => '',
      					'required' => 1,
      					'conditional_logic' => 0,
      					'column_width' => '',
      					'default_value' => '',
      					'placeholder' => '',
      					'prepend' => '',
      					'append' => '',
      					'maxlength' => '',
      					'readonly' => 0,
      					'disabled' => 0,
      				),
      				array (
      					'key' => 'field_53ea45401c1e0',
      					'label' => __('URL', 'a2_radius_child'),
      					'name' => 'url',
      					'prefix' => '',
      					'type' => 'text',
      					'instructions' => '',
      					'required' => 1,
      					'conditional_logic' => 0,
      					'column_width' => '',
      					'default_value' => '',
      					'placeholder' => '',
      					'prepend' => '',
      					'append' => '',
      					'maxlength' => '',
      					'readonly' => 0,
      					'disabled' => 0,
      				),
      			),
      		),
      		array (
      			'key' => 'field_53ea45631c1e1',
      			'label' => __('Bio', 'a2_radius_child'),
      			'name' => 'bio',
      			'prefix' => '',
      			'type' => 'wysiwyg',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'default_value' => '',
      			'toolbar' => 'basic',
      			'media_upload' => 0,
      		),
      	),
      	'location' => array (
      		array (
      			array (
      				'param' => 'post_type',
      				'operator' => '==',
      				'value' => 'a2-employee',
      			),
      		),
      	),
      	'menu_order' => 0,
      	'position' => 'normal',
      	'style' => 'seamless',
      	'label_placement' => 'top',
      	'instruction_placement' => 'label',
      	'hide_on_screen' => array (
      		1 => 'the_content',
      		2 => 'excerpt',
      		3 => 'custom_fields',
      		4 => 'discussion',
      		5 => 'comments',
      		6 => 'revisions',
      		7 => 'slug',
      		8 => 'author',
      		9 => 'format',
      		10 => 'page_attributes',
      		11 => 'featured_image',
      		12 => 'categories',
      		13 => 'tags',
      		14 => 'send-trackbacks',
      	),
      ));
    }
  }
}
