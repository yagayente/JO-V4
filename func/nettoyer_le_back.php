<?php
/*
Plugin Name: Nettoyer le back office
Plugin URI: #
Version: 2.0
Date : 15 sept 2020
Author: Simon Bouchard
*/


add_filter( 'admin_footer_text', '__return_false' );

// enlever les étiquettes
add_action('init', 'remove_default_taxos', 2 );
function remove_default_taxos() {
	global $wp_taxonomies;
	unset($wp_taxonomies['post_tag']);
}




function __default_local_avatar()  // Enlever Avatar

{
    return get_bloginfo('template_directory') . '/images/default_avatar.png';
}
add_filter( 'pre_option_avatar_default', '__default_local_avatar' );

function remove_screen_options(){ // Enlever option de l'écran
    return false;
}
add_filter('screen_options_show_screen', 'remove_screen_options'); // Enlever option aide



add_action( 'admin_head', 'q167372_dash_name' );// Titre à l'arrivé
function q167372_dash_name(  ){
    if ( $GLOBALS['pagenow'] != 'index.php' ){
        return;
    }
    $GLOBALS['title'] =  __( 'Josephine Ohl' );
}

function remove_dashboard_meta() { // Enlever les trucs du dashboard
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
	remove_meta_box( 'woocommerce_dashboard_recent_reviews', 'dashboard', 'normal' );
	remove_meta_box( 'dlm_popular_downloads', 'dashboard', 'normal' );
}
add_action( 'admin_init', 'remove_dashboard_meta' );

function oz_remove_help_tabs( $old_help, $screen_id, $screen ){
    $screen->remove_help_tabs();
    return $old_help;
}
add_filter( 'get_current_screen', 'oz_remove_help_tabs', 999, 3 );


function remove_admin_bar_links() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
  $wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
  $wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
  $wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
  $wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
  $wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
  $wp_admin_bar->remove_menu('view-site');        // Remove the view site link
  $wp_admin_bar->remove_menu('comments');         // Remove the comments link
  $wp_admin_bar->remove_menu('new-content');      // Remove the content link
  $wp_admin_bar->remove_menu('w3tc');             // If you use w3 total cache remove the performance link
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );



add_action( 'admin_bar_menu', 'remove_my_account', 999 );
function remove_my_account( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'my-account' );
}

add_action( 'admin_bar_menu', 'add_logout', 999 );
function add_logout( $wp_admin_bar ) {
    $args = array(
        'id'     => 'logout',           // id of the existing child node (New > Post)
        'title'  => 'Se déconnecter',   // alter the title of existing node
        'parent' => 'top-secondary',    // set parent
    );
    $wp_admin_bar->add_node( $args );
}

remove_action('admin_color_scheme_picker', 'admin_color_scheme_picker'); //enlever le choix de couleur

function wpdocs_remove_menus(){ //enlever des menus
	if(current_user_can('manage_options')){
			return;
	}
	remove_menu_page( 'jetpack' );                    //Jetpack*
	remove_menu_page( 'edit-comments.php' );          //Comments
	remove_menu_page( 'themes.php' );                 //Appearance
	remove_menu_page( 'plugins.php' );                //Plugins
	remove_menu_page( 'tools.php' );                  //Tools
	remove_menu_page( 'index.php' );                  //Dashboard
	remove_menu_page( 'jetpack' );
	remove_menu_page( 'users.php' );
	remove_menu_page( 'edit.php?post_type=page' );
	remove_menu_page( 'upload.php' );
	remove_menu_page( 'profile.php' );
}
add_action( 'admin_menu', 'wpdocs_remove_menus' );

function gn_css_admin_page_media() {
	if ( !current_user_can('manage_options' ) ) {
?>
	    <style type="text/css">
	        .upload-php #wpbody-content .add-new-h2 { display: none;}
					#dashboard-widgets-wrap{ display: none;}

	    </style>
<?php
	}
}
add_action('admin_head','gn_css_admin_page_media');

function hide_wp_update_nag() {
remove_action( 'admin_notices', 'update_nag', 3 );
}
add_action('admin_menu','hide_wp_update_nag');

?>
