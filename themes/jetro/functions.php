<?php
/**
 * Jetro functions and definitions
 */

if ( ! function_exists( 'jetro_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function jetro_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'jetro' ),
		'social'  => __( 'Social Links Menu', 'jetro' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

}
endif; // jetro_setup
add_action( 'after_setup_theme', 'jetro_setup' );

/**
 * Register widget area.
 */
function jetro_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'jetro' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'jetro' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="midlines"><span>',
		'after_title'   => '</span></div>',
	) );
}
add_action( 'widgets_init', 'jetro_widgets_init' );

if ( ! function_exists( 'jetro_fonts_url' ) ) :
/**
 * Register Google fonts for Jetro.
 */
function jetro_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'jetro' ) ) {
		$fonts[] = 'Noto Sans:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Serif, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'jetro' ) ) {
		$fonts[] = 'Noto Serif:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Inconsolata, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'jetro' ) ) {
		$fonts[] = 'Inconsolata:400,700';
	}

}
endif;

/**
 * Enqueue scripts and styles.
 */
function jetro_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'jetro-fonts', jetro_fonts_url(), array(), null );

	// Load our main stylesheet.
	wp_enqueue_style( 'jetro-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'jetro_scripts' );


/**
 * Formatted title print out
 *
 * @made by Bence
 */

function get_line1() {
		echo '<div class="line1">';
        if( is_home() && get_option('page_for_posts') ) {
		echo '<h3>'
		echo apply_filters( 'the_title',get_the_title( get_option('page_for_posts') ) );		
		echo '</h3>';
		} elseif( is_singular() ) { 
		echo '<h3>' ;
		the_title(); 
		echo	'</h3>';
		 }
		echo '</div> ';	
}
