<ul class="project_list" >


    <?php
        $args = array(
          	'posts_per_page'   => -1,
          	'orderby'          => 'date',
          	'order'            => 'DESC',
          );

        $lastposts = get_posts($args);
        foreach($lastposts as $post) :
        setup_postdata($post); ?>

        <li <?php if ( $post->ID == $wp_query->post->ID ) { echo ' class="current"'; } else {} ?>>

            <a id="<?php the_ID(); ?>" class="back" onmouseover="listeFunc(<?php the_ID(); ?>)" onmouseout="listeFuncOut(<?php the_ID(); ?>)"  href="<?php the_permalink() ?>">  <?php the_title(); ?></a>
            <span class="arrow">></span>

            <div id="<?php the_ID(); ?>_box" class="post_hover post_hover_img" style="opacity:0; display:none;">
              <picture class="back_small">
                <?php $image_article = get_field( 'image_article' ); ?>
                <?php $size = 'Medium'; ?>
                <?php if ( $image_article ) : ?>
                	<?php echo wp_get_attachment_image( $image_article, $size ); ?>
                <?php endif; ?>
              </picture>
            </div>

        </li>

    <?php endforeach; ?>
  <?php  wp_reset_postdata();?>
</ul>
