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

?>