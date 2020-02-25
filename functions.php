<?php

add_theme_support('post-thumbnails');


function jdbbt_enqueue_styles() {
    // Load the main stylesheet
    wp_enqueue_style( 'barebone', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'jdbbt_enqueue_styles' );


if ( ! function_exists( 'jdbbt_register_taxonomies' ) ) {

// Register Custom Taxonomy
function jdbbt_register_taxonomies() {

	$labels = array(
		'name'                       => _x( 'Media', 'Taxonomy General Name', 'jd-barebone-theme' ),
		'singular_name'              => _x( 'Medium', 'Taxonomy Singular Name', 'jd-barebone-theme' ),
		'menu_name'                  => __( 'Medium', 'jd-barebone-theme' ),
		'all_items'                  => __( 'All Media', 'jd-barebone-theme' ),
		'parent_item'                => __( 'Parent Medium', 'jd-barebone-theme' ),
		'parent_item_colon'          => __( 'Parent medium:', 'jd-barebone-theme' ),
		'new_item_name'              => __( 'New Medium Name', 'jd-barebone-theme' ),
		'add_new_item'               => __( 'Add New Medium', 'jd-barebone-theme' ),
		'edit_item'                  => __( 'Edit Medium', 'jd-barebone-theme' ),
		'update_item'                => __( 'Update Medium', 'jd-barebone-theme' ),
		'view_item'                  => __( 'View Medium', 'jd-barebone-theme' ),
		'separate_items_with_commas' => __( 'Separate media with commas', 'jd-barebone-theme' ),
		'add_or_remove_items'        => __( 'Add or remove media', 'jd-barebone-theme' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'jd-barebone-theme' ),
		'popular_items'              => __( 'Popular Media', 'jd-barebone-theme' ),
		'search_items'               => __( 'Search Media', 'jd-barebone-theme' ),
		'not_found'                  => __( 'Not Found', 'jd-barebone-theme' ),
		'no_terms'                   => __( 'No media', 'jd-barebone-theme' ),
		'items_list'                 => __( 'Media list', 'jd-barebone-theme' ),
		'items_list_navigation'      => __( 'Media list navigation', 'jd-barebone-theme' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => [
							'slug' => 'medium',
							'with_front' => true,
							'hierarchical' => false,
						],
	);
	register_taxonomy( 'jdbbt_medium', array( 'portfolio_entry' ), $args );

	$labels = array(
		'name'                       => _x( 'Moods', 'Taxonomy General Name', 'jd-barebone-theme' ),
		'singular_name'              => _x( 'Mood', 'Taxonomy Singular Name', 'jd-barebone-theme' ),
		'menu_name'                  => __( 'Mood', 'jd-barebone-theme' ),
		'all_items'                  => __( 'All Moods', 'jd-barebone-theme' ),
		'parent_item'                => __( 'Parent Mood', 'jd-barebone-theme' ),
		'parent_item_colon'          => __( 'Parent Mood:', 'jd-barebone-theme' ),
		'new_item_name'              => __( 'New Mood Name', 'jd-barebone-theme' ),
		'add_new_item'               => __( 'Add New Mood', 'jd-barebone-theme' ),
		'edit_item'                  => __( 'Edit Mood', 'jd-barebone-theme' ),
		'update_item'                => __( 'Update Mood', 'jd-barebone-theme' ),
		'view_item'                  => __( 'View Mood', 'jd-barebone-theme' ),
		'separate_items_with_commas' => __( 'Separate moods with commas', 'jd-barebone-theme' ),
		'add_or_remove_items'        => __( 'Add or remove moods', 'jd-barebone-theme' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'jd-barebone-theme' ),
		'popular_items'              => __( 'Popular Moods', 'jd-barebone-theme' ),
		'search_items'               => __( 'Search Moods', 'jd-barebone-theme' ),
		'not_found'                  => __( 'Not Found', 'jd-barebone-theme' ),
		'no_terms'                   => __( 'No moods', 'jd-barebone-theme' ),
		'items_list'                 => __( 'Moods list', 'jd-barebone-theme' ),
		'items_list_navigation'      => __( 'Moods list navigation', 'jd-barebone-theme' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => [
							'slug' => 'mood',
							'with_front' => true,
							'hierarchical' => false,
						],
	);
	register_taxonomy( 'jdbbt_mood', array( 'portfolio_entry' ), $args );

}
add_action( 'init', 'jdbbt_register_taxonomies', 0 );

}

// Register Custom Post Type
function jdbbt_portfolio_piece() {

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
		'taxonomies'		=> ['jdbbt_medium', 'jdbbt_mood'],
	);
	register_post_type( 'portfolio_entry', $args );
}
add_action( 'init', 'jdbbt_portfolio_piece', 0 );



function jdbbt_modify_query_post_type($query) {
    if ( ! is_admin() && $query->is_main_query() ) {
        $query->set( 'post_type', 'portfolio_entry' );
        $query->set( 'orderby', 'ID' ); // since we don't have revisions for this post_type
        $query->set( 'order', 'DESC' );
    }
}
add_action( 'pre_get_posts', 'jdbbt_modify_query_post_type' );

function jdbbt_register_primary_menu() {
    register_nav_menu( 'primary', __( 'Primary Menu', 'theme-slug' ) );
}
add_action( 'after_setup_theme', 'jdbbt_register_primary_menu' );

function jdbbt_get_tax_terms_string($post, $taxonomy_slug) {
	return join(', ', array_map(function($term){
		return '<a href="'.get_term_link($term).'">'.$term->name.'</a>';
	}, get_the_terms($post, $taxonomy_slug)));
}
