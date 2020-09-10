<?php
/*
Plugin Name: Page Option ACF
Plugin URI: #
Version: 1.0
Author: Simon Bouchard
*/




add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Paramètres'),
						'icon_url' => 'dashicons-marker',
            'menu_title'    => __('Paramètres'),
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false,
						'position' => '2.3' // use decimal instead of integer to avoid conflict
        ));
    }
}

?>
