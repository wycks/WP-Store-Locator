<?php
/**
 * @package WordPress Store Locator
 * @version 1.0
 */


if ( !defined('ABSPATH') ) exit;

/**
 * Initilize the meta box class
 * Ref: https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress
 */
function wsl_initialize_cmb_meta_boxes() {
    if ( !class_exists( 'cmb_Meta_Box' ) ) {
        require_once( plugin_dir_path( __FILE__ ) .'lib/init.php' );
    }
}

add_action( 'init', 'wsl_initialize_cmb_meta_boxes', 9999 );


/**
 * Registers meta boxes for "centers" post type
 *
 */
function wsl_metaboxes( $meta_boxes ) {
    $prefix = '_cmb_'; // Prefix for all fields
    $meta_boxes[] = array(
        'id' => 'Locations',
        'title' => 'Locations',
        'pages' => array('centers'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Name',
                'desc' => 'Shop name',
                'id' => $prefix . 'shopname',
                'type' => 'text'
            ),
            array(
                'name' => 'Proprietor',
                'desc' => 'Proprietor\'s name',
                'id' => $prefix . 'owner',
                'type' => 'text'
            ),
            array(
                'name' => 'Address',
                'id' => $prefix . 'address',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'City',
                'id' => $prefix . 'city',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Postal',
                'desc' => 'Postal code',
                'id' => $prefix . 'postal',
                'type' => 'text_small'
            ),
            array(
                'name' => __( 'Email', 'cmb' ),
                'id'   => $prefix . 'email',
                'type' => 'text_email',
            ),
            array(
                'name' => 'Telephone',
                'id' => $prefix . 'telephone',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Store Number #',
                'desc' => 'Unique ID for each store',
                'id' => $prefix . 'locnumber',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Lat',
                'desc' => 'Enter store latitude  ',
                'id' => $prefix . 'lat',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Long',
                'desc' => 'Enter store longitude ',
                'id' => $prefix . 'long',
                'type' => 'text_medium'
            ),
        ),
    );

    return $meta_boxes;
}

add_filter( 'cmb_meta_boxes', 'wsl_metaboxes' );