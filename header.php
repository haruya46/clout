<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title(); ?></title>
  <?php wp_head(); ?>
</head>
<body id="home" <?php body_class(); ?>>
  <div id="sidebar" class="sidebar">
    <div class="logo">
      <img src="<?php echo get_template_directory_uri(); ?>/image/CLOUT.png" alt="CLOUT">
      <p>株式会社CLOUT</p>
    </div>
    <nav class="sidebar-nav">
      <ul>
        <li><a href="<?php echo home_url(); ?>#home">Home</a></li>
        <li><a href="<?php echo home_url(); ?>#business">Business</a></li>
        <li><a href="<?php echo home_url(); ?>#recruit">Recruit</a></li>
        <li><a href="<?php echo home_url(); ?>#company">Company</a></li>
      </ul>
    </nav>
    <?php
            $page = get_page_by_path('contact'); // スラッグが contact の固定ページを取得
            if ($page) {
                $contact_url = get_permalink($page->ID);
            } else {
                $contact_url = '#'; // ページが存在しない場合のフォールバック
            }
    ?>
    <div class="contact">
      <a href="<?php echo esc_url($contact_url); ?>">お問い合わせ</a>
      <p>TEL: 000-000-0000</p>
    </div>
    <div class="hamburger" id="hamburger">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="main-content">