<?php

/*
Admin Enhancements
*/

/*
Post Format Filter @ Zimtwolke
*/

add_action( 'restrict_manage_posts', function( $post_type = "" ) {

    if ( in_array( $post_type, array( 'ello' ) ) ) {
        wp_dropdown_categories( array(
            'taxonomy'          => 'post_format',
            'hide_empty'        => 0,
            'name'              => 'post_format', 
            'show_option_all'   => 'Select Post Format',
            'value_field'       => 'slug',
        ) );
    }
    
} );

/*
Remove Post Formats @ Standard Post Type
*/

function unmus_remove_post_formats_from_standard_post_editor () {

    global $pagenow;

    if ( 'post.php' === $pagenow && isset($_GET['post']) && 'post' === get_post_type( $_GET['post'] ) ) {
        remove_theme_support('post-formats');
    }
}
add_action( 'admin_init', 'unmus_remove_post_formats_from_standard_post_editor' );

/* 
Admin Styles 
*/

function unmus_admin_style() {

    wp_enqueue_style('admin-styles',  plugin_dir_url( __FILE__ ).'/unmus_styles.css');

}
 
add_action('admin_enqueue_scripts', 'unmus_admin_style');

?>