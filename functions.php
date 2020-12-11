<?php
get_template_part( 'func/image_srcset_size_reset' );
get_template_part( 'func/comments_killer' );
get_template_part( 'func/cache_barre_wordpress' );
get_template_part( 'func/page_option_acf' );
get_template_part( 'func/Nettoyage_header' );
get_template_part( 'func/custom_gutemberg' );
get_template_part( 'func/rename_post' );
get_template_part( 'func/menu' );
get_template_part( 'func/nettoyer_le_back' );

function portfolio_scripts() {
	wp_enqueue_style ('theme-style', get_template_directory_uri().'/assets/index.css');
		wp_enqueue_script('hover', get_template_directory_uri() . '/js/scrollfunc.js', array());
		wp_enqueue_script('AtelierSimonBouchard', get_template_directory_uri() . '/assets/ASB.js', array(), false, true);

}
add_action( 'wp_enqueue_scripts', 'portfolio_scripts' );
