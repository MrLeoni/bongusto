<?php
/**
 * 
 * Template part for displaying posts.
 *
 * @package Bongusto
 * 
 */
 
 // ACF Field
 
 // Banner image, getting image url
 $bg_img = get_field("bg-img");
 
 // Has nutritional table
 $table_check = get_field("tabela-check");
 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<section class="banner" style="background: url(<?php echo $bg_img; ?>) no-repeat center">
			<!-- empty -->
		</section>
		<div class="container">
			<div class="bon-section-wrapper">
				<?php the_title( '<h1 class="bon-section-header color border entry-title">', '</h1>' ); ?>
			</div>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-5 col-md-5">
					<div class="post-img-box">
						<?php the_post_thumbnail("full"); ?>
					</div>
					<a class="bon-btn btn-color " href="<?php echo esc_html(home_url("/produtos")); ?>" title="Produtos">Voltar</a>
				</div>
				<div class="col-sm-offset-0 col-sm-6 col-md-offset-1 col-md-6">
					<div class="post-content-box">
						<?php
							the_content( sprintf(
								/* translators: %s: Name of current post. */
								wp_kses( __( 'Continue lendo %s <span class="meta-nav">&rarr;</span>', 'bongusto' ), array( 'span' => array( 'class' => array() ) ) ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							) );
							
							if($table_check == "true") {
								get_template_part( 'template-parts/content', "products_table" );
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
