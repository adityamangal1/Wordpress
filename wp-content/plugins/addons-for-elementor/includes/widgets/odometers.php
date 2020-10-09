<?php

/*
Widget Name: Odometers
Description: Display one or more animated odometer statistics in a multi-column grid.
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
use Elementor\Icons_Manager;
use Elementor\Modules\DynamicTags\Module as TagsModule;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class LAE_Odometers_Widget extends Widget_Base {

    public function get_name() {
        return 'lae-odometers';
    }

    public function get_title() {
        return __('Odometers', 'livemesh-el-addons');
    }

    public function get_icon() {
        return 'eicon-counter';
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
            'section_odometers',
            [
                'label' => __('Odometers', 'livemesh-el-addons'),
            ]
        );

        $this->add_responsive_control(
            'per_line',
            [
                'label' => __( 'Odometers per row', 'livemesh-el-addons' ),
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
            'odometers',
            [
                'label' => __('Odometers', 'livemesh-el-addons'),
                'type' => Controls_Manager::REPEATER,
                'default' => [
                    [
                        'stats_title' => __('No of Customers', 'livemesh-el-addons'),
                        'start_value' => 1000,
                        'stop_value' => 65600,
                        'prefix' => '',
                        'suffix' => ''
                    ],
                    [
                        'stats_title' => __('Hours Worked', 'livemesh-el-addons'),
                        'start_value' => 1,
                        'stop_value' => 34000,
                        'prefix' => '',
                        'suffix' => ''
                    ],
                    [
                        'stats_title' => __('Support Tickets', 'livemesh-el-addons'),
                        'start_value' => 1,
                        'stop_value' => 348,
                        'prefix' => '',
                        'suffix' => 'k'
                    ],
                    [
                        'stats_title' => __('Product Revenue', 'livemesh-el-addons'),
                        'start_value' => 1,
                        'stop_value' => 35,
                        'prefix' => '$',
                        'suffix' => 'm'
                    ],
                ],
                'fields' => [
                    [
                        'name' => 'stats_title',
                        'label' => __('Stats Title', 'livemesh-el-addons'),
                        'default' => __('My stats title', 'livemesh-el-addons'),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'dynamic' => [
                            'active' => true,
                        ],
                    ],
                    [
                        'name' => 'start_value',
                        'label' => __('Start Value', 'livemesh-el-addons'),
                        'type' => Controls_Manager::NUMBER,
                        'default' => 0,
                    ],
                    [
                        'name' => 'stop_value',
                        'label' => __('Stop Value', 'livemesh-el-addons'),
                        'type' => Controls_Manager::NUMBER,
                        'default' => 100,
                    ],

                    [
                        'name' => 'icon_type',
                        'label' => __('Choose Icon Type', 'livemesh-el-addons'),
                        'type' => Controls_Manager::SELECT,
                        'default' => 'icon',
                        'options' => [
                            'icon' => __('Icon', 'livemesh-el-addons'),
                            'icon_image' => __('Icon Image', 'livemesh-el-addons'),
                        ],
                    ],

                    [
                        'name' => 'icon_image',
                        'label' => __('Stats Image', 'livemesh-el-addons'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                        'condition' => [
                            'icon_type' => 'icon_image',
                        ],
                        'dynamic' => [
                            'active' => true,
                        ],
                    ],

                    [
                        'name' => 'selected_icon',
                        'label' => __('Stats Icon', 'livemesh-el-addons'),
                        'type' => Controls_Manager::ICONS,
                        'label_block' => true,
                        'default' => '',
                        'condition' => [
                            'icon_type' => 'icon',
                        ],
                        'fa4compatibility' => 'icon',
                    ],

                    [
                        'name' => 'prefix',
                        'label' => __('Prefix', 'livemesh-el-addons'),
                        'type' => Controls_Manager::TEXT,
                        'description' => __('The prefix string like currency symbols like $ to indicate a monetary value.', 'livemesh-el-addons'),
                        'dynamic' => [
                            'active' => true,
                            'categories' => [
                                TagsModule::POST_META_CATEGORY,
                            ],
                        ],
                    ],

                    [
                        'name' => 'suffix',
                        'label' => __('Suffix', 'livemesh-el-addons'),
                        'type' => Controls_Manager::TEXT,
                        'description' => __('The suffix string like hr for hours or m for million.', 'livemesh-el-addons'),
                        'dynamic' => [
                            'active' => true,
                            'categories' => [
                                TagsModule::POST_META_CATEGORY,
                            ],
                        ],
                    ],

                ],
                'title_field' => '{{{ stats_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_stats_number',
            [
                'label' => __('Stats Number', 'livemesh-el-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'stats_number_color',
            [
                'label' => __( 'Color', 'livemesh-el-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-odometers .lae-odometer .lae-number' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'stats_number_typography',
                'selector' => '{{WRAPPER}} .lae-odometers .lae-odometer .lae-number span',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_stats_prefix_suffix',
            [
                'label' => __('Stats Prefix and Suffix', 'livemesh-el-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'stats_prefix_suffix_color',
            [
                'label' => __( 'Color', 'livemesh-el-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-odometers .lae-odometer .lae-prefix, .lae-odometers .lae-odometer .lae-suffix' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'stats_prefix_suffix_typography',
                'selector' => '{{WRAPPER}} .lae-odometers .lae-odometer .lae-prefix, .lae-odometers .lae-odometer .lae-suffix',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_styling',
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
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .lae-odometers .lae-odometer .lae-stats-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'stats_title_typography',
                'label' => __('Typography', 'livemesh-el-addons'),
                'selector' => '{{WRAPPER}} .lae-odometers .lae-odometer .lae-stats-title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_icon_styling',
            [
                'label' => __('Icons', 'livemesh-el-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => __('Icon or Icon Image size in pixels', 'livemesh-el-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em' ],
                'range' => [
                    'px' => [
                        'min' => 6,
                        'max' => 128,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .lae-odometers .lae-odometer .lae-image-wrapper img' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .lae-odometers .lae-odometer .lae-icon-wrapper' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __('Icon Color', 'livemesh-el-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .lae-odometers .lae-odometer .lae-stats-title .lae-icon-wrapper' => 'color: {{VALUE}};',
                ],
            ]
        );
    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        $settings = apply_filters('lae_odometers_' . $this->get_id() . '_settings', $settings);

        $migration_allowed = Icons_Manager::is_migration_allowed();

        $output = '<div class="lae-odometers lae-grid-container ' . lae_get_grid_classes($settings) . '">';

        foreach ($settings['odometers'] as $odometer):

            $prefix = (!empty ($odometer['prefix'])) ? '<span class="prefix">' . $odometer['prefix'] . '</span>' : '';
            $suffix = (!empty ($odometer['suffix'])) ? '<span class="suffix">' . $odometer['suffix'] . '</span>' : '';

            $child_output = '<div class="lae-grid-item lae-odometer">';

            $child_output .= (!empty ($odometer['prefix'])) ? '<span class="lae-prefix">' . $odometer['prefix'] . '</span>' : '';

            $child_output .= '<div class="lae-number odometer" data-stop="' . intval($odometer['stop_value']) . '">';

            $child_output .= intval($odometer['start_value']);

            $child_output .= '</div><!-- .lae-number -->';

            $child_output .= (!empty ($odometer['suffix'])) ? '<span class="lae-suffix">' . $odometer['suffix'] . '</span>' : '';

            $icon_type = esc_html($odometer['icon_type']);

            $icon_html = '';

            if ($icon_type == 'icon_image') :

                $icon_image = $odometer['icon_image'];

                if (!empty($icon_image)):

                    $icon_html = '<span class="lae-image-wrapper">' . wp_get_attachment_image($icon_image['id'], 'full', false, array('class' => 'lae-image full')) . '</span>';

                endif;

            elseif ((!empty($odometer['icon']) || !empty($odometer['selected_icon']['value']))) :

                $migrated = isset($odometer['__fa4_migrated']['selected_icon']);
                $is_new = empty($odometer['icon']) && $migration_allowed;

                $icon_html = '<span class="lae-icon-wrapper">';

                if ($is_new || $migrated) :

                    ob_start();

                    Icons_Manager::render_icon($odometer['selected_icon'], ['aria-hidden' => 'true']);

                    $icon_html .= ob_get_contents();
                    ob_end_clean();

                else :

                    $icon_html .= '<i class="' . esc_attr($odometer['icon']) . '" aria-hidden="true"></i>';

                endif;

                $icon_html .= '</span>';

            endif;

            $child_output .= '<div class="lae-stats-title-wrap">';

            $child_output .= '<div class="lae-stats-title">' . $icon_html . esc_html($odometer['stats_title']) . '</div>';

            $child_output .= '</div>';

            $child_output .= '</div><!-- .lae-odometer -->';

            $output .= apply_filters('lae_odometer_output', $child_output, $odometer, $settings);

        endforeach;

        $output .= '</div><!-- .lae-odometers -->';

        $output .= '<div class="lae-clear"></div>';

        echo apply_filters('lae_odometers_output', $output, $settings);

    }

    protected function content_template() {
    }

}