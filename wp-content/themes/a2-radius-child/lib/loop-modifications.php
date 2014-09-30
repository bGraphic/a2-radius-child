<?php

/* Sort portfolio on last modified */
function portfolio_loop_modifications( $query ) {
  if ( $query->is_post_type_archive('array-portfolio')
    || $query->is_tax('a2-service')
    || $query->is_tax('categories')) {

    if($query->is_main_query()) {
      $query->set( 'posts_per_page', -1 );
    }
  }

}
add_action( 'pre_get_posts', 'portfolio_loop_modifications' );

/* Show all employees */
function employee_loop_modifications( $query ) {

  if ( $query->is_post_type_archive('a2-employee')
    || $query->is_tax('a2-employee-skill')) {

    $query->set( 'orderby', 'title');
    $query->set( 'order', 'ASC');

    if($query->is_main_query()) {
      $query->set( 'posts_per_page', -1 );
    }
  }
}
add_action( 'pre_get_posts', 'employee_loop_modifications' );
