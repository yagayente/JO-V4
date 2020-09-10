<?php
/*
Plugin Name: cache la barre admin wordpress
Plugin URI: #
Version: 1.0
Author: Simon Bouchard
*/

function remove_admin_login_header() {remove_action('wp_head', '_admin_bar_bump_cb');}
add_action('get_header', 'remove_admin_login_header');

add_filter('show_admin_bar', '__return_false');


?>
