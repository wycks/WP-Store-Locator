<?php
// Get CPT info - render into JSON
?>

<div class="wrap">
    <h2>Map Locations</h2>
    <p>This button should be run if a new store location is added, removed or changes location info</p>

    <form method="post" action="<?php echo admin_url( '/options-general.php?page=locations.php'); ?>">
        <?php wp_nonce_field('updatemap_action','updatemap_json'); ?>
        <p class="submit">
        <input type="submit" class="button-primary" value="<?php _e('Update Listings') ?>" name="submitmap" />
        </p>
    </form>
</div>

<?php
    if(isset($_POST['submitmap'])) {
        if ( !empty($_POST['submitmap']) && check_admin_referer( 'updatemap_action', 'updatemap_json' ) && current_user_can('activate_plugins')) {
           wsl_run_json_request();
        }else{
            wp_die('Security check fail');
        }
    }

    // WP_Query arguments for locations
    // Writes to JSON file
   function wsl_run_json_request () {

        $args = array(
            'posts_per_page' => -1,
            'post_type'      => 'centers',
            'orderby'        => 'ASC',
        );

    $jsonquery = new WP_Query( $args );
    $loc_array = array();

    if ( $jsonquery->have_posts() ) {
        while ( $jsonquery->have_posts() ) {

            $jsonquery->the_post();
            $wsl_id = $jsonquery->current_post + 1;

            $custom_fields = get_post_custom();

            $wsl_shop      = $custom_fields[ '_cmb_shopname' ][ 0 ];
            $wsl_adr       = $custom_fields[ '_cmb_address' ][ 0 ];
            $wsl_city      = $custom_fields[ '_cmb_city' ][ 0 ];
            $wsl_tel       = $custom_fields[ '_cmb_telephone' ][ 0 ];
            $wsl_lat       = $custom_fields[ '_cmb_lat' ][ 0 ];
            $wsl_long      = $custom_fields[ '_cmb_long' ][ 0 ];
            $wsl_url       = get_permalink();

            $loc_array[ ] = array(
                'id'      => $wsl_id,
                'name'    => $wsl_shop,
                'lat'     => $wsl_lat,
                'lng'     => $wsl_long,
                'address' => $wsl_adr,
                'city'    => $wsl_city,
                'phone'   => $wsl_tel,
                'web'     => $wsl_url
            );

            //output on page for visual + check
            echo $wsl_shop . " &#10004;";
            echo '<br>';
        }

        //write to file used by jquery location finder
        $json_path = plugin_dir_path( __FILE__ ) . 'views/results.json';
        file_put_contents( $json_path, json_encode( $loc_array ) );

    } else {
        echo 'Sorry there was an error';
    }
    // Restore original Post Data
    wp_reset_postdata();
}