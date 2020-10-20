<?php
/**
* Plugin name: WP CPT Plugin
* Description: Class-based plugin for creating custom post types and taxonomies
* Version: 1.0.0
* Author: Andrew Hale
* 
*/
//staging
define( 'CPT_ASSET_URL', plugin_dir_url( __FILE__ ) . 'assets' );


// Load the classes
require_once('classes/post-type.php');
require_once('classes/taxonomy.php');


 /**
  * CUSTOM POST TYPE
  *
  * @param string $singular The singular name of your post type eg: Store.
  * @param string $plural The plural name of your post type eg: Stores.
  * @param string $icon The icon for the admin dashboard menu.
  * @param boolean $public T/F value for whether or not these posts are publically accessible. Defaults to true.
  */

// Create Custom Post Type like this:
//new PostType('Store', 'Stores', 'dashicons-store');



 /**
  * CUSTOM Taxonomy
  *
  * @param string $singular The singular name of your post type eg: Region.
  * @param string $plural The plural name of your post type eg: Regions.
  * @param array $post_types an array of post-types where this tax will be avaialble.
  * @param boolean $hierarchical T/F value for whether or not this tax can have nested terms. Defaults to false.
  */

// Create Custom Taxonomies Like this:
//new Taxonomy('Region', 'Regions', ['store']);


// Load functions
require_once('functions/functions.php');
