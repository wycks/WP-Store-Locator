<?php
/**
 * @package WordPress Store Locator
 * @version 1.0
 */


if ( !defined('ABSPATH') ) exit;

/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
function wsl_location_posttype() {

    $labels = array(
        'name'                => __( 'Centers' ),
        'singular_name'       => __( 'Center' ),
        'add_new'             => __( 'Add New Center' ),
        'add_new_item'        => __( 'Add New Center' ),
        'edit_item'           => __( 'Edit Center' ),
        'new_item'            => __( 'New Center' ),
        'view_item'           => __( 'View Center' ),
        'search_items'        => __( 'Search Centers' ),
        'not_found'           => __( 'No Centers found' ),
        'not_found_in_trash'  => __( 'No Centers found in Trash' ),
        'parent_item_colon'   => __( 'Parent Center:' ),
        'menu_name'           => __( 'Centers' ),
    );

    $args = array(
        'labels'              => $labels,
        'hierarchical'        => false,
        'description'         => 'description',
        'taxonomies'          => array('locations'),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => null,
        'menu_icon'           => null,
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'has_archive'         => true,
        'query_var'           => true,
        'can_export'          => true,
        'rewrite'             => true,
        'capability_type'     => 'post',
        'supports'            => array(
            'title',  'thumbnail',
            'excerpt','custom-fields', 'revisions', 'post-formats'
        )
    );

    register_post_type( 'centers', $args );
}

add_action( 'init', 'wsl_location_posttype' );



/**
 * Registers a new taxonomy type
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
function wsl_taxonomy_locations() {

    $labels = array(
        'name' => _x( 'Locations', 'locations' ),
        'singular_name' => _x( 'Location', 'locations' ),
        'search_items' => _x( 'Search Locations', 'locations' ),
        'popular_items' => _x( 'Popular Locations', 'locations' ),
        'all_items' => _x( 'All Locations', 'locations' ),
        'parent_item' => _x( 'Parent Location', 'locations' ),
        'parent_item_colon' => _x( 'Parent Location:', 'locations' ),
        'edit_item' => _x( 'Edit Location', 'locations' ),
        'update_item' => _x( 'Update Location', 'locations' ),
        'add_new_item' => _x( 'Add New Location', 'locations' ),
        'new_item_name' => _x( 'New Location', 'locations' ),
        'separate_items_with_commas' => _x( 'Separate locations with commas', 'locations' ),
        'add_or_remove_items' => _x( 'Add or remove locations', 'locations' ),
        'choose_from_most_used' => _x( 'Choose from the most used locations', 'locations' ),
        'menu_name' => _x( 'Locations', 'locations' ),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => false,
        'show_admin_column' => true,
        'hierarchical' => true,
        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'locations', array('centers'), $args );
}

add_action( 'init', 'wsl_taxonomy_locations' );