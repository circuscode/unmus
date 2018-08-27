<?php

/*
Resources
*/

/*
Remove Podlove CSS @ Non Podcast Content
*/

function unmus_remove_podlove_css(){

    if(! ( is_post_type_archive('podcast') OR ('podcast' == get_post_type() ) ) )
    {
        wp_dequeue_style( 'podlove-frontend-css' );
    }

    if (! (is_admin() OR is_user_logged_in() ) ) 
    {
        wp_dequeue_style( 'podlove-admin-font' );
    }

}
add_action('wp_enqueue_scripts', 'unmus_remove_podlove_css');

/*
Remove Podlove Java Script @ Non Podcast Content
*/

function unmus_remove_podlove_js(){
    if(! ( is_post_type_archive('podcast') OR ('podcast' == get_post_type() ) ) )
    {
    wp_dequeue_script( 'podlove_frontend' );
    wp_dequeue_script( 'podlove-player4-embed' );
    }
}
add_action('wp_enqueue_scripts', 'unmus_remove_podlove_js',99);

?>