<?php

/*
Admin Enhancements
*/

/*
Post Format Filter
*/

add_action( 'restrict_manage_posts', function( $post_type = "" ) {
    if ( in_array( $post_type, array( 'post','ello' ) ) ) {
        wp_dropdown_categories( array(
            'taxonomy'          => 'post_format',
            'hide_empty'        => 0,
            'name'              => 'post_format', // Do not need to use a custom variable name.
            'show_option_all'   => 'Select Post Format', // Use 'show_option_all' instead of 'show_option_none' as the default choice.
            'value_field'       => 'slug',
        ) );
    }
} );

?>