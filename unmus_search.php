<?php

/**
 * Search Modifications
 * 
 * @package unmus
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Remove Quotes & Images Post Types from Search 
 *
 * @param WP_Query The WP_Query Instance
 */

function unmus_search_exclude_post_formats( $query ) {
    
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
add_action( 'pre_get_posts', 'unmus_search_exclude_post_formats' );

/**
 * Remove the WordPress Page from Search
 *
 * @param WP_Query The WP_Query Instance
 */

function unmus_search_filter( $query ) {

  $page = get_page_by_path('wordpress',OBJECT,'page');
  if($page==null){return false;}
  $pageid=$page->ID;

  if ( ! $query->is_admin && $query->is_search && $query->is_main_query() ) {
    $query->set( 'post__not_in', array( $pageid ) );
  }

}
add_action( 'pre_get_posts', 'unmus_search_filter' );

?>