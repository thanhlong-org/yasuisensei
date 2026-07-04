<?php
/**
 * Template: 事務所概要
 * Converted from html_asset/office/index.html
 *
 * @package Ludoa
 */
get_header();
$s = ludoa_static_uri();
?>
<main>
    <!-- ============ PAGE BANNER (FV) ============ -->
    <section class="page-banner" aria-label="事務所概要">
      <div class="page-banner__media" aria-hidden="true">
        <div class="page-banner__photo" role="img" aria-label="事務所のオフィス風景"></div>
        <div class="page-banner__scroll">
          <span class="page-banner__scroll-line"></span>
          <span class="page-banner__scroll-text">SCROLL</span>
        </div>
      </div>

      <div class="page-banner__inner">
        <p class="page-banner__en" aria-hidden="true" data-reveal>Office</p>
        <h1 class="page-banner__jp" data-reveal data-reveal-delay="1">事務所概要</h1>
        <p class="page-banner__lead" data-reveal data-reveal-delay="2">
          信頼を築くための基盤となる、<br />
          私たちの足跡と組織情報。
        </p>
      </div>

      <nav class="page-banner__breadcrumb" aria-label="パンくずリスト" data-reveal data-reveal-delay="3">
        <ol class="breadcrumb">
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">TOP</a></li>
          <li>
            <span class="breadcrumb__sep" aria-hidden="true">
              <svg viewBox="0 0 10 10" width="10" height="10" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="3,1 7,5 3,9"/></svg>
            </span>
            <a href="<?php echo esc_url( ludoa_url( 'company' ) ); ?>">企業情報</a>
          </li>
          <li>
            <span class="breadcrumb__sep" aria-hidden="true">
              <svg viewBox="0 0 10 10" width="10" height="10" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="3,1 7,5 3,9"/></svg>
            </span>
            <span class="breadcrumb__current" aria-current="page">事務所概要</span>
          </li>
        </ol>
      </nav>
    </section>

    <!-- ============ 事務所概要 (Info table) ============ -->
    <section class="office-info" aria-label="事務所概要">
      <div class="office-info__inner">
        <div class="office-info__row" data-reveal>
          <div class="office-info__term">事務所名</div>
          <div class="office-info__desc">安井税理士事務所</div>
        </div>
        <div class="office-info__row" data-reveal>
          <div class="office-info__term">適格請求書発行事業者番号</div>
          <div class="office-info__desc">TXXXXXXXXXXXX</div>
        </div>
        <div class="office-info__row" data-reveal>
          <div class="office-info__term">代表者</div>
          <div class="office-info__desc">安井　瑛顕</div>
        </div>
        <div class="office-info__row" data-reveal>
          <div class="office-info__term">電話番号</div>
          <div class="office-info__desc">080-1234-5678</div>
        </div>
        <div class="office-info__row" data-reveal>
          <div class="office-info__term">事務所所在地</div>
          <div class="office-info__desc">〒145-0072<br />東京都大田区田園調布本町21−27　Laguna桜坂102</div>
        </div>
        <div class="office-info__row" data-reveal>
          <div class="office-info__term">取引銀行</div>
          <div class="office-info__desc">三菱UFJ銀行</div>
        </div>
      </div>
    </section>

    <!-- ============ More Contents ============ -->
    <section class="mc" aria-label="企業情報についてもっと知る">
      <div class="mc__inner">
        <div class="mc__head" data-reveal>
          <p class="mc__label"><span class="mc__label-star" aria-hidden="true"></span>企業情報についてもっと知る</p>
          <p class="mc__title">More Contents</p>
        </div>
        <div class="mc__cards">
          <a href="<?php echo esc_url( ludoa_url( 'features' ) ); ?>" class="mc-card" data-reveal>
            <span class="mc-card__photo" style="background-image: url('<?php echo $s; ?>/office/img/mc-feature.jpg')" aria-hidden="true"></span>
            <span class="mc-card__foot">
              <span class="mc-card__name">私たちの強み</span>
              <span class="mc-arrow" aria-hidden="true">
                <span class="mc-arrow__line"></span>
                <span class="mc-arrow__head"></span>
                <span class="mc-arrow__star"><svg viewBox="0 0 19 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 9.34C7.87 9.89 10.65 5.77 12.26 0c-.26 2-.26 2.5 0 4 .26 3.5.39 4.39 4.91 4.77.72.06 1.44.1 2.09.14-2.8 1.15-6.27 1.75-8.13 3.59C7.97 14.38 7 17.5 6.2 20c.23-1.79.43-3.6.7-5.38.52-3.29-.7-3.83-4.51-4.68-.99-.22-2.24-.37-3.36-.59L0 9.34Z"/></svg></span>
              </span>
            </span>
          </a>
          <a href="<?php echo esc_url( ludoa_url( 'message' ) ); ?>" class="mc-card" data-reveal data-reveal-delay="1">
            <span class="mc-card__photo" style="background-image: url('<?php echo $s; ?>/office/img/mc-message.jpg')" aria-hidden="true"></span>
            <span class="mc-card__foot">
              <span class="mc-card__name">代表あいさつ</span>
              <span class="mc-arrow" aria-hidden="true">
                <span class="mc-arrow__line"></span>
                <span class="mc-arrow__head"></span>
                <span class="mc-arrow__star"><svg viewBox="0 0 19 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 9.34C7.87 9.89 10.65 5.77 12.26 0c-.26 2-.26 2.5 0 4 .26 3.5.39 4.39 4.91 4.77.72.06 1.44.1 2.09.14-2.8 1.15-6.27 1.75-8.13 3.59C7.97 14.38 7 17.5 6.2 20c.23-1.79.43-3.6.7-5.38.52-3.29-.7-3.83-4.51-4.68-.99-.22-2.24-.37-3.36-.59L0 9.34Z"/></svg></span>
              </span>
            </span>
          </a>
        </div>
      </div>
    </section>

    <?php get_template_part( 'template-parts/service' ); ?>

    <?php get_template_part( 'template-parts/case' ); ?>

    <?php get_template_part( 'template-parts/cta' ); ?>
  </main>
<?php
get_footer();
