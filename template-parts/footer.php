<?php

/**
 * The template for displaying footer.
 *
 * @package Starter-Theme
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

$footer_nav_menu = wp_nav_menu([
  'theme_location' => 'footer-menu',
  'fallback_cb' => false,
  'echo' => false,
]);
?>
<footer id="site-footer" class="site-footer" role="contentinfo">
  <?php if ($footer_nav_menu) : ?>
    <nav class="site-navigation" role="navigation">
      <?php
      echo $footer_nav_menu;
      ?>
    </nav>
  <?php endif; ?>
  <div class="copyright">
    <p><?php echo sprintf(esc_html__('&copy; 2022 %s. All Right Reserved', 'starter-theme'), '<a href="https://itanvir.net/" target="_blank">' . esc_html__('iTanvir', 'starter-theme') . '</a>'); ?></p>

  </div>
</footer>