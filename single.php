<?php get_header(); ?>

<section class="liste" id="listing" style="z-index:4;">
	<?php get_template_part('template-parts/liste_article');?>
</section>

<?php
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
	?>
	<main data-barba="container" data-barba-namespace="single">
	<?php get_template_part('template-parts/menu');?>
		<div	class="top_color" style="<?php if ( have_rows( 'degrade_ou_aplat_copie2' ) ): ?>
		<?php while ( have_rows( 'degrade_ou_aplat_copie2' ) ) : the_row(); ?>
		<?php if ( get_row_layout() == 'aplatbloc' ) : ?>background-color: <?php the_sub_field( 'aplat' ); ?>;
		<?php elseif ( get_row_layout() == 'degrade_de_couleurs' ) : ?>
		background: linear-gradient(<?php the_sub_field( 'degrade_un' ); ?>,<?php the_sub_field( 'degrade_deux' ); ?>);
			<?php endif; ?><?php endwhile; ?><?php else: ?>background-color: white;<?php // no layouts found ?><?php endif; ?>">&nbsp</div>
			<div class="rendu" id="rendu_single" style="position: relative; z-index:-3;">
			<div class="en_tete_article">
				<?php get_template_part('template-parts/presentation_projet');?>
			</div><!-- en-tête-->
			<div class="contenu" id="scroll" style="z-index:1;">
			<?php $en_tete = get_field( 'en-tete' ); ?>
				<?php if ( $en_tete ) : ?>
					<div class="entier" id="imageliste">
						<picture class="back">
							<img <?php responsive_image(get_field( 'en-tete' ),'Full size','2500px'); ?> />
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
								<div class="entier" id="imageliste">
									<picture class="back">
										<img <?php responsive_image(get_sub_field( 'full' ),'Full size','2500px'); ?> />
									</picture>
								</div>
							<?php endif; ?>
						<?php elseif ( get_row_layout() == '50' ) : ?>
							<?php $half = get_sub_field( 'half' ); ?>
							<?php if ( $half ) : ?>
								<div class="moitie" id="imageliste">
									<picture class="back">
										<img <?php responsive_image(get_sub_field( 'half' ),'Full size','2500px'); ?> />
									</picture>
								</div>
							<?php endif; ?>

							<?php $other_half = get_sub_field( 'other_half' ); ?>
							<?php $size = 'full'; ?>
							<?php if ( $other_half ) : ?>
								<div class="moitiedeux" id="imageliste">
									<picture class="back">
										<img <?php responsive_image(get_sub_field( 'other_half' ),'Full size','2500px'); ?> />
									</picture>
								</div>
							<?php endif; ?>

						<?php endif; ?>
					<?php endwhile; ?>
				<?php else: ?>
					<?php // no layouts found ?>
				<?php endif; ?>
		</div>
	<?php endwhile; ?>
	<?php else : ?>
		<h2>Aucun Article</h2>
	<?php endif; ?>
	<?php get_template_part('template-parts/liste_article_mobile');?>
</div>
</main>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
