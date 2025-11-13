<?php
$featured_post_field = get_sub_field('featured_post');
$featured_post        = null;

if ($featured_post_field instanceof WP_Post) {
    $featured_post = $featured_post_field;
} elseif (is_numeric($featured_post_field)) {
    $featured_post = get_post((int) $featured_post_field);
} elseif (is_array($featured_post_field) && isset($featured_post_field['ID'])) {
    $featured_post = get_post((int) $featured_post_field['ID']);
}

$featured_post_id      = $featured_post instanceof WP_Post ? $featured_post->ID : 0;
$featured_post_title   = $featured_post_id ? get_the_title($featured_post_id) : '';
$featured_post_link    = $featured_post_id ? get_permalink($featured_post_id) : '#';
$featured_post_excerpt = $featured_post_id ? get_the_excerpt($featured_post_id) : '';

if ($featured_post_id && empty($featured_post_excerpt)) {
    $featured_post_excerpt = wp_trim_words($featured_post->post_content ?? '', 30);
}

$featured_post_image     = $featured_post_id ? get_the_post_thumbnail_url($featured_post_id, 'large') : '';
$default_featured_image   = get_theme_file_uri('assets/images/featured.jpg');
$featured_post_image      = $featured_post_image ?: $default_featured_image;

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

                    <?php if ($featured_post_id) : ?>
                        <h2 class="article-news-title">
                            <a href="<?php echo esc_url($featured_post_link); ?>">
                                <?php echo esc_html($featured_post_title); ?>
                            </a>
                        </h2>

                        <?php if (!empty($featured_post_excerpt)) : ?>
                            <p class="article-news-excerpt">
                                <?php echo esc_html($featured_post_excerpt); ?>
                            </p>
                        <?php endif; ?>

                        <a href="<?php echo esc_url($featured_post_link); ?>" class="btn">
                            <?php esc_html_e('Read more', 'devrix'); ?>
                        </a>
                    <?php else : ?>
                        <h2 class="article-news-title">
                            <span><?php esc_html_e('Select a featured post to display.', 'devrix'); ?></span>
                        </h2>
                    <?php endif; ?>
                </article>
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