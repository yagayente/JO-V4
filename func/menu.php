<?php
/*
Plugin Name: MENU 2020
*/
/*


<?php wp_nav_menu( array(
        'location' => 'Menuprincipal',
        'container' => 'ul',
        'menu_class'=> 'Menu_principal',
        'menu_id' => 'menu',
        'depth' => 1 ) );
      ?>
*/


function register_my_menu() {
  register_nav_menu('topnav',__( 'Menuprincipal' ));
 }
 add_action( 'init', 'register_my_menu' );

function add_menuclass($ulclass)
{
   return preg_replace('/<a /', '<a class="nav-link" ', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');

add_filter( 'nav_menu_link_attributes', 'add_custom_data_atts_to_nav', 10, 4 );
function add_custom_data_atts_to_nav( $atts, $item, $args )
{
  $atts['onmouseover'] = "changeColorIn_$item->title()";
  $atts['onmouseout'] = "changeColorOut_$item->title()";
  $atts['id'] = "$item->title";
  return $atts;
}

add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
  return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}

?>
