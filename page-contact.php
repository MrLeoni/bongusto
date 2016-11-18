<?php
/**
 * Template Name: Contato
 *
 * @package Bongusto
 */
 
// Using the page thumbnail as banner
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="contact">
				
				<section class="banner" style="background: url(<?php echo $thumb_url[0]; ?>) no-repeat center">
					<!-- empty -->
				</section>
				
				<section id="contact-content" class="bon-section-wrapper">
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
				</section>
				
			</article>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();