WordPress Store Locator
=========


A "nearest" store finder for WordPress. This is not an install and forget plugin. It is bare bones, and meant for developers, it's very easy to work with and extend into something better.

  - Uses a CPT and Taxonomy(optional)
  - Makes use of https://github.com/bjorn2404/jQuery-Store-Locator-Plugin for all the heavy lifting
  - Makes use of  https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress for CPT meta boxes
  - Map output (bar, infowindow, etc) uses handbars.js and is easy to alter, see `/views`
  - See screenhost folder for what it looks like by default.


Notes
----

All .js params and docs can be found here http://www.bjornblog.com/web/jquery-store-locator-plugin. A basic version is loaded in `wsl-scripts.php`

This plugin uses a hardcoded CPT called "Centers" found in `wsl-posttypes-taxonomy.php`, if you change the CPT name make sure to change the query in `wsl-locations` for the JSON output.

No shortcodes are used to cut down on loading bloat, it's better to use a page template to render output, see `wsl-scripts.php` conditionals.

`/example` contains a twentytwelve page template file with the HTML markup, you can drop it in your theme and it should just work.

This version required a manual button click to update the JSON file, found under the "Settings" menu

Meta box validation is not included (for example lat/long fields), I don't like the meta box class and might get around to replacing it.

Todo: Add Google map for picking lat/long fields



License
----

MIT
