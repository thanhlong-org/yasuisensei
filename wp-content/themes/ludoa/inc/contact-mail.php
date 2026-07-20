<?php
/**
 * お問い合わせフォーム — mail sending.
 *
 * Builds and sends the two mails for a validated submission: the admin
 * notification and the auto-reply to the visitor. Called from the contact
 * form router in inc/contact-form.php once the confirm step is accepted.
 *
 * @package Ludoa
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Notification recipient (defaults to the site admin email, filterable).
 *
 * @return string
 */
function ludoa_contact_recipient() {
	return apply_filters( 'ludoa_contact_recipient', get_option( 'admin_email' ) );
}

/**
 * Plain-text block echoing the submitted content (shared by both mails).
 *
 * @param array $data Sanitized form data.
 * @return string
 */
function ludoa_contact_mail_body( $data ) {
	$lines = array();
	foreach ( ludoa_contact_fields() as $key => $field ) {
		$lines[] = '■' . $field['label'];
		$lines[] = '' !== $data[ $key ] ? $data[ $key ] : '（未入力）';
		$lines[] = '';
	}
	return implode( "\n", $lines );
}

/**
 * Send the admin notification and the auto-reply to the visitor.
 *
 * @param array $data Sanitized form data.
 * @return bool Whether the admin notification was sent.
 */
function ludoa_contact_send_mails( $data ) {
	$site = wp_specialchars_decode( get_bloginfo( 'name' ), ENT_QUOTES );
	$body = ludoa_contact_mail_body( $data );

	// --- Admin notification -------------------------------------------------
	$admin_subject = sprintf( '【%s】お問い合わせがありました（%s 様）', $site, $data['name'] );
	$admin_body    = "サイトのお問い合わせフォームより、以下の内容が送信されました。\n\n"
		. $body
		. "\n--\n送信日時: " . wp_date( 'Y-m-d H:i' )
		. "\n送信元IP: " . ( isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '' ) . "\n";
	$admin_headers = array( 'Reply-To: ' . $data['name'] . ' <' . $data['email'] . '>' );

	$sent = wp_mail( ludoa_contact_recipient(), $admin_subject, $admin_body, $admin_headers );

	// --- Auto-reply to the visitor ------------------------------------------
	$reply_subject = sprintf( '【%s】お問い合わせありがとうございます', $site );
	$reply_body    = $data['name'] . " 様\n\n"
		. "この度はお問い合わせいただき、誠にありがとうございます。\n"
		. "以下の内容で受け付けました。\n"
		. "内容を確認の上、担当者より2営業日以内にご連絡差し上げます。\n\n"
		. "------------------------------\n"
		. $body
		. "------------------------------\n\n"
		. "※本メールは自動送信です。心当たりのない場合は破棄してください。\n\n"
		. $site . "\n";

	wp_mail( $data['email'], $reply_subject, $reply_body );

	return $sent;
}
