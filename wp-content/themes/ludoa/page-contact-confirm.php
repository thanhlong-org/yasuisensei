<?php
/**
 * Template: 入力内容の確認
 * Converted from html_asset/contact/confirm/index.html
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
            <span class="breadcrumb__current" aria-current="page">内容確認</span>
          </li>
        </ol>
      </nav>
    </section>

    <!-- ============ お問い合わせ（内容確認） ============ -->
    <section class="contact" id="contact-form" aria-label="入力内容の確認">
      <div class="contact__inner">
        <!-- Steps (02 active) -->
        <div class="contact-steps" aria-hidden="true" data-reveal>
          <div class="contact-step">
            <span class="contact-step__circle">
              <span class="contact-step__num">01</span>
              <span class="contact-step__label">入力</span>
            </span>
          </div>
          <span class="contact-step__line"></span>
          <div class="contact-step contact-step--active">
            <span class="contact-step__circle">
              <span class="contact-step__num">02</span>
              <span class="contact-step__label">内容確認</span>
            </span>
          </div>
          <span class="contact-step__line"></span>
          <div class="contact-step">
            <span class="contact-step__circle">
              <span class="contact-step__num">03</span>
              <span class="contact-step__label">完了</span>
            </span>
          </div>
        </div>

        <!-- Confirm intro -->
        <div class="contact-form__intro" data-reveal>
          <p class="contact-form__intro-lead">以下の内容で送信してよろしいですか？</p>
          <p class="contact-form__intro-note">ご入力いただいた内容をご確認いただき、問題なければ「送信ボタン」を押下してください。</p>
        </div>

        <?php $cf_data = ludoa_contact_data(); ?>

        <!-- Review table -->
        <div class="confirm-table" data-reveal>
          <div class="confirm-row">
            <div class="confirm-row__label">名前</div>
            <div class="confirm-row__value"><?php echo esc_html( $cf_data['name'] ?? '' ); ?></div>
          </div>
          <div class="confirm-row">
            <div class="confirm-row__label">ふりがな</div>
            <div class="confirm-row__value"><?php echo esc_html( $cf_data['kana'] ?? '' ); ?></div>
          </div>
          <div class="confirm-row">
            <div class="confirm-row__label">電話番号</div>
            <div class="confirm-row__value"><?php echo esc_html( $cf_data['tel'] ?? '' ); ?></div>
          </div>
          <div class="confirm-row">
            <div class="confirm-row__label">メールアドレス</div>
            <div class="confirm-row__value"><?php echo esc_html( $cf_data['email'] ?? '' ); ?></div>
          </div>
          <div class="confirm-row">
            <div class="confirm-row__label">お問い合わせ種別</div>
            <div class="confirm-row__value"><?php echo esc_html( $cf_data['type'] ?? '' ); ?></div>
          </div>
          <div class="confirm-row">
            <div class="confirm-row__label">お問い合わせ内容</div>
            <div class="confirm-row__value"><?php echo nl2br( esc_html( $cf_data['message'] ?? '' ) ); ?></div>
          </div>
        </div>

        <!-- Actions -->
        <form class="confirm-actions" method="post" action="" data-reveal>
          <?php wp_nonce_field( LUDOA_CONTACT_NONCE_ACTION, LUDOA_CONTACT_NONCE_FIELD ); ?>
          <button type="submit" name="ludoa_contact_step" value="back" class="confirm-actions__back">入力画面に戻る</button>
          <button type="submit" name="ludoa_contact_step" value="send" class="detail-btn">
            <span class="detail-btn__edge detail-btn__edge--t" aria-hidden="true"></span>
            <span class="detail-btn__edge detail-btn__edge--b" aria-hidden="true"></span>
            <span class="detail-btn__edge detail-btn__edge--l" aria-hidden="true"></span>
            <span class="detail-btn__edge detail-btn__edge--r" aria-hidden="true"></span>
            <span class="detail-btn__accent" aria-hidden="true"></span>
            <span class="detail-btn__label">送信する</span>
          </button>
        </form>
      </div>
    </section>

    <?php get_template_part( 'template-parts/cta' ); ?>
  </main>
<?php
get_footer();
