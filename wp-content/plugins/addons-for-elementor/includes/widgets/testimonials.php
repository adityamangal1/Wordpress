<?php

/*
Widget Name: Testimonials
Description: Display testimonials from your clients/customers in a multi-column grid.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/

namespace LivemeshAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class LAE_Testimonials_Widget extends Widget_Base {

    public function get_name() {
        return 'lae-testimonials';
    }

    public function get_title() {
        return __('Testimonials', 'livemesh-el-addons');
    }

    public function get_icon() {
        return 'fa fa-comments-o';
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
            'section_testimonials',
            [
                'label' => __('Testimonials', 'livemesh-el-addons'),
            ]
        );

        $this->add_responsive_control(
            'per_line',
            [
                'label' => __( 'Columns per row', 'livemesh-el-addons' ),
                'type' => Controls_Manager::SELECT,
                'default' => '3',
                'tablet_default' => '2',
                'mobile_default' => '1',
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
            'testimonials',
            [
                'label' => __('Testimonials', 'livemesh-el-addons'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' => [
                    [
                        'client_name' => __('Customer #1', 'livemesh-el-addons'),
                        'credentials' => __('CEO, Invision Inc.', 'livemesh-el-addons'),
                        'testimonial_text' => __('I am testimonial text. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'livemesh-el-addons'),
                    ],
                    [
                        'client_name' => __('Customer #2', 'livemesh-el-addons'),
                        'credentials' => __('Lead Developer, Automattic Inc', 'livemesh-el-addons'),
                        'testimonial_text' => __('I am testimonial text. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'livemesh-el-addons'),
                    ],
                    [
                        'client_name' => __('Customer #3', 'livemesh-el-addons'),
                        'credentials' => __('Store Manager, Walmart Inc', 'livemesh-el-addons'),
                        'testimonial_text' => __('I am testimonial text. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'livemesh-el-addons'),
                    ],
                ],
                'fields' => [
                    [
                        'name' => 'client_name',
                        'label' => __('Name', 'livemesh-el-addons'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('My client name', 'livemesh-el-addons'),
                        'description' => __('The client or customer name for the testimonial', 'livemesh-el-addons'),
                        'dynamic' => [
                            'active' => true,
                        ],
                    ],
                    [
                        'name' => 'credentials',
                        'label' => __('Client Details', 'livemesh-el-addons'),
                        'type' => Controls_Manager::TEXT,
                        'description' => __('The details of the client/customer like company name, credential held, company URL etc. HTML accepted.', 'livemesh-el-addons'),
                        'dynamic' => [
                            'active' => true,
                        ],
                    ],

                    [
                        'name' => 'client_image',
                        'label' => __('Customer/Client Image', 'livemesh-el-addons'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                        'dynamic' => [
                            'active' => true,
                        ],
                    ],

                    [
                        'name' => 'testimonial_text',
                        'label' => __('Testimonials Text', 'livemesh-el-addons'),
                        'type' => Controls_Manager::WYSIWYG,
                        'description' => __('What your customer/client had to say', 'livemesh-el-addons'),
                        'show_label' => false,
                        'dynamic' => [
                            'active' => true,
                        ],
                    ],
                    
                    [
                        "type" => Controls_Manager::SELECT,
                        "name" => "widget_animation",
                        "label" => __("Animation Type", "livemesh-el-addons"),
                        'options' => lae_get_animation_options(),
                        'default' => 'none',
                    ],
                    
                ],
                'title_field' => '{{{ client_name }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_testimonials_thumbnail',
            [
                'label' => __( 'Author Thumbnail', 'livemesh-el-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'show_label' => false,
            ]
        );

        $this->add_control(
            'thumbnail_border_radius',
            [
                'label' => __('Thumbnail Border Radius', 'livemesh-el-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .lae-testimonials .lae-testimonial-user .lae-image-wrapper img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'thumbnail_size',
            [
                'label' => __('Thumbnail Size', 'livemesh-el-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ '%', 'px' ],
                'range' => [
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 50,
                        'max' => 156,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .lae-testimonials .lae-testimonial-user .lae-image-wrapper img' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_testimonials_text',
            [
                'label' => __('Author Testimonial', 'livemesh-el-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_responsive_control(
            'text_padding',
            [
                'label' => __('Text Padding', 'livemesh-el-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .lae-testimonials .lae-testimonial-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'isLinked' => false,
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => __( 'Color', 'livemesh-el-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-testimonials .lae-testimonial-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'text_border_color',
            [
                'label' => __( 'Border Color', 'livemesh-el-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-testimonials .lae-testimonial-text, {{WRAPPER}} .lae-testimonials .lae-testimonial-text:after' => 'border-color: {{VALUE}};',
                ],
            ]
        );



        $this->add_control(
            'text_border_width',
            [
                'label' => __( 'Border Width', 'livemesh-el-addons' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 5,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .lae-testimonials .lae-testimonial-text, {{WRAPPER}} .lae-testimonials .lae-testimonial-text:after' => 'border-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'selector' => '{{WRAPPER}} .lae-testimonials .lae-testimonial-text',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_testimonials_author_name',
            [
                'label' => __( 'Author Name', 'livemesh-el-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __( 'Title HTML Tag', 'livemesh-el-addons' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => __( 'H1', 'livemesh-el-addons' ),
                    'h2' => __( 'H2', 'livemesh-el-addons' ),
                    'h3' => __( 'H3', 'livemesh-el-addons' ),
                    'h4' => __( 'H4', 'livemesh-el-addons' ),
                    'h5' => __( 'H5', 'livemesh-el-addons' ),
                    'h6' => __( 'H6', 'livemesh-el-addons' ),
                    'div' => __( 'div', 'livemesh-el-addons' ),
                ],
                'default' => 'h4',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Color', 'livemesh-el-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-testimonials .lae-testimonial-user .lae-text .lae-author-name' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .lae-testimonials .lae-testimonial-user .lae-text .lae-author-name',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_testimonials_author_credentials',
            [
                'label' => __('Author Credentials', 'livemesh-el-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'credential_color',
            [
                'label' => __( 'Color', 'livemesh-el-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-testimonials .lae-testimonial-user .lae-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'credential_typography',
                'selector' => '{{WRAPPER}} .lae-testimonials .lae-testimonial-user .lae-text',
            ]
        );


        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        $settings = apply_filters('lae_testimonials_' . $this->get_id() . '_settings', $settings);

        $output = '<div class="lae-testimonials lae-grid-container ' . lae_get_grid_classes($settings) . '">';

        foreach ($settings['testimonials'] as $testimonial) :

            list($animate_class, $animation_attr) = lae_get_animation_atts($testimonial['widget_animation']);

            $child_output = '<div class="lae-grid-item lae-testimonial ' . $animate_class . '" ' . $animation_attr . '>';

            $child_output .= '<div class="lae-testimonial-text">';

            $child_output .= $this->parse_text_editor($testimonial['testimonial_text']);

            $child_output .= '</div>';

            $child_output .= '<div class="lae-testimonial-user">';

            $child_output .= '<div class="lae-image-wrapper">';

            $client_image = $testimonial['client_image'];

            if (!empty($client_image)):

                $child_output .= wp_get_attachment_image($client_image['id'], 'thumbnail', false, array('class' => 'lae-image full'));

            endif;

            $child_output .= '</div>';

            $child_output .= '<div class="lae-text">';

            $child_output .= '<' . $settings['title_tag'] . ' class="lae-author-name">' . esc_html($testimonial['client_name']) . '</' . $settings['title_tag'] . '>';

            $child_output .= '<div class="lae-author-credentials">' . wp_kses_post($testimonial['credentials']) . '</div>';

            $child_output .= '</div><!-- .lae-text -->';

            $child_output .= '</div><!-- .lae-testimonial-user -->';

            $child_output .= '</div><!-- .lae-testimonial -->';

            $output .= apply_filters('lae_testimonial_output', $child_output, $testimonial, $settings);

        endforeach;

        $output .= '</div><!-- .lae-testimonials -->';

        $output .= '<div class="lae-clear"></div>';

        echo apply_filters('lae_testimonials_output', $output, $settings);

    }

    protected function content_template() {
    }

}