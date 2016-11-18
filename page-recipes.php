<?php
/**
 * Template Name: Receitas
 *
 * @package Bongusto
 */
 
	// Using the page thumbnail as banner
	$thumb_id = get_post_thumbnail_id();
	$thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);

	/**--------------------------------------------------------------------------
	 * 
	 * Recipes
	 * 
	 * Created new query to display "receitas" post type
	 * 
	 *-------------------------------------------------------------------------*/
	 
	
	// Query args
	$recipes_args = array(
		"post_type"	=> "receitas"
	);
	$recipes_query = new WP_Query( $recipes_args );

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="recipes">
				
				<section class="banner" style="background: url(<?php echo $thumb_url[0]; ?>) no-repeat center">
					<!-- empty -->
				</section>
				
				<section id="recipes-content" class="bon-section-wrapper">
					<div class="container">
						<div class="row">
							
							<div class="col-md-12">
								<?php
								// Content from the editor
								while(have_posts()): the_post();
									the_content();
								endwhile;
								?>
							</div>
							
							<div class="col-md-12">
								<div class="recipes-wrapper">
									<div class="row">
										<?php
										// Content from "receitas" post type
										while($recipes_query->have_posts()): $recipes_query->the_post(); ?>
											
											<div class="col-xs-offset-1 col-xs-10 col-sm-offset-0 col-sm-6 col-md-offset-0 col-md-3">
												<div class="recipe-box">
													<div class="recipe-box-img">
														<?php the_post_thumbnail("medium_large"); ?>
													</div>
													<div class="recipe-box-content">
														<?php
														the_title("<h2>", "</h2>");
														echo "<a class='bon-btn-sm btn-color' href='".get_the_permalink()."' title='Saiba Mais'>Saiba Mais</a>";
														?>
													</div>
												</div>
											</div>
											
										<?php
										endwhile;
										wp_reset_postdata();
										?>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</section>
				
			</article>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();