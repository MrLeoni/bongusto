<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bongusto
 */
 
// Using the page thumbnail as banner
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="page">
			
				<section class="banner" style="background: url(<?php echo $thumb_url[0]; ?>) no-repeat center">
					<!-- empty -->
				</section>
				
				<section class="bon-section-wrapper">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<?php
								// Content from the editor
								while ( have_posts() ) : the_post();
									the_content();
								endwhile; // End of the loop.
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
