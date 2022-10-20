<?php

/**
 * The template for displaying 404 pages (not found).
 *
 * @package Starter-Theme
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
?>
<main id="content" class="site-main" role="main">
  <?php if (apply_filters('starter_theme_page_title', true)) : ?>
    <header class="page-header">
      <h1 class="entry-title"><?php esc_html_e('The page can&rsquo;t be found.', 'starter-theme'); ?></h1>
    </header>
  <?php endif; ?>
  <div class="page-content">
    <p><?php esc_html_e('It looks like nothing was found at this location.', 'starter-theme'); ?></p>
  </div>

</main>