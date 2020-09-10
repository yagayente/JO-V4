<?php
/*
Plugin Name: Pas de mise à jour plugin
Plugin URI: #
Version: 1.0
Author: Simon Bouchard
*/


add_filter('site_transient_update_plugins', 'dd_remove_update_nag');
function dd_remove_update_nag($value) {
 unset($value->response[ plugin_basename(__FILE__) ]);
 return $value;
}

?>
