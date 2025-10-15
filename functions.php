<?php
// 最低限のテーマサポート
add_theme_support('title-tag');
add_theme_support('post-thumbnails');

function clout_enqueue_assets() {
    // CSS
    wp_enqueue_style('clout-style', get_stylesheet_uri());

    if (is_page('home')) {
        wp_enqueue_style('home', get_template_directory_uri() . '/home.css');
    } elseif (is_page('company')) {
        wp_enqueue_style('company', get_template_directory_uri() . '/company.css');
    } elseif (is_singular('recruit')) {
        wp_enqueue_style('recruit', get_template_directory_uri() . '/recruit.css');
    } elseif (is_page('contact')) {
        wp_enqueue_style('contact', get_template_directory_uri() . '/contact.css');
    }

    // JS（ハンバーガーメニューなど）
    wp_enqueue_script(
        'sidebar-js',
        get_template_directory_uri() . '/sidebar.js',
        array(), // 依存スクリプトがあれば追加（例: array('jquery')）
        filemtime(get_template_directory() . '/sidebar.js'),
        true // フッターで読み込む
    );
}
add_action('wp_enqueue_scripts', 'clout_enqueue_assets');


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



// Recruitカスタム投稿タイプ
function create_recruit_post_type() {
    register_post_type('recruit', array(
        'labels' => array(
            'name' => '募集情報',
            'singular_name' => '募集情報',
            'add_new' => '新規追加',
            'add_new_item' => '募集情報を追加',
            'edit_item' => '募集情報を編集',
            'new_item' => '新しい募集情報',
            'view_item' => '募集情報を表示',
            'search_items' => '募集情報を検索',
            'not_found' => '募集情報が見つかりません',
            'not_found_in_trash' => 'ゴミ箱に募集情報はありません',
            'menu_name' => '募集情報'
        ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-businessperson',
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'), // アイキャッチ・本文・抜粋
        'show_in_rest' => true,
    ));
}
add_action('init', 'create_recruit_post_type');

// Recruit用メタボックス追加
function recruit_add_meta_boxes() {
    add_meta_box(
        'recruit_details',          // ID
        '募集詳細情報',              // タイトル
        'recruit_meta_box_callback',// コールバック
        'recruit',                  // 投稿タイプ
        'normal',                   // 表示位置
        'high'                      // 優先度
    );
}
add_action('add_meta_boxes', 'recruit_add_meta_boxes');

// メタボックスの内容
function recruit_meta_box_callback($post) {
    wp_nonce_field('recruit_save_meta_box_data', 'recruit_meta_box_nonce');

    $fields = [
        'event_name' => '事業名',
        'event_description' => '事業詳細',
        'target_person' => 'こんな人におすすめ',
        'background' => '募集背景',
        'requirements' => '必須条件',
        'employment_type' => '雇用形態',
        'salary' => '給与',
        'gender_ratio' => '男女比率',
        'number_of_positions' => '募集人数'
    ];

    foreach($fields as $key => $label) {
        $value = get_post_meta($post->ID, $key, true);
        echo '<p><label for="'.esc_attr($key).'">'.esc_html($label).'</label><br>';
        echo '<input type="text" id="'.esc_attr($key).'" name="'.esc_attr($key).'" value="'.esc_attr($value).'" style="width:100%;"></p>';
    }
}

// メタ情報保存処理
function recruit_save_meta_box_data($post_id) {
    if (!isset($_POST['recruit_meta_box_nonce'])) return;
    if (!wp_verify_nonce($_POST['recruit_meta_box_nonce'], 'recruit_save_meta_box_data')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    $fields = [
        'event_name',
        'event_description',
        'target_person',
        'background',
        'requirements',
        'employment_type',
        'salary',
        'gender_ratio',
        'number_of_positions'
    ];

    foreach($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'recruit_save_meta_box_data');