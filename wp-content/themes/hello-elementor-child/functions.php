<?php
function hello_child_enqueue_styles() {
    wp_enqueue_style(
        'parent-style',
        get_template_directory_uri() . '/style.css'
    );

    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style'),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'hello_child_enqueue_styles');

function planty_register_menus() {
    register_nav_menus(array(
        'menu-1' => __('Menu principal', 'planty'),
    ));
    }
    add_action('after_setup_theme', 'planty_register_menus');

function planty_add_admin_link_to_menu($items, $args) {
    if (is_user_logged_in() && $args->theme_location === 'menu-1') {
        $admin_link = '<li class="menu-item menu-item-admin"><a href="' . admin_url() . '">Admin</a></li>';

        $items_array = explode('</li>', $items);

        if (!empty($items_array[0])) {
            $items_array[0] .= '</li>';
            $items_array[0] .= $admin_link;
            $items = implode('</li>', $items_array);
        } else {
            $items .= $admin_link;
        }
    }

    return $items;
}
add_filter('wp_nav_menu_items', 'planty_add_admin_link_to_menu', 10, 2);