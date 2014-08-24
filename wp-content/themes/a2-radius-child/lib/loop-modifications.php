<?php

/* Sort portfolio on last modified */
function portfolio_loop_modifications( $query ) {
  if ( $query->is_post_type_archive('array-portfolio')) {
    $query->set( 'orderby', 'modified' );
  }
}
add_action( 'pre_get_posts', 'portfolio_loop_modifications' );

/* Show all employees */
function employee_loop_modifications( $query ) {
  if ( $query->is_post_type_archive('a2-employee')) {
    $query->set( 'posts_per_page', -1 );
  }
}
add_action( 'pre_get_posts', 'employee_loop_modifications' );
