<?php

/**
 * The template for displaying the Theme Options
 *
 * This is the template that displays all of the <head> section, opens the <body> tag and adds the site's header.
 *
 * @package Starter-Theme
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

// inline css by acf
function acf_css() {
?>
  <style>
    /* .header-top {
      background-color: ;
    } */
  </style>
<?php
}
add_filter('wp_head', 'acf_css');



/********************
 * Meta Box
 ******************************************************/
if (function_exists('acf_add_local_field_group')) {

  acf_add_local_field_group(array(
    'key' => 'group_taxonomy_thumbnail',
    // 'title' => 'Taxonomy Thumbnail Group',
    'location' => array(
      array(
        array(
          'param' => 'taxonomy',
          'operator' => '==',
          'value' => 'category',
        ),
      ),
    ),
    'fields' => array(
      array(
        'key' => 'field_taxonomy_thumbnail_id',
        'name' => 'taxonomy_thumbnail_id',
        'label' => __('Thumbnail', 'starter-theme'),
        'type' => 'image',
        'return_format' => 'id',
      )
    ),
  ));
};







/********************
 * Option Page
 ******************************************************/
add_action('acf/init', 'starter_theme_acf_op_init');
function starter_theme_acf_op_init() {

  // Check function exists.
  if (function_exists('acf_add_options_page')) {

    // Add parent.
    $parent = acf_add_options_page(array(
      'page_title'   => __('Starter Theme Settings', 'starter-theme'),
      'menu_title'  => __('Starter Settings', 'starter-theme'),
      'menu_slug'   => 'starter-theme-settings',
      'capability'  => 'edit_posts',
      'redirect'    => true
    ));

    // Top Header Setting
    $child = acf_add_options_sub_page(array(
      'page_title'   => __('Top Header Settings', 'starter-theme'),
      'menu_title'  => __('Top Header', 'starter-theme'),
      'parent_slug'  => $parent['menu_slug'],
    ));

    // Footer
    $child = acf_add_options_sub_page(array(
      'page_title'   => __('Footer Settings', 'starter-theme'),
      'menu_title'  => __('Footer', 'starter-theme'),
      'parent_slug'  => $parent['menu_slug'],
    ));
  }
}


// ACF Jason Save
add_filter('acf/settings/save_json', 'starter_theme_acf_json_save_point');
function starter_theme_acf_json_save_point($path) {

  // update path
  $path = dirname(__FILE__) . '/acf-jason';


  // return
  return $path;
}


// ACF Jason Load
add_filter('acf/settings/load_json', 'starter_theme_acf_json_load_point');
function starter_theme_acf_json_load_point($paths) {

  // remove original path (optional)
  unset($paths[0]);


  // append path
  $paths[] = dirname(__FILE__) . '/acf-jason';


  // return
  return $paths;
}
