<?php

/**
 * The template for displaying default page.
 *
 * @package Starter-theme
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();
?>
<?php if (have_posts()) : while (have_posts()) : the_post();
        if (get_post_meta(get_the_ID(), 'st_meta', true)) {
            $page_meta = get_post_meta(get_the_ID(), 'st_meta', true);
        } else {
            $page_meta = array();
        }

        if (array_key_exists('default_padding', $page_meta)) {
            $default_padding = $page_meta['default_padding'];
        } else {
            $default_padding = true;
        }
?>



        <section style="overflow:hidden;" class="<?php if ($default_padding == true) : ?>content-block elementor-section elementor-section-boxed<?php endif; ?>">
            <div class="elementor-container">
                <div class="internal-content-wrap">
                    <?php if (apply_filters('starter_theme_page_title', true)) : ?>
                        <header class="page-header">
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                        </header>
                    <?php endif; ?>

                    <?php the_content(); ?>
                </div>
            </div>
        </section>

<?php endwhile;
endif;
get_footer(); ?>