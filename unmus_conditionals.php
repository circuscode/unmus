<?php

/*
Conditionals
*/

/*
Get Environment
*/

function unmus_get_environment() {
    return get_option('unmus_environment');
}

/*
Is local
*/

function is_unmus_environment_local() {
    $environ=get_option('unmus_environment');
    if($environ=='local') {
        return true;
    }
    else {
        return false;
    }
}

/*
Is dev
*/

function is_unmus_environment_dev() {
    $environ=get_option('unmus_environment');
    if($environ=='dev') {
        return true;
    }
    else {
        return false;
    }
}

/*
Is public
*/

function is_unmus_environment_public() {
    $environ=get_option('unmus_environment');
    if($environ=='public') {
        return true;
    }
    else {
        return false;
    }
}

/*
Is Zirkusliebe Post Archive
*/

function is_zirkusliebe_archive() {

    // With Podlove Release 2.7 this is not required anymore
    // https://github.com/podlove/podlove-publisher/commit/b4d9f148ecb5fc82520a775cc38a77ec505aeb3a

    $current_url = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    $localdevurl='http://localunmus/zirkusliebe/';
	$webdevurl='http://dev.unmus.de/zirkusliebe/';
	$webprodurl='https://www.unmus.de/zirkusliebe/';
	
	$localdev=false;
	$webdev=false;
	$webprod=false;
	
	$localdev=strpos($current_url,$localdevurl);
	$webdev=strpos($current_url,$webdevurl);
	$webprod=strpos($current_url,$webprodurl);
	
	if ( $localdev !== false ) { 
		return true;
    }
    if ( $webdev !== false ) { 
		return true;
    }
    if ( $webprod !== false ) { 
		return true;
    }

}

?>