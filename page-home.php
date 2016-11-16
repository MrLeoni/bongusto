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
 *	Parallax
 * 
 *-------------------------------------------------------------------------*/
 
// Banner
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

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="home">
				
				<section id="banner-01" class="banner home banner-text" style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(<?php echo $banner_img_01; ?>) no-repeat center">
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
				<section id="banner-02" class="banner home banner-text" style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(<?php echo $banner_img_02; ?>) no-repeat center">
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
