<?php
/**
 * Theme options (Customizer) — contact channels editable from the admin:
 * 外観 → カスタマイズ → お問い合わせ設定.
 *
 * @package Ludoa
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the お問い合わせ設定 section: phone number and LINE add-friend URL.
 *
 * @param WP_Customize_Manager $wp_customize Customizer.
 */
function ludoa_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'ludoa_contact',
		array(
			'title'    => 'お問い合わせ設定',
			'priority' => 30,
		)
	);

	$wp_customize->add_setting(
		'ludoa_tel',
		array(
			'default'           => '03-XXX-XXXX',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'ludoa_tel',
		array(
			'label'       => '電話番号',
			'description' => '表示用の形式で入力してください（例：03-1234-5678）。tel: リンクは数字だけに変換されます。',
			'section'     => 'ludoa_contact',
			'type'        => 'text',
		)
	);

	$wp_customize->add_setting(
		'ludoa_line_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'ludoa_line_url',
		array(
			'label'       => 'LINE 友だち追加URL',
			'description' => '公式LINEの友だち追加リンク（例：https://lin.ee/xxxx）。未設定の間はリンクは「#」のままです。',
			'section'     => 'ludoa_contact',
			'type'        => 'url',
		)
	);
}
add_action( 'customize_register', 'ludoa_customize_register' );

/**
 * Phone number for display (as entered in the Customizer).
 *
 * @return string
 */
function ludoa_tel_display() {
	return get_theme_mod( 'ludoa_tel', '03-XXX-XXXX' );
}

/**
 * tel: href built from the configured number (digits and + only).
 *
 * @return string
 */
function ludoa_tel_href() {
	return 'tel:' . preg_replace( '/[^0-9+]/', '', ludoa_tel_display() );
}

/**
 * LINE add-friend URL ('#' until configured).
 *
 * @return string
 */
function ludoa_line_url() {
	$url = get_theme_mod( 'ludoa_line_url', '' );
	return $url ? $url : '#';
}
