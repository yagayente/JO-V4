<?php
/*
Plugin Name: Image Reset NETTOYAGE DES TAILLES D'IMAGES ET INSTAURATION DE NOUVELLES
Plugin URI: #
Version: 1.0
Author: Simon Bouchard
*/

function shapeSpace_disable_image_sizes($sizes) {
	unset($sizes['thumbnail']);    // disable thumbnail size
	unset($sizes['medium']);       // disable medium size
	unset($sizes['large']);        // disable large size
	unset($sizes['medium_large']); // disable medium-large size
	unset($sizes['1536x1536']);    // disable 2x medium-large size
	unset($sizes['2048x2048']);    // disable 2x large size
	return $sizes;
}
add_action('intermediate_image_sizes_advanced', 'shapeSpace_disable_image_sizes');

// disable scaled image size
add_filter('big_image_size_threshold', '__return_false');
// disable other image sizes
function shapeSpace_disable_other_image_sizes() {
	remove_image_size('post-thumbnail'); // disable images added via set_post_thumbnail_size()
	remove_image_size('another-size');   // disable any other added image sizes
}
add_action('init', 'shapeSpace_disable_other_image_sizes');
add_filter('big_image_size_threshold', '__return_false');
update_option('image_default_link_type','none');
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 1600, 9999 );
add_image_size( '1-width', 200 );
add_image_size( '2-width', 525 );
add_image_size( '3-width', 756 );
add_image_size( '4-width', 934 );
add_image_size( '5-width', 1000 );
add_image_size( '6-width', 1200 );
add_image_size( '7-width', 1500 );
add_image_size( '8-width', 1800 );
add_image_size( '9-width', 2000 );

// ******************** //ACF IMAGE RESPONSIVE********************** //

function awesome_acf_responsive_image($image_id,$image_size,$max_width){
	if($image_id != '') {
	$image_src = wp_get_attachment_image_url( $image_id, $image_size );
	$image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );
  echo 'src="'.$image_src.'" srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'"';
	}
}

?>
