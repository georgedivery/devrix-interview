<?php
if (!function_exists('have_rows') || !function_exists('get_field')) :
	?>
<section>
    <div class="shell">
        <h2>
            Advanced Custom Fields plugin is not active.
        </h2>
    </div>
</section>
<?php
	return;
endif;

$sections_field = get_field('sections');

if (!$sections_field) :
	?>
<section>
    <div class="shell">
        <h2>
            No sections created yet
        </h2>
    </div>
</section>
<?php
	return;
endif;
?>

<?php while (have_rows('sections')) : the_row(); ?>
    <?php if (get_row_layout() === 'hero') : ?>
    <?php include 'sections/hero/index.php'; ?>
    <?php endif; ?>

    <?php if (get_row_layout() === 'section_category_news') : ?>
    <?php include 'sections/section_category_news/index.php'; ?>
    <?php endif; ?> 
<?php endwhile; // end "while" flex content?>