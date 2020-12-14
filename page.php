<?php get_header(); ?>
<section class="liste" id="listing" style="display:none; z-index:4; background-color: <?php the_field('background_liste', 'options'); ?>">
  <?php get_template_part('template-parts/liste_article');?>
</section>
<main data-barba="container" data-barba-namespace="informations">
  <?php get_template_part('template-parts/menu_infos');?>
  <div class="top_color pageinformationcolor">&nbsp
  </div>
  <div class="rendu" id="pageinfos">
    <div class="bloc_gauche" style="background-color: <?php the_field( 'couleur_arriere_texte', 'option' ); ?>">
      <div class="article">
        <p class="bolding">
          <?php the_field( 'deuxieme_ligne', 'option' ); ?>
        </p>
        <div class="colonnes_listes">
          <div class="reseau_lieu">
            <div class="info_detail_01">
              <div class="contenu_detail">
                <h3>
                  <span class="signe">↪
                  </span>
                  <?php the_field( 'social__basdepage', 'option' ); ?>
                </h3>
                <ul class="colab">
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
                <h3>
                  <span class="signe">↪
                  </span>
                  <?php the_field( 'location_basdepage', 'option' ); ?>
                </h3>
                <ul>
                  <li>
                    <?php the_field( 'location', 'option' ); ?>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="info_block02">
            <div class="fer_a_gauche">
              <h3>
                <span class="signe">↪
                </span>
                <?php the_field( 'titre_liste_trois', 'option' ); ?>
              </h3>
              <ul class="services">
                <?php if( have_rows('listage_third', 'option') ):?>
                <?php while ( have_rows('listage_third', 'option') ) : the_row();?>
                <li>
                  <?php if (get_sub_field('lien_trois')){ ?>
                  <a href="<?php the_sub_field('lien_trois'); ?>" target="_blank">
                    <?php the_sub_field('appelation_trois'); ?>
                  </a>
                  <?php } else {	the_sub_field('appelation_trois'); }?>
                </li>
                <?php endwhile; else : endif; ?>
              </ul>
            </div>
          </div>
          <div class="info_block03">
            <div class="fer_a_gauche">
              <h3>
                <span class="signe">↪
                </span>
                <?php the_field( 'titre_liste_deux', 'option' ); ?>
              </h3>
              <ul class="clients">
                <?php if( have_rows('listage_second', 'option') ):?>
                <?php while ( have_rows('listage_second', 'option') ) : the_row();?>
                <li>
                  <?php if (get_sub_field('lien_deux')){ ?>
                  <a href="<?php the_sub_field('lien_deux'); ?>" target="_blank">
                    <?php the_sub_field('appelation_deux'); ?>
                  </a>
                  <?php } else {	the_sub_field('appelation_deux'); }?>
                </li>
                <?php endwhile; else : endif; ?>
              </ul>
            </div>
          </div>
          <div class="info_block04">
            <div class="fer_a_gauche">
              <h3>
                <span class="signe">↪
                </span>
                <?php the_field( 'titre_liste_un', 'option' ); ?>
              </h3>
              <ul class="colab">
                <?php if( have_rows('listage_first', 'option') ):?>
                <?php while ( have_rows('listage_first', 'option') ) : the_row();?>
                <li>
                  <?php if (get_sub_field('lien_un')){ ?>
                  <a href="<?php the_sub_field('lien_un'); ?>" target="_blank">
                    <?php the_sub_field('appelation_un'); ?>
                  </a>
                  <?php } else {	the_sub_field('appelation_un'); }?>
                </li>
                <?php endwhile; else : endif; ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="simon">
          Site developped by
          <a target="_blank" href="https://www.instagram.com/ateliersimonbouchard/">@ateliersimonbouchard
          </a>
        </div>
      </div>
    </div>
    <div class="bloc_droite" style="background-color: <?php the_field( 'couleur_arriere_cadre', 'option' ); ?>">
      <div class="marges_image">

				<picture class="back">
					<img id="one" <?php responsive_image(get_field( 'image_presentation', 'option' ),'Full size','2500px'); ?> />
          <img id="two" <?php responsive_image(get_field( 'image_presentation_copie', 'option' ),'Full size','2500px'); ?> />
				</picture>
      </div>
      <div class="bloc_bas" style="background-color: <?php the_field( 'couleur_arriere_cercle', 'option' ); ?>">
        <div class="cerle"  style="background-color: <?php the_field( 'couleur_du_cercle', 'option' ); ?>"  data-barba-prevent="all">
          <p class="text">
            <?php the_field( 'contact_ligne_un', 'option' ); ?>
            <span class="email_me">
              <a href="mailto:<?php the_field( 'mon_email', 'option' ); ?>" >
                <?php the_field( 'contact_email', 'option' ); ?>
              </a>
            </span>
          </p>
        </div>
      </div>
      <div class="mobile_only" style="background-color: <?php the_field( 'couleur_arriere_cercle', 'option' ); ?>">
        <?php get_template_part('template-parts/mobileonly');?>
      </div>
    </div>
    </main>
  </div>
<?php
get_footer();
