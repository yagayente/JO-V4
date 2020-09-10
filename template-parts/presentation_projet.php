<div class="first"><?php the_field( 'titre' ); ?></div>
<div class="third"><?php the_field( 'description' ); ?></div>
<div class="second">
<?php if( have_rows('collaborateurs') ): ?>
  <?php while( have_rows('collaborateurs') ): the_row();
    $content = get_sub_field('prenom_et_nom');
    $link = get_sub_field('lien');
    ?>
        <?php if ( $content ) {
        echo 			'	<p>collaborateurs</p>
                    <ul class="collaborateurs">
                  ';
        }
        ?>
            <?php
            if ( $link ) {
                  echo '<li><a href="' . $link . '">' . $content . '</a></li>';
            } else if ( $content ){
                  echo '<li>' . $content . '<li>';
            } ?>

        <?php echo '</ul>'; ?>

  <?php endwhile; ?>
  </ul>
  <br>
  <?php the_field( 'annee' ); ?>
  <br>
<?php endif; ?>

<?php $categories = get_field( 'categories' ); ?>
<?php if ( $categories ) : ?>
  <?php $get_terms_args = array(
    'taxonomy' => 'category',
    'hide_empty' => 0,
    'include' => $categories,
  ); ?>
  <?php $terms = get_terms( $get_terms_args ); ?>
  <?php if ( $terms ) : ?>
    <?php foreach ( $terms as $term ) : ?>
      <?php echo esc_html( $term->name ); ?>
    <?php endforeach; ?>
  <?php endif; ?>
<?php endif; ?>
</div><!-- second-->
