<footer id="company" class="footer">
    <div class="company-title">
        <p>Company</p>
    </div>
    <div class="company">
        <div class="company-info">
            <p>株式会社CLOUT</p>
            <p>本社: 大阪府大阪市まるまる1-5-3</p>
            <p>電話番号: 000-000-0000</p>
            <p>従業員数: 10人</p>
            <p>代表者名: 陣田聖也</p>
        </div>
        <?php
            $page = get_page_by_path('contact'); // スラッグが contact の固定ページを取得
            if ($page) {
                $contact_url = get_permalink($page->ID);
            } else {
                $contact_url = '#'; // ページが存在しない場合のフォールバック
            }
        ?>
        <div class="contact-info">
            <p>メールでのお問い合わせはこちら</p>
            <a href="<?php echo esc_url($contact_url); ?>">お問い合わせ</a>
        </div>



    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>