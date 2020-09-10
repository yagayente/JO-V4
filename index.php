<?php get_header(); ?>


<div data-barba="wrapper">
  <main data-barba="container">
	<div class="rendu">
									<ul class="projet">



											<?php
											if ( have_posts() ) :
												while ( have_posts() ) : the_post();
													?>



													<li class="article">
													<a class="linked" href="<?php the_permalink(); ?>">

														<picture class="back" onmouseover="myFunction(<?php the_ID(); ?>)" onmouseout="normalImg(<?php the_ID(); ?>)" >
															<img <?php responsive_image(get_field( 'image_article' ),'Full size','2500px'); ?> />
														</picture>
													</a>

													<div id="<?php the_ID(); ?>_box" class="post_hover post_hover_home" style="opacity:0;">

														<p id="coolos" >
															<?php the_field( 'titre' ); ?><br>
														<?php the_field( 'description_breve' )?>
														</p>
												
													</div>

													</li>

												<?php endwhile;



											else :

												get_template_part( 'template-parts/content', 'none' );

											endif; ?>
										</ul>

	</div><!-- fin de rendu -->
</main> <!-- fin de data-barba="wrapper" -->
</div>

<?php
get_template_part( 'pagination' );
get_footer();
