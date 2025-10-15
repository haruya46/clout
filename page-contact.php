<?php get_header(); ?>
<section class="contact-section">
    <div class="contact-title">Contact</div>

    <div class="contact-form-wrapper">
        <?php
        // Contact Form 7 のショートコード
        echo do_shortcode('[contact-form-7 id="4c1957b" title="contact"]');
        ?>
    </div>
</section>


<?php get_footer(); ?>
