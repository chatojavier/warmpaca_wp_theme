<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Qata_Alpaca_Theme
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php if (!IS_VITE_DEVELOPMENT) : ?>
        <!-- Google Tag Manager -->
        <script>
            (function(w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start': new Date().getTime(),
                    event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-NSLJBJ8');
        </script>
        <!-- End Google Tag Manager -->
    <?php endif; ?>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400&display=swap" rel="stylesheet">

    <?php wp_head();
    ?>
</head>

<body <?php body_class(); ?>>

    <?php if (!IS_VITE_DEVELOPMENT) : ?>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NSLJBJ8" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
    <?php endif; ?>

    <?php wp_body_open(); ?>

    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'qatatheme'); ?></a> <!-- Screen Reader Menu -->

    <div class="site-branding hidden">
        <?php
        if (is_front_page() && is_home()) :
        ?>
            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
        <?php
        else :
        ?>
            <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
        <?php
        endif;
        $qatatheme_description = get_bloginfo('description', 'display');
        if ($qatatheme_description || is_customize_preview()) :
        ?>
            <p class="site-description"><?php echo $qatatheme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                        ?></p>
        <?php endif; ?>
    </div> <!-- .site-branding -->

    <header class="header">
        <div class="fixed-bar">
            <div class="fixed-bar__container">
                <div class="container-logo">
                    <a href="<?php echo home_url(); ?>">
                        <div class="warm-logo | text-cuper">
                            <?php include get_template_directory() . '/inc/svgs/warmpaca-logo.php' ?>
                        </div>
                    </a>
                </div>
                <nav class="nav">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'menu_class'     => 'menu-nav primary-menu',
                        )
                    );
                    ?>
                </nav>
            </div>
        </div>
        <div class="menu-btn">
            <div class="menu-btn__burger"></div>
        </div>
        <nav class="nav">

            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'menu-nav',
                )
            );
            get_template_part('template-parts/header', 'links-language');
            ?>
        </nav>
    </header>

    <section class="first-screen">
        <div class="header-sidebar">

            <div class="header-sidebar__container-logo">
                <a href="<?php echo home_url(); ?>">
                    <div class="warm-logo | text-cuper">
                        <?php include get_template_directory() . '/inc/svgs/warmpaca-logo.php' ?>
                    </div>
                </a>
            </div>

            <nav class="nav">

                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'menu-nav',
                    )
                );
                get_template_part('template-parts/header', 'links-language');
                ?>
            </nav>
        </div>