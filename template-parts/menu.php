<nav class="menu" id="Menu_background">
  <div class="left">
    <h1><a id="showButton" onmouseover="changeColorIn_work()"  onmouseout="changeColorOut_work()" class="homepage" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
  </div>
  <div class="right">
    <?php wp_nav_menu( array(
      'location' => 'Menuprincipal',
      'container' => 'ul',
      'menu_class'=> 'Menu_principal',
      'menu_id' => 'menu',
      'depth' => 1 ) );
      ?>
    </div>
  </nav>
