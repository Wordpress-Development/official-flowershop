<?php
/**
 * Theme Functions and Definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package official_flowershop
 */


if ( ! function_exists( 'official_flowershop_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function official_flowershop_setup() {

	// Set content width
	if ( ! isset( $content_width ) ) $content_width = 1170;

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on official flowershop, use a find and replace
	 * to change 'official-flowershop' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'official-flowershop', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'official-flowershop' ),
		'top-menu' => esc_html__( 'Top Menu', 'official-flowershop' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );


	/*
	* OfficialTheme setup
	*/

	// WP Less initialize and add variables
	define('WP_LESS_COMPILATION', 'deep');

	$less = WPLessPlugin::getInstance();
	$less->dispatch();

	// do stuff with its API like:
	$less->addVariable('bg_primary', '#A0D4A4');
	$less->addVariable('bg_secondary', '#474747');
	$less->addVariable('bg_light', '#f5f5f5');
	$less->addVariable('bg_body', '#ffffff');


	if (get_theme_mod('officialtheme_bg_primary') != '' ) {
		$less_color = get_theme_mod("officialtheme_bg_primary");
		$less->addVariable("bg_primary", "$less_color");
	}

	if (get_theme_mod('officialtheme_bg_secondary') != '' ) {
		$less_color = get_theme_mod("officialtheme_bg_secondary");
		$less->addVariable("bg_secondary", "$less_color");
	}

	if (get_theme_mod('officialtheme_bg_light') != '' ) {
		$less_color = get_theme_mod("officialtheme_bg_light");
		$less->addVariable("bg_light", "$less_color");
	}

	if (get_theme_mod('officialtheme_bg_body') != '' ) {
		$less_color = get_theme_mod("officialtheme_bg_body");
		$less->addVariable("bg_body", "$less_color");
	} // WP Less initialize and add variables

}

endif;

add_action( 'after_setup_theme', 'official_flowershop_setup' );




/**
 * Includes  
 */

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Custom functions that act independently of the theme templates.
require get_template_directory() . '/inc/extras.php';

// Register Custom Navigation Walker
require_once get_template_directory() . '/inc/wp-bootstrap-navwalker-master/wp_bootstrap_navwalker.php';

// Template Functions
require get_template_directory() . '/inc/template-functions.php';

// Theme widget & widget hooks
require get_template_directory() . '/inc/template-widgets-hook.php';

// Customize
require get_template_directory() . '/inc/customize.php';

// Widgets 
require get_template_directory() . '/inc/widgets-area.php';

// Scripts 
require get_template_directory() . '/inc/scripts.php';

// Admin 
require get_template_directory() . '/inc/admin.php';


// Extends
if ( class_exists( 'WooCommerce' ) ) {
	include get_template_directory() . '/inc/extends/woo_products.php';
}

// WP Less plugin
require get_template_directory() . '/inc/wp-less/bootstrap-for-theme.php';


/**
* Enqueue scripts & styles
*/
function officialtheme_scripts_styles() {

	// framework styles and scripts
	wp_enqueue_style('officialtheme-bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('officialtheme-bootstrap-theme-style', get_template_directory_uri() . '/css/bootstrap-theme.min.css');
	wp_enqueue_style('officialtheme-fontawesome-style', get_template_directory_uri() . '/css/font-awesome.min.css');

	wp_enqueue_script('officialtheme-modernizr-script', get_template_directory_uri() . '/js/vendor/modernizr.min.js');
	wp_enqueue_script('officialtheme-respond-script', get_template_directory_uri() . '/js/vendor/respond.min.js');
	wp_enqueue_script('officialtheme-html5-shiv-script', get_template_directory_uri() . '/js/vendor/html5shiv.js');
	wp_enqueue_script('officialtheme-bootstrap-script', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array(), false, true);


	// Main base theme style (LESS)
	wp_enqueue_style('officialtheme-theme-style', get_stylesheet_directory_uri().'/css/less/theme.less');

	//Google fonts
	wp_enqueue_style( 'officialtheme-google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,700|Handlee', false ); 

	// Parallax backgrounds
	if ( is_active_sidebar('en_widgets_area_slider') && get_theme_mod('officialtheme_slider') && get_theme_mod('officialtheme_slider_parallax', 'yes')=='yes' ) {
		wp_enqueue_script('officialtheme-parallax', get_template_directory_uri() . '/js/parallax.js-1.4.2/parallax.min.js', array('jquery'), false, true );
	}

	// Owl Carousel
	wp_enqueue_script('officialtheme-owlcarousel-script', get_template_directory_uri() . '/js/owl.carousel/owl-carousel/owl.carousel.min.js', array('jquery'), false, true );
	wp_enqueue_style('officialtheme-owlcarousel-style', get_template_directory_uri() . '/js/owl.carousel/owl-carousel/owl.carousel.css', false );
	wp_enqueue_style('officialtheme-owlcarousel-style-theme', get_template_directory_uri() . '/js/owl.carousel/owl-carousel/owl.theme.css', false);

	// Fixed Header
	if ( get_theme_mod( 'fixed_header_setting', 'fixed' ) == 'fixed' ) {
		wp_enqueue_script('officialtheme-ScrollToFixed', get_template_directory_uri() . '/js/ScrollToFixed-master/jquery-scrolltofixed-min.js', array('jquery'), false, true );
	}

	// CSS3 Animated it
	if ( get_theme_mod('officialtheme_animations','true')=='true' ) {
		wp_enqueue_script('officialtheme-animatedit-script', get_template_directory_uri() . '/js/css3-animate-it-master/js/css3-animate-it.js', array('jquery'), false, true );
		wp_enqueue_style('officialtheme-animatedit-style', get_template_directory_uri() . '/js//css3-animate-it-master/css/animations.css', false );
	}
}

add_action( 'wp_enqueue_scripts', 'officialtheme_scripts_styles' );



/**
 *  Editor Styles
 *
 * @link https://codex.wordpress.org/Function_Reference/add_editor_style
 *
 */

function officialtheme_add_editor_styles() {
    add_editor_style( 'css/custom-editor-style.css' );
}

add_action( 'admin_init', 'officialtheme_add_editor_styles' );



/**
 * WOOcommerce plugin
 */

add_theme_support( 'woocommerce' );


// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}

// limit products per page
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 15;' ), 20 );


// Change number of related products on product page 
function woo_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 6;
	return $args;
}

// change number of related products
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );

  function jk_related_products_args( $args ) {

	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 3; // arranged in 2 columns
	return $args;
}





