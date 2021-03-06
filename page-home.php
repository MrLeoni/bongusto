<?php
/**
 * Template Name: Home
 *
 * @package Bongusto
 */
 
/**--------------------------------------------------------------------------
 * 
 * ACF Fields
 * 
 * Using ACF Fields in these areas of the page:
 *	Banner
 *	Products
 *	Parallax
 * 
 *-------------------------------------------------------------------------*/
 
	/* --- Banner --- */
	// Img
	$banner_img_02 = get_field("banner-img-02");
	
	// Title and Text
	$banner_title_02 = get_field("banner-title-02");
	$banner_text_02 = get_field("banner-text-02");
	
	// Link
	$banner_link_check_02 = get_field("banner-link-check-02");
	$banner_link_target_02 = get_field("banner-link-target-02");
	$banner_link_text_02 = get_field("banner-link-text-02");
	$banner_link_url_02 = get_field("banner-link-url-02");
	
	
	/* --- Products --- */
	// Title
	$section_title = get_Field("products-title");
	
	//Category
	$product_cat = get_field("products-cat");
	$product_cat_ID = get_cat_ID("$product_cat");
	
	// Creating args for display products
	// Only display posts in a specific category
	$products_args = array(
		"cat"	=> "$product_cat_ID",
	);
	$products_query = new WP_Query( $products_args );
	
	
	/* --- Parallax --- */
	// Text
	$parallax_text = get_field("parallax-text");
	
	//Image
	$parallax_img = get_field("parallax-img");
	
	
	/* --- Conheça --- */
	// Text
	$about_title = get_field("about-title");
	$about_text = get_field("about-text");
	
	// Link
	$about_link_check = get_field("about-link-check");
	$about_link_target = get_field("about-link-target");
	$about_link_title = get_field("about-link-title");
	$about_link_url = get_field("about-link-url");
	
	// Image
	// Query args
	$about_args = array(
		"post_type"	=> "banners",
		"orderby"	=> 'modified',
		"posts_per_page"	=> 99,
		"tax_query"	=> array(array(
			"taxonomy"	=> "banner-categorias",
			"field"	=> "slug",
			"terms"	=> "home-conheca",
		)),
	);
	$about_query = new WP_Query( $about_args );
	
	
/**--------------------------------------------------------------------------
 * 
 * Recipes
 * 
 * Created new query to display "receitas" post type
 * 
 *-------------------------------------------------------------------------*/
	 
	
	// Query args
	$recipes_args = array(
		"post_type"	=> "receitas",
		"orderby"	=> 'modified',
		"tax_query"	=> array(array(
			"taxonomy"	=> "receitas-categorias",
			"field"	=> "slug",
			"terms"	=> "exibir-na-home",
		)),
	);
	$recipes_query = new WP_Query( $recipes_args );

get_header(); ?>



	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="home">
				
				<?php get_template_part( 'template-parts/content', 'banner' ); ?>
				
				<section id="banner-02" class="banner banner-text" style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(<?php echo $banner_img_02; ?>) no-repeat center">
					<div class="container">
						<div class="row">
							<div class="col-md-offset-7 col-md-5">
								<div class="banner-content">
									<h2 class="banner-title-color"><?php echo $banner_title_02; ?></h2>
									<p><?php echo $banner_text_02; ?></p>
									<?php	if($banner_link_check_02 == "true") { ?>
										<a class="bon-btn btn-color" href="<?php echo $banner_link_url_02; ?>" title="<?php echo $banner_link_text_02; ?>" target="<?php echo $banner_link_target_02 ?>"><?php echo $banner_link_text_02; ?></a>
									<?php }	?>
								</div>
							</div>
						</div>
					</div>	
				</section>
				
				<section id="products-display" class="bon-section-wrapper">
					<h2 class="bon-section-header center"><?php echo $section_title; ?></h2>
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="products-wrapper">
									<ul class="products-carrossel">
										<?php
											while($products_query->have_posts()): $products_query->the_post(); ?>
												<li>
													<div class="products-thumbnail-box">
														<?php the_post_thumbnail("medium"); ?>
													</div>
													<div class="products-content-box">
														<?php
															echo "<h4>".get_field("post-home-title")."</h4>";
															echo "<p>".get_field("post-home-info")."</p>";
														?>
														<a class="bon-btn-sm btn-color fill" href="<?php the_permalink(); ?>" title="<?php get_the_title(); ?>">Saiba Mais</a>
													</div>
												</li>
											<?php endwhile;
											wp_reset_postdata();
										?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</section>
				
				<section id="parallax" class="parallax banner banner-text" style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(<?php echo $parallax_img; ?>) no-repeat center">
					<h2 class="bon-section-header center white"><?php echo $parallax_text; ?></h2>
				</section>
				
				<section id="about-home" class="bon-section-wrapper clearfix">
					<div class="home-about-content-box">
						<h2><?php echo $about_title; ?></h2>
						<p><?php echo $about_text; ?></p>
						<?php if($about_link_check == "true") { ?>
							<a class="bon-btn-sm btn-color" href="<?php echo $about_link_url; ?>" title="<?php echo $about_link_title; ?>" target="<?php echo $about_link_target; ?>"><?php echo $about_link_title; ?></a>
						<?php } ?>
					</div>
					<div class="home-about-img-box">
						<ul class="about-img-slider">
						
						<?php while($about_query->have_posts()): $about_query->the_post(); ?>
							
						<li>
							<?php the_post_thumbnail('full'); ?>
						</li>
						
						<?php endwhile; ?>
						</ul>
					</div>
				</section>
				
				<?php /*
				<section id="recipes" class="bon-section-wrapper">
					<div class="home-recipes-wrapper">
						
						<?php
						// $count will track the position of the post in the query
						// and determine the background-color and side of the content
						$count = 1;
						// Start the Loop
						while ( $recipes_query->have_posts() ) : $recipes_query->the_post(); ?>
						
						<div class="recipes-showcase background-color-0<?php echo $count; ?>">
						
						<?php if($count < 3) { // Using the $count to decide how to organize the content of recipe ?>
							
							<div class="recipes-showcase-content">
								<?php
								the_title("<h2 class='bon-section-header center white border'>", "</h2>");
								the_excerpt();
								echo "<a class='bon-btn btn-white fill' href='".get_the_permalink()."' title='".get_the_title()."'>Saiba Mais</a>";
								?>
							</div>
							<div class="recipes-showcase-thumbnail">
								<?php the_post_thumbnail("large"); ?>
							</div>
								
						<?php } else { ?>
								
							<div class="recipes-showcase-thumbnail">
								<?php the_post_thumbnail("large"); ?>
							</div>
							<div class="recipes-showcase-content">
								<?php
								the_title("<h2 class='bon-section-header center white border'>", "</h2>");
								the_excerpt();
								echo "<a class='bon-btn btn-white fill' href='".get_the_permalink()."' title='".get_the_title()."'>Saiba Mais</a>";
								?>
							</div>
								
						<?php } // End if ?>
						
						</div><!-- /.recipes-showcase -->
						
						<?php
						$count++; // Iterate $count
						endwhile; // End of the loop.
						wp_reset_postdata(); // Reset query data
						?>		
						
					</div>
				</section>
				*/ ?>
				
			</article>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
