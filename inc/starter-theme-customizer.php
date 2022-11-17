<?php

/**
 * starter-theme customizer
 *
 * @package starter-them
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Added Panels & Sections
 */
function starter_theme_customizer_panels_sections($wp_customize) {

    //Add panel
    $wp_customize->add_panel('starter_theme_customizer', [
        'priority' => 10,
        'title'    => esc_html__('Starter Theme Customizer', 'starter-theme'),
    ]);

    /**
     * Customizer Section
     */
    $wp_customize->add_section('header_top_setting', [
        'title'       => esc_html__('Header Info Setting', 'starter-theme'),
        'description' => '',
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'starter_theme_customizer',
    ]);

    $wp_customize->add_section('header_social', [
        'title'       => esc_html__('Header Social', 'starter-theme'),
        'description' => '',
        'priority'    => 11,
        'capability'  => 'edit_theme_options',
        'panel'       => 'starter_theme_customizer',
    ]);

    $wp_customize->add_section('section_header_logo', [
        'title'       => esc_html__('Header Setting', 'starter-theme'),
        'description' => '',
        'priority'    => 12,
        'capability'  => 'edit_theme_options',
        'panel'       => 'starter_theme_customizer',
    ]);

    $wp_customize->add_section('blog_setting', [
        'title'       => esc_html__('Blog Setting', 'starter-theme'),
        'description' => '',
        'priority'    => 13,
        'capability'  => 'edit_theme_options',
        'panel'       => 'starter_theme_customizer',
    ]);

    $wp_customize->add_section('header_side_setting', [
        'title'       => esc_html__('Side Info', 'starter-theme'),
        'description' => '',
        'priority'    => 14,
        'capability'  => 'edit_theme_options',
        'panel'       => 'starter_theme_customizer',
    ]);

    $wp_customize->add_section('breadcrumb_setting', [
        'title'       => esc_html__('Breadcrumb Setting', 'starter-theme'),
        'description' => '',
        'priority'    => 15,
        'capability'  => 'edit_theme_options',
        'panel'       => 'starter_theme_customizer',
    ]);

    $wp_customize->add_section('blog_setting', [
        'title'       => esc_html__('Blog Setting', 'starter-theme'),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'starter_theme_customizer',
    ]);

    $wp_customize->add_section('footer_setting', [
        'title'       => esc_html__('Footer Settings', 'starter-theme'),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'starter_theme_customizer',
    ]);

    $wp_customize->add_section('footer_social', [
        'title'       => esc_html__('Footer Social', 'starter-theme'),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'starter_theme_customizer',
    ]);

    $wp_customize->add_section('color_setting', [
        'title'       => esc_html__('Color Setting', 'starter-theme'),
        'description' => '',
        'priority'    => 17,
        'capability'  => 'edit_theme_options',
        'panel'       => 'starter_theme_customizer',
    ]);

    $wp_customize->add_section('404_page', [
        'title'       => esc_html__('404 Page', 'starter-theme'),
        'description' => '',
        'priority'    => 18,
        'capability'  => 'edit_theme_options',
        'panel'       => 'starter_theme_customizer',
    ]);

    $wp_customize->add_section('typo_setting', [
        'title'       => esc_html__('Typography Setting', 'starter-theme'),
        'description' => '',
        'priority'    => 21,
        'capability'  => 'edit_theme_options',
        'panel'       => 'starter_theme_customizer',
    ]);

    $wp_customize->add_section('slug_setting', [
        'title'       => esc_html__('Slug Settings', 'starter-theme'),
        'description' => '',
        'priority'    => 22,
        'capability'  => 'edit_theme_options',
        'panel'       => 'starter_theme_customizer',
    ]);
    $wp_customize->add_section('tutor_course_settings', [
        'title'       => esc_html__('Tutor Course Settings ', 'starter-theme'),
        'description' => '',
        'priority'    => 23,
        'capability'  => 'edit_theme_options',
        'panel'       => 'starter_theme_customizer',
    ]);
}

add_action('customize_register', 'starter_theme_customizer_panels_sections');

function _header_top_fields($fields) {
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'starter_theme_topbar_switch',
        'label'    => esc_html__('Topbar Swicher', 'starter-theme'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'starter-theme'),
            'off' => esc_html__('Disable', 'starter-theme'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'starter_theme_preloader',
        'label'    => esc_html__('Preloader On/Off', 'starter-theme'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'starter-theme'),
            'off' => esc_html__('Disable', 'starter-theme'),
        ],
    ];


    $fields[] = [
        'type'     => 'switch',
        'settings' => 'starter_theme_backtotop',
        'label'    => esc_html__('Back To Top On/Off', 'starter-theme'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'starter-theme'),
            'off' => esc_html__('Disable', 'starter-theme'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'starter_theme_header_right',
        'label'    => esc_html__('Header Right On/Off', 'starter-theme'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'starter-theme'),
            'off' => esc_html__('Disable', 'starter-theme'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'starter_theme_search',
        'label'    => esc_html__('Header Search On/Off', 'starter-theme'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'starter-theme'),
            'off' => esc_html__('Disable', 'starter-theme'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'starter_theme_header_lang',
        'label'    => esc_html__('language On/Off', 'starter-theme'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'starter-theme'),
            'off' => esc_html__('Disable', 'starter-theme'),
        ],
    ];

    // button
    $fields[] = [
        'type'     => 'text',
        'settings' => 'starter_theme_button_text',
        'label'    => esc_html__('Button Text', 'starter-theme'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('Contact Us', 'starter-theme'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'starter_theme_header_right',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'link',
        'settings' => 'starter_theme_button_link',
        'label'    => esc_html__('Button URL', 'starter-theme'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('#', 'starter-theme'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'starter_theme_header_right',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];


    // phone
    $fields[] = [
        'type'     => 'text',
        'settings' => 'starter_theme_phone_num',
        'label'    => esc_html__('Phone Number', 'starter-theme'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('+(088) 234 567 899', 'starter-theme'),
        'priority' => 10,
    ];

    // email
    $fields[] = [
        'type'     => 'text',
        'settings' => 'starter_theme_mail_id',
        'label'    => esc_html__('Mail ID', 'starter-theme'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('info@starter-them.com', 'starter-theme'),
        'priority' => 10,
    ];

    // email
    $fields[] = [
        'type'     => 'text',
        'settings' => 'starter_theme_address',
        'label'    => esc_html__('Address', 'starter-theme'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('16/A, New York, US', 'starter-theme'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'starter_theme_address_url',
        'label'    => esc_html__('Address URL', 'starter-theme'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('https://goo.gl/maps/qzqY2PAcQwUz1BYN9', 'starter-theme'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'starter_theme_header_feed',
        'label'    => esc_html__('Feed Text', 'starter-theme'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('Our company is one of the', 'starter-theme'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'starter_theme_header_delivery_text',
        'label'    => esc_html__('Delivery Text', 'starter-theme'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('Deliver the sustainable success', 'starter-theme'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'starter_theme_header_delivery_url',
        'label'    => esc_html__('Delivery URL', 'starter-theme'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('#', 'starter-theme'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'starter_theme_top_menu',
        'label'    => esc_html__('Top Menu', 'starter-theme'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('<a href="faq.html">Faq</a><a href="contact.html">Careers</a>', 'starter-theme'),
        'priority' => 10,
    ];

    return $fields;
}
add_filter('kirki/fields', '_header_top_fields');

/*
Header Social
 */
function _header_social_fields($fields) {
    // header section social
    $fields[] = [
        'type'     => 'text',
        'settings' => 'starter_theme_topbar_fb_url',
        'label'    => esc_html__('Facebook Url', 'starter-theme'),
        'section'  => 'header_social',
        'default'  => esc_html__('#', 'starter-theme'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'starter_theme_topbar_twitter_url',
        'label'    => esc_html__('Twitter Url', 'starter-theme'),
        'section'  => 'header_social',
        'default'  => esc_html__('#', 'starter-theme'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'starter_theme_topbar_linkedin_url',
        'label'    => esc_html__('Linkedin Url', 'starter-theme'),
        'section'  => 'header_social',
        'default'  => esc_html__('#', 'starter-theme'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'starter_theme_topbar_instagram_url',
        'label'    => esc_html__('Instagram Url', 'starter-theme'),
        'section'  => 'header_social',
        'default'  => esc_html__('#', 'starter-theme'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'starter_theme_topbar_youtube_url',
        'label'    => esc_html__('Youtube Url', 'starter-theme'),
        'section'  => 'header_social',
        'default'  => esc_html__('#', 'starter-theme'),
        'priority' => 10,
    ];


    return $fields;
}
add_filter('kirki/fields', '_header_social_fields');

/*
Header Settings
 */
function _header_header_fields($fields) {
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_header',
        'label'       => esc_html__('Select Header Style', 'starter-theme'),
        'section'     => 'section_header_logo',
        'placeholder' => esc_html__('Select an option...', 'starter-theme'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'header-style-1'   => get_template_directory_uri() . '/inc/img/header/header-1.png',
            'header-style-2' => get_template_directory_uri() . '/inc/img/header/header-2.png',
            'header-style-3'  => get_template_directory_uri() . '/inc/img/header/header-3.png'
        ],
        'default'     => 'header-style-1',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'logo',
        'label'       => esc_html__('Header Logo', 'starter-theme'),
        'description' => esc_html__('Upload Your Logo.', 'starter-theme'),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo-white.png',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'seconday_logo',
        'label'       => esc_html__('Header Secondary Logo', 'starter-theme'),
        'description' => esc_html__('Header Logo Black', 'starter-theme'),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo-black.png',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'preloader_logo',
        'label'       => esc_html__('Preloader Logo', 'starter-theme'),
        'description' => esc_html__('Upload Preloader Logo.', 'starter-theme'),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/favicon.png',
    ];

    return $fields;
}
add_filter('kirki/fields', '_header_header_fields');

/*
Header Side Info
 */
function _header_side_fields($fields) {
    // side info settings
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'starter_theme_side_hide',
        'label'    => esc_html__('Side Info On/Off', 'starter-theme'),
        'section'  => 'header_side_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'starter-theme'),
            'off' => esc_html__('Disable', 'starter-theme'),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'starter_theme_side_search',
        'label'    => esc_html__('Side Search On/Off', 'starter-theme'),
        'section'  => 'header_side_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'starter-theme'),
            'off' => esc_html__('Disable', 'starter-theme'),
        ],
    ];
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'starter_theme_side_logo',
        'label'       => esc_html__('Logo Side', 'starter-theme'),
        'description' => esc_html__('Logo Side', 'starter-theme'),
        'section'     => 'header_side_setting',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo-black.png',
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'starter_theme_extra_about_text',
        'label'    => esc_html__('Side Description Text', 'starter-theme'),
        'section'  => 'header_side_setting',
        'default'  => esc_html__('But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and will give you a complete account of the system and expound the actual teachings of the great explore', 'starter-theme'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'starter_theme_extra_map_iframe',
        'label'    => esc_html__('Map Address Iframe', 'starter-theme'),
        'section'  => 'header_side_setting',
        'default'  => esc_html__('https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29176.030811137334!2d90.3883827!3d23.924917699999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1605272373598!5m2!1sen!2sbd', 'starter-theme'),
        'priority' => 10,
    ];

    // contact
    $fields[] = [
        'type'     => 'text',
        'settings' => 'starter_theme_contact_title',
        'label'    => esc_html__('Contact Title', 'starter-theme'),
        'section'  => 'header_side_setting',
        'default'  => esc_html__('Contact Title', 'starter-theme'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'starter_theme_extra_address',
        'label'    => esc_html__('Office Address', 'starter-theme'),
        'section'  => 'header_side_setting',
        'default'  => esc_html__('12/A, Mirnada City Tower, NYC', 'starter-theme'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'starter_theme_extra_map',
        'label'    => esc_html__('Address Map Link', 'starter-theme'),
        'section'  => 'header_side_setting',
        'default'  => esc_html__('#', 'starter-theme'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'starter_theme_extra_phone',
        'label'    => esc_html__('Phone Number', 'starter-theme'),
        'section'  => 'header_side_setting',
        'default'  => esc_html__('+0989 7876 9865 9', 'starter-theme'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'starter_theme_extra_email',
        'label'    => esc_html__('Email ID', 'starter-theme'),
        'section'  => 'header_side_setting',
        'default'  => esc_html__('info@themepure.net', 'starter-theme'),
        'priority' => 10,
    ];

    // repeater start
    $fields[] = [
        'type'     => 'repeater',
        'label'    => esc_html__('Image Gallery', 'starter-theme'),
        'section'  => 'header_side_setting',
        'row_label' => [
            'type'     => 'text',
            'value'    => esc_html__('Client', 'starter-theme'),
        ],

        'button_label' => esc_html__('Add new Gallery Item', 'starter-theme'),

        'settings'     => 'starter_theme_side_gallery_items',
        'fields' => [
            'starter_theme_g_image' => [
                'type'         => 'image',
                'label'        => esc_html__('Gallery Image', 'starter-theme'),
                'description'  => esc_attr__('Upload Gallery Image', 'starter-theme'),
            ]
        ]
    ];
    // repeater end

    return $fields;
}
add_filter('kirki/fields', '_header_side_fields');

/*
_header_page_title_fields
 */
function _header_page_title_fields($fields) {
    // Breadcrumb Setting
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_bg_img',
        'label'       => esc_html__('Breadcrumb Background Image', 'starter-theme'),
        'description' => esc_html__('Breadcrumb Background Image', 'starter-theme'),
        'section'     => 'breadcrumb_setting',
        'default'     => get_template_directory_uri() . '/assets/img/page-title/page-title.jpg',
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'starter_theme_breadcrumb_bg_color',
        'label'       => __('Breadcrumb BG Color', 'starter-theme'),
        'description' => esc_html__('This is a Breadcrumb bg color control.', 'starter-theme'),
        'section'     => 'breadcrumb_setting',
        'default'     => '#f4f9fc',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'breadcrumb_info_switch',
        'label'    => esc_html__('Breadcrumb Info switch', 'starter-theme'),
        'section'  => 'breadcrumb_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'starter-theme'),
            'off' => esc_html__('Disable', 'starter-theme'),
        ],
    ];

    return $fields;
}
add_filter('kirki/fields', '_header_page_title_fields');

/*
Header Social
 */
function _header_blog_fields($fields) {
    // Blog Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'starter_theme_blog_btn_switch',
        'label'    => esc_html__('Blog BTN On/Off', 'starter-theme'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'starter-theme'),
            'off' => esc_html__('Disable', 'starter-theme'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'starter_theme_blog_cat',
        'label'    => esc_html__('Blog Category Meta On/Off', 'starter-theme'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'starter-theme'),
            'off' => esc_html__('Disable', 'starter-theme'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'starter_theme_blog_author',
        'label'    => esc_html__('Blog Author Meta On/Off', 'starter-theme'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'starter-theme'),
            'off' => esc_html__('Disable', 'starter-theme'),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'starter_theme_blog_date',
        'label'    => esc_html__('Blog Date Meta On/Off', 'starter-theme'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'starter-theme'),
            'off' => esc_html__('Disable', 'starter-theme'),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'starter_theme_blog_comments',
        'label'    => esc_html__('Blog Comments Meta On/Off', 'starter-theme'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'starter-theme'),
            'off' => esc_html__('Disable', 'starter-theme'),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'starter_theme_blog_btn',
        'label'    => esc_html__('Blog Button text', 'starter-theme'),
        'section'  => 'blog_setting',
        'default'  => esc_html__('Read More', 'starter-theme'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title',
        'label'    => esc_html__('Blog Title', 'starter-theme'),
        'section'  => 'blog_setting',
        'default'  => esc_html__('Blog', 'starter-theme'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title_details',
        'label'    => esc_html__('Blog Details Title', 'starter-theme'),
        'section'  => 'blog_setting',
        'default'  => esc_html__('Blog Details', 'starter-theme'),
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', '_header_blog_fields');

/*
Footer
 */
function _header_footer_fields($fields) {
    // Footer Setting
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_footer',
        'label'       => esc_html__('Choose Footer Style', 'starter-theme'),
        'section'     => 'footer_setting',
        'default'     => '5',
        'placeholder' => esc_html__('Select an option...', 'starter-theme'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'footer-style-1'   => get_template_directory_uri() . '/inc/img/footer/footer-1.png',
            'footer-style-2' => get_template_directory_uri() . '/inc/img/footer/footer-2.png',
            'footer-style-3' => get_template_directory_uri() . '/inc/img/footer/footer-3.png',
        ],
        'default'     => 'footer-style-1',
    ];

    $fields[] = [
        'type'        => 'select',
        'settings'    => 'footer_widget_number',
        'label'       => esc_html__('Widget Number', 'starter-theme'),
        'section'     => 'footer_setting',
        'default'     => '4',
        'placeholder' => esc_html__('Select an option...', 'starter-theme'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            '4' => esc_html__('Widget Number 4', 'starter-theme'),
            '3' => esc_html__('Widget Number 3', 'starter-theme'),
            '2' => esc_html__('Widget Number 2', 'starter-theme'),
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'starter_theme_footer_bg',
        'label'       => esc_html__('Footer Background Image.', 'starter-theme'),
        'description' => esc_html__('Footer Background Image.', 'starter-theme'),
        'section'     => 'footer_setting',
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'starter_theme_footer_bg_color',
        'label'       => __('Footer BG Color', 'starter-theme'),
        'description' => esc_html__('This is a Footer bg color control.', 'starter-theme'),
        'section'     => 'footer_setting',
        'default'     => '#f4f9fc',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'footer_style_2_switch',
        'label'    => esc_html__('Footer Style 2 On/Off', 'starter-theme'),
        'section'  => 'footer_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'starter-theme'),
            'off' => esc_html__('Disable', 'starter-theme'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'footer_style_3_switch',
        'label'    => esc_html__('Footer Style 3 On/Off', 'starter-theme'),
        'section'  => 'footer_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'starter-theme'),
            'off' => esc_html__('Disable', 'starter-theme'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'starter_theme_footer_social_switch',
        'label'    => esc_html__('Footer Social On/Off', 'starter-theme'),
        'section'  => 'footer_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'starter-theme'),
            'off' => esc_html__('Disable', 'starter-theme'),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'starter_theme_copyright',
        'label'    => esc_html__('Copyright', 'starter-theme'),
        'section'  => 'footer_setting',
        'default'  => esc_html__('Copyright &copy; 2022 Theme_Pure. All Rights Reserved', 'starter-theme'),
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', '_header_footer_fields');

/*
Header Social
 */
function _footer_social_fields($fields) {
    // header section social
    $fields[] = [
        'type'     => 'text',
        'settings' => 'starter_theme_footer_fb_url',
        'label'    => esc_html__('Facebook Url', 'starter-theme'),
        'section'  => 'footer_social',
        'default'  => esc_html__('#', 'starter-theme'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'starter_theme_footer_twitter_url',
        'label'    => esc_html__('Twitter Url', 'starter-theme'),
        'section'  => 'footer_social',
        'default'  => esc_html__('#', 'starter-theme'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'starter_theme_footer_linkedin_url',
        'label'    => esc_html__('Linkedin Url', 'starter-theme'),
        'section'  => 'footer_social',
        'default'  => esc_html__('#', 'starter-theme'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'starter_theme_footer_instagram_url',
        'label'    => esc_html__('Instagram Url', 'starter-theme'),
        'section'  => 'footer_social',
        'default'  => esc_html__('#', 'starter-theme'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'starter_theme_footer_youtube_url',
        'label'    => esc_html__('Youtube Url', 'starter-theme'),
        'section'  => 'footer_social',
        'default'  => esc_html__('#', 'starter-theme'),
        'priority' => 10,
    ];


    return $fields;
}
add_filter('kirki/fields', '_footer_social_fields');


// color
function starter_theme_color_fields($fields) {
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'starter_theme_color_option',
        'label'       => __('Theme Color', 'starter-theme'),
        'description' => esc_html__('This is a Theme color control.', 'starter-theme'),
        'section'     => 'color_setting',
        'default'     => '#2b4eff',
        'priority'    => 10,
    ];
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'starter_theme_color_option_2',
        'label'       => __('Primary Color', 'starter-theme'),
        'description' => esc_html__('This is a Primary color control.', 'starter-theme'),
        'section'     => 'color_setting',
        'default'     => '#f2277e',
        'priority'    => 10,
    ];
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'starter_theme_color_option_3',
        'label'       => __('Secondary Color', 'starter-theme'),
        'description' => esc_html__('This is a Secondary color control.', 'starter-theme'),
        'section'     => 'color_setting',
        'default'     => '#30a820',
        'priority'    => 10,
    ];
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'starter_theme_color_option_3_2',
        'label'       => __('Secondary Color 2', 'starter-theme'),
        'description' => esc_html__('This is a Secondary color 2 control.', 'starter-theme'),
        'section'     => 'color_setting',
        'default'     => '#ffb352',
        'priority'    => 10,
    ];
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'starter_theme_color_scrollup',
        'label'       => __('ScrollUp Color', 'starter-theme'),
        'description' => esc_html__('This is a ScrollUp colo control.', 'starter-theme'),
        'section'     => 'color_setting',
        'default'     => '#2b4eff',
        'priority'    => 10,
    ];

    return $fields;
}
add_filter('kirki/fields', 'starter_theme_color_fields');

// 404
function starter_theme_404_fields($fields) {
    // 404 settings
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'starter_theme_404_bg',
        'label'       => esc_html__('404 Image.', 'starter-theme'),
        'description' => esc_html__('404 Image.', 'starter-theme'),
        'section'     => '404_page',
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'starter_theme_error_title',
        'label'    => esc_html__('Not Found Title', 'starter-theme'),
        'section'  => '404_page',
        'default'  => esc_html__('Page not found', 'starter-theme'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'starter_theme_error_desc',
        'label'    => esc_html__('404 Description Text', 'starter-theme'),
        'section'  => '404_page',
        'default'  => esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted', 'starter-theme'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'starter_theme_error_link_text',
        'label'    => esc_html__('404 Link Text', 'starter-theme'),
        'section'  => '404_page',
        'default'  => esc_html__('Back To Home', 'starter-theme'),
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', 'starter_theme_404_fields');


/**
 * Added Fields
 */
function starter_theme_typo_fields($fields) {
    // typography settings
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_body_setting',
        'label'       => esc_html__('Body Font', 'starter-theme'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'body',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h_setting',
        'label'       => esc_html__('Heading h1 Fonts', 'starter-theme'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h1',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h2_setting',
        'label'       => esc_html__('Heading h2 Fonts', 'starter-theme'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h2',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h3_setting',
        'label'       => esc_html__('Heading h3 Fonts', 'starter-theme'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h3',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h4_setting',
        'label'       => esc_html__('Heading h4 Fonts', 'starter-theme'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h4',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h5_setting',
        'label'       => esc_html__('Heading h5 Fonts', 'starter-theme'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h5',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h6_setting',
        'label'       => esc_html__('Heading h6 Fonts', 'starter-theme'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h6',
            ],
        ],
    ];
    return $fields;
}

add_filter('kirki/fields', 'starter_theme_typo_fields');





/**
 * Added Fields
 */
function starter_theme_slug_setting($fields) {
    // slug settings
    $fields[] = [
        'type'     => 'text',
        'settings' => 'starter_theme_ev_slug',
        'label'    => esc_html__('Event Slug', 'starter-theme'),
        'section'  => 'slug_setting',
        'default'  => esc_html__('ourevent', 'starter-theme'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'starter_theme_port_slug',
        'label'    => esc_html__('Portfolio Slug', 'starter-theme'),
        'section'  => 'slug_setting',
        'default'  => esc_html__('ourportfolio', 'starter-theme'),
        'priority' => 10,
    ];

    return $fields;
}

add_filter('kirki/fields', 'starter_theme_slug_setting');


/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function starter_theme_THEME_option($name) {
    $value = '';
    if (class_exists('starter-theme')) {
        $value = Kirki::get_option(starter_theme_get_theme(), $name);
    }

    return apply_filters('starter_theme_THEME_option', $value, $name);
}

/**
 * Get config ID
 *
 * @return string
 */
function starter_theme_get_theme() {
    return 'starter-theme';
}
