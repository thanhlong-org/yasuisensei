<?php
/**
 * Template: お問い合わせ
 * Converted from html_asset/contact/index.html
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
            <span class="breadcrumb__current" aria-current="page">お問い合わせ</span>
          </li>
        </ol>
      </nav>
    </section>

    <!-- ============ お問い合わせ ============ -->
    <section class="contact" aria-label="お問い合わせフォーム">
      <div class="contact__inner">
        <p class="contact__urgent" data-reveal>お急ぎの方は、お電話またはLINEからでもお気軽にご連絡ください。</p>

        <!-- Quick contact -->
        <div class="contact-quick">
          <a href="tel:03XXXXXXXX" class="contact-quick__box" data-reveal>
            <img src="<?php echo $s; ?>/contact/img/phone-icon.svg" alt="" class="contact-quick__icon" aria-hidden="true" />
            <span class="contact-quick__text">
              <span class="contact-quick__title">03-XXXX-XXXXにかける</span>
              <span class="contact-quick__sub">受付時間　平日 9:00〜18:00</span>
            </span>
            <span class="contact-quick__chev" aria-hidden="true">
              <svg viewBox="0 0 10 18" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="2,2 9,9 2,16"/></svg>
            </span>
          </a>
          <a href="#" class="contact-quick__box contact-quick__box--line" data-reveal data-reveal-delay="1">
            <img src="<?php echo $s; ?>/contact/img/line-icon.svg" alt="" class="contact-quick__icon" aria-hidden="true" />
            <span class="contact-quick__text">
              <span class="contact-quick__title">更新LINEを追加する</span>
              <span class="contact-quick__sub">※LINEアカウントの[友達追加]<br />またはQRコードから追加ください。</span>
            </span>
            <span class="contact-quick__chev" aria-hidden="true">
              <svg viewBox="0 0 10 18" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="2,2 9,9 2,16"/></svg>
            </span>
          </a>
        </div>

        <!-- Steps -->
        <div class="contact-steps" aria-hidden="true" data-reveal>
          <div class="contact-step contact-step--active">
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
          <div class="contact-step">
            <span class="contact-step__circle">
              <span class="contact-step__num">03</span>
              <span class="contact-step__label">完了</span>
            </span>
          </div>
        </div>

        <!-- Form intro -->
        <div class="contact-form__intro" data-reveal>
          <p class="contact-form__intro-lead">以下のフォームに必要事項を入力し、「内容を確認する」ボタンを押してください。</p>
          <p class="contact-form__intro-note">
            入力いただいたメールアドレス宛てに、弊社担当よりご連絡させていただきます。<br />
            個人情報の取り扱いについて、詳しくは<a href="#">こちら</a>をご覧ください。
          </p>
        </div>

        <!-- Form -->
        <form class="contact-form" action="#" method="post" novalidate data-reveal>
          <div class="contact-form__row">
            <label class="contact-form__label" for="cf-name">名前<span class="req">*</span></label>
            <div class="contact-form__field">
              <input type="text" id="cf-name" name="name" placeholder="山田　花子" required />
            </div>
          </div>
          <div class="contact-form__row">
            <label class="contact-form__label" for="cf-kana">ふりがな<span class="req">*</span></label>
            <div class="contact-form__field">
              <input type="text" id="cf-kana" name="kana" placeholder="やまだ　はなこ" required />
            </div>
          </div>
          <div class="contact-form__row">
            <label class="contact-form__label" for="cf-tel">電話番号<span class="req">*</span></label>
            <div class="contact-form__field">
              <input type="tel" id="cf-tel" name="tel" placeholder="xxx-xxxx-xxxxx" required />
            </div>
          </div>
          <div class="contact-form__row">
            <label class="contact-form__label" for="cf-email">メールアドレス<span class="req">*</span></label>
            <div class="contact-form__field">
              <input type="email" id="cf-email" name="email" placeholder="xxx@xxxxxxxxxx.co.jp" required />
            </div>
          </div>
          <div class="contact-form__row">
            <label class="contact-form__label" for="cf-type">お問い合わせ種別<span class="req">*</span></label>
            <div class="contact-form__field">
              <input type="text" id="cf-type" name="type" placeholder="東京都品川区豊町１丁目10" required />
            </div>
          </div>
          <div class="contact-form__row">
            <label class="contact-form__label" for="cf-message">ご質問・その他</label>
            <div class="contact-form__field">
              <textarea id="cf-message" name="message" placeholder="お問い合わせ内容をご記入ください" required></textarea>
            </div>
          </div>

          <div class="contact-form__submit">
            <a href="<?php echo esc_url( ludoa_url( 'contact-confirm' ) ); ?>" class="detail-btn">
              <span class="detail-btn__edge detail-btn__edge--t" aria-hidden="true"></span>
              <span class="detail-btn__edge detail-btn__edge--b" aria-hidden="true"></span>
              <span class="detail-btn__edge detail-btn__edge--l" aria-hidden="true"></span>
              <span class="detail-btn__edge detail-btn__edge--r" aria-hidden="true"></span>
              <span class="detail-btn__accent" aria-hidden="true"></span>
              <span class="detail-btn__label">内容を確認する</span>
            </a>
          </div>
        </form>
      </div>
    </section>

    <?php get_template_part( 'template-parts/cta' ); ?>
  </main>
<?php
get_footer();
