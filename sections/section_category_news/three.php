<?php
if (empty($section_posts)) {
    return;
}

$posts       = array_values($section_posts);
$date_format = get_option('date_format');
?>

<section class="section-category-news <?php echo esc_attr(trim($section_variant_class)); ?>">
    <div class="shell">
        <?php if (!empty($section_title)) : ?>
        <div class="section-head">
            <h2 class="section-title"><?php echo esc_html($section_title); ?></h2>
        </div>
        <?php endif; ?>

        <div class="section-body">
            <ul class="list-news">
                <?php foreach ($posts as $post_item) : ?>
                <?php
                $post_id       = $post_item->ID;
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
    </div>
</section>