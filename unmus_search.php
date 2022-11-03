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

  // Exclude "WordPress" Page with ID2169

  if ( ! $query->is_admin && $query->is_search && $query->is_main_query() ) {
    $query->set( 'post__not_in', array( 2169 ) );
  }

  }
add_action( 'pre_get_posts', 'unmus_search_filter' );

/* 
Include Custom Fields in WordPress Search
*/

/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */

function cf_search_join( $join ) {

  global $wpdb;

  if ( is_search() ) {    
      $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
  }

  return $join;
}
// add_filter('posts_join', 'cf_search_join' );

/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function cf_search_where( $where ) {
  global $pagenow, $wpdb;

  if ( is_search() ) {
      $where = preg_replace(
          "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
          "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
  }

  return $where;
}
// add_filter( 'posts_where', 'cf_search_where' );

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct( $where ) {
  global $wpdb;

  if ( is_search() ) {
      return "DISTINCT";
  }

  return $where;
}
// add_filter( 'posts_distinct', 'cf_search_distinct' );

?>