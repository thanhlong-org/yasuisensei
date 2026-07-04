<?php
/**
 * Template: 私たちの強み
 * Converted from html_asset/features/index.html
 *
 * @package Ludoa
 */
get_header();
$s = ludoa_static_uri();
?>
<main>
    <!-- ============ PAGE BANNER (FV) ============ -->
    <section class="page-banner" aria-label="私たちの強み">
      <!-- Media: businessman photo + scroll indicator -->
      <div class="page-banner__media" aria-hidden="true">
        <div class="page-banner__photo" role="img" aria-label="未来を見据える経営者の後ろ姿"></div>
        <div class="page-banner__scroll">
          <span class="page-banner__scroll-line"></span>
          <span class="page-banner__scroll-text">SCROLL</span>
        </div>
      </div>

      <!-- Text overlay -->
      <div class="page-banner__inner">
        <p class="page-banner__en" aria-hidden="true" data-reveal>Features</p>
        <h1 class="page-banner__jp" data-reveal data-reveal-delay="1">私たちの強み</h1>
        <p class="page-banner__lead" data-reveal data-reveal-delay="2">
          お客様の未来を支える、<br />
          私たちが守り続ける「3つの約束」。
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
            <a href="<?php echo esc_url( home_url( '/#company' ) ); ?>">企業情報</a>
          </li>
          <li>
            <span class="breadcrumb__sep" aria-hidden="true">
              <svg viewBox="0 0 10 10" width="10" height="10" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="3,1 7,5 3,9"/></svg>
            </span>
            <span class="breadcrumb__current" aria-current="page">私たちの強み</span>
          </li>
        </ol>
      </nav>
    </section>

    <!-- ============ 3つの約束 (Promise) ============ -->
    <section class="promise" aria-label="3つの約束">
      <div class="promise__inner">

        <!-- Promise 01 — image left, text right -->
        <article class="promise-row">
          <div class="promise-row__media" data-reveal>
            <div class="promise-badge promise-badge--01">
              <span class="promise-badge__deco" aria-hidden="true"></span>
              <span class="promise-badge__label">Promise</span>
              <span class="promise-badge__num">01</span>
            </div>
            <div class="promise-row__photo">
              <img src="<?php echo $s; ?>/features/img/img-01.jpg" alt="経営者様との対話の様子" />
            </div>
          </div>
          <div class="promise-row__content">
            <h2 class="promise-title" data-reveal data-reveal-delay="1">
              <span class="promise-title__line promise-title__line--1">「徹底した対話」で、</span>
              <span class="promise-title__line promise-title__line--2">不安を安心に変えます。<span class="promise-title__star" aria-hidden="true"></span></span>
            </h2>
            <div class="promise-text" data-reveal data-reveal-delay="2">
              <p>数字だけを見るのではなく、経営者様の想いや悩みにも<br />しっかり耳を傾けることを大切にしています。</p>
              <p>「何を相談すればいいか分からない」<br />「こんなことを聞いても大丈夫だろうか」</p>
              <p>――そんな段階からでも、<br />安心してご相談いただける存在でありたいと考えています。<br />税務・会計の専門家としてだけでなく、経営に伴走する<br />パートナーとして、対話を重ねながら課題を整理し、<br />一つひとつ丁寧にサポートいたします。</p>
            </div>
          </div>
        </article>

        <!-- Promise 02 — text left, image right -->
        <article class="promise-row promise-row--reverse">
          <div class="promise-row__media" data-reveal>
            <div class="promise-badge promise-badge--02">
              <span class="promise-badge__deco" aria-hidden="true"></span>
              <span class="promise-badge__label">Promise</span>
              <span class="promise-badge__num">02</span>
            </div>
            <div class="promise-row__photo">
              <img src="<?php echo $s; ?>/features/img/img-02.jpg" alt="迅速に対応する様子" />
            </div>
          </div>
          <div class="promise-row__content">
            <h2 class="promise-title" data-reveal data-reveal-delay="1">
              <span class="promise-title__line promise-title__line--1">「迅速なレスポンス」で、</span>
              <span class="promise-title__line promise-title__line--2">経営のスピードを止めません。<span class="promise-title__star" aria-hidden="true"></span></span>
            </h2>
            <div class="promise-text" data-reveal data-reveal-delay="2">
              <p>税務や経営の判断は、<br />タイミングによって結果が大きく変わることがあります。</p>
              <p>そのため当事務所では、ご相談やご質問に対してできる限り<br />迅速に対応し、経営者様が安心して次の一歩を踏み出せる<br />環境づくりを大切にしています。</p>
              <p>「確認待ちで進められない」<br />「返答が遅くて不安になる」</p>
              <p>――そんなストレスを減らし、日々の経営判断をスムーズに<br />進められるよう、スピード感を持ってサポートいたします。</p>
            </div>
          </div>
        </article>

        <!-- Promise 03 — image left, text right -->
        <article class="promise-row">
          <div class="promise-row__media" data-reveal>
            <div class="promise-badge promise-badge--03">
              <span class="promise-badge__deco" aria-hidden="true"></span>
              <span class="promise-badge__label">Promise</span>
              <span class="promise-badge__num">03</span>
            </div>
            <div class="promise-row__photo">
              <img src="<?php echo $s; ?>/features/img/img-03.jpg" alt="一歩先の提案をする様子" />
            </div>
          </div>
          <div class="promise-row__content">
            <h2 class="promise-title" data-reveal data-reveal-delay="1">
              <span class="promise-title__line promise-title__line--1">「一歩先の提案」で、</span>
              <span class="promise-title__line promise-title__line--2">共に未来を創ります。<span class="promise-title__star" aria-hidden="true"></span></span>
            </h2>
            <div class="promise-text" data-reveal data-reveal-delay="2">
              <p>単なる記帳や申告業務だけで終わるのではなく、<br />その先の経営や事業成長を見据えたご提案を大切にしています。</p>
              <p>現状を整理するだけではなく、資金繰り・節税・事業拡大・法人化<br />など、将来を見据えながら最適な選択肢を一緒に考えていきます。</p>
              <p>経営環境が変化する時代だからこそ、長期的な視点で寄り添い、<br />経営者様にとって「困った時にまず相談したい存在」で<br />あり続けたいと考えています。</p>
            </div>
          </div>
        </article>

      </div>
    </section>

    <?php get_template_part( 'template-parts/service' ); ?>

    <?php get_template_part( 'template-parts/case' ); ?>

    <?php get_template_part( 'template-parts/cta' ); ?>
  </main>
<?php
get_footer();
