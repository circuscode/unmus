<?php

/**
 * Glance
 * 
 * @package unmus
 */

// Security: Stops code execution if WordPress is not loaded
if (!defined('ABSPATH')) { exit; }

/**
 * Add Pinseldisko @ Auf einen Blick
 *
 */

function unmus_pinseldisko_glance( $items = array() ) {
    $post_types = array( 'pinseldisko' ); 
    foreach( $post_types as $type ) {
        if( ! post_type_exists( $type ) ) continue;
        $num_posts = wp_count_posts( $type );
        if( $num_posts ) {
            $published = intval( $num_posts->publish );
            $post_type = get_post_type_object( $type );
            $text = _n( '%s ' . $post_type->labels->singular_name, '%s ' . $post_type->labels->name, $published, 'your_textdomain' );
            $text = sprintf( $text, number_format_i18n( $published ) );
            if ( current_user_can( $post_type->cap->edit_posts ) ) {
            $output = '' . $text . '';
                echo '<li class="post-count"><a class="pinseldisko-count" href="edit.php?post_type=pinseldisko">' . $output . '</a></li>';
            } else {
            $output = '' . $text . '';
                echo ' ' . $output . '';
            }
        }
    }
    return $items;
}
add_filter( 'dashboard_glance_items', 'unmus_pinseldisko_glance', 10, 1 );

/**
 * Enqueue Plugin CSS Styles
 * 
 * The Styles are required for "At A Glance" Extensions in WordPress Dashboard
 *
 */

function unmus_plugin_admin_styles() {

    wp_enqueue_style('admin-styles',  plugin_dir_url( __FILE__ ).'/unmus_styles.css');

}
add_action('admin_enqueue_scripts', 'unmus_plugin_admin_styles');

?>