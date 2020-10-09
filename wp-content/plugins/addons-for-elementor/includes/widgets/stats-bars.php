<?php

/*
Widget Name: Stats Bars
Description: Display multiple stats bars that talk about skills or other percentage stats.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/


namespace LivemeshAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class LAE_Stats_Bars_Widget extends Widget_Base {

    public function get_name() {
        return 'lae-stats-bars';
    }

    public function get_title() {
        return __('Stats Bars', 'livemesh-el-addons');
    }

    public function get_icon() {
        return 'fa fa-tasks';
    }

    public function get_categories() {
        return array('livemesh-addons');
    }

    public function get_script_depends() {
        return [
            'lae-widgets-scripts',
            'lae-frontend-scripts',
            'lae-waypoints'
        ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_stats_bars',
            [
                'label' => __('Stats Bars', 'livemesh-el-addons'),
            ]
        );

        $this->add_control(
            'stats_bars',
            [
                'type' => Controls_Manager::REPEATER,
                'default' => [
                    [
                        'stats_title' => __('Web Design', 'livemesh-el-addons'),
                        'percentage_value' => 87,
                    ],

                    [
                        'stats_title' => __('SEO Services', 'livemesh-el-addons'),
                        'percentage_value' => 76,
                    ],

                    [
                        'stats_title' => __('Brand Marketing', 'livemesh-el-addons'),
                        'percentage_value' => 40,
                    ],
                ],
                'fields' => [
                    [
                        'name' => 'stats_title',
                        'label' => __('Stats Title', 'livemesh-el-addons'),
                        'type' => Controls_Manager::TEXT,
                        'description' => __('The title for the stats bar', 'livemesh-el-addons'),
                        'default' => __('My stats title', 'livemesh-el-addons'),
                        'dynamic' => [
                            'active' => true,
                        ],
                    ],

                    [
                        'name' => 'percentage_value',
                        'label' => __('Percentage Value', 'livemesh-el-addons'),
                        'type' => Controls_Manager::NUMBER,
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                        'default' => 30,
                        'description' => __('The percentage value for the stats.', 'livemesh-el-addons'),
                    ],

                    [
                        'name' => 'bar_color',
                        'label' => __('Bar Color', 'livemesh-el-addons'),
                        'type' => Controls_Manager::COLOR,
                        'default' => '#f94213',
                    ],

                ],
                'title_field' => '{{{ stats_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_stats_bar_styling',
            [
                'label' => __('Stats Bar', 'livemesh-el-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'stats_bar_bg_color',
            [
                'label' => __('Stats Bar Background Color', 'livemesh-el-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-stats-bars .lae-stats-bar .lae-stats-bar-bg' => 'background-color: {{VALUE}};',
                ],
            ]
        );



        $this->add_control(
            'stats_bar_spacing',
            [
                'label' => __('Stats Bar Spacing', 'livemesh-el-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 18,
                ],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 128,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .lae-stats-bars .lae-stats-bar' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'stats_bar_height',
            [
                'label' => __('Stats Bar Height', 'livemesh-el-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 10,
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 96,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .lae-stats-bars .lae-stats-bar .lae-stats-bar-bg, {{WRAPPER}} .lae-stats-bars .lae-stats-bar .lae-stats-bar-content' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .lae-stats-bars .lae-stats-bar .lae-stats-bar-bg' => 'margin-top: -{{SIZE}}{{UNIT}};',
                ],
            ]
        );



        $this->add_control(
            'stats_bar_border_radius',
            [
                'label' => __('Stats Bar Border Radius', 'livemesh-el-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .lae-stats-bars .lae-stats-bar .lae-stats-bar-bg, {{WRAPPER}} .lae-stats-bars .lae-stats-bar .lae-stats-bar-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );



        $this->end_controls_section();


        $this->start_controls_section(
            'section_stats_title',
            [
                'label' => __('Stats Title', 'livemesh-el-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'stats_title_color',
            [
                'label' => __('Color', 'livemesh-el-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-stats-bars .lae-stats-bar .lae-stats-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'stats_title_typography',
                'selector' => '{{WRAPPER}} .lae-stats-bars .lae-stats-bar .lae-stats-title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_stats_percentage',
            [
                'label' => __('Stats Percentage', 'livemesh-el-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'stats_percentage_color',
            [
                'label' => __('Color', 'livemesh-el-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-stats-bars .lae-stats-bar .lae-stats-title span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'stats_percentage_typography',
                'selector' => '{{WRAPPER}} .lae-stats-bars .lae-stats-bar .lae-stats-title span',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        $settings = apply_filters('lae_stats_bars_' . $this->get_id() . '_settings', $settings);

        $output = '<div class="lae-stats-bars">';

        foreach ($settings['stats_bars'] as $stats_bar) :

            $color_style = '';
            $color = $stats_bar['bar_color'];
            if ($color)
                $color_style = ' style="background:' . esc_attr($color) . ';"';

            $child_output = '<div class="lae-stats-bar">';

            $child_output .= '<div class="lae-stats-title">';

            $child_output .= esc_html($stats_bar['stats_title']);

            $child_output .= '<span>' . esc_attr($stats_bar['percentage_value']) . '%</span>';

            $child_output .= '</div>';

            $child_output .= '<div class="lae-stats-bar-wrap">';

            $child_output .= '<div ' . $color_style . ' class="lae-stats-bar-content" data-perc="' . esc_attr($stats_bar['percentage_value']) . '"></div>';

            $child_output .= '<div class="lae-stats-bar-bg"></div>';

            $child_output .= '</div>';

            $child_output .= '</div><!-- .lae-stats-bar -->';

            $output .= apply_filters('lae_stats_bar_output', $child_output, $stats_bar, $settings);

        endforeach;

        $output .= '</div><!-- .lae-stats-bars -->';

        echo apply_filters('lae_stats_bars_output', $output, $settings);

    }

    protected function content_template() {

    }

}