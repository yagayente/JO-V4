<?php
/*
Plugin Name: Enlever Jquery
Plugin URI: #
Version: 1.0
Author: Simon Bouchard
*/

function my_init() {if (!is_admin()) {wp_deregister_script('jquery');wp_register_script('jquery', false);}}
// Enleve le jquery de base de wordpress


?>
