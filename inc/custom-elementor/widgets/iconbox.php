<?php

namespace starterTheme\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Control_Media;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class ST_IconBox extends Widget_Base {

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'iconbox';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __('Icon Box', 'starter-theme');
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'st-icon';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return ['starter-theme'];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
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
            'st_back_title',
            [
                'label' => esc_html__('Back Title', 'starter-theme'),
                'description' => starter_theme_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('ST Back Title Here', 'starter-theme'),
                'placeholder' => esc_html__('Type Back Heading Text', 'starter-theme'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'st_desctiption',
            [
                'label' => esc_html__('Description', 'starter-theme'),
                'description' => starter_theme_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('ST section description here', 'starter-theme'),
                'placeholder' => esc_html__('Type section description here', 'starter-theme'),
                'condition' => [
                    'st_design_style' => 'layout-2'
                ]
            ]
        );

        $this->add_control(
            'st_iconbox_button_text',
            [
                'label' => esc_html__('Button Text', 'starter-theme'),
                'description' => starter_theme_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Get Support', 'starter-theme'),
                'placeholder' => esc_html__('Button Text', 'starter-theme'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'st_box_url',
            [
                'label' => esc_html__('URL', 'starter-theme'),
                'description' => starter_theme_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'starter-theme'),
                'placeholder' => esc_html__('URL Here', 'starter-theme'),
                'label_block' => true,
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
                    'text-left' => [
                        'title' => esc_html__('Left', 'starter-theme'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'text-center' => [
                        'title' => esc_html__('Center', 'starter-theme'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'text-right' => [
                        'title' => esc_html__('Right', 'starter-theme'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => false,
            ]
        );
        $this->end_controls_section();

        // _st_image
        $this->start_controls_section(
            '_st_image',
            [
                'label' => esc_html__('Thumbnail', 'starter-theme'),
            ]
        );
        $this->add_control(
            'st_image',
            [
                'label' => esc_html__('Choose Image', 'starter-theme'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'st_image_size',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();


        // _st_icon
        $this->start_controls_section(
            '
                    _st_icon',
            [
                'label' => esc_html__('Icon', 'starter-theme'),
            ]
        );
        $this->add_control(
            'st_icon_type',
            [
                'label' => esc_html__('Select Icon Type', 'starter-theme'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'icon',
                'options' => [
                    'image' => esc_html__('Image', 'starter-theme'),
                    'icon' => esc_html__('Icon', 'starter-theme'),
                ],
            ]
        );

        $this->add_control(
            'st_icon_image',
            [
                'label' => esc_html__('Upload Image', 'starter-theme'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'st_icon_type' => 'image'
                ]

            ]
        );
        if (starter_theme_is_elementor_version('<', '2.6.0')) {
            $this->add_control(
                'st_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'default' => 'fa fa-star',
                    'condition' => [
                        'st_icon_type' => 'icon'
                    ]
                ]
            );
        } else {
            $this->add_control(
                'st_selected_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block' => true,
                    'default' => [
                        'value' => 'fas fa-star',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'st_icon_type' => 'icon'
                    ]
                ]
            );
        }
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
    }

    /**
     * Render the widget oustut on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

?>

        <?php if ($settings['st_design_style']  == 'layout-2') :
            $this->add_render_attribute('title_args', 'class', 'flip-card-title flip-card-title-2');
        ?>


            <div class="sm-services__item mb-30">
                <div class="flip-card">
                    <div class="flip-card-inner flip-card-inner-2">
                        <div class="flip-card-front flip-card-front-2">
                            <div class="flip-card-icon flip-card-icon-2 mb-20">
                                <?php if ($settings['st_icon_type'] !== 'image') : ?>
                                    <?php if (!empty($settings['st_icon']) || !empty($settings['st_selected_icon']['value'])) : ?>
                                        <div class="st-icon">
                                            <?php starter_theme_render_icon($settings, 'st_icon', 'st_selected_icon'); ?>
                                        </div>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <div class="icon">
                                        <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'full', 'st_icon_image'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
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
                                <div class="flip-card-omore">
                                    <p><?php echo starter_theme_kses($settings['st_desctiption']); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="flip-card-back flip-card-back-2">
                            <div class="flip-card-icon mb-20">
                                <?php if ($settings['st_icon_type'] !== 'image') : ?>
                                    <?php if (!empty($settings['st_icon']) || !empty($settings['st_selected_icon']['value'])) : ?>
                                        <div class="st-icon">
                                            <?php starter_theme_render_icon($settings, 'st_icon', 'st_selected_icon'); ?>
                                        </div>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <div class="icon">
                                        <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'full', 'st_icon_image'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($settings['st_box_url'])) : ?>
                                <h5 class="flip-card-title"><a href="<?php echo esc_url($settings['st_box_url']); ?>"><?php echo starter_theme_kses($settings['st_title']); ?></a></h5>
                            <?php endif; ?>
                            <?php if (!empty($settings['st_desctiption'])) : ?>
                                <div class="flip-card-omore">
                                    <p><?php echo starter_theme_kses($settings['st_desctiption']); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>


        <?php else :
            $this->add_render_attribute('title_args', 'class', 'flip-card-title');

            if (!empty($settings['st_image']['url'])) {
                $st_image_url = !empty($settings['st_image']['id']) ? wp_get_attachment_image_url($settings['st_image']['id'], $settings['st_image_size_size']) : $settings['st_image']['url'];
                $st_image_alt = get_post_meta($settings["st_image"]["id"], "_wp_attachment_image_alt", true);
            }

        ?>

            <div class="sm-services__item mb-15">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="flip-card-icon mb-20">
                                <?php if ($settings['st_icon_type'] !== 'image') : ?>
                                    <?php if (!empty($settings['st_icon']) || !empty($settings['st_selected_icon']['value'])) : ?>
                                        <span class="keyFeatureBlock__icon">
                                            <?php starter_theme_render_icon($settings, 'st_icon', 'st_selected_icon'); ?>
                                        </span>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <span class="keyFeatureBlock__icon">
                                        <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'full', 'st_icon_image'); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <?php
                            if (!empty($settings['st_title'])) :
                                printf(
                                    '<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                    tag_escape($settings['st_title_tag']),
                                    $this->get_render_attribute_string('title_args'),
                                    starter_theme_kses($settings['st_title']),
                                    esc_url($settings['st_box_url']),
                                );
                            endif;
                            ?>
                            <div class="flip-card-omore">
                                <i class="fa-light fa-arrow-right-long"></i>
                            </div>
                        </div>
                        <div class="flip-card-back">
                            <div class="flip-card-icon mb-20">
                                <?php if ($settings['st_icon_type'] !== 'image') : ?>
                                    <?php if (!empty($settings['st_icon']) || !empty($settings['st_selected_icon']['value'])) : ?>
                                        <span class="keyFeatureBlock__icon">
                                            <?php starter_theme_render_icon($settings, 'st_icon', 'st_selected_icon'); ?>
                                        </span>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <span class="keyFeatureBlock__icon">
                                        <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'full', 'st_icon_image'); ?>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <?php if (!empty($settings['st_back_title'])) : ?>
                                <h5 class="flip-card-title"><a href="<?php echo esc_url($settings['st_box_url']); ?>"><?php echo starter_theme_kses($settings['st_back_title']); ?></a></h5>
                            <?php endif; ?>

                            <?php if (!empty($settings['st_iconbox_button_text'])) : ?>
                                <span class="sp-text mb-10"><a href="<?php echo esc_url($settings['st_box_url']); ?>"><?php echo starter_theme_kses($settings['st_iconbox_button_text']); ?></a></span>
                            <?php endif; ?>

                            <?php if (!empty($settings['st_box_url'])) : ?>
                                <div class="flip-card-omore">
                                    <a href="<?php echo esc_url($settings['st_box_url']); ?>"><i class="fa-light fa-arrow-right-long"></i></a>
                                </div>
                            <?php endif; ?>


                            <?php if (!empty($st_image_url)) : ?>
                                <div class="flip-card-bg">
                                    <img src="<?php echo esc_url($st_image_url); ?>" alt="<?php echo esc_url($st_image_alt); ?>">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>

<?php
    }
}

$widgets_manager->register(new ST_IconBox());
