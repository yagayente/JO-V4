<?php
/*
Plugin Name: Nettoyage header
Plugin URI: #
Version: 2.0
Author: Simon Bouchard
*/


function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

function remove_jquery_migrate( $scripts ) {
   if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
        $script = $scripts->registered['jquery'];
   if ( $script->deps ) {
        $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
 }
 }
 }
add_action( 'wp_default_scripts', 'remove_jquery_migrate' );
function crunchify_remove_version() { return '';}
function wpb_disable_feed() {
wp_die( __('No feed available,please visit our <a href="'. get_bloginfo('url') .'">homepage</a>!') );}
add_action('do_feed', 'wpb_disable_feed', 1);
add_action('do_feed_rdf', 'wpb_disable_feed', 1);
add_action('do_feed_rss', 'wpb_disable_feed', 1);
add_action('do_feed_rss2', 'wpb_disable_feed', 1);
add_action('do_feed_atom', 'wpb_disable_feed', 1);
add_action('do_feed_rss2_comments', 'wpb_disable_feed', 1);
add_action('do_feed_atom_comments', 'wpb_disable_feed', 1);
add_filter('the_generator', 'crunchify_remove_version');
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);
remove_action( 'wp_head', 'wp_resource_hints', 2 );
remove_action ('wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'wp_shortlink_wp_head');
remove_action( 'wp_head', 'feed_links', 2 );
remove_action('wp_head', 'feed_links_extra', 3 );
add_filter( 'feed_links_show_comments_feed', '__return_false' );
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'wp_head',      'rest_output_link_wp_head'              );
function crunchify_cleanup_query_string( $src ){ $parts = explode( '?', $src ); return $parts[0];}
add_filter( 'script_loader_src', 'crunchify_cleanup_query_string', 15, 1 );
add_filter( 'style_loader_src', 'crunchify_cleanup_query_string', 15, 1 );
add_action( 'wp_print_styles',     'my_deregister_styles', 100 );
function my_deregister_styles()    {wp_deregister_style( 'dashicons' );}
function wpassist_remove_block_library_css(){wp_dequeue_style( 'wp-block-library' );}
add_action( 'wp_enqueue_scripts', 'wpassist_remove_block_library_css' );
function itsme_disable_feed() {wp_die( __( 'No feed available, please visit the homepage!' ) );}


?>
