<?php
/**
 * Template Name: Locations Page
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<div id="primary" >
  <div id="content" role="main">

    <div id="form-container">
        <form id="user-location" method="post" action="#">
            <div id="form-input">
                <label for="address">Enter your Location, Address or Postal Code to find the nearest location::</label>
                <br>
                <input class="field" type="text" id="address" name="address"/>
            </div>
            <br>
            <button class="submit" id="submit-loc" type="submit">Find</button>
        </form>
    </div>

    <div id="map-container">
        <div id="loc-list">
            <ul id="list"></ul>
        </div>
        <div id="map"></div>
    </div>


    </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>