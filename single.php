<?php

/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();
?>
<?php
if (have_posts()) : while (have_posts()) : the_post(); ?>

        <main id="content" <?php post_class('content-block elementor-section elementor-section-boxed') ?> role="main">
            <div class="elementor-container">
                <div class="internal-content-wrap">
                    <?php if (apply_filters('starter_theme_page_title', true)) : ?>
                        <header class="page-header">
                            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                        </header>
                    <?php endif; ?>

                    <div class="page-content">
                        <?php the_content(); ?>
                        <div class="post-tags">
                            <?php the_tags('<span class="tag-links">' . __('Tagged ', 'hello-elementor'), null, '</span>'); ?>
                        </div>
                        <?php wp_link_pages(); ?>
                    </div>
                </div>
            </div>
            <?php comments_template(); ?>
        </main>

<?php endwhile;
endif;
get_footer(); ?>