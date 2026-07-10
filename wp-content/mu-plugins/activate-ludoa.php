<?php
/**
 * Plugin Name: Activate Ludoa Theme
 * Description: Ensures the Ludoa theme is always the active theme (self-heals after a fresh install or DB import).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'init', function () {
	if ( 'ludoa' === get_option( 'template' ) && 'ludoa' === get_option( 'stylesheet' ) ) {
		return;
	}

	if ( wp_get_theme( 'ludoa' )->exists() ) {
		switch_theme( 'ludoa' );
	}
} );
