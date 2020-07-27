<?php

/* 
All about Zimtwolke
*/

/* 
Zimtwolke Custom Post Types 
*/

function ello_custom_post_type() {

		$labels = array(
			'name'               => _x( 'Zimtwolke', 'post type general name' ),
			'singular_name'      => _x( 'Zimtwolke', 'post type singular name' ),
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
			'menu_name'          => 'Zimtwolke'
			);

		$args = array(
			'labels'              => $labels,
			'description'         => 'That is Zimtwolke!',
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'taxonomies' => array('post_tag'),
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'supports'            => array( 'title', 'editor', false, 'author', 'trackbacks', 'comments', 'revisions', 'post-formats','custom-fields'),
			'has_archive'         => true,
			'can_export'          => true,
			'menu_position'       => 8,
			'capability_type'     => 'post',
			'rewrite'             => array('slug' => 'zimtwolke' ),
			'show_in_rest'        => true
		);

		register_post_type( 'ello', $args );

}
add_action( 'init', 'ello_custom_post_type' );

/*
Zimtwolke @ Auf einen Blick
*/

 function ello_glance_counter( $items = array() ) {
    $post_types = array( 'ello' ); 
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
                echo '<li class="post-count"><a class="ello-count" href="edit.php?post_type=ello">' . $output . '</a></li>';
            } else {
            $output = '' . $text . '';
                echo ' ' . $output . '';
            }
        }
    }
    return $items;
}
add_filter( 'dashboard_glance_items', 'ello_glance_counter', 10, 1 );

/*
Adds Current Menu Item Class @ Nav (for Zimtwolke Archive Page 2 to n)
*/

function ello_special_nav_class( $classes, $item ) {

    if ( is_post_type_archive('ello') && $item->title == 'Zimtwolke' ) {
        $classes[] = 'current-menu-item';
    }

    return $classes;

}
add_filter( 'nav_menu_css_class', 'ello_special_nav_class', 10, 2 );

/*
Modify Post per Page
*/

function unmus_ello_change_posts_per_page( $query ) {

	$amountofposts=get_option('unmus_ello_amountofposts');

    if ( is_admin() || ! $query->is_main_query() ) {
       return;
    }

    if ( is_post_type_archive( 'ello' ) ) {
       $query->set( 'posts_per_page', $amountofposts );
    }
}
add_filter( 'pre_get_posts', 'unmus_ello_change_posts_per_page' );

?>