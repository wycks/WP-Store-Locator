<?php
/**
 * @package WordPress Store Locator
 * @version 1.0
 */


 /*
 * Create an admin page to manually create JSON location file under Settings
 *
 */
function wsl_plugin_menu() {
    add_options_page( 'map-locations', 'Locations maker', 'manage_options', 'locations.php', 'wsl_loc_options' );
}

add_action('admin_menu', 'wsl_plugin_menu');

function wsl_loc_options(){
    include_once( plugin_dir_path( __FILE__ ) . 'wsl-locations.php');
}