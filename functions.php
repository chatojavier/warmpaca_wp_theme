<?php

// funtions.php is empty so you can easily track what code is needed in order to Vite + Tailwind JIT run well

/**========================
 * Vite config file. (It includes enqueue scripts and styles).
===========================*/
require get_template_directory() . "/inc/inc.vite.php";


/**========================
 * Qata Alpaca Theme functions and definitions
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package Qata_Alpaca_Theme
===========================*/

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '3.0.0' );
}

if ( ! function_exists( 'qatatheme_setup' ) ) :
	/**========================
	 * Sets up theme defaults and registers support for various WordPress features.
	===========================*/
	function qatatheme_setup() {
		/**========================
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		===========================*/
		load_theme_textdomain( 'qatatheme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		//Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		//Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'qatatheme' ),
			)
		);

		/**========================
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		===========================*/
		add_theme_support(
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
		add_theme_support(
			'custom-background',
			apply_filters(
				'qatatheme_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**========================
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		===========================*/
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'qatatheme_setup' );

/**========================
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
===========================*/
function qatatheme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'qatatheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'qatatheme_content_width', 0 );

/**========================
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
===========================*/
function qatatheme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'qatatheme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'qatatheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'qatatheme_widgets_init' );

/**========================
 * Disable the emoji's
 ===========================*/
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param    array  $plugins  
 * @return   array             Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

/**========================
 * Implement the Custom Header feature.
===========================*/
require get_template_directory() . '/inc/custom-header.php';

/**========================
 * Custom template tags for this theme.
===========================*/
require get_template_directory() . '/inc/template-tags.php';

/**========================
 * Functions which enhance the theme by hooking into WordPress.
===========================*/
require get_template_directory() . '/inc/template-functions.php';

/**========================
 * Customizer additions.
===========================*/
require get_template_directory() . '/inc/customizer.php';

/**========================
 * Load Jetpack compatibility file.
===========================*/
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**========================
 * Qata Functions.
===========================*/
require get_template_directory() . '/inc/qata-functions.php';
require get_template_directory() . '/inc/qata-fields-functions.php';


// Exclude node_modules on all-in-one wp migration
add_filter('ai1wm_exclude_content_from_export', function($exclude_filters) {
	$exclude_filters[] = (get_template_directory() . '/node_modules');
	return $exclude_filters;
  });


?>