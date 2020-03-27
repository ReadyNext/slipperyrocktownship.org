<?php

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
