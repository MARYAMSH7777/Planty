<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'astra-theme-css','astra-contact-form-7' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION

add_filter('wp_nav_menu_items', 'planty_add_admin_link', 10, 2);

function planty_add_admin_link($items, $args) {
    if ($args->theme_location === 'primary' && is_user_logged_in()) {
        $admin_link = '<li class="menu-item menu-item-admin"><a href="' . admin_url() . '">Admin</a></li>';

        $items = preg_replace(
            '/(<li[^>]*class="[^"]*menu-commander[^"]*"[^>]*>.*?<\/li>)/',
            $admin_link . '$1',
            $items,
            1
        );
    }

    return $items;
}
