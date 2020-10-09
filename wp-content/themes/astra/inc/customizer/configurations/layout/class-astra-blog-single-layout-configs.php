<?php
/**
 * Bottom Footer Options for Astra Theme.
 *
 * @package     Astra
 * @author      Astra
 * @copyright   Copyright (c) 2020, Astra
 * @link        https://wpastra.com/
 * @since       Astra 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Astra_Blog_Single_Layout_Configs' ) ) {

	/**
	 * Register Blog Single Layout Configurations.
	 */
	class Astra_Blog_Single_Layout_Configs extends Astra_Customizer_Config_Base {

		/**
		 * Register Blog Single Layout Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$_configs = array(

				/**
				 * Option: Single Post Content Width
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[blog-single-width]',
					'type'     => 'control',
					'control'  => 'select',
					'section'  => 'section-blog-single',
					'default'  => astra_get_option( 'blog-single-width' ),
					'priority' => 5,
					'title'    => __( 'Content Width', 'astra' ),
					'choices'  => array(
						'default' => __( 'Default', 'astra' ),
						'custom'  => __( 'Custom', 'astra' ),
					),
					'partial'  => array(
						'selector'            => '.ast-single-post .site-content .ast-container .content-area .entry-title',
						'container_inclusive' => false,
					),
				),

				/**
				 * Option: Enter Width
				 */
				array(
					'name'        => ASTRA_THEME_SETTINGS . '[blog-single-max-width]',
					'type'        => 'control',
					'control'     => 'ast-slider',
					'section'     => 'section-blog-single',
					'transport'   => 'postMessage',
					'default'     => 1200,
					'required'    => array( ASTRA_THEME_SETTINGS . '[blog-single-width]', '===', 'custom' ),
					'priority'    => 5,
					'title'       => __( 'Custom Width', 'astra' ),
					'suffix'      => '',
					'input_attrs' => array(
						'min'  => 768,
						'step' => 1,
						'max'  => 1920,
					),
				),

				/**
				 * Option: Divider
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[ast-styling-section-blog-single-width]',
					'type'     => 'control',
					'control'  => 'ast-divider',
					'section'  => 'section-blog-single',
					'priority' => 5,
					'settings' => array(),
				),

				/**
				 * Option: Display Post Structure
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[blog-single-post-structure]',
					'type'     => 'control',
					'control'  => 'ast-sortable',
					'section'  => 'section-blog-single',
					'default'  => astra_get_option( 'blog-single-post-structure' ),
					'priority' => 5,
					'title'    => __( 'Structure', 'astra' ),
					'choices'  => array(
						'single-image'      => __( 'Featured Image', 'astra' ),
						'single-title-meta' => __( 'Title & Blog Meta', 'astra' ),
					),
				),

				/**
				 * Option: Single Post Meta
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[blog-single-meta]',
					'type'     => 'control',
					'control'  => 'ast-sortable',
					'default'  => astra_get_option( 'blog-single-meta' ),
					'required' => array( ASTRA_THEME_SETTINGS . '[blog-single-post-structure]', 'contains', 'single-title-meta' ),
					'section'  => 'section-blog-single',
					'priority' => 5,
					'title'    => __( 'Meta', 'astra' ),
					'choices'  => array(
						'comments' => __( 'Comments', 'astra' ),
						'category' => __( 'Category', 'astra' ),
						'author'   => __( 'Author', 'astra' ),
						'date'     => __( 'Publish Date', 'astra' ),
						'tag'      => __( 'Tag', 'astra' ),
					),
				),
			);

			$configurations = array_merge( $configurations, $_configs );

			return $configurations;

		}
	}
}


new Astra_Blog_Single_Layout_Configs();





