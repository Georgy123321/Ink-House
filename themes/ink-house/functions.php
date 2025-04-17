<?php
/**
 * Ink-House functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ink-House
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

function ink_house_setup() {
	load_theme_textdomain( 'ink-house', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'Menu-Header-PC' => esc_html__( 'Menu Header PC', 'ink-house' ),
			'Mobile-Header-menu' => esc_html__( 'Mobile Header', 'ink-house' ),
			'Footer-Colum-1' => esc_html__( 'Colum 1', 'ink-house' ),
			'Footer-Colum-2' => esc_html__( 'Colum 2', 'ink-house' ),
			'Footer-Colum-3' => esc_html__( 'Colum 3', 'ink-house' ),
		),
	);

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

	add_theme_support(
		'custom-background',
		apply_filters(
			'ink_house_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

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
add_action( 'after_setup_theme', 'ink_house_setup' );

function ink_house_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ink_house_content_width', 640 );
}
add_action( 'after_setup_theme', 'ink_house_content_width', 0 );


function ink_house_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ink-house' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ink-house' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ink_house_widgets_init' );


function ink_house_scripts() {
	wp_enqueue_style( 'ink-house-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'ink-house-swiper', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), '11.2.6' );
	wp_enqueue_style( 'ink-house-reset', get_template_directory_uri() . '/assets/css/reset.css', array(), '1.0' );
	wp_enqueue_style( 'ink-house-custom', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0' );
	wp_enqueue_style( 'ink-house-addon', get_template_directory_uri() . '/assets/css/addon-styles.css', array(), '1.0' );

	wp_enqueue_script( 'ink-house-bundleJs', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), '11.2.6', true );
	wp_enqueue_script( 'ink-house-script', get_template_directory_uri() . '/assets/js/script.js', array(), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ink_house_scripts' );

/**
 * подключаем глобальные опции 
 */
require get_template_directory() . '/inc/global-options.php';

// walker for header
class Header_Nav_Walker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $output .= '<li>';
        $output .= '<a href="' . esc_url( $item->url ) . '" class="house_header-link">' . esc_html( $item->title ) . '</a>';
    }

    function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}
// end walker for header

// Walker for footer
class Footer_Nav_Walker extends Walker_Nav_Menu {
    private $title_class;
    private $link_class;
    private $main_link_class;

    public function __construct( $args = [] ) {
        $this->title_class     = $args['title_class'] ?? 'footer_nav-title';
        $this->main_link_class = $args['main_link_class'] ?? 'footer_nav-main';
        $this->link_class      = $args['link_class'] ?? 'footer_nav-link';
    }

    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        if ( $depth === 0 && $item->menu_order === 1 ) {
            $output .= '<li class="' . esc_attr( $this->title_class ) . '">';
            $output .= '<a href="' . esc_url( $item->url ) . '" class="' . esc_attr( $this->main_link_class ) . '">' . esc_html( $item->title ) . '</a>';
        } else {
            $output .= '<li>';
            $output .= '<a href="' . esc_url( $item->url ) . '" class="' . esc_attr( $this->link_class ) . '">' . esc_html( $item->title ) . '</a>';
        }
    }

    function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}
// end Walker

// disable Elementor Swiper
function disable_elementor_swiper_slider() {
	if ( defined('ELEMENTOR_VERSION') ) {
		wp_dequeue_script('swiper');
		wp_deregister_script('swiper');

		wp_dequeue_style('swiper');
		wp_deregister_style('swiper');
	}
}
add_action('wp_enqueue_scripts', 'disable_elementor_swiper_slider');
// end disable Elementor Swiper
