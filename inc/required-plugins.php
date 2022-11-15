<?php

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname(__FILE__) . '/tgm-plugin-activation.php';

add_action('tgmpa_register', 'starter_theme_required_plugins');

/**
 * Register the required plugins for this theme.
 *
 */
function starter_theme_required_plugins() {
  /*
	 * Array of plugin arrays. Required keys are name and slug.
	 */
  $plugins = array(
    // This is an example of how to include a plugin from the WordPress Plugin Repository.
    array(
      'name'      => esc_html__('Elementor Website Builder', 'starter-theme'),
      'slug'      => 'elementor',
      'required'  => true,
    ),
    array(
      'name'     =>  esc_html__('Kirki Customizer Framework', 'dustrilox'),
      'slug'     => 'kirki',
      'required' => false,
    ),
    array(
      'name'      => 'One Click Demo Import',
      'slug'      => 'one-click-demo-import',
      'required'  => true,
    ),


    // // This is an example of how to include a plugin bundled with a theme.
    array(
      'name'               => esc_html__('Advanced Custom Fields Pro', 'starter-theme'),
      'slug'               => 'advanced-custom-fields-pro',
      'source'             => get_stylesheet_directory() . '/inc/plugins/advanced-custom-fields-pro.zip',
      'required'           => true,
      'force_activation'   => false,
      'force_deactivation' => false,
    ),




  );

  /*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 */
  $config = array(
    'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
    'default_path' => '',                      // Default absolute path to bundled plugins.
    'menu'         => 'tgmpa-install-plugins', // Menu slug.
    'parent_slug'  => 'themes.php',            // Parent menu slug.
    'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
    'has_notices'  => true,                    // Show admin notices or not.
    'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
    'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
    'is_automatic' => false,                   // Automatically activate plugins after installation or not.
    'message'      => '',                      // Message to output right before the plugins table.

  );

  tgmpa($plugins, $config);
}
