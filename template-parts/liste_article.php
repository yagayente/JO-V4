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

        <li id="lien_article" class="selectionactive" onmouseover="listeFunc(<?php the_ID(); ?>)" onmouseout="listeFuncOut(<?php the_ID(); ?>)" >
            <div class="icon_active">


            <div class="icone_current">
                ⚐
             </div>


            </div>








            <a class="link_to_post"  href="<?php the_permalink() ?>">  <?php the_title(); ?></a>
            <span class="arrow">&rarr;</span>

            <div id="<?php the_ID(); ?>_box" class="post_hover post_hover_img" style="display:none">
              <picture class="back_small" style="position:relative; z-index:9999;">
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
