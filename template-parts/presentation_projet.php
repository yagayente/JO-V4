<div class="first"><?php the_field( 'titre' ); ?></div>
<div class="third"><?php the_field( 'description' ); ?></div>
<div class="second">

  <?php if( have_rows('collaborateurs') ): ?>
    <p class="collaborators">collaborators</p>
    <ul>
      <?php while( have_rows('collaborateurs') ): the_row();
      $content = get_sub_field('prenom_et_nom');
      $link = get_sub_field('lien');
      ?>
      <?php
      if ( $link ) {
        echo '<li><a target="_blank" href="' . $link . '">' . $content . '</a></li>';
      } else if ( $content ){
        echo '<li>' . $content . '<li>';
      } ?>
    <?php endwhile; ?>
  </ul>
  <br>
<?php endif; ?>
<p class="date"><?php the_field( 'annee' ); ?></p>

<?php $categories = get_field( 'categories' ); ?>
<?php if ( $categories ) : ?>
  <?php $get_terms_args = array(
    'taxonomy' => 'category',
    'hide_empty' => 0,
    'include' => $categories,
  ); ?>
  <?php $terms = get_terms( $get_terms_args ); ?>
  <?php if ( $terms ) : ?>
    <ul class="liste_categ">
      <?php foreach ( $terms as $term ) : ?>
        <li><?php echo esc_html( $term->name ); ?></li>
      <?php endforeach; ?>
    <?php endif; ?>
  </ul>
<?php endif; ?>
</div><!-- second-->
