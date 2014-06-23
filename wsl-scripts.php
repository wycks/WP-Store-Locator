<?php
/**
 * @package WordPress Store Locator
 * @version 1.0
 */


if ( !defined('ABSPATH') ) exit;


/**
 *  Load CSS and JS
 *
 */
function wsl_location_styles(){
    if ( is_page_template( 'location-page.php' ) ){

        wp_enqueue_style( 'locationcss', plugins_url( '/css/map.css', __FILE__ ) );
    }
}

add_action( 'wp_enqueue_scripts', 'wsl_location_styles' );


/**
 *  Load JS
 *
 */
function wsl_location_scripts(){
    if ( is_page_template( 'location-page.php' ) ){

        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'locationhandlebars', plugins_url( '/js/handlebars-1.0.0.min.js', __FILE__ ),  array( 'jquery' ), false, false );
        wp_enqueue_script( 'locationgoogle', 'http://maps.google.com/maps/api/js?sensor=falseh',  array( 'jquery' ), false, false );
        wp_enqueue_script( 'locationstore', plugins_url( '/js/jquery.storelocator.js', __FILE__ ),  array( 'jquery' ), false, false );
    }
}

add_action( 'wp_enqueue_scripts', 'wsl_location_scripts' );


/**
 *  Load JS params in footer
 *
 */
function wsl_location_templatescript(){
        if ( is_page_template( 'location-page.php' ) ){ ?>

        <script>

            var pluginDir   = "<?php echo plugins_url('', __FILE__); ?>";

            jQuery('#map-container').storeLocator({
                'dataType': 'json',
                'dataLocation': pluginDir + '/views/results.json',
                'infowindowTemplatePath': pluginDir +'/views/infowindow-description.html',
                'listTemplatePath':  pluginDir + '/views/location-list-description.html',
                //autoGeocode: true,
                'distanceAlert': -1,
                'fullMapStart': true,
                'lengthUnit': 'km',
                'storeLimit': -1
            });

        </script>
 <?php   }
}

add_action( 'wp_footer', 'wsl_location_templatescript' );