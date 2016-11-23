<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Bongusto
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<section class="banner error-404" style="background: url(wp-content/themes/bongusto/assets/img/background/home-banner.jpg) no-repeat center">
				<!-- empty -->
			</section>
			
			<div class="bon-section-wrapper">
				<div class="container">
					<div class="row">
						<section class="error-404 not-found">
							
							<header class="page-header">
								<h1 class="bon-section-header color border center"><?php esc_html_e( '404', 'bongusto' ); ?></h1>
							</header><!-- .page-header -->
							
							<div class="page-content">
								<div class="container">
									<div class="row">
										<div class="col-md-4">
											<i class="fa fa-coffee" aria-hidden="true"></i>
										</div>
										<div class="col-md-4">
											<p>Ops, parece que a página que você procura foi tomar um café, ou não existe. Deseja voltar para nossa <a class="bon-link-color" href="<?php echo esc_html(home_url("/")); ?>" title="Home">Home</a>?</p>
										</div>
									</div>
								</div>
							</div><!-- .page-content -->
							
						</section><!-- .error-404 -->
					</div>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
