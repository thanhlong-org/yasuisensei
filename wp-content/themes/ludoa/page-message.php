<?php
/**
 * Template: 代表あいさつ
 * Converted from html_asset/message/index.html
 *
 * @package Ludoa
 */
get_header();
$s = ludoa_static_uri();
?>
<main>
    <!-- ============ PAGE BANNER (FV) ============ -->
    <section class="page-banner" aria-label="代表あいさつ">
      <!-- Media: photo + scroll indicator -->
      <div class="page-banner__media" aria-hidden="true">
        <div class="page-banner__photo" role="img" aria-label="経営者に語りかける代表の様子"></div>
        <div class="page-banner__scroll">
          <span class="page-banner__scroll-line"></span>
          <span class="page-banner__scroll-text">SCROLL</span>
        </div>
      </div>

      <!-- Text overlay -->
      <div class="page-banner__inner">
        <p class="page-banner__en" aria-hidden="true" data-reveal>Message</p>
        <h1 class="page-banner__jp" data-reveal data-reveal-delay="1">代表あいさつ</h1>
        <p class="page-banner__lead" data-reveal data-reveal-delay="2">
          共に未来へ歩む、<br />
          代表からのごあいさつ。
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
            <a href="<?php echo esc_url( ludoa_url( 'company' ) ); ?>">企業情報</a>
          </li>
          <li>
            <span class="breadcrumb__sep" aria-hidden="true">
              <svg viewBox="0 0 10 10" width="10" height="10" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="3,1 7,5 3,9"/></svg>
            </span>
            <span class="breadcrumb__current" aria-current="page">代表あいさつ</span>
          </li>
        </ol>
      </nav>
    </section>

    <!-- ============ 代表あいさつ (Message greeting) ============ -->
    <section class="promise msg" aria-label="代表あいさつ">
      <div class="promise__inner">
        <article class="promise-row">
          <div class="promise-row__media" data-reveal>
            <div class="promise-row__photo">
              <img src="<?php echo $s; ?>/message/img/img-01.jpg" alt="代表税理士 安井瑛顕" />
            </div>
            <div class="msg-caption">
              <span class="msg-caption__logo" aria-hidden="true"></span>
              <span class="msg-caption__text">
                <span class="msg-caption__role">代表税理士</span>
                <span class="msg-caption__name">安井 瑛顕</span>
                <span class="msg-caption__en">Hideaki Yasui</span>
              </span>
            </div>
          </div>
          <div class="promise-row__content">
            <h2 class="promise-title" data-reveal data-reveal-delay="1">
              <span class="promise-title__line promise-title__line--1">数字の先には、必ず「人」と「想い」がある。</span>
              <span class="promise-title__line promise-title__line--2">私たちは、その考えを大切にしています。<span class="promise-title__star" aria-hidden="true"></span></span>
            </h2>
            <div class="promise-text" data-reveal data-reveal-delay="2">
              <p>税務・会計の支援は、単なる数字の管理や申告業務ではありません。<br />経営者様が日々向き合う課題や決断に寄り添い、<br />その挑戦を支える大切な役割だと考えています。<br />事業経営には、資金繰りや税務だけでなく、事業の成長や人材採用、<br />将来の展望など、多くの判断が求められます。<br />だからこそ当事務所では、丁寧な対話を何より大切にし、<br />お客様の想いや目指す未来を共有したうえで最適なご提案を行います。<br />分かりやすい説明と迅速な対応を心掛け、<br />安心して経営に専念できる環境づくりをサポートします。</p>
              <p>信頼して長くお付き合いいただけるパートナーとして、<br />お客様の成長と発展に貢献してまいります。</p>
            </div>
          </div>
        </article>
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
            <span class="mc-card__photo" style="background-image: url('<?php echo $s; ?>/message/img/img-02.jpg')" aria-hidden="true"></span>
            <span class="mc-card__foot">
              <span class="mc-card__name">私たちの強み</span>
              <span class="mc-arrow" aria-hidden="true">
                <span class="mc-arrow__line"></span>
                <span class="mc-arrow__head"></span>
                <span class="mc-arrow__star"><svg viewBox="0 0 19 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 9.34C7.87 9.89 10.65 5.77 12.26 0c-.26 2-.26 2.5 0 4 .26 3.5.39 4.39 4.91 4.77.72.06 1.44.1 2.09.14-2.8 1.15-6.27 1.75-8.13 3.59C7.97 14.38 7 17.5 6.2 20c.23-1.79.43-3.6.7-5.38.52-3.29-.7-3.83-4.51-4.68-.99-.22-2.24-.37-3.36-.59L0 9.34Z"/></svg></span>
              </span>
            </span>
          </a>
          <a href="<?php echo esc_url( ludoa_url( 'office' ) ); ?>" class="mc-card" data-reveal data-reveal-delay="1">
            <span class="mc-card__photo" style="background-image: url('<?php echo $s; ?>/message/img/img-03.jpg')" aria-hidden="true"></span>
            <span class="mc-card__foot">
              <span class="mc-card__name">事務所概要</span>
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

    <?php get_template_part( 'template-parts/case' ); ?>

    <?php get_template_part( 'template-parts/cta' ); ?>
  </main>
<?php
get_footer();
