<?php get_header(); ?>

<main class="single-recruit">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>

    
    <?php if (has_post_thumbnail()): ?>
        <div class="visual-wrapper">
            <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
        </div>
        <?php endif; ?>
        
        <div class="recruit-title">
            <p>Recruit</p>
        </div>
        <div class="recruit-details">
            <div class="recruit-flex">
                <div class="recruit-item">
                    <!-- <h2>イベント事業</h2> -->
                    <p class="item-title"><?php echo esc_html(get_post_meta(get_the_ID(), 'event_name', true)); ?></p>
        
                    <!-- <h2>詳細</h2> -->
                    <p class="item-body"><?php echo esc_html(get_post_meta(get_the_ID(), 'event_description', true)); ?></p>
                </div>

                <div class="recruit-item">
                    <p class="item-title">こんな人におすすめ</p>
                    <p class="item-body"><?php echo esc_html(get_post_meta(get_the_ID(), 'target_person', true)); ?></p>
                </div>
                
            </div>
            <div class="recruit-flex">
                <div class="recruit-item">
                    <p class="item-title">募集背景</p>
                    <p class="item-body"><?php echo esc_html(get_post_meta(get_the_ID(), 'background', true)); ?></p>
                </div>
                <div class="recruit-item">
                    <p class="item-title">必須条件</p>
                    <p class="item-body"><?php echo esc_html(get_post_meta(get_the_ID(), 'requirements', true)); ?></p>
                </div>
                
            </div>
            <div class="recruit-flex">
                <div class="recruit-item">
                    <p class="item-title">雇用形態</p>
                    <p class="item-body"><?php echo esc_html(get_post_meta(get_the_ID(), 'employment_type', true)); ?></p>
                </div>
                <div class="recruit-item">
                    <p class="item-title">給与</p>
                    <p class="item-body"><?php echo esc_html(get_post_meta(get_the_ID(), 'salary', true)); ?></p>
                </div>
    
                <div class="recruit-item">
                    <p class="item-title">男女比率</p>
                    <p class="item-body"><?php echo esc_html(get_post_meta(get_the_ID(), 'gender_ratio', true)); ?></p>
                </div>
                <div class="recruit-item">
                    <p class="item-title">募集人数</p>
                    <p class="item-body"><?php echo esc_html(get_post_meta(get_the_ID(), 'number_of_positions', true)); ?></p>
                </div>

            </div>

        </div>

    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
