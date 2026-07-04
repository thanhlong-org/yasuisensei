<?php
/**
 * Template: お知らせ
 * Converted from html_asset/infomation/index.html
 *
 * @package Ludoa
 */
get_header();
$s = ludoa_static_uri();
?>
<main>
    <!-- ============ PAGE BANNER (FV) ============ -->
    <section class="page-banner" aria-label="お知らせ">
      <div class="page-banner__media" aria-hidden="true">
        <div class="page-banner__photo" role="img" aria-label="都市の風景"></div>
        <div class="page-banner__scroll">
          <span class="page-banner__scroll-line"></span>
          <span class="page-banner__scroll-text">SCROLL</span>
        </div>
      </div>

      <div class="page-banner__inner">
        <p class="page-banner__en" aria-hidden="true" data-reveal>Infomation</p>
        <h1 class="page-banner__jp" data-reveal data-reveal-delay="1">お知らせ</h1>
        <p class="page-banner__lead" data-reveal data-reveal-delay="2">
          日々の動きと重要なお知らせを届ける、<br />
          インフォメーション。
        </p>
      </div>

      <nav class="page-banner__breadcrumb" aria-label="パンくずリスト" data-reveal data-reveal-delay="3">
        <ol class="breadcrumb">
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">TOP</a></li>
          <li>
            <span class="breadcrumb__sep" aria-hidden="true">
              <svg viewBox="0 0 10 10" width="10" height="10" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="3,1 7,5 3,9"/></svg>
            </span>
            <span class="breadcrumb__current" aria-current="page">お知らせ</span>
          </li>
        </ol>
      </nav>
    </section>

    <!-- ============ お知らせ一覧 (News list) ============ -->
    <section class="news" aria-label="お知らせ一覧">
      <div class="news__inner">
        <div class="news__list">
          <a href="<?php echo esc_url( ludoa_url( 'infomation-year-end' ) ); ?>" class="news-item" data-reveal>
            <p class="news-item__date">2026.05.18 ｜ お知らせが入ります</p>
            <span class="news-item__tag" aria-hidden="true"></span>
            <p class="news-item__desc">テキストが入ります。テキストが入ります。テキストが入ります。</p>
            <span class="news-item__line" aria-hidden="true"></span>
            <span class="news-item__accent" aria-hidden="true"></span>
          </a>
          <a href="#" class="news-item" data-reveal data-reveal-delay="1">
            <p class="news-item__date">2026.05.18 ｜ お知らせが入ります</p>
            <span class="news-item__tag" aria-hidden="true"></span>
            <p class="news-item__desc">テキストが入ります。テキストが入ります。テキストが入ります。</p>
            <span class="news-item__line" aria-hidden="true"></span>
            <span class="news-item__accent" aria-hidden="true"></span>
          </a>
          <a href="#" class="news-item" data-reveal data-reveal-delay="2">
            <p class="news-item__date">2026.05.18 ｜ お知らせが入ります</p>
            <span class="news-item__tag" aria-hidden="true"></span>
            <p class="news-item__desc">テキストが入ります。テキストが入ります。テキストが入ります。</p>
            <span class="news-item__line" aria-hidden="true"></span>
            <span class="news-item__accent" aria-hidden="true"></span>
          </a>
        </div>

        <!-- Pagination -->
        <nav class="news-pager" aria-label="ページ送り">
          <a href="#" class="news-pager__arrow" aria-label="前のページ">
            <svg viewBox="0 0 34 12" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><line x1="33" y1="6" x2="2" y2="6"/><polyline points="8,1.5 2,6 8,10.5"/></svg>
          </a>
          <a href="#" class="news-pager__num is-active" aria-current="page">01</a>
          <a href="#" class="news-pager__num">02</a>
          <a href="#" class="news-pager__num">03</a>
          <a href="#" class="news-pager__arrow" aria-label="次のページ">
            <svg viewBox="0 0 34 12" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><line x1="1" y1="6" x2="32" y2="6"/><polyline points="26,1.5 32,6 26,10.5"/></svg>
          </a>
        </nav>
      </div>
    </section>

    <?php get_template_part( 'template-parts/cta' ); ?>
  </main>
<?php
get_footer();
