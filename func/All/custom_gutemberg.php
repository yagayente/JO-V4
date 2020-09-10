<?php
/*
Plugin Name: GUTEMBERG FOR ME
Plugin URI: #
Version: 1.0
Author: Simon Bouchard
*/
add_theme_support('disable-custom-font-sizes');
function wpdc_disable_gutenberg_colour_settings() {
	add_theme_support( 'disable-custom-colors' );
	add_theme_support( 'editor-color-palette' );
}
add_action( 'after_setup_theme', 'wpdc_disable_gutenberg_colour_settings' );

add_theme_support('disable-custom-font-sizes');


// disable gutemberg for posts
add_filter('use_block_editor_for_post', '__return_false', 10);


 //*  QUEL TYPE DE BLOCK DISPLAY ?
add_filter( 'allowed_block_types', 'misha_allowed_block_types' );
add_filter( 'allowed_block_types', 'misha_allowed_block_types', 10, 2 );
function misha_allowed_block_types( $allowed_blocks, $post ) {

	$allowed_blocks = array(
		'core/image',
		'core/paragraph',
		'core/heading',
		'core/list',
    'core/quote',
	);

	if( $post->post_type === 'page' ) {
		$allowed_blocks[] = 'core/shortcode';
	}

	return $allowed_blocks;

}
?>
