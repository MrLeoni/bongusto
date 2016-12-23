<?php
/**
 * Bongusto functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bongusto
 */

if ( ! function_exists( 'bongusto_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bongusto_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Bongusto, use a find and replace
	 * to change 'bongusto' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bongusto', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'header' => esc_html__( 'Topo', 'bongusto' ),
		'footer' => esc_html__( 'Roda Pé', 'bongusto' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bongusto_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'bongusto_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bongusto_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bongusto_content_width', 640 );
}
add_action( 'after_setup_theme', 'bongusto_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bongusto_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bongusto' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Adicione widgets aqui.', 'bongusto' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bongusto_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bongusto_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );
	
	wp_enqueue_style( 'bxslider-style', get_template_directory_uri() . '/assets/css/jquery.bxslider.css' );
	
	wp_enqueue_style( 'bongusto-style', get_stylesheet_uri(), array('bootstrap', 'font-awesome', 'bxslider-style') );

	wp_enqueue_script( 'bongusto-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'bongusto-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_enqueue_script( 'bxslider-script', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array(), '4.1.2', true );
	
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('bxslider-script'), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bongusto_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Filter the except length to 20 characters.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/**
 * Register "receitas" custom post type with "Categoria" custom taxonomy
 */
add_action("init", "receitasPostType");
function receitasPostType() {
	
	// Registering new Custom Post Type
	$labels_post = array( 
		"name" => "Receitas",
		"singular_name" => "Receita",
		
	);
	$args_post = array(
		"labels" => $labels_post,
		"supports" => array("title", "editor", "excerpt", "thumbnail"),
		"menu_position" => 20,
		"menu_icon" => "dashicons-carrot",
		"public"	=> true,
		"show_in_menu"	=> true,
	);
	register_post_type("receitas", $args_post);
	
	// Registering new Taxonomy
	$labels_taxonomy = array( "name" => "Categorias de Receitas", "singular_name" => "Categoria da Receita");
	$args_taxonomy = array(
		"labels"	=> $labels_taxonomy,
		"show_ui"	=> true,
		"show_in_menu"	=> true,
		"show_tagcloud"	=> false,
		'show_admin_column' => true,
		"hierarchical"	=> true,
		"capabilities"	=> array("manage_terms", "edit_terms", "delete_terms", "assign_terms"),
	);
	register_taxonomy("receitas-categorias", "receitas", $args_taxonomy);
	
}

/**
 * Register "banners" custom post type with "Categoria" custom taxonomy
 */
add_action("init", "bannersPostType");
function bannersPostType() {
	
	// Registering new Custom Post Type
	$labels_post = array( 
		"name" => "Banners",
		"singular_name" => "Banner",
		
	);
	$args_post = array(
		"labels" => $labels_post,
		"supports" => array("title", "editor", "thumbnail"),
		"menu_position" => 21,
		"menu_icon" => "dashicons-format-gallery",
		"public"	=> true,
		"show_in_menu"	=> true,
	);
	register_post_type("banners", $args_post);
	
	// Registering new Taxonomy
	$labels_taxonomy = array( "name" => "Categorias dos Banners", "singular_name" => "Categoria do Banner");
	$args_taxonomy = array(
		"labels"	=> $labels_taxonomy,
		"show_ui"	=> true,
		"show_in_menu"	=> true,
		"show_tagcloud"	=> false,
		'show_admin_column' => true,
		"hierarchical"	=> true,
		"capabilities"	=> array("manage_terms", "edit_terms", "delete_terms", "assign_terms"),
	);
	register_taxonomy("banner-categorias", "banners", $args_taxonomy);
	
}


/**
 * Register "footer" custom post type with "Categoria" custom taxonomy
 */
add_action("init", "footerPostType");
function footerPostType() {
	
	// Registering new Custom Post Type
	$labels_post = array( 
		"name" => "Conteúdo Footer",
		"singular_name" => "Conteúdo Footer",
		
	);
	$args_post = array(
		"labels" => $labels_post,
		"supports" => array("title", "editor", "thumbnail"),
		"menu_position" => 22,
		"menu_icon" => "dashicons-media-default",
		"public"	=> true,
		"show_in_menu"	=> true,
	);
	register_post_type("footer", $args_post);
	
	// Registering new Taxonomy
	$labels_taxonomy = array( "name" => "Categorias do Footer", "singular_name" => "Categoria do Footer");
	$args_taxonomy = array(
		"labels"	=> $labels_taxonomy,
		"show_ui"	=> true,
		"show_in_menu"	=> true,
		"show_tagcloud"	=> false,
		'show_admin_column' => true,
		"hierarchical"	=> true,
		"capabilities"	=> array("manage_terms", "edit_terms", "delete_terms", "assign_terms"),
	);
	register_taxonomy("footer-categorias", "footer", $args_taxonomy);
	
}