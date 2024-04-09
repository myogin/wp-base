<?php
/**
 * yogi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package yogi
 */

if ( ! defined( 'YOGI_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'YOGI_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the afteryogietup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function yogiyogietup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on yogi, use a find and replace
		* to change 'yogi' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'yogi', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_themeyogiupport( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_themeyogiupport( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_themeyogiupport( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'yogi' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_themeyogiupport(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_themeyogiupport(
		'custom-background',
		apply_filters(
			'yogi_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_themeyogiupport( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_themeyogiupport(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'afteryogietup_theme', 'yogiyogietup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function yogi_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'yogi_content_width', 640 );
}
add_action( 'afteryogietup_theme', 'yogi_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function yogi_widgets_init() {
	registeryogiidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'yogi' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'yogi' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'yogi_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function yogiyogicripts() {
	wp_enqueueyogityle( 'yogi-style', getyogitylesheet_uri(), array(), YOGI_VERSION );
	wpyogityle_add_data( 'yogi-style', 'rtl', 'replace' );

	wp_enqueueyogicript( 'yogi-navigation', get_template_directory_uri() . '/js/navigation.js', array(), YOGI_VERSION, true );

	if ( isyogiingular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueueyogicript( 'comment-reply' );
	}
}
add_action( 'wp_enqueueyogicripts', 'yogiyogicripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
