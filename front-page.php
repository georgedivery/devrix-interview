<?php
/**
* The front page template file
*
* If the user has selected a static page for their homepage, this is what will
* appear.
* Learn more: https://codex.wordpress.org/Template_Hierarchy
*
* @package WordPress
* @subpackage Twenty_Seventeen
* @since 1.0
* @version 1.0
*/

get_header();

$show_on_front = get_option('show_on_front');

if ($show_on_front === 'posts'): ?>
	<main class="main">
		<div class="shell">
			<section class="simple-section dark">
				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
						<article class="article">
							<div class="article-title">
								<h3><?php the_title(); ?></h3>
							</div>
							<div class="artile-content">
								<?php the_excerpt(); ?>
							</div>
							<div class="article-actions">
								<a href="<?php the_permalink(); ?>" class="link-more">
									<?php esc_html_e('Read more', 'webbeb'); ?>
								</a>
							</div>
						</article>
					<?php endwhile; ?>
				<?php else : ?>
					<p><?php esc_html_e('No posts found.', 'webbeb'); ?></p>
				<?php endif; ?>
			</section>
		</div>
	</main>
<?php else: ?>
	<main class="main">
		<?php include 'sections.php';?>
	</main>
<?php endif; ?>

<?php get_footer();
