<?php

/**
 * The template for displaying Metaboxs and Options.
 *
 * @package Starter-theme
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (class_exists('CSF')) {
    $theme_options_prefix = 'starter_theme_options';

    CSF::createOptions($theme_options_prefix, array(
        'menu_title' => esc_html__('Theme Options', 'starter-theme'),
        'framework_title' => esc_html__('Theme Options', 'starter-theme'),
        'menu_slug'  => 'theme-options',
    ));

    CSF::createSection($theme_options_prefix, array(
        'title'  => 'General',
        'fields' => array(

            array(
                'id'    => 'phone',
                'type'  => 'text',
                'title' => 'Phone number',
            ),

        )
    ));

    // Metaboxes

    // Page metabox
    $page_metabox_prefix = 'st_meta';
    CSF::createMetabox($page_metabox_prefix, array(
        'title'     => 'Options',
        'post_type' => 'page',
        'data_type' => 'serialize',
    ));

    CSF::createSection($page_metabox_prefix, array(
        'fields' => array(
            // array(
            //     'id'    => 'enable_page_title',
            //     'type'  => 'switcher',
            //     'title' => 'Enable page title?',
            //     'default' => true,
            // ),
            array(
                'id'    => 'default_padding',
                'type'  => 'switcher',
                'title' => 'Enable default padding?',
                'default' => true,
            ),
        )
    ));
} else {
    function starter_theme_codestar_install_notice() {
?>
        <div class="notice notice-warning">
            <p><strong><?php echo wp_get_theme(); ?></strong> required <strong>Codestar Framework</strong> plugin to be installed and activated on your site.</p>
        </div>
<?php
    }
    add_action('admin_notices', 'starter_theme_codestar_install_notice');
}
