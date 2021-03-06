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

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-88213048-1', 'auto');
  ga('send', 'pageview');
</script>

<?php wp_footer(); ?>

</body>
</html>
