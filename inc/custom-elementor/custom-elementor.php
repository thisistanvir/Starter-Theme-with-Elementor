<?php

/**
 * The template for displaying Elementor Addon.
 *
 * @package Starter-theme
 */

// namespace Starter_Theme;

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Starter_Theme class.
 *
 * The main class that initiates and runs the addon.
 */
final class Starter_Theme_Extension {

  /**
   * Extension Version
   */
  const VERSION = '1.0.0';

  /**
   * Minimum Elementor Version
   */
  const MINIMUM_ELEMENTOR_VERSION = '3.7.0';

  /**
   * Minimum PHP Version
   */
  const MINIMUM_PHP_VERSION = '7.3';

  /**
   * Instance
   */
  private static $_instance = null;

  public static function instance() {

    if (is_null(self::$_instance)) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }

  /**
   * Constructor
   */
  public function __construct() {

    if ($this->is_compatible()) {
      add_action('elementor/init', [$this, 'init']);
    }
  }

  /**
   * Compatibility Checks
   *
   * Checks whether the site meets the addon requirement.
   */
  public function is_compatible() {

    // Check if Elementor installed and activated
    if (!did_action('elementor/loaded')) {
      add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
      return false;
    }

    // Check for required Elementor version
    if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
      add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
      return false;
    }

    // Check for required PHP version
    if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
      add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
      return false;
    }

    return true;
  }

  /**
   * Admin notice
   *
   * Warning when the site doesn't have Elementor installed or activated.
   */
  public function admin_notice_missing_main_plugin() {

    if (isset($_GET['activate'])) unset($_GET['activate']);

    $message = sprintf(
      /* translators: 1: Plugin name 2: Elementor */
      esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'starter-theme'),
      '<strong>' . esc_html__('Starter-Theme', 'starter-theme') . '</strong>',
      '<strong>' . esc_html__('Elementor', 'starter-theme') . '</strong>'
    );

    printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
  }

  /**
   * Admin notice
   *
   * Warning when the site doesn't have a minimum required Elementor version.
   */
  public function admin_notice_minimum_elementor_version() {

    if (isset($_GET['activate'])) unset($_GET['activate']);

    $message = sprintf(
      /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
      esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'starter-theme'),
      '<strong>' . esc_html__('Starter-Theme', 'starter-theme') . '</strong>',
      '<strong>' . esc_html__('Elementor', 'starter-theme') . '</strong>',
      self::MINIMUM_ELEMENTOR_VERSION
    );

    printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
  }

  /**
   * Admin notice
   *
   * Warning when the site doesn't have a minimum required PHP version.
   */
  public function admin_notice_minimum_php_version() {

    if (isset($_GET['activate'])) unset($_GET['activate']);

    $message = sprintf(
      /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
      esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'starter-theme'),
      '<strong>' . esc_html__('Starter-Theme', 'starter-theme') . '</strong>',
      '<strong>' . esc_html__('PHP', 'starter-theme') . '</strong>',
      self::MINIMUM_PHP_VERSION
    );

    printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
  }

  /**
   * Initialize
   *
   * Load the addons functionality only after Elementor is initialized.
   */
  public function init() {

    add_action('elementor/widgets/register', [$this, 'register_widgets']);

    add_action('elementor/frontend/after_enqueue_styles', [$this, 'frontend_styles']);
    add_action('elementor/frontend/after_register_scripts', [$this, 'frontend_scripts']);
  }

  /**
   * Register Widgets
   *
   * Load widgets files and register new Elementor widgets.
   */
  public function register_widgets($widgets_manager) {

    require_once(__DIR__ . '/widgets/addons.php');

    $widgets_manager->register_widget_type(new Addon_Widget());
  }


  // Enqueue Widget Style
  public function frontend_styles() {
    wp_enqueue_style('slick', get_template_directory_uri() . '/inc/custom-elementor/assets/slick.css', array(), '1.0.0', 'all');
  }


  // Enqueue Widget Scripts
  public function frontend_scripts() {
    wp_enqueue_script('slick', get_template_directory_uri() . '/inc/custom-elementor/assets/slick.min.js', array('jquery'), '1.5.7', true);
  }
}
Starter_Theme_Extension::instance();

// Added New Category
function add_elementor_widget_categories($elements_manager) {

  $elements_manager->add_category(
    'starter-theme',
    [
      'title' => esc_html__('Starter Theme', 'starter-theme'),
      'icon' => 'fa fa-plug',
    ]
  );
}
add_action('elementor/elements/categories_registered', 'add_elementor_widget_categories');
