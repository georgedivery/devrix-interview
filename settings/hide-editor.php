<?php

function hide_editor($arg)
{
    $target_template = 'theme-template.php'; 
    $post_id = null;

    if (isset($_GET['post'])) {
        $post_id = absint($_GET['post']);
    } elseif (isset($_POST['post_ID'])) {
        $post_id = absint($_POST['post_ID']);
    }

    if (!$post_id) {
        return;
    }
    $template_file = get_post_meta($post_id, '_wp_page_template', true);
    if ($template_file === $target_template) {
        remove_post_type_support('page', 'editor');
    }
}

add_action('admin_init', 'hide_editor');
