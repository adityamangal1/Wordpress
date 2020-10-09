<?php

/*
Widget Name: Piecharts
Description: Display one or more piecharts depicting a percentage value in a multi-column grid.
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


class LAE_Piecharts_Widget extends Widget_Base {

    public function get_name() {
        return 'lae-piecharts';
    }

    public function get_title() {
        return __('Piecharts', 'livemesh-el-addons');
    }

    public function get_icon() {
        return 'eicon-counter-circle';
    }

    public function get_categories() {
        return array('livemesh-addons');
    }

    public function get_script_depends() {
        return [
            'lae-widgets-scripts',
            'lae-frontend-scripts',
            'lae-waypoints',
            'jquery-stats'
        ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_piecharts',
            [
                'label' => __('Piecharts', 'livemesh-el-addons'),
            ]
        );

        $this->add_responsive_control(
            'per_line',
            [
                'label' => __( 'Piecharts per row', 'livemesh-el-addons' ),
                'type' => Controls_Manager::SELECT,
                'default' => '4',
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
            'piecharts',
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
                        'stats_title' => __('WordPress Development', 'livemesh-el-addons'),
                        'percentage_value' => 90,
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
                        'default' => __('My stats title', 'livemesh-el-addons'),
                        'description' => __('The title for the piechart', 'livemesh-el-addons'),
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

                ],
                'title_field' => '{{{ stats_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_styling',
            [
                'label' => __('Piechart Styling', 'livemesh-el-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'bar_color',
            [
                'label' => __('Bar color', 'livemesh-el-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#f94213',
            ]
        );


        $this->add_control(
            'track_color',
            [
                'label' => __('Track color', 'livemesh-el-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#dddddd',
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
                    '{{WRAPPER}} .lae-piechart .lae-label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'stats_title_typography',
                'selector' => '{{WRAPPER}} .lae-piechart .lae-label',
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
                    '{{WRAPPER}} .lae-piechart .lae-percentage span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'stats_percentage_typography',
                'selector' => '{{WRAPPER}} .lae-piechart .lae-percentage span',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_stats_percentage_symbol',
            [
                'label' => __('Stats Percentage Symbol', 'livemesh-el-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'stats_percentage_symbol_color',
            [
                'label' => __('Color', 'livemesh-el-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-piechart .lae-percentage sup' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'stats_percentage_symbol_typography',
                'selector' => '{{WRAPPER}} .lae-piechart .lae-percentage sup',
            ]
        );


    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        $settings = apply_filters('lae_piecharts_' . $this->get_id() . '_settings', $settings);

        $bar_color = ' data-bar-color="' . esc_attr($settings['bar_color']) . '"';
        $track_color = ' data-track-color="' . esc_attr($settings['track_color']) . '"';

        $output = '<div class="lae-piecharts lae-grid-container ' . lae_get_grid_classes($settings) . '">';

        foreach ($settings['piecharts'] as $piechart):

            $child_output = '<div class="lae-grid-item lae-piechart">';

            $child_output .= '<div class="lae-percentage"' . $bar_color . $track_color . ' data-percent="' . round($piechart['percentage_value']) . '">';

            $child_output .= '<span>' . round($piechart['percentage_value']) . '<sup>%</sup>' . '</span>';

            $child_output .= '</div>';

            $child_output .= '<div class="lae-label">' . esc_html($piechart['stats_title']) . '</div>';

            $child_output .= '</div><!-- .lae-piechart -->';

            $output .= apply_filters('lae_piechart_output', $child_output, $piechart, $settings);

        endforeach;

        $output .= '</div><!-- .lae-piecharts -->';

        $output .= '<div class="lae-clear"></div>';

        echo apply_filters('lae_piecharts_output', $output, $settings);

    }

    protected function content_template() {
    }

}