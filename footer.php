		<footer class="footer">
		    <div class="shell">
		        <div class="footer-inner">
		            <div class="footer-content">
		                <div class="footer-logo-outer">
		                    <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-logo">
		                        L
		                    </a>
		                </div>

                <?php
                if (has_nav_menu('footer-menu')) {
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu',
                        'container' => false,
                        'menu_class' => 'list-footer-links',
                        'fallback_cb' => false,
                    ));
                } 
                ?>
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