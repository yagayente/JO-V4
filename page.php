<?php get_header(); ?>
<div data-barba="wrapper">
<main data-barba="container" data-barba-namespace="informations">

<?php get_template_part('template-parts/menu');?>
<div class="couleur_du_sommet pageinformationcolor">&nbsp</div>


<div class="rendu" id="pageinfos">

	<div class="ligne_info_un">
						<div class="texte_gauche">
							<?php the_field( 'deuxieme_ligne', 'option' ); ?>
						</div>
						<div class="marges_image">
							<?php $image_presentation = get_field( 'image_presentation', 'option' ); ?>
							<?php if ( $image_presentation ) : ?>
							<?php $size = 'large'; // (thumbnail, medium, large, full or custom size) ?>

							<div class="image_droite" style="background-image: url(<?php echo esc_url( $image_presentation['url'] ); ?>)">
							</div>
						</div>
						<?php endif; ?>
	</div>
	<div class="ligne_info_deux" style="background-color: <?php the_field( 'couleur_de_fond', 'option' ); ?>">
				<div class="info_block01">
					<?php the_field( 'premiere_ligne', 'option' ); ?>
					<?php get_template_part('template-parts/responsive_adresse_social');?>
				</div>


				<div class="colonnes_listes">
						<div class="info_block02">
							<div class="fer_a_gauche">
									<h3><span class="signe">&#8594;</span><?php the_field( 'titre_liste_un', 'option' ); ?></h3>
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

						<div class="info_block03">
							<div class="fer_a_gauche">
							<h3><span class="signe">&#8594;</span><?php the_field( 'titre_liste_deux', 'option' ); ?></h3>
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
									<h3><span class="signe">&#8594;
									</span><?php the_field( 'titre_liste_trois', 'option' ); ?></h3>
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
			</div>


			<div class="detail_mobile">
					<h3><?php the_field( 'location_title', 'option' ); ?></h3>
					<p class="lieu"><?php the_field( 'location_basdepage', 'option' ); ?></p>

					<h3><?php the_field( 'social__basdepage', 'option' ); ?></h3>
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
				</div>

				<div class="about_simon">
						<p class="about_this_website">website <a href="http://simonbouchard.fr/" target="_blank">@ateliersimonbouchard</a></p>
				</div>


	</div>
	<div class="ligne_info_trois">

		<div class="info_detail_01">
			<div class="contenu_detail">
			<h3><?php the_field( 'social__basdepage', 'option' ); ?></h3>
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
			</div>
		</div>
		<div class="info_detail_02" >
				<div class="contenu_detail">
				<h3><?php the_field( 'location_basdepage', 'option' ); ?></h3>
				<p class="adresse"><?php the_field( 'location', 'option' ); ?></p>
				</div>
		</div>
	</div>



</div>
</main> <!-- fin de data-barba="wrapper" -->
</div><!-- fin de data-barba="container" -->

<?php
get_footer();
