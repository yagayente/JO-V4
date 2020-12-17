<?php
/*
Plugin Name: Responsive image avec Lazyload (https://github.com/aFarkas/lazysizes)
Plugin URI: #
Version: 1.0
Author: Simon Bouchard
*/

// thumbnail, medium, large, medium_large, 1536x1536, 2048x2048


// ******************** //ACF IMAGE RESPONSIVE********************** //
// 1 - ajouter les picture en background et voir ce que ça donne sur le responsive
// 2 -

add_image_size( 'BIG', 2500 );

function responsive_image($image_id,$image_size,$max_width){
	if($image_id != '') {
	$image_src = wp_get_attachment_image_url( $image_id, "medium" );
	$image_srcset = wp_get_attachment_image_srcset( $image_id, $max_width );
	$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
  echo 'alt="'.$image_alt.'" data-sizes="auto" data-srcset="'.$image_srcset.'" data-src="'.$image_src.'" class="lazyload"';
	}
}




?>
