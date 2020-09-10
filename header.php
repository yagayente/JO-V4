<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php the_field('nom_du_site', 'options'); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php the_field('description_du_site', 'options'); ?>"/>
<meta name="keywords" content="<?php the_field('mots_clefs', 'options'); ?>">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link href="<?php the_field('favicon', 'options'); ?>" rel="shortcut icon" type="image/x-icon" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>


</head>
<body id="johl" onmousemove="fn(event)">


<nav class="menu" id="Menu_background">
  <div class="left">
  <h1><a id="showButton" onmouseover="changeColorIn()"  onmouseout="changeColorOut()" class="homepage" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
  </div>

  <div class="right">
    <div class="linking">
      <h2><a id="ButtonRight" href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-link" onmouseover="changeColorIn_right()"  onmouseout="changeColorOut_right()">Work</a></H2>
        <h2><a id="ButtonRight" href="<?php echo get_permalink(2); ?>" class="nav-link" onmouseover="changeColorIn_right()"  onmouseout="changeColorOut_right()">Infos</a></H2>
    </div>


  </div>
</nav>
<div class="whiteit">&nbsp</div>
