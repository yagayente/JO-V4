<?php
/*
Plugin Name: CUSTOM POST TYPE PAGE
Plugin URI: #
Version: 1.0
Author: Simon Bouchard
*/

// Register Custom Post Type
function Projets() {

	$labels = array(
		'name'                  => _x( 'Projets', 'Post Type General Name', 'BASE_THEME' ),
		'singular_name'         => _x( 'Projets', 'Post Type Singular Name', 'BASE_THEME' ),
		'menu_name'             => __( 'Projets', 'BASE_THEME' ),
		'name_admin_bar'        => __( 'Projet', 'BASE_THEME' ),
		'archives'              => __( 'Item Archives', 'BASE_THEME' ),
		'attributes'            => __( 'Item Attributes', 'BASE_THEME' ),
		'parent_item_colon'     => __( 'Parent Item:', 'BASE_THEME' ),
		'all_items'             => __( 'Projets', 'BASE_THEME' ),
		'add_new_item'          => __( 'Add New Item', 'BASE_THEME' ),
		'add_new'               => __( 'Nouveau projet', 'BASE_THEME' ),
		'new_item'              => __( 'New Item', 'BASE_THEME' ),
		'edit_item'             => __( 'Edit Item', 'BASE_THEME' ),
		'update_item'           => __( 'Update Item', 'BASE_THEME' ),
		'view_item'             => __( 'View Item', 'BASE_THEME' ),
		'view_items'            => __( 'View Items', 'BASE_THEME' ),
		'search_items'          => __( 'Search Item', 'BASE_THEME' ),
		'not_found'             => __( 'Not found', 'BASE_THEME' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'BASE_THEME' ),
		'featured_image'        => __( 'Featured Image', 'BASE_THEME' ),
		'set_featured_image'    => __( 'Set featured image', 'BASE_THEME' ),
		'remove_featured_image' => __( 'Remove featured image', 'BASE_THEME' ),
		'use_featured_image'    => __( 'Use as featured image', 'BASE_THEME' ),
		'insert_into_item'      => __( 'Insert into item', 'BASE_THEME' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'BASE_THEME' ),
		'items_list'            => __( 'Items list', 'BASE_THEME' ),
		'items_list_navigation' => __( 'Items list navigation', 'BASE_THEME' ),
		'filter_items_list'     => __( 'Filter items list', 'BASE_THEME' ),
	);
	$args = array(
    'show_in_rest' => false,
		'label'                 => __( 'Projets', 'BASE_THEME' ),
		'description'           => __( 'Post Type Description', 'BASE_THEME' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'category', 'projets' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
    'menu_icon'             => 'dashicons-text-page',
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'Projets', $args );

}
add_action( 'init', 'Projets', 0 );








function Membres() {

	$labels = array(
		'name'                  => _x( 'Membres', 'Post Type General Name', 'BASE_THEME' ),
		'singular_name'         => _x( 'Membres', 'Post Type Singular Name', 'BASE_THEME' ),
		'menu_name'             => __( 'Membres', 'BASE_THEME' ),
		'name_admin_bar'        => __( 'Membre', 'BASE_THEME' ),
		'archives'              => __( 'Item Archives', 'BASE_THEME' ),
		'attributes'            => __( 'Item Attributes', 'BASE_THEME' ),
		'parent_item_colon'     => __( 'Parent Item:', 'BASE_THEME' ),
		'all_items'             => __( 'Membres', 'BASE_THEME' ),
		'add_new_item'          => __( 'Add New Item', 'BASE_THEME' ),
		'add_new'               => __( 'Nouveau membre', 'BASE_THEME' ),
		'new_item'              => __( 'New Item', 'BASE_THEME' ),
		'edit_item'             => __( 'Edit Item', 'BASE_THEME' ),
		'update_item'           => __( 'Update Item', 'BASE_THEME' ),
		'view_item'             => __( 'View Item', 'BASE_THEME' ),
		'view_items'            => __( 'View Items', 'BASE_THEME' ),
		'search_items'          => __( 'Search Item', 'BASE_THEME' ),
		'not_found'             => __( 'Not found', 'BASE_THEME' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'BASE_THEME' ),
		'featured_image'        => __( 'Featured Image', 'BASE_THEME' ),
		'set_featured_image'    => __( 'Set featured image', 'BASE_THEME' ),
		'remove_featured_image' => __( 'Remove featured image', 'BASE_THEME' ),
		'use_featured_image'    => __( 'Use as featured image', 'BASE_THEME' ),
		'insert_into_item'      => __( 'Insert into item', 'BASE_THEME' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'BASE_THEME' ),
		'items_list'            => __( 'Items list', 'BASE_THEME' ),
		'items_list_navigation' => __( 'Items list navigation', 'BASE_THEME' ),
		'filter_items_list'     => __( 'Filter items list', 'BASE_THEME' ),
	);
	$args = array(
    'show_in_rest' => false,
		'label'                 => __( 'Membres', 'BASE_THEME' ),
		'description'           => __( 'Post Type Description', 'BASE_THEME' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'category', 'Membres' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
    'menu_icon'             => 'dashicons-admin-users',
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'Membres', $args );

}
add_action( 'init', 'Membres', 0 );


?>
