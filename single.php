<?php
/**
 * 
 * The template for displaying all single posts.
 *
 * @package Bongusto
 * 
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div id="single-posts">
				<?php
				while ( have_posts() ) : the_post();
			
					get_template_part( 'template-parts/content', get_post_format() );
			
				endwhile; // End of the loop.
				?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
