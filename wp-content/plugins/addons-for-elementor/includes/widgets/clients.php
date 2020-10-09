<?php

/*
Widget Name: Clients
Description: Display one or more clients depicting a percentage value in a multi-column grid.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/

namespace LivemeshAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class LAE_Clients_Widget extends Widget_Base {

    public function get_name() {
        return 'lae-clients';
    }

    public function get_title() {
        return __('Clients', 'livemesh-el-addons');
    }

    public function get_icon() {
        return 'eicon-person';
    }

    public function get_categories() {
        return array('livemesh-addons');
    }

    public function get_script_depends() {
        return [
            'lae-frontend-scripts',
            'lae-waypoints'
        ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_clients',
            [
                'label' => __('Clients', 'livemesh-el-addons'),
            ]
        );

        $this->add_responsive_control(
            'per_line',
            [
                'label' => __( 'Columns per row', 'livemesh-el-addons' ),
                'type' => Controls_Manager::SELECT,
                'default' => '4',
                'tablet_default' => '3',
                'mobile_default' => '2',
                'options' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                ],
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'widget_animation',
            [
                "type" => Controls_Manager::SELECT,
                "label" => __("Animation Type", "livemesh-el-addons"),
                'options' => lae_get_animation_options(),
                'default' => 'none',
            ]
        );

        $this->add_control(
            'clients',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => [

                    [
                        'name' => 'client_name',
                        'type' => Controls_Manager::TEXT,
                        'label' => __('Client Name', 'livemesh-el-addons'),
                        'label_block' => true,
                        'description' => __('The name of the client/customer.', 'livemesh-el-addons'),
                        'default' => __('My client name', 'livemesh-el-addons'),
                        'dynamic' => [
                            'active' => true,
                        ],
                    ],

                    [
                        'name' => 'client_link',
                        'label' => __('Client URL', 'livemesh-el-addons'),
                        'description' => __('The website of the client/customer.', 'livemesh-el-addons'),
                        'type' => Controls_Manager::URL,
                        'label_block' => true,
                        'default' => [
                            'url' => '',
                            'is_external' => 'true',
                        ],
                        'placeholder' => __('http://client-link.com', 'livemesh-el-addons'),
                        'dynamic' => [
                            'active' => true,
                        ],
                    ],

                    [
                        'name' => 'client_image',
                        'label' => __('Client Logo/Image', 'livemesh-el-addons'),
                        'description' => __('The logo image for the client/customer.', 'livemesh-el-addons'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                        'dynamic' => [
                            'active' => true,
                        ],
                    ],

                ],
                'title_field' => '{{{ client_name }}}',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_styling',
            [
                'label' => __('Clients', 'livemesh-el-addons'),
                'tab' => Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_control(
            'heading_client_image',
            [
                'label' => __( 'Client Images', 'livemesh-el-addons' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'client_border_color',
            [
                'label' => __( 'Client Border Color', 'livemesh-el-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-clients .lae-client' => 'border-color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'client_hover_bg_color',
            [
                'label' => __( 'Client Hover Color', 'livemesh-el-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-clients .lae-client .lae-image-overlay' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'thumbnail_hover_opacity',
            [
                'label' => __( 'Thumbnail Hover Opacity (%)', 'livemesh-el-addons' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0.7,
                ],
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .lae-clients .lae-client:hover .lae-image-overlay' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_control(
            'client_padding',
            [
                'label' => __('Client Padding', 'livemesh-el-addons'),
                'description' => __('Padding for the client images.', 'livemesh-el-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .lae-clients .lae-client' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'heading_client_name',
            [
                'label' => __( 'Client Name', 'livemesh-el-addons' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'client_name_color',
            [
                'label' => __( 'Client Name Color', 'livemesh-el-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-clients .lae-client .lae-client-name a' => 'color: {{VALUE}};',
                ],
            ]
        );




        $this->add_control(
            'client_name_hover_color',
            [
                'label' => __( 'Client Name Hover Color', 'livemesh-el-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-clients .lae-client .lae-client-name a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'client_name_typography',
                'selector' => '{{WRAPPER}} .lae-clients .lae-client .lae-client-name a',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        $settings = apply_filters('lae_clients_' . $this->get_id() . '_settings', $settings);

        list($animate_class, $animation_attr) = lae_get_animation_atts($settings['widget_animation']);

        $output = '<div class="lae-clients lae-gapless-grid">';

        $output .= '<div class="lae-grid-container ' . lae_get_grid_classes($settings) . '">';

        foreach ($settings['clients'] as $client):

            $child_output = '<div class="lae-grid-item lae-client ' . $animate_class . '" ' . $animation_attr . '>';

            if (!empty($client['client_image'])):

                $child_output .= wp_get_attachment_image($client['client_image']['id'], 'full', false, array('class' => 'lae-image full', 'alt' => $client['client_name']));

            endif;

            if (!empty($client['client_link']) && !empty($client['client_link']['url'])):

                $target = $client['client_link']['is_external'] ? 'target="_blank"' : '';

                $child_output .= '<div class="lae-client-name">';

                $child_output .= '<a href="' . esc_url($client['client_link']['url']) . ' " title="' . esc_html($client['client_name']) . '" ' . $target . '>' . wp_kses_post($client['client_name']) . '</a>';

                $child_output .= '</div>';

            else:

                $child_output .= '<div class="lae-client-name">' . wp_kses_post($client['client_name']) . '</div>';

            endif;

            $child_output .= '<div class="lae-image-overlay"></div>';

            $child_output .= '</div><!-- .lae-client -->';

            $output .= apply_filters('lae_client_item_output', $child_output, $client, $settings);

        endforeach;

        $output .= '</div>';

        $output .= '</div><!-- .lae-clients -->';

        echo apply_filters('lae_clients_output', $output, $settings);
    }

    protected function content_template() {
    }

}