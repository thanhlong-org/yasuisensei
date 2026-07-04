<?php
/**
 * Template: 企業情報
 * Converted from html_asset/company/index.html
 *
 * @package Ludoa
 */
get_header();
$s = ludoa_static_uri();
?>
<main>
    <!-- ============ PAGE BANNER (FV) ============ -->
    <section class="page-banner" aria-label="企業情報">
      <!-- Media: photo + scroll indicator -->
      <div class="page-banner__media" aria-hidden="true">
        <div class="page-banner__photo" role="img" aria-label="ビル群を見上げる風景"></div>
        <div class="page-banner__scroll">
          <span class="page-banner__scroll-line"></span>
          <span class="page-banner__scroll-text">SCROLL</span>
        </div>
      </div>

      <!-- Text overlay -->
      <div class="page-banner__inner">
        <p class="page-banner__en" aria-hidden="true" data-reveal>Company</p>
        <h1 class="page-banner__jp" data-reveal data-reveal-delay="1">企業情報</h1>
        <p class="page-banner__lead" data-reveal data-reveal-delay="2">
          これからの経営を共に支える、<br />
          当事務所の基本概要。
        </p>
      </div>

      <!-- Breadcrumb -->
      <nav class="page-banner__breadcrumb" aria-label="パンくずリスト" data-reveal data-reveal-delay="3">
        <ol class="breadcrumb">
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">TOP</a></li>
          <li>
            <span class="breadcrumb__sep" aria-hidden="true">
              <svg viewBox="0 0 10 10" width="10" height="10" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="3,1 7,5 3,9"/></svg>
            </span>
            <span class="breadcrumb__current" aria-current="page">企業情報</span>
          </li>
        </ol>
      </nav>
    </section>

    <!-- ============ COMPANY (企業情報) — no heading ============ -->
    <section class="company" aria-label="企業情報" data-reveal>
      <div class="company__inner">
        <div class="company__body" data-reveal>
          <!-- Frame deco -->
          <span class="company__frame company__frame--tline" aria-hidden="true"></span>
          <span class="company__frame company__frame--bline" aria-hidden="true"></span>
          <span class="company__frame company__frame--tl" aria-hidden="true"></span>
          <span class="company__frame company__frame--br" aria-hidden="true"></span>
          <span class="company__frame company__frame--star-tr" aria-hidden="true"></span>
          <span class="company__frame company__frame--star-bl" aria-hidden="true"></span>

          <!-- Intro text (left) -->
          <div class="company__intro" data-reveal>
            <p class="company__intro-p">私たちは、<br />お客様との長期的な信頼関係を何よりも大切にしています。</p>
            <p class="company__intro-p">そのために、どのような想いで日々の業務に向き合い、<br />どのような強みを持ってご支援しているのか。</p>
            <p class="company__intro-p">安心してご相談いただくために、<br />まずは私たちのことを知っていただければ幸いです。</p>
          </div>

          <!-- Link rows (right) — reveal a photo on hover -->
          <ul class="company__list">
            <li class="company-item company-item--01" data-reveal>
              <a href="<?php echo esc_url( ludoa_url( 'features' ) ); ?>" class="company-item__link">
                <span class="company-item__media" aria-hidden="true"></span>
                <span class="company-item__line company-item__line--top" aria-hidden="true"></span>
                <span class="company-item__bar-top" aria-hidden="true"></span>
                <span class="company-item__text">
                  <span class="company-item__title">私たちの強み</span>
                  <span class="company-item__en">Feature</span>
                </span>
                <span class="company-item__arrow" aria-hidden="true">
                  <img src="<?php echo $s; ?>/assets/img/arrow-icon.svg" alt="" width="40" height="40" />
                </span>
                <span class="company-item__line" aria-hidden="true"></span>
                <span class="company-item__accent" aria-hidden="true"></span>
              </a>
            </li>

            <li class="company-item company-item--02" data-reveal data-reveal-delay="1">
              <a href="<?php echo esc_url( ludoa_url( 'message' ) ); ?>" class="company-item__link">
                <span class="company-item__media" aria-hidden="true"></span>
                <span class="company-item__bar-top" aria-hidden="true"></span>
                <span class="company-item__text">
                  <span class="company-item__title">代表あいさつ</span>
                  <span class="company-item__en">Message</span>
                </span>
                <span class="company-item__arrow" aria-hidden="true">
                  <img src="<?php echo $s; ?>/assets/img/arrow-icon.svg" alt="" width="40" height="40" />
                </span>
                <span class="company-item__line" aria-hidden="true"></span>
                <span class="company-item__accent" aria-hidden="true"></span>
              </a>
            </li>

            <li class="company-item company-item--03" data-reveal data-reveal-delay="2">
              <a href="<?php echo esc_url( ludoa_url( 'office' ) ); ?>" class="company-item__link">
                <span class="company-item__media" aria-hidden="true"></span>
                <span class="company-item__bar-top" aria-hidden="true"></span>
                <span class="company-item__text">
                  <span class="company-item__title">事務所概要</span>
                  <span class="company-item__en">Office</span>
                </span>
                <span class="company-item__arrow" aria-hidden="true">
                  <img src="<?php echo $s; ?>/assets/img/arrow-icon.svg" alt="" width="40" height="40" />
                </span>
                <span class="company-item__line" aria-hidden="true"></span>
                <span class="company-item__accent" aria-hidden="true"></span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </section>

    <?php get_template_part( 'template-parts/cta' ); ?>
  </main>
<?php
get_footer();
