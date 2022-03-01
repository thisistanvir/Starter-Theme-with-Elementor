<?php

/**
 * The template for displaying Woocommerce.
 *
 * @package Starter-theme
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function starter_theme_woocommerce_setup() {
    add_theme_support(
        'woocommerce',
        array(
            'thumbnail_image_width' => 150,
            'single_image_width'    => 300,
            'product_grid'          => array(
                'default_rows'    => 3,
                'min_rows'        => 1,
                'default_columns' => 4,
                'min_columns'     => 1,
                'max_columns'     => 6,
            ),
        )
    );
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'starter_theme_woocommerce_setup');

/**
 * Remove default WooCommerce wrapper.
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

if (!function_exists('starter_theme_woocommerce_wrapper_before')) {
    /**
     * Before Content.
     *
     * Wraps all WooCommerce content in wrappers which match the theme markup.
     *
     * @return void
     */
    function starter_theme_woocommerce_wrapper_before() {
?>
        <div class="content-block">
            <div class="elementor-section elementor-section-boxed">
                <div class="elementor-container">
                    <div class="woocommerce-wrap">
                        <main id="primary" class="site-main">
                        <?php
                    }
                }
                add_action('woocommerce_before_main_content', 'starter_theme_woocommerce_wrapper_before');

                if (!function_exists('starter_theme_woocommerce_wrapper_after')) {
                    /**
                     * After Content.
                     *
                     * Closes the wrapping divs.
                     *
                     * @return void
                     */
                    function starter_theme_woocommerce_wrapper_after() {
                        ?>
                        </main><!-- #main -->
                    </div>
                </div>
            </div>
        </div>
<?php
                    }
                }
                add_action('woocommerce_after_main_content', 'starter_theme_woocommerce_wrapper_after');

                remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
                remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 20);
