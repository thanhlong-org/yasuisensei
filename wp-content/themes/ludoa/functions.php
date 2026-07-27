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

define( 'LUDOA_VERSION', '1.1.3' );


// お問い合わせフォーム — validation / confirm flow.
require get_template_directory() . '/inc/contact-form.php';

// お問い合わせフォーム — mail sending (admin notification + auto-reply).
require get_template_directory() . '/inc/contact-mail.php';

// CPT (case / news) + Smart Custom Fields + template helpers.
require get_template_directory() . '/inc/cpt.php';

// Theme options (Customizer) — phone / LINE contact settings.
require get_template_directory() . '/inc/theme-options.php';

// SEO — favicon, app icons, Open Graph / Twitter meta, sitemap tuning.
require get_template_directory() . '/inc/seo.php';

/**
 * Base URI for the copied static asset tree.
 *
 * @return string
 */
function ludoa_static_uri() {
	return get_template_directory_uri() . '/static';
}

/**
 * Print a file from /static/ inline, as a <style> or <script>.
 *
 * Used for the loader only: it is the very first thing painted and the very
 * first thing that has to run, so a round trip for either half of it is a round
 * trip the user spends staring at the curtain.
 *
 * @param string $rel  Path under /static/, e.g. 'css/loader.css'.
 * @param string $type 'style' or 'script'.
 */
function ludoa_print_inline_asset( $rel, $type ) {
	$path = get_template_directory() . '/static/' . $rel;
	if ( ! is_readable( $path ) ) {
		return;
	}

	$code = file_get_contents( $path ); // phpcs:ignore WordPress.WP.AlternativeFunctions
	if ( false === $code ) {
		return;
	}

	printf(
		'style' === $type ? '<style id="ludoa-inline-%1$s">%2$s</style>' . "\n" : '<script id="ludoa-inline-%1$s">%2$s</script>' . "\n",
		esc_attr( sanitize_title( $rel ) ),
		$code // phpcs:ignore WordPress.Security.EscapeOutput — theme-owned file, not user input.
	);
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
		'privacy-policy'      => array( 'title' => 'プライバシーポリシー', 'css' => 'privacy' ),
	);
}

/**
 * Permalink for a provisioned page by its (leaf) slug (falls back to /slug/).
 *
 * Resolved by post_name rather than path so nested pages (e.g. the company
 * children at /company/features) still resolve from their leaf slug.
 *
 * @param string $slug Page slug (post_name).
 * @return string
 */
function ludoa_url( $slug ) {
	$pages = get_posts(
		array(
			'post_type'        => 'page',
			'name'             => $slug,
			'post_status'      => 'publish',
			'posts_per_page'   => 1,
			'no_found_rows'    => true,
			'suppress_filters' => false,
		)
	);
	return $pages ? get_permalink( $pages[0] ) : home_url( "/$slug/" );
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
 * Folder under /static/ that holds the banner (LCP) image pair for the current
 * view — `img/banner-pc.webp` + `img/banner-sp.webp` relative to it.
 *
 * Mirrors the per-page stylesheet mapping in ludoa_assets().
 *
 * @return string|null Folder path, or null when the view has no fixed banner.
 */
function ludoa_banner_dir() {
	if ( is_front_page() ) {
		return 'assets';
	}
	if ( is_post_type_archive( 'case' ) ) {
		return 'case';
	}
	if ( is_singular( 'news' ) || is_post_type_archive( 'news' ) ) {
		return 'infomation';
	}
	if ( is_singular( 'service' ) ) {
		return 'advisory';
	}
	if ( is_post_type_archive( 'service' ) ) {
		return 'service';
	}
	if ( is_singular( 'case' ) || is_404() ) {
		return null; // Per-post featured image / no banner.
	}

	$slug = get_post_field( 'post_name', get_queried_object_id() );
	$map  = array(
		'features'         => 'features',
		'company'          => 'company',
		'message'          => 'message',
		'office'           => 'office',
		'contact'          => 'contact',
		'contact-confirm'  => 'contact',
		'contact-complete' => 'contact',
		'privacy-policy'   => 'assets',
	);

	return isset( $map[ $slug ] ) ? $map[ $slug ] : null;
}

/**
 * Perf resource hints — preconnect to the font hosts and preload the LCP banner
 * image so it paints as early as possible.
 *
 * The banner is painted as a CSS background that swaps at the 767px breakpoint,
 * so each preload carries the matching `media` — otherwise mobile downloads the
 * (much heavier) PC crop at high priority and still discovers its own image late.
 */
function ludoa_resource_hints() {
	echo '<link rel="preconnect" href="https://fonts.googleapis.com" />' . "\n";
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />' . "\n";

	// The loader curtain is the first paint, and as a <link> it could not paint
	// until the whole render-blocking chain (common.css + the page sheet, ~120 KB)
	// had landed — on a phone the user watched a white screen for exactly that
	// long before the ~3s loader even began. Inline it: ~5 KB, ~1.5 KB gzipped.
	ludoa_print_inline_asset( 'css/loader.css', 'style' );

	$dir = ludoa_banner_dir();
	if ( $dir ) {
		$base = ludoa_static_uri() . '/' . $dir . '/img';
		printf(
			'<link rel="preload" as="image" href="%s" media="(max-width:767px)" fetchpriority="high" />' . "\n",
			esc_url( "$base/banner-sp.webp" )
		);
		printf(
			'<link rel="preload" as="image" href="%s" media="(min-width:768px)" fetchpriority="high" />' . "\n",
			esc_url( "$base/banner-pc.webp" )
		);
	} elseif ( is_singular( 'case' ) && has_post_thumbnail() ) {
		$thumb = get_the_post_thumbnail_url( get_queried_object_id(), 'full' );
		if ( $thumb ) {
			printf( '<link rel="preload" as="image" href="%s" fetchpriority="high" />' . "\n", esc_url( $thumb ) );
		}
	}
}
add_action( 'wp_head', 'ludoa_resource_hints', 1 );

/**
 * Enqueue fonts, global stylesheets, the page-specific stylesheet and the site script.
 */
function ludoa_assets() {
	$static = ludoa_static_uri();

	// Google Fonts — latin display faces. Small (~64 KB total), wanted everywhere.
	//
	// Noto Sans JP is dropped entirely: --font-jp-sans is declared in tokens.css
	// but never referenced by any rule.
	wp_enqueue_style(
		'ludoa-fonts',
		'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600&family=Nova+Cut&family=Padyakke+Expanded+One&display=swap',
		array(),
		null
	);

	// Noto Serif JP — PC only. Google serves it as ~32 unicode-range chunks of a
	// variable font, and this site's kanji coverage pulls all of them: ~805 KB,
	// which trimming weights does not reduce. On phones that is the single
	// biggest drag on LCP, and the fallback stack is already a real mincho
	// everywhere it matters (Hiragino Mincho ProN on iOS, Noto Serif CJK JP on
	// Android, Yu Mincho on Windows), so the media query keeps the bytes on the
	// viewports that can afford them.
	wp_enqueue_style(
		'ludoa-fonts-jp',
		'https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;500;700&display=swap',
		array(),
		null,
		'(min-width:768px)'
	);

	// Global stylesheets, in the same order as the static <head>.
	wp_enqueue_style( 'ludoa-reset', "$static/css/reset.css", array(), LUDOA_VERSION );
	wp_enqueue_style( 'ludoa-tokens', "$static/css/tokens.css", array( 'ludoa-reset' ), LUDOA_VERSION );
	wp_enqueue_style( 'ludoa-common', "$static/css/common.css", array( 'ludoa-tokens' ), LUDOA_VERSION );
	// css/loader.css is not enqueued — it is inlined in ludoa_resource_hints().
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
	} elseif ( is_404() ) {
		wp_enqueue_style( 'ludoa-page', "$static/404/css/style.css", array( 'ludoa-common' ), LUDOA_VERSION );
	} else {
		$slug  = get_post_field( 'post_name', get_queried_object_id() );
		$pages = ludoa_pages();
		if ( isset( $pages[ $slug ] ) ) {
			wp_enqueue_style( 'ludoa-page', "$static/{$pages[ $slug ]['css']}/css/style.css", array( 'ludoa-common' ), LUDOA_VERSION );
		}
	}

	// Site script (footer). js/loader.js is not enqueued — header.php inlines it
	// directly below the loader markup so its clock starts at parse time.
	wp_enqueue_script( 'ludoa-script', "$static/js/script.js", array(), LUDOA_VERSION, true );
	wp_enqueue_script( 'ludoa-service-hover', "$static/js/service-hover.js", array(), LUDOA_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'ludoa_assets' );

/**
 * Load the Google Fonts stylesheet without blocking the first paint.
 *
 * The JP serif alone is ~600 KB of unicode-range subsets; fetched at render
 * priority it starves the LCP banner image. `media="print"` drops it out of the
 * critical path, the onload handler promotes it back, and every face already
 * carries `display=swap`, so text paints in the local mincho fallback first.
 *
 * @param string $tag    The <link> markup.
 * @param string $handle Stylesheet handle.
 * @return string
 */
function ludoa_async_fonts( $tag, $handle ) {
	if ( is_admin() || ! in_array( $handle, array( 'ludoa-fonts', 'ludoa-fonts-jp' ), true ) ) {
		return $tag;
	}

	if ( ! preg_match( '/media=([\'"])(.*?)\1/', $tag, $m ) ) {
		return $tag; // Unexpected markup — leave it render-blocking rather than break it.
	}

	$restore = str_replace( "'", "\\'", $m[2] );
	$async   = str_replace(
		$m[0],
		sprintf( 'media="print" onload="this.media=\'%s\';this.onload=null"', esc_attr( $restore ) ),
		$tag
	);

	return $async . '<noscript>' . $tag . '</noscript>' . "\n";
}
add_filter( 'style_loader_tag', 'ludoa_async_fonts', 10, 2 );

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

/**
 * Drop the emoji polyfill — 23 KB of script plus a DOM scan, for a feature the
 * site never uses.
 */
function ludoa_disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'emoji_svg_url', '__return_false' );
}
add_action( 'init', 'ludoa_disable_emojis' );

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
