<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php bloginfo('name'); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <header>
    <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
  </header>

  <main>
  <div class="main">
    <?php
      if (have_posts()) :
        while (have_posts()) : the_post();
          the_content(); // ← 管理画面で入力した内容がここに出る！
        endwhile;
      endif;
    ?>
  </div>
</main>

  <footer>
    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>
