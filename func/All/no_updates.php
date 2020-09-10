<?php
/*
Plugin Name: Pas de mise à jour
Plugin URI: #
Version: 1.0
Author: Simon Bouchard
https://jasonjalbuena.com/disable-wordpress-update-notifications/
*/


add_filter( 'auto_update_plugin', '__return_false' );
add_filter( 'auto_update_theme', '__return_false' );

function remove_core_updates () {
     global $wp_version;
     return(object) array(
          'last_checked'=> time(),
          'version_checked'=> $wp_version,
          'updates' => array()
     );
}
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');



add_filter('site_transient_update_plugins', 'dd_remove_update_nag');
function dd_remove_update_nag($value) {
 unset($value->response[ plugin_basename(__FILE__) ]);
 return $value;
}

?>
