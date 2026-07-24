<?php
/**
 * Header template — site <head>, opening <body> and the shared site header.
 * Converted from html_asset/partials/header.html.
 *
 * @package Ludoa
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php wp_head(); // description / OGP / icons injected via inc/seo.php ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
  <!-- ============ LOADER (home: every load / other pages: first visit per session) ============ -->
  <?php if ( ! is_front_page() ) : ?>
  <script>try{if(sessionStorage.getItem('ludoaLoaderShown'))document.documentElement.classList.add('ludoa-no-loader');}catch(e){}</script>
  <?php endif; ?>
  <noscript><style>.ludoa-loader{display:none}html{overflow:auto!important}</style></noscript>
  <?php
  $ludoa_star_svg = '<svg viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M0 9.34003C8.28596 9.88522 11.2145 5.76758 12.9027 0C12.8338 1.26255 12.8165 2.53945 12.6959 3.80201C12.3342 7.6901 13.0405 8.39311 17.795 8.76614C18.553 8.82353 19.3109 8.86657 20 8.90961C17.0543 10.0574 13.4022 10.66 11.4384 12.4964C9.44014 14.3759 9.0956 17.4749 7.57967 20C7.82084 18.2066 8.02756 16.3989 8.32041 14.6198C8.81998 11.5782 7.44186 9.95696 3.56589 9.94261C2.37726 9.94261 1.20586 9.56958 0.0344538 9.35438L0 9.34003Z"/></svg>';
  ?>
  <div class="ludoa-loader" id="ludoa-loader" aria-hidden="true">
    <div class="ludoa-loader__panel ludoa-loader__panel--t"></div>
    <div class="ludoa-loader__panel ludoa-loader__panel--b"></div>
    <div class="ludoa-loader__body">
      <span class="ludoa-loader__star"><?php echo $ludoa_star_svg; // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
      <img class="ludoa-loader__logo" src="<?php echo esc_url( ludoa_static_uri() ); ?>/assets/img/logo.svg" alt="" width="307" height="56" />
      <p class="ludoa-loader__tagline">
        <?php
        $ludoa_tagline = '守りの税務から、攻めの経営へ。';
        $ludoa_len     = mb_strlen( $ludoa_tagline );
        for ( $ludoa_i = 0; $ludoa_i < $ludoa_len; $ludoa_i++ ) {
          printf( '<span style="--d:%d">%s</span>', (int) $ludoa_i, esc_html( mb_substr( $ludoa_tagline, $ludoa_i, 1 ) ) );
        }
        ?>
      </p>
      <span class="ludoa-loader__bar"><span class="ludoa-loader__bar-fill"></span></span>
      <span class="ludoa-loader__spark ludoa-loader__spark--1"><?php echo $ludoa_star_svg; // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
      <span class="ludoa-loader__spark ludoa-loader__spark--2"><?php echo $ludoa_star_svg; // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
    </div>
  </div>

  <!-- ============ HEADER ============ -->
  <header class="site-header" id="site-header">
    <div class="site-header__inner">
      <!-- Logo -->
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" aria-label="安井税理士事務所 トップへ">
        <img src="<?php echo esc_url( ludoa_static_uri() ); ?>/assets/img/logo.svg" alt="安井税理士事務所" class="site-logo__img" width="264" height="48" />
      </a>

      <!-- Main navigation (PC) -->
      <nav class="site-nav" id="site-nav" aria-label="メインナビゲーション">
        <ul class="site-nav__list">
          <li><a href="<?php echo esc_url( ludoa_url( 'features' ) ); ?>">私たちの強み</a></li>
          <li><a href="<?php echo esc_url( get_post_type_archive_link( 'service' ) ); ?>">サービス</a></li>
          <li><a href="<?php echo esc_url( ludoa_url( 'company' ) ); ?>">企業情報</a></li>
          <li><a href="<?php echo esc_url( get_post_type_archive_link( 'case' ) ); ?>">事例紹介</a></li>
          <li><a href="<?php echo esc_url( get_post_type_archive_link( 'news' ) ); ?>">お知らせ</a></li>
        </ul>
      </nav>

      <!-- Right cluster: TEL block + CTA button (PC) -->
      <div class="site-header__actions">
        <div class="site-header__tel">
          <a href="<?php echo esc_attr( ludoa_tel_href() ); ?>" class="site-header__tel--tel">TEL<span class="site-header__tel--num"><?php echo esc_html( ludoa_tel_display() ); ?></span></a>
          <p class="site-header__tel-hours">受付時間：平日9:00〜18:00</p>
        </div>
        <a href="<?php echo esc_url( ludoa_url( 'contact' ) ); ?>" class="header-cta-btn">お問い合わせ</a>
      </div>

      <!-- Icon cluster + hamburger (SP only) -->
      <div class="site-header__sp-actions" aria-hidden="false">
        <a href="<?php echo esc_attr( ludoa_tel_href() ); ?>" class="sp-icon-btn" aria-label="電話する">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
          </svg>
        </a>
        <a href="<?php echo esc_url( ludoa_line_url() ); ?>" class="sp-icon-btn" aria-label="LINEで問い合わせ"<?php echo '#' !== ludoa_line_url() ? ' target="_blank" rel="noopener"' : ''; ?>>
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
          </svg>
        </a>
        <a href="<?php echo esc_url( ludoa_url( 'contact' ) ); ?>" class="sp-icon-btn" aria-label="メールで問い合わせ">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
            <polyline points="22,6 12,13 2,6"/>
          </svg>
        </a>
        <button type="button" class="hamburger" id="hamburger" aria-label="メニューを開く" aria-controls="sp-menu" aria-expanded="false">
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>
    </div>
  </header>

  <!-- ============ SP TOGGLE MENU (Figma 3357:124) ============ -->
  <nav class="sp-menu" id="sp-menu" aria-label="モバイルメニュー" aria-hidden="true">
    <button type="button" class="sp-menu__close" id="spMenuClose" aria-label="メニューを閉じる">
      <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"><line x1="5" y1="5" x2="19" y2="19"/><line x1="19" y1="5" x2="5" y2="19"/></svg>
    </button>

    <img class="sp-menu__watermark" src="<?php echo esc_url( ludoa_static_uri() ); ?>/assets/img/logo-icon.svg" alt="" aria-hidden="true" />

    <div class="sp-menu__scroll">
      <!-- サービス -->
      <div class="sp-menu__group">
        <a class="sp-menu__head" href="<?php echo esc_url( get_post_type_archive_link( 'service' ) ); ?>">
          <span class="sp-menu__head-title">サービス</span>
          <span class="sp-menu__head-box" aria-hidden="true"><svg viewBox="0 0 10 16" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><polyline points="2,2 8,8 2,14"/></svg></span>
        </a>
        <ul class="sp-menu__sub">
          <?php foreach ( ludoa_services() as $ludoa_service ) : ?>
          <li><a href="<?php echo esc_url( get_permalink( $ludoa_service ) ); ?>"><?php echo esc_html( get_the_title( $ludoa_service ) ); ?><span class="sp-menu__chev" aria-hidden="true"><svg viewBox="0 0 8 14" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"><polyline points="1.5,1.5 6.5,7 1.5,12.5"/></svg></span></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- 企業情報 -->
      <div class="sp-menu__group">
        <a class="sp-menu__head" href="<?php echo esc_url( ludoa_url( 'company' ) ); ?>">
          <span class="sp-menu__head-title">企業情報</span>
          <span class="sp-menu__head-box" aria-hidden="true"><svg viewBox="0 0 10 16" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><polyline points="2,2 8,8 2,14"/></svg></span>
        </a>
        <ul class="sp-menu__sub">
          <li><a href="<?php echo esc_url( ludoa_url( 'features' ) ); ?>">私たちの強み<span class="sp-menu__chev" aria-hidden="true"><svg viewBox="0 0 8 14" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"><polyline points="1.5,1.5 6.5,7 1.5,12.5"/></svg></span></a></li>
          <li><a href="<?php echo esc_url( ludoa_url( 'message' ) ); ?>">代表あいさつ<span class="sp-menu__chev" aria-hidden="true"><svg viewBox="0 0 8 14" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"><polyline points="1.5,1.5 6.5,7 1.5,12.5"/></svg></span></a></li>
          <li><a href="<?php echo esc_url( ludoa_url( 'office' ) ); ?>">事務所概要<span class="sp-menu__chev" aria-hidden="true"><svg viewBox="0 0 8 14" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"><polyline points="1.5,1.5 6.5,7 1.5,12.5"/></svg></span></a></li>
        </ul>
      </div>

      <!-- 事例紹介 -->
      <div class="sp-menu__single">
        <a class="sp-menu__head" href="<?php echo esc_url( get_post_type_archive_link( 'case' ) ); ?>">
          <span class="sp-menu__head-title">事例紹介</span>
          <span class="sp-menu__head-box" aria-hidden="true"><svg viewBox="0 0 10 16" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><polyline points="2,2 8,8 2,14"/></svg></span>
        </a>
      </div>

      <!-- お知らせ -->
      <div class="sp-menu__single">
        <a class="sp-menu__head" href="<?php echo esc_url( get_post_type_archive_link( 'news' ) ); ?>">
          <span class="sp-menu__head-title">お知らせ</span>
          <span class="sp-menu__head-box" aria-hidden="true"><svg viewBox="0 0 10 16" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><polyline points="2,2 8,8 2,14"/></svg></span>
        </a>
      </div>

      <!-- CTA + TEL -->
      <div class="sp-menu__foot">
        <a href="<?php echo esc_url( ludoa_url( 'contact' ) ); ?>" class="sp-menu__cta">お問い合わせはこちら</a>
        <a href="<?php echo esc_attr( ludoa_tel_href() ); ?>" class="sp-menu__tel">TEL<span class="sp-menu__tel-num"><?php echo esc_html( ludoa_tel_display() ); ?></span></a>
        <p class="sp-menu__hours">受付時間：平日9:00〜18:00</p>
      </div>
    </div>
  </nav>
