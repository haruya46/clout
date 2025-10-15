<?php get_header(); ?>
<div class="visual-wrapper">
  <img src="<?php echo get_template_directory_uri(); ?>/image/31722824_m.jpg" alt="メインビジュアル" class="main-visual-img">
</div>

<section class="business-section" id="business">
  <div class="business-title">Business</div>
  <div class="business-list-wrapper">

    <?php
    $args = array(
        'post_type' => 'business',
        'posts_per_page' => -1, // 全件取得
    );
    $business_posts = new WP_Query($args);
    if ($business_posts->have_posts()):
        while ($business_posts->have_posts()): $business_posts->the_post();
    ?>
      <div class="business-item-1">
        <?php if (has_post_thumbnail()): ?>
          <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
        <?php endif; ?>
        <div class="business-text-1">
          <h3 class="business-heading"><?php the_title(); ?></h3>
          <p class="business-desc"><?php the_content(); ?></p>
        </div>
      </div>
    <?php
        endwhile;
        wp_reset_postdata();
    else:
        echo '<p>事業内容がまだ登録されていません。</p>';
    endif;
    ?>

  </div>
</section>


<section class="recruit-section" id="recruit">
  <div class="recruit-title">recruit</div>
  <div class="recruit-list-wrapper">
    <div class="recruit-item">
      <div class="recruit-img">
        <img src="<?php echo get_template_directory_uri(); ?>/image/31722824_m.jpg" alt="メインビジュアル">
      </div>
      <div class="recruit-text">
        <h3 class="recruit-heading">イベント事業</h3>
        <p class="recruit-desc">各著作会社で行っているイベントに参加しスマホやインターネットの販促を促進しクライアント様に対し反芻</p>
        <a href="#" class="recruit-btn">more</a>

      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
