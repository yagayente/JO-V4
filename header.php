<!doctype html>
<html
      <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <title>
    <?php the_field('nom_du_site', 'options'); ?>
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php the_field('description_du_site', 'options'); ?>"/>
  <meta name="keywords" content="<?php the_field('mots_clefs', 'options'); ?>">
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
  <link href="<?php the_field('favicon', 'options'); ?>" rel="shortcut icon" type="image/x-icon" />
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php wp_head(); ?>
  <style>
    body{
      cursor: url('<?php the_field('curseur', 'options'); ?>'), default;
      background-color: <?php the_field('background_body', 'options');
      ?>;
    }
    a:hover {
      cursor: url('<?php the_field('curseur_hover', 'options'); ?>'), pointer;
    }
    .rendu ul.projet li.article .back:hover {
      cursor: url('<?php the_field('curseur_hover_negatif', 'options'); ?>'), pointer;
    }
    .active_home {
      background-color: <?php the_field( 'hover_home', 'option' );
      ?>;
    }
    .active_work {
      background-color: <?php the_field( 'hover_work', 'option' );
      ?>;
    }
    .active_infos, .pageinformationcolor {
      <?php if ( have_rows( 'degrade_ou_aplat', 'option' ) ): ?><?php while ( have_rows( 'degrade_ou_aplat', 'option' ) ) : the_row();
      ?><?php if ( get_row_layout() == 'aplatbloc' ) : ?> background-color:<?php the_sub_field( 'aplat' );
      ?>;
      <?php elseif ( get_row_layout() == 'degrade_de_couleurs' ) : ?>background: linear-gradient(<?php the_sub_field( 'degrade_un' );
        ?>, <?php the_sub_field( 'couleur_du_milieu' );
        ?>, <?php the_sub_field( 'degrade_deux' );
        ?>);
      <?php endif;
      ?><?php endwhile;
      ?><?php else: ?><?php // no layouts found ?><?php endif;
      ?>}
    <?php  $args = array('posts_per_page' => -1, 'orderby' => 'date','order' => 'DESC',);
    $lastposts = get_posts($args);
    foreach($lastposts as $post) : setup_postdata($post);
    ?>.post_color<?php the_ID();
    ?> {
      color: <?php  $value = get_field( "couleur_en-tete" );
      if( $value ) {
        echo $value;
      }
      else {
        echo 'empty';
      }
      ?>!important}
    <?php endforeach;
    ?><?php  wp_reset_postdata();
    ?>
  </style>
</head>
<body id="johl" onmousemove="fn(event)">
  <div class="blank">&nbsp;
  </div>
  <div data-barba="wrapper">
