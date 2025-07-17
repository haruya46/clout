<?php
// 最低限のテーマサポート
add_theme_support('title-tag');

function clout_enqueue_styles() {
    wp_enqueue_style('clout-style', get_stylesheet_uri());

    if (is_page('home')) {
        wp_enqueue_style('home', get_template_directory_uri() . '/home.css');
    }
    if (is_page('company')) {
        wp_enqueue_style('company', get_template_directory_uri() . '/company.css');
    }
}
add_action('wp_enqueue_scripts', 'clout_enqueue_styles');
