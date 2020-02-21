<?php
add_theme_support('post-thumbnails');


function bb_enqueue_styles() {
    // Load the main stylesheet
    wp_enqueue_style( 'barebone', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'bb_enqueue_styles' );

// Register Custom Post Type
function bb_portfolio_piece() {

	$labels = array(
		'name'                  => 'Portfolio Entries',
		'singular_name'         => 'Portfolio Entry',
		'menu_name'             => 'Portfolio Entries',
		'name_admin_bar'        => 'Portfolio Entry',
		'archives'              => 'Portfolio Entry Archives',
		'attributes'            => 'Portfolio Entry Attributes',
		'parent_item_colon'     => 'Parent Portfolio Entry:',
		'all_items'             => 'All Portfolio Entries',
		'add_new_item'          => 'Add New Portfolio Entry',
		'add_new'               => 'Add New',
		'new_item'              => 'New Portfolio Entry',
		'edit_item'             => 'Edit Portfolio Entry',
		'update_item'           => 'Update Portfolio Entry',
		'view_item'             => 'View Portfolio Entry',
		'view_items'            => 'View Portfolio Entries',
		'search_items'          => 'Search Portfolio Entry',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into portfolio entry',
		'uploaded_to_this_item' => 'Uploaded to this portfolio entry',
		'items_list'            => 'Portfolio Entries list',
		'items_list_navigation' => 'Portfolio Entries list navigation',
		'filter_items_list'     => 'Filter portfolio entry list',
	);
	$args = array(
		'label'                 => 'Portfolio Entry',
		'description'           => 'A piece of art',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'post-formats' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 25,
		'menu_icon'             => 'dashicons-admin-customizer',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
    // TODO: Add taxonomies
	register_post_type( 'portfolio_entry', $args );
}
add_action( 'init', 'bb_portfolio_piece', 0 );

function bb_modify_query_post_type($query) {
    if ( ! is_admin() && $query->is_main_query() ) {
        $query->set( 'post_type', 'portfolio_entry' );
        $query->set( 'orderby', 'ID' ); // since we don't have revisions for this post_type
        $query->set( 'order', 'DESC' );
    }
}
add_action( 'pre_get_posts', 'bb_modify_query_post_type' );

function bb_register_primary_menu() {
    register_nav_menu( 'primary', __( 'Primary Menu', 'theme-slug' ) );
}
add_action( 'after_setup_theme', 'bb_register_primary_menu' );
