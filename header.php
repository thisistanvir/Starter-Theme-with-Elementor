<?php

/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section, opens the <body> tag and adds the site's header.
 *
 * @package Starter-Theme
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <?php $viewport_content = apply_filters('starter_theme_viewport_content', 'width=device-width, initial-scale=1'); ?>
  <meta name="viewport" content="<?php echo esc_attr($viewport_content); ?>">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <?php starter_theme_body_open(); ?>

  <?php
  if (!function_exists('elementor_theme_do_location') || !elementor_theme_do_location('header')) {
    get_template_part('./template-parts/header');
  }
  ?>