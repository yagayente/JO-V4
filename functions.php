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
	wp_enqueue_style( 'style', get_stylesheet_uri() );
wp_enqueue_script('vanilla_lazyload', get_stylesheet_directory_uri() . '/js/lazysizes.min.js');
  wp_enqueue_script('barba', get_template_directory_uri() . '/js/barba.umd.js', array('jquery'), '2.9.7',true);
  wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js', array(), false, true);
  wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts_simon.js', array('jquery'), '201599', true );
  wp_enqueue_script( 'scrollfunc', get_template_directory_uri() . '/js/scrollfunc.js', array('jquery'), '201599', true );

}
add_action( 'wp_enqueue_scripts', 'portfolio_scripts' );
