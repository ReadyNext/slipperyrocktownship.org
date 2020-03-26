<?php

function readynext_after_setup_theme() {
    add_theme_support('automatic-feed-links');

    add_theme_support('custom-header', array(
        'header-text' => true
    ));

    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'readynext_after_setup_theme');

function readynext_init() {
    register_nav_menus(array(
        'primary' => __('Primary')
    ));
}

add_action('init', 'readynext_init');