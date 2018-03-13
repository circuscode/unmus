<?php

/* 
All about Raketenstaub
*/

/* 
Raketenstaub Custom Post Type
*/

function raketenstaub_custom_post_type() {

		$labels = array(
			'name'               => _x( 'Raketenstaub', 'post type general name' ),
			'singular_name'      => _x( 'Raketenstaub', 'post type singular name' ),
			'add_new'            => __( 'Erstellen'),
			'add_new_item'       => __( 'Erstellen' ),
			'edit_item'          => __( 'Beitrag bearbeiten' ),
			'new_item'           => __( 'Neuer Beitrag' ),
			'all_items'          => __( 'Alle Beiträge' ),
			'view_item'          => __( 'Beiträge ansehen' ),
			'search_items'       => __( 'Beiträge durchsuchen' ),
			'not_found'          => __( 'Keine Beiträge gefunden' ),
			'not_found_in_trash' => __( 'Keine Beiträge im Papierkorb gefunden' ),
			'parent_item_colon'  => '',
			'menu_name'          => 'Raketenstaub'
			);

		$args = array(
			'labels'              => $labels,
			'description'         => 'Fotos',
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'taxonomies' 		  => array('post_tag'),
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'author', 'trackbacks', 'comments', 'revisions', false),
			'has_archive'         => true,
			'can_export'          => true,
			'menu_position'       => 9,
			'capability_type'     => 'post',
			'rewrite'             => array('slug' => 'raketenstaub')
		);

		register_post_type( 'raketenstaub', $args );

}
add_action( 'init', 'raketenstaub_custom_post_type' );

/*
Pinseldisko @ Auf einen Blick
*/

function raketenstaub_cpt_glance_counter( $items = array() ) {
    $post_types = array( 'raketenstaub' ); 
    foreach( $post_types as $type ) {
        if( ! post_type_exists( $type ) ) continue;
        $num_posts = wp_count_posts( $type );
        if( $num_posts ) {
            $published = intval( $num_posts->publish );
            $post_type = get_post_type_object( $type );
            $text = _n( '%s ' . $post_type->labels->singular_name, '%s ' . $post_type->labels->name, $published, 'your_textdomain' );
            $text = sprintf( $text, number_format_i18n( $published ) );
            if ( current_user_can( $post_type->cap->edit_posts ) ) {
            $output = '' . $text . '';
                echo '<li class="post-count"><a class="raketenstaub-count" href="edit.php?post_type=raketenstaub">' . $output . '</a></li>';
            } else {
            $output = '' . $text . '';
                echo ' ' . $output . '';
            }
        }
    }
    return $items;
}
add_filter( 'dashboard_glance_items', 'raketenstaub_cpt_glance_counter', 10, 1 );

/*
Adds Current Menu Item Class @ Nav (for Raketenstaub Archive Page 2 to n)
*/

function raketenstaub_nav_class( $classes, $item ) {

    if ( is_post_type_archive('raketenstaub') && $item->title == 'Raketenstaub' ) {
        $classes[] = 'current-menu-item';
    }

    return $classes;

}
add_filter( 'nav_menu_css_class', 'raketenstaub_nav_class', 10, 2 );

/*
Modify Post per Page
*/

function unmus_raketenstaub_change_posts_per_page( $query ) {

	$amountofposts=get_option('unmus_raketenstaub_amountofposts');

    if ( is_admin() || ! $query->is_main_query() ) {
       return;
    }

    if ( is_post_type_archive( 'raketenstaub' ) ) {
       $query->set( 'posts_per_page', $amountofposts );
    }
}
add_filter( 'pre_get_posts', 'unmus_raketenstaub_change_posts_per_page' );

?>