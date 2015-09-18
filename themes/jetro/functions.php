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

function jetro_widgets_init2() {
	register_sidebar( array(
		'name'          => __( 'Footers Widget', 'jetro' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'jetro' ),
		'before_widget' => '<div class="foot">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'jetro_widgets_init2' );

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

/** Enqueue scripts and styles.  */
function jetro_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'jetro-fonts', jetro_fonts_url(), array(), null );
	
	wp_enqueue_style( 'jetro-style', get_stylesheet_uri() );
	wp_enqueue_script( 'jetro-caroufredsel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', array( 'jquery' ) );
	wp_enqueue_script( 'jetro-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ) );
	
	
}
add_action( 'wp_enqueue_scripts', 'jetro_scripts' );

/**
 * Formatted title print out
 *
 * @made by Bence
 */

function get_line1() {
		echo '<div class="line1"><h3>';
		
        if( is_home() && get_option('page_for_posts') ) {
		echo apply_filters( 'the_title',get_the_title( get_option('page_for_posts') ) );		
		echo '</h3>';
		} elseif( is_singular() ) { 
		the_title(); 
		}
		echo '</h3></div> ';	
}

/** Adding custom post type Slides */

function custom_post_type() {

	$labels = array(
		'name'                => _x( 'slides', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'slide', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Slides', 'text_domain' ),
		'name_admin_bar'      => __( 'Slides', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Items', 'text_domain' ),
		'add_new_item'        => __( 'Add New Item', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'new_item'            => __( 'New Item', 'text_domain' ),
		'edit_item'           => __( 'Edit Item', 'text_domain' ),
		'update_item'         => __( 'Update Item', 'text_domain' ),
		'view_item'           => __( 'View Item', 'text_domain' ),
		'search_items'        => __( 'Search Item', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'slide', 'text_domain' ),
		'description'         => __( 'on home page small images', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'slide', $args );

}
add_action( 'init', 'custom_post_type', 0 );

/** Adding custom post type Portfolio */

function custom_post_type_portfolio() {

	$labels = array(
		'name'                => _x( 'portfolios', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'portfolio', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Portfolios', 'text_domain' ),
		'name_admin_bar'      => __( 'Portfolios', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Items', 'text_domain' ),
		'add_new_item'        => __( 'Add New Item', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'new_item'            => __( 'New Item', 'text_domain' ),
		'edit_item'           => __( 'Edit Item', 'text_domain' ),
		'update_item'         => __( 'Update Item', 'text_domain' ),
		'view_item'           => __( 'View Item', 'text_domain' ),
		'search_items'        => __( 'Search Item', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'portfolios', 'text_domain' ),
		'description'         => __( 'Post Type Description', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'custom_post_type_portfolio', 0 );

/** Adding taxonomy tags for portfolio */

function portfolio_taxonomy() {

	$labels = array(
		'name'                       => _x( 'portfolio_tags', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'portfolio_tag', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Portfolio_tag', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'portfolio_tag', array( 'portfolio' ), $args );

}
add_action( 'init', 'portfolio_taxonomy', 0 );
