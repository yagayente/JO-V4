<?php
/*
Plugin Name: Translate
Plugin URI: #
Version: 1.0
Author: Simon Bouchard
*/

add_action('init', function() {
  pll_register_string('BASE_THEME', 'retour_home');
  pll_register_string('BASE_THEME', 'filtrage');
  pll_register_string('BASE_THEME', 'fermer');
  pll_register_string('BASE_THEME', 'error_search');
  pll_register_string('BASE_THEME', 'error_article');
  pll_register_string('BASE_THEME', 'error_projet');
  pll_register_string('BASE_THEME', 'all_right');
  pll_register_string('BASE_THEME', 'credit');
  pll_register_string('BASE_THEME', 'les_membres');
  pll_register_string('BASE_THEME', 'le_projet');
  pll_register_string('BASE_THEME', 'partager');
  pll_register_string('BASE_THEME', 'lire_plus');
  pll_register_string('BASE_THEME', 'lien_copie');

});
/*
Use <?php pll_e('lire_plus'); ?>
*/


?>
