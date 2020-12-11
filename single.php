<?php get_header(); ?>
<section class="liste" id="listing" style="z-index:4; background-color: <?php the_field('background_liste', 'options'); ?>">
  <?php get_template_part('template-parts/liste_article');?>
</section>
<?php
if ( have_posts() ) :
while ( have_posts() ) : the_post();
?>
<main data-barba="container" data-barba-namespace="single" id="it_is_single">
  <style>
    section ul.project_list li.current a.link_to_post, section ul.project_list li.current .icon_active .icone_current{
      color: <?php the_field( 'couleur_en-tete' );
      ?>}
    .liste_mobile {
      background-color: <?php the_field('background_body', 'options');
      ?>}
    .contenu .embed-container {
      position: relative;
      padding-bottom: 56.25%;
      height: 0;
      overflow: hidden;
      max-width: 100%;
    }
    .embed-container iframe, .embed-container object, .embed-container embed {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }
  </style>
  <?php get_template_part('template-parts/menu');?>
  <div	class="top_color" style="background-color:
                                 <?php $coulen_tete = get_field( 'couleur_en-tete' ); ?>
                                 <?php $coulen_tete_back = get_field('background_body', 'options'); ?>
                                 <?php if ( $coulen_tete ) : ?>
                                 <?php echo $coulen_tete ?>">
    <?php else :?>
    <?php echo $coulen_tete_back ?>">
    <?php endif; ?>
    &nbsp
  </div>
  <div class="rendu" id="rendu_single" style="position: relative; z-index:-3;">
    <div class="en_tete_article">
      <?php get_template_part('template-parts/presentation_projet');?>
    </div>
    <!-- en-tête-->
    <div class="contenu" id="scroll" style="z-index:1;">
      <span class="titre_mobile">
        <?php the_field( 'titre' ); ?>
      </span>
      <?php $en_tete = get_field( 'en-tete' ); ?>
      <?php if ( $en_tete ) : ?>
      <div class="entier" id="imageliste">
        <picture class="back">
          <img
               <?php responsive_image(get_field( 'en-tete' ),'Full size','2500px'); ?> />
        </picture>
      </div>
      <?php endif; ?>
      <div class="en_tete_article_mobile" id="imagelisteone">
        <?php get_template_part('template-parts/presentation_projet_mobile');?>
      </div>
      <?php if ( have_rows( 'images' ) ): ?>
      <?php while ( have_rows( 'images' ) ) : the_row(); ?>
      <?php if ( get_row_layout() == '100100' ) : ?>
      <?php $full = get_sub_field( 'full' ); ?>
      <?php if ( $full ) : ?>
      <div class="entier image_et_espacement" id="imageliste">
        <picture class="back">
          <img
               <?php responsive_image(get_sub_field( 'full' ),'Full size','2500px'); ?> />
        </picture>
      </div>
      <?php endif; ?>
      <?php elseif ( get_row_layout() == '50' ) : ?>
      <?php $half = get_sub_field( 'half' ); ?>
      <?php if ( $half ) : ?>
      <div class="moitie image_et_espacement" id="imageliste">
        <picture class="back">
          <img
               <?php responsive_image(get_sub_field( 'half' ),'Full size','2500px'); ?> />
        </picture>
      </div>
      <?php endif; ?>
      <?php $other_half = get_sub_field( 'other_half' ); ?>
      <?php $size = 'full'; ?>
      <?php if ( $other_half ) : ?>
      <div class="moitiedeux image_et_espacement" id="imageliste">
        <picture class="back">
          <img
               <?php responsive_image(get_sub_field( 'other_half' ),'Full size','2500px'); ?> />
        </picture>
      </div>
      <?php endif; ?>
      <?php elseif ( get_row_layout() == 'video' ) : ?>
      <?php $size = get_sub_field( 'video' ); ?>
      <?php $color = get_field( 'background_body', 'options' ); ?>
      <div class="text_vid">
        <p style="font-size: 0.1%; color:<?php echo $color ?>">
          <?php	the_sub_field( 'video' ); ?>
        </P>
      <div class="embed-container lazyload">
        <iframe class="lazyload" src="https://player.vimeo.com/video/<?php echo $size ?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen>
        </iframe>
      </div>
    </div>
    <?php endif; ?>
    <?php endwhile; ?>
    <?php else: ?>
    <?php // no layouts found ?>
    <?php endif; ?>
  </div>
  <?php endwhile; ?>
  <?php else : ?>
  <h2>Aucun Article
  </h2>
  <?php endif; ?>
  <?php get_template_part('template-parts/liste_article_mobile');?>
  </div>
</main>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
