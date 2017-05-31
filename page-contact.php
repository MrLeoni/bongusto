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
				
				<section id="map" class="map-box">
					<iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=R.%20Ant%C3%B4nia%20Martins%20Luiz%2C%20519%20Distrito%20Industrial%20Jo%C3%A3o%20Narezzi&key=AIzaSyACMUbYgasddo1ltLfEbChoJEmHsuVqQOk&zoom=15" allowfullscreen></iframe>
				</section>
				
			</article>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();