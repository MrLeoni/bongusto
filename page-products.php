<?php
/**
 * Template Name: Produtos
 *
 * @package Bongusto
 */
 
	// Using the page thumbnail as banner
	$thumb_id = get_post_thumbnail_id();
	$thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);

	/**--------------------------------------------------------------------------
	 * 
	 * Produtos
	 * 
	 * Created new query to display posts
	 * 
	 *-------------------------------------------------------------------------*/
	 
	
	// Query args
	$products_args = array(
		"post_type"	=> "post"
	);
	$products_query = new WP_Query( $products_args );

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="products">
				
				<section class="banner" style="background: url(<?php echo $thumb_url[0]; ?>) no-repeat center">
					<!-- empty -->
				</section>
				
				<section id="products-content" class="bon-section-wrapper">
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
								<div class="products-wrapper">
									<div class="row">
										<?php
										// Content from "receitas" post type
										while($products_query->have_posts()): $products_query->the_post(); ?>
											<div class="col-xs-offset-1 col-xs-10 col-sm-offset-0 col-sm-6 col-md-offset-0 col-md-3">
												<div class="product-box">
													<a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>" class="product-link">
														<div class="product-box-img">
															<?php the_post_thumbnail("medium"); ?>
														</div>
														<div class="product-box-content">
															<?php
															the_title("<h2>", "</h2>");
															echo "<p>".get_field("post-home-info")."</p>";
															echo "<a class='bon-btn-sm btn-color' href='".get_the_permalink()."' title='Saiba Mais'>Saiba Mais</a>";
															?>
														</div>
													</a>
												</div>
											</div>
										<?php
										endwhile;
										//wp_reset_postdata();
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