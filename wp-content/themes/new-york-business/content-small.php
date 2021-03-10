<?php
/**
 * Template Name:Content-Small
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package new-york-business
 * @since 1.0

 */

get_header(); ?>

<main id="main" class="content__in content__in--small" role="main">
	<?php while (have_posts()): the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('content__article article'); ?>>
			<div class="entry-content">
				<h1 class="entry-title article__title"><?php the_title(); ?></h1>
				<?php
					the_content();

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . __('Pages:', 'new-york-business'),
							'after'  => '</div>',
						)
					);
				?>
			</div>
		</article>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
