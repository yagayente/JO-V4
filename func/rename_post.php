<?php
/*
Plugin Name: Renommer
*/


add_action( 'init', 'cp_change_post_object' );
// Change dashboard Posts to News
function cp_change_post_object() {
    $get_post_type = get_post_type_object('post');
    $labels = $get_post_type->labels;
        $labels->name = 'Projets';
        $labels->singular_name = 'Projet';
        $labels->add_new = 'Ajouter';
        $labels->add_new_item = 'Nouveau projet';
        $labels->edit_item = 'Edit projet';
        $labels->new_item = 'Projets';
        $labels->view_item = 'View Projets';
        $labels->search_items = 'Search Projets';
        $labels->not_found = 'No News found';
        $labels->not_found_in_trash = 'No News found in Trash';
        $labels->all_items = 'Tous';
        $labels->menu_name = 'Projets';
        $labels->name_admin_bar = 'Projets';
}

?>
