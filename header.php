<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package yogi-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text"
            href="#primary"><?php esc_html_e( 'Skip to content', 'yogi-theme' ); ?></a>

        <header id="masthead" class="site-header">
            <nav id="site-navigation" class="yg-navbar">
                <div class="container">
                    <div class="navbar-brand">TEST</div>
                    <div class="navbar-toggler" aria-expanded="false"><i class="fa-solid fa-bars"></i>

                    </div>
                    <div class="navbar-collapse collapse">
                        <div class="d-flex justify-content-end">
                            <div class="navbar-toggler" aria-expanded="false">
                                <i class="fa-solid fa-x"></i>
                            </div>
                        </div>
                        <div>THIS IS MENU

                            <?php
wp_nav_menu(
	array(
		'theme_location' => 'menu-1',
		'menu_id'        => 'primary-menu',
		'menu_class'		=> "navbar-nav", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.

	)
);
						?>
                        </div>

                    </div>
            </nav><!-- #site-navigation -->

        </header><!-- #masthead -->