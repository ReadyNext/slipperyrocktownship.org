<?php

include get_template_directory() . '/lib/widgets/alert-widget.php';
include get_template_directory() . '/lib/widgets/custom-recent-posts.php';

add_action('admin_menu', function () {
    $user = wp_get_current_user();

    if (in_array('editor', (array)$user->roles)) {
        if (!current_user_can('edit_theme_options')) {
			$role_object = get_role('editor');
			$role_object->add_cap('edit_theme_options');
        }
        
        remove_submenu_page('themes.php', 'themes.php');
        remove_submenu_page('themes.php', 'widgets.php');
        remove_submenu_page('themes.php', 'nav-menus.php');
        remove_submenu_page('themes.php', 'theme-editor.php');
    }
}, 10);

add_action('after_setup_theme', function () {
    add_theme_support('automatic-feed-links');

    add_theme_support('custom-header', array(
        'header-text' => false
    ));

    add_theme_support('editor-style');

    add_filter('mce_css', function ($mce_css) {
        if (!empty($mce_css)) {
            $mce_css .= ',';
        }

        $mce_css .= 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css';
    });

    add_theme_support('title-tag');
});

add_action('init', function () {
    register_nav_menus(array(
        'primary' => __('Primary')
    ));
});

add_action('widgets_init', function () {
    register_sidebar(array(
        'id' => 'alerts',
        'name' => __('Alerts'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
    ));

    register_sidebar(array(
        'id' => 'left',
        'name' => __('Left Sidebar'),
        'before_widget' => '<div class="card mb-2">',
        'after_widget' => '</div></div>',
        'before_title' => '<div class="card-header" style="padding-bottom:0.5rem;padding-top:0.5rem;"><h5 class="card-title" style="margin:0;text-align:center;">',
        'after_title' => '</h5></div><div class="card-body">'
    ));

    register_sidebar(array(
        'id' => 'right',
        'name' => __('Right Sidebar'),
        'before_widget' => '<div class="card mb-2">',
        'after_widget' => '</div></div>',
        'before_title' => '<div class="card-header" style="padding-bottom:0.5rem;padding-top:0.5rem;"><h5 class="card-title" style="margin:0;text-align:center;">',
        'after_title' => '</h5></div><div class="card-body">'
    ));

    register_widget(new WP_Widget_Alert());
    register_widget(new WP_Widget_Custom_Recent_Posts());
});
