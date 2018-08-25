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

?>