<?php

/*
Widget Name: Posts Carousel
Description: Display blog posts or custom post types as a carousel.
Author: LiveMesh
Author URI: https://www.livemeshthemes.com
*/

namespace LivemeshAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Image_Size;
use Elementor\Scheme_Typography;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class LAE_Posts_Carousel_Widget extends Widget_Base {

    public function get_name() {
        return 'lae-posts-carousel';
    }

    public function get_title() {
        return __('Posts Carousel', 'livemesh-el-addons');
    }

    public function get_icon() {
        return 'eicon-posts-carousel';
    }

    public function get_categories() {
        return array('livemesh-addons');
    }

    public function get_script_depends() {
        return [
            'lae-widgets-scripts',
            'lae-frontend-scripts',
            'jquery-slick',
        ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_query',
            [
                'label' => __('Posts Query', 'livemesh-el-addons'),
            ]
        );

        $this->add_control(
            'query_type',
            [
                'label' => __('Source', 'livemesh-el-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'custom_query' => __('Custom Query', 'livemesh-el-addons'),
                    'current_query' => __('Current Query', 'livemesh-el-addons'),
                    'related' => __('Related', 'livemesh-el-addons'),
                ),
                'default' => 'custom_query',
            ]
        );

        $this->add_control(
            'post_types',
            [
                'label' => __('Post Types', 'livemesh-el-addons'),
                'type' => Controls_Manager::SELECT2,
                'default' => 'post',
                'options' => lae_get_all_post_type_options(),
                'multiple' => true,
                'condition' => [
                    'query_type' => 'custom_query'
                ]
            ]
        );

        $this->add_control(
            'taxonomies',
            [
                'type' => Controls_Manager::SELECT2,
                'label' => __('Choose the taxonomies to display related posts.', 'livemesh-el-addons'),
                'label_block' => true,
                'description' => __('Choose the taxonomies to be used for displaying posts related to current post, page or custom post type.', 'livemesh-el-addons'),
                'options' => lae_get_taxonomies_map(),
                'default' => 'category',
                'multiple' => true,
                'condition' => [
                    'query_type' => 'related'
                ]
            ]
        );

        $this->add_control(
            'tax_query',
            [
                'label' => __('Taxonomies', 'livemesh-el-addons'),
                'type' => Controls_Manager::SELECT2,
                'options' => lae_get_all_taxonomy_options(),
                'multiple' => true,
                'label_block' => true,
                'condition' => [
                    'query_type' => 'custom_query'
                ]
            ]
        );

        $this->add_control(
            'post_in',
            [
                'label' => __('Post In', 'livemesh-el-addons'),
                'description' => __('Provide a comma separated list of Post IDs to display in the grid.', 'livemesh-el-addons'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'condition' => [
                    'query_type' => 'custom_query'
                ]
            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label' => __('Posts Per Page', 'livemesh-el-addons'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 50,
                'step' => 1,
                'default' => 6,
                'condition' => [
                    'query_type' => ['custom_query', 'related']
                ]
            ]
        );

        $this->add_control(
            'advanced',
            [
                'label' => __('Advanced', 'livemesh-el-addons'),
                'type' => Controls_Manager::HEADING,
                'condition' => [
                    'query_type' => ['custom_query', 'related']
                ]
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label' => __('Order By', 'livemesh-el-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'none' => __('No order', 'livemesh-el-addons'),
                    'ID' => __('Post ID', 'livemesh-el-addons'),
                    'author' => __('Author', 'livemesh-el-addons'),
                    'title' => __('Title', 'livemesh-el-addons'),
                    'date' => __('Published date', 'livemesh-el-addons'),
                    'modified' => __('Modified date', 'livemesh-el-addons'),
                    'parent' => __('By parent', 'livemesh-el-addons'),
                    'rand' => __('Random order', 'livemesh-el-addons'),
                    'comment_count' => __('Comment count', 'livemesh-el-addons'),
                    'menu_order' => __('Menu order', 'livemesh-el-addons'),
                    'post__in' => __('By include order', 'livemesh-el-addons'),
                ),
                'default' => 'date',
                'condition' => [
                    'query_type' => ['custom_query', 'related']
                ]
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => __('Order', 'livemesh-el-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'ASC' => __('Ascending', 'livemesh-el-addons'),
                    'DESC' => __('Descending', 'livemesh-el-addons'),
                ),
                'default' => 'DESC',
                'condition' => [
                    'query_type' => ['custom_query', 'related']
                ]
            ]
        );


        $this->add_control(
            'offset',
            [
                'label' => __('Offset', 'livemesh-el-addons'),
                'description' => __('Number of posts to skip or pass over.', 'livemesh-el-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 0,
                'condition' => [
                    'query_type' => 'custom_query'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_carousel_skin',
            [
                'label' => __('Carousel Skin', 'livemesh-el-addons'),
            ]
        );

        $this->add_control(
            'carousel_skin',
            [
                'label' => __('Choose Carousel Skin', 'livemesh-el-addons'),
                'description' => __('The "Classic Skin" is the built-in styling provided for the carousel items. Choose "Custom Skin" if you want to use theme builder template for the carousel items.', 'livemesh-el-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'classic_skin' => __('Classic Skin', 'livemesh-el-addons'),
                    'custom_skin' => __('Custom Skin', 'livemesh-el-addons'),
                ),
                'default' => 'classic_skin',
            ]
        );

        $this->add_control(
            'item_template',
            [
                'label' => __('Select the custom skin template for the carousel item', 'livemesh-el-addons'),
                'description' => '<div style="text-align:center;font-style: normal;">'
                    . '<a target="_blank" class="elementor-button elementor-button-default" href="'
                    . esc_url(admin_url('/edit.php?post_type=elementor_library&tabs_group=theme&elementor_library_type=livemesh_item'))
                    . '">'
                    . __('Create/Edit the Item Skin Builder Templates', 'livemesh-el-addons')
                    . '</a>'
                    . '</div>',
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'default' => [],
                'options' => $this->get_item_template_options(),
                'condition' => [
                    'carousel_skin' => 'custom_skin'
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_post_content',
            [
                'label' => __('Post Content', 'livemesh-el-addons'),
                'condition' => [
                    'carousel_skin' => 'classic_skin'
                ],
            ]
        );

        $this->add_control(
            'taxonomy_chosen',
            [
                'label' => __('Choose the taxonomy to display info.', 'livemesh-el-addons'),
                'description' => __('Choose the taxonomy to use for display of taxonomy information for posts/custom post types.', 'livemesh-el-addons'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'default' => 'category',
                'options' => lae_get_taxonomies_map(),
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail_size',
                'label' => __('Image Size', 'livemesh-el-addons'),
                'default' => 'large',
            ]
        );

        $this->add_control(
            'image_linkable',
            [
                'label' => __('Link Images to Posts?', 'livemesh-el-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'livemesh-el-addons'),
                'label_off' => __('No', 'livemesh-el-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'post_link_new_window',
            [
                'label' => __('Open post links in new window?', 'livemesh-el-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'livemesh-el-addons'),
                'label_off' => __('No', 'livemesh-el-addons'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'display_title_on_thumbnail',
            [
                'label' => __('Display posts title on the post/portfolio thumbnail?', 'livemesh-el-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'livemesh-el-addons'),
                'label_off' => __('No', 'livemesh-el-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'display_taxonomy_on_thumbnail',
            [
                'label' => __('Display taxonomy info on post/project thumbnail?', 'livemesh-el-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'livemesh-el-addons'),
                'label_off' => __('No', 'livemesh-el-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'display_title',
            [
                'label' => __('Display posts title below the post item?', 'livemesh-el-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'livemesh-el-addons'),
                'label_off' => __('No', 'livemesh-el-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'display_summary',
            [
                'label' => __('Display post excerpt/summary below the post item?', 'livemesh-el-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'livemesh-el-addons'),
                'label_off' => __('No', 'livemesh-el-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'display_author',
            [
                'label' => __('Display post author info below the post item?', 'livemesh-el-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'livemesh-el-addons'),
                'label_off' => __('No', 'livemesh-el-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'display_post_date',
            [
                'label' => __('Display post date info below the post item?', 'livemesh-el-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'livemesh-el-addons'),
                'label_off' => __('No', 'livemesh-el-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );


        $this->add_control(
            'display_taxonomy',
            [
                'label' => __('Display taxonomy info below the post item?', 'livemesh-el-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'livemesh-el-addons'),
                'label_off' => __('No', 'livemesh-el-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'display_read_more',
            [
                'label' => __('Display read more link to the post/portfolio?', 'livemesh-el-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'livemesh-el-addons'),
                'label_off' => __('No', 'livemesh-el-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'read_more_text',
            [
                'label' => __('Read more text', 'livemesh-el-addons'),
                'type' => Controls_Manager::TEXT,
                "description" => __('Specify the text for the read more link/button', 'livemesh-el-addons'),
                'default' => __('Read More', 'livemesh-el-addons'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_carousel_settings',
            [
                'label' => __('Carousel Settings', 'livemesh-el-addons'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_control(
            'arrows',
            [
                'type' => Controls_Manager::SWITCHER,
                'label_off' => __('No', 'livemesh-el-addons'),
                'label_on' => __('Yes', 'livemesh-el-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
                'label' => __('Prev/Next Arrows?', 'livemesh-el-addons'),
            ]
        );


        $this->add_control(
            'dots',
            [
                'type' => Controls_Manager::SWITCHER,
                'label_off' => __('No', 'livemesh-el-addons'),
                'label_on' => __('Yes', 'livemesh-el-addons'),
                'return_value' => 'yes',
                'default' => 'no',
                'label' => __('Show dot indicators for navigation?', 'livemesh-el-addons'),
            ]
        );

        $this->add_control(
            'pause_on_hover',
            [
                'type' => Controls_Manager::SWITCHER,
                'label_off' => __('No', 'livemesh-el-addons'),
                'label_on' => __('Yes', 'livemesh-el-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
                'label' => __('Pause on Hover?', 'livemesh-el-addons'),
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'type' => Controls_Manager::SWITCHER,
                'label_off' => __('No', 'livemesh-el-addons'),
                'label_on' => __('Yes', 'livemesh-el-addons'),
                'return_value' => 'yes',
                'default' => 'no',
                'label' => __('Autoplay?', 'livemesh-el-addons'),
                'description' => __('Should the carousel autoplay as in a slideshow.', 'livemesh-el-addons'),
            ]
        );

        $this->add_control(
            'adaptive_height',
            [
                'type' => Controls_Manager::SWITCHER,
                'label_off' => __('No', 'livemesh-el-addons'),
                'label_on' => __('Yes', 'livemesh-el-addons'),
                'return_value' => 'yes',
                'default' => 'no',
                'label' => __('Adaptive Height?', 'livemesh-el-addons'),
                'description' => __('Enables adaptive height for single slide horizontal carousels.', 'livemesh-el-addons'),
            ]
        );

        $this->add_control(
            'autoplay_speed',
            [
                'label' => __('Autoplay speed in ms', 'livemesh-el-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3000,
            ]
        );


        $this->add_control(
            'animation_speed',
            [
                'label' => __('Autoplay animation speed in ms', 'livemesh-el-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 300,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_responsive',
            [
                'label' => __('Responsive Options', 'livemesh-el-addons'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $this->add_control(
            'heading_desktop',
            [
                'label' => __('Desktop', 'livemesh-el-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );


        $this->add_control(
            'gutter',
            [
                'label' => __('Gutter', 'livemesh-el-addons'),
                'description' => __('Space between columns.', 'livemesh-el-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 10,
                'selectors' => [
                    '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item' => 'padding: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_control(
            'display_columns',
            [
                'label' => __('Columns per row', 'livemesh-el-addons'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 3,
            ]
        );


        $this->add_control(
            'scroll_columns',
            [
                'label' => __('Columns to scroll', 'livemesh-el-addons'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 3,
            ]
        );

        $this->add_control(
            'heading_tablet',
            [
                'label' => __('Tablet', 'livemesh-el-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'tablet_gutter',
            [
                'label' => __('Gutter', 'livemesh-el-addons'),
                'description' => __('Space between columns.', 'livemesh-el-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 10,
                'selectors' => [
                    '(tablet-){{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item' => 'padding: {{VALUE}}px;',
                ],
            ]
        );


        $this->add_control(
            'tablet_display_columns',
            [
                'label' => __('Columns per row', 'livemesh-el-addons'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 2,
            ]
        );

        $this->add_control(
            'tablet_scroll_columns',
            [
                'label' => __('Columns to scroll', 'livemesh-el-addons'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 2,
            ]
        );

        $this->add_control(
            'tablet_width',
            [
                'label' => __('Tablet Resolution', 'livemesh-el-addons'),
                'description' => __('The resolution to treat as a tablet resolution.', 'livemesh-el-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 800,
            ]
        );


        $this->add_control(
            'heading_mobile',
            [
                'label' => __('Mobile Phone', 'livemesh-el-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'mobile_gutter',
            [
                'label' => __('Mobile Gutter', 'livemesh-el-addons'),
                'description' => __('Space between columns.', 'livemesh-el-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 10,
                'selectors' => [
                    '(mobile-){{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item' => 'padding: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_control(
            'mobile_display_columns',
            [
                'label' => __('Columns per row', 'livemesh-el-addons'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 3,
                'step' => 1,
                'default' => 1,
            ]
        );

        $this->add_control(
            'mobile_scroll_columns',
            [
                'label' => __('Columns to scroll', 'livemesh-el-addons'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 3,
                'step' => 1,
                'default' => 1,
            ]
        );

        $this->add_control(
            'mobile_width',
            [
                'label' => __('Mobile Resolution', 'livemesh-el-addons'),
                'description' => __('The resolution to treat as a mobile resolution.', 'livemesh-el-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 480,
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_carousel_item_thumbnail_styling',
            [
                'label' => __('Post Thumbnail', 'livemesh-el-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'carousel_skin' => 'classic_skin'
                ],
            ]
        );

        $this->add_control(
            'heading_thumbnail_info',
            [
                'label' => __('Thumbnail Info Entry Title', 'livemesh-el-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __('Title HTML Tag', 'livemesh-el-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => __('H1', 'livemesh-el-addons'),
                    'h2' => __('H2', 'livemesh-el-addons'),
                    'h3' => __('H3', 'livemesh-el-addons'),
                    'h4' => __('H4', 'livemesh-el-addons'),
                    'h5' => __('H5', 'livemesh-el-addons'),
                    'h6' => __('H6', 'livemesh-el-addons'),
                    'div' => __('div', 'livemesh-el-addons'),
                ],
                'default' => 'h3',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'livemesh-el-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-project-image .lae-image-info .lae-post-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_hover_border_color',
            [
                'label' => __('Title Hover Border Color', 'livemesh-el-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-project-image .lae-image-info .lae-post-title a:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-project-image .lae-image-info .lae-post-title',
            ]
        );

        $this->add_control(
            'heading_thumbnail_info_taxonomy',
            [
                'label' => __('Thumbnail Info Taxonomy Terms', 'livemesh-el-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'thumbnail_info_tags_color',
            [
                'label' => __('Taxonomy Terms Color', 'livemesh-el-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-project-image .lae-image-info .lae-terms, {{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-project-image .lae-image-info .lae-terms a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tags_typography',
                'selector' => '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-project-image .lae-image-info .lae-terms, {{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-project-image .lae-image-info .lae-terms a',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_entry_title_styling',
            [
                'label' => __('Post Entry Title', 'livemesh-el-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'carousel_skin' => 'classic_skin'
                ],
            ]
        );

        $this->add_control(
            'entry_title_tag',
            [
                'label' => __('Entry Title HTML Tag', 'livemesh-el-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => __('H1', 'livemesh-el-addons'),
                    'h2' => __('H2', 'livemesh-el-addons'),
                    'h3' => __('H3', 'livemesh-el-addons'),
                    'h4' => __('H4', 'livemesh-el-addons'),
                    'h5' => __('H5', 'livemesh-el-addons'),
                    'h6' => __('H6', 'livemesh-el-addons'),
                    'div' => __('div', 'livemesh-el-addons'),
                ],
                'default' => 'h3',
            ]
        );

        $this->add_control(
            'entry_title_color',
            [
                'label' => __('Entry Title Color', 'livemesh-el-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .entry-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_title_typography',
                'selector' => '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .entry-title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_entry_summary_styling',
            [
                'label' => __('Post Entry Summary', 'livemesh-el-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'carousel_skin' => 'classic_skin'
                ],
            ]
        );

        $this->add_control(
            'entry_summary_color',
            [
                'label' => __('Entry Summary Color', 'livemesh-el-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .entry-summary' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_summary_typography',
                'selector' => '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .entry-summary',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_entry_meta_styling',
            [
                'label' => __('Post Entry Meta', 'livemesh-el-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'carousel_skin' => 'classic_skin'
                ],
            ]
        );

        $this->add_control(
            'heading_entry_meta',
            [
                'label' => __('Entry Meta', 'livemesh-el-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'entry_meta_color',
            [
                'label' => __('Entry Meta Color', 'livemesh-el-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-entry-meta span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_meta_typography',
                'selector' => '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-entry-meta span',
            ]
        );


        $this->add_control(
            'heading_entry_meta_link',
            [
                'label' => __('Entry Meta Link', 'livemesh-el-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'entry_meta_link_color',
            [
                'label' => __('Entry Meta Link Color', 'livemesh-el-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-entry-meta span a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'entry_meta_link_typography',
                'selector' => '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-entry-meta span a',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_read_more_styling',
            [
                'label' => __('Read More', 'livemesh-el-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'carousel_skin' => 'classic_skin'
                ],
            ]
        );

        $this->add_control(
            'read_more_color',
            [
                'label' => __('Read More Color', 'livemesh-el-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-read-more, {{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-read-more a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'read_more_hover_color',
            [
                'label' => __('Read More Hover Color', 'livemesh-el-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-read-more:hover, {{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-read-more a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'read_more_typography',
                'selector' => '{{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-read-more, {{WRAPPER}} .lae-posts-carousel .lae-posts-carousel-item .lae-read-more a',
            ]
        );

        $this->end_controls_section();


    }

    protected function get_item_template_content($template_id, $settings) {

        /* Initialize the theme builder templates - Requires elementor pro plugin */
        if (!is_plugin_active('elementor-pro/elementor-pro.php')) {
            $output = __('Custom skin requires Elementor Pro but the plugin is not installed/active', 'livemesh-el-addons');
        }
        else {
            $output = lae_get_item_template_content($template_id, $settings);
        }

        return $output;

    }

    protected function get_item_template_options() {

        $template_options = array();

        /* Initialize the theme builder templates - Requires elementor pro plugin */
        if (!is_plugin_active('elementor-pro/elementor-pro.php')) {
            $template_options = [0 => __('No templates found. Elementor Pro is not installed/active', 'livemesh-el-addons')];
        }
        else {
            $templates = lae_get_livemesh_item_templates();

            //$template_options = [0 => __('Select a template', 'livemesh-el-addons')];

            foreach ($templates as $template) {
                $template_options[$template->ID] = $template->post_title;
            }
        }

        return $template_options;
    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        $dir = is_rtl() ? ' dir="rtl"' : '';

        $settings = apply_filters('lae_posts_carousel_' . $this->get_id() . '_settings', $settings);

        $taxonomies = array();

        $carousel_settings = [
            'arrows' => ('yes' === $settings['arrows']),
            'dots' => ('yes' === $settings['dots']),
            'autoplay' => ('yes' === $settings['autoplay']),
            'autoplay_speed' => absint($settings['autoplay_speed']),
            'animation_speed' => absint($settings['animation_speed']),
            'pause_on_hover' => ('yes' === $settings['pause_on_hover']),
            'adaptive_height' => ('yes' === $settings['adaptive_height']),
        ];

        $responsive_settings = [
            'display_columns' => $settings['display_columns'],
            'scroll_columns' => $settings['scroll_columns'],
            'gutter' => $settings['gutter'],
            'tablet_width' => $settings['tablet_width'],
            'tablet_display_columns' => $settings['tablet_display_columns'],
            'tablet_scroll_columns' => $settings['tablet_scroll_columns'],
            'tablet_gutter' => $settings['tablet_gutter'],
            'mobile_width' => $settings['mobile_width'],
            'mobile_display_columns' => $settings['mobile_display_columns'],
            'mobile_scroll_columns' => $settings['mobile_scroll_columns'],
            'mobile_gutter' => $settings['mobile_gutter'],

        ];

        $carousel_settings = array_merge($carousel_settings, $responsive_settings);

        // Use the processed post selector query to find posts.
        $query_args = lae_build_query_args($settings);

        $query_args = apply_filters('lae_posts_carousel_' . $this->get_id() . '_query_args', $query_args, $settings);

        $loop = new \WP_Query($query_args);

        $template_id = $settings['item_template'];

        // Loop through the posts and do something with them.
        if ($loop->have_posts()) :

            $target = $settings['post_link_new_window'] == 'yes' ? ' target="_blank"' : '';

            $output = '<div' . $dir . ' id="lae-posts-carousel-' . uniqid()
                . '" class="lae-posts-carousel lae-container ' 
                . 'lae-' . str_replace('_', '-', $settings['carousel_skin'])
                . '" data-settings=\'' . wp_json_encode($carousel_settings) . '\'>';

            $taxonomies[] = $settings['taxonomy_chosen'];

            while ($loop->have_posts()) : $loop->the_post();

                $post_id = get_the_ID();

                $entry_output = '<div data-id="id-' . get_the_ID() . '" class="lae-posts-carousel-item">';

                $entry_output .= '<article id="post-' . get_the_ID() . '" class="' . join(' ', get_post_class('', $post_id)) . '">';

                if ($settings['carousel_skin'] == 'custom_skin') :

                    if ($template_id)

                        $entry_output .= $this->get_item_template_content($template_id, $settings);
                    else
                        $entry_output .= __('Choose a custom skin template for the carousel item', 'livemesh-el-addons');

                else :

                    if ($thumbnail_exists = has_post_thumbnail()):

                        $entry_image = '<div class="lae-project-image">';

                        $image_setting = ['id' => get_post_thumbnail_id()];

                        $thumbnail_html = lae_get_image_html($image_setting, 'thumbnail_size', $settings);

                        if ($settings['image_linkable'] == 'yes'):

                            $thumbnail_html = '<a href="' . get_the_permalink() . '"' . $target . '>' . $thumbnail_html . '</a>';

                        endif;

                        $entry_image .= apply_filters('lae_posts_carousel_thumbnail_html', $thumbnail_html, $image_setting, $settings);

                        if (($settings['display_title_on_thumbnail'] == 'yes') || ($settings['display_taxonomy_on_thumbnail'] == 'yes')):

                            $image_info = '<div class="lae-image-info">';

                            $image_info .= '<div class="lae-entry-info">';

                            if ($settings['display_title_on_thumbnail'] == 'yes'):

                                $image_info .= '<' . $settings['title_tag'] . ' class="lae-post-title"><a href="' . get_permalink() . '" title="' . get_the_title() . '" rel="bookmark"' . $target . '>' . get_the_title() . '</a></' . $settings['title_tag'] . '>';

                            endif;

                            if ($settings['display_taxonomy_on_thumbnail'] == 'yes'):

                                $image_info .= lae_get_info_for_taxonomies($taxonomies);

                            endif;

                            $image_info .= '</div>';

                            $image_info .= '</div><!-- .lae-image-info -->';

                            $entry_image .= apply_filters('lae_posts_carousel_image_info', $image_info, $post_id, $settings);

                            $entry_image .= '</div>';

                        endif;

                        $entry_output .= apply_filters('lae_posts_carousel_entry_image', $entry_image, $post_id, $image_setting, $settings);

                    endif;

                    if (($settings['display_title'] == 'yes') || ($settings['display_summary'] == 'yes')) :

                        $entry_output .= '<div class="lae-entry-text-wrap ' . ($thumbnail_exists ? '' : ' nothumbnail') . '">';

                        if ($settings['display_title'] == 'yes') :

                            $entry_title = '<' . $settings['entry_title_tag']
                                . ' class="entry-title"><a href="' . get_permalink()
                                . '" title="' . get_the_title()
                                . '" rel="bookmark"' . $target . '>' . get_the_title()
                                . '</a></' . $settings['entry_title_tag'] . '>';

                            $entry_output .= apply_filters('lae_posts_carousel_entry_title', $entry_title, $post_id, $settings);

                        endif;

                        if (($settings['display_post_date'] == 'yes') || ($settings['display_author'] == 'yes') || ($settings['display_taxonomy'] == 'yes')) :

                            $entry_meta = '<div class="lae-entry-meta">';

                            if ($settings['display_author'] == 'yes'):

                                $entry_meta .= lae_entry_author();

                            endif;

                            if ($settings['display_post_date'] == 'yes'):

                                $entry_meta .= lae_entry_published();

                            endif;

                            if ($settings['display_taxonomy'] == 'yes'):

                                $entry_meta .= lae_get_info_for_taxonomies($taxonomies);

                            endif;

                            $entry_meta .= '</div>';

                            $entry_output .= apply_filters('lae_posts_carousel_entry_meta', $entry_meta, $post_id, $settings);

                        endif;

                        if ($settings['display_summary'] == 'yes') :

                            $excerpt = '<div class="entry-summary">';

                            $excerpt .= get_the_excerpt();

                            $excerpt .= '</div>';

                            $entry_output .= apply_filters('lae_posts_carousel_entry_excerpt', $excerpt, $post_id, $settings);

                        endif;

                        if ($settings['display_read_more'] == 'yes') :

                            $read_more_text = $settings['read_more_text'];

                            $read_more = '<div class="lae-read-more">';

                            $read_more .= '<a href="' . get_the_permalink() . '"' . $target . '>' . $read_more_text . '</a>';

                            $read_more .= '</div>';

                            $entry_output .= apply_filters('lae_posts_carousel_read_more_link', $read_more, $post_id, $settings);

                        endif;

                        $entry_output .= '</div>';

                    endif;

                endif;

                $entry_output .= '</article><!-- .hentry -->';

                $entry_output .= '</div><!-- .lae-posts-carousel-item -->';

                $output .= apply_filters('lae_posts_carousel_entry_output', $entry_output, $post_id, $settings);

            endwhile;

            wp_reset_postdata();

            $output .= '</div><!-- .lae-posts-carousel -->';

            echo apply_filters('lae_posts_carousel_output', $output, $settings);

        endif;

    }

    protected function content_template() {
    }

}