<?php

/**
 * The site's entry point.
 *
 * Loads the relevant template part,
 * the loop is executed (when needed) by the relevant template part.
 *
 * @package Starter-theme
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>

<main id="content" class="content-block" role="main">
    <div class="elementor-section elementor-section-boxed">
        <div class="elementor-container">
            <div class="internal-content-wrap">
                <?php get_template_part('/parts/content', 'excerpt'); ?>
            </div>
        </div>
    </div>
</main>


<?php get_footer(); ?>