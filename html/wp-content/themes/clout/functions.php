<?php

// テーマに必要な機能を追加
function mytheme_setup() {
  // アイキャッチ画像を有効化
  add_theme_support('post-thumbnails');

  // HTML5サポート
  add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
}
add_action('after_setup_theme', 'mytheme_setup');

// CSS・JSの読み込み
function mytheme_enqueue_scripts() {
  wp_enqueue_style('main-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');
