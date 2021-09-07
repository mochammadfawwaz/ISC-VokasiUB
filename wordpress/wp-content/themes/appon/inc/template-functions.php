<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package appon
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function appon_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( ! is_user_logged_in() && ! empty( appon_global_var( 'coming_soon_switch', '', false ) ) ) {
		$classes[] = 'rt-coming-soon';
		if ( ! empty( appon_global_var( 'coming_soon_custom_background_style', '', false ) ) ) {
			$classes[] = 'coming-soon-' . appon_global_var( 'coming_soon_custom_background_style', '', false );
		}
	} elseif ( ! is_user_logged_in() && ! empty( appon_global_var( 'maintenance_mode_switch', '', false ) ) ) {
		$classes[] = 'rt-maintenance-mode';
	} elseif ( ! is_user_logged_in() && ! empty( appon_global_var( 'coming_soon_switch', '', false ) ) && ! empty( appon_global_var( 'maintenance_mode_switch', '', false ) ) ) {
		$classes[] = 'rt-coming-soon';
	}

	if ( is_404() && ! empty( appon_global_var( 'error_custom_background_style', '', false ) ) ) {
		$classes[] = 'error-404-' . appon_global_var( 'error_custom_background_style', '', false );
	}
	
	if ( ! empty( appon_global_var( 'scrollbar_switch', '', false ) ) ) {
		$classes[] = 'infinity-scroll';
	}

	return $classes;
}
add_filter( 'body_class', 'appon_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function appon_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'appon_pingback_header' );
