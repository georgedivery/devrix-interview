<?php
$featured_post = get_sub_field('featured_post'); 
$latest_posts_raw = get_posts([
    'post_type'           => 'post',
    'post_status'         => 'publish',
    'posts_per_page'      => 5,
    'ignore_sticky_posts' => true,
]);

$latest_posts = [];

if (!empty($latest_posts_raw)) {
    foreach ($latest_posts_raw as $latest_post_item) {
        if (!$latest_post_item instanceof WP_Post) {
            continue;
        }

        $latest_posts[] = [
            'title'     => get_the_title($latest_post_item),
            'link'      => get_permalink($latest_post_item),
            'author'    => get_the_author_meta('display_name', $latest_post_item->post_author),
            'date'      => get_the_date(get_option('date_format'), $latest_post_item),
        ];
    }
}
?>
<section class="section-hero">
    <div class="shell">
        <div class="shell-flex">
            <div class="section-content">
                <?php if ($featured_post) : 
                    $featured_post_image = get_the_post_thumbnail_url($featured_post->ID, 'large') ?: get_theme_file_uri('assets/images/featured.jpg');
                    $featured_post_excerpt = get_the_excerpt($featured_post->ID);
                    if (empty($featured_post_excerpt)) {
                        $featured_post_excerpt = wp_trim_words($featured_post->post_content ?? '', 30);
                    }
                ?>
                <article class="article-news-featured">
                    <div class="article-image">
                        <div class="article-image-bg"></div>
                        <div class="image" style="background-image:url(<?php echo esc_url($featured_post_image); ?>)">
                            <span class="label">
                                <i class="fa-regular fa-star"></i>
                                <?php esc_html_e('Featured', 'devrix'); ?>
                            </span>
                        </div>
                    </div>

                    <h2 class="article-news-title">
                        <a href="<?php echo esc_url(get_permalink($featured_post->ID)); ?>">
                            <?php echo esc_html(get_the_title($featured_post->ID)); ?>
                        </a>
                    </h2>

                    <?php if (!empty($featured_post_excerpt)) : ?>
                    <p class="article-news-excerpt">
                        <?php echo esc_html($featured_post_excerpt); ?>
                    </p>
                    <?php endif; ?>

                    <a href="<?php echo esc_url(get_permalink($featured_post->ID)); ?>" class="btn">
                        <?php esc_html_e('Read more', 'devrix'); ?>
                    </a>
                </article>
                <?php endif; ?>
            </div>

            <div class="section-aside">
                <h6>
                    <?php esc_html_e('Latest News', 'devrix'); ?>
                </h6>

                <?php if (!empty($latest_posts)) : ?>
                <ul class="list-latest-news">
                    <?php foreach ($latest_posts as $latest_post) : ?>
                    <li>
                        <div>
                            <a href="<?php echo esc_url($latest_post['link']); ?>">
                                <?php echo esc_html($latest_post['title']); ?>
                            </a>

                            <?php if (!empty($latest_post['author']) || !empty($latest_post['date'])) : ?>
                            <span>
                                <?php if (!empty($latest_post['author'])) : ?>
                                <?php echo esc_html($latest_post['author']); ?>
                                <?php endif; ?>
                                <?php if (!empty($latest_post['author']) && !empty($latest_post['date'])) : ?>
                                -
                                <?php endif; ?>
                                <?php if (!empty($latest_post['date'])) : ?>
                                <?php echo esc_html($latest_post['date']); ?>
                                <?php endif; ?>
                            </span>
                            <?php endif; ?>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>

                <ul class="list-latest-news-mobile">
                    <?php foreach ($latest_posts as $latest_post) : ?>
                    <li>
                        <div>
                            <a href="<?php echo esc_url($latest_post['link']); ?>">
                                <?php echo esc_html($latest_post['title']); ?>
                            </a>

                            <?php if (!empty($latest_post['author']) || !empty($latest_post['date'])) : ?>
                            <span>
                                <?php if (!empty($latest_post['author'])) : ?>
                                <?php echo esc_html($latest_post['author']); ?>
                                <?php endif; ?>
                                <?php if (!empty($latest_post['author']) && !empty($latest_post['date'])) : ?>
                                -
                                <?php endif; ?>
                                <?php if (!empty($latest_post['date'])) : ?>
                                <?php echo esc_html($latest_post['date']); ?>
                                <?php endif; ?>
                            </span>
                            <?php endif; ?>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php else : ?>
                <p><?php esc_html_e('No recent posts found.', 'devrix'); ?></p>
                <?php endif; ?>

                <div class="text_right">
                    <a href="<?php echo esc_url(home_url('/news')); ?>" class="link-more">
                        <?php esc_html_e('See all latest news', 'devrix'); ?>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>