<?php

/**
 * FTP
 * 
 * @package unmus
 * @since 0.9
 */

function unmus_media_path ( $param ){

    $year=date("Y");
    $custom_path = '/'.$year;

    $param['path'] = $param['path'] . $custom_path;
    $param['url'] = $param['url'] . $custom_path;

    return $param;

}
add_filter('upload_dir', 'unmus_media_path');

?>