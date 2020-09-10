<?php
/*
Plugin Name: Social button
Plugin URI: #
Version: 1.0
Author: Simon Bouchard
*/

function wcr_share_buttons() {
    $url = urlencode(get_the_permalink());
    $title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
    $media = urlencode(get_the_post_thumbnail_url(get_the_ID(), 'full'));

    include( locate_template('template-parts/socialbutton.php', false, false) );
}
?>
