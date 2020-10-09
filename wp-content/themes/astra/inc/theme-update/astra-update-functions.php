<?php
/**
 * Astra Updates
 *
 * Functions for updating data, used by the background updater.
 *
 * @package Astra
 * @version 2.1.3
 */

defined( 'ABSPATH' ) || exit;

/**
 * Open Submenu just below menu for existing users.
 *
 * @since 2.1.3
 * @return void
 */
function astra_submenu_below_header() {
	$theme_options = get_option( 'astra-settings' );

	// Set flag to use flex align center css to open submenu just below menu.
	if ( ! isset( $theme_options['submenu-open-below-header'] ) ) {
		$theme_options['submenu-open-below-header'] = false;
		update_option( 'astra-settings', $theme_options );
	}
}

/**
 * Do not apply new default colors to the Elementor & Gutenberg Buttons for existing users.
 *
 * @since 2.2.0
 *
 * @return void
 */
function astra_page_builder_button_color_compatibility() {
	$theme_options = get_option( 'astra-settings', array() );

	// Set flag to not load button specific CSS.
	if ( ! isset( $theme_options['pb-button-color-compatibility'] ) ) {
		$theme_options['pb-button-color-compatibility'] = false;
		update_option( 'astra-settings', $theme_options );
	}
}

/**
 * Migrate option data from button vertical & horizontal padding to the new responsive padding param.
 *
 * @since 2.2.0
 *
 * @return void
 */
function astra_vertical_horizontal_padding_migration() {
	$theme_options = get_option( 'astra-settings', array() );

	$btn_vertical_padding   = isset( $theme_options['button-v-padding'] ) ? $theme_options['button-v-padding'] : 10;
	$btn_horizontal_padding = isset( $theme_options['button-h-padding'] ) ? $theme_options['button-h-padding'] : 40;

	if ( false === astra_get_db_option( 'theme-button-padding', false ) ) {

		error_log( sprintf( 'Astra: Migrating vertical Padding - %s', $btn_vertical_padding ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
		error_log( sprintf( 'Astra: Migrating horizontal Padding - %s', $btn_horizontal_padding ) ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
		// Migrate button vertical padding to the new padding param for button.
		$theme_options['theme-button-padding'] = array(
			'desktop'      => array(
				'top'    => $btn_vertical_padding,
				'right'  => $btn_horizontal_padding,
				'bottom' => $btn_vertical_padding,
				'left'   => $btn_horizontal_padding,
			),
			'tablet'       => array(
				'top'    => '',
				'right'  => '',
				'bottom' => '',
				'left'   => '',
			),
			'mobile'       => array(
				'top'    => '',
				'right'  => '',
				'bottom' => '',
				'left'   => '',
			),
			'desktop-unit' => 'px',
			'tablet-unit'  => 'px',
			'mobile-unit'  => 'px',
		);

		update_option( 'astra-settings', $theme_options );
	}
}

/**
 * Migrate option data from button url to the new link param.
 *
 * @since 2.3.0
 *
 * @return void
 */
function astra_header_button_new_options() {

	$theme_options = get_option( 'astra-settings', array() );

	$btn_url = isset( $theme_options['header-main-rt-section-button-link'] ) ? $theme_options['header-main-rt-section-button-link'] : 'https://www.wpastra.com';
	error_log( 'Astra: Migrating button url - ' . $btn_url ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
	$theme_options['header-main-rt-section-button-link-option'] = array(
		'url'      => $btn_url,
		'new_tab'  => false,
		'link_rel' => '',
	);

	update_option( 'astra-settings', $theme_options );

}

/**
 * For existing users, do not provide Elementor Default Color Typo settings compatibility by default.
 *
 * @since 2.3.3
 *
 * @return void
 */
function astra_elementor_default_color_typo_comp() {

	$theme_options = get_option( 'astra-settings', array() );

	// Set flag to not load button specific CSS.
	if ( ! isset( $theme_options['ele-default-color-typo-setting-comp'] ) ) {
		$theme_options['ele-default-color-typo-setting-comp'] = false;
		update_option( 'astra-settings', $theme_options );
	}

}

/**
 * For existing users, change the separator from html entity to css entity.
 *
 * @since 2.3.4
 *
 * @return void
 */
function astra_breadcrumb_separator_fix() {

	$theme_options = get_option( 'astra-settings', array() );

	// Check if the saved database value for Breadcrumb Separator is "&#187;", then change it to '\00bb'.
	if ( isset( $theme_options['breadcrumb-separator'] ) && '&#187;' === $theme_options['breadcrumb-separator'] ) {
		$theme_options['breadcrumb-separator'] = '\00bb';
		update_option( 'astra-settings', $theme_options );
	}
}

/**
 * Check if we need to change the default value for tablet breakpoint.
 *
 * @since 2.4.0
 * @return void
 */
function astra_update_theme_tablet_breakpoint() {

	$theme_options = get_option( 'astra-settings' );

	if ( ! isset( $theme_options['can-update-theme-tablet-breakpoint'] ) ) {
		// Set a flag to check if we need to change the theme tablet breakpoint value.
		$theme_options['can-update-theme-tablet-breakpoint'] = false;
	}

	update_option( 'astra-settings', $theme_options );
}

/**
 * Migrate option data from site layout background option to its desktop counterpart.
 *
 * @since 2.4.0
 *
 * @return void
 */
function astra_responsive_base_background_option() {

	$theme_options = get_option( 'astra-settings', array() );

	if ( false === get_option( 'site-layout-outside-bg-obj-responsive', false ) && isset( $theme_options['site-layout-outside-bg-obj'] ) ) {

		$theme_options['site-layout-outside-bg-obj-responsive']['desktop'] = $theme_options['site-layout-outside-bg-obj'];
		$theme_options['site-layout-outside-bg-obj-responsive']['tablet']  = array(
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		);
		$theme_options['site-layout-outside-bg-obj-responsive']['mobile']  = array(
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		);
	}

	update_option( 'astra-settings', $theme_options );
}

/**
 * Do not apply new wide/full image CSS for existing users.
 *
 * @since 2.4.4
 *
 * @return void
 */
function astra_gtn_full_wide_image_group_css() {

	$theme_options = get_option( 'astra-settings', array() );

	// Set flag to not load button specific CSS.
	if ( ! isset( $theme_options['gtn-full-wide-image-grp-css'] ) ) {
		$theme_options['gtn-full-wide-image-grp-css'] = false;
		update_option( 'astra-settings', $theme_options );
	}
}

/**
 * Do not apply new wide/full Group and Cover block CSS for existing users.
 *
 * @since 2.5.0
 *
 * @return void
 */
function astra_gtn_full_wide_group_cover_css() {
	$theme_options = get_option( 'astra-settings', array() );

	if ( ! isset( $theme_options['gtn-full-wide-grp-cover-css'] ) ) {
		$theme_options['gtn-full-wide-grp-cover-css'] = false;
		update_option( 'astra-settings', $theme_options );
	}
}


/**
 * Do not apply the global border width and border color setting for the existng users.
 *
 * @since 2.5.0
 *
 * @return void
 */
function astra_global_button_woo_css() {
	$theme_options = get_option( 'astra-settings', array() );

	// Set flag to not load button specific CSS.
	if ( ! isset( $theme_options['global-btn-woo-css'] ) ) {
		$theme_options['global-btn-woo-css'] = false;
		update_option( 'astra-settings', $theme_options );
	}
}

/**
 * Migrate Footer Widget param to array.
 *
 * @since 2.5.2
 *
 * @return void
 */
function astra_footer_widget_bg() {
	$theme_options = get_option( 'astra-settings', array() );

	// Check if Footer Backgound array is already set or not. If not then set it as array.
	if ( isset( $theme_options['footer-adv-bg-obj'] ) && ! is_array( $theme_options['footer-adv-bg-obj'] ) ) {
		error_log( 'Astra: Migrating Footer BG option to array.' ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
		$theme_options['footer-adv-bg-obj'] = array(
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		);
		update_option( 'astra-settings', $theme_options );
	}
}
