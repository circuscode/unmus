<?php

/* 
All about Taxonomies
*/ 

/* 
Pinseldisko Taxonomy
*/

add_action( 'init', 'create_athlete_taxonomy' );

function create_athlete_taxonomy() {
	$labels = array(
		'name'                           => 'Athletes',
		'singular_name'                  => 'Athlete',
		'search_items'                   => 'Search Athletes',
		'all_items'                      => 'All Athletes',
		'edit_item'                      => 'Edit Athlete',
		'update_item'                    => 'Update Athlete',
		'add_new_item'                   => 'Add New Athlete',
		'new_item_name'                  => 'New Athlete Name',
		'menu_name'                      => 'Athlete',
		'view_item'                      => 'View Athlete',
		'popular_items'                  => 'Popular Athlete',
		'separate_items_with_commas'     => 'Separate athletes with commas',
		'add_or_remove_items'            => 'Add or remove athletes',
		'choose_from_most_used'          => 'Choose from the most used athletes',
		'not_found'                      => 'No athletes found'
	);

	register_taxonomy(
		'athlete',
		'post',
		array(
			'label' => __( 'Athlete' ),
			'hierarchical' => false,
			'labels' => $labels,
			'public' => true,
			'show_in_nav_menus' => false,
			'show_tagcloud' => false,
			'show_admin_column' => true,
			'rewrite' => array(
				'slug' => 'athletes'
			)
		)
	);
}

?>