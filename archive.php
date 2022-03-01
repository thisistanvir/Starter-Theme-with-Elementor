<?php

/**
 * The template for displaying archive pages.
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
        <?php get_template_part('/parts/content', 'archive'); ?>
      </div>
    </div>
  </div>
</main>


<?php get_footer(); ?>