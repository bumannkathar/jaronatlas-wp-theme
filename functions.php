<?php
/**
 * Funktionen und Definitionen für das Theme.
 */

// Laden des Stylesheets
function theme_enqueue_styles() {
    wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

// Für ein besseres und responiveres Design fügen wir Bootstrap hinzu
function enqueue_bootstrap() {
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array(), null, true );
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
}
add_action( 'wp_enqueue_scripts', 'enqueue_bootstrap' );

// Registrieren der benutzerdefinierten Menüs
function theme_register_menus() {
    register_nav_menus( array(
        'primary' => 'Hauptmenü',
        'footer' => 'Fußzeilenmenü'
    ) );
}
add_action( 'init', 'theme_register_menus' );

// Registreiren von social media links um den wert in der footer.php zu verwenden
function theme_register_social_media() {
    register_nav_menus( array(
        'social-media' => 'Social Media Links'
    ) );
}


// Dem Nutzer die Möglichkeit geben, ein benutzerdefiniertes Logo hinzuzufügen
function theme_custom_logo() {
    $defaults = array(
        'height'      => 100,
        'width'       => 100,
        'description' => 'Logo im Hauptemnü',

        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'theme_custom_logo' );

// Dem Nutzer die Möglichkeit geben, ein benutzerdefiniertes Hintergrundbild hinzuzufügen
function theme_custom_background() {
    $args = array(
        'default-color' => 'ffffff',
        'default-image' => '',
    );
    add_theme_support( 'custom-background', $args );
}
add_action( 'after_setup_theme', 'theme_custom_background' );

//Custom Felder um Youtube, Tiktok und Instagram im Customizer setzen zu können
function jaronatlas_customize_register( $wp_customize ) {
    // Sektion für Social Media Links
    $wp_customize->add_section('jaronatlas_social_links', array(
        'title'    => __('Social Media Links', 'jaronatlastheme'),
        'priority' => 30,
    ));

    // Einstellung für Youtube
    $wp_customize->add_setting('jaronatlas_youtube_link', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'jaronatlas_youtube_link', array(
        'label'    => __('Youtube Link', 'jaronatlastheme'),
        'section'  => 'jaronatlas_social_links',
        'settings' => 'jaronatlas_youtube_link',
        'type'     => 'url',
    )));

    // Einstellung für Instagram
    $wp_customize->add_setting('jaronatlas_instagram_link', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'jaronatlas_instagram_link', array(
        'label'    => __('Instagram Link', 'jaronatlastheme'),
        'section'  => 'jaronatlas_social_links',
        'settings' => 'jaronatlas_instagram_link',
        'type'     => 'url',
    )));

    // Einstellung für TikTok
    $wp_customize->add_setting('jaronatlas_tiktok_link', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'jaronatlas_tiktok_link', array(
        'label'    => __('TikTok Link', 'jaronatlastheme'),
        'section'  => 'jaronatlas_social_links',
        'settings' => 'jaronatlas_tiktok_link',
        'type'     => 'url',
    )));
}
add_action('customize_register', 'jaronatlas_customize_register');
