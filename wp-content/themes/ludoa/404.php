<?php
/**
 * Template: 404 (ページが見つかりません)
 * Standalone hero + message, then the shared CTA. Uses global CSS (reset /
 * tokens / common) plus static/404/css/style.css enqueued on is_404().
 *
 * @package Ludoa
 */
get_header();
$s = ludoa_static_uri();
?>
<main>
    <!-- ============ 404 ============ -->
    <section class="nf" aria-labelledby="nf-title">
      <span class="nf__deco nf__deco--tl" aria-hidden="true"></span>
      <span class="nf__deco nf__deco--br" aria-hidden="true"></span>

      <div class="nf__inner">
        <p class="nf__code" aria-hidden="true" data-reveal>404</p>
        <p class="nf__en" aria-hidden="true" data-reveal data-reveal-delay="1">Page Not Found</p>
        <h1 class="nf__title" id="nf-title" data-reveal data-reveal-delay="1">ページが見つかりませんでした</h1>
        <p class="nf__lead" data-reveal data-reveal-delay="2">
          お探しのページは移動または削除された可能性があります。<br />
          お手数ですが、URL をご確認いただくか、<br class="nf__br--sp" />下のボタンからトップページへお戻りください。
        </p>

        <div class="nf__actions" data-reveal data-reveal-delay="3">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="detail-btn">
            <span class="detail-btn__edge detail-btn__edge--t" aria-hidden="true"></span>
            <span class="detail-btn__edge detail-btn__edge--b" aria-hidden="true"></span>
            <span class="detail-btn__edge detail-btn__edge--l" aria-hidden="true"></span>
            <span class="detail-btn__edge detail-btn__edge--r" aria-hidden="true"></span>
            <span class="detail-btn__accent" aria-hidden="true"></span>
            <span class="detail-btn__label">TOPに戻る</span>
          </a>
        </div>
      </div>
    </section>

    <?php get_template_part( 'template-parts/cta' ); ?>
  </main>
<?php
get_footer();
