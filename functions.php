<?php
get_template_part( 'func/image_srcset_size_reset' );
get_template_part( 'func/comments_killer' );
get_template_part( 'func/cache_barre_wordpress' );
get_template_part( 'func/page_option_acf' );
get_template_part( 'func/Nettoyage_header' );
get_template_part( 'func/custom_gutemberg' );
get_template_part( 'func/rename_post' );

function portfolio_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
wp_enqueue_script('vanilla_lazyload', get_stylesheet_directory_uri() . '/js/lazysizes.min.js');
  wp_enqueue_script('barba', 'https://unpkg.com/@barba/core', array(), '2.9.7',true);
  wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js', array(), false, true);
  wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts_simon.js', array('jquery'), '201599', true );
  wp_enqueue_script( 'scrollfunc', get_template_directory_uri() . '/js/scrollfunc.js', array('jquery'), '201599', true );
  
}
add_action( 'wp_enqueue_scripts', 'portfolio_scripts' );




// register the nav
function register_my_menu() {
  register_nav_menu('topnav',__( 'topnav' ));
 }
 add_action( 'init', 'register_my_menu' );

// let's add "*active*" as a class to the li

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}

// let's add our custom class to the actual link tag    

function atg_menu_classes($classes, $item, $args) {
  if($args->theme_location == 'topnav') {
    $classes[] = 'nav-link';
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);

function add_menuclass($ulclass) {
   return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');