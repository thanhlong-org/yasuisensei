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

	// Contact modal flow (入力 → 確認 → 完了, AJAX submit).
	wp_enqueue_script( 'ludoa-contact', "$js/contact.js", array(), LUDOA_VERSION, true );
	wp_localize_script(
		'ludoa-contact',
		'ludoaContact',
		array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'ludoa_contact' ),
		)
	);
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

/* ============================================================
 * Contact flow: single modal, 入力 → 確認 → 完了 (AJAX submit)
 * ============================================================ */

/**
 * Stylesheet for the contact modal steps (confirm / thankyou).
 */
function ludoa_contact_styles() {
	wp_enqueue_style(
		'ludoa-contact-pages',
		get_template_directory_uri() . '/assets/css/contact-pages.css',
		array( 'ludoa-modal' ),
		LUDOA_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'ludoa_contact_styles', 20 );

/**
 * Sanitize raw contact input into a normalized field set.
 *
 * @param array $src Raw $_POST.
 * @return array
 */
function ludoa_contact_sanitize( $src ) {
	// Fields are prefixed `ludoa_` to avoid collision with reserved WP query
	// vars (notably `name`, which would hijack the main query and 404 the page).
	return array(
		'name'         => isset( $src['ludoa_name'] ) ? sanitize_text_field( wp_unslash( $src['ludoa_name'] ) ) : '',
		'email'        => isset( $src['ludoa_email'] ) ? sanitize_email( wp_unslash( $src['ludoa_email'] ) ) : '',
		'tel'          => isset( $src['ludoa_tel'] ) ? sanitize_text_field( wp_unslash( $src['ludoa_tel'] ) ) : '',
		'subject_type' => isset( $src['ludoa_subject_type'] ) ? sanitize_text_field( wp_unslash( $src['ludoa_subject_type'] ) ) : '',
		'message'      => isset( $src['ludoa_message'] ) ? sanitize_textarea_field( wp_unslash( $src['ludoa_message'] ) ) : '',
		'agree'        => empty( $src['ludoa_agree'] ) ? '' : '1',
	);
}

/**
 * Validate sanitized contact data. Returns array of field keys that failed.
 *
 * @param array $d Sanitized data.
 * @return array
 */
function ludoa_contact_validate( $d ) {
	$errors = array();
	if ( '' === $d['name'] ) {
		$errors[] = 'name';
	}
	if ( '' === $d['email'] || ! is_email( $d['email'] ) ) {
		$errors[] = 'email';
	}
	if ( '' === $d['tel'] ) {
		$errors[] = 'tel';
	}
	if ( '' === $d['subject_type'] ) {
		$errors[] = 'subject_type';
	}
	if ( '1' !== $d['agree'] ) {
		$errors[] = 'agree';
	}
	return $errors;
}

/**
 * Human label for each field (Japanese).
 *
 * @return array
 */
function ludoa_contact_labels() {
	return array(
		'subject_type' => 'お問い合わせ内容の種類',
		'name'         => 'お名前',
		'email'        => 'メールアドレス',
		'tel'          => 'お電話番号',
		'message'      => 'ご質問・ご要望',
	);
}

/**
 * AJAX submit handler. Validates, mails, returns JSON.
 */
function ludoa_contact_submit() {
	if ( ! isset( $_POST['nonce'] )
		|| ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'ludoa_contact' ) ) {
		wp_send_json_error( array( 'message' => 'invalid_nonce' ), 403 );
	}

	$data   = ludoa_contact_sanitize( $_POST );
	$errors = ludoa_contact_validate( $data );
	if ( $errors ) {
		wp_send_json_error(
			array(
				'message' => 'validation_failed',
				'fields'  => $errors,
			),
			422
		);
	}

	$to      = get_option( 'admin_email' );
	$subject = '【お問い合わせ】' . $data['subject_type'];
	$body    = "お問い合わせを受け付けました。\n\n";
	foreach ( ludoa_contact_labels() as $key => $label ) {
		$body .= $label . "：\n" . ( '' !== $data[ $key ] ? $data[ $key ] : '（なし）' ) . "\n\n";
	}
	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		'Reply-To: ' . $data['name'] . ' <' . $data['email'] . '>',
	);
	wp_mail( $to, $subject, $body, $headers );

	wp_send_json_success( array( 'message' => 'ok' ) );
}
add_action( 'wp_ajax_ludoa_contact_submit', 'ludoa_contact_submit' );
add_action( 'wp_ajax_nopriv_ludoa_contact_submit', 'ludoa_contact_submit' );
