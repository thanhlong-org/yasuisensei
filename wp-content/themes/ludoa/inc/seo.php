<?php
/**
 * SEO / social — favicon, app icons, Open Graph, Twitter Card, canonical.
 *
 * Icons live in /static/common/ (favicon.png, app_icon.png, OGP_YZ.png).
 *
 * @package Ludoa
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * URI for a file under /static/common/.
 *
 * @param string $file File name.
 * @return string
 */
function ludoa_common_uri( $file ) {
	return ludoa_static_uri() . '/common/' . ltrim( $file, '/' );
}

/**
 * Best description for the current view.
 *
 * @return string
 */
function ludoa_meta_description() {
	$default = '安井税理士事務所 — 守りの税務から、攻めの経営へ。';

	if ( is_front_page() ) {
		return $default;
	}

	if ( is_singular() ) {
		$post = get_queried_object();
		if ( $post && ! empty( $post->post_excerpt ) ) {
			return wp_strip_all_tags( $post->post_excerpt );
		}
		if ( $post && ! empty( $post->post_content ) ) {
			$text = wp_strip_all_tags( strip_shortcodes( $post->post_content ) );
			$text = trim( preg_replace( '/\s+/u', ' ', $text ) );
			if ( '' !== $text ) {
				return mb_substr( $text, 0, 120 );
			}
		}
	}

	$tagline = get_bloginfo( 'description' );
	return $tagline ? $tagline : $default;
}

/**
 * Canonical URL for the current view.
 *
 * @return string
 */
function ludoa_current_url() {
	if ( is_front_page() ) {
		return home_url( '/' );
	}
	if ( is_singular() ) {
		return get_permalink();
	}
	if ( is_post_type_archive() ) {
		$link = get_post_type_archive_link( get_query_var( 'post_type' ) );
		if ( $link ) {
			return $link;
		}
	}
	if ( is_home() && get_option( 'page_for_posts' ) ) {
		return get_permalink( get_option( 'page_for_posts' ) );
	}
	return home_url( add_query_arg( array() ) );
}

/**
 * Output favicon / app-icon <link> tags.
 */
function ludoa_head_icons() {
	$favicon = esc_url( ludoa_common_uri( 'favicon.png' ) );
	$appicon = esc_url( ludoa_common_uri( 'app_icon.png' ) );
	?>
	<link rel="icon" type="image/png" href="<?php echo $favicon; ?>" />
	<link rel="shortcut icon" type="image/png" href="<?php echo $favicon; ?>" />
	<link rel="apple-touch-icon" href="<?php echo $appicon; ?>" />
	<?php
}
add_action( 'wp_head', 'ludoa_head_icons', 2 );

/**
 * Output canonical, Open Graph and Twitter Card meta.
 */
function ludoa_head_social() {
	$title = wp_get_document_title();
	$desc  = ludoa_meta_description();
	$url   = ludoa_current_url();
	$image = ludoa_common_uri( 'OGP_YZ.png' );
	$site  = get_bloginfo( 'name' );
	$type  = is_singular() && ! is_front_page() ? 'article' : 'website';
	?>
	<meta name="description" content="<?php echo esc_attr( $desc ); ?>" />
	<link rel="canonical" href="<?php echo esc_url( $url ); ?>" />
	<meta property="og:type" content="<?php echo esc_attr( $type ); ?>" />
	<meta property="og:title" content="<?php echo esc_attr( $title ); ?>" />
	<meta property="og:description" content="<?php echo esc_attr( $desc ); ?>" />
	<meta property="og:url" content="<?php echo esc_url( $url ); ?>" />
	<meta property="og:site_name" content="<?php echo esc_attr( $site ); ?>" />
	<meta property="og:image" content="<?php echo esc_url( $image ); ?>" />
	<meta property="og:image:width" content="1200" />
	<meta property="og:image:height" content="630" />
	<meta property="og:locale" content="ja_JP" />
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:title" content="<?php echo esc_attr( $title ); ?>" />
	<meta name="twitter:description" content="<?php echo esc_attr( $desc ); ?>" />
	<meta name="twitter:image" content="<?php echo esc_url( $image ); ?>" />
	<?php
}
add_action( 'wp_head', 'ludoa_head_social', 3 );

/* ============================================================
 * Sitemap — WordPress core wp-sitemap.xml (WP 5.5+).
 * ============================================================ */

/**
 * Keep wp-sitemap.xml available even when "Search engine visibility" is off.
 *
 * Core disables the sitemap whenever blog_public = 0 (the staging default on
 * this .test box). The sitemap itself leaks nothing, so we always build it;
 * actual indexing is still governed by the blog_public robots meta. Flip
 * Settings → Reading → Search engine visibility ON in production so crawlers
 * both index the site and fetch this sitemap.
 */
add_filter( 'wp_sitemaps_enabled', '__return_true' );

/**
 * Drop the users sitemap (no author archives on this corporate site).
 *
 * The filter fires once per provider with the provider object + its name;
 * returning false skips that provider.
 *
 * @param WP_Sitemaps_Provider $provider Sitemap provider.
 * @param string               $name     Provider name.
 * @return WP_Sitemaps_Provider|false
 */
function ludoa_sitemap_providers( $provider, $name ) {
	return 'users' === $name ? false : $provider;
}
add_filter( 'wp_sitemaps_add_provider', 'ludoa_sitemap_providers', 10, 2 );

/**
 * Keep utility pages (contact confirm/complete) out of the sitemap.
 *
 * @param array  $args        Query args.
 * @param string $post_type   Post type.
 * @return array
 */
function ludoa_sitemap_exclude_pages( $args, $post_type ) {
	if ( 'page' !== $post_type ) {
		return $args;
	}
	$exclude = array();
	foreach ( array( 'contact-confirm', 'contact-complete' ) as $slug ) {
		$page = get_page_by_path( $slug );
		if ( $page ) {
			$exclude[] = $page->ID;
		}
	}
	if ( $exclude ) {
		$args['post__not_in'] = array_merge( isset( $args['post__not_in'] ) ? $args['post__not_in'] : array(), $exclude );
	}
	return $args;
}
add_filter( 'wp_sitemaps_posts_query_args', 'ludoa_sitemap_exclude_pages', 10, 2 );
