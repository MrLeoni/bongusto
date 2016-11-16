<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bongusto
 * 
 */
 
/**---------------------------------------------------------------------------
 * Using a custom query to get post-content in "footer" post type
 * Creating two queries for display content in diferente areas of the footer
-----------------------------------------------------------------------------*/
 
// Querying content for top section
$news_args = array(
	"post_type"	=> "footer",
	"order_by"	=> "modified",
	"posts_per_page"	=> 99,
	"tax_query"	=> array(array(
			"taxonomy"	=> "footer-categorias",
			"field"	=> "slug",
			"terms"	=> "newsletter"
		))
);
$news_query = new WP_Query( $news_args );
 
// Querying content for middle section
$address_args = array(
	"post_type"	=> "footer",
	"order_by"	=> "modified",
	"posts_per_page"	=> 99,
	"tax_query"	=> array(array(
			"taxonomy"	=> "footer-categorias",
			"field"	=> "slug",
			"terms"	=> "endereco"
		))
);
$address_query = new WP_Query( $address_args );

?>

		<footer id="footer" class="site-footer">
			<div class="container">
				
				<section class="footer-content-top">
					<div class="row">
						<div class="col-md-12">
							<?php
								//Start the Loop, displaying $news_query posts
								while($news_query->have_posts()): $news_query->the_post();
									the_content();
								endwhile;
								// End fo the Loop
								// Reset post data
								wp_reset_postdata();
							?>
						</div>
					</div>
				</section>
				
				<section class="footer-content-middle">
					<div class="row">
						<div class="col-md-6">
							<?php
								// Footer menu arguments
								$footer_args = array(
									"theme_location"	=> "footer",
									"container"	=> "nav",
									"container_class"	=> "footer-links clearfix",
									"menu_class"	=> "bon-nav-links"
								);
								// Calling the function to build the menu with $footer_args arguments
								wp_nav_menu( $footer_args );
							?>
						</div>
						<div class="col-md-6">
							<div class="footer-address">
								<?php
									//Start the Loop, displaying $address_query posts
									while($address_query->have_posts()): $address_query->the_post();
										the_content();
									endwhile;
									// End fo the Loop
									// Reset post data
									wp_reset_postdata();
								?>
							</div>
						</div>
					</div>
				</section>
				
				<section class="footer-content-bottom copy">
					<p>Bongusto | Todos os direitos reservados <span><a href="http://www.agenciadelucca.com.br" target="_blank" title="Agência Delucca">Agência Delucca</a></span></p>
				</section>
				
			</div>
		</footer>

	</div><!-- #page -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php bloginfo( "template_url" ); ?>/js/jquery-1.12.4.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php bloginfo( "template_url" ); ?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo( "template_url" ); ?>/js/jquery.bxslider.min.js"></script>
<script src="<?php bloginfo( "template_url" ); ?>/js/main.js"></script>

<?php wp_footer(); ?>

</body>
</html>
