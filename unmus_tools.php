<?php

/* 
Mathilda Tools @ Menu
*/

function unmus_tools_menu() {
    	add_management_page(
            'Scripting',
            'Scripting',
            'manage_options',
            'unmus-tools-menu',
            'unmus_tools_controller'
        );
}

add_action('admin_menu', 'unmus_tools_menu');

/*
Mathilda Tools Controller
*/

function unmus_tools_controller() {
	
	echo '<div class="wrap">';

    /* Headline */
	echo '<h1 class="unmus_tools_headline">Scripting</h1>
    <p class="unmus_tools_description">unmus</p>';
    
    unmus_scripting();
	
	echo '</div>';
	
}

?>