<?php

/**
 * Theme functions and definitions
 *
 * @package Starter-Theme
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
if (!function_exists('starter_theme_support')) {
  /**
   * Set up theme support.
   *
   */
  function starter_theme_support() {

    /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
    load_theme_textdomain('starter-theme', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');

    /*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
    add_theme_support(
      'html5',
      [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
      ]
    );

    // Editor Style.
    add_editor_style('classic-editor.css');

    // Gutenberg wide images.
    add_theme_support('align-wide');

    /**
     * Woocommerce
     */

    // WooCommerce in general.
    add_theme_support('woocommerce');
    // Enabling WooCommerce product gallery features (are off by default since WC 3.0.0).
    // zoom.
    add_theme_support('wc-product-gallery-zoom');
    // lightbox.
    add_theme_support('wc-product-gallery-lightbox');
    // swipe.
    add_theme_support('wc-product-gallery-slider');



    // Add support for core custom logo.
    add_theme_support(
      'custom-logo',
      [
        'height'      => 100,
        'width'       => 350,
        'flex-height' => true,
        'flex-width'  => true,
      ]
    );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(array(
      'main-menu'   => __('Header Menu', 'starter-theme'),
      'footer-menu'   => __('Footer Menu', 'starter-theme'),
    ));
  }
}
add_action('after_setup_theme', 'starter_theme_support');


/**
 * Theme Scripts & Styles.
 *
 * @return void
 */
if (!function_exists('starter_theme_scripts_styles')) {
  function starter_theme_scripts_styles() {
    // Load CSS
    wp_enqueue_style('starter-theme-main', get_template_directory_uri() . '/assets/css/theme.css', [], STARTER_THEME_VERSION, 'all');
    wp_enqueue_style('starter-theme-style', get_stylesheet_uri(), [], STARTER_THEME_VERSION);

    // Load JS
    wp_enqueue_script('starter-theme-script', get_template_directory_uri() . '/assets/js/theme.js', ['jquery'], STARTER_THEME_VERSION, true);


    if (is_singular() && comments_open() && get_option('thread_comments')) {
      wp_enqueue_script('comment-reply');
    }
  }
}
add_action('wp_enqueue_scripts', 'starter_theme_scripts_styles');


/**
 * Register Elementor Locations.
 *
 * @param ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager $elementor_theme_manager theme manager.
 *
 * @return void
 */
function starter_theme_register_elementor_locations($elementor_theme_manager) {

  $elementor_theme_manager->register_all_core_location();
}
add_action('elementor/theme/register_locations', 'starter_theme_register_elementor_locations');


/**
 * Elementor notice about the plugin is not activated.
 */
if (is_admin()) {
  require get_template_directory() . '/inc/admin-functions.php';
}


/**
 * Check hide title.
 *
 * @param bool $val default value.
 *
 * @return bool
 */
if (!function_exists('starter_theme_check_hide_title')) {
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


/**
 * Wrapper function to deal with backwards compatibility.
 */
if (!function_exists('starter_theme_body_open')) {
  function starter_theme_body_open() {
    if (function_exists('wp_body_open')) {
      wp_body_open();
    } else {
      do_action('wp_body_open');
    }
  }
}


/**
 * Custom Elementor Widgets
 */
include_once('inc/custom-elementor/custom-elementor.php');


/**
 * TGM Plugin Activator
 */
if (!class_exists('TGM_Plugin_Activation')) {
  include_once('inc/tgm-plugin-activation.php');
  include_once('inc/required-plugins.php');
}


/**
 * One Click Demo Import
 */
if (!function_exists('starter_theme_import_files')) {
  function starter_theme_import_files() {
    return array(
      array(
        'import_file_name'             => esc_html__('Starter-Theme Demo Import', 'starter-theme'),
        'local_import_file'            => trailingslashit(get_template_directory()) . '/inc/demo-data/content.xml',
        'local_import_widget_file'     => trailingslashit(get_template_directory()) . '/inc/demo-data/widgets.wie',
        'local_import_customizer_file' => trailingslashit(get_template_directory()) . '/inc/demo-data/customize.dat',
        'import_preview_image_url'     => get_template_directory_uri() . '/screenshot.png',
        'import_notice'                => esc_html__('After import demo, just set static homepage from settings > reading, Check widgets and menu. You will be done! :-)', 'starter-theme'),
        // 'preview_url'                  => 'http://www.your_domain.com/my-demo-1',
      ),
    );
  }
  add_filter('ocdi/import_files', 'starter_theme_import_files');
}


/**
 * ACF Options
 */
if (class_exists('ACF')) {
  include_once('inc/acf/metabox-and-options.php');
  include_once('inc/acf/acf-data.php');
}
