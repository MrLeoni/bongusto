<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bongusto
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	
	<!-- favicon -->
	<link href="<?php bloginfo( "stylesheet_directory" ); ?>/assets/img/logo/icon_16.png" rel="icon" size="16x16">
	<link href="<?php bloginfo( "stylesheet_directory" ); ?>/assets/img/logo/icon_32.png" rel="icon" size="32x32">
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<!-- Bootstrap -->
	<link href="<?php bloginfo( "stylesheet_directory" ); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
	<!-- Icons -->
	<link href="<?php bloginfo( "stylesheet_directory" ); ?>/assets/css/font-awesome.min.css" rel="stylesheet">
	<!-- BxSlider CSS -->
	<link href="<?php bloginfo( "stylesheet_directory" ); ?>/assets/css/jquery.bxslider.css" rel="stylesheet">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		
		<header id="header">
			<div class="container">
				<nav class="main-nav clearfix">
					<div class="home-link-box">
						<a href="<?php echo esc_html(home_url("/")); ?>" title="Home"><img src="<?php bloginfo("stylesheet_directory"); ?>/assets/img/logo/bongusto-logo-white.png" alt="Bongusto"></a>
					</div>
					<div class="nav-links">
						<ul class="bon-nav-links">
							
						</ul>
					</div>
				</nav>
			</div>
		</header>
	
