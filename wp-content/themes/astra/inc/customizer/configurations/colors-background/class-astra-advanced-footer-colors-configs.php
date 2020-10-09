<?php
/**
 * Styling Options for Astra Theme.
 *
 * @package     Astra
 * @author      Astra
 * @copyright   Copyright (c) 2020, Astra
 * @link        https://wpastra.com/
 * @since       1.4.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Astra_Adv_Footer_Colors_Configs' ) ) {

	/**
	 * Register Advanced Footer Color Customizer Configurations.
	 */
	class Astra_Advanced_Footer_Colors_Configs extends Astra_Customizer_Config_Base {

		/**
		 * Register Advanced Footer Color Customizer Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {
			$_configs = array(

				/**
				 * Option: Footer Widget Color & Background Section heading
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[footer-widget-color-background-heading-divider]',
					'type'     => 'control',
					'control'  => 'ast-heading',
					'section'  => 'section-footer-adv',
					'title'    => __( 'Colors & Background', 'astra' ),
					'priority' => 46,
					'settings' => array(),
					'required' => array( ASTRA_THEME_SETTINGS . '[footer-adv]', '!=', 'disabled' ),
				),

				/**
				 * Option: Footer Bar Content Group
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[footer-widget-background-group]',
					'default'   => astra_get_option( 'footer-widget-background-group' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'Background', 'astra' ),
					'section'   => 'section-footer-adv',
					'transport' => 'postMessage',
					'priority'  => 47,
					'required'  => array( ASTRA_THEME_SETTINGS . '[footer-adv]', '!=', 'disabled' ),
				),

				/**
				 * Option: Footer Bar Content Group
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[footer-widget-content-group]',
					'default'   => astra_get_option( 'footer-widget-content-group' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'Content', 'astra' ),
					'section'   => 'section-footer-adv',
					'transport' => 'postMessage',
					'priority'  => 48,
					'required'  => array( ASTRA_THEME_SETTINGS . '[footer-adv]', '!=', 'disabled' ),
				),

				/**
				 * Option: Widget Title Color
				 */
				array(
					'name'    => 'footer-adv-wgt-title-color',
					'type'    => 'sub-control',
					'parent'  => ASTRA_THEME_SETTINGS . '[footer-widget-content-group]',
					'section' => 'section-footer-adv',
					'tab'     => __( 'Normal', 'astra' ),
					'control' => 'ast-color',
					'title'   => __( 'Title Color', 'astra' ),
					'default' => '',
				),

				/**
				 * Option: Text Color
				 */
				array(
					'name'    => 'footer-adv-text-color',
					'type'    => 'sub-control',
					'parent'  => ASTRA_THEME_SETTINGS . '[footer-widget-content-group]',
					'section' => 'section-footer-adv',
					'tab'     => __( 'Normal', 'astra' ),
					'control' => 'ast-color',
					'title'   => __( 'Text Color', 'astra' ),
					'default' => '',
				),

				/**
				 * Option: Link Color
				 */
				array(
					'name'    => 'footer-adv-link-color',
					'type'    => 'sub-control',
					'parent'  => ASTRA_THEME_SETTINGS . '[footer-widget-content-group]',
					'section' => 'section-footer-adv',
					'tab'     => __( 'Normal', 'astra' ),
					'control' => 'ast-color',
					'title'   => __( 'Link Color', 'astra' ),
					'default' => '',
				),

				/**
				 * Option: Link Hover Color
				 */
				array(
					'name'    => 'footer-adv-link-h-color',
					'type'    => 'sub-control',
					'parent'  => ASTRA_THEME_SETTINGS . '[footer-widget-content-group]',
					'section' => 'section-footer-adv',
					'tab'     => __( 'Hover', 'astra' ),
					'control' => 'ast-color',
					'title'   => __( 'Link Color', 'astra' ),
					'default' => '',
				),

				/**
				 * Option: Footer widget Background
				 */
				array(
					'name'    => 'footer-adv-bg-obj',
					'type'    => 'sub-control',
					'parent'  => ASTRA_THEME_SETTINGS . '[footer-widget-background-group]',
					'section' => 'section-footer-adv',
					'control' => 'ast-background',
					'default' => astra_get_option( 'footer-adv-bg-obj' ),
					'label'   => __( 'Background', 'astra' ),
				),
			);

			$configurations = array_merge( $configurations, $_configs );

			return $configurations;
		}
	}
}

new Astra_Advanced_Footer_Colors_Configs();


