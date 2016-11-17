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
$banner_img_01 = get_field("banner-img-01");
$banner_img_02 = get_field("banner-img-02");

// Title and Text
$banner_title_01 = get_field("banner-title-01");
$banner_title_02 = get_field("banner-title-02");
$banner_text_01 = get_field("banner-text-01");
$banner_text_02 = get_field("banner-text-02");

// Link
$banner_link_check_01 = get_field("banner-link-check-01");
$banner_link_check_02 = get_field("banner-link-check-02");
$banner_link_target_01 = get_field("banner-link-target-01");
$banner_link_target_02 = get_field("banner-link-target-02");
$banner_link_text_01 = get_field("banner-link-text-01");
$banner_link_text_02 = get_field("banner-link-text-02");
$banner_link_url_01 = get_field("banner-link-url-01");
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
$about_img = get_field("about-img");

get_header(); ?>



	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="home">
				
				<section id="banner-01" class="banner banner-text" style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(<?php echo $banner_img_01; ?>) no-repeat center">
					<div class="container">
						<div class="row">
							<div class="col-md-5">
								<div class="banner-content">
									<h2 class="banner-title-white"><?php echo $banner_title_01; ?></h2>
									<p><?php echo $banner_text_01; ?></p>
									<?php	if($banner_link_check_01 == "true") { ?>
										<a class="bon-btn btn-white" href="<?php echo $banner_link_url_01; ?>" title="<?php echo $banner_link_text_01; ?>" target="<?php echo $banner_link_target_01 ?>"><?php echo $banner_link_text_01; ?></a>
									<?php }	?>
								</div>
							</div>
						</div>
					</div>	
				</section>
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
															the_title("<h4>", "</h4>");
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
				
				<section id="about-home" class="bon-section-wrapper">
					<div class="container">
						<div class="row">
							<div class="col-md-5">
								<div class="about-content-box">
									<h2><?php echo $about_title; ?></h2>
									<p><?php echo $about_text; ?></p>
									<?php if($about_link_check == "true") { ?>
										<a class="bon-btn-sm btn-color" href="<?php echo $about_link_url; ?>" title="<?php echo $about_link_title; ?>" target="<?php echo $about_link_target; ?>"><?php echo $about_link_title; ?></a>
									<?php } ?>
								</div>
							</div>
							<div class="col-md-offset-1 col-md-6">
								<div class="about-img-box">
									<img class="img-block" src="<?php echo $about_img["url"]; ?>" alt="<?php echo $about_img["alt"]; ?>">
								</div>
							</div>
						</div>
					</div>
				</section>
				
				<section id="recipes" class="bon-section-wrapper">
					<div class="recipes-wrapper clearfix">
						
						
						
					</div>
				</section>
				
				<?php
				while ( have_posts() ) : the_post();
					the_content();
				endwhile; // End of the loop.
				?>
			
			</article>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
