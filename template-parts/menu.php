<nav class="menu" id="Menu_background">
  <div class="left">
    <h1><a id="showButton" onmouseover="changeColorIn_home()"  onmouseout="changeColorOut_home()" class="homepage" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Joséphine Ohl</a></h1>
  </div>
  <div class="right">
        <ul id="menu" class="Menu_background">
        <li class="current-menu-item" id="work_link"><a id="showButton" onmouseover="changeColorIn_work()"  onmouseout="changeColorIn_work()" class="nav-link work" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Work</a></h1></li>
        <li><a id="showButton" onmouseover="changeColorIn_infos()"  onmouseout="changeColorOut_infos()" class="nav-link work" href="<?php echo esc_url( get_permalink( get_page_by_title( 'infos' ) ) ); ?>" rel="home">Infos</a></h1></li>
        </ul>
    </div>
  </nav>
