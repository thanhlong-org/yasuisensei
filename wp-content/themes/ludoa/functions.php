<?php
/**
 * Ludoa theme functions.
 *
 * @package Ludoa
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'LUDOA_VERSION', '1.0.0' );

/**
 * Theme setup.
 */
function ludoa_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'automatic-feed-links' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'ludoa' ),
		)
	);
}
add_action( 'after_setup_theme', 'ludoa_setup' );

/**
 * Enqueue styles and scripts.
 */
function ludoa_assets() {
	$uri = get_template_directory_uri();
	$css = $uri . '/assets/css';
	$js  = $uri . '/assets/js';

	// Google Fonts.
	wp_enqueue_style(
		'ludoa-fonts',
		'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif+JP:wght@400;500;600;700&family=Noto+Sans+TC:wght@400;500;700&family=Noto+Sans+KR:wght@400;500;700&family=Roboto:wght@400;500&display=swap',
		array(),
		null
	);

	// Swiper (CDN).
	wp_enqueue_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11' );

	// Stylesheets in load order. Each depends on the previous so order is preserved.
	$styles = array(
		'reset'       => null,
		'variables'   => null,
		'common'      => null,
		'header'      => null,
		'home'        => null,
		'hero'        => null,
		'program'     => '9',
		'supervision' => '8',
		'wishes'      => '9',
		'pricing'     => '1',
		'schedule'    => '1',
		'access'      => '1',
		'faq'         => '2',
		'footer'      => '2',
		'modal'       => '2',
		'animation'   => '2',
	);

	$prev = array( 'ludoa-fonts', 'swiper' );
	foreach ( $styles as $name => $ver ) {
		$handle = 'ludoa-' . $name;
		wp_enqueue_style( $handle, "$css/$name.css", $prev, $ver ? $ver : LUDOA_VERSION );
		$prev = array( $handle );
	}

	// Main stylesheet (theme header only).
	wp_enqueue_style( 'ludoa-style', get_stylesheet_uri(), array(), LUDOA_VERSION );

	// Scripts (footer). config first, swiper, then feature scripts; i18n last.
	wp_enqueue_script( 'ludoa-config', "$js/config.js", array(), LUDOA_VERSION, true );
	wp_enqueue_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11', true );

	$scripts = array(
		'slider'    => array( '8', array( 'ludoa-config', 'swiper' ) ),
		'nav'       => array( null, array( 'ludoa-config' ) ),
		'main'      => array( '10', array( 'ludoa-config' ) ),
		'schedule'  => array( '1', array( 'ludoa-config' ) ),
		'access'    => array( '1', array( 'ludoa-config' ) ),
		'faq'       => array( '1', array( 'ludoa-config' ) ),
		'animation' => array( '1', array( 'ludoa-config' ) ),
		'i18n'      => array( '2', array( 'ludoa-config' ) ),
	);

	foreach ( $scripts as $name => $cfg ) {
		list( $ver, $deps ) = $cfg;
		wp_enqueue_script( 'ludoa-' . $name, "$js/$name.js", $deps, $ver ? $ver : LUDOA_VERSION, true );
	}
}
add_action( 'wp_enqueue_scripts', 'ludoa_assets' );

/**
 * Static one-page LP: drop WordPress block-library bloat on the front.
 */
function ludoa_dequeue_block_styles() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'global-styles' );
	wp_dequeue_style( 'classic-theme-styles' );
}
add_action( 'wp_enqueue_scripts', 'ludoa_dequeue_block_styles', 100 );
