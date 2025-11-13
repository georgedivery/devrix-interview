<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Webbeb
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- We will use fontawesome 7 -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css " type="text/css" media="all" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
        
	<?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
	<?php if (function_exists('wp_body_open')) { wp_body_open(); } ?>
	<div class="wrapper">

	<header class="header" id="header">
    <div class="header-top">
        <div class="shell">
            <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
				<?php echo esc_html(get_bloginfo('name')); ?>
			</a>

            <div class="header-top-aside">
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

                <a href="#" class="btn btn_subscribe">
                    <span>Subscribe for more</span>
                    <i class="fa-regular fa-bell"></i>
                </a>
            </div>

            <div class="header-top-aside-mobile">
                <div class="weather">
                    <i class="fa-solid fa-cloud"></i>
                    <span>#</span>,<strong> # </strong>
                </div>

                <button class="btn-header-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>

                <div class="btn-burger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>

    <div class="header-nav-outer">
        <div class="header-nav">
            <div class="shell">
                <div class="navigation">
					<?php
					wp_nav_menu([ 
						'container_class' => 'nav',
						'container_id'    => '',
						'menu_class'      => '', 
					]);
					?>
				</div>

                <div class="header-nav-sidebar">
                    <div class="weather">
                        <i class="fa-solid fa-cloud"></i>
                        <span> 28° </span>, <strong> Sofia </strong>
                    </div>

                    <button class="btn-header-search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </div>

            <div class="header-search">
                <div class="shell">
                    <div class="search-form">
                        <input name="search" type="text" placeholder="Search...">
                        <button>
                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>

		 