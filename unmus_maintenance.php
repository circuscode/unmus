<?php

/*
Maintenance Mode
*/

function unmus_maintenace_mode() {

    $doing_maintenance=get_option('unmus_maintenance');

    if($doing_maintenance) {
        if (! (is_admin() OR is_user_logged_in() ) ) {
            if ( file_exists( WP_CONTENT_DIR . '/maintenance.php' ) ) {
                require_once( WP_CONTENT_DIR . '/maintenance.php' );
                die();
            }
        }
    }

}
add_action('get_header', 'unmus_maintenace_mode');

/* Updates */

$unmus_wordpress_update=get_option('unmus_wordpress_update_auto');
$unmus_plugins_update=get_option('unmus_plugins_update_auto');
$unmus_themes_update=get_option('unmus_plugins_update_auto');

if($unmus_wordpress_update) {
    add_filter( 'allow_major_auto_core_updates', '__return_true' );
}

if($unmus_plugins_update) {
    add_filter( 'auto_update_plugin', '__return_true' );
}

if($unmus_themes_update) {
    add_filter( 'auto_update_theme', '__return_true' );
}

?>