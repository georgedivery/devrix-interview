<?php

/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 */

?>

<?php get_header(); ?>

<div class="main">
    <section class="section-post">
        <div class="shell">
            <div class="section-head">
                <h2 class="section-title">
                    404
                </h2>
            </div>

            <div class="section-body">
                <p>
                    Page not Found
                </p>

                <p>
                    <a class="btn" href="<?php echo esc_url(home_url('/')); ?>">Go Home</a>
                </p>
            </div> 
        </div>
    </section><!-- /.shell -->
</div>

<?php get_footer(); ?>