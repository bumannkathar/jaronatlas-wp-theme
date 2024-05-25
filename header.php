<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="author" content="Jaron Atlas">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?>>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-2">

        <div class="container d-flex justify-content-between">
        <a class="navbar-brand d-flex" href="<?php echo get_site_url() ?>">
                <?php
                // wenn logo vorhanden, dann logo anzeigen
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
                if ($logo_url) {
                    echo '<img src="' . esc_url($logo_url) . '" alt="' . get_bloginfo('name') . '" height="80" >';
                }
                ?>
                <div class="navbar-text d-flex flex-column p-2">
                    <div class="navbar-title">
                        <?php echo get_bloginfo('name'); ?>
                    </div>
                    <div class="navbar-description">
                        <?php echo get_bloginfo('description'); ?>
                    </div>
                </div>
            </a>

            <div class="navbar" id="navbarNav">
            <?php
            // Hauptmenü anzeigen
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
                    'fallback_cb' => '__return_false',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth' => 2
                )
            );
            ?>
            </div>
        </div>

        </nav>
    </header>