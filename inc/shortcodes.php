<?php

/**
 * The template for displaying Short codes.
 *
 * @package Starter-theme
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function phone_btn_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
        'class' => 'boxed-btn phone-btn',
    ), $atts));

    $options = get_option('starter-theme_options');
    $phone = $options['phone'];

    if (!empty($phone)) {
        $html = '<a href="tel:' . $phone . '" class="' . $class . '">' . $phone . '</a>';
    } else {
        $html = '';
    }

    return $html;
}
add_shortcode('phone_btn', 'phone_btn_shortcode');
