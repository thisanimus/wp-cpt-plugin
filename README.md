# Custom Post Type Plugin
A class-based plugin for making simple custom post types in Wordpress.

##Installation:
- Drag the plugin into your /wp-content/plugins folder.
- Activate in the WP Admin dashboard.
- Create a new custom post type by instantiating a new instance of the PostType class in wp-cpt-plugin.php.
```
new PostType('Store', 'Stores', 'dashicons-store');
```
- Create a new custom taxonomy by instantiating a new instance of the Taxonomy class in wp-cpt-plugin.php.
```
new Taxonomy('Region', 'Regions', ['store']);
```
