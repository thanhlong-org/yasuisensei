<?php
/**
 * Custom post types (case / news), Smart Custom Fields definitions and
 * template helpers for pulling that data back out.
 *
 * @package Ludoa
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* ============================================================
 * Post types
 * ============================================================ */

/**
 * Register the 事例紹介 (case) and お知らせ (news) post types.
 */
function ludoa_register_post_types() {
	register_post_type(
		'case',
		array(
			'labels'        => array(
				'name'          => '事例紹介',
				'singular_name' => '事例',
				'add_new_item'  => '事例を追加',
				'edit_item'     => '事例を編集',
			),
			'public'        => true,
			'has_archive'   => true,
			'menu_position' => 20,
			'menu_icon'     => 'dashicons-portfolio',
			'supports'      => array( 'title', 'editor', 'thumbnail' ),
			'show_in_rest'  => true,
			'rewrite'       => array( 'slug' => 'case' ),
		)
	);

	register_post_type(
		'news',
		array(
			'labels'        => array(
				'name'          => 'お知らせ',
				'singular_name' => 'お知らせ',
				'add_new_item'  => 'お知らせを追加',
				'edit_item'     => 'お知らせを編集',
			),
			'public'        => true,
			'has_archive'   => true,
			'menu_position' => 21,
			'menu_icon'     => 'dashicons-megaphone',
			'supports'      => array( 'title', 'editor', 'thumbnail' ),
			'show_in_rest'  => true,
			'rewrite'       => array( 'slug' => 'infomation' ),
		)
	);

	register_post_type(
		'service',
		array(
			'labels'        => array(
				'name'          => 'サービス',
				'singular_name' => 'サービス',
				'add_new_item'  => 'サービスを追加',
				'edit_item'     => 'サービスを編集',
			),
			'public'        => true,
			'has_archive'   => true,
			'menu_position' => 22,
			'menu_icon'     => 'dashicons-clipboard',
			'supports'      => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
			'show_in_rest'  => true,
			'rewrite'       => array( 'slug' => 'service' ),
		)
	);
}
add_action( 'init', 'ludoa_register_post_types' );

/**
 * Archive page sizes (case list shows 4 per page like the design).
 *
 * @param WP_Query $query Main query.
 */
function ludoa_archive_query( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}
	if ( $query->is_post_type_archive( 'case' ) ) {
		$query->set( 'posts_per_page', 4 );
	}
	if ( $query->is_post_type_archive( 'news' ) ) {
		$query->set( 'posts_per_page', 10 );
	}
	if ( $query->is_post_type_archive( 'service' ) ) {
		$query->set( 'posts_per_page', -1 );
		$query->set( 'orderby', 'menu_order' );
		$query->set( 'order', 'ASC' );
	}
}
add_action( 'pre_get_posts', 'ludoa_archive_query' );

/* ============================================================
 * Smart Custom Fields
 * ============================================================ */

/**
 * Field group for the case post type: tag label + client name.
 *
 * @param array  $settings  SCF settings.
 * @param string $type      Post type.
 * @param int    $id        Post id.
 * @param string $meta_type Meta type.
 * @return array
 */
function ludoa_scf_register_fields( $settings, $type, $id, $meta_type ) {
	if ( 'case' === $type ) {
		$setting = SCF::add_setting( 'ludoa-case-fields', '事例情報' );
		$setting->add_group(
			'case-meta',
			false,
			array(
				array(
					'name'    => 'case_tag',
					'label'   => 'タグ（サービス種別）',
					'type'    => 'text',
					'default' => '税務顧問',
				),
				array(
					'name'  => 'case_client',
					'label' => 'お客様名（例：株式会社○○○様）',
					'type'  => 'text',
				),
			)
		);
		$settings[] = $setting;
	}

	if ( 'service' === $type ) {
		$setting = SCF::add_setting( 'ludoa-service-fields', 'サービス情報' );
		$setting->add_group(
			'service-meta',
			false,
			array(
				array(
					'name'  => 'service_en',
					'label' => '英語表記（例：advisory）',
					'type'  => 'text',
				),
			)
		);
		$setting->add_group(
			'service-support',
			true,
			array(
				array(
					'name'  => 'support_name',
					'label' => '支援内容',
					'type'  => 'text',
				),
			)
		);
		$setting->add_group(
			'service-issues',
			true,
			array(
				array(
					'name'  => 'issue_text',
					'label' => '解決できる課題',
					'type'  => 'text',
				),
			)
		);
		$setting->add_group(
			'service-flow',
			true,
			array(
				array(
					'name'  => 'flow_title',
					'label' => 'ステップ名',
					'type'  => 'text',
				),
				array(
					'name'  => 'flow_desc',
					'label' => 'ステップ説明',
					'type'  => 'textarea',
				),
			)
		);
		$settings[] = $setting;
	}
	return $settings;
}
add_filter( 'smart-cf-register-fields', 'ludoa_scf_register_fields', 10, 4 );

/* ============================================================
 * Template helpers
 * ============================================================ */

/**
 * SCF value with fallback (safe when the plugin is deactivated).
 *
 * @param string   $name    Field name.
 * @param int|null $post_id Post id.
 * @param string   $default Fallback value.
 * @return string
 */
function ludoa_scf( $name, $post_id = null, $default = '' ) {
	if ( ! class_exists( 'SCF' ) ) {
		return $default;
	}
	$value = SCF::get( $name, $post_id );
	return ( null === $value || '' === $value ) ? $default : $value;
}

/**
 * Inline background-image style attribute for the featured image.
 * Empty string when no thumbnail — the CSS default image stays visible.
 *
 * @param int|null $post_id Post id.
 * @param string   $size    Image size.
 * @return string style="..." attribute (already escaped) or ''.
 */
function ludoa_bg_style( $post_id = null, $size = 'large' ) {
	$url = get_the_post_thumbnail_url( $post_id, $size );
	return $url ? ' style="background-image: url(\'' . esc_url( $url ) . '\')"' : '';
}

/**
 * All service posts in menu_order (01, 02, …).
 *
 * @return WP_Post[]
 */
function ludoa_services() {
	return get_posts(
		array(
			'post_type'      => 'service',
			'posts_per_page' => -1,
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
			'no_found_rows'  => true,
		)
	);
}

/**
 * Permalink for a service post by slug (falls back to the archive).
 *
 * @param string $slug Service slug (e.g. 'advisory').
 * @return string
 */
function ludoa_service_url( $slug ) {
	$posts = get_posts(
		array(
			'post_type'      => 'service',
			'name'           => $slug,
			'posts_per_page' => 1,
		)
	);
	return $posts ? get_permalink( $posts[0] ) : get_post_type_archive_link( 'service' );
}

/**
 * Plain-text excerpt trimmed by characters (Japanese-safe).
 *
 * @param int              $length Max characters.
 * @param int|WP_Post|null $post   Post.
 * @return string
 */
function ludoa_excerpt( $length = 80, $post = null ) {
	$post = get_post( $post );
	if ( ! $post ) {
		return '';
	}
	$text = $post->post_excerpt ? $post->post_excerpt : $post->post_content;
	$text = wp_strip_all_tags( strip_shortcodes( $text ) );
	$text = trim( preg_replace( '/\s+/u', ' ', $text ) );
	if ( mb_strlen( $text ) > $length ) {
		$text = mb_substr( $text, 0, $length ) . '…';
	}
	return $text;
}

/**
 * Numbered pager (01 / 02 / …) with prev/next arrows, matching the static
 * cs-pager / news-pager markup. Prints nothing when there is only one page.
 *
 * @param string        $prefix CSS block prefix ('cs-pager' or 'news-pager').
 * @param WP_Query|null $query  Query (defaults to the main query).
 */
function ludoa_pager( $prefix, $query = null ) {
	global $wp_query;

	$query = $query ? $query : $wp_query;
	$total = (int) $query->max_num_pages;
	if ( $total < 2 ) {
		return;
	}
	$current = max( 1, (int) get_query_var( 'paged' ) );

	$arrow_prev = '<svg viewBox="0 0 34 12" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><line x1="33" y1="6" x2="2" y2="6"/><polyline points="8,1.5 2,6 8,10.5"/></svg>';
	$arrow_next = '<svg viewBox="0 0 34 12" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><line x1="1" y1="6" x2="32" y2="6"/><polyline points="26,1.5 32,6 26,10.5"/></svg>';
	?>
	<nav class="<?php echo esc_attr( $prefix ); ?>" aria-label="ページ送り">
		<?php if ( $current > 1 ) : ?>
			<a href="<?php echo esc_url( get_pagenum_link( $current - 1 ) ); ?>" class="<?php echo esc_attr( $prefix ); ?>__arrow" aria-label="前のページ"><?php echo $arrow_prev; // phpcs:ignore WordPress.Security.EscapeOutput ?></a>
		<?php endif; ?>
		<?php for ( $i = 1; $i <= $total; $i++ ) : ?>
			<?php $label = str_pad( (string) $i, 2, '0', STR_PAD_LEFT ); ?>
			<?php if ( $i === $current ) : ?>
				<span class="<?php echo esc_attr( $prefix ); ?>__num is-active" aria-current="page"><?php echo esc_html( $label ); ?></span>
			<?php else : ?>
				<a href="<?php echo esc_url( get_pagenum_link( $i ) ); ?>" class="<?php echo esc_attr( $prefix ); ?>__num"><?php echo esc_html( $label ); ?></a>
			<?php endif; ?>
		<?php endfor; ?>
		<?php if ( $current < $total ) : ?>
			<a href="<?php echo esc_url( get_pagenum_link( $current + 1 ) ); ?>" class="<?php echo esc_attr( $prefix ); ?>__arrow" aria-label="次のページ"><?php echo $arrow_next; // phpcs:ignore WordPress.Security.EscapeOutput ?></a>
		<?php endif; ?>
	</nav>
	<?php
}

/* ============================================================
 * One-shot migration: replace provisioned placeholder pages with CPTs.
 * ============================================================ */

/**
 * Trash the old fixed pages that the CPT archives supersede, seed sample
 * posts so the lists are not empty, then flush rewrite rules. Runs once.
 */
function ludoa_cpt_migrate() {
	if ( get_option( 'ludoa_cpt_migrated' ) ) {
		return;
	}

	foreach ( array( 'case', 'case-detail', 'infomation', 'infomation-year-end' ) as $slug ) {
		$page = get_page_by_path( $slug );
		if ( $page ) {
			wp_trash_post( $page->ID );
		}
	}

	ludoa_seed_cases();
	ludoa_seed_news();

	flush_rewrite_rules();
	update_option( 'ludoa_cpt_migrated', 1 );
}
add_action( 'init', 'ludoa_cpt_migrate', 20 );

/**
 * Second migration: the service / advisory fixed pages become the service CPT
 * (archive-service.php + single-service.php). Runs once.
 */
function ludoa_service_migrate() {
	if ( get_option( 'ludoa_service_migrated' ) ) {
		return;
	}

	foreach ( array( 'service', 'advisory' ) as $slug ) {
		$page = get_page_by_path( $slug );
		if ( $page ) {
			wp_trash_post( $page->ID );
		}
	}

	ludoa_seed_services();

	flush_rewrite_rules();
	update_option( 'ludoa_service_migrated', 1 );
}
add_action( 'init', 'ludoa_service_migrate', 21 );

/**
 * Sample サービス posts matching the static design (only when none exist yet).
 */
function ludoa_seed_services() {
	$existing = get_posts( array( 'post_type' => 'service', 'post_status' => 'any', 'numberposts' => 1, 'fields' => 'ids' ) );
	if ( $existing ) {
		return;
	}

	$lead = "税務顧問とは、税金の申告や会計処理だけでなく、事業運営に関するさまざまな課題を継続的にサポートするサービスです。\n\n毎月の業績確認や税務相談を通じて、経営状況を正しく把握し、適切な意思決定を支援します。\n\n税制改正への対応や節税対策はもちろん、資金繰りや事業計画などについても気軽に相談できる身近なパートナーとして、お客様の事業を支えます。";

	$services = array(
		array( 'title' => '税務顧問', 'slug' => 'advisory', 'en' => 'advisory', 'content' => $lead ),
		array( 'title' => '決算・記帳代行', 'slug' => 'accounting', 'en' => 'accounting', 'content' => str_repeat( 'テキストが入ります。', 12 ) ),
		array( 'title' => '確定申告代行', 'slug' => 'tax-return', 'en' => 'tax-return', 'content' => str_repeat( 'テキストが入ります。', 12 ) ),
		array( 'title' => '月次給与・賞与計算', 'slug' => 'payroll', 'en' => 'payroll', 'content' => str_repeat( 'テキストが入ります。', 12 ) ),
		array( 'title' => '起業・スタートアップの支援', 'slug' => 'startup', 'en' => 'startup', 'content' => str_repeat( 'テキストが入ります。', 12 ) ),
		array( 'title' => '節税対策', 'slug' => 'tax-planning', 'en' => 'tax-planning', 'content' => str_repeat( 'テキストが入ります。', 12 ) ),
	);

	foreach ( $services as $i => $service ) {
		$post_id = wp_insert_post(
			array(
				'post_type'    => 'service',
				'post_status'  => 'publish',
				'post_title'   => $service['title'],
				'post_name'    => $service['slug'],
				'post_content' => $service['content'],
				'menu_order'   => $i + 1,
			)
		);
		if ( $post_id && ! is_wp_error( $post_id ) ) {
			update_post_meta( $post_id, 'service_en', $service['en'] );
		}
	}
}

/**
 * Sample 事例 posts (only when none exist yet).
 */
function ludoa_seed_cases() {
	$existing = get_posts( array( 'post_type' => 'case', 'post_status' => 'any', 'numberposts' => 1, 'fields' => 'ids' ) );
	if ( $existing ) {
		return;
	}

	$body = str_repeat( 'テキストが入ります。', 20 ) . "\n\n" . str_repeat( 'テキストが入ります。', 16 ) . "\n\n" . str_repeat( 'テキストが入ります。', 14 );

	for ( $i = 1; $i <= 4; $i++ ) {
		$post_id = wp_insert_post(
			array(
				'post_type'    => 'case',
				'post_status'  => 'publish',
				'post_title'   => str_repeat( '題名が入ります。', 6 ),
				'post_content' => $body,
				'post_date'    => gmdate( 'Y-m-d H:i:s', strtotime( "-$i days" ) ),
			)
		);
		if ( $post_id && ! is_wp_error( $post_id ) ) {
			update_post_meta( $post_id, 'case_tag', '税務顧問' );
			update_post_meta( $post_id, 'case_client', '株式会社○○○様' );
		}
	}
}

/**
 * Sample お知らせ posts (only when none exist yet).
 */
function ludoa_seed_news() {
	$existing = get_posts( array( 'post_type' => 'news', 'post_status' => 'any', 'numberposts' => 1, 'fields' => 'ids' ) );
	if ( $existing ) {
		return;
	}

	wp_insert_post(
		array(
			'post_type'    => 'news',
			'post_status'  => 'publish',
			'post_title'   => '年末年始休業のご案内',
			'post_content' => "平素は格別のご高配を賜り、厚くお礼申し上げます。\n誠に勝手ながら、以下の期間を年末年始休業とさせていただきます。\n\n【年末年始休業期間】\n2025年12月26日(金)〜2026年1月4日(日)\n最終営業日は12月25日(木)でございます。\n休業期間中のお問い合わせにつきましては、1月5日(月)以降に順次回答させていただきます。\n\nご不便をおかけいたしますが、何卒よろしくお願いいたします。\n\n年末ご多忙の折ではございますが、\nみなさまが穏やかな新年を迎えられますようお祈り申し上げます。",
			'post_date'    => '2025-12-01 10:00:00',
		)
	);

	for ( $i = 1; $i <= 2; $i++ ) {
		wp_insert_post(
			array(
				'post_type'    => 'news',
				'post_status'  => 'publish',
				'post_title'   => 'お知らせが入ります',
				'post_content' => str_repeat( 'テキストが入ります。', 9 ),
				'post_date'    => gmdate( 'Y-m-d H:i:s', strtotime( "-$i weeks" ) ),
			)
		);
	}
}
