<?php
/**
 * Template Name: Quem Somos
 *
 * @package Bongusto
 */
 
// Using the page thumbnail as banner
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);

/**--------------------------------------------------------------------------
 * 
 * ACF Fields
 * 
 * Using ACF Fields in these areas of the page:
 *	Content boxes
 * 
 *-------------------------------------------------------------------------*/
 
 /*-- Content box --*/
 //Title
 $box_title_01 = get_field("box-title-01");
 $box_title_02 = get_field("box-title-02");
 $box_title_03 = get_field("box-title-03");
 
 //Text
 $box_text_01 = get_field("box-text-01");
 $box_text_02 = get_field("box-text-02");
 $box_text_03 = get_field("box-text-03");
 
 //Image
 $box_img_01 = get_field("box-img-01");
 $box_img_02 = get_field("box-img-02");
 $box_img_03 = get_field("box-img-03");
 
 
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="about">
				
				<section class="banner" style="background: url(<?php echo $thumb_url[0]; ?>) no-repeat center">
					<!-- empty -->
				</section>
				
				<section id="about-content" class="bon-section-wrapper">
					
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<?php
								while(have_posts()): the_post();
									the_content();
								endwhile;
								?>
							</div>
						</div>
					</div>
					
					<div class="about-box background-color-02 clearfix">
						<div class="about-img-box">
							<img src="<?php echo $box_img_01["url"]; ?>" alt="<?php echo $box_img_01["alt"]; ?>">
						</div>
						<div class="about-content-box">
							<h2 class="bon-section-header white border"><?php echo $box_title_01; ?></h2>
							<p><?php echo $box_text_01; ?></p>
						</div>
					</div>
					
					<div class="about-box background-color-01 clearfix">
						<div class="about-content-box">
							<h2 class="bon-section-header white border"><?php echo $box_title_02; ?></h2>
							<p><?php echo $box_text_02; ?></p>
						</div>
						<div class="about-img-box">
							<img src="<?php echo $box_img_02["url"]; ?>" alt="<?php echo $box_img_02["alt"]; ?>">
						</div>
					</div>
					
					<div class="about-box background-color-04 clearfix">
						<div class="about-img-box">
							<img src="<?php echo $box_img_03["url"]; ?>" alt="<?php echo $box_img_03["alt"]; ?>">
						</div>
						<div class="about-content-box">
							<h2 class="bon-section-header white border"><?php echo $box_title_03; ?></h2>
							<p><?php echo $box_text_03; ?></p>
						</div>
					</div>
					
				</section>
				
			</article>
		</main><!-- #main -->
	</div><!-- #primary -->


 
<?php
get_footer();