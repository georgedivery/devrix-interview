<?php
$section_title          = get_sub_field('title');
$section_revert         = get_sub_field('revert');
$section_has_background = get_sub_field('background');

$requested_posts = (int) get_sub_field('number_posts');
$requested_posts = in_array($requested_posts, [3, 4, 5], true) ? $requested_posts : 5;

$category_field = get_sub_field('category');
$category_ids   = [];

if ($category_field) {
    $category_values = is_array($category_field) ? $category_field : [$category_field];

    foreach ($category_values as $category_value) {
        $maybe_id = 0;

        if (is_object($category_value) && isset($category_value->term_id)) {
            $maybe_id = $category_value->term_id;
        } elseif (is_array($category_value) && isset($category_value['term_id'])) {
            $maybe_id = $category_value['term_id'];
        } else {
            $maybe_id = $category_value;
        }

        $category_id = absint($maybe_id);

        if ($category_id) {
            $category_ids[] = $category_id;
        }
    }
}

$query_args = [
    'posts_per_page' => $requested_posts,
    'post_status' => 'publish',
    'ignore_sticky_posts' => true,
];

if ($category_ids) {
    $query_args['category__in'] = $category_ids;
}

$news_query = new WP_Query($query_args);
$section_posts = $news_query->have_posts() ? $news_query->posts : [];
wp_reset_postdata();

if (empty($section_posts)) : ?>
<section class="section-category-news section_three-news<?php echo $section_revert ? ' revert' : ''; ?>">
    <div class="shell">
        <?php if ($section_title) : ?>
        <div class="section-head">
            <h2 class="section-title"><?php echo esc_html($section_title); ?></h2>
        </div>
        <?php endif; ?>
        <div class="section-body">
            <p><?php esc_html_e('No posts found for the selected category.', 'devrix'); ?></p>
        </div>
    </div>
</section>
<?php
    return;
endif;

if ($requested_posts === 3) {
    $section_variant_class = 'section_three-news';
    if ($section_revert) {
        $section_variant_class .= ' revert';
    }
    if ($section_has_background) {
        $section_variant_class .= ' has_background';
    }

    include __DIR__ . '/three.php';
} elseif ($requested_posts === 4) {
    $section_variant_class = 'section_four-news';
    if ($section_revert) {
        $section_variant_class .= ' revert';
    }

    include __DIR__ . '/four.php';
} else {
    $section_variant_class = 'section_five-news';
    if ($section_revert) {
        $section_variant_class .= ' revert';
    }

    include __DIR__ . '/five.php';
}