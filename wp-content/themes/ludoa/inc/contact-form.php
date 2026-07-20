<?php
/**
 * お問い合わせフォーム — validation and confirm flow (mail sending: inc/contact-mail.php).
 *
 * Flow: /contact/ (入力) → POST → /contact-confirm/ (内容確認) → POST →
 * wp_mail() → /contact-complete/ (完了). Input is carried between the steps
 * in a PHP session so the confirm page can render it and the complete page
 * can be guarded against direct access.
 *
 * @package Ludoa
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Session keys. */
define( 'LUDOA_CONTACT_SESSION_KEY', 'ludoa_contact' );
define( 'LUDOA_CONTACT_SENT_KEY', 'ludoa_contact_sent' );

/** Nonce action / field name. */
define( 'LUDOA_CONTACT_NONCE_ACTION', 'ludoa_contact_submit' );
define( 'LUDOA_CONTACT_NONCE_FIELD', 'ludoa_contact_nonce' );

/**
 * Field definitions: key => [ label, required ].
 *
 * @return array
 */
function ludoa_contact_fields() {
	return array(
		'name'    => array( 'label' => '名前', 'required' => true ),
		'kana'    => array( 'label' => 'ふりがな', 'required' => true ),
		'tel'     => array( 'label' => '電話番号', 'required' => true ),
		'email'   => array( 'label' => 'メールアドレス', 'required' => true ),
		'type'    => array( 'label' => 'お問い合わせ種別', 'required' => true ),
		'message' => array( 'label' => 'ご質問・その他', 'required' => false ),
	);
}

/**
 * Start a PHP session on the front end (needed to carry form data between steps).
 */
function ludoa_contact_session_start() {
	if ( is_admin() || wp_doing_ajax() || wp_doing_cron() ) {
		return;
	}
	if ( PHP_SESSION_NONE === session_status() && ! headers_sent() ) {
		session_start();
	}
}
add_action( 'init', 'ludoa_contact_session_start', 1 );

/**
 * Sanitized form data currently held in the session.
 *
 * @return array
 */
function ludoa_contact_data() {
	return isset( $_SESSION[ LUDOA_CONTACT_SESSION_KEY ]['data'] )
		? (array) $_SESSION[ LUDOA_CONTACT_SESSION_KEY ]['data']
		: array();
}

/**
 * Validation errors currently held in the session ( key => message ).
 *
 * @return array
 */
function ludoa_contact_errors() {
	return isset( $_SESSION[ LUDOA_CONTACT_SESSION_KEY ]['errors'] )
		? (array) $_SESSION[ LUDOA_CONTACT_SESSION_KEY ]['errors']
		: array();
}

/**
 * Previously entered value for an input (repopulation on validation error).
 *
 * @param string $key Field key.
 * @return string
 */
function ludoa_contact_old( $key ) {
	$data = ludoa_contact_data();
	return isset( $data[ $key ] ) ? $data[ $key ] : '';
}

/**
 * Echo the inline error message for a field, if any.
 *
 * @param string $key Field key.
 */
function ludoa_contact_field_error( $key ) {
	$errors = ludoa_contact_errors();
	if ( isset( $errors[ $key ] ) ) {
		echo '<p class="contact-form__error" role="alert">' . esc_html( $errors[ $key ] ) . '</p>';
	}
}

/**
 * Sanitize the posted fields.
 *
 * @return array
 */
function ludoa_contact_collect() {
	$data = array();
	foreach ( ludoa_contact_fields() as $key => $field ) {
		$raw          = isset( $_POST[ $key ] ) ? wp_unslash( $_POST[ $key ] ) : '';
		$data[ $key ] = ( 'message' === $key )
			? sanitize_textarea_field( $raw )
			: sanitize_text_field( $raw );
	}
	return $data;
}

/**
 * Validate sanitized data.
 *
 * @param array $data Sanitized form data.
 * @return array key => error message.
 */
function ludoa_contact_validate( $data ) {
	$errors = array();

	foreach ( ludoa_contact_fields() as $key => $field ) {
		if ( $field['required'] && '' === trim( $data[ $key ] ) ) {
			$errors[ $key ] = $field['label'] . 'を入力してください。';
		}
	}

	if ( empty( $errors['email'] ) && '' !== $data['email'] && ! is_email( $data['email'] ) ) {
		$errors['email'] = 'メールアドレスの形式が正しくありません。';
	}

	if ( empty( $errors['tel'] ) && '' !== $data['tel'] && ! preg_match( '/\A[0-9０-９+\-() ]{8,20}\z/u', $data['tel'] ) ) {
		$errors['tel'] = '電話番号の形式が正しくありません。';
	}

	return $errors;
}

/**
 * Handle POSTs and guard direct access to the confirm / complete pages.
 */
function ludoa_contact_router() {
	// --- POST handling ------------------------------------------------------
	if ( isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === $_SERVER['REQUEST_METHOD'] && isset( $_POST['ludoa_contact_step'] ) ) {

		if ( ! isset( $_POST[ LUDOA_CONTACT_NONCE_FIELD ] )
			|| ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST[ LUDOA_CONTACT_NONCE_FIELD ] ) ), LUDOA_CONTACT_NONCE_ACTION ) ) {
			wp_safe_redirect( ludoa_url( 'contact' ) );
			exit;
		}

		$step = sanitize_key( wp_unslash( $_POST['ludoa_contact_step'] ) );

		if ( 'confirm' === $step ) {
			// Honeypot: bots fill the hidden field — pretend success, send nothing.
			if ( ! empty( $_POST['ludoa_hp'] ) ) {
				$_SESSION[ LUDOA_CONTACT_SENT_KEY ] = true;
				wp_safe_redirect( ludoa_url( 'contact-complete' ) . '#contact-form' );
				exit;
			}

			$data   = ludoa_contact_collect();
			$errors = ludoa_contact_validate( $data );

			$_SESSION[ LUDOA_CONTACT_SESSION_KEY ] = array(
				'data'   => $data,
				'errors' => $errors,
			);

			wp_safe_redirect( ludoa_url( $errors ? 'contact' : 'contact-confirm' ) . '#contact-form' );
			exit;
		}

		if ( 'back' === $step ) {
			// Keep the entered data so the inputs come back filled.
			wp_safe_redirect( ludoa_url( 'contact' ) . '#contact-form' );
			exit;
		}

		if ( 'send' === $step ) {
			$data = ludoa_contact_data();
			if ( ! $data || ludoa_contact_validate( $data ) ) {
				wp_safe_redirect( ludoa_url( 'contact' ) . '#contact-form' );
				exit;
			}

			ludoa_contact_send_mails( $data );

			unset( $_SESSION[ LUDOA_CONTACT_SESSION_KEY ] );
			$_SESSION[ LUDOA_CONTACT_SENT_KEY ] = true;

			wp_safe_redirect( ludoa_url( 'contact-complete' ) . '#contact-form' );
			exit;
		}
	}

	// --- Direct-access guards -----------------------------------------------
	if ( is_page( 'contact-confirm' ) && ( ! ludoa_contact_data() || ludoa_contact_errors() ) ) {
		wp_safe_redirect( ludoa_url( 'contact' ) );
		exit;
	}

	if ( is_page( 'contact-complete' ) ) {
		if ( empty( $_SESSION[ LUDOA_CONTACT_SENT_KEY ] ) ) {
			wp_safe_redirect( ludoa_url( 'contact' ) );
			exit;
		}
		unset( $_SESSION[ LUDOA_CONTACT_SENT_KEY ] );
	}

	// Once the input page has rendered its errors, drop them so a reload starts clean.
	if ( is_page( 'contact' ) && ludoa_contact_errors() ) {
		add_action( 'wp_footer', function () {
			if ( isset( $_SESSION[ LUDOA_CONTACT_SESSION_KEY ] ) ) {
				$_SESSION[ LUDOA_CONTACT_SESSION_KEY ]['errors'] = array();
			}
		} );
	}
}
add_action( 'template_redirect', 'ludoa_contact_router' );

/**
 * Small additions the static CSS does not cover: error text, invalid inputs,
 * <button> reset so submit buttons render like the .detail-btn links.
 */
function ludoa_contact_inline_css() {
	$css = '
	#contact-form{scroll-margin-top:calc(var(--header-h-pc, 90px) + 24px)}
	@media (max-width:767px){#contact-form{scroll-margin-top:calc(var(--header-h-sp, 60px) + 16px)}}
	.contact-form__error{margin-top:6px;font-size:13px;color:#c0392b}
	.contact-form__field input.is-invalid,.contact-form__field textarea.is-invalid{border-color:#c0392b}
	.contact-form__errors{margin:0 0 32px;padding:16px 20px;border:1px solid #c0392b;color:#c0392b;font-size:14px}
	.contact-form__errors li{list-style:none}
	button.detail-btn{background:none;border:0;padding:0;cursor:pointer;font:inherit;color:inherit;text-align:inherit;width:100%}
	form.confirm-actions{display:flex;flex-direction:column;align-items:center;gap:24px}
	.confirm-actions__back{background:none;border:0;padding:0;cursor:pointer;font:inherit;font-size:14px;color:inherit;text-decoration:underline;text-underline-offset:4px}
	.ludoa-hp{position:absolute!important;left:-9999px!important;width:1px;height:1px;overflow:hidden}
	';
	wp_add_inline_style( 'ludoa-common', $css );
}
add_action( 'wp_enqueue_scripts', 'ludoa_contact_inline_css', 20 );
