<?php
/**
 * 
 * Template part for displaying receitas posts.
 *
 * @package Bongusto
 * 
 */
 
 // Using the page thumbnail as banner
 $thumb_id = get_post_thumbnail_id();
 $thumb_url = wp_get_attachment_image_src($thumb_id, "full", true);

?>

<article id="receita-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<section class="banner" style="background: url(<?php echo $thumb_url[0]; ?>) no-repeat center">
			<!-- empty -->
		</section>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="receita-content-box">
						<?php
							the_content( sprintf(
								/* translators: %s: Name of current post. */
								wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bongusto' ), array( 'span' => array( 'class' => array() ) ) ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							) );
						?>
					</div>
					<a class="bon-btn btn-color" href="<?php echo esc_html(home_url("/receitas")); ?>" title="Receitas">Voltar</a>
					<button class="bon-btn btn-color fill" id="js-print" title="Imprimir Receita">Imprimir</button>
				</div>
			</div>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->