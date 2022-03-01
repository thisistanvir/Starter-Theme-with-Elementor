<?php

/**
 * The template for displaying archive content.
 *
 * @package Starter-theme
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
?>

<?php if (apply_filters('starter_theme_page_title', true)) : ?>
	<header class="page-header">
		<?php
		the_archive_title('<h1 class="entry-title">', '</h1>');
		the_archive_description('<p class="archive-description">', '</p>');
		?>
	</header>
<?php endif; ?>
<div class="page-content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="single-post-item">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('thumbnail', array('class' => 'alignleft')); ?>
					<h2><?php the_title(); ?></h2>
				</a>
				<p class="post-meta"><?php the_time('M d, Y') ?></p>
				<?php the_excerpt(); ?>
			</div>
	<?php endwhile;
	endif; ?>
</div>



<div class="starter-theme-pagination">
	<?php echo paginate_links(); ?>
</div>