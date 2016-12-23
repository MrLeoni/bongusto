<?php 

// Template for display slider banners part

// Query args
$banners_args = array(
	"post_type"	=> "banners",
	"orderby"	=> 'modified',
	"posts_per_page"	=> 99,
	"tax_query"	=> array(array(
		"taxonomy"	=> "banner-categorias",
		"field"	=> "slug",
		"terms"	=> "home-banner",
	)),
);
$banners_query = new WP_Query( $banners_args );
?>

<section id="banner-slider">
	<div class="banner-slider-wrapper">
		<ul class="banner-slider">
			
			<?php
			while( $banners_query->have_posts()): $banners_query->the_post(); 
			
			// ACF Fields Link
			$banner_link_check = get_field("banner-link-check");
			$banner_link_target = get_field("banner-link-target");
			$banner_link_text = get_field("banner-link-text");
			$banner_link_url = get_field("banner-link-url");
			
			?>
				
				<li class="banner banner-text" style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(<?php echo the_post_thumbnail_url('full'); ?>) no-repeat center; height: 660px;">
					<div class="container">
						<div class="row">
							<div class="col-md-5">
								<div class="banner-content">
									<?php the_content();
									if($banner_link_check == "true") { ?>
										<a class="bon-btn btn-white" href="<?php echo $banner_link_url; ?>" title="<?php echo $banner_link_text; ?>" target="<?php echo $banner_link_target; ?>"><?php echo $banner_link_text; ?></a>
									<?php }	?>
								</div>
							</div>
						</div>
					</div>
				</li>
				
			<?php
			endwhile;
			?>
			
		</ul>
	</div>
</section>