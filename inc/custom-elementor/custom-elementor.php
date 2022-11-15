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

        // custom icons tab
        add_filter('elementor/icons_manager/additional_tabs', [$this, 'starter_theme_add_custom_icons_tab']);
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

        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

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

        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

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

        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

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
        // Its is now safe to include Widgets files
        foreach ($this->starter_theme_widget_list() as $widget_file_name) {
            require_once(__DIR__ . "/widgets/{$widget_file_name}.php");
        }
    }

    public function starter_theme_widget_list() {
        return [
            'heading',
            'iconbox',
            'team',
            'testimonial',
        ];
    }
    // public function register_widgets( $widgets_manager ) {

    //     require_once __DIR__ . '/widgets/addons.php';

    //     $widgets_manager->register_widget_type( new Addon_Widget() );
    // }

    // Enqueue Widget Style
    public function frontend_styles() {
        wp_enqueue_style('slick', get_template_directory_uri() . '/inc/custom-elementor/assets/slick.css', array(), '1.0.0', 'all');
    }

    // Enqueue Widget Scripts
    public function frontend_scripts() {
        wp_enqueue_script('slick', get_template_directory_uri() . '/inc/custom-elementor/assets/slick.min.js', array('jquery'), '1.5.7', true);
    }


    public function starter_theme_add_custom_icons_tab($tabs = array()) {

        // fontawesome_icons
        $fontawesome_icons = array(
            'angle-up',
            'check',
            'times',
            'calendar',
            'language',
            'shopping-cart',
            'bars',
            'search',
            'map-marker',
            'arrow-right',
            'arrow-left',
            'arrow-up',
            'arrow-down',
            'angle-right',
            'angle-left',
            'angle-up',
            'angle-down',
            'phone',
            'users',
            'user',
            'map-marked-alt',
            'trophy-alt',
            'envelope',
            'marker',
            'globe',
            'broom',
            'home',
            'bed',
            'chair',
            'bath',
            'tree',
            'laptop-code',
            'cube',
            'cog',
            'play',
            'trophy-alt',
            'heart',
            'truck',
            'user-circle',
            'map-marker-alt',
            'comments',
            'award',
            'bell',
            'book-alt',
            'book-open',
            'book-reader',
            'graduation-cap',
            'laptop-code',
            'music',
            'ruler-triangle',
            'user-graduate',
            'microscope',
            'glasses-alt',
            'theater-masks',
            'atom'
        );

        $tabs['st-fontawesome-icons'] = array(
            'name' => 'st-fontawesome-icons',
            'label' => esc_html__('ST - Fontawesome Pro Light', 'starter-theme'),
            'labelIcon' => 'st-icon',
            'prefix' => 'fa-',
            'displayPrefix' => 'fal',
            'url' => get_template_directory_uri() . '/inc/custom-elementor/assets/css/fontawesome-all.min.css',
            'icons' => $fontawesome_icons,
            'ver' => '1.0.0',
        );

        return $tabs;
    }
}
Starter_Theme_Extension::instance();

// Added New Category
function add_elementor_widget_categories($elements_manager) {

    $elements_manager->add_category(
        'starter-theme',
        [
            'title' => esc_html__('Starter Theme', 'starter-theme'),
            'icon'  => 'fa fa-plug',
        ]
    );
}
add_action('elementor/elements/categories_registered', 'add_elementor_widget_categories');

/**
 * Get all Pages
 */
if (!function_exists('starter_theme_get_all_pages')) {
    function starter_theme_get_all_pages() {

        $page_list = get_posts(array(
            'post_type' => 'page',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 20,
        ));

        $pages = array();

        if (!empty($page_list) && !is_wp_error($page_list)) {
            foreach ($page_list as $page) {
                $pages[$page->ID] = $page->post_title;
            }
        }

        return $pages;
    }
}


/**
 * Get a translatable string with allowed html tags.
 *
 * @param string $level Allowed levels are basic and intermediate
 * @return string
 */
function starter_theme_get_allowed_html_desc($level = 'basic') {
    if (!in_array($level, ['basic', 'intermediate', 'advance'])) {
        $level = 'basic';
    }

    $tags_str = '<' . implode('>,<', array_keys(starter_theme_get_allowed_html_tags($level))) . '>';
    return sprintf(__('This input field has support for the following HTML tags: %1$s', 'starter-theme'), '<code>' . esc_html($tags_str) . '</code>');
}

/**
 * Get a list of all the allowed html tags.
 *
 * @param string $level Allowed levels are basic and intermediate
 * @return array
 */
function starter_theme_get_allowed_html_tags($level = 'basic') {
    $allowed_html = [
        'b' => [],
        'i' => [
            'class' => [],
        ],
        'u' => [],
        'em' => [],
        'br' => [],
        'abbr' => [
            'title' => [],
        ],
        'span' => [
            'class' => [],
        ],
        'strong' => [],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
            'target' => [],
        ];
    }

    if ($level === 'advance') {
        $allowed_html['ul'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['ol'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['li'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
            'target' => [],
        ];
    }

    return $allowed_html;
}


// WP kses allowed html tags
// ----------------------------------------------------------------------------------------
function starter_theme_kses($raw) {

    $allowed_tags = array(
        'a'                         => array(
            'class'   => array(),
            'href'    => array(),
            'rel'  => array(),
            'title'   => array(),
            'target' => array(),
        ),
        'abbr'                      => array(
            'title' => array(),
        ),
        'b'                         => array(),
        'blockquote'                => array(
            'cite' => array(),
        ),
        'cite'                      => array(
            'title' => array(),
        ),
        'code'                      => array(),
        'del'                    => array(
            'datetime'   => array(),
            'title'      => array(),
        ),
        'dd'                     => array(),
        'div'                    => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
        ),
        'dl'                     => array(),
        'dt'                     => array(),
        'em'                     => array(),
        'h1'                     => array(),
        'h2'                     => array(),
        'h3'                     => array(),
        'h4'                     => array(),
        'h5'                     => array(),
        'h6'                     => array(),
        'i'                         => array(
            'class' => array(),
        ),
        'img'                    => array(
            'alt'  => array(),
            'class'   => array(),
            'height' => array(),
            'src'  => array(),
            'width'   => array(),
        ),
        'li'                     => array(
            'class' => array(),
        ),
        'ol'                     => array(
            'class' => array(),
        ),
        'p'                         => array(
            'class' => array(),
        ),
        'q'                         => array(
            'cite'    => array(),
            'title'   => array(),
        ),
        'span'                      => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
        ),
        'iframe'                 => array(
            'width'         => array(),
            'height'     => array(),
            'scrolling'     => array(),
            'frameborder'   => array(),
            'allow'         => array(),
            'src'        => array(),
        ),
        'strike'                 => array(),
        'br'                     => array(),
        'strong'                 => array(),
        'data-wow-duration'            => array(),
        'data-wow-delay'            => array(),
        'data-wallpaper-options'       => array(),
        'data-stellar-background-ratio'   => array(),
        'ul'                     => array(
            'class' => array(),
        ),
    );

    if (function_exists('wp_kses')) { // WP is here
        $allowed = wp_kses($raw, $allowed_tags);
    } else {
        $allowed = $raw;
    }

    return $allowed;
}

/**
 * Check elementor version
 *
 * @param string $version
 * @param string $operator
 * @return bool
 */
if (!function_exists('starter_theme_is_elementor_version')) {
    function starter_theme_is_elementor_version($operator = '<', $version = '2.6.0') {
        return defined('ELEMENTOR_VERSION') && version_compare(ELEMENTOR_VERSION, $version, $operator);
    }
}

/**
 * Render icon html with backward compatibility
 *
 * @param array $settings
 * @param string $old_icon_id
 * @param string $new_icon_id
 * @param array $attributes
 */
if (!function_exists('starter_theme_render_icon')) {
    function starter_theme_render_icon($settings = [], $old_icon_id = 'icon', $new_icon_id = 'selected_icon', $attributes = []) {
        // Check if its already migrated
        $migrated = isset($settings['__fa4_migrated'][$new_icon_id]);
        // Check if its a new widget without previously selected icon using the old Icon control
        $is_new = empty($settings[$old_icon_id]);

        $attributes['aria-hidden'] = 'true';

        if (starter_theme_is_elementor_version('>=', '2.6.0') && ($is_new || $migrated)) {
            \Elementor\Icons_Manager::render_icon($settings[$new_icon_id], $attributes);
        } else {
            if (empty($attributes['class'])) {
                $attributes['class'] = $settings[$old_icon_id];
            } else {
                if (is_array($attributes['class'])) {
                    $attributes['class'][] = $settings[$old_icon_id];
                } else {
                    $attributes['class'] .= ' ' . $settings[$old_icon_id];
                }
            }
            printf('<i %s></i>', \Elementor\Utils::render_html_attributes($attributes));
        }
    }
}
