<?php

class A2Contact {
  public function __construct() {
    $this->register_a2_contact_custom_fields();
  }

  public function register_a2_contact_custom_fields() {

    if( function_exists('register_field_group') ) {

      register_field_group(array (
      	'key' => 'group_541974eaaa9cb',
      	'title' => __('Contact Information', 'radius'),
      	'fields' => array (
      		array (
      			'key' => 'field_54197508ecdfd',
      			'label' => __('Contact Sections', 'radius'),
      			'name' => 'contact_sections',
      			'prefix' => '',
      			'type' => 'repeater',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'min' => '',
      			'max' => '',
      			'layout' => 'table',
      			'button_label' => __('Add employee', 'radius'),
      			'sub_fields' => array (
      				array (
      					'key' => 'field_54197526ecdfe',
      					'label' => __('Heading', 'radius'),
      					'name' => 'contact_section_heading',
      					'prefix' => '',
      					'type' => 'text',
      					'instructions' => '',
      					'required' => 0,
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
      					'key' => 'field_5419753decdff',
      					'label' => __('Contact Employees', 'radius'),
      					'name' => 'contact_section_employees',
      					'prefix' => '',
      					'type' => 'post_object',
      					'instructions' => '',
      					'required' => 0,
      					'conditional_logic' => 0,
      					'column_width' => '',
      					'post_type' => array (
      						0 => 'a2-employee',
      					),
      					'taxonomy' => '',
      					'allow_null' => 0,
      					'multiple' => 1,
      					'return_format' => 'object',
      					'ui' => 1,
      				),
      			),
      		),
      	),
      	'location' => array (
      		array (
      			array (
      				'param' => 'page_template',
      				'operator' => '==',
      				'value' => 'contact.php',
      			),
      		),
      	),
      	'menu_order' => 0,
      	'position' => 'normal',
      	'style' => 'default',
      	'label_placement' => 'top',
      	'instruction_placement' => 'label',
      	'hide_on_screen' => array (
      		0 => 'custom_fields',
      	),
      ));
    }
  }
}
