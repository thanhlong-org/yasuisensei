<?php
/**
 * Ludoa theme functions — 安井税理士事務所 corporate site.
 *
 * Converted from the static html_asset design. Global CSS + per-page CSS live
 * under /static/ with their original folder structure so every relative url()
 * inside the CSS keeps resolving.
 *
 * @package Ludoa
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'LUDOA_VERSION', '1.0.4' );


// お問い合わせフォーム — validation / confirm flow.
require get_template_directory() . '/inc/contact-form.php';

// お問い合わせフォーム — mail sending (admin notification + auto-reply).
require get_template_directory() . '/inc/contact-mail.php';

// CPT (case / news) + Smart Custom Fields + template helpers.
require get_template_directory() . '/inc/cpt.php';

// Theme options (Customizer) — phone / LINE contact settings.
require get_template_directory() . '/inc/theme-options.php';

/**
 * Base URI for the copied static asset tree.
 *
 * @return string
 */
function ludoa_static_uri() {
	return get_template_directory_uri() . '/static';
}

/**
 * Map of provisioned pages.
 *
 * slug => [ title, css ] where `css` is the folder under /static/ that holds
 * `css/style.css` for that page ( null = home root css/style.css ).
 *
 * @return array
 */
function ludoa_pages() {
	return array(
		'features'            => array( 'title' => '私たちの強み', 'css' => 'features' ),
		'company'             => array( 'title' => '企業情報', 'css' => 'company' ),
		'message'             => array( 'title' => '代表あいさつ', 'css' => 'message' ),
		'office'              => array( 'title' => '事務所概要', 'css' => 'office' ),
		'contact'             => array( 'title' => 'お問い合わせ', 'css' => 'contact' ),
		'contact-confirm'     => array( 'title' => '入力内容の確認', 'css' => 'contact' ),
		'contact-complete'    => array( 'title' => '送信完了', 'css' => 'contact' ),
		'privacy'             => array( 'title' => 'プライバシーポリシー', 'css' => 'privacy' ),
	);
}

/**
 * Permalink for a provisioned page by slug (falls back to /slug/).
 *
 * @param string $slug Page slug.
 * @return string
 */
function ludoa_url( $slug ) {
	$page = get_page_by_path( $slug );
	return $page ? get_permalink( $page ) : home_url( "/$slug/" );
}

/**
 * Theme setup.
 */
function ludoa_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'ludoa_setup' );

/**
 * Enqueue fonts, global stylesheets, the page-specific stylesheet and the site script.
 */
function ludoa_assets() {
	$static = ludoa_static_uri();

	// Google Fonts (matches the static design).
	wp_enqueue_style(
		'ludoa-fonts',
		'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600&family=Nova+Cut&family=Padyakke+Expanded+One&family=Noto+Sans+JP:wght@300;400;500;700&family=Noto+Serif+JP:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	// Global stylesheets, in the same order as the static <head>.
	wp_enqueue_style( 'ludoa-reset', "$static/css/reset.css", array(), LUDOA_VERSION );
	wp_enqueue_style( 'ludoa-tokens', "$static/css/tokens.css", array( 'ludoa-reset' ), LUDOA_VERSION );
	wp_enqueue_style( 'ludoa-common', "$static/css/common.css", array( 'ludoa-tokens' ), LUDOA_VERSION );
	wp_enqueue_style( 'ludoa-loader', "$static/css/loader.css", array( 'ludoa-common' ), LUDOA_VERSION );
	// The static service-list rows are not links — cover each row with one.
	wp_add_inline_style( 'ludoa-common', '.service-item{cursor:pointer}.service-item__cover{position:absolute;inset:0;z-index:2}' );

	// Page-specific stylesheet.
	if ( is_front_page() ) {
		wp_enqueue_style( 'ludoa-page', "$static/css/style.css", array( 'ludoa-common' ), LUDOA_VERSION );
	} elseif ( is_singular( 'case' ) ) {
		wp_enqueue_style( 'ludoa-page', "$static/case/detail/css/style.css", array( 'ludoa-common' ), LUDOA_VERSION );
	} elseif ( is_post_type_archive( 'case' ) ) {
		wp_enqueue_style( 'ludoa-page', "$static/case/css/style.css", array( 'ludoa-common' ), LUDOA_VERSION );
		// Service filter buttons (cs-filter) — not part of the static design.
		wp_add_inline_style(
			'ludoa-page',
			'.cs-filter{display:flex;flex-wrap:wrap;gap:10px;margin:0 0 48px}' .
			'.cs-filter__btn{display:inline-block;padding:10px 22px;border:1px solid #0340A4;color:#0340A4;background:#fff;font-size:14px;line-height:1;text-decoration:none;transition:background .3s,color .3s}' .
			'.cs-filter__btn:hover,.cs-filter__btn.is-active{background:#0340A4;color:#fff}' .
			'@media (max-width:767px){.cs-filter{gap:8px;margin-bottom:32px}.cs-filter__btn{padding:8px 14px;font-size:12px}}'
		);
	} elseif ( is_singular( 'news' ) || is_post_type_archive( 'news' ) ) {
		wp_enqueue_style( 'ludoa-page', "$static/infomation/css/style.css", array( 'ludoa-common' ), LUDOA_VERSION );
	} elseif ( is_singular( 'service' ) ) {
		wp_enqueue_style( 'ludoa-page', "$static/advisory/css/style.css", array( 'ludoa-common' ), LUDOA_VERSION );
		// Current service card in the サービス grid: keep the hover state on.
		wp_add_inline_style(
			'ludoa-page',
			'.svc-card.is-current .svc-card__photo{opacity:1}' .
			'.svc-card.is-current .svc-card__edge--t,.svc-card.is-current .svc-card__edge--b{left:0;right:0}' .
			'.svc-card.is-current .svc-card__edge--l,.svc-card.is-current .svc-card__edge--r{top:0;bottom:0}' .
			'.svc-card.is-current .svc-card__num{color:rgba(0,69,124,.2)}' .
			'.svc-card.is-current .svc-card__title{color:#000}' .
			'.svc-card.is-current .svc-card__arrow{color:#464343}' .
			'.svc-card.is-current .svc-card__arrow-head{opacity:0}' .
			'.svc-card.is-current .svc-card__arrow-star{left:calc(100% + 10px);transform:translate(-100%,-50%)}'
		);
	} elseif ( is_post_type_archive( 'service' ) ) {
		wp_enqueue_style( 'ludoa-page', "$static/service/css/style.css", array( 'ludoa-common' ), LUDOA_VERSION );
	} else {
		$slug  = get_post_field( 'post_name', get_queried_object_id() );
		$pages = ludoa_pages();
		if ( isset( $pages[ $slug ] ) ) {
			wp_enqueue_style( 'ludoa-page', "$static/{$pages[ $slug ]['css']}/css/style.css", array( 'ludoa-common' ), LUDOA_VERSION );
		}
	}

	// Site script (footer).
	wp_enqueue_script( 'ludoa-script', "$static/js/script.js", array(), LUDOA_VERSION, true );
	wp_enqueue_script( 'ludoa-loader', "$static/js/loader.js", array(), LUDOA_VERSION, true );
	wp_enqueue_script( 'ludoa-service-hover', "$static/js/service-hover.js", array(), LUDOA_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'ludoa_assets' );

/**
 * Static site: drop WordPress block-library bloat on the front end.
 */
function ludoa_dequeue_block_styles() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'global-styles' );
	wp_dequeue_style( 'classic-theme-styles' );
}
add_action( 'wp_enqueue_scripts', 'ludoa_dequeue_block_styles', 100 );

/* ============================================================
 * Auto-provision pages on theme activation.
 * ============================================================ */

/**
 * Create the fixed pages (idempotent) and set a static front page.
 */
function ludoa_provision_pages() {
	// Home page (front).
	$home = get_page_by_path( 'home' );
	if ( ! $home ) {
		$home_id = wp_insert_post(
			array(
				'post_title'   => 'ホーム',
				'post_name'    => 'home',
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_content' => '',
			)
		);
	} else {
		$home_id = $home->ID;
	}

	if ( $home_id && ! is_wp_error( $home_id ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $home_id );
	}

	foreach ( ludoa_pages() as $slug => $data ) {
		if ( get_page_by_path( $slug ) ) {
			continue;
		}
		wp_insert_post(
			array(
				'post_title'   => $data['title'],
				'post_name'    => $slug,
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_content' => '',
			)
		);
	}

	// Pretty permalinks are required for /slug/ URLs.
	if ( '' === get_option( 'permalink_structure' ) ) {
		update_option( 'permalink_structure', '/%postname%/' );
	}
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'ludoa_provision_pages' );
