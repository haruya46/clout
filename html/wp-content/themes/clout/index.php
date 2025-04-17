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
    <p><?php bloginfo('description'); ?></p>
  </header>

  <main>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article>
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
      </article>
    <?php endwhile; else : ?>
      <p>記事が見つかりませんでした。</p>
    <?php endif; ?>
  </main>

  <footer>
    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>
