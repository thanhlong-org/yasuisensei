<?php
/**
 * Template: 送信完了
 * Converted from html_asset/contact/complete/index.html
 *
 * @package Ludoa
 */
get_header();
$s = ludoa_static_uri();
?>
<main>
    <!-- ============ PAGE BANNER (FV) ============ -->
    <section class="page-banner" aria-label="お問い合わせ">
      <div class="page-banner__media" aria-hidden="true">
        <div class="page-banner__photo" role="img" aria-label="相談の様子"></div>
        <div class="page-banner__scroll">
          <span class="page-banner__scroll-line"></span>
          <span class="page-banner__scroll-text">SCROLL</span>
        </div>
      </div>

      <div class="page-banner__inner">
        <p class="page-banner__en" aria-hidden="true" data-reveal>Contact</p>
        <h1 class="page-banner__jp" data-reveal data-reveal-delay="1">お問い合わせ</h1>
        <p class="page-banner__lead" data-reveal data-reveal-delay="2">
          安心への第一歩は、ご相談から。
        </p>
      </div>

      <nav class="page-banner__breadcrumb" aria-label="パンくずリスト" data-reveal data-reveal-delay="3">
        <ol class="breadcrumb">
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">TOP</a></li>
          <li>
            <span class="breadcrumb__sep" aria-hidden="true">
              <svg viewBox="0 0 10 10" width="10" height="10" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="3,1 7,5 3,9"/></svg>
            </span>
            <a href="<?php echo esc_url( ludoa_url( 'contact' ) ); ?>">お問い合わせ</a>
          </li>
          <li>
            <span class="breadcrumb__sep" aria-hidden="true">
              <svg viewBox="0 0 10 10" width="10" height="10" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="3,1 7,5 3,9"/></svg>
            </span>
            <span class="breadcrumb__current" aria-current="page">完了</span>
          </li>
        </ol>
      </nav>
    </section>

    <!-- ============ お問い合わせ（送信完了） ============ -->
    <section class="contact" id="contact-form" aria-label="送信完了">
      <div class="contact__inner">
        <!-- Steps (03 active) -->
        <div class="contact-steps" aria-hidden="true" data-reveal>
          <div class="contact-step">
            <span class="contact-step__circle">
              <span class="contact-step__num">01</span>
              <span class="contact-step__label">入力</span>
            </span>
          </div>
          <span class="contact-step__line"></span>
          <div class="contact-step">
            <span class="contact-step__circle">
              <span class="contact-step__num">02</span>
              <span class="contact-step__label">内容確認</span>
            </span>
          </div>
          <span class="contact-step__line"></span>
          <div class="contact-step contact-step--active">
            <span class="contact-step__circle">
              <span class="contact-step__num">03</span>
              <span class="contact-step__label">完了</span>
            </span>
          </div>
        </div>

        <!-- Thank-you message -->
        <p class="complete__lead" data-reveal>お問い合わせありがとうございました。</p>
        <div class="complete__body" data-reveal>
          <p>今後の流れ<br />
          ・ ご入力いただいたメールアドレス宛に、自動返信メールをお送りしております。<br />
          ・ 内容を確認の上、担当者より2営業日以内にご連絡差し上げます。</p>
          <p>しばらく経っても自動返信メールが届かない場合は、お手数ですが<br />
          迷惑メールフォルダをご確認いただくか、お電話にてお問い合わせください。</p>
        </div>

        <div class="complete__actions" data-reveal>
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
