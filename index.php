<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bongusto
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="index">
				
				<section class="banner" style="background: url(assets/img/background/home-banner.jpg) no-repeat center">
					<!-- empty -->
				</section>
				
				<section class="bon-section-wrapper">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								
								<?php
								if ( have_posts() ) :
						
									if ( is_home() && ! is_front_page() ) : ?>
										<header>
											<h1 class="bon-section-header color border"><?php single_post_title(); ?></h1>
										</header>
						
									<?php
									endif;
						
									/* Start the Loop */
									while ( have_posts() ) : the_post(); ?>
										 
										<div class="col-xs-offset-1 col-xs-10 col-sm-offset-0 col-sm-6 col-md-offset-0 col-md-3">
											<div class="product-box">
												<div class="product-box-img">
													<?php the_post_thumbnail("medium_large"); ?>
												</div>
												<div class="product-box-content">
													<?php
													the_title("<h2>", "</h2>");
													echo "<a class='bon-btn-sm btn-color' href='".get_the_permalink()."' title='Saiba Mais'>Saiba Mais</a>";
													?>
												</div>
											</div>
										</div>
									
									<?php
									endwhile;
						
									the_posts_navigation();
						
								else :
						
									get_template_part( 'template-parts/content', 'none' );
						
								endif; ?>
								
							</div>
						</div>
					</div>
				</section>
				
			</article>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
