<div class="liste_mobile_access" onclick="loadmenu()">
	<div class="block_link" style="background-color: <?php the_field( 'couleur_arriere_texte', 'option' ); ?>">
		<div class="block_link_centering">
			<div class="arrow"><p id="animationfleche">&#8593;</p></div>
			<div class="nameit" id="changeit">Projects</div>
			<div class="arrowdeux"><p id="animationflechedeux">&#8593;</p></div>
		</div>
	</div>
</div>

<div class="liste_mobile close" id="liste_slide_mobile" onclick="hidemenu()" style="background-color: <?php the_field( 'couleur_arriere_texte', 'option' ); ?>">
	<div class="project_mobile_liste" >
		<?php
		$args = array(
			'posts_per_page'   => -1,
			'orderby'          => 'date',
			'order'            => 'DESC',
		);
		$lastposts = get_posts($args);
		foreach($lastposts as $post) :
			setup_postdata($post); ?>
			<div id="block_list" <?php if ( $post->ID == $wp_query->post->ID ) { echo ' class="currentmobile"'; } else {} ?>>
				<a id="<?php the_ID(); ?>_colorMobile" class="menulienmobile link_to_post_mobile" href="<?php the_permalink() ?>">

					<div class="top_block_mb">
						<picture class="back_small_mobile">
							<?php $image_article = get_field( 'image_article' ); ?>


							<?php $size = 'thumbnail'; ?>
							<?php if ( $image_article ) : ?>
								<?php echo wp_get_attachment_image( $image_article, $size ); ?>
							<?php endif; ?>
						</picture>
					</div>
					<div class="bottom_block_mb">
							<?php $divName = get_the_ID(); ?>
						<?php if ( $post->ID == $wp_query->post->ID ) { echo '<p class="post_color'.$divName.'">'; } else {echo '<p>';} ?>

<?php the_title(); ?></p>
					</div>
				</a>
			</div>
		<?php endforeach; ?>
		<?php  wp_reset_postdata();?>
	</div>
</div>
