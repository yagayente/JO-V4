<?php
/*
Plugin Name: Include Script
*/

add_action( 'wp_enqueue_scripts', 'simon_script_and_styles');
function simon_script_and_styles() {
	wp_register_script( 'STCN_JQUERY', get_stylesheet_directory_uri() . '/inc/custom_jquery.js', array('jquery') );
	wp_enqueue_script( 'STCN_JS', get_template_directory_uri() . '/inc/custom_STCN.js');
 	wp_enqueue_script( 'STCN_JQUERY', 'STCN_JS' );
}

// include custom jQuery
function include_custom_jquery() {
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, false);
}
add_action('wp_enqueue_scripts', 'include_custom_jquery');

function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'reset', get_stylesheet_directory_uri() . '/inc/reset.css', array(), '1.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );


?>
