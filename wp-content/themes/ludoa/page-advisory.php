<?php
/**
 * Template: 税務顧問
 * Converted from html_asset/advisory/index.html
 *
 * @package Ludoa
 */
get_header();
$s = ludoa_static_uri();
?>
<main>
    <!-- ============ PAGE BANNER (FV) ============ -->
    <section class="page-banner" aria-label="税務顧問">
      <div class="page-banner__media" aria-hidden="true">
        <div class="page-banner__photo" role="img" aria-label="打ち合わせの様子"></div>
        <div class="page-banner__scroll">
          <span class="page-banner__scroll-line"></span>
          <span class="page-banner__scroll-text">SCROLL</span>
        </div>
      </div>

      <div class="page-banner__inner">
        <p class="page-banner__en" aria-hidden="true" data-reveal>Advisory</p>
        <h1 class="page-banner__jp" data-reveal data-reveal-delay="1">税務顧問</h1>
        <div class="page-banner__lead" data-reveal data-reveal-delay="2">
          <p>税務顧問とは、税金の申告や会計処理だけでなく、<br />事業運営に関するさまざまな課題を継続的にサポートするサービスです。</p>
          <p>毎月の業績確認や税務相談を通じて、経営状況を正しく把握し、<br />適切な意思決定を支援します。</p>
          <p>税制改正への対応や節税対策はもちろん、<br />資金繰りや事業計画などについても気軽に相談できる身近なパートナーとして、<br />お客様の事業を支えます。</p>
        </div>
      </div>

      <nav class="page-banner__breadcrumb" aria-label="パンくずリスト" data-reveal data-reveal-delay="3">
        <ol class="breadcrumb">
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">TOP</a></li>
          <li>
            <span class="breadcrumb__sep" aria-hidden="true">
              <svg viewBox="0 0 10 10" width="10" height="10" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="3,1 7,5 3,9"/></svg>
            </span>
            <a href="<?php echo esc_url( ludoa_url( 'service' ) ); ?>">サービス</a>
          </li>
          <li>
            <span class="breadcrumb__sep" aria-hidden="true">
              <svg viewBox="0 0 10 10" width="10" height="10" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="3,1 7,5 3,9"/></svg>
            </span>
            <span class="breadcrumb__current" aria-current="page">税務顧問</span>
          </li>
        </ol>
      </nav>
    </section>

    <!-- ============ 支援内容 (Support content) ============ -->
    <section class="asy-support" aria-label="支援内容">
      <div class="asy-support__box" data-reveal>
        <div class="asy-head asy-head--center asy-head--light">
          <h2 class="asy-head__title">支援内容</h2>
          <span class="asy-head__rule" aria-hidden="true">
            <svg class="asy-head__star" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 9.34003C8.28596 9.88522 11.2145 5.76758 12.9027 0C12.8338 1.26255 12.8165 2.53945 12.6959 3.80201C12.3342 7.6901 13.0405 8.39311 17.795 8.76614C18.553 8.82353 19.3109 8.86657 20 8.90961C17.0543 10.0574 13.4022 10.66 11.4384 12.4964C9.44014 14.3759 9.0956 17.4749 7.57967 20C7.82084 18.2066 8.02756 16.3989 8.32041 14.6198C8.81998 11.5782 7.44186 9.95696 3.56589 9.94261C2.37726 9.94261 1.20586 9.56958 0.0344538 9.35438L0 9.34003Z"/></svg>
          </span>
        </div>

        <ul class="asy-support__grid">
          <li class="asy-support__item"><span class="asy-support__num">01</span><span class="asy-support__name">月次会計データの確認・チェック</span></li>
          <li class="asy-support__item"><span class="asy-support__num">02</span><span class="asy-support__name">試算表の作成および業績報告</span></li>
          <li class="asy-support__item"><span class="asy-support__num">03</span><span class="asy-support__name">税務相談・経営相談</span></li>
          <li class="asy-support__item"><span class="asy-support__num">04</span><span class="asy-support__name">法人税・消費税に関する相談</span></li>
          <li class="asy-support__item"><span class="asy-support__num">05</span><span class="asy-support__name">節税対策のご提案</span></li>
          <li class="asy-support__item"><span class="asy-support__num">06</span><span class="asy-support__name">決算対策・納税予測</span></li>
          <li class="asy-support__item"><span class="asy-support__num">07</span><span class="asy-support__name">税務署からの問い合わせ対応</span></li>
          <li class="asy-support__item"><span class="asy-support__num">08</span><span class="asy-support__name">各種届出書の作成・提出</span></li>
        </ul>
      </div>
    </section>

    <!-- ============ 解決できる課題 (Problems solved) ============ -->
    <section class="asy-issues" aria-label="解決できる課題">
      <div class="asy-issues__inner">
        <div class="asy-head" data-reveal>
          <h2 class="asy-head__title">解決できる課題</h2>
          <span class="asy-head__rule" aria-hidden="true">
            <svg class="asy-head__star" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 9.34003C8.28596 9.88522 11.2145 5.76758 12.9027 0C12.8338 1.26255 12.8165 2.53945 12.6959 3.80201C12.3342 7.6901 13.0405 8.39311 17.795 8.76614C18.553 8.82353 19.3109 8.86657 20 8.90961C17.0543 10.0574 13.4022 10.66 11.4384 12.4964C9.44014 14.3759 9.0956 17.4749 7.57967 20C7.82084 18.2066 8.02756 16.3989 8.32041 14.6198C8.81998 11.5782 7.44186 9.95696 3.56589 9.94261C2.37726 9.94261 1.20586 9.56958 0.0344538 9.35438L0 9.34003Z"/></svg>
          </span>
        </div>

        <ul class="asy-issues__grid" data-reveal>
          <li class="asy-issues__item">
            <svg class="asy-issues__check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2.5"/><path d="M7.5 12.4l3 3 6-6.4" stroke-width="2"/></svg>
            <span class="asy-issues__txt">税金がいくらかかるのか分からない</span>
          </li>
          <li class="asy-issues__item">
            <svg class="asy-issues__check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2.5"/><path d="M7.5 12.4l3 3 6-6.4" stroke-width="2"/></svg>
            <span class="asy-issues__txt">節税対策をしたいが方法が分からない</span>
          </li>
          <li class="asy-issues__item">
            <svg class="asy-issues__check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2.5"/><path d="M7.5 12.4l3 3 6-6.4" stroke-width="2"/></svg>
            <span class="asy-issues__txt">決算直前になって慌てたくない</span>
          </li>
          <li class="asy-issues__item">
            <svg class="asy-issues__check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2.5"/><path d="M7.5 12.4l3 3 6-6.4" stroke-width="2"/></svg>
            <span class="asy-issues__txt">会計や税務の相談相手がいない</span>
          </li>
        </ul>
      </div>
    </section>

    <!-- ============ ご利用の流れ (Flow) ============ -->
    <section class="asy-flow" aria-label="ご利用の流れ">
      <div class="asy-flow__inner">
        <div class="asy-head" data-reveal>
          <h2 class="asy-head__title">ご利用の流れ</h2>
          <span class="asy-head__rule" aria-hidden="true">
            <svg class="asy-head__star" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 9.34003C8.28596 9.88522 11.2145 5.76758 12.9027 0C12.8338 1.26255 12.8165 2.53945 12.6959 3.80201C12.3342 7.6901 13.0405 8.39311 17.795 8.76614C18.553 8.82353 19.3109 8.86657 20 8.90961C17.0543 10.0574 13.4022 10.66 11.4384 12.4964C9.44014 14.3759 9.0956 17.4749 7.57967 20C7.82084 18.2066 8.02756 16.3989 8.32041 14.6198C8.81998 11.5782 7.44186 9.95696 3.56589 9.94261C2.37726 9.94261 1.20586 9.56958 0.0344538 9.35438L0 9.34003Z"/></svg>
          </span>
        </div>

        <ol class="asy-flow__steps">
          <li class="asy-flow__step" data-reveal>
            <span class="asy-flow__num" aria-hidden="true">01</span>
            <div class="asy-flow__body">
              <h3 class="asy-flow__title">お問い合わせ</h3>
              <p class="asy-flow__desc">お問い合わせフォームまたはお電話にてお気軽にご相談ください。</p>
            </div>
          </li>
          <li class="asy-flow__step" data-reveal>
            <span class="asy-flow__num" aria-hidden="true">02</span>
            <div class="asy-flow__body">
              <h3 class="asy-flow__title">初回相談</h3>
              <p class="asy-flow__desc">現在のお悩みや事業内容、会計・税務の状況について詳しくお伺いします。</p>
            </div>
          </li>
          <li class="asy-flow__step" data-reveal>
            <span class="asy-flow__num" aria-hidden="true">03</span>
            <div class="asy-flow__body">
              <h3 class="asy-flow__title">ご提案・お見積り</h3>
              <p class="asy-flow__desc">ご状況に合わせて最適なサポート内容と料金をご提案いたします。</p>
            </div>
          </li>
          <li class="asy-flow__step" data-reveal>
            <span class="asy-flow__num" aria-hidden="true">04</span>
            <div class="asy-flow__body">
              <h3 class="asy-flow__title">ご契約</h3>
              <p class="asy-flow__desc">サービス内容にご納得いただいたうえで顧問契約を締結します。</p>
            </div>
          </li>
          <li class="asy-flow__step" data-reveal>
            <span class="asy-flow__num" aria-hidden="true">05</span>
            <div class="asy-flow__body">
              <h3 class="asy-flow__title">月次サポート開始</h3>
              <p class="asy-flow__desc">会計資料の確認や税務相談を行いながら、継続的に経営をサポートします。</p>
            </div>
          </li>
          <li class="asy-flow__step" data-reveal>
            <span class="asy-flow__num" aria-hidden="true">06</span>
            <div class="asy-flow__body">
              <h3 class="asy-flow__title">決算・申告対応</h3>
              <p class="asy-flow__desc">決算対策から各種申告まで一貫して対応し、適正な納税をサポートします。</p>
            </div>
          </li>
        </ol>
      </div>
    </section>

    <?php get_template_part( 'template-parts/service' ); ?>

    <?php get_template_part( 'template-parts/case' ); ?>

    <?php get_template_part( 'template-parts/cta' ); ?>
  </main>
<?php
get_footer();
