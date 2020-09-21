<div class="social_links">
      <div class="info_detail_01">
        <div class="contenu_detail">
        <h3><?php the_field( 'social__basdepage', 'option' ); ?></h3>
          <ul class="social">
            <?php if( have_rows('reseaux_sociaux', 'option') ):?>
              <?php while ( have_rows('reseaux_sociaux', 'option') ) : the_row();?>
                <li>
                  <?php if (get_sub_field('lien_vers_le_reseau_social')){ ?>
                  <a href="<?php the_sub_field('lien_vers_le_reseau_social'); ?>" target="_blank">
                    <?php the_sub_field('nom_du_reseau_social'); ?>
                  </a>
                  <?php } else {	the_sub_field('nom_du_reseau_social'); }?>
                </li>
              <?php endwhile; else : endif; ?>
            </ul>
        </div>
      </div>
      <div class="info_detail_02" >
          <div class="contenu_detail">
          <h3><?php the_field( 'location_basdepage', 'option' ); ?></h3>
          <p><?php the_field( 'location', 'option' ); ?></p>
          </div>
      </div>
</div>
