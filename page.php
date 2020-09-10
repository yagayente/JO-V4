<?php get_header(); ?>
<div data-barba="wrapper">
<main data-barba="container" data-barba-namespace="informations">
<div class="rendu" id="pageinfos">

<div class="information_gauche">
	<div class="col_gauche_one">
			<h3>Location</h3>
			<p class="adresse"><?php the_field( 'location', 'option' ); ?></p>
	</div>
	<div class="col_gauche_two">
		<h3>Social</h3>
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


				<?php $image_presentation = get_field( 'image_presentation', 'option' ); ?>
			<?php if ( $image_presentation ) : ?>
			<?php $size = 'medium'; // (thumbnail, medium, large, full or custom size) ?>
				<img class="profilpic" src="<?php echo esc_url( $image_presentation['url'] ); ?>" alt="<?php echo esc_attr( $image_presentation['alt'] ); ?>" />
			<?php endif; ?>




	</div>
</div>

	<div class="information_droite">
		<div class="info_generale">
			<div class="header_infos">
				<?php the_field( 'premiere_ligne', 'option' ); ?>
			</div>
			<div class="second_infos">
					<?php the_field( 'deuxieme_ligne', 'option' ); ?>
			</div>
	</div>

		<span class="signe">&#8594;</span><h3><?php the_field( 'titre_liste_un', 'option' ); ?></h3>
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
<span class="signe">&#8594;</span><h3><?php the_field( 'titre_liste_deux', 'option' ); ?></h3>
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

<span class="signe">&#8594;
</span><h3><?php the_field( 'titre_liste_trois', 'option' ); ?></h3>
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
</main> <!-- fin de data-barba="wrapper" -->
</div><!-- fin de data-barba="container" -->

<?php
get_footer();
