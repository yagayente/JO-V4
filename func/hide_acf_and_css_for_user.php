<?php

 /**
  * ... hide  from wpadmin for all except me
  */

  function wpdocs_remove_menus(){ //enlever des menus

    $current_user = wp_get_current_user();
    $mon_nom_dutilisateur = 'simonbouchardadmin';

    if(current_user_can('manage_options') AND $current_user->user_nicename == $mon_nom_dutilisateur){

        return;
    }
      remove_menu_page( 'index.php' );
      remove_menu_page( 'jetpack' );                    //Jetpack*
      remove_menu_page( 'edit-comments.php' );          //Comments
      remove_menu_page( 'themes.php' );                 //Appearance
      remove_menu_page( 'users.php' );
      remove_menu_page( 'edit.php?post_type=page' );
  }
  add_action( 'admin_menu', 'wpdocs_remove_menus' );


?>
