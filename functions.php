<?php

/**
 * Starter-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Starter-theme
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!defined('STARTER_THEME_VERSION')) {
    // Replace the version number of the theme on each release.
    define('STARTER_THEME_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
if (!function_exists('starter_theme_support')) :
    function starter_theme_support() {
        /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
        load_theme_textdomain('starter-theme', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
		* Let WordPress manage the document title.
		*/
        add_theme_support('title-tag');

        /*
		* Enable support for Post Thumbnails on posts and pages.
		*/
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'main-menu'   => __('Primary Menu', 'starter-theme'),
            'footer-menu'   => __('Footer Menu', 'starter-theme'),
        ));

        /*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'demo_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         */
        add_theme_support(
            'custom-logo',
            [
                'height'      => 100,
                'width'       => 350,
                'flex-height' => true,
                'flex-width'  => true,
            ]
        );
    }
endif;
add_action('after_setup_theme', 'starter_theme_support');


/**
 * Enqueue scripts and styles.
 */
function starter_theme_scripts() {
    // Load CSS
    wp_enqueue_style('starter-theme-style', get_stylesheet_uri(), array(), STARTER_THEME_VERSION);
    wp_enqueue_style('starter-theme-main', get_template_directory_uri() . '/assets/css/main.css', array(), STARTER_THEME_VERSION, 'all');

    // Load JS
    // wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.8.1', true);
    wp_enqueue_script('starter-theme-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), STARTER_THEME_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'starter_theme_scripts');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function starter_theme_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'starter-theme'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'starter-theme'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'starter_theme_widgets_init');


if (!function_exists('starter_theme_check_hide_title')) {
    /**
     * Check hide title.
     *
     * @param bool $val default value.
     *
     * @return bool
     */
    function starter_theme_check_hide_title($val) {
        if (defined('ELEMENTOR_VERSION')) {
            $current_doc = Elementor\Plugin::instance()->documents->get(get_the_ID());
            if ($current_doc && 'yes' === $current_doc->get_settings('hide_title')) {
                $val = false;
            }
        }
        return $val;
    }
}
add_filter('starter_theme_page_title', 'starter_theme_check_hide_title');


// Includes
//include_once('inc/custom-posts.php');
// include_once('inc/shortcodes.php');
include_once('inc/elementor/elementor.php');
include_once('inc/codestar-framework/codestar-framework.php');
include_once('inc/metabox-and-options.php');

//if(class_exists('WooCommerce')) {
//    include_once('inc/woocommerce.php');
//}
