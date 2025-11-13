<?php
    if (empty($section_posts)) {
        return;
    } 
    $posts = array_values($section_posts);
    $featured_post = array_shift($posts); 
    $list_posts  = array_slice($posts, 0, 4);
    $date_format = get_option('date_format');
    $variant = $section_variant_class ?: 'section_five-news';
?>

<section class="section-category-news <?php echo esc_attr($variant); ?><?php echo $section_revert ? ' revert' : ''; ?>">
    <div class="shell">
        <?php if (!empty($section_title)) : ?>
        <div class="section-head">
            <h2 class="section-title"><?php echo esc_html($section_title); ?></h2>
        </div>
        <?php endif; ?>

        <div class="section-body">
            <?php if (!empty($list_posts)) : ?>
            <div class="section-content">
                <ul class="list-news">
                    <?php foreach ($list_posts as $post_item) : ?>
                    <?php
                        $post_id = $post_item->ID;
                        $thumbnail_url = get_the_post_thumbnail_url($post_id, 'medium_large');
                    ?>
                    <li>
                        <article>
                            <div class="article-image">
                                <div class="image"<?php echo $thumbnail_url ? ' style="background-image:url(' . esc_url($thumbnail_url) . ')"' : ''; ?>></div>
                            </div>

                            <h4>
                                <?php echo esc_html(get_the_title($post_id)); ?>
                            </h4>

                            <p class="article-date">
                                <?php echo esc_html(get_the_date($date_format, $post_id)); ?>
                            </p>

                            <a href="<?php echo esc_url(get_permalink($post_id)); ?>"></a>
                        </article>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <?php
            $featured_id = $featured_post->ID;
            $featured_image = get_the_post_thumbnail_url($featured_id, 'large');
            $featured_author = get_the_author_meta('display_name', $featured_post->post_author);
            $featured_excerpt = get_the_excerpt($featured_id);
            ?>

            <div class="section-aside">
                <ul class="list-news">
                    <li>
                        <article>
                            <?php if ($featured_image) : ?>
                            <div class="article-image">
                                <div class="image" style="background-image:url(<?php echo esc_url($featured_image); ?>)"></div>
                            </div>
                            <?php endif; ?>

                            <p class="article-date">
                                <?php if ($featured_author) : ?>
                                <?php echo esc_html($featured_author); ?> -
                                <?php endif; ?>
                                <?php echo esc_html(get_the_date($date_format, $featured_id)); ?>
                            </p>

                            <h4>
                                <?php echo esc_html(get_the_title($featured_id)); ?>
                            </h4>

                            <?php if ($featured_excerpt) : ?>
                            <p>
                                <?php echo esc_html($featured_excerpt); ?>
                            </p>
                            <?php endif; ?>

                            <p class="link-more">
                                <?php esc_html_e('Continue reading this article', 'devrix'); ?>
                                <i class="fa-solid fa-arrow-right"></i>
                            </p>

                            <a href="<?php echo esc_url(get_permalink($featured_id)); ?>"></a>
                        </article>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>