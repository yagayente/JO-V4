<?php
/*
Plugin Name: Customizer Killer
Plugin URI: #
Version: 1.0
Author: David Félix-Faure
Author URI: http://www.felixfaure.fr/
Description: You hate this fucking customizer, kill him !
License: GPL2
Text Domain: killcst
*/


class killCst {
	public function __construct() {
		add_action( 'init', array($this, 'initRemoveCustomizer'), 10 );
		add_action( 'admin_init', array($this, 'adminInitRemoveCustomizer'), 10 );
	}

	public function initRemoveCustomizer() {
		// Remove customize capability
		add_filter( 'map_meta_cap', array($this, 'filter_to_remove_customize_capability'), 10, 4 );
	}

	public function adminInitRemoveCustomizer() {
		// Drop some customizer actions
		remove_action( 'plugins_loaded', '_wp_customize_include', 10);
		remove_action( 'admin_enqueue_scripts', '_wp_customize_loader_settings', 11);
		// Manually overrid Customizer behaviors
		add_action( 'load-customize.php', array($this, 'override_load_customizer_action') );
	}

	public function filter_to_remove_customize_capability( $caps = array(), $cap = '', $user_id = 0, $args = array() ) {
		if ($cap == 'customize') {
			return array('nope'); // thanks @ScreenfeedFr, http://bit.ly/1KbIdPg
		}
		return $caps;
	}

	public function override_load_customizer_action() {
		// If accessed directly
		wp_die( __( 'Customizer désactivé.', 'killcst' ) );
	}

}

$killCst = new killCst();
?>
