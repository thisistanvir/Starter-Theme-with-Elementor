<?php

namespace starterTheme\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class ST_Testimonial extends Widget_Base {

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
        return 'testimonial';
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
        return __('Testimonial', 'starter-theme');
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
                    'layout-3' => esc_html__('Layout 3', 'starter-theme'),
                    'layout-4' => esc_html__('Layout 4', 'starter-theme'),
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
                'condition' => [
                    'st_design_style' => ['layout-1', 'layout-2', 'layout-3']
                ]
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
                'default' => esc_html__('ST section description here', 'starter-theme'),
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

        // Review group
        $this->start_controls_section(
            'review_list',
            [
                'label' => esc_html__('Review List', 'starter-theme'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();


        $repeater->add_control(
            'reviewer_image',
            [
                'label' => esc_html__('Reviewer Image', 'starter-theme'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );
        $repeater->add_control(
            'reviewer_name',
            [
                'label' => esc_html__('Reviewer Name', 'starter-theme'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Rasalina William', 'starter-theme'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'reviewer_title',
            [
                'label' => esc_html__('Reviewer Title', 'starter-theme'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('- CEO at YES Germany', 'starter-theme'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'review_content',
            [
                'label' => esc_html__('Review Content', 'starter-theme'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => 'Aklima The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections Bonorum et Malorum original.',
                'placeholder' => esc_html__('Type your review content here', 'starter-theme'),
            ]
        );

        $this->add_control(
            'reviews_list',
            [
                'label' => esc_html__('Review List', 'starter-theme'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' =>  $repeater->get_controls(),
                'default' => [
                    [
                        'reviewer_name' => esc_html__('Rasalina William', 'starter-theme'),
                        'reviewer_title' => esc_html__('- CEO at YES Germany', 'starter-theme'),
                        'review_content' => esc_html__('Put your trust in us &share in our people with a passion.We are motivated by the satisfaction H.Spond Asset Management is made up of a team of expert, committed and experienced for of clients financial markets. Our goal is to achieve continuous.', 'starter-theme'),
                    ],
                    [
                        'reviewer_name' => esc_html__('Rasalina William', 'starter-theme'),
                        'reviewer_title' => esc_html__('- CEO at YES Germany', 'starter-theme'),
                        'review_content' => esc_html__('Put your trust in us &share in our people with a passion.We are motivated by the satisfaction H.Spond Asset Management is made up of a team of expert, committed and experienced for of clients financial markets. Our goal is to achieve continuous.', 'starter-theme'),
                    ],
                    [
                        'reviewer_name' => esc_html__('Rasalina William', 'starter-theme'),
                        'reviewer_title' => esc_html__('- CEO at YES Germany', 'starter-theme'),
                        'review_content' => esc_html__('Put your trust in us &share in our people with a passion.We are motivated by the satisfaction H.Spond Asset Management is made up of a team of expert, committed and experienced for of clients financial markets. Our goal is to achieve continuous.', 'starter-theme'),
                    ],

                ],
                'title_field' => '{{{ reviewer_name }}}',
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail_size',
                'default' => 'thumbnail',
                'exclude' => ['custom'],
                'separator' => 'none',
            ]
        );

        $this->end_controls_section();

        // _st_image
        $this->start_controls_section(
            '_st_image',
            [
                'label' => esc_html__('Thumbnail', 'starter-theme'),
                'condition' => [
                    'st_design_style' => ['layout-1', 'layout-2']
                ]
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
            $this->add_render_attribute('title_args', 'class', 'section__title-sd');
            if (!empty($settings['st_image']['url'])) {
                $st_image = !empty($settings['st_image']['id']) ? wp_get_attachment_image_url($settings['st_image']['id'], $settings['st_image_size_size']) : $settings['st_image']['url'];
                $st_image_alt = get_post_meta($settings["st_image"]["id"], "_wp_attachment_image_alt", true);
            }
        ?>

            <section class="testimonial__area-2 pt-110">
                <div class="container">
                    <div class="row">
                        <?php if ($settings['st_image']['url'] || $settings['st_image']['id']) : ?>
                            <div class="col-xl-6">
                                <div class="testimonial__right-image w-img">
                                    <img src="<?php echo esc_url($st_image); ?>" alt="<?php echo esc_attr($st_image_alt); ?>">
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-xl-6">
                            <div class="testimonial__left-info">
                                <?php if (!empty($settings['st_section_title_show'])) : ?>
                                    <div class="section-2__wrapper mb-55">
                                        <?php if (!empty($settings['st_sub_title'])) : ?>
                                            <span class="st-1"><?php echo starter_theme_kses($settings['st_sub_title']); ?></span>
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
                                            <p><?php echo starter_theme_kses($settings['st_desctiption']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="testimonial-2__slider ">
                                    <div class="wrapper">
                                        <?php foreach ($settings['reviews_list'] as $index => $item) :
                                            if (!empty($item['reviewer_image']['url'])) {
                                                $st_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url($item['reviewer_image']['id'], $settings['thumbnail_size_size']) : $item['reviewer_image']['url'];
                                                $st_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                                            }
                                        ?>
                                            <div class="testimonial__item-2 mb-60">
                                                <div class="tclient__details">
                                                    <?php if (!empty($st_reviewer_image)) : ?>
                                                        <div class="tclient__image mb-20">
                                                            <img src="<?php echo esc_url($st_reviewer_image); ?>" alt="<?php echo esc_url($st_reviewer_image_alt); ?>">
                                                        </div>
                                                    <?php endif; ?>

                                                    <div class="tclient__designation">
                                                        <?php if (!empty($item['reviewer_name'])) : ?>
                                                            <h5><?php echo starter_theme_kses($item['reviewer_name']); ?></h5>
                                                        <?php endif; ?>

                                                        <?php if (!empty($item['reviewer_title'])) : ?>
                                                            <span><?php echo starter_theme_kses($item['reviewer_title']); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <?php if (!empty($item['review_content'])) : ?>
                                                    <div class="review__text-2">
                                                        <p><?php echo starter_theme_kses($item['review_content']); ?></p>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="quote-img">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/quote-icon.png" alt="">
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif ($settings['st_design_style']  == 'layout-3') :
            $this->add_render_attribute('title_args', 'class', 'sm-title-d');
        ?>
            <div class="testimonial__left-info-2">
                <div class="section__wrapper section__wrapper-2 mb-40">
                    <?php if (!empty($settings['st_sub_title'])) : ?>
                        <span class="st-meta-3 mb-20"><?php echo starter_theme_kses($settings['st_sub_title']); ?></span>
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
                        <p><?php echo starter_theme_kses($settings['st_desctiption']); ?></p>
                    <?php endif; ?>
                </div>
                <div class="testimonial__slider-2 swiper-container">
                    <div class="testimonial__slider-2-wrapper swiper-wrapper">
                        <?php foreach ($settings['reviews_list'] as $index => $item) :
                            if (!empty($item['reviewer_image']['url'])) {
                                $st_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url($item['reviewer_image']['id'], $settings['thumbnail_size_size']) : $item['reviewer_image']['url'];
                                $st_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                            }
                        ?>
                            <div class="testimonial__item testimonial__item-3 swiper-slide">
                                <?php if (!empty($item['review_content'])) : ?>
                                    <p class="review__text"><?php echo starter_theme_kses($item['review_content']); ?></p>
                                <?php endif; ?>
                                <div class="review__info mt-30">
                                    <?php if (!empty($st_reviewer_image)) : ?>
                                        <a href="#"> <img src="<?php echo esc_url($st_reviewer_image); ?>" alt="<?php echo esc_url($st_reviewer_image_alt); ?>"></a>
                                    <?php endif; ?>
                                    <div class="client__content">
                                        <h5 class="client__name"><?php echo starter_theme_kses($item['reviewer_name']); ?></h5>
                                        <div class="client__designation">
                                            <p><?php echo starter_theme_kses($item['reviewer_title']); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial__icon-3">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/quote-3.png" alt="quote-icon">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="ts-pagination"></div>
                </div>
            </div>

        <?php elseif ($settings['st_design_style']  == 'layout-4') :
            $this->add_render_attribute('title_args', 'class', 'sm-title-d');
        ?>
            <div class="testimonial__area">
                <div class="container">
                    <div class="testimonial__slider-3 swiper-container white-bg pt-100 pb-110">
                        <div class="swiper-wrapper">
                            <?php foreach ($settings['reviews_list'] as $index => $item) :
                                if (!empty($item['reviewer_image']['url'])) {
                                    $st_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url($item['reviewer_image']['id'], $settings['thumbnail_size_size']) : $item['reviewer_image']['url'];
                                    $st_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                                }
                            ?>
                                <div class="swiper-slide testimonial__slider-3-item">
                                    <div class="testimonial__item-box text-center">
                                        <div class="testimonail__quote-img mb-30">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonial/quote-img-4.png" alt="">
                                        </div>
                                        <?php if (!empty($item['review_content'])) : ?>
                                            <p class="quote__text mb-30"><?php echo starter_theme_kses($item['review_content']); ?></p>
                                        <?php endif; ?>
                                        <div class="author__info">
                                            <?php if (!empty($st_reviewer_image)) : ?>
                                                <div class="author__image">
                                                    <a href="#"><img src="<?php echo esc_url($st_reviewer_image); ?>" alt="<?php echo esc_url($st_reviewer_image_alt); ?>"></a>
                                                </div>
                                            <?php endif; ?>
                                            <div class="author__content">
                                                <?php if (!empty($item['reviewer_name'])) : ?>
                                                    <h5><?php echo starter_theme_kses($item['reviewer_name']); ?></h5>
                                                <?php endif; ?>
                                                <?php if (!empty($item['reviewer_title'])) : ?>
                                                    <span><?php echo starter_theme_kses($item['reviewer_title']); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>


        <?php else :
            $this->add_render_attribute('title_args', 'class', 'section__title');

            if (!empty($settings['st_image']['url'])) {
                $st_image_url = !empty($settings['st_image']['id']) ? wp_get_attachment_image_url($settings['st_image']['id'], $settings['st_image_size_size']) : $settings['st_image']['url'];
                $st_image_alt = get_post_meta($settings["st_image"]["id"], "_wp_attachment_image_alt", true);
            }

        ?>
            <section class="testimonial__area grey-bg-5 pt-120 pb-120 fix">
                <?php if (!empty($st_image_url)) : ?>
                    <div class="testimonial__right-bg">
                        <img src="<?php echo esc_url($st_image_url); ?>" alt="<?php echo esc_attr($st_image_alt); ?>">
                    </div>
                <?php endif; ?>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="section__wrapper mb-45">
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
                                <?php if (!empty($settings['st_sub_title'])) : ?>
                                    <div class="r-text">
                                        <span><?php echo starter_theme_kses($settings['st_sub_title']); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($settings['st_desctiption'])) : ?>
                                    <p><?php echo starter_theme_kses($settings['st_desctiption']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="testimonial__slider swiper-container">
                                <div class="testimonial__wrapper swiper-wrapper">
                                    <?php foreach ($settings['reviews_list'] as $index => $item) :
                                        if (!empty($item['reviewer_image']['url'])) {
                                            $st_reviewer_image = !empty($item['reviewer_image']['id']) ? wp_get_attachment_image_url($item['reviewer_image']['id'], $settings['thumbnail_size_size']) : $item['reviewer_image']['url'];
                                            $st_reviewer_image_alt = get_post_meta($item["reviewer_image"]["id"], "_wp_attachment_image_alt", true);
                                        }
                                    ?>
                                        <div class="testimonial__item swiper-slide">
                                            <?php if (!empty($item['review_content'])) : ?>
                                                <p class="review__text"><?php echo starter_theme_kses($item['review_content']); ?></p>
                                            <?php endif; ?>
                                            <div class="review__info mt-30">
                                                <?php if (!empty($st_reviewer_image)) : ?>
                                                    <a href="#"> <img src="<?php echo esc_url($st_reviewer_image); ?>" alt="<?php echo esc_url($st_reviewer_image_alt); ?>"></a>
                                                <?php endif; ?>

                                                <div class="client__content">
                                                    <?php if (!empty($item['reviewer_name'])) : ?>
                                                        <h5 class="client__name"><?php echo starter_theme_kses($item['reviewer_name']); ?></h5>
                                                    <?php endif; ?>
                                                    <?php if (!empty($item['reviewer_title'])) : ?>
                                                        <div class="client__designation">
                                                            <p><?php echo starter_theme_kses($item['reviewer_title']); ?></p>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>

                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        <?php endif; ?>

<?php
    }
}

$widgets_manager->register(new ST_Testimonial());
