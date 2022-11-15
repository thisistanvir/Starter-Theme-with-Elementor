<?php

namespace starterTheme\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Control_Media;

use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Addon_Widget extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve oEmbed widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'heading';
    }

    /**
     * Get widget title.
     *
     * Retrieve oEmbed widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('heading', 'starter-theme');
    }

    /**
     * Get widget icon.
     *
     * Retrieve oEmbed widget icon.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-code';
    }

    /**
     * Get custom help URL.
     *
     * Retrieve a URL where the user can get more information about the widget.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget help URL.
     */
    public function get_custom_help_url() {
        return 'htsts://developers.elementor.com/docs/widgets/';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories() {
        return ['starter-theme'];
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget keywords.
     */
    public function get_keywords() {
        return ['heading', 'title', 'section title'];
    }

    /**
     * Register oEmbed widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {

        // layout Panel
        $this->start_controls_section(
            'st_layout',
            [
                'label' => esc_html__('Design Layout', 'starter-theme'),
            ]
        );
        $this->add_control(
            'st_design_style',
            [
                'label' => esc_html__('Select Layout', 'starter-theme'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'layout-1' => esc_html__('Layout 1', 'starter-theme'),
                    'layout-2' => esc_html__('Layout 2', 'starter-theme'),
                    'layout-3' => esc_html__('Layout 3', 'starter-theme'),
                ],
                'default' => 'layout-1',
            ]
        );
        $this->end_controls_section();

        // st_section_title
        $this->start_controls_section(
            'st_section_title',
            [
                'label' => esc_html__('Title & Content', 'starter-theme'),
            ]
        );

        $this->add_control(
            'st_section_title_show',
            [
                'label' => esc_html__('Section Title & Content', 'starter-theme'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'starter-theme'),
                'label_off' => esc_html__('Hide', 'starter-theme'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'st_sub_title',
            [
                'label' => esc_html__('Sub Title', 'starter-theme'),
                'description' => starter_theme_get_allowed_html_desc('basic'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('ST Sub Title', 'starter-theme'),
                'placeholder' => esc_html__('Type Sub Heading Text', 'starter-theme'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'st_title',
            [
                'label' => esc_html__('Title', 'starter-theme'),
                'description' => starter_theme_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('ST Title Here', 'starter-theme'),
                'placeholder' => esc_html__('Type Heading Text', 'starter-theme'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'st_desctiption',
            [
                'label' => esc_html__('Description', 'starter-theme'),
                'description' => starter_theme_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__('Type section description here', 'starter-theme'),
            ]
        );

        $this->add_control(
            'st_title_tag',
            [
                'label' => esc_html__('Title HTML Tag', 'starter-theme'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => esc_html__('H1', 'starter-theme'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => esc_html__('H2', 'starter-theme'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => esc_html__('H3', 'starter-theme'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => esc_html__('H4', 'starter-theme'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => esc_html__('H5', 'starter-theme'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => esc_html__('H6', 'starter-theme'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h2',
                'toggle' => false,
            ]
        );

        $this->add_responsive_control(
            'st_align',
            [
                'label' => esc_html__('Alignment', 'starter-theme'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'starter-theme'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'starter-theme'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'starter-theme'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => false,
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};'
                ]
            ]
        );
        $this->end_controls_section();

        // st_btn_button_group
        $this->start_controls_section(
            'st_btn_button_group',
            [
                'label' => esc_html__('Button', 'starter-theme'),
            ]
        );

        $this->add_control(
            'st_btn_button_show',
            [
                'label' => esc_html__('Show Button', 'starter-theme'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'starter-theme'),
                'label_off' => esc_html__('Hide', 'starter-theme'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'st_btn_text',
            [
                'label' => esc_html__('Button Text', 'starter-theme'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Button Text', 'starter-theme'),
                'title' => esc_html__('Enter button text', 'starter-theme'),
                'label_block' => true,
                'condition' => [
                    'st_btn_button_show' => 'yes'
                ],
            ]
        );
        $this->add_control(
            'st_btn_link_type',
            [
                'label' => esc_html__('Button Link Type', 'starter-theme'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'label_block' => true,
                'condition' => [
                    'st_btn_button_show' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'st_btn_link',
            [
                'label' => esc_html__('Button link', 'starter-theme'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('htsts://your-link.com', 'starter-theme'),
                'show_external' => false,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'condition' => [
                    'st_btn_link_type' => '1',
                    'st_btn_button_show' => 'yes'
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'st_btn_page_link',
            [
                'label' => esc_html__('Select Button Page', 'starter-theme'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => starter_theme_get_all_pages(),
                'condition' => [
                    'st_btn_link_type' => '2',
                    'st_btn_button_show' => 'yes'
                ]
            ]
        );
        $this->end_controls_section();

        // TAB_STYLE
        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Style', 'starter-theme'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_transform',
            [
                'label' => __('Text Transform', 'starter-theme'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => __('None', 'starter-theme'),
                    'uppercase' => __('UPPERCASE', 'starter-theme'),
                    'lowercase' => __('lowercase', 'starter-theme'),
                    'capitalize' => __('Capitalize', 'starter-theme'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        // style tab here
        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __('Title / Content', 'tocore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __('Content Padding', 'tocore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .st-el-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .st-el-content',
                'exclude' => [
                    'image'
                ]
            ]
        );

        // Title
        $this->add_control(
            '_heading_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Title', 'tocore'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __('Bottom Spacing', 'tocore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .st-el-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'tocore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st-el-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .st-el-title',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        // Subtitle    
        $this->add_control(
            '_heading_subtitle',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Subtitle', 'tocore'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'subtitle_spacing',
            [
                'label' => __('Bottom Spacing', 'tocore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .st-el-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __('Text Color', 'tocore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st-el-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .st-el-subtitle',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        // description
        $this->add_control(
            '_content_description',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Description', 'tocore'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'description_spacing',
            [
                'label' => __('Bottom Spacing', 'tocore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .st-el-content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __('Text Color', 'tocore'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st-el-content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description',
                'selector' => '{{WRAPPER}} .st-el-content p',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );


        $this->end_controls_section();
    }

    /**
     * Render oEmbed widget oustut on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

?>

        <?php if ($settings['st_design_style']  == 'layout-2') :
            $this->add_render_attribute('title_args', 'class', 'section__title');
        ?>
            <?php if (!empty($settings['st_section_title_show'])) : ?>
                <div class="section-2__wrapper">
                    <?php if (!empty($settings['st_sub_title'])) : ?>
                        <span class="st-2"><?php echo starter_theme_kses($settings['st_sub_title']); ?></span>
                    <?php endif; ?>
                    <?php
                    if (!empty($settings['st_title'])) :
                        printf(
                            '<%1$s %2$s>%3$s</%1$s>',
                            tag_escape($settings['st_title_tag']),
                            $this->get_render_attribute_string('title_args'),
                            starter_theme_kses($settings['st_title'])
                        );
                    endif;
                    ?>
                    <?php if (!empty($settings['st_desctiption'])) : ?>
                        <p class="aboutContent__text p-0"><?php echo starter_theme_kses($settings['st_desctiption']); ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        <?php elseif ($settings['st_design_style']  == 'layout-3') :
            $this->add_render_attribute('title', 'class', 'section__title');
        ?>

            <?php if (!empty($settings['st_section_title_show'])) : ?>
                <div class="section__wrapper section__wrapper-2 mb-30">
                    <?php if (!empty($settings['st_sub_title'])) : ?>
                        <span class="st-meta-2"><?php echo starter_theme_kses($settings['st_sub_title']); ?></span>
                    <?php endif; ?>

                    <?php
                    if (!empty($settings['st_title'])) :
                        printf(
                            '<%1$s %2$s>%3$s</%1$s>',
                            tag_escape($settings['st_title_tag']),
                            $this->get_render_attribute_string('title'),
                            starter_theme_kses($settings['st_title'])
                        );
                    endif;
                    ?>

                    <?php if (!empty($settings['st_desctiption'])) : ?>
                        <p><?php echo starter_theme_kses($settings['st_desctiption']); ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>


        <?php else :
            $this->add_render_attribute('title', 'class', 'section__title');
        ?>

            <?php if (!empty($settings['st_section_title_show'])) : ?>
                <div class="section__wrapper">
                    <?php
                    if (!empty($settings['st_title'])) :
                        printf(
                            '<%1$s %2$s>%3$s</%1$s>',
                            tag_escape($settings['st_title_tag']),
                            $this->get_render_attribute_string('title'),
                            starter_theme_kses($settings['st_title'])
                        );
                    endif;
                    ?>

                    <?php if (!empty($settings['st_sub_title'])) : ?>
                        <div class="r-text">
                            <span><?php echo starter_theme_kses($settings['st_sub_title']); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($settings['st_desctiption'])) : ?>
                        <p><?php echo starter_theme_kses($settings['st_desctiption']); ?></p>
                    <?php endif; ?>
                </div>

            <?php endif; ?>

        <?php endif; ?>

<?php
    }
}
$widgets_manager->register(new Addon_Widget());
