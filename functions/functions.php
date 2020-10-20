<?php

// Write any custom functionality here

// Load assets in the admin area
function enqueue_admin_assets( $hook ) {
    wp_enqueue_style( 'custom-post-type-admin-style', CPT_ASSET_URL . '/css/style.css', [], '1.0');
    wp_enqueue_script( 'custom-post-type-admin-script', CPT_ASSET_URL . '/js/script.js', [], '1.0' );
}
add_action( 'admin_enqueue_scripts', 'enqueue_admin_assets' );