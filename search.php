<?php

/**
 * The template for displaying search results.
 *
 * @package Starter-theme
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
?>
<main id="content" class="content-block" role="main">
  <div class="elementor-section elementor-section-boxed">
    <div class="elementor-container">
      <div class="internal-content-wrap">

        <?php if (apply_filters('starter_theme_page_title', true)) : ?>
          <header class="page-header">
            <h1 class="entry-title">
              <?php esc_html_e('Search results for: ', 'starter-theme'); ?>
              <span><?php echo get_search_query(); ?></span>
            </h1>
          </header>
        <?php endif; ?>

        <div class="page-content">
          <?php if (have_posts()) : ?>
            <?php
            while (have_posts()) :
              the_post();
              printf('<h2><a href="%s">%s</a></h2>', esc_url(get_permalink()), esc_html(get_the_title()));
              the_post_thumbnail();
              the_excerpt();
            endwhile;
            ?>
          <?php else : ?>
            <p><?php esc_html_e('It seems we can\'t find what you\'re looking for.', 'starter-theme'); ?></p>
          <?php endif; ?>
        </div>

        <?php wp_link_pages(); ?>
      </div>
    </div>
  </div>
</main>