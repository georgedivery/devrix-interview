<?php
$breaking_tag_slug = 'breaking';
$breaking_posts_to_show = 4;

$breaking_tag      = get_term_by('slug', $breaking_tag_slug, 'post_tag');
$breaking_tag_link = '';
$breaking_tag_name = __('Breaking', 'devrix');

if ($breaking_tag instanceof WP_Term) {
    $tag_link = get_tag_link((int) $breaking_tag->term_id);
    if (!is_wp_error($tag_link)) {
        $breaking_tag_link = $tag_link;
    }

    $breaking_tag_name = $breaking_tag->name;
}

$sidebar_image    = get_sub_field('sidebar_image');
$btn_bg_image_url = !empty($sidebar_image['url']) ? $sidebar_image['url'] : get_theme_file_uri('assets/images/92bd6bb90a3e0a4f70e80d1d13d54819e695ed14.jpeg');

$breaking_query = new WP_Query([
    'post_status'         => 'publish',
    'posts_per_page'      => $breaking_posts_to_show,
    'ignore_sticky_posts' => true,
    'tag'                 => $breaking_tag_slug,
]);
?>

<section class="section-breaking-news">
    <div class="shell">
        <div class="section-inner">
            <?php if (!empty($breaking_tag_link)) : ?>
                <a href="<?php echo esc_url($breaking_tag_link); ?>" class="btn-more">
                    <strong class="btn-bg"
                        style="background-image:url(<?php echo esc_url($btn_bg_image_url); ?>)"></strong>
                    <span class="label">
                        <i class="fa-solid fa-arrow-left"></i>
                        <?php echo esc_html($breaking_tag_name); ?>
                    </span>
                </a>
            <?php else : ?>
                <div class="btn-more">
                    <strong class="btn-bg"
                        style="background-image:url(<?php echo esc_url($btn_bg_image_url); ?>)"></strong>
                    <span class="label">
                        <i class="fa-solid fa-arrow-left"></i>
                        <?php echo esc_html($breaking_tag_name); ?>
                    </span>
                </div>
            <?php endif; ?>

            <ul class="list-breaking-news">
                <?php if ($breaking_query->have_posts()) : ?>
                    <?php while ($breaking_query->have_posts()) : $breaking_query->the_post(); ?>
                        <li>
                            <a href="<?php the_permalink(); ?>">
                                <strong>
                                    <span>
                                        <?php the_title(); ?>
                                    </span>

                                    <small>
                                        <?php echo esc_html(get_the_author()); ?> - <?php echo esc_html(get_the_date(get_option('date_format'))); ?>
                                    </small>
                                </strong>
                            </a>
                        </li>
                    <?php endwhile; ?>
                <?php else : ?>
                    <li class="no-breaking-news">
                        <span><?php esc_html_e('No breaking news found.', 'devrix'); ?></span>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</section>
<?php
wp_reset_postdata();
?>