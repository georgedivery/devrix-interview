		<footer class="footer">
    <div class="shell">
        <div class="footer-inner">
            <div class="footer-content">
                <div class="footer-logo-outer">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-logo">
                        L
                    </a>
                </div>

                <ul class="list-footer-links">
                    <li>
                        <a href="#">
                            News
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Sex
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Special Features
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Technology
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Sport
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Analysis
                        </a>
                    </li>
                </ul>
            </div>

            <div class="footer-aside">
                <p class="copy">
                    <?php echo esc_html(get_bloginfo('name')); ?> © <span><?php echo date('Y'); ?></span>
                </p>

                <ul class="socials">
                    <?php if (have_rows('socials', 'option')) : ?>
                        <?php while (have_rows('socials', 'option')) : the_row(); ?> 
                            <li>
                                <a target="_blank" href="<?php echo get_sub_field('url'); ?>">
                                   <?php echo get_sub_field('icon'); ?>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</footer><!-- /.footer -->
 
		<?php wp_footer(); ?> 
		</div><!-- /.wrapper -->
	</body>
</html>