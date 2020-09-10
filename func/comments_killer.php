<?php
/*
Plugin Name: Comments Killer
Plugin URI: #
Description: Faster, Comments! Kill! Kill!
Version: 1.0
Author: David FELIX-FAURE
Author URI: http://www.felixfaure.fr/
License: GPL2
Text Domain: killcmt
*/


class Comments_Killer {
	public function __construct() {
    add_action( 'init', array( $this, 'remove_comments_post_support' ), 10 );
    add_action( 'template_redirect', array( $this, 'remove_comments_in_admin_bar' ) );
    add_action( 'admin_init', array( $this, 'remove_comments_in_admin_bar' ) );
    add_action( 'admin_menu', array( $this, 'remove_comments_in_admin_menu' ), 9999 );
	}

  public function remove_comments_post_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
    remove_post_type_support( 'attachment', 'comments' );
  }

  public function remove_comments_in_admin_bar() {
    if( is_admin_bar_showing() ) {
      remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
    }
  }

  public function remove_comments_in_admin_menu(){
    global $pagenow;

    if ( $pagenow == 'comment.php' || $pagenow == 'edit-comments.php' )
      wp_die( __( 'Comments are closed.' ), '', array( 'response' => 403 ) );

    remove_menu_page( 'edit-comments.php' );
  }
}

$killComments = new Comments_Killer();
?>
