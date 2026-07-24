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
			'rewrite'       => array( 'slug' => 'company/case' ),
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
			'rewrite'       => array( 'slug' => 'news' ),
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

	register_taxonomy(
		'case_service',
		'case',
		array(
			'labels'            => array(
				'name'          => 'サービス種別',
				'singular_name' => 'サービス種別',
			),
			'hierarchical'      => true,
			'public'            => true,
			// Editors pick the service via the SCF select (case_service_slug),
			// which is synced to this taxonomy on save — hide the default UIs.
			'show_in_rest'      => false,
			'meta_box_cb'       => false,
			'show_admin_column' => true,
			'rewrite'           => array( 'slug' => 'case-service' ),
		)
	);

	register_taxonomy(
		'news_tag',
		'news',
		array(
			'labels'            => array(
				'name'          => 'お知らせタグ',
				'singular_name' => 'お知らせタグ',
				'add_new_item'  => 'タグを追加',
				'edit_item'     => 'タグを編集',
			),
			'hierarchical'      => true,
			'public'            => true,
			// Editors pick the tag via the SCF select (news_tag_slug), synced
			// on save — hide the sidebar panel / default meta box.
			'show_in_rest'      => false,
			'meta_box_cb'       => false,
			'show_admin_column' => true,
			'rewrite'           => array( 'slug' => 'news-tag' ),
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
		// ?svc=<slug> — filter the list by service (cs-filter UI). Note:
		// ?service= is taken by the service CPT's own query var.
		if ( ! empty( $_GET['svc'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$query->set(
				'tax_query',
				array(
					array(
						'taxonomy' => 'case_service',
						'field'    => 'slug',
						'terms'    => sanitize_title( wp_unslash( $_GET['svc'] ) ), // phpcs:ignore WordPress.Security
					),
				)
			);
		}
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
		// Service choices for the select: slug => title of the current services.
		$service_choices = array( '' => '— 選択してください —' );
		foreach ( ludoa_services() as $ludoa_service ) {
			$service_choices[ $ludoa_service->post_name ] = get_the_title( $ludoa_service );
		}

		$setting = SCF::add_setting( 'ludoa-case-fields', '事例情報' );
		$setting->add_group(
			'case-meta',
			false,
			array(
				array(
					'name'    => 'case_service_slug',
					'label'   => 'サービス種別',
					'type'    => 'select',
					'choices' => $service_choices,
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

	if ( 'news' === $type ) {
		// Tag choices: slug => name of the current news_tag terms.
		$tag_choices = array();
		foreach ( get_terms( array( 'taxonomy' => 'news_tag', 'hide_empty' => false ) ) as $ludoa_term ) {
			$tag_choices[ $ludoa_term->slug ] = $ludoa_term->name;
		}

		$setting = SCF::add_setting( 'ludoa-news-fields', 'お知らせ情報' );
		$setting->add_group(
			'news-meta',
			false,
			array(
				array(
					'name'        => 'news_tag_slug',
					'label'       => 'タグ',
					'type'        => 'select',
					'choices'     => $tag_choices,
					'default'     => 'news',
					'instruction' => 'タグの追加・名前変更は「お知らせ → お知らせタグ」から行えます。',
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

/**
 * Sync the SCF service select (case_service_slug) to the case_service
 * taxonomy so the archive filter and related-case queries keep working.
 * Runs after SCF has saved its meta (priority 99 > SCF's 10).
 *
 * @param int     $post_id Post id.
 * @param WP_Post $post    Post.
 */
function ludoa_case_service_sync( $post_id, $post ) {
	if ( 'case' !== $post->post_type || ! isset( $_POST['smart-custom-fields'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	$slug = get_post_meta( $post_id, 'case_service_slug', true );
	$term = $slug ? get_term_by( 'slug', $slug, 'case_service' ) : false;
	wp_set_object_terms( $post_id, $term ? (int) $term->term_id : array(), 'case_service' );
}
add_action( 'save_post', 'ludoa_case_service_sync', 99, 2 );

/**
 * Sync the SCF tag select (news_tag_slug) to the news_tag taxonomy.
 * Runs after SCF has saved its meta (priority 99 > SCF's 10).
 *
 * @param int     $post_id Post id.
 * @param WP_Post $post    Post.
 */
function ludoa_news_tag_sync( $post_id, $post ) {
	if ( 'news' !== $post->post_type || ! isset( $_POST['smart-custom-fields'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	$slug = get_post_meta( $post_id, 'news_tag_slug', true );
	$term = $slug ? get_term_by( 'slug', $slug, 'news_tag' ) : false;
	wp_set_object_terms( $post_id, $term ? (int) $term->term_id : array(), 'news_tag' );
}
add_action( 'save_post', 'ludoa_news_tag_sync', 99, 2 );

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
 * Tag label for a case card: the case_service term name, falling back to the
 * old free-text SCF case_tag field.
 *
 * @param int|null $post_id Post id.
 * @return string
 */
function ludoa_case_tag( $post_id = null ) {
	$terms = get_the_terms( $post_id ? $post_id : get_the_ID(), 'case_service' );
	if ( $terms && ! is_wp_error( $terms ) ) {
		return $terms[0]->name;
	}
	return ludoa_scf( 'case_tag', $post_id );
}

/**
 * Tag label for a news item: the first news_tag term name, falling back to
 * the generic お知らせ so the pill is never empty.
 *
 * @param int|null $post_id Post id.
 * @return string
 */
function ludoa_news_tag( $post_id = null ) {
	$terms = get_the_terms( $post_id ? $post_id : get_the_ID(), 'news_tag' );
	return ( $terms && ! is_wp_error( $terms ) ) ? $terms[0]->name : 'お知らせ';
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
 * Third migration: link cases to services via the case_service taxonomy.
 * Creates one term per service post, replaces the old untagged placeholder
 * cases with 3 sample cases per service (the client will overwrite these).
 * Runs once, after the services are seeded.
 */
function ludoa_case_service_migrate() {
	if ( get_option( 'ludoa_case_service_migrated' ) ) {
		return;
	}

	$services = ludoa_services();
	if ( ! $services ) {
		return; // Services not seeded yet — retry on the next load.
	}

	// The first migration's placeholder cases carry no service — replace them.
	$placeholder_title = str_repeat( '題名が入ります。', 6 );
	foreach ( get_posts( array( 'post_type' => 'case', 'post_status' => 'any', 'numberposts' => -1 ) ) as $old ) {
		if ( $old->post_title === $placeholder_title && ! get_the_terms( $old->ID, 'case_service' ) ) {
			wp_trash_post( $old->ID );
		}
	}

	$body = str_repeat( 'テキストが入ります。', 20 ) . "\n\n" . str_repeat( 'テキストが入ります。', 16 ) . "\n\n" . str_repeat( 'テキストが入ります。', 14 );

	foreach ( $services as $si => $service ) {
		// Term slug mirrors the service post slug so templates can match them.
		$term    = term_exists( $service->post_name, 'case_service' );
		$term_id = $term ? (int) $term['term_id'] : 0;
		if ( ! $term_id ) {
			$inserted = wp_insert_term( get_the_title( $service ), 'case_service', array( 'slug' => $service->post_name ) );
			if ( is_wp_error( $inserted ) ) {
				continue;
			}
			$term_id = (int) $inserted['term_id'];
		}

		for ( $i = 1; $i <= 3; $i++ ) {
			$post_id = wp_insert_post(
				array(
					'post_type'    => 'case',
					'post_status'  => 'publish',
					'post_title'   => $placeholder_title,
					'post_content' => $body,
					'post_date'    => gmdate( 'Y-m-d H:i:s', strtotime( '-' . ( $si * 3 + $i ) . ' days' ) ),
				)
			);
			if ( $post_id && ! is_wp_error( $post_id ) ) {
				wp_set_object_terms( $post_id, $term_id, 'case_service' );
				update_post_meta( $post_id, 'case_service_slug', $service->post_name );
				update_post_meta( $post_id, 'case_tag', get_the_title( $service ) );
				update_post_meta( $post_id, 'case_client', '株式会社○○○様' );
			}
		}
	}

	flush_rewrite_rules();
	update_option( 'ludoa_case_service_migrated', 1 );
}
add_action( 'init', 'ludoa_case_service_migrate', 22 );

/**
 * Back-fill the SCF select meta (case_service_slug) from the taxonomy for
 * cases created before the select existed. Runs once.
 */
function ludoa_case_service_select_migrate() {
	if ( get_option( 'ludoa_case_service_select_migrated' ) ) {
		return;
	}

	foreach ( get_posts( array( 'post_type' => 'case', 'post_status' => 'any', 'numberposts' => -1 ) ) as $case ) {
		if ( get_post_meta( $case->ID, 'case_service_slug', true ) ) {
			continue;
		}
		$terms = get_the_terms( $case->ID, 'case_service' );
		if ( $terms && ! is_wp_error( $terms ) ) {
			update_post_meta( $case->ID, 'case_service_slug', $terms[0]->slug );
		}
	}

	update_option( 'ludoa_case_service_select_migrated', 1 );
}
add_action( 'init', 'ludoa_case_service_select_migrate', 23 );

/**
 * Seed the news_tag taxonomy: default terms, existing untagged news posts
 * get お知らせ (the year-end sample gets 重要 to show variety). Runs once.
 */
function ludoa_news_tag_migrate() {
	if ( get_option( 'ludoa_news_tag_migrated' ) ) {
		return;
	}

	$default_id = 0;
	foreach ( array( 'お知らせ' => 'news', '重要' => 'important' ) as $name => $slug ) {
		$term    = term_exists( $slug, 'news_tag' );
		$term_id = $term ? (int) $term['term_id'] : 0;
		if ( ! $term_id ) {
			$inserted = wp_insert_term( $name, 'news_tag', array( 'slug' => $slug ) );
			$term_id  = is_wp_error( $inserted ) ? 0 : (int) $inserted['term_id'];
		}
		if ( 'news' === $slug ) {
			$default_id = $term_id;
		}
	}

	if ( $default_id ) {
		foreach ( get_posts( array( 'post_type' => 'news', 'post_status' => 'any', 'numberposts' => -1 ) ) as $news ) {
			if ( ! get_the_terms( $news->ID, 'news_tag' ) ) {
				wp_set_object_terms( $news->ID, $default_id, 'news_tag' );
			}
		}
	}

	flush_rewrite_rules();
	update_option( 'ludoa_news_tag_migrated', 1 );
}
add_action( 'init', 'ludoa_news_tag_migrate', 24 );

/**
 * Back-fill the SCF tag select meta (news_tag_slug) from the taxonomy so the
 * edit screen shows the current tag preselected. Runs once.
 */
function ludoa_news_tag_select_migrate() {
	if ( get_option( 'ludoa_news_tag_select_migrated' ) ) {
		return;
	}

	foreach ( get_posts( array( 'post_type' => 'news', 'post_status' => 'any', 'numberposts' => -1 ) ) as $news ) {
		if ( get_post_meta( $news->ID, 'news_tag_slug', true ) ) {
			continue;
		}
		$terms = get_the_terms( $news->ID, 'news_tag' );
		if ( $terms && ! is_wp_error( $terms ) ) {
			update_post_meta( $news->ID, 'news_tag_slug', $terms[0]->slug );
		}
	}

	update_option( 'ludoa_news_tag_select_migrated', 1 );
}
add_action( 'init', 'ludoa_news_tag_select_migrate', 25 );

/**
 * Seed the service-detail SCF content (支援内容 / 解決できる課題 / ご利用の流れ) for
 * each service, so a fresh deploy (e.g. production) has the copy without hand
 * entry. Idempotent: skips any service that already has 支援内容 data, so it
 * never clobbers edits made from the SCF screen. Runs once (option flag), and
 * only after the services exist so it can match them by slug.
 */
function ludoa_service_scf_migrate() {
	if ( get_option( 'ludoa_service_scf_migrated' ) ) {
		return;
	}
	if ( ! ludoa_services() ) {
		return; // Services not seeded yet — retry on the next load.
	}

	$data = array(
		'advisory'     => array(
			'support' => array( '定期的な打ち合わせ', '税務相談', '経営分析、財務分析', '試算表の作成', '資金繰表の作成', '融資相談' ),
			'issues'  => array( '税金や財務の相談相手がいない', '自社の状況や資金繰りが不明', '融資や資金調達の進め方が不安', '数字の管理で経営に集中できない' ),
			'flow'    => array(
				array( '商談', "経営方針や企業理念、将来のビジョンについての共有。\n現状の課題や悩みについての把握と解決に向けての提案。\nサービス内容のお知らせ。\n御見積書の作成。※" ),
				array( '顧問契約の締結', '顧問契約書の作成と電子契約完了までのプロセスの説明。' ),
				array( '定期的な打ち合わせ', "経営分析、財務分析の報告\n試算表の作成\n資金繰表の作成" ),
			),
		),
		'accounting'   => array(
			'support' => array( '各種記帳代行資料の整理、入力', '決算報告書の作成' ),
			'issues'  => array( '面倒な帳簿付けに時間を取られる', '経理知識がなく処理が不安', '経理の採用や人件費を抑えたい', '決算時期の書類準備で焦る' ),
			'flow'    => array(
				array( '商談', "事業概要（業種・業態、規模）の共有。\n納品までのプロセスの説明。\nサービス内容のお知らせ。\n御見積書の作成。※" ),
				array( '記帳代行', "必要資料、書類の共有。\nお取引内容の精査。" ),
				array( '納品', '試算表の作成。' ),
			),
		),
		'tax-return'   => array(
			'support' => array( '法人税申告書の作成', '地方税申告書の作成', '所得税申告書の作成', '消費税申告書の作成', '相続税申告書の作成', '事業所税申告書の作成' ),
			'issues'  => array( '申告書類の作成や計算が分からない', '申告ミスや罰則への不安がある', '申告手続きで本業が止まる', '各種税金の対応手順に迷う' ),
			'flow'    => array(
				array( '商談', "事業概要（業種・業態、規模）の共有。\n電子申告完了までのプロセスの説明。\nサービス内容のお知らせ。\n御見積書の作成。※" ),
				array( '申告書作成', "必要資料、書類の共有。\n申告書の作成開始\n申告書の作成完了の通知と決算報告。" ),
				array( '電子申告', "納税方法の案内。\n申告書の送信完了の報告と共有" ),
			),
		),
		'payroll'      => array(
			'support' => array( '給与、賞与の計算', '給与明細書、賞与明細書の作成' ),
			'issues'  => array( '毎月の給与計算の手間を減らしたい', '手計算による計算ミスが不安', '法改正や保険料の変更に対応できない', '給与情報の社内漏洩を防ぎたい' ),
			'flow'    => array(
				array( '商談', "事業概要（業種・業態、人員）の共有。\n納品完了までの説明。\nサービス詳細のお知らせ。\n御見積書の作成。※" ),
				array( '給与計算、賞与計算', "必要資料、書類の共有。\n給与計算、賞与計算開始。" ),
				array( '納品', '給与明細書、賞与明細書の共有。' ),
			),
		),
		'startup'      => array(
			'support' => array( '法人設立のご案内', '各種届出書の作成' ),
			'issues'  => array( '設立に必要な手続きが分からない', '提出すべき各種届出書に迷う', '創業期の資金調達や融資が不安', '本業準備で設立手続きの手が回らない' ),
			'flow'    => array(
				array( '商談', "法人設立に伴う課題や悩みについての把握と解決に向けての提案。\nサービス内容のお知らせ。\n御見積書の作成。" ),
				array( '法人設立完了前', "必要資料、書類の共有。\n資本金のお振込。" ),
				array( '法人設立完了後', "謄本、定款の共有。\n各種届出書の作成。\n融資の相談。" ),
			),
		),
		'tax-planning' => array(
			'support' => array( '納税予測', '各種節税商品のご案内' ),
			'issues'  => array( '税金がいくらかかるか予想できない', '自社に合う節税方法が分からない', '手元に残る資金を最大化したい', '無計画な急な納税で焦りたくない' ),
			'flow'    => array(
				array( '現状の課題や悩みについての把握', "資金繰表を活用した納税予測。\n各種節税商品の案内。" ),
			),
		),
	);

	foreach ( $data as $slug => $d ) {
		$posts = get_posts(
			array(
				'post_type'      => 'service',
				'name'           => $slug,
				'post_status'    => 'any',
				'posts_per_page' => 1,
			)
		);
		if ( ! $posts ) {
			continue;
		}
		$id = $posts[0]->ID;

		// Never clobber content already entered from the SCF screen.
		if ( get_post_meta( $id, 'support_name', true ) ) {
			continue;
		}

		foreach ( $d['support'] as $v ) {
			add_post_meta( $id, 'support_name', $v );
		}
		foreach ( $d['issues'] as $v ) {
			add_post_meta( $id, 'issue_text', $v );
		}
		foreach ( $d['flow'] as $step ) {
			add_post_meta( $id, 'flow_title', $step[0] );
			add_post_meta( $id, 'flow_desc', $step[1] );
		}
	}

	update_option( 'ludoa_service_scf_migrated', 1 );
}
add_action( 'init', 'ludoa_service_scf_migrate', 26 );

/**
 * ディレクトリマップ routing: nest the company sub-pages under /company and give
 * the privacy page its /privacy-policy slug. The CPT slug changes (news→/news,
 * case→/company/case) are declared in the register calls; this migration just
 * moves the fixed pages and flushes so every URL matches the spec sheet.
 * Runs once (option flag).
 */
function ludoa_dirmap_migrate() {
	if ( get_option( 'ludoa_dirmap_migrated' ) ) {
		return;
	}

	// Nest 私たちの強み / 代表あいさつ / 事務所概要 under 企業情報 → /company/<slug>.
	$company = get_page_by_path( 'company' );
	if ( $company ) {
		foreach ( array( 'features', 'message', 'office' ) as $child_slug ) {
			$child = get_page_by_path( $child_slug );
			if ( $child && (int) $child->post_parent !== (int) $company->ID ) {
				wp_update_post(
					array(
						'ID'          => $child->ID,
						'post_parent' => $company->ID,
					)
				);
			}
		}
	}

	// プライバシーポリシー: /privacy → /privacy-policy.
	$privacy = get_page_by_path( 'privacy' );
	if ( $privacy && 'privacy-policy' !== $privacy->post_name ) {
		wp_update_post(
			array(
				'ID'        => $privacy->ID,
				'post_name' => 'privacy-policy',
			)
		);
	}

	flush_rewrite_rules();
	update_option( 'ludoa_dirmap_migrated', 1 );
}
add_action( 'init', 'ludoa_dirmap_migrate', 27 );

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
