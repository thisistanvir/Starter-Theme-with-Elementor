<?php

/**
 * The template for displaying header.
 *
 * @package Starter-theme
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-t-fit=no">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
    $site_name = get_bloginfo('name');
    $tagline   = get_bloginfo('description', 'display');
    $header_nav_menu = wp_nav_menu([
        'theme_location' => 'main-menu',
        'fallback_cb' => false,
        'echo' => false,
    ]);
    ?>

    <header id="site-header" class="site-header" role="banner">

        <div class="site-branding">
            <?php
            if (has_custom_logo()) {
                the_custom_logo();
            } elseif ($site_name) {
            ?>
                <h1 class="site-title">
                    <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php esc_attr_e('Home', 'starter-theme'); ?>" rel="home">
                        <?php echo esc_html($site_name); ?>
                    </a>
                </h1>
                <p class="site-description">
                    <?php
                    if ($tagline) {
                        echo esc_html($tagline);
                    }
                    ?>
                </p>
            <?php } ?>
        </div>

        <?php if ($header_nav_menu) : ?>
            <nav class="site-navigation" role="navigation">
                <?php echo $header_nav_menu; ?>
            </nav>
        <?php endif; ?>
    </header>