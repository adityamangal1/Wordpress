<?php
/**
 * Custom Styling output for Astra Theme.
 *
 * @package     Astra
 * @subpackage  Class
 * @author      Astra
 * @copyright   Copyright (c) 2020, Astra
 * @link        https://wpastra.com/
 * @since       Astra 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Dynamic CSS
 */
if ( ! class_exists( 'Astra_Dynamic_CSS' ) ) {

	/**
	 * Dynamic CSS
	 */
	class Astra_Dynamic_CSS {

		/**
		 * Return CSS Output
		 *
		 * @param  string $dynamic_css          Astra Dynamic CSS.
		 * @param  string $dynamic_css_filtered Astra Dynamic CSS Filters.
		 * @return string Generated CSS.
		 */
		public static function return_output( $dynamic_css, $dynamic_css_filtered = '' ) {

			/**
			 *
			 * Contents
			 * - Variable Declaration
			 * - Global CSS
			 * - Typography
			 * - Page Layout
			 *   - Sidebar Positions CSS
			 *      - Full Width Layout CSS
			 *   - Fluid Width Layout CSS
			 *   - Box Layout CSS
			 *   - Padded Layout CSS
			 * - Blog
			 *   - Single Blog
			 * - Typography of Headings
			 * - Header
			 * - Footer
			 *   - Main Footer CSS
			 *     - Small Footer CSS
			 * - 404 Page
			 * - Secondary
			 * - Global CSS
			 */

			/**
			 * - Variable Declaration
			 */
			$is_site_rtl        = is_rtl();
			$site_content_width = astra_get_option( 'site-content-width', 1200 );
			$header_logo_width  = astra_get_option( 'ast-header-responsive-logo-width' );

			// Site Background Color.
			$box_bg_obj = astra_get_option( 'site-layout-outside-bg-obj-responsive' );

			// Color Options.
			$text_color       = astra_get_option( 'text-color' );
			$theme_color      = astra_get_option( 'theme-color' );
			$link_color       = astra_get_option( 'link-color', $theme_color );
			$link_hover_color = astra_get_option( 'link-h-color' );

			// Typography.
			$body_font_size          = astra_get_option( 'font-size-body' );
			$body_line_height        = astra_get_option( 'body-line-height' );
			$para_margin_bottom      = astra_get_option( 'para-margin-bottom' );
			$body_text_transform     = astra_get_option( 'body-text-transform' );
			$headings_font_family    = astra_get_option( 'headings-font-family' );
			$headings_font_weight    = astra_get_option( 'headings-font-weight' );
			$headings_text_transform = astra_get_option( 'headings-text-transform' );
			$headings_line_height    = astra_get_option( 'headings-line-height' );
			$site_title_font_size    = astra_get_option( 'font-size-site-title' );
			$site_tagline_font_size  = astra_get_option( 'font-size-site-tagline' );

			$single_post_title_font_size     = astra_get_option( 'font-size-entry-title' );
			$archive_summary_title_font_size = astra_get_option( 'font-size-archive-summary-title' );
			$archive_post_title_font_size    = astra_get_option( 'font-size-page-title' );
			$heading_h1_font_size            = astra_get_option( 'font-size-h1' );
			$heading_h2_font_size            = astra_get_option( 'font-size-h2' );
			$heading_h3_font_size            = astra_get_option( 'font-size-h3' );
			$heading_h4_font_size            = astra_get_option( 'font-size-h4' );
			$heading_h5_font_size            = astra_get_option( 'font-size-h5' );
			$heading_h6_font_size            = astra_get_option( 'font-size-h6' );

			/**
			 * Heading Typography - h1 - h3.
			 */
			$headings_font_transform = astra_get_option( 'headings-text-transform', $body_text_transform );

			$h1_font_family    = astra_get_option( 'font-family-h1' );
			$h1_font_weight    = astra_get_option( 'font-weight-h1' );
			$h1_line_height    = astra_get_option( 'line-height-h1' );
			$h1_text_transform = astra_get_option( 'text-transform-h1' );

			$h2_font_family    = astra_get_option( 'font-family-h2' );
			$h2_font_weight    = astra_get_option( 'font-weight-h2' );
			$h2_line_height    = astra_get_option( 'line-height-h2' );
			$h2_text_transform = astra_get_option( 'text-transform-h2' );

			$h3_font_family    = astra_get_option( 'font-family-h3' );
			$h3_font_weight    = astra_get_option( 'font-weight-h3' );
			$h3_line_height    = astra_get_option( 'line-height-h3' );
			$h3_text_transform = astra_get_option( 'text-transform-h3' );

			// Fallback for H1 - headings typography.
			if ( 'inherit' == $h1_font_family ) {
				$h1_font_family = $headings_font_family;
			}
			if ( 'normal' == $h1_font_weight ) {
				$h1_font_weight = $headings_font_weight;
			}
			if ( '' == $h1_text_transform ) {
				$h1_text_transform = $headings_font_transform;
			}
			if ( '' == $h1_line_height ) {
				$h1_line_height = $headings_line_height;
			}

			// Fallback for H2 - headings typography.
			if ( 'inherit' == $h2_font_family ) {
					$h2_font_family = $headings_font_family;
			}
			if ( 'normal' == $h2_font_weight ) {
				$h2_font_weight = $headings_font_weight;
			}
			if ( '' == $h2_text_transform ) {
				$h2_text_transform = $headings_font_transform;
			}
			if ( '' == $h2_line_height ) {
				$h2_line_height = $headings_line_height;
			}

			// Fallback for H3 - headings typography.
			if ( 'inherit' == $h3_font_family ) {
					$h3_font_family = $headings_font_family;
			}
			if ( 'normal' == $h3_font_weight ) {
				$h3_font_weight = $headings_font_weight;
			}
			if ( '' == $h3_text_transform ) {
				$h3_text_transform = $headings_font_transform;
			}
			if ( '' == $h3_line_height ) {
				$h3_line_height = $headings_line_height;
			}

			// Fallback for H4 - headings typography.
			$h4_line_height = $headings_line_height;

			// Fallback for H5 - headings typography.
			$h5_line_height = $headings_line_height;

			// Fallback for H6 - headings typography.
			$h6_line_height = $headings_line_height;

			// Button Styling.
			$btn_border_radius     = astra_get_option( 'button-radius' );
			$theme_btn_padding     = astra_get_option( 'theme-button-padding' );
			$highlight_theme_color = astra_get_foreground_color( $theme_color );

			// Footer Bar Colors.
			$footer_bg_obj       = astra_get_option( 'footer-bg-obj' );
			$footer_color        = astra_get_option( 'footer-color' );
			$footer_link_color   = astra_get_option( 'footer-link-color' );
			$footer_link_h_color = astra_get_option( 'footer-link-h-color' );

			// Color.
			$footer_adv_bg_obj             = astra_get_option( 'footer-adv-bg-obj' );
			$footer_adv_text_color         = astra_get_option( 'footer-adv-text-color' );
			$footer_adv_widget_title_color = astra_get_option( 'footer-adv-wgt-title-color' );
			$footer_adv_link_color         = astra_get_option( 'footer-adv-link-color' );
			$footer_adv_link_h_color       = astra_get_option( 'footer-adv-link-h-color' );

			// Header Break Point.
			$header_break_point = astra_header_break_point();

			// Submenu Bordercolor.
			$submenu_border               = astra_get_option( 'primary-submenu-border' );
			$primary_submenu_item_border  = astra_get_option( 'primary-submenu-item-border' );
			$primary_submenu_b_color      = astra_get_option( 'primary-submenu-b-color', $theme_color );
			$primary_submenu_item_b_color = astra_get_option( 'primary-submenu-item-b-color', '#eaeaea' );

			// Custom Buttom menu item.
			$header_custom_button_style          = astra_get_option( 'header-main-rt-section-button-style' );
			$header_custom_button_text_color     = astra_get_option( 'header-main-rt-section-button-text-color' );
			$header_custom_button_text_h_color   = astra_get_option( 'header-main-rt-section-button-text-h-color' );
			$header_custom_button_back_color     = astra_get_option( 'header-main-rt-section-button-back-color' );
			$header_custom_button_back_h_color   = astra_get_option( 'header-main-rt-section-button-back-h-color' );
			$header_custom_button_spacing        = astra_get_option( 'header-main-rt-section-button-padding' );
			$header_custom_button_radius         = astra_get_option( 'header-main-rt-section-button-border-radius' );
			$header_custom_button_border_color   = astra_get_option( 'header-main-rt-section-button-border-color' );
			$header_custom_button_border_h_color = astra_get_option( 'header-main-rt-section-button-border-h-color' );
			$header_custom_button_border_size    = astra_get_option( 'header-main-rt-section-button-border-size' );

			$header_custom_trans_button_text_color     = astra_get_option( 'header-main-rt-trans-section-button-text-color' );
			$header_custom_trans_button_text_h_color   = astra_get_option( 'header-main-rt-trans-section-button-text-h-color' );
			$header_custom_trans_button_back_color     = astra_get_option( 'header-main-rt-trans-section-button-back-color' );
			$header_custom_trans_button_back_h_color   = astra_get_option( 'header-main-rt-trans-section-button-back-h-color' );
			$header_custom_trans_button_spacing        = astra_get_option( 'header-main-rt-trans-section-button-padding' );
			$header_custom_trans_button_radius         = astra_get_option( 'header-main-rt-trans-section-button-border-radius' );
			$header_custom_trans_button_border_color   = astra_get_option( 'header-main-rt-trans-section-button-border-color' );
			$header_custom_trans_button_border_h_color = astra_get_option( 'header-main-rt-trans-section-button-border-h-color' );
			$header_custom_trans_button_border_size    = astra_get_option( 'header-main-rt-trans-section-button-border-size' );

			$global_custom_button_border_size = astra_get_option( 'theme-button-border-group-border-size' );
			$btn_border_color                 = astra_get_option( 'theme-button-border-group-border-color' );
			$btn_border_h_color               = astra_get_option( 'theme-button-border-group-border-h-color' );

			/**
			 * Theme Button Typography
			 */
			$theme_btn_font_family    = astra_get_option( 'font-family-button' );
			$theme_btn_font_size      = astra_get_option( 'font-size-button' );
			$theme_btn_font_weight    = astra_get_option( 'font-weight-button' );
			$theme_btn_text_transform = astra_get_option( 'text-transform-button' );
			$theme_btn_line_height    = astra_get_option( 'theme-btn-line-height' );
			$theme_btn_letter_spacing = astra_get_option( 'theme-btn-letter-spacing' );

			/**
			 * Custom Header Button Typography
			 */
			$header_custom_btn_font_family    = astra_get_option( 'primary-header-button-font-family' );
			$header_custom_btn_font_weight    = astra_get_option( 'primary-header-button-font-weight' );
			$header_custom_btn_font_size      = astra_get_option( 'primary-header-button-font-size' );
			$header_custom_btn_text_transform = astra_get_option( 'primary-header-button-text-transform' );
			$header_custom_btn_line_height    = astra_get_option( 'primary-header-button-line-height' );
			$header_custom_btn_letter_spacing = astra_get_option( 'primary-header-button-letter-spacing' );

			$footer_adv_border_width = astra_get_option( 'footer-adv-border-width' );
			$footer_adv_border_color = astra_get_option( 'footer-adv-border-color' );

			/**
			 * Apply text color depends on link color
			 */
			$btn_text_color = astra_get_option( 'button-color' );
			if ( empty( $btn_text_color ) ) {
				$btn_text_color = astra_get_foreground_color( $theme_color );
			}

			/**
			 * Apply text hover color depends on link hover color
			 */
			$btn_text_hover_color = astra_get_option( 'button-h-color' );
			if ( empty( $btn_text_hover_color ) ) {
				$btn_text_hover_color = astra_get_foreground_color( $link_hover_color );
			}
			$btn_bg_color       = astra_get_option( 'button-bg-color', $theme_color );
			$btn_bg_hover_color = astra_get_option( 'button-bg-h-color', $link_hover_color );

			// Spacing of Big Footer.
			$small_footer_divider_color = astra_get_option( 'footer-sml-divider-color' );
			$small_footer_divider       = astra_get_option( 'footer-sml-divider' );

			/**
			 * Small Footer Styling
			 */
			$small_footer_layout = astra_get_option( 'footer-sml-layout', 'footer-sml-layout-1' );
			$astra_footer_width  = astra_get_option( 'footer-layout-width' );

			// Blog Post Title Typography Options.
			$single_post_max                        = astra_get_option( 'blog-single-width' );
			$single_post_max_width                  = astra_get_option( 'blog-single-max-width' );
			$blog_width                             = astra_get_option( 'blog-width' );
			$blog_max_width                         = astra_get_option( 'blog-max-width' );
			$mobile_header_toggle_btn_style_color   = astra_get_option( 'mobile-header-toggle-btn-style-color', $btn_bg_color );
			$mobile_header_toggle_btn_border_radius = astra_get_option( 'mobile-header-toggle-btn-border-radius' );

			$btn_style_color = astra_get_option( 'mobile-header-toggle-btn-style-color', false );

			if ( ! $btn_style_color ) {
				// button text color.
				$menu_btn_color = esc_attr( astra_get_option( 'button-color' ) );
			} else {
				// toggle button color.
				$menu_btn_color = astra_get_foreground_color( $btn_style_color );
			}

			$css_output = array();
			// Body Font Family.
			$body_font_family = astra_body_font_family();
			$body_font_weight = astra_get_option( 'body-font-weight' );

			if ( is_array( $body_font_size ) ) {
				$body_font_size_desktop = ( isset( $body_font_size['desktop'] ) && '' != $body_font_size['desktop'] ) ? $body_font_size['desktop'] : 15;
			} else {
				$body_font_size_desktop = ( '' != $body_font_size ) ? $body_font_size : 15;
			}
			// check the selection color incase of empty/no theme color.
			$selection_text_color = ( 'transparent' === $highlight_theme_color ) ? '' : $highlight_theme_color;

			$css_output = array(

				// HTML.
				'html'                                    => array(
					'font-size' => astra_get_font_css_value( (int) $body_font_size_desktop * 6.25, '%' ),
				),
				'a, .page-title'                          => array(
					'color' => esc_attr( $link_color ),
				),
				'a:hover, a:focus'                        => array(
					'color' => esc_attr( $link_hover_color ),
				),
				'body, button, input, select, textarea, .ast-button, .ast-custom-button' => array(
					'font-family'    => astra_get_font_family( $body_font_family ),
					'font-weight'    => esc_attr( $body_font_weight ),
					'font-size'      => astra_responsive_font( $body_font_size, 'desktop' ),
					'line-height'    => esc_attr( $body_line_height ),
					'text-transform' => esc_attr( $body_text_transform ),
				),
				'blockquote'                              => array(
					'border-color' => astra_hex_to_rgba( $link_color, 0.15 ),
				),
				'p, .entry-content p'                     => array(
					'margin-bottom' => astra_get_css_value( $para_margin_bottom, 'em' ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h1, .entry-content h1, .entry-content h1 a, h2, .entry-content h2, .entry-content h2 a, h3, .entry-content h3, .entry-content h3 a, h4, .entry-content h4, .entry-content h4 a, h5, .entry-content h5, .entry-content h5 a, h6, .entry-content h6, .entry-content h6 a, .site-title, .site-title a',
					'h1, .entry-content h1, h2, .entry-content h2, h3, .entry-content h3, h4, .entry-content h4, h5, .entry-content h5, h6, .entry-content h6, .site-title, .site-title a'
				)                                         => array(
					'font-family'    => astra_get_css_value( $headings_font_family, 'font' ),
					'font-weight'    => astra_get_css_value( $headings_font_weight, 'font' ),
					'text-transform' => esc_attr( $headings_text_transform ),
				),

				'.site-title'                             => array(
					'font-size' => astra_responsive_font( $site_title_font_size, 'desktop' ),
				),
				'header .site-logo-img .custom-logo-link img' => array(
					'max-width' => astra_get_css_value( $header_logo_width['desktop'], 'px' ),
				),
				'.astra-logo-svg'                         => array(
					'width' => astra_get_css_value( $header_logo_width['desktop'], 'px' ),
				),
				'.ast-archive-description .ast-archive-title' => array(
					'font-size' => astra_responsive_font( $archive_summary_title_font_size, 'desktop' ),
				),
				'.site-header .site-description'          => array(
					'font-size' => astra_responsive_font( $site_tagline_font_size, 'desktop' ),
				),
				'.entry-title'                            => array(
					'font-size' => astra_responsive_font( $archive_post_title_font_size, 'desktop' ),
				),
				'.comment-reply-title'                    => array(
					'font-size' => astra_get_font_css_value( (int) $body_font_size_desktop * 1.66666 ),
				),
				'.ast-comment-list #cancel-comment-reply-link' => array(
					'font-size' => astra_responsive_font( $body_font_size, 'desktop' ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h1, .entry-content h1, .entry-content h1 a',
					'h1, .entry-content h1'
				)                                         => array(
					'font-size'      => astra_responsive_font( $heading_h1_font_size, 'desktop' ),
					'font-weight'    => astra_get_css_value( $h1_font_weight, 'font' ),
					'font-family'    => astra_get_css_value( $h1_font_family, 'font' ),
					'line-height'    => esc_attr( $h1_line_height ),
					'text-transform' => esc_attr( $h1_text_transform ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h2, .entry-content h2, .entry-content h2 a',
					'h2, .entry-content h2'
				)                                         => array(
					'font-size'      => astra_responsive_font( $heading_h2_font_size, 'desktop' ),
					'font-weight'    => astra_get_css_value( $h2_font_weight, 'font' ),
					'font-family'    => astra_get_css_value( $h2_font_family, 'font' ),
					'line-height'    => esc_attr( $h2_line_height ),
					'text-transform' => esc_attr( $h2_text_transform ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h3, .entry-content h3, .entry-content h3 a',
					'h3, .entry-content h3'
				)                                         => array(
					'font-size'      => astra_responsive_font( $heading_h3_font_size, 'desktop' ),
					'font-weight'    => astra_get_css_value( $h3_font_weight, 'font' ),
					'font-family'    => astra_get_css_value( $h3_font_family, 'font' ),
					'line-height'    => esc_attr( $h3_line_height ),
					'text-transform' => esc_attr( $h3_text_transform ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h4, .entry-content h4, .entry-content h4 a',
					'h4, .entry-content h4'
				)                                         => array(
					'font-size'   => astra_responsive_font( $heading_h4_font_size, 'desktop' ),
					'line-height' => esc_attr( $h4_line_height ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h5, .entry-content h5, .entry-content h5 a',
					'h5, .entry-content h5'
				)                                         => array(
					'font-size'   => astra_responsive_font( $heading_h5_font_size, 'desktop' ),
					'line-height' => esc_attr( $h5_line_height ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h6, .entry-content h6, .entry-content h6 a',
					'h6, .entry-content h6'
				)                                         => array(
					'font-size'   => astra_responsive_font( $heading_h6_font_size, 'desktop' ),
					'line-height' => esc_attr( $h6_line_height ),
				),

				'.ast-single-post .entry-title, .page-title' => array(
					'font-size' => astra_responsive_font( $single_post_title_font_size, 'desktop' ),
				),
				'#secondary, #secondary button, #secondary input, #secondary select, #secondary textarea' => array(
					'font-size' => astra_responsive_font( $body_font_size, 'desktop' ),
				),

				// Global CSS.
				'::selection'                             => array(
					'background-color' => esc_attr( $theme_color ),
					'color'            => esc_attr( $selection_text_color ),
				),

				// Conditionally select selectors with annchors or withour anchors for text color.
				self::conditional_headings_css_selectors(
					'body, h1, .entry-title a, .entry-content h1, .entry-content h1 a, h2, .entry-content h2, .entry-content h2 a, h3, .entry-content h3, .entry-content h3 a, h4, .entry-content h4, .entry-content h4 a, h5, .entry-content h5, .entry-content h5 a, h6, .entry-content h6, .entry-content h6 a',
					'body, h1, .entry-title a, .entry-content h1, h2, .entry-content h2, h3, .entry-content h3, h4, .entry-content h4, h5, .entry-content h5, h6, .entry-content h6, .wc-block-grid__product-title'
				)                                         => array(
					'color' => esc_attr( $text_color ),
				),

				// Typography.
				'.tagcloud a:hover, .tagcloud a:focus, .tagcloud a.current-item' => array(
					'color'            => astra_get_foreground_color( $link_color ),
					'border-color'     => esc_attr( $link_color ),
					'background-color' => esc_attr( $link_color ),
				),

				// Header - Main Header CSS.
				'.main-header-menu .menu-link, .ast-header-custom-item a' => array(
					'color' => esc_attr( $text_color ),
				),

				// Main - Menu Items.
				'.main-header-menu .menu-item:hover > .menu-link, .main-header-menu .menu-item:hover > .ast-menu-toggle, .main-header-menu .ast-masthead-custom-menu-items a:hover, .main-header-menu .menu-item.focus > .menu-link, .main-header-menu .menu-item.focus > .ast-menu-toggle, .main-header-menu .current-menu-item > .menu-link, .main-header-menu .current-menu-ancestor > .menu-link, .main-header-menu .current-menu-item > .ast-menu-toggle, .main-header-menu .current-menu-ancestor > .ast-menu-toggle' => array(
					'color' => esc_attr( $link_color ),
				),

				// Input tags.
				'input:focus, input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="reset"]:focus, input[type="search"]:focus, textarea:focus' => array(
					'border-color' => esc_attr( $link_color ),
				),
				'input[type="radio"]:checked, input[type=reset], input[type="checkbox"]:checked, input[type="checkbox"]:hover:checked, input[type="checkbox"]:focus:checked, input[type=range]::-webkit-slider-thumb' => array(
					'border-color'     => esc_attr( $link_color ),
					'background-color' => esc_attr( $link_color ),
					'box-shadow'       => 'none',
				),

				// Small Footer.
				'.site-footer a:hover + .post-count, .site-footer a:focus + .post-count' => array(
					'background'   => esc_attr( $link_color ),
					'border-color' => esc_attr( $link_color ),
				),

				'.ast-small-footer'                       => array(
					'color' => esc_attr( $footer_color ),
				),
				'.ast-small-footer > .ast-footer-overlay' => astra_get_background_obj( $footer_bg_obj ),

				'.ast-small-footer a'                     => array(
					'color' => esc_attr( $footer_link_color ),
				),
				'.ast-small-footer a:hover'               => array(
					'color' => esc_attr( $footer_link_h_color ),
				),

				// Advanced Footer colors/fonts.
				'.footer-adv .footer-adv-overlay'         => array(
					'border-top-style' => 'solid',
					'border-top-width' => astra_get_css_value( $footer_adv_border_width, 'px' ),
					'border-top-color' => esc_attr( $footer_adv_border_color ),
				),
				'.footer-adv .widget-title,.footer-adv .widget-title a' => array(
					'color' => esc_attr( $footer_adv_widget_title_color ),
				),

				'.footer-adv'                             => array(
					'color' => esc_attr( $footer_adv_text_color ),
				),

				'.footer-adv a'                           => array(
					'color' => esc_attr( $footer_adv_link_color ),
				),

				'.footer-adv .tagcloud a:hover, .footer-adv .tagcloud a.current-item' => array(
					'border-color'     => esc_attr( $footer_adv_link_color ),
					'background-color' => esc_attr( $footer_adv_link_color ),
				),

				'.footer-adv a:hover, .footer-adv .no-widget-text a:hover, .footer-adv a:focus, .footer-adv .no-widget-text a:focus' => array(
					'color' => esc_attr( $footer_adv_link_h_color ),
				),

				'.footer-adv .calendar_wrap #today, .footer-adv a:hover + .post-count' => array(
					'background-color' => esc_attr( $footer_adv_link_color ),
				),

				'.footer-adv-overlay'                     => astra_get_background_obj( $footer_adv_bg_obj ),

				// Single Post Meta.
				'.ast-comment-meta'                       => array(
					'line-height' => '1.666666667',
					'font-size'   => astra_get_font_css_value( (int) $body_font_size_desktop * 0.8571428571 ),
				),
				'.single .nav-links .nav-previous, .single .nav-links .nav-next, .single .ast-author-details .author-title, .ast-comment-meta' => array(
					'color' => esc_attr( $link_color ),
				),

				// Blog Post Meta Typography.
				'.entry-meta, .entry-meta *'              => array(
					'line-height' => '1.45',
					'color'       => esc_attr( $link_color ),
				),
				'.entry-meta a:hover, .entry-meta a:hover *, .entry-meta a:focus, .entry-meta a:focus *' => array(
					'color' => esc_attr( $link_hover_color ),
				),

				// Blockquote Text Color.
				'blockquote'                              => array(
					'color' => astra_adjust_brightness( $text_color, 75, 'darken' ),
				),

				// 404 Page.
				'.ast-404-layout-1 .ast-404-text'         => array(
					'font-size' => astra_get_font_css_value( '200' ),
				),

				// Widget Title.
				'.widget-title'                           => array(
					'font-size' => astra_get_font_css_value( (int) $body_font_size_desktop * 1.428571429 ),
					'color'     => esc_attr( $text_color ),
				),
				'#cat option, .secondary .calendar_wrap thead a, .secondary .calendar_wrap thead a:visited' => array(
					'color' => esc_attr( $link_color ),
				),
				'.secondary .calendar_wrap #today, .ast-progress-val span' => array(
					'background' => esc_attr( $link_color ),
				),
				'.secondary a:hover + .post-count, .secondary a:focus + .post-count' => array(
					'background'   => esc_attr( $link_color ),
					'border-color' => esc_attr( $link_color ),
				),
				'.calendar_wrap #today > a'               => array(
					'color' => astra_get_foreground_color( $link_color ),
				),

				// Pagination.
				'.ast-pagination a, .page-links .page-link, .single .post-navigation a' => array(
					'color' => esc_attr( $link_color ),
				),
				'.ast-pagination a:hover, .ast-pagination a:focus, .ast-pagination > span:hover:not(.dots), .ast-pagination > span.current, .page-links > .page-link, .page-links .page-link:hover, .post-navigation a:hover' => array(
					'color' => esc_attr( $link_hover_color ),
				),

				// toggle style
				// Menu Toggle Minimal.
				'.ast-header-break-point .ast-mobile-menu-buttons-minimal.menu-toggle' => array(
					'background' => 'transparent',
					'color'      => esc_attr( $mobile_header_toggle_btn_style_color ),
				),

				// Menu Toggle Outline.
				'.ast-header-break-point .ast-mobile-menu-buttons-outline.menu-toggle' => array(
					'background' => 'transparent',
					'border'     => '1px solid ' . $mobile_header_toggle_btn_style_color,
					'color'      => esc_attr( $mobile_header_toggle_btn_style_color ),
				),

				// Menu Toggle Fill.
				'.ast-header-break-point .ast-mobile-menu-buttons-fill.menu-toggle' => array(
					'background' => esc_attr( $mobile_header_toggle_btn_style_color ),
					'color'      => $menu_btn_color,
				),

				// Menu Toggle Border Radius.
				'.ast-header-break-point .main-header-bar .ast-button-wrap .menu-toggle' => array(
					'border-radius' => ( '' !== $mobile_header_toggle_btn_border_radius ) ? esc_attr( $mobile_header_toggle_btn_border_radius ) . 'px' : '',
				),
			);

			/* Parse CSS from array() */
			$parse_css = astra_parse_css( $css_output );

			/*
			* Fix the wide width issue in gutenberg
			* check if the current user is existing user or new user.
			* if new user load the CSS bty default if existing provide a filter
			*/
			if ( self::gtn_image_group_css_comp() ) {

				$gtn_full_wide_image_css = array(
					'.ast-separate-container.ast-right-sidebar .entry-content .wp-block-image.alignfull,.ast-separate-container.ast-left-sidebar .entry-content .wp-block-image.alignfull,.ast-separate-container.ast-right-sidebar .entry-content .wp-block-cover.alignfull,.ast-separate-container.ast-left-sidebar .entry-content .wp-block-cover.alignfull' => array(
						'margin-left'  => '-6.67em',
						'margin-right' => '-6.67em',
						'max-width'    => 'unset',
						'width'        => 'unset',
					),
					'.ast-separate-container.ast-right-sidebar .entry-content .wp-block-image.alignwide,.ast-separate-container.ast-left-sidebar .entry-content .wp-block-image.alignwide,.ast-separate-container.ast-right-sidebar .entry-content .wp-block-cover.alignwide,.ast-separate-container.ast-left-sidebar .entry-content .wp-block-cover.alignwide' => array(
						'margin-left'  => '-20px',
						'margin-right' => '-20px',
						'max-width'    => 'unset',
						'width'        => 'unset',
					),
					'.wp-block-group .has-background' => array(
						'padding' => '20px',
					),
				);
				$parse_css              .= astra_parse_css( $gtn_full_wide_image_css, '1200' );

			} else {

				$gtn_tablet_column_css = array(
					'.entry-content .wp-block-columns .wp-block-column' => array(
						'margin-left' => '0px',
					),
				);

				$parse_css .= astra_parse_css( $gtn_tablet_column_css, '', '782' );
			}

			if ( self::gtn_group_cover_css_comp() ) {

				$gtn_group_cover_css = array(
					// With container - Sidebar/No Sidebar.
					'.ast-separate-container.ast-right-sidebar .entry-content .wp-block-group.alignwide, .ast-separate-container.ast-left-sidebar .entry-content .wp-block-group.alignwide, .ast-separate-container.ast-right-sidebar .entry-content .wp-block-cover.alignwide, .ast-separate-container.ast-left-sidebar .entry-content .wp-block-cover.alignwide, .ast-no-sidebar.ast-separate-container .entry-content .wp-block-group.alignwide, .ast-no-sidebar.ast-separate-container .entry-content .wp-block-cover.alignwide' => array(
						'margin-left'   => '-20px',
						'margin-right'  => '-20px',
						'padding-left'  => '20px',
						'padding-right' => '20px',
					),
					'.ast-separate-container.ast-right-sidebar .entry-content .wp-block-group.alignfull, .ast-separate-container.ast-left-sidebar .entry-content .wp-block-group.alignfull, .ast-no-sidebar.ast-separate-container .entry-content .wp-block-group.alignfull, .ast-separate-container.ast-right-sidebar .entry-content .wp-block-cover.alignfull, .ast-separate-container.ast-left-sidebar .entry-content .wp-block-cover.alignfull, .ast-no-sidebar.ast-separate-container .entry-content .wp-block-cover.alignfull' => array(
						'margin-left'   => '-6.67em',
						'margin-right'  => '-6.67em',
						'padding-left'  => '6.67em',
						'padding-right' => '6.67em',
					),
					// Without container - Sidebar/No Sidebar.
					'.ast-plain-container.ast-right-sidebar .entry-content .wp-block-group.alignwide, .ast-plain-container.ast-left-sidebar .entry-content .wp-block-group.alignwide, .ast-plain-container.ast-right-sidebar .entry-content .wp-block-group.alignfull, .ast-plain-container.ast-left-sidebar .entry-content .wp-block-group.alignfull' => array(
						'padding-left'  => '20px',
						'padding-right' => '20px',
					),
					// Full Width / Contained - No Sidebar.
					'.ast-plain-container.ast-no-sidebar .entry-content .alignwide .wp-block-group__inner-container, .ast-plain-container.ast-no-sidebar .entry-content .alignfull .wp-block-group__inner-container, .ast-plain-container.ast-no-sidebar .entry-content .alignwide .wp-block-cover__inner-container, .ast-plain-container.ast-no-sidebar .entry-content .alignfull .wp-block-cover__inner-container' => array(
						'max-width'     => astra_get_css_value( $site_content_width + 40, 'px' ),
						'margin-left'   => 'auto',
						'margin-right'  => 'auto',
						'padding-left'  => '20px',
						'padding-right' => '20px',
					),
					// Full Width / Stretched - No Sidebar.
					'.ast-page-builder-template.ast-no-sidebar .entry-content .wp-block-group.alignwide, .ast-page-builder-template.ast-no-sidebar .entry-content .wp-block-group.alignfull' => array(
						'margin-left'  => '0',
						'margin-right' => '0',
					),
					// Cover Image.
					'.wp-block-cover-image.alignwide .wp-block-cover__inner-container, .wp-block-cover.alignwide .wp-block-cover__inner-container, .wp-block-cover-image.alignfull .wp-block-cover__inner-container, .wp-block-cover.alignfull .wp-block-cover__inner-container' => array(
						'width' => '100%',
					),
					'.ast-page-builder-template.ast-no-sidebar .entry-content .wp-block-cover.alignwide, .ast-page-builder-template.ast-left-sidebar .entry-content .wp-block-cover.alignwide, .ast-page-builder-template.ast-right-sidebar .entry-content .wp-block-cover.alignwide, .ast-page-builder-template.ast-no-sidebar .entry-content .wp-block-cover.alignfull, .ast-page-builder-template.ast-left-sidebar .entry-content .wp-block-cover.alignfull, .ast-page-builder-template.ast-right-sidebar .entry-content .wp-block-cover.alignful' => array(
						'padding-right' => '0',
						'padding-left'  => '0',
					),
				);
				$parse_css .= astra_parse_css( $gtn_group_cover_css, '1200' );

				// Remove margin top when Primary Header is not set and No Sidebar is added in Full-Width / Contained Layout.
				if ( is_singular() ) {
					$display_header = get_post_meta( get_the_ID(), 'ast-main-header-display', true );
					if ( 'disabled' === $display_header && apply_filters( 'astra_content_margin_full_width_contained', true ) || ( Astra_Ext_Transparent_Header_Markup::is_transparent_header() ) ) {
						$gtn_margin_top = array(
							'.ast-plain-container.ast-no-sidebar #primary' => array(
								'margin-top'    => '0',
								'margin-bottom' => '0',
							),
						);
						$parse_css     .= astra_parse_css( $gtn_margin_top );
					}
				}
			}

			$static_layout_css = array(
				'#secondary.secondary'                  => array(
					'padding-top' => 0,
				),
				'.ast-separate-container .ast-article-post, .ast-separate-container .ast-article-single' => array(
					'padding' => '1.5em 2.14em',
				),
				'.ast-separate-container #primary, .ast-separate-container #secondary' => array(
					'padding' => '1.5em 0',
				),
				'.ast-separate-container.ast-right-sidebar #secondary' => array(
					'padding-left'  => '1em',
					'padding-right' => '1em',
				),
				'.ast-separate-container.ast-two-container #secondary' => array(
					'padding-left'  => 0,
					'padding-right' => 0,
				),
				'.ast-page-builder-template .entry-header #secondary' => array(
					'margin-top' => '1.5em',
				),
				'.ast-page-builder-template #secondary' => array(
					'margin-top' => '1.5em',
				),
				'#primary, #secondary'                  => array(
					'padding' => '1.5em 0',
					'margin'  => 0,
				),
				'.ast-left-sidebar #content > .ast-container' => array(
					'display'        => 'flex',
					'flex-direction' => 'column-reverse',
					'width'          => '100%',
				),
				'.ast-author-box img.avatar'            => array(
					'margin' => '20px 0 0 0',
				),
				'.ast-pagination'                       => array(
					'padding-top' => '1.5em',
					'text-align'  => 'center',
				),
				'.ast-pagination .next.page-numbers'    => array(
					'display' => 'inherit',
					'float'   => 'none',
				),
			);

			/* Parse CSS from array() -> max-width: (tablet-breakpoint)px CSS */
			$parse_css .= astra_parse_css( $static_layout_css, '', astra_get_tablet_breakpoint() );

			if ( $is_site_rtl ) {
				$static_layout_lang_direction_css = array(
					'.ast-page-builder-template.ast-left-sidebar #secondary' => array(
						'padding-left' => '20px',
					),
					'.ast-page-builder-template.ast-right-sidebar #secondary' => array(
						'padding-right' => '20px',
					),
					'.ast-right-sidebar #primary'        => array(
						'padding-left' => 0,
					),
					'.ast-right-sidebar #secondary'      => array(
						'padding-right' => 0,
					),
					'.ast-left-sidebar #primary'         => array(
						'padding-right' => 0,
					),
					'.ast-left-sidebar #secondary'       => array(
						'padding-left' => 0,
					),
					'.ast-pagination .prev.page-numbers' => array(
						'padding-right' => '.5em',
					),
					'.ast-pagination .next.page-numbers' => array(
						'padding-left' => '.5em',
					),
				);
			} else {
				$static_layout_lang_direction_css = array(
					'.ast-page-builder-template.ast-left-sidebar #secondary' => array(
						'padding-right' => '20px',
					),
					'.ast-page-builder-template.ast-right-sidebar #secondary' => array(
						'padding-left' => '20px',
					),
					'.ast-right-sidebar #primary'        => array(
						'padding-right' => 0,
					),
					'.ast-right-sidebar #secondary'      => array(
						'padding-left' => 0,
					),
					'.ast-left-sidebar #primary'         => array(
						'padding-left' => 0,
					),
					'.ast-left-sidebar #secondary'       => array(
						'padding-right' => 0,
					),
					'.ast-pagination .prev.page-numbers' => array(
						'padding-left' => '.5em',
					),
					'.ast-pagination .next.page-numbers' => array(
						'padding-right' => '.5em',
					),
				);
			}

			/* Parse CSS from array() -> max-width: (tablet-breakpoint)px CSS */
			$parse_css .= astra_parse_css( $static_layout_lang_direction_css, '', astra_get_tablet_breakpoint() );

			$static_layout_css_min = array(
				'.ast-separate-container.ast-right-sidebar #primary, .ast-separate-container.ast-left-sidebar #primary' => array(
					'border' => 0,
				),
				'.ast-separate-container.ast-right-sidebar #secondary, .ast-separate-container.ast-left-sidebar #secondary' => array(
					'border'       => 0,
					'margin-left'  => 'auto',
					'margin-right' => 'auto',
				),
				'.ast-separate-container.ast-two-container #secondary .widget:last-child' => array(
					'margin-bottom' => 0,
				),
				'.ast-separate-container .ast-comment-list li .comment-respond' => array(
					'padding-left'  => '2.66666em',
					'padding-right' => '2.66666em',
				),
				'.ast-author-box' => array(
					'-js-display' => 'flex',
					'display'     => 'flex',
				),
				'.ast-author-bio' => array(
					'flex' => '1',
				),
				'.error404.ast-separate-container #primary, .search-no-results.ast-separate-container #primary' => array(
					'margin-bottom' => '4em',
				),
			);

			/* Parse CSS from array() -> min-width: (tablet-breakpoint + 1)px CSS */
			$parse_css .= astra_parse_css( $static_layout_css_min, astra_get_tablet_breakpoint( '', '1' ) );

			if ( $is_site_rtl ) {
				$static_layout_min_lang_direction_css = array(
					'.ast-right-sidebar #primary'   => array(
						'border-left' => '1px solid #eee',
					),
					'.ast-right-sidebar #secondary' => array(
						'border-right' => '1px solid #eee',
						'margin-right' => '-1px',
					),
					'.ast-left-sidebar #primary'    => array(
						'border-right' => '1px solid #eee',
					),
					'.ast-left-sidebar #secondary'  => array(
						'border-left' => '1px solid #eee',
						'margin-left' => '-1px',
					),
					'.ast-separate-container.ast-two-container.ast-right-sidebar #secondary' => array(
						'padding-right' => '30px',
						'padding-left'  => 0,
					),
					'.ast-separate-container.ast-two-container.ast-left-sidebar #secondary' => array(
						'padding-left'  => '30px',
						'padding-right' => 0,
					),
				);
			} else {
				$static_layout_min_lang_direction_css = array(
					'.ast-right-sidebar #primary'   => array(
						'border-right' => '1px solid #eee',
					),
					'.ast-right-sidebar #secondary' => array(
						'border-left' => '1px solid #eee',
						'margin-left' => '-1px',
					),
					'.ast-left-sidebar #primary'    => array(
						'border-left' => '1px solid #eee',
					),
					'.ast-left-sidebar #secondary'  => array(
						'border-right' => '1px solid #eee',
						'margin-right' => '-1px',
					),
					'.ast-separate-container.ast-two-container.ast-right-sidebar #secondary' => array(
						'padding-left'  => '30px',
						'padding-right' => 0,
					),
					'.ast-separate-container.ast-two-container.ast-left-sidebar #secondary' => array(
						'padding-right' => '30px',
						'padding-left'  => 0,
					),
				);
			}

			/* Parse CSS from array() -> min-width: (tablet-breakpoint + 1)px CSS */
			$parse_css .= astra_parse_css( $static_layout_min_lang_direction_css, astra_get_tablet_breakpoint( '', '1' ) );

			/**
			 * Elementor & Gutenberg button backward compatibility for default styling.
			 */
			if ( self::page_builder_button_style_css() ) {

				/**
				 * Global button CSS - Desktop.
				 */
				$global_button_desktop = array(
					'.menu-toggle, button, .ast-button, .ast-custom-button, .button, input#submit, input[type="button"], input[type="submit"], input[type="reset"]' => array(
						'border-style'        => 'solid',
						'border-top-width'    => ( isset( $global_custom_button_border_size['top'] ) && '' !== $global_custom_button_border_size['top'] ) ? astra_get_css_value( $global_custom_button_border_size['top'], 'px' ) : '0',
						'border-right-width'  => ( isset( $global_custom_button_border_size['right'] ) && '' !== $global_custom_button_border_size['right'] ) ? astra_get_css_value( $global_custom_button_border_size['right'], 'px' ) : '0',
						'border-left-width'   => ( isset( $global_custom_button_border_size['left'] ) && '' !== $global_custom_button_border_size['left'] ) ? astra_get_css_value( $global_custom_button_border_size['left'], 'px' ) : '0',
						'border-bottom-width' => ( isset( $global_custom_button_border_size['bottom'] ) && '' !== $global_custom_button_border_size['bottom'] ) ? astra_get_css_value( $global_custom_button_border_size['bottom'], 'px' ) : '0',
						'color'               => esc_attr( $btn_text_color ),
						'border-color'        => empty( $btn_border_color ) ? esc_attr( $btn_bg_color ) : esc_attr( $btn_border_color ),
						'background-color'    => esc_attr( $btn_bg_color ),
						'border-radius'       => astra_get_css_value( $btn_border_radius, 'px' ),
						'padding-top'         => astra_responsive_spacing( $theme_btn_padding, 'top', 'desktop' ),
						'padding-right'       => astra_responsive_spacing( $theme_btn_padding, 'right', 'desktop' ),
						'padding-bottom'      => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'desktop' ),
						'padding-left'        => astra_responsive_spacing( $theme_btn_padding, 'left', 'desktop' ),
						'font-family'         => astra_get_font_family( $theme_btn_font_family ),
						'font-weight'         => esc_attr( $theme_btn_font_weight ),
						'font-size'           => astra_get_font_css_value( $theme_btn_font_size['desktop'], $theme_btn_font_size['desktop-unit'] ),
						'line-height'         => esc_attr( $theme_btn_line_height ),
						'text-transform'      => esc_attr( $theme_btn_text_transform ),
						'letter-spacing'      => astra_get_css_value( $theme_btn_letter_spacing, 'px' ),
					),
					'button:focus, .menu-toggle:hover, button:hover, .ast-button:hover, .button:hover, input[type=reset]:hover, input[type=reset]:focus, input#submit:hover, input#submit:focus, input[type="button"]:hover, input[type="button"]:focus, input[type="submit"]:hover, input[type="submit"]:focus' => array(
						'color'            => esc_attr( $btn_text_hover_color ),
						'background-color' => esc_attr( $btn_bg_hover_color ),
						'border-color'     => empty( $btn_border_h_color ) ? esc_attr( $btn_bg_hover_color ) : esc_attr( $btn_border_h_color ),

					),
				);

				$btn_text_color_selectors = '.wp-block-button .wp-block-button__link, ';

				if ( 'color-typo' === self::elementor_default_color_font_setting() || 'color' === self::elementor_default_color_font_setting() || 'typo' === self::elementor_default_color_font_setting() ) {
					$ele_btn_default_desktop = array(
						'.elementor-button-wrapper .elementor-button' => array(
							'border-style'        => 'solid',
							'border-top-width'    => ( isset( $global_custom_button_border_size['top'] ) && '' !== $global_custom_button_border_size['top'] ) ? astra_get_css_value( $global_custom_button_border_size['top'], 'px' ) : '0',
							'border-right-width'  => ( isset( $global_custom_button_border_size['right'] ) && '' !== $global_custom_button_border_size['right'] ) ? astra_get_css_value( $global_custom_button_border_size['right'], 'px' ) : '0',
							'border-left-width'   => ( isset( $global_custom_button_border_size['left'] ) && '' !== $global_custom_button_border_size['left'] ) ? astra_get_css_value( $global_custom_button_border_size['left'], 'px' ) : '0',
							'border-bottom-width' => ( isset( $global_custom_button_border_size['bottom'] ) && '' !== $global_custom_button_border_size['bottom'] ) ? astra_get_css_value( $global_custom_button_border_size['bottom'], 'px' ) : '0',
						),
						'body .elementor-button.elementor-size-sm, body .elementor-button.elementor-size-xs, body .elementor-button.elementor-size-md, body .elementor-button.elementor-size-lg, body .elementor-button.elementor-size-xl, body .elementor-button' => array(
							'border-radius'  => astra_get_css_value( $btn_border_radius, 'px' ),
							'padding-top'    => astra_responsive_spacing( $theme_btn_padding, 'top', 'desktop' ),
							'padding-right'  => astra_responsive_spacing( $theme_btn_padding, 'right', 'desktop' ),
							'padding-bottom' => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'desktop' ),
							'padding-left'   => astra_responsive_spacing( $theme_btn_padding, 'left', 'desktop' ),
						),
					);

					/* Parse CSS from array() */
					$parse_css .= astra_parse_css( $ele_btn_default_desktop );

					$ele_btn_default_tablet = array(
						'.elementor-button-wrapper .elementor-button.elementor-size-sm, .elementor-button-wrapper .elementor-button.elementor-size-xs, .elementor-button-wrapper .elementor-button.elementor-size-md, .elementor-button-wrapper .elementor-button.elementor-size-lg, .elementor-button-wrapper .elementor-button.elementor-size-xl, .elementor-button-wrapper .elementor-button' => array(
							'padding-top'    => astra_responsive_spacing( $theme_btn_padding, 'top', 'tablet' ),
							'padding-right'  => astra_responsive_spacing( $theme_btn_padding, 'right', 'tablet' ),
							'padding-bottom' => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'tablet' ),
							'padding-left'   => astra_responsive_spacing( $theme_btn_padding, 'left', 'tablet' ),
						),
					);

					/* Parse CSS from array() */
					$parse_css .= astra_parse_css( $ele_btn_default_tablet, '', astra_get_tablet_breakpoint() );

					$ele_btn_default_mobile = array(
						'.elementor-button-wrapper .elementor-button.elementor-size-sm, .elementor-button-wrapper .elementor-button.elementor-size-xs, .elementor-button-wrapper .elementor-button.elementor-size-md, .elementor-button-wrapper .elementor-button.elementor-size-lg, .elementor-button-wrapper .elementor-button.elementor-size-xl, .elementor-button-wrapper .elementor-button' => array(
							'padding-top'    => astra_responsive_spacing( $theme_btn_padding, 'top', 'mobile' ),
							'padding-right'  => astra_responsive_spacing( $theme_btn_padding, 'right', 'mobile' ),
							'padding-bottom' => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'mobile' ),
							'padding-left'   => astra_responsive_spacing( $theme_btn_padding, 'left', 'mobile' ),
						),
					);

					/* Parse CSS from array() */
					$parse_css .= astra_parse_css( $ele_btn_default_mobile, '', astra_get_mobile_breakpoint() );
				}

				if ( 'color-typo' === self::elementor_default_color_font_setting() || 'color' === self::elementor_default_color_font_setting() ) {
					// Check if Global Elementor - Theme Style - button color is set. If yes then remove ( :visited ) CSS for the compatibility.
					if ( false === self::is_elementor_kit_button_color_set() ) {
						$btn_text_color_selectors .= '.elementor-button-wrapper .elementor-button, .elementor-button-wrapper .elementor-button:visited';
					} else {
						$btn_text_color_selectors .= '.elementor-button-wrapper .elementor-button';
					}

					$ele_btn_color_builder_desktop = array(
						'.elementor-button-wrapper .elementor-button' => array(
							'border-color'     => empty( $btn_border_color ) ? esc_attr( $btn_bg_color ) : esc_attr( $btn_border_color ),
							'background-color' => esc_attr( $btn_bg_color ),
						),
						'.elementor-button-wrapper .elementor-button:hover, .elementor-button-wrapper .elementor-button:focus' => array(
							'color'            => esc_attr( $btn_text_hover_color ),
							'background-color' => esc_attr( $btn_bg_hover_color ),
							'border-color'     => empty( $btn_border_h_color ) ? esc_attr( $btn_bg_hover_color ) : esc_attr( $btn_border_h_color ),

						),
					);

					/* Parse CSS from array() */
					$parse_css .= astra_parse_css( $ele_btn_color_builder_desktop );
				}

				$global_button_page_builder_text_color_desktop = array(
					$btn_text_color_selectors => array(
						'color' => esc_attr( $btn_text_color ),
					),
				);

				/* Parse CSS from array() */
				$parse_css .= astra_parse_css( $global_button_page_builder_text_color_desktop );

				if ( 'color-typo' === self::elementor_default_color_font_setting() || 'typo' === self::elementor_default_color_font_setting() ) {
					$ele_btn_typo_builder_desktop = array(
						'.elementor-button-wrapper .elementor-button' => array(
							'font-family'    => astra_get_font_family( $theme_btn_font_family ),
							'font-weight'    => esc_attr( $theme_btn_font_weight ),
							'line-height'    => esc_attr( $theme_btn_line_height ),
							'text-transform' => esc_attr( $theme_btn_text_transform ),
							'letter-spacing' => astra_get_css_value( $theme_btn_letter_spacing, 'px' ),
						),
						'body .elementor-button.elementor-size-sm, body .elementor-button.elementor-size-xs, body .elementor-button.elementor-size-md, body .elementor-button.elementor-size-lg, body .elementor-button.elementor-size-xl, body .elementor-button' => array(
							'font-size' => astra_responsive_font( $theme_btn_font_size, 'desktop' ),
						),
					);

					/* Parse CSS from array() */
					$parse_css .= astra_parse_css( $ele_btn_typo_builder_desktop );
				}

				$global_button_page_builder_desktop = array(
					'.wp-block-button .wp-block-button__link' => array(
						'border-style'        => 'solid',
						'border-top-width'    => ( isset( $global_custom_button_border_size['top'] ) && '' !== $global_custom_button_border_size['top'] ) ? astra_get_css_value( $global_custom_button_border_size['top'], 'px' ) : '0',
						'border-right-width'  => ( isset( $global_custom_button_border_size['right'] ) && '' !== $global_custom_button_border_size['right'] ) ? astra_get_css_value( $global_custom_button_border_size['right'], 'px' ) : '0',
						'border-left-width'   => ( isset( $global_custom_button_border_size['left'] ) && '' !== $global_custom_button_border_size['left'] ) ? astra_get_css_value( $global_custom_button_border_size['left'], 'px' ) : '0',
						'border-bottom-width' => ( isset( $global_custom_button_border_size['bottom'] ) && '' !== $global_custom_button_border_size['bottom'] ) ? astra_get_css_value( $global_custom_button_border_size['bottom'], 'px' ) : '0',
						'border-color'        => empty( $btn_border_color ) ? esc_attr( $btn_bg_color ) : esc_attr( $btn_border_color ),
						'background-color'    => esc_attr( $btn_bg_color ),
						'color'               => esc_attr( $btn_text_color ),
						'font-family'         => astra_get_font_family( $theme_btn_font_family ),
						'font-weight'         => esc_attr( $theme_btn_font_weight ),
						'line-height'         => esc_attr( $theme_btn_line_height ),
						'text-transform'      => esc_attr( $theme_btn_text_transform ),
						'letter-spacing'      => astra_get_css_value( $theme_btn_letter_spacing, 'px' ),
						'font-size'           => astra_responsive_font( $theme_btn_font_size, 'desktop' ),
						'border-radius'       => astra_get_css_value( $btn_border_radius, 'px' ),
						'padding-top'         => astra_responsive_spacing( $theme_btn_padding, 'top', 'desktop' ),
						'padding-right'       => astra_responsive_spacing( $theme_btn_padding, 'right', 'desktop' ),
						'padding-bottom'      => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'desktop' ),
						'padding-left'        => astra_responsive_spacing( $theme_btn_padding, 'left', 'desktop' ),
					),
					'.wp-block-button .wp-block-button__link:hover, .wp-block-button .wp-block-button__link:focus' => array(
						'color'            => esc_attr( $btn_text_hover_color ),
						'background-color' => esc_attr( $btn_bg_hover_color ),
						'border-color'     => empty( $btn_border_h_color ) ? esc_attr( $btn_bg_hover_color ) : esc_attr( $btn_border_h_color ),

					),
					'.elementor-widget-heading h1.elementor-heading-title' => array(
						'line-height' => esc_attr( $h1_line_height ),
					),
					'.elementor-widget-heading h2.elementor-heading-title' => array(
						'line-height' => esc_attr( $h2_line_height ),
					),
					'.elementor-widget-heading h3.elementor-heading-title' => array(
						'line-height' => esc_attr( $h3_line_height ),
					),
					'.elementor-widget-heading h4.elementor-heading-title' => array(
						'line-height' => esc_attr( $h4_line_height ),
					),
					'.elementor-widget-heading h5.elementor-heading-title' => array(
						'line-height' => esc_attr( $h5_line_height ),
					),
					'.elementor-widget-heading h6.elementor-heading-title' => array(
						'line-height' => esc_attr( $h6_line_height ),
					),
				);

				/* Parse CSS from array() */
				$parse_css .= astra_parse_css( $global_button_page_builder_desktop );

				$global_button_page_builder_tablet = array(
					'.wp-block-button .wp-block-button__link' => array(
						'font-size'      => astra_responsive_font( $theme_btn_font_size, 'tablet' ),
						'padding-top'    => astra_responsive_spacing( $theme_btn_padding, 'top', 'tablet' ),
						'padding-right'  => astra_responsive_spacing( $theme_btn_padding, 'right', 'tablet' ),
						'padding-bottom' => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'tablet' ),
						'padding-left'   => astra_responsive_spacing( $theme_btn_padding, 'left', 'tablet' ),
					),
				);

				/* Parse CSS from array() */
				$parse_css .= astra_parse_css( $global_button_page_builder_tablet, '', astra_get_tablet_breakpoint() );

				$global_button_page_builder_mobile = array(
					'.wp-block-button .wp-block-button__link' => array(
						'font-size'      => astra_responsive_font( $theme_btn_font_size, 'mobile' ),
						'padding-top'    => astra_responsive_spacing( $theme_btn_padding, 'top', 'mobile' ),
						'padding-right'  => astra_responsive_spacing( $theme_btn_padding, 'right', 'mobile' ),
						'padding-bottom' => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'mobile' ),
						'padding-left'   => astra_responsive_spacing( $theme_btn_padding, 'left', 'mobile' ),
					),
				);

				/* Parse CSS from array() */
				$parse_css .= astra_parse_css( $global_button_page_builder_mobile, '', astra_get_mobile_breakpoint() );
			} else {

				/**
				 * Global button CSS - Desktop.
				 */
				$global_button_desktop = array(
					'.menu-toggle, button, .ast-button, .ast-custom-button, .button, input#submit, input[type="button"], input[type="submit"], input[type="reset"]' => array(
						'color'            => esc_attr( $btn_text_color ),
						'border-color'     => empty( $btn_border_color ) ? esc_attr( $btn_bg_color ) : esc_attr( $btn_border_color ),
						'background-color' => esc_attr( $btn_bg_color ),
						'border-radius'    => astra_get_css_value( $btn_border_radius, 'px' ),
						'padding-top'      => astra_responsive_spacing( $theme_btn_padding, 'top', 'desktop' ),
						'padding-right'    => astra_responsive_spacing( $theme_btn_padding, 'right', 'desktop' ),
						'padding-bottom'   => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'desktop' ),
						'padding-left'     => astra_responsive_spacing( $theme_btn_padding, 'left', 'desktop' ),
						'font-family'      => astra_get_font_family( $theme_btn_font_family ),
						'font-weight'      => esc_attr( $theme_btn_font_weight ),
						'font-size'        => astra_get_font_css_value( $theme_btn_font_size['desktop'], $theme_btn_font_size['desktop-unit'] ),
						'text-transform'   => esc_attr( $theme_btn_text_transform ),
						'letter-spacing'   => astra_get_css_value( $theme_btn_letter_spacing, 'px' ),
					),
					'button:focus, .menu-toggle:hover, button:hover, .ast-button:hover, .button:hover, input[type=reset]:hover, input[type=reset]:focus, input#submit:hover, input#submit:focus, input[type="button"]:hover, input[type="button"]:focus, input[type="submit"]:hover, input[type="submit"]:focus' => array(
						'color'            => esc_attr( $btn_text_hover_color ),
						'background-color' => esc_attr( $btn_bg_hover_color ),
						'border-color'     => empty( $btn_border_h_color ) ? esc_attr( $btn_bg_hover_color ) : esc_attr( $btn_border_h_color ),

					),
				);
			}

			/* Parse CSS from array() */
			$parse_css .= astra_parse_css( $global_button_desktop );

			/* Parse CSS from array() -> min-width: (tablet-breakpoint) px CSS  */
			$container_min_tablet_css = array(
				'.ast-container' => array(
					'max-width' => '100%',
				),
			);

			$parse_css .= astra_parse_css( $container_min_tablet_css, astra_get_tablet_breakpoint() );

			$container_min_mobile_css = array(
				'.ast-container' => array(
					'max-width' => '100%',
				),
			);

			/* Parse CSS from array() -> min-width: (mobile-breakpoint) px CSS  */
			$parse_css .= astra_parse_css( $container_min_mobile_css, astra_get_mobile_breakpoint() );

			$global_button_mobile = array(
				'.ast-separate-container .ast-article-post, .ast-separate-container .ast-article-single' => array(
					'padding' => '1.5em 1em',
				),
				'.ast-separate-container #content .ast-container' => array(
					'padding-left'  => '0.54em',
					'padding-right' => '0.54em',
				),
				'.ast-separate-container #secondary'       => array(
					'padding-top' => 0,
				),
				'.ast-separate-container.ast-two-container #secondary .widget' => array(
					'margin-bottom' => '1.5em',
					'padding-left'  => '1em',
					'padding-right' => '1em',
				),
				'.ast-separate-container .comments-count-wrapper' => array(
					'padding' => '1.5em 1em',
				),
				'.ast-separate-container .ast-comment-list li.depth-1' => array(
					'padding'       => '1.5em 1em',
					'margin-bottom' => '1.5em',
				),
				'.ast-separate-container .ast-comment-list .bypostauthor' => array(
					'padding' => '.5em',
				),
				'.ast-separate-container .ast-archive-description' => array(
					'padding' => '1.5em 1em',
				),
				'.ast-search-menu-icon.ast-dropdown-active .search-field' => array(
					'width' => '170px',
				),
				'.menu-toggle, button, .ast-button, .button, input#submit, input[type="button"], input[type="submit"], input[type="reset"]' => array(
					'font-size' => astra_get_font_css_value( $theme_btn_font_size['mobile'], $theme_btn_font_size['mobile-unit'] ),
				),
				'.menu-toggle, button, .ast-button, .button, input#submit, input[type="button"], input[type="submit"], input[type="reset"]' => array(
					'padding-top'    => astra_responsive_spacing( $theme_btn_padding, 'top', 'mobile' ),
					'padding-right'  => astra_responsive_spacing( $theme_btn_padding, 'right', 'mobile' ),
					'padding-bottom' => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'mobile' ),
					'padding-left'   => astra_responsive_spacing( $theme_btn_padding, 'left', 'mobile' ),
					'font-size'      => astra_responsive_font( $theme_btn_font_size, 'mobile' ),
				),
				'.ast-separate-container .comment-respond' => array(
					'padding' => '1.5em 1em',
				),
			);

			/* Parse CSS from array() -> max-width: (mobile-breakpoint) px  */
			$parse_css .= astra_parse_css( $global_button_mobile, '', astra_get_mobile_breakpoint() );

			if ( $is_site_rtl ) {
				$global_button_mobile_lang_direction_css = array(
					'.ast-comment-list .children' => array(
						'margin-right' => '0.66666em',
					),
					'.ast-separate-container .ast-comment-list .bypostauthor li' => array(
						'padding' => '0 .5em 0 0',
					),
				);
			} else {
				$global_button_mobile_lang_direction_css = array(
					'.ast-comment-list .children' => array(
						'margin-left' => '0.66666em',
					),
					'.ast-separate-container .ast-comment-list .bypostauthor li' => array(
						'padding' => '0 0 0 .5em',
					),
				);
			}

			/* Parse CSS from array() -> max-width: (mobile-breakpoint) px  */
			$parse_css .= astra_parse_css( $global_button_mobile_lang_direction_css, '', astra_get_mobile_breakpoint() );

			/**
			 * Global button CSS - -> max-width: (tablet-breakpoint) px.
			 */
			$global_button_tablet = array(
				'.menu-toggle, button, .ast-button, .button, input#submit, input[type="button"], input[type="submit"], input[type="reset"]' => array(
					'font-size' => astra_get_font_css_value( $theme_btn_font_size['tablet'], $theme_btn_font_size['tablet-unit'] ),
				),
				'.menu-toggle, button, .ast-button, .button, input#submit, input[type="button"], input[type="submit"], input[type="reset"]' => array(
					'padding-top'    => astra_responsive_spacing( $theme_btn_padding, 'top', 'tablet' ),
					'padding-right'  => astra_responsive_spacing( $theme_btn_padding, 'right', 'tablet' ),
					'padding-bottom' => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'tablet' ),
					'padding-left'   => astra_responsive_spacing( $theme_btn_padding, 'left', 'tablet' ),
					'font-size'      => astra_responsive_font( $theme_btn_font_size, 'tablet' ),
				),
				'.ast-mobile-header-stack .main-header-bar .ast-search-menu-icon' => array(
					'display' => 'inline-block',
				),
				'.ast-header-break-point.ast-header-custom-item-outside .ast-mobile-header-stack .main-header-bar .ast-search-icon' => array(
					'margin' => '0',
				),
				'.ast-comment-avatar-wrap img'             => array(
					'max-width' => '2.5em',
				),
				'.comments-area'                           => array(
					'margin-top' => '1.5em',
				),
				'.ast-separate-container .comments-count-wrapper' => array(
					'padding' => '2em 2.14em',
				),
				'.ast-separate-container .ast-comment-list li.depth-1' => array(
					'padding' => '1.5em 2.14em',
				),
				'.ast-separate-container .comment-respond' => array(
					'padding' => '2em 2.14em',
				),
			);

			/* Parse CSS from array() -> max-width: (tablet-breakpoint) px CSS */
			$parse_css .= astra_parse_css( $global_button_tablet, '', astra_get_tablet_breakpoint() );

			if ( $is_site_rtl ) {
				$global_button_tablet_lang_direction_css = array(
					'.ast-header-break-point .main-header-bar .ast-search-menu-icon.slide-search .search-form' => array(
						'left' => '0',
					),
					'.ast-header-break-point .ast-mobile-header-stack .main-header-bar .ast-search-menu-icon.slide-search .search-form' => array(
						'left' => '-1em',
					),
					'.ast-comment-avatar-wrap' => array(
						'margin-left' => '0.5em',
					),
				);
			} else {
				$global_button_tablet_lang_direction_css = array(
					'.ast-header-break-point .main-header-bar .ast-search-menu-icon.slide-search .search-form' => array(
						'right' => '0',
					),
					'.ast-header-break-point .ast-mobile-header-stack .main-header-bar .ast-search-menu-icon.slide-search .search-form' => array(
						'right' => '-1em',
					),
					'.ast-comment-avatar-wrap' => array(
						'margin-right' => '0.5em',
					),
				);
			}

			$parse_css .= astra_parse_css( $global_button_tablet_lang_direction_css, '', astra_get_tablet_breakpoint() );

			if ( 'custom-button' === $header_custom_button_style ) {
				$css_output = array(

					// Header button typography stylings.
					'.main-header-bar .button-custom-menu-item .ast-custom-button-link .ast-custom-button, .ast-theme-transparent-header .main-header-bar .button-custom-menu-item .ast-custom-button-link .ast-custom-button' => array(
						'font-family'    => astra_get_font_family( $header_custom_btn_font_family ),
						'font-weight'    => esc_attr( $header_custom_btn_font_weight ),
						'font-size'      => astra_responsive_font( $header_custom_btn_font_size, 'desktop' ),
						'line-height'    => esc_attr( $header_custom_btn_line_height ),
						'text-transform' => esc_attr( $header_custom_btn_text_transform ),
						'letter-spacing' => astra_get_css_value( $header_custom_btn_letter_spacing, 'px' ),
					),

					// Custom menu item button - Default.
					'.main-header-bar .button-custom-menu-item .ast-custom-button-link .ast-custom-button' => array(
						'color'               => esc_attr( $header_custom_button_text_color ),
						'background-color'    => esc_attr( $header_custom_button_back_color ),
						'padding-top'         => astra_responsive_spacing( $header_custom_button_spacing, 'top', 'desktop' ),
						'padding-bottom'      => astra_responsive_spacing( $header_custom_button_spacing, 'bottom', 'desktop' ),
						'padding-left'        => astra_responsive_spacing( $header_custom_button_spacing, 'left', 'desktop' ),
						'padding-right'       => astra_responsive_spacing( $header_custom_button_spacing, 'right', 'desktop' ),
						'border-radius'       => astra_get_css_value( $header_custom_button_radius, 'px' ),
						'border-style'        => 'solid',
						'border-color'        => esc_attr( $header_custom_button_border_color ),
						'border-top-width'    => ( isset( $header_custom_button_border_size['top'] ) && '' !== $header_custom_button_border_size['top'] ) ? astra_get_css_value( $header_custom_button_border_size['top'], 'px' ) : '0px',
						'border-right-width'  => ( isset( $header_custom_button_border_size['right'] ) && '' !== $header_custom_button_border_size['right'] ) ? astra_get_css_value( $header_custom_button_border_size['right'], 'px' ) : '0px',
						'border-left-width'   => ( isset( $header_custom_button_border_size['left'] ) && '' !== $header_custom_button_border_size['left'] ) ? astra_get_css_value( $header_custom_button_border_size['left'], 'px' ) : '0px',
						'border-bottom-width' => ( isset( $header_custom_button_border_size['bottom'] ) && '' !== $header_custom_button_border_size['bottom'] ) ? astra_get_css_value( $header_custom_button_border_size['bottom'], 'px' ) : '0px',
					),
					'.main-header-bar .button-custom-menu-item .ast-custom-button-link .ast-custom-button:hover' => array(
						'color'            => esc_attr( $header_custom_button_text_h_color ),
						'background-color' => esc_attr( $header_custom_button_back_h_color ),
						'border-color'     => esc_attr( $header_custom_button_border_h_color ),
					),

					// Custom menu item button - Transparent.
					'.ast-theme-transparent-header .main-header-bar .button-custom-menu-item .ast-custom-button-link .ast-custom-button' => array(
						'color'               => esc_attr( $header_custom_trans_button_text_color ),
						'background-color'    => esc_attr( $header_custom_trans_button_back_color ),
						'padding-top'         => astra_responsive_spacing( $header_custom_trans_button_spacing, 'top', 'desktop' ),
						'padding-bottom'      => astra_responsive_spacing( $header_custom_trans_button_spacing, 'bottom', 'desktop' ),
						'padding-left'        => astra_responsive_spacing( $header_custom_trans_button_spacing, 'left', 'desktop' ),
						'padding-right'       => astra_responsive_spacing( $header_custom_trans_button_spacing, 'right', 'desktop' ),
						'border-radius'       => astra_get_css_value( $header_custom_trans_button_radius, 'px' ),
						'border-style'        => 'solid',
						'border-color'        => esc_attr( $header_custom_trans_button_border_color ),
						'border-top-width'    => ( isset( $header_custom_trans_button_border_size['top'] ) && '' !== $header_custom_trans_button_border_size['top'] ) ? astra_get_css_value( $header_custom_trans_button_border_size['top'], 'px' ) : '',
						'border-right-width'  => ( isset( $header_custom_trans_button_border_size['right'] ) && '' !== $header_custom_trans_button_border_size['right'] ) ? astra_get_css_value( $header_custom_trans_button_border_size['right'], 'px' ) : '',
						'border-left-width'   => ( isset( $header_custom_trans_button_border_size['left'] ) && '' !== $header_custom_trans_button_border_size['left'] ) ? astra_get_css_value( $header_custom_trans_button_border_size['left'], 'px' ) : '',
						'border-bottom-width' => ( isset( $header_custom_trans_button_border_size['bottom'] ) && '' !== $header_custom_trans_button_border_size['bottom'] ) ? astra_get_css_value( $header_custom_trans_button_border_size['bottom'], 'px' ) : '',
					),
					'.ast-theme-transparent-header .main-header-bar .button-custom-menu-item .ast-custom-button-link .ast-custom-button:hover' => array(
						'color'            => esc_attr( $header_custom_trans_button_text_h_color ),
						'background-color' => esc_attr( $header_custom_trans_button_back_h_color ),
						'border-color'     => esc_attr( $header_custom_trans_button_border_h_color ),
					),
				);

				/* Parse CSS from array() */
				$parse_css .= astra_parse_css( $css_output );

				/* Parse CSS from array()*/

				/* Custom Menu Item Button */
				$custom_button_css = array(
					'.main-header-bar .button-custom-menu-item .ast-custom-button-link .ast-custom-button' => array(
						'font-size'      => astra_responsive_font( $header_custom_btn_font_size, 'tablet' ),
						'padding-top'    => astra_responsive_spacing( $header_custom_button_spacing, 'top', 'tablet' ),
						'padding-bottom' => astra_responsive_spacing( $header_custom_button_spacing, 'bottom', 'tablet' ),
						'padding-left'   => astra_responsive_spacing( $header_custom_button_spacing, 'left', 'tablet' ),
						'padding-right'  => astra_responsive_spacing( $header_custom_button_spacing, 'right', 'tablet' ),
					),
				);

				$custom_trans_button_css = array(
					'.ast-theme-transparent-header .main-header-bar .button-custom-menu-item .ast-custom-button-link .ast-custom-button' => array(
						'font-size'      => astra_responsive_font( $header_custom_btn_font_size, 'tablet' ),
						'padding-top'    => astra_responsive_spacing( $header_custom_trans_button_spacing, 'top', 'tablet' ),
						'padding-bottom' => astra_responsive_spacing( $header_custom_trans_button_spacing, 'bottom', 'tablet' ),
						'padding-left'   => astra_responsive_spacing( $header_custom_trans_button_spacing, 'left', 'tablet' ),
						'padding-right'  => astra_responsive_spacing( $header_custom_trans_button_spacing, 'right', 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= astra_parse_css( array_merge( $custom_button_css, $custom_trans_button_css ), '', astra_get_tablet_breakpoint() );

				/* Custom Menu Item Button */
				$custom_button = array(
					'.main-header-bar .button-custom-menu-item .ast-custom-button-link .ast-custom-button' => array(
						'font-size'      => astra_responsive_font( $header_custom_btn_font_size, 'mobile' ),
						'padding-top'    => astra_responsive_spacing( $header_custom_button_spacing, 'top', 'mobile' ),
						'padding-bottom' => astra_responsive_spacing( $header_custom_button_spacing, 'bottom', 'mobile' ),
						'padding-left'   => astra_responsive_spacing( $header_custom_button_spacing, 'left', 'mobile' ),
						'padding-right'  => astra_responsive_spacing( $header_custom_button_spacing, 'right', 'mobile' ),
					),
				);

				$custom_trans_button = array(
					'.ast-theme-transparent-header .main-header-bar .button-custom-menu-item .ast-custom-button-link .ast-custom-button' => array(
						'font-size'      => astra_responsive_font( $header_custom_btn_font_size, 'mobile' ),
						'padding-top'    => astra_responsive_spacing( $header_custom_trans_button_spacing, 'top', 'mobile' ),
						'padding-bottom' => astra_responsive_spacing( $header_custom_trans_button_spacing, 'bottom', 'mobile' ),
						'padding-left'   => astra_responsive_spacing( $header_custom_trans_button_spacing, 'left', 'mobile' ),
						'padding-right'  => astra_responsive_spacing( $header_custom_trans_button_spacing, 'right', 'mobile' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= astra_parse_css( array_merge( $custom_button, $custom_trans_button ), '', astra_get_mobile_breakpoint() );
			}

			// Foreground color.
			if ( ! empty( $footer_adv_link_color ) ) {
				$footer_adv_tagcloud = array(
					'.footer-adv .tagcloud a:hover, .footer-adv .tagcloud a.current-item' => array(
						'color' => astra_get_foreground_color( $footer_adv_link_color ),
					),
					'.footer-adv .calendar_wrap #today' => array(
						'color' => astra_get_foreground_color( $footer_adv_link_color ),
					),
				);
				$parse_css          .= astra_parse_css( $footer_adv_tagcloud );
			}

			/* Width for Footer */
			if ( 'content' != $astra_footer_width ) {
				$genral_global_responsive = array(
					'.ast-small-footer .ast-container' => array(
						'max-width'     => '100%',
						'padding-left'  => '35px',
						'padding-right' => '35px',
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= astra_parse_css( $genral_global_responsive, astra_get_tablet_breakpoint( '', 1 ) );
			}

			/* Width for Comments for Full Width / Stretched Template */
			$page_builder_comment = array(
				'.ast-page-builder-template .comments-area, .single.ast-page-builder-template .entry-header, .single.ast-page-builder-template .post-navigation' => array(
					'max-width'    => astra_get_css_value( $site_content_width + 40, 'px' ),
					'margin-left'  => 'auto',
					'margin-right' => 'auto',
				),
			);

			/* Parse CSS from array()*/
			$parse_css .= astra_parse_css( $page_builder_comment, astra_get_mobile_breakpoint( '', 1 ) );

			$separate_container_css = array(
				'body, .ast-separate-container' => astra_get_responsive_background_obj( $box_bg_obj, 'desktop' ),
			);
			$parse_css             .= astra_parse_css( $separate_container_css );

			$tablet_typo = array();

			if ( isset( $body_font_size['tablet'] ) && '' != $body_font_size['tablet'] ) {

					$tablet_typo = array(
						'.comment-reply-title' => array(
							'font-size' => astra_get_font_css_value( (int) $body_font_size['tablet'] * 1.66666, 'px', 'tablet' ),
						),
						// Single Post Meta.
						'.ast-comment-meta'    => array(
							'font-size' => astra_get_font_css_value( (int) $body_font_size['tablet'] * 0.8571428571, 'px', 'tablet' ),
						),
						// Widget Title.
						'.widget-title'        => array(
							'font-size' => astra_get_font_css_value( (int) $body_font_size['tablet'] * 1.428571429, 'px', 'tablet' ),
						),
					);
			}

			/* Tablet Typography */
			$tablet_typography = array(
				'body, button, input, select, textarea, .ast-button, .ast-custom-button' => array(
					'font-size' => astra_responsive_font( $body_font_size, 'tablet' ),
				),
				'.ast-comment-list #cancel-comment-reply-link' => array(
					'font-size' => astra_responsive_font( $body_font_size, 'tablet' ),
				),
				'#secondary, #secondary button, #secondary input, #secondary select, #secondary textarea' => array(
					'font-size' => astra_responsive_font( $body_font_size, 'tablet' ),
				),
				'.site-title'                    => array(
					'font-size' => astra_responsive_font( $site_title_font_size, 'tablet' ),
				),
				'.ast-archive-description .ast-archive-title' => array(
					'font-size' => astra_responsive_font( $archive_summary_title_font_size, 'tablet', 40 ),
				),
				'.site-header .site-description' => array(
					'font-size' => astra_responsive_font( $site_tagline_font_size, 'tablet' ),
				),
				'.entry-title'                   => array(
					'font-size' => astra_responsive_font( $archive_post_title_font_size, 'tablet', 30 ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h1, .entry-content h1, .entry-content h1 a',
					'h1, .entry-content h1'
				)                                => array(
					'font-size' => astra_responsive_font( $heading_h1_font_size, 'tablet', 30 ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h2, .entry-content h2, .entry-content h2 a',
					'h2, .entry-content h2'
				)                                => array(
					'font-size' => astra_responsive_font( $heading_h2_font_size, 'tablet', 25 ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h3, .entry-content h3, .entry-content h3 a',
					'h3, .entry-content h3'
				)                                => array(
					'font-size' => astra_responsive_font( $heading_h3_font_size, 'tablet', 20 ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h4, .entry-content h4, .entry-content h4 a',
					'h4, .entry-content h4'
				)                                => array(
					'font-size' => astra_responsive_font( $heading_h4_font_size, 'tablet' ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h5, .entry-content h5, .entry-content h5 a',
					'h5, .entry-content h5'
				)                                => array(
					'font-size' => astra_responsive_font( $heading_h5_font_size, 'tablet' ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h6, .entry-content h6, .entry-content h6 a',
					'h6, .entry-content h6'
				)                                => array(
					'font-size' => astra_responsive_font( $heading_h6_font_size, 'tablet' ),
				),
				'.ast-single-post .entry-title, .page-title' => array(
					'font-size' => astra_responsive_font( $single_post_title_font_size, 'tablet', 30 ),
				),
				'#masthead .site-logo-img .custom-logo-link img' => array(
					'max-width' => astra_get_css_value( $header_logo_width['tablet'], 'px' ),
				),
				'.astra-logo-svg'                => array(
					'width' => astra_get_css_value( $header_logo_width['tablet'], 'px' ),
				),
				'.ast-header-break-point .site-logo-img .custom-mobile-logo-link img' => array(
					'max-width' => astra_get_css_value( $header_logo_width['tablet'], 'px' ),
				),
				'body, .ast-separate-container'  => astra_get_responsive_background_obj( $box_bg_obj, 'tablet' ),
			);

			/* Parse CSS from array()*/
			$parse_css .= astra_parse_css( array_merge( $tablet_typo, $tablet_typography ), '', astra_get_tablet_breakpoint() );

			$mobile_typo = array();
			if ( isset( $body_font_size['mobile'] ) && '' != $body_font_size['mobile'] ) {
				$mobile_typo = array(
					'.comment-reply-title' => array(
						'font-size' => astra_get_font_css_value( (int) $body_font_size['mobile'] * 1.66666, 'px', 'mobile' ),
					),
					// Single Post Meta.
					'.ast-comment-meta'    => array(
						'font-size' => astra_get_font_css_value( (int) $body_font_size['mobile'] * 0.8571428571, 'px', 'mobile' ),
					),
					// Widget Title.
					'.widget-title'        => array(
						'font-size' => astra_get_font_css_value( (int) $body_font_size['mobile'] * 1.428571429, 'px', 'mobile' ),
					),
				);
			}

			/* Mobile Typography */
			$mobile_typography = array(
				'body, button, input, select, textarea, .ast-button, .ast-custom-button' => array(
					'font-size' => astra_responsive_font( $body_font_size, 'mobile' ),
				),
				'.ast-comment-list #cancel-comment-reply-link' => array(
					'font-size' => astra_responsive_font( $body_font_size, 'mobile' ),
				),
				'#secondary, #secondary button, #secondary input, #secondary select, #secondary textarea' => array(
					'font-size' => astra_responsive_font( $body_font_size, 'mobile' ),
				),
				'.site-title'                    => array(
					'font-size' => astra_responsive_font( $site_title_font_size, 'mobile' ),
				),
				'.ast-archive-description .ast-archive-title' => array(
					'font-size' => astra_responsive_font( $archive_summary_title_font_size, 'mobile', 40 ),
				),
				'.site-header .site-description' => array(
					'font-size' => astra_responsive_font( $site_tagline_font_size, 'mobile' ),
				),
				'.entry-title'                   => array(
					'font-size' => astra_responsive_font( $archive_post_title_font_size, 'mobile', 30 ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h1, .entry-content h1, .entry-content h1 a',
					'h1, .entry-content h1'
				)                                => array(
					'font-size' => astra_responsive_font( $heading_h1_font_size, 'mobile', 30 ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h2, .entry-content h2, .entry-content h2 a',
					'h2, .entry-content h2'
				)                                => array(
					'font-size' => astra_responsive_font( $heading_h2_font_size, 'mobile', 25 ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h3, .entry-content h3, .entry-content h3 a',
					'h3, .entry-content h3'
				)                                => array(
					'font-size' => astra_responsive_font( $heading_h3_font_size, 'mobile', 20 ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h4, .entry-content h4, .entry-content h4 a',
					'h4, .entry-content h4'
				)                                => array(
					'font-size' => astra_responsive_font( $heading_h4_font_size, 'mobile' ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h5, .entry-content h5, .entry-content h5 a',
					'h5, .entry-content h5'
				)                                => array(
					'font-size' => astra_responsive_font( $heading_h5_font_size, 'mobile' ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h6, .entry-content h6, .entry-content h6 a',
					'h6, .entry-content h6'
				)                                => array(
					'font-size' => astra_responsive_font( $heading_h6_font_size, 'mobile' ),
				),

				'.ast-single-post .entry-title, .page-title' => array(
					'font-size' => astra_responsive_font( $single_post_title_font_size, 'mobile', 30 ),
				),
				'.ast-header-break-point .site-branding img, .ast-header-break-point #masthead .site-logo-img .custom-logo-link img' => array(
					'max-width' => astra_get_css_value( $header_logo_width['mobile'], 'px' ),
				),
				'.astra-logo-svg'                => array(
					'width' => astra_get_css_value( $header_logo_width['mobile'], 'px' ),
				),
				'.ast-header-break-point .site-logo-img .custom-mobile-logo-link img' => array(
					'max-width' => astra_get_css_value( $header_logo_width['mobile'], 'px' ),
				),
				'body, .ast-separate-container'  => astra_get_responsive_background_obj( $box_bg_obj, 'mobile' ),
			);

			/* Parse CSS from array()*/
			$parse_css .= astra_parse_css( array_merge( $mobile_typo, $mobile_typography ), '', astra_get_mobile_breakpoint() );

			/*
			 *  Responsive Font Size for Tablet & Mobile to the root HTML element
			 */

			// Tablet Font Size for HTML tag.
			if ( '' == $body_font_size['tablet'] ) {
				$html_tablet_typography = array(
					'html' => array(
						'font-size' => astra_get_font_css_value( (int) $body_font_size_desktop * 5.7, '%' ),
					),
				);
				$parse_css             .= astra_parse_css( $html_tablet_typography, '', astra_get_tablet_breakpoint() );
			}
			// Mobile Font Size for HTML tag.
			if ( '' == $body_font_size['mobile'] ) {
				$html_mobile_typography = array(
					'html' => array(
						'font-size' => astra_get_font_css_value( (int) $body_font_size_desktop * 5.7, '%' ),
					),
				);
			} else {
				$html_mobile_typography = array(
					'html' => array(
						'font-size' => astra_get_font_css_value( (int) $body_font_size_desktop * 6.25, '%' ),
					),
				);
			}
			/* Parse CSS from array()*/
			$parse_css .= astra_parse_css( $html_mobile_typography, '', astra_get_mobile_breakpoint() );

			/* Site width Responsive */
			$site_width = array(
				'.ast-container' => array(
					'max-width' => astra_get_css_value( $site_content_width + 40, 'px' ),
				),
			);

			/* Parse CSS from array()*/
			$parse_css .= astra_parse_css( $site_width, astra_get_tablet_breakpoint( '', 1 ) );

			/**
			 * Astra Fonts
			 */
			if ( apply_filters( 'astra_enable_default_fonts', true ) ) {
				$astra_fonts          = '@font-face {';
					$astra_fonts     .= 'font-family: "Astra";';
					$astra_fonts     .= 'src: url(' . ASTRA_THEME_URI . 'assets/fonts/astra.woff) format("woff"),';
						$astra_fonts .= 'url(' . ASTRA_THEME_URI . 'assets/fonts/astra.ttf) format("truetype"),';
						$astra_fonts .= 'url(' . ASTRA_THEME_URI . 'assets/fonts/astra.svg#astra) format("svg");';
					$astra_fonts     .= 'font-weight: normal;';
					$astra_fonts     .= 'font-style: normal;';
					$astra_fonts     .= 'font-display: ' . astra_get_fonts_display_property() . ';';
				$astra_fonts         .= '}';
				$parse_css           .= $astra_fonts;
			}

			/**
			 * Hide the default naviagtion markup for responsive devices.
			 * Once class .ast-header-break-point is added to the body below CSS will be override by the
			 * .ast-header-break-point class
			 */
			$astra_navigation  = '@media (max-width:' . $header_break_point . 'px) {';
			$astra_navigation .= '.main-header-bar .main-header-bar-navigation{';
			$astra_navigation .= 'display:none;';
			$astra_navigation .= '}';
			$astra_navigation .= '}';
			$parse_css        .= $astra_navigation;

			/* Blog */
			if ( 'custom' === $blog_width ) :

				/* Site width Responsive */
				$blog_css   = array(
					'.blog .site-content > .ast-container, .archive .site-content > .ast-container, .search .site-content > .ast-container' => array(
						'max-width' => astra_get_css_value( $blog_max_width, 'px' ),
					),
				);
				$parse_css .= astra_parse_css( $blog_css, astra_get_tablet_breakpoint( '', 1 ) );
			endif;

			/* Single Blog */
			if ( 'custom' === $single_post_max ) :

				/* Site width Responsive */
				$single_blog_css = array(
					'.single-post .site-content > .ast-container' => array(
						'max-width' => astra_get_css_value( $single_post_max_width, 'px' ),
					),
				);
				$parse_css      .= astra_parse_css( $single_blog_css, astra_get_tablet_breakpoint( '', 1 ) );
			endif;

			// Primary Submenu Border Width & Color.
			$submenu_border_style = array(
				'.ast-desktop .main-header-menu.submenu-with-border .sub-menu, .ast-desktop .main-header-menu.submenu-with-border .astra-full-megamenu-wrapper' => array(
					'border-color' => esc_attr( $primary_submenu_b_color ),
				),

				'.ast-desktop .main-header-menu.submenu-with-border .sub-menu' => array(
					'border-top-width'    => astra_get_css_value( $submenu_border['top'], 'px' ),
					'border-right-width'  => astra_get_css_value( $submenu_border['right'], 'px' ),
					'border-left-width'   => astra_get_css_value( $submenu_border['left'], 'px' ),
					'border-bottom-width' => astra_get_css_value( $submenu_border['bottom'], 'px' ),
					'border-style'        => 'solid',
				),
				'.ast-desktop .main-header-menu.submenu-with-border .sub-menu .sub-menu' => array(
					'top' => ( isset( $submenu_border['top'] ) && '' != $submenu_border['top'] ) ? astra_get_css_value( '-' . $submenu_border['top'], 'px' ) : '',
				),
				'.ast-desktop .main-header-menu.submenu-with-border .sub-menu .menu-link, .ast-desktop .main-header-menu.submenu-with-border .children .menu-link' => array(
					'border-bottom-width' => ( $primary_submenu_item_border ) ? '1px' : '0px',
					'border-style'        => 'solid',
					'border-color'        => esc_attr( $primary_submenu_item_b_color ),
				),
			);

			// Submenu items goes outside?
			$submenu_border_for_left_align_menu = array(
				'.main-header-menu .sub-menu .menu-item.ast-left-align-sub-menu:hover > .sub-menu, .main-header-menu .sub-menu .menu-item.ast-left-align-sub-menu.focus > .sub-menu' => array(
					'margin-left' => ( ( isset( $submenu_border['left'] ) && '' != $submenu_border['left'] ) || isset( $submenu_border['right'] ) && '' != $submenu_border['right'] ) ? astra_get_css_value( '-' . ( (int) $submenu_border['left'] + (int) $submenu_border['right'] ), 'px' ) : '',
				),
			);

			$parse_css .= astra_parse_css( $submenu_border_style );
			// Submenu items goes outside?
			$parse_css .= astra_parse_css( $submenu_border_for_left_align_menu, astra_get_tablet_breakpoint( '', 1 ) );

			/* Small Footer CSS */
			if ( 'disabled' != $small_footer_layout ) :
				$sml_footer_css = array(
					'.ast-small-footer' => array(
						'border-top-style' => 'solid',
						'border-top-width' => astra_get_css_value( $small_footer_divider, 'px' ),
						'border-top-color' => esc_attr( $small_footer_divider_color ),
					),
				);
				$parse_css     .= astra_parse_css( $sml_footer_css );

				if ( 'footer-sml-layout-2' != $small_footer_layout ) {
					$sml_footer_css = array(
						'.ast-small-footer-wrap' => array(
							'text-align' => 'center',
						),
					);
					$parse_css     .= astra_parse_css( $sml_footer_css );
				}
			endif;

			/* 404 Page */
			$parse_css .= astra_parse_css(
				array(
					'.ast-404-layout-1 .ast-404-text' => array(
						'font-size' => astra_get_font_css_value( 100 ),
					),
				),
				'',
				'920'
			);

			$parse_css .= $dynamic_css;
			$custom_css = astra_get_option( 'custom-css' );

			if ( '' != $custom_css ) {
				$parse_css .= $custom_css;
			}

			// trim white space for faster page loading.
			$parse_css = Astra_Enqueue_Scripts::trim_css( $parse_css );
			return apply_filters( 'astra_theme_dynamic_css', $parse_css );

		}

		/**
		 * Return post meta CSS
		 *
		 * @param  string $dynamic_css          Astra Dynamic CSS.
		 * @param  string $dynamic_css_filtered Astra Dynamic CSS Filters.
		 * @return mixed              Return the CSS.
		 */
		public static function return_meta_output( $dynamic_css, $dynamic_css_filtered = '' ) {

			/**
			 * - Page Layout
			 *
			 *   - Sidebar Positions CSS
			 */
			$secondary_width = astra_get_option( 'site-sidebar-width' );
			$primary_width   = absint( 100 - $secondary_width );
			$meta_style      = '';

			// Header Separator.
			$header_separator       = astra_get_option( 'header-main-sep' );
			$header_separator_color = astra_get_option( 'header-main-sep-color' );

			$meta_style = array(
				'.ast-header-break-point .main-header-bar' => array(
					'border-bottom-width' => astra_get_css_value( $header_separator, 'px' ),
					'border-bottom-color' => esc_attr( $header_separator_color ),
				),
			);

			$parse_css = astra_parse_css( $meta_style );

			$meta_style = array(
				'.main-header-bar' => array(
					'border-bottom-width' => astra_get_css_value( $header_separator, 'px' ),
					'border-bottom-color' => esc_attr( $header_separator_color ),
				),
			);

			$parse_css .= astra_parse_css( $meta_style, astra_get_tablet_breakpoint( '', 1 ) );

			if ( 'no-sidebar' !== astra_page_layout() ) :

				$meta_style = array(
					'#primary'   => array(
						'width' => astra_get_css_value( $primary_width, '%' ),
					),
					'#secondary' => array(
						'width' => astra_get_css_value( $secondary_width, '%' ),
					),
				);

				$parse_css .= astra_parse_css( $meta_style, astra_get_tablet_breakpoint( '', 1 ) );

			endif;

			if ( false === self::astra_submenu_below_header_fix() ) :
				// If submenu below header fix is not to be loaded then add removed flex properties from class `ast-flex`.
				// Also restore the padding to class `main-header-bar`.
				$submenu_below_header = array(
					'.ast-flex'          => array(
						'-webkit-align-content' => 'center',
						'-ms-flex-line-pack'    => 'center',
						'align-content'         => 'center',
						'-webkit-box-align'     => 'center',
						'-webkit-align-items'   => 'center',
						'-moz-box-align'        => 'center',
						'-ms-flex-align'        => 'center',
						'align-items'           => 'center',
					),
					'.main-header-bar'   => array(
						'padding' => '1em 0',
					),
					'.ast-site-identity' => array(
						'padding' => '0',
					),
					// CSS to open submenu just below menu.
					'.header-main-layout-1 .ast-flex.main-header-container, .header-main-layout-3 .ast-flex.main-header-container' => array(
						'-webkit-align-content' => 'center',
						'-ms-flex-line-pack'    => 'center',
						'align-content'         => 'center',
						'-webkit-box-align'     => 'center',
						'-webkit-align-items'   => 'center',
						'-moz-box-align'        => 'center',
						'-ms-flex-align'        => 'center',
						'align-items'           => 'center',
					),
				);

				$parse_css .= astra_parse_css( $submenu_below_header );

			else :
				// `.menu-item` required display:flex, although weight of this css increases because of which custom CSS added from child themes to be not working.
				// Hence this is added to dynamic CSS which will be applied only if this filter `astra_submenu_below_header_fix` is enabled.
				// @see https://github.com/brainstormforce/astra/pull/828
				$submenu_below_header = array(
					'.ast-safari-browser-less-than-11 .main-header-menu .menu-item, .ast-safari-browser-less-than-11 .main-header-bar .ast-masthead-custom-menu-items' => array(
						'display' => 'block',
					),
					'.main-header-menu .menu-item, .main-header-bar .ast-masthead-custom-menu-items' => array(
						'-js-display'             => 'flex',
						'display'                 => '-webkit-box',
						'display'                 => '-webkit-flex',
						'display'                 => '-moz-box',
						'display'                 => '-ms-flexbox',
						'display'                 => 'flex',
						'-webkit-box-pack'        => 'center',
						'-webkit-justify-content' => 'center',
						'-moz-box-pack'           => 'center',
						'-ms-flex-pack'           => 'center',
						'justify-content'         => 'center',
						'-webkit-box-orient'      => 'vertical',
						'-webkit-box-direction'   => 'normal',
						'-webkit-flex-direction'  => 'column',
						'-moz-box-orient'         => 'vertical',
						'-moz-box-direction'      => 'normal',
						'-ms-flex-direction'      => 'column',
						'flex-direction'          => 'column',
					),
					'.main-header-menu > .menu-item > .menu-link' => array(
						'height'              => '100%',
						'-webkit-box-align'   => 'center',
						'-webkit-align-items' => 'center',
						'-moz-box-align'      => 'center',
						'-ms-flex-align'      => 'center',
						'align-items'         => 'center',
						'-js-display'         => 'flex',
						'display'             => '-webkit-box',
						'display'             => '-webkit-flex',
						'display'             => '-moz-box',
						'display'             => '-ms-flexbox',
						'display'             => 'flex',
					),
					'.ast-primary-menu-disabled .main-header-bar .ast-masthead-custom-menu-items' => array(
						'flex' => 'unset',
					),
				);

				$parse_css .= astra_parse_css( $submenu_below_header );

			endif;

			if ( false === self::astra_submenu_open_below_header_fix() ) {
				// If submenu below header fix is not to be loaded then add removed flex properties from class `ast-flex`.
				// Also restore the padding to class `main-header-bar`.
				$submenu_below_header = array(
					// CSS to open submenu just below menu.
					'.header-main-layout-1 .ast-flex.main-header-container, .header-main-layout-3 .ast-flex.main-header-container' => array(
						'-webkit-align-content' => 'center',
						'-ms-flex-line-pack'    => 'center',
						'align-content'         => 'center',
						'-webkit-box-align'     => 'center',
						'-webkit-align-items'   => 'center',
						'-moz-box-align'        => 'center',
						'-ms-flex-align'        => 'center',
						'align-items'           => 'center',
					),
				);

				$parse_css .= astra_parse_css( $submenu_below_header );
			}

			$dynamic_css .= $parse_css;

			return $dynamic_css;
		}

		/**
		 * Conditionally iclude CSS Selectors with anchors in the typography settings.
		 *
		 * Historically Astra adds Colors/Typography CSS for headings and anchors for headings but this causes irregularities with the expected output.
		 * For eg Link color does not work for the links inside headings.
		 *
		 * If filter `astra_include_achors_in_headings_typography` is set to true or Astra Option `include-headings-in-typography` is set to true, This will return selectors with anchors. Else This will return selectors without anchors.
		 *
		 * @access Private.
		 *
		 * @since 1.4.9
		 * @param String $selectors_with_achors CSS Selectors with anchors.
		 * @param String $selectors_without_achors CSS Selectors withour annchors.
		 *
		 * @return String CSS Selectors based on the condition of filters.
		 */
		private static function conditional_headings_css_selectors( $selectors_with_achors, $selectors_without_achors ) {

			if ( true == self::anchors_in_css_selectors_heading() ) {
				return $selectors_with_achors;
			} else {
				return $selectors_without_achors;
			}

		}

		/**
		 * Check if CSS selectors in Headings should use anchors.
		 *
		 * @since 1.4.9
		 * @return boolean true if it should include anchors, False if not.
		 */
		public static function anchors_in_css_selectors_heading() {

			if ( true == astra_get_option( 'include-headings-in-typography' ) &&
				true === apply_filters(
					'astra_include_achors_in_headings_typography',
					true
				) ) {

					return true;
			} else {

				return false;
			}

		}

		/**
		 * Check backwards compatibility CSS for loading submenu below the header needs to be added.
		 *
		 * @since 1.5.0
		 * @return boolean true if CSS should be included, False if not.
		 */
		public static function astra_submenu_below_header_fix() {

			if ( false == astra_get_option( 'submenu-below-header', true ) &&
				false === apply_filters(
					'astra_submenu_below_header_fix',
					false
				) ) {

					return false;
			} else {

				return true;
			}

		}

		/**
		 * Check backwards compatibility CSS for loading submenu below the header needs to be added.
		 *
		 * @since 2.1.3
		 * @return boolean true if submenu below header fix is to be loaded, False if not.
		 */
		public static function astra_submenu_open_below_header_fix() {

			if ( false == astra_get_option( 'submenu-open-below-header', true ) &&
				false === apply_filters(
					'astra_submenu_open_below_header_fix',
					false
				) ) {

					return false;
			} else {

				return true;
			}

		}

		/**
		 * Check backwards compatibility to not load default CSS for the button styling of Page Builders.
		 *
		 * @since 2.2.0
		 * @return boolean true if button style CSS should be loaded, False if not.
		 */
		public static function page_builder_button_style_css() {
			$astra_settings                                  = get_option( ASTRA_THEME_SETTINGS );
			$astra_settings['pb-button-color-compatibility'] = ( isset( $astra_settings['pb-button-color-compatibility'] ) && false === $astra_settings['pb-button-color-compatibility'] ) ? false : true;
			return apply_filters( 'astra_page_builder_button_style_css', $astra_settings['pb-button-color-compatibility'] );
		}

		/**
		 * Elementor Theme Style - Button Text Color compatibility. This should be looked in the future for proper solution.
		 *
		 * Reference: https://github.com/elementor/elementor/issues/10733
		 * Reference: https://github.com/elementor/elementor/issues/10739
		 *
		 * @since 2.3.3
		 *
		 * @return mixed
		 */
		public static function is_elementor_kit_button_color_set() {
			$ele_btn_global_text_color = false;
			$ele_kit_id                = get_option( 'elementor_active_kit', false );
			if ( false !== $ele_kit_id ) {
				$ele_global_btn_data = get_post_meta( $ele_kit_id, '_elementor_page_settings' );
				// Elementor Global theme style button text color fetch value from database.
				$ele_btn_global_text_color = isset( $ele_global_btn_data[0]['button_text_color'] ) ? $ele_global_btn_data[0]['button_text_color'] : $ele_btn_global_text_color;
			}
			return $ele_btn_global_text_color;
		}

		/**
		 * Check if Elementor - Disable Default Colors or Disable Default Fonts checked or unchecked.
		 *
		 * @since  2.3.3
		 *
		 * @return mixed String if any of the settings are enabled. False if no settings are enabled.
		 */
		public static function elementor_default_color_font_setting() {
			$ele_default_color_setting = get_option( 'elementor_disable_color_schemes' );
			$ele_default_typo_setting  = get_option( 'elementor_disable_typography_schemes' );

			if ( ( 'yes' === $ele_default_color_setting && 'yes' === $ele_default_typo_setting ) || ( false === self::is_elementor_default_color_font_comp() ) ) {
				return 'color-typo';
			}

			if ( 'yes' === $ele_default_color_setting ) {
				return 'color';
			}

			if ( 'yes' === $ele_default_typo_setting ) {
				return 'typo';
			}

			return false;

		}

		/**
		 * For existing users, do not provide Elementor Default Color Typo settings compatibility by default.
		 *
		 * @since 2.3.3
		 * @return boolean true if elementor default color and typo setting should work with theme, False if not.
		 */
		public static function is_elementor_default_color_font_comp() {
			$astra_settings                                        = get_option( ASTRA_THEME_SETTINGS );
			$astra_settings['ele-default-color-typo-setting-comp'] = ( isset( $astra_settings['ele-default-color-typo-setting-comp'] ) && false === $astra_settings['ele-default-color-typo-setting-comp'] ) ? false : true;
			return apply_filters( 'astra_elementor_default_color_font_comp', $astra_settings['ele-default-color-typo-setting-comp'] );
		}

		/**
		 * For existing users, do not load the wide/full width image CSS by default.
		 *
		 * @since 2.4.4
		 * @return boolean false if it is an existing user , true if not.
		 */
		public static function gtn_image_group_css_comp() {
			$astra_settings                                = get_option( ASTRA_THEME_SETTINGS );
			$astra_settings['gtn-full-wide-image-grp-css'] = isset( $astra_settings['gtn-full-wide-image-grp-css'] ) ? false : true;
			return apply_filters( 'gtn_image_group_css_comp', $astra_settings['gtn-full-wide-image-grp-css'] );
		}

		/**
		 * Do not apply new wide/full Group and Cover block CSS for existing users.
		 *
		 * @since 2.5.0
		 * @return boolean false if it is an existing user , true if not.
		 */
		public static function gtn_group_cover_css_comp() {
			$astra_settings                                = get_option( ASTRA_THEME_SETTINGS );
			$astra_settings['gtn-full-wide-grp-cover-css'] = isset( $astra_settings['gtn-full-wide-grp-cover-css'] ) ? false : true;
			return apply_filters( 'astra_gtn_group_cover_css_comp', $astra_settings['gtn-full-wide-grp-cover-css'] );
		}
	}
}
