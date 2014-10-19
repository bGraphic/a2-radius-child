<?php

function portfolio_loop_modifications( $query ) {
  if ( $query->is_post_type_archive('array-portfolio')
    || $query->is_tax('a2-service')
    || $query->is_tax('categories')) {

    if($query->is_main_query()) {
      /* Show all array-portfolio for main query */
      $query->set( 'posts_per_page', -1 );
    }
  }

}
add_action( 'pre_get_posts', 'portfolio_loop_modifications' );

function employee_loop_modifications( $query ) {

  if ( $query->is_post_type_archive('a2-employee')
    || $query->is_tax('a2-employee-skill')) {

    /* Sort employees by name */
    $query->set( 'orderby', 'title');
    $query->set( 'order', 'ASC');

    if($query->is_main_query()) {
      /* Show all employees for main query */
      $query->set( 'posts_per_page', -1 );
    }
  }
}
add_action( 'pre_get_posts', 'employee_loop_modifications' );

function filter_next_post_sort($sort) {
  if(is_singular('a2-employee')) {
    $sort = "ORDER BY p.post_title ASC LIMIT 1";
  }
  return $sort;
}
function filter_next_post_where($where) {
  if(is_singular('a2-employee')) {
    global $post, $wpdb;
    return $wpdb->prepare("WHERE p.post_title < '%s' AND p.post_type = 'a2-employee' AND p.post_status = 'publish'",$post->post_title);
  } else {
    return $where;
  }
}

function filter_previous_post_sort($sort) {
  if(is_singular('a2-employee')) {
    $sort = "ORDER BY p.post_title DESC LIMIT 1";
  }
  return $sort;
}
function filter_previous_post_where($where) {
  if(is_singular('a2-employee')) {
    global $post, $wpdb;
    return $wpdb->prepare("WHERE p.post_title > '%s' AND p.post_type = 'a2-employee' AND p.post_status = 'publish'",$post->post_title);
  } else {
    return $where;
  }
}

add_filter('get_next_post_sort',   'filter_next_post_sort');
add_filter('get_next_post_where',  'filter_next_post_where');

add_filter('get_previous_post_sort',  'filter_previous_post_sort');
add_filter('get_previous_post_where', 'filter_previous_post_where');
