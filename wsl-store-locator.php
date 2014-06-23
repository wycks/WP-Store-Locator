<?php
/*
Plugin Name: WordPress Store Locator
Plugin URI:
Description: Create a CPT with lat/long fields and render them on location finder Google map
Author: Wycks
Version: 1.0
License: MIT
*/
/**
 * @package WordPress Store Locator
 * @version 1.0
 */

/*

    Copyright (C) Wycks

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


if ( !defined('ABSPATH') ) exit;


/**
*  Post type and taxonomy
*/
require_once( plugin_dir_path( __FILE__ ) . 'wsl-posttypes-taxonomy.php' );


/**
*  Meta box
*/
require_once( plugin_dir_path( __FILE__ ) . 'wsl-meta-boxes.php' );


/**
*  Styles and scripts
*/
require_once( plugin_dir_path( __FILE__ ) . 'wsl-scripts.php' );


/**
*  Templates
*/
require_once( plugin_dir_path( __FILE__ ) . 'wsl-admin.php' );