<?php get_header(); ?>

<?php
$show_on_front = get_option('show_on_front');

// If front page is set to static page, show sections
if (is_front_page() && $show_on_front === 'page') : ?>
    <main class="main">
        <?php include 'sections.php'; ?>
    </main>
<?php else : ?>
    <div class="main">
        <section class="section-category-news section_tags">
            <div class="shell">
                <div class="section-head">
                    <h1 class="section-title">
                        <?php esc_html_e('Latest News', 'devrix'); ?>
                    </h1>
                </div>

                <div class="section-body">
                    <?php if (have_posts()) : ?>
                    <ul class="list-news">
                        <?php while (have_posts()) : the_post(); ?>
                        <?php $background_image = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
                        <li>
                            <article <?php post_class(); ?>>
                                <div class="article-image">
                                    <div class="image"
                                        <?php echo $background_image ? ' style="background-image:url(' . esc_url($background_image) . ')"' : ''; ?>>
                                    </div>
                                </div>

                                <h4>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h4>
                                <p class="article-date">
                                    <?php echo esc_html(get_the_date(get_option('date_format'))); ?>
                                </p>
                                <a class="article-link" href="<?php the_permalink(); ?>"
                                    aria-label="<?php echo esc_attr(get_the_title()); ?>"></a>
                            </article>
                        </li>
                        <?php endwhile; ?>
                    </ul>

                    <?php
                    $pagination_links = paginate_links([
                        'type'      => 'array',
                        'prev_text' => __('Prev', 'devrix'),
                        'next_text' => __('Next', 'devrix'),
                    ]);

                    if (!empty($pagination_links)) :
                        ?>
                    <nav class="navigation pagination" aria-label="Pagination">
                        <div class="nav-links">
                            <?php foreach ($pagination_links as $pagination_link) : ?>
                            <?php echo $pagination_link; ?>
                            <?php endforeach; ?>
                        </div>
                    </nav>
                    <?php
                    endif;
                    ?>
                    <?php else : ?>
                    <p><?php esc_html_e('No posts found for this tag.', 'devrix'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>
<?php endif; ?>

<?php get_footer(); ?>