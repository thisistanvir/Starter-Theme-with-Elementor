<?php

/**
 * The template for displaying content excerpt post-types: posts, pages and user-defined custom post types.
 *
 * @package Starter-theme
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
?>

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


<div class="starter-theme-pagination">
	<?php echo paginate_links(); ?>
</div>