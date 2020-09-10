<?php
/*
Plugin Name: Nettoyer le back office
Plugin URI: #
Version: 1.0
Author: Simon Bouchard
*/


add_filter( 'admin_footer_text', '__return_false' );

// example custom dashboard widget
function custom_dashboard_widget() {
	echo "<p>Dearest Client, Here&rsquo;s how to do that thing I told you about yesterday...</p>";
}
function add_custom_dashboard_widget() {
	wp_add_dashboard_widget('custom_dashboard_widget', 'How to Do Something in WordPress', 'custom_dashboard_widget');
}
add_action('wp_dashboard_setup', 'add_custom_dashboard_widget');










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

    $GLOBALS['title'] =  __( 'Infos' );
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
add_filter( 'contextual_help', 'oz_remove_help_tabs', 999, 3 );


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

  remove_menu_page( 'jetpack' );                    //Jetpack*
  remove_menu_page( 'edit-comments.php' );          //Comments
  remove_menu_page( 'themes.php' );                 //Appearance
  remove_menu_page( 'plugins.php' );                //Plugins
  remove_menu_page( 'tools.php' );                  //Tools

}
add_action( 'admin_menu', 'wpdocs_remove_menus' );

function gn_css_admin_page_media() {
	if ( !current_user_can('manage_options' ) ) {
?>
	    <style type="text/css">
	        .upload-php #wpbody-content .add-new-h2 { display: none;}
	    </style>
<?php
	}
}
add_action('admin_head','gn_css_admin_page_media');
?>
