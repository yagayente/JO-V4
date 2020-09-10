<?php
/*
Plugin Name: Détail
*/

// nombre de caractère excerpt
function custom_excerpt_length( $length ) {
        return 40;
    }
    add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

?>
