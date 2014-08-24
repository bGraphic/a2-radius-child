<?php

/* Sort portfolio on last modified */
function last_modified_portfolio( $query ) {
    if ( $query->is_post_type_archive('array-portfolio')) {
        $query->set( 'orderby', 'modified' );
    }
}
add_action( 'pre_get_posts', 'last_modified_portfolio' );
