<?php

/*
Search Modifications
*/

/* 
Remove Quotes & Images Post Types from Search 
*/

function unmus_search_exclude_post_format( $query ) {
    
    if( $query->is_main_query() && $query->is_search() ) {

        if( ! is_admin()) {
        $tax_query = array( array(
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => array( 'post-format-quote','post-format-image' ),
            'operator' => 'NOT IN',
         ) );
         $query->set( 'tax_query', $tax_query );
        }

    }

}
add_action( 'pre_get_posts', 'unmus_search_exclude_post_format' );

/* 
Exclude Page WordPress from Search
*/

function unmus_search_filter( $query ) {

    $page = get_page_by_title( 'WordPress' );

    if ( ! $query->is_admin && $query->is_search && $query->is_main_query() ) {
      $query->set( 'post__not_in', array( $page->ID ) );
    }

  }
add_action( 'pre_get_posts', 'unmus_search_filter' );

?>