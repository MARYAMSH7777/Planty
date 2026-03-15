<?php
function hello_child_enqueue_styles() {
    wp_enqueue_style(
        'parent-style',
        get_template_directory_uri() . '/style.css'
    );
}

add_action('wp_enqueue_scripts', 'hello_child_enqueue_styles');
function planty_add_admin_link_to_menu($items, $args) {
    if (is_user_logged_in()) {
        $items .= '<li class="menu-item menu-item-admin"><a href="' . admin_url() . '">Admin</a></li>';
    }
    return $items;
}

add_filter('wp_nav_menu_items', 'planty_add_admin_link_to_menu', 10, 2);