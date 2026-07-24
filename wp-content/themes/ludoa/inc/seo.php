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
 * Title + meta description for the current view, taken verbatim from the
 * ディレクトリマップ spec sheet (サイトチェック＿安井税理士事務所.xlsx). Returns
 * array( 'title' => …, 'desc' => … ) for a mapped view, or null otherwise
 * (individual case / news posts keep their own post-based title + excerpt).
 *
 * @return array{title:string,desc:string}|null
 */
function ludoa_dirmap_seo() {
	$service = array(
		'advisory'     => array(
			'title' => '税務顧問｜貴社の未来に併走する|安井税理士事務所',
			'desc'  => '日々の税務から経営判断の助言まで。安井税理士事務所は、専門家としての矜持を持ち貴社の未来に併走します。今後も続く挑戦を、誠実な対話と確かな知見で支え抜きます',
		),
		'accounting'   => array(
			'title' => '決算・記帳代行｜貴社の未来に併走する|安井税理士事務所',
			'desc'  => '決算は将来の成長を導く羅針盤です。専門家としての矜持を持ち、緻密な実務で貴社の財務を健全に保ちます。今後直面するあらゆる変化を、確かな知見で共に乗り越えましょう。',
		),
		'tax-return'   => array(
			'title' => '確定申告代行｜貴社の未来に併走する|安井税理士事務所',
			'desc'  => '一度限りの申告に留まらず、今後の安定した経営を支えます。安井税理士事務所は正確な税務実務を通じて貴社の未来に併走し、安心と信頼を積み上げる最良のパートナーです。',
		),
		'payroll'      => array(
			'title' => '月次給与・賞与計算｜貴社の未来に併走する|安井税理士事務所',
			'desc'  => '働く方々への大切な報いを、正確さと誠実さで形にします。今後の歩みを共にする伴走者として、安井税理士事務所は貴社の日常に寄り添い、安心感のある労務管理を実現します',
		),
		'startup'      => array(
			'title' => '事務手続き｜貴社の未来に併走する|安井税理士事務所',
			'desc'  => '手続きの正確性は信頼の証です。安井税理士事務所は専門家としての矜持を持ち、事務負担を軽減。貴社が今後の成長に専念できるよう、責任ある実務でその歩みを支え抜きます。',
		),
		'tax-planning' => array(
			'title' => '節税対策｜貴社の未来に併走する|安井税理士事務所',
			'desc'  => '目先の利益に留まらず、今後の手元資金を最大化し成長へ繋げます。安井税理士事務所は、貴社の未来に併走するパートナーとして、適正かつ効果的な節税対策を共に実現します。',
		),
	);

	$pages = array(
		'company'        => array(
			'title' => '企業情報｜貴社の未来に併走する|安井税理士事務所',
			'desc'  => '安井税理士事務所の理念、強み、拠点情報をご紹介します。私たちの原点にあるのは「今後を共に歩む」という強い覚悟。貴社の志を支え抜く、真摯な姿勢をお伝えします。',
		),
		'features'       => array(
			'title' => '私たちの強み｜貴社の未来に併走する|安井税理士事務所',
			'desc'  => '確かな知見と心通う対話。安井税理士事務所が、今後の貴社の歩みを支えるための「3つの強み」をご紹介します。専門家としての矜持を持ち、最良の伴走をお約束します。',
		),
		'message'        => array(
			'title' => '代表あいさつ｜貴社の未来に併走する|安井税理士事務所',
			'desc'  => 'なぜ今後を共にするのか」代表安井の理念と、お客様に寄り添う覚悟をお伝えします。志を同じくする伴走者として、貴社の未来を誰よりも温かく、力強く支え抜く決意です。',
		),
		'office'         => array(
			'title' => '事務所概要｜貴社の未来に併走する|安井税理士事務所',
			'desc'  => '安井税理士事務所の所在地、連絡先、アクセスをご案内します。今後の貴社との出会いの場となる、私たちの拠点情報です。正確な実務と誠実な対応で、皆様をお迎えいたします。',
		),
		'contact'        => array(
			'title' => 'お問い合わせ｜貴社の未来に併走する|安井税理士事務所',
			'desc'  => '今後の経営や税務の不安、まずは私達にお聞かせください。安井税理士事務所は貴社の未来に併走する覚悟を持ち、誠実な対話を通じて、解決への道を共に切り拓きます。',
		),
		'privacy-policy' => array(
			'title' => '個人情報保護方針｜貴社の未来に併走する|安井税理士事務所',
			'desc'  => '法令遵守と守秘義務の徹底は、専門家としての矜持です。貴社の機密情報を適切に扱い、今後も揺るぎない信頼関係を築くために。安井税理士事務所の情報の取り扱いを明示します。',
		),
	);

	if ( is_front_page() ) {
		return array(
			'title' => '安井税理士事務所｜次の10年を、共にするパートナーでありたい。',
			'desc'  => '次の10年を、共にするパートナーでありたい。安井税理士事務所は、確かな知見と誠実な対話で経営者の孤独に寄り添い、貴社の持続的な成長を力強く、温かく支え続けます。',
		);
	}
	if ( is_singular( 'service' ) ) {
		$slug = get_post_field( 'post_name', get_queried_object_id() );
		return isset( $service[ $slug ] ) ? $service[ $slug ] : null;
	}
	if ( is_post_type_archive( 'service' ) ) {
		return array(
			'title' => 'サービス｜貴社の未来に併走する|安井税理士事務所',
			'desc'  => '税務顧問から給与計算、節税対策まで、貴社の未来に併走する多彩な支援。専門家としての矜持を持ち、今後直面するあらゆる課題を共に乗り越えるための最適解を提示します。',
		);
	}
	if ( is_post_type_archive( 'case' ) ) {
		return array(
			'title' => '事例紹介｜貴社の未来に併走する|安井税理士事務所',
			'desc'  => 'お客様と共に歩み、笑顔で迎えた決算や承継の記録。安井税理士事務所が、今後の貴社にどう寄り添えるか、その答えがここにあります。未来を共に創る、心強い伴走の実績です。',
		);
	}
	if ( is_post_type_archive( 'news' ) ) {
		return array(
			'title' => 'お知らせ｜貴社の未来に併走する|安井税理士事務所',
			'desc'  => '税務情報の更新や事務所の近況をお届けします。今後の経営に役立つ最新動向を共有し、情報の面からも貴社の未来を支え抜く。安井税理士事務所の「今」を誠実に伝えます。',
		);
	}
	if ( is_page() ) {
		$slug = get_post_field( 'post_name', get_queried_object_id() );
		return isset( $pages[ $slug ] ) ? $pages[ $slug ] : null;
	}
	return null;
}

/**
 * Override the document <title> with the spec-sheet title on mapped views.
 * Short-circuits wp_get_document_title(), so og:title / twitter:title (which
 * read the same function) stay in sync.
 *
 * @param string $title Default title.
 * @return string
 */
function ludoa_dirmap_title( $title ) {
	$entry = ludoa_dirmap_seo();
	return ( $entry && ! empty( $entry['title'] ) ) ? $entry['title'] : $title;
}
add_filter( 'pre_get_document_title', 'ludoa_dirmap_title', 20 );

/**
 * Best description for the current view.
 *
 * @return string
 */
function ludoa_meta_description() {
	$default = '安井税理士事務所 — 守りの税務から、攻めの経営へ。';

	$entry = ludoa_dirmap_seo();
	if ( $entry && ! empty( $entry['desc'] ) ) {
		return $entry['desc'];
	}

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
