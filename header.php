<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title(); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div class="sidebar">
    <div class="logo">
      <img src="<?php echo get_template_directory_uri(); ?>/image/ClOUT.png" alt="CLOUT">
      <p>株式会社CLOUT</p>
    </div>
    <nav>
      <ul>
        <li><a href="<?php echo home_url(); ?>">Home</a></li>
        <li><a href="<?php echo home_url('/business'); ?>">Business</a></li>
        <li><a href="<?php echo home_url('/recruit'); ?>">Recruit</a></li>
        <li><a href="<?php echo home_url('/company'); ?>">Company</a></li>
      </ul>
    </nav>
    <div class="contact">
      <a href="<?php echo home_url('/contact'); ?>">お問い合わせ</a>
      <p>TEL: 000-000-0000</p>
    </div>
  </div>
  <div class="main-content">