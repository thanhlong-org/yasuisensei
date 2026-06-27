<?php
/**
 * Header template.
 *
 * @package Ludoa
 */
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="大自然阿蘇 健康の森 — 世界最高水準の総合予防医療施設。定年退職後の新しい健康習慣を提案する滞在型健康増進プログラム。" />

  <!-- hreflang alternates (single-page, query-param strategy) -->
  <link rel="alternate" hreflang="ja" href="?lang=ja" />
  <link rel="alternate" hreflang="zh-Hant" href="?lang=zh-Hant" />
  <link rel="alternate" hreflang="ko" href="?lang=ko" />
  <link rel="alternate" hreflang="en" href="?lang=en" />
  <link rel="alternate" hreflang="x-default" href="?lang=ja" />

  <!-- Open Graph -->
  <meta property="og:title" content="大自然阿蘇 健康の森" />
  <meta property="og:description" content="世界最高水準の総合予防医療施設。" />
  <meta property="og:type" content="website" />

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
  <!-- ============================================================
       HEADER  (→ tương lai: header.php của WordPress)
       ============================================================ -->
  <header class="site-header" id="siteHeader">
    <div class="site-header__inner">
      <a href="#top" class="logo" aria-label="大自然阿蘇 健康の森">
        <span>大自然</span><span class="logo__aso">阿蘇</span><span> 健康の森</span>
      </a>

      <!-- Nav PC -->
      <nav class="nav-pc" aria-label="メインナビゲーション">
        <ul class="nav-pc__list">
          <li><a href="#program" data-i18n="nav.program">健康プログラムの詳細</a></li>
          <li><a href="#pricing" data-i18n="nav.pricing">ご宿泊プランと料金</a></li>
          <li><a href="#access" data-i18n="nav.access">アクセス</a></li>
          <li><a href="#faq" data-i18n="nav.faq">よくある質問</a></li>
        </ul>
      </nav>

      <div class="header-actions">
        <!-- お問合せ (PC) → mở modal liên hệ (làm sau) -->
        <a href="#" class="btn btn-outline header-contact js-contact" data-i18n="header.contact">お問合せ</a>

        <!-- Dropdown ngôn ngữ -->
        <div class="lang" data-lang>
          <button type="button" class="btn btn-outline lang__toggle" aria-haspopup="true" aria-expanded="false">
            <span class="lang__label">JP</span><span class="lang__caret">▼</span>
          </button>
          <ul class="lang__menu" role="menu" hidden>
            <li role="none"><button type="button" role="menuitem" class="lang__item is-active" data-lang-code="ja">日本語</button></li>
            <li role="none"><button type="button" role="menuitem" class="lang__item" data-lang-code="en">English</button></li>
            <li role="none"><button type="button" role="menuitem" class="lang__item" data-lang-code="zh-Hant">中文（繁体）</button></li>
            <li role="none"><button type="button" role="menuitem" class="lang__item" data-lang-code="ko">한국어</button></li>
          </ul>
        </div>

        <!-- ご予約はこちら → BOOKING_URL -->
        <a href="#" class="btn btn-reserve js-reserve" data-i18n="header.reserve">ご予約はこちら</a>

        <!-- Hamburger (SP) -->
        <button type="button" class="hamburger js-drawer-open" aria-label="メニューを開く" aria-controls="drawer" aria-expanded="false">
          <span></span><span></span><span></span>
        </button>
      </div>
    </div>
  </header>
