<?php get_header(); ?>

	<section class="liste" id="listing" style="display:none; z-index:4;  background-color: <?php the_field('background_liste', 'options'); ?>">
		<?php get_template_part('template-parts/liste_article');?>
	</section>

	<main data-barba="container" data-barba-namespace="homepage">
		<?php get_template_part('template-parts/menu');?>
		<div class="top_color homepagecolor" style="background-color:<?php the_field('hover_work', 'options'); ?>;">&nbsp</div>
		<div class="rendu">
			<ul class="projet">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
					?>
					<li class="article lazyload" >
						<a class="linked" href="<?php the_permalink(); ?>">
							<picture class="back" onmouseover="myFunction(<?php the_ID(); ?>)" onmouseout="normalImg(<?php the_ID(); ?>)" ><img <?php responsive_image(get_field( 'image_article' ),'Full size','2500px'); ?> /></picture>
						</a>

						<div id="<?php the_ID(); ?>_liste" class="post_hover post_hover_home" style="opacity:0;">
							<p class="titre_hover"><?php the_field( 'titre' ); ?></p>
							<p class="sous_titre_hover">
								<?php if( get_field('description_breve') ): ?>
								↪ <?php the_field('description_breve'); ?>
								<?php endif; ?>
							</p>
						</div>
					</li>
				<?php endwhile;
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif; ?>
			</ul>
		</div>
	</main>
</div>

<?php
get_template_part( 'pagination' );
get_footer();
