<?php
// 最低限のテーマサポート
add_theme_support('title-tag');

function clout_enqueue_styles() {
    wp_enqueue_style('clout-style', get_stylesheet_uri());

    if (is_page('home')) {
        wp_enqueue_style('home', get_template_directory_uri() . '/home.css');
    }
    elseif  (is_page('company')) {
        wp_enqueue_style('company', get_template_directory_uri() . '/company.css');
    }
}



add_action('wp_enqueue_scripts', 'clout_enqueue_styles');

// 事業内容カスタム投稿タイプ
function create_business_post_type() {
    register_post_type('business', array(
        'labels' => array(
            'name' => '事業内容',
            'singular_name' => '事業内容',
            'add_new' => '新規追加',
            'add_new_item' => '事業内容を追加',
            'edit_item' => '事業内容を編集',
            'new_item' => '新しい事業内容',
            'view_item' => '事業内容を表示',
            'search_items' => '事業内容を検索',
            'not_found' => '事業内容が見つかりません',
            'not_found_in_trash' => 'ゴミ箱に事業内容はありません',
            'menu_name' => '事業内容'
        ),
        'public' => true,
        'has_archive' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-briefcase', // アイコン
        'supports' => array('title', 'editor', 'thumbnail'), // タイトル・本文・アイキャッチ
        'show_in_rest' => true, // Gutenberg対応
    ));
}
add_action('init', 'create_business_post_type');
