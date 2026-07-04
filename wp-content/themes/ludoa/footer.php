<?php
/**
 * Footer template — floating page-top, shared site footer, wp_footer().
 * Converted from html_asset/partials/footer.html.
 *
 * @package Ludoa
 */
$ludoa_static = ludoa_static_uri();
?>
  <!-- Floating PAGE TOP -->
  <button type="button" class="page-top-float" id="pageTopFloat" aria-label="ページトップへ戻る">
    <span class="page-top-float__icon" aria-hidden="true"></span>
    <span class="page-top-float__label">PAGE<br />TOP</span>
  </button>

  <!-- ============ FOOTER ============ -->
  <footer class="site-footer" id="site-footer">
    <a href="#site-header" class="page-top" aria-label="ページトップへ">
      <img src="<?php echo esc_url( $ludoa_static ); ?>/assets/img/logo-to-top.svg" alt="" class="page-top__icon" width="60" height="60" aria-hidden="true" />
      <span class="page-top__label">PAGE<br />TOP</span>
    </a>

    <div class="site-footer__inner">
      <div class="site-footer__top">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-footer__logo" aria-label="安井税理士事務所">
          <img src="<?php echo esc_url( $ludoa_static ); ?>/assets/img/logo.svg" alt="安井税理士事務所" class="site-footer__logo-img" width="264" height="48" />
        </a>
      </div>

      <div class="site-footer__main">
        <div class="site-footer__address">
          <p class="site-footer__postal">〒145-0072</p>
          <p class="site-footer__street">
            東京都大田区田園調布本町21-27<br />
            Laguna桜坂102
          </p>
          <div class="site-footer__map">
            <iframe
              src="https://maps.google.com/maps?q=%E6%9D%B1%E4%BA%AC%E9%83%BD%E5%A4%A7%E7%94%B0%E5%8C%BA%E7%94%B0%E5%9C%92%E8%AA%BF%E5%B8%83%E6%9C%AC%E7%94%BA21-27&t=&z=16&ie=UTF8&iwloc=&output=embed"
              title="事務所の地図"
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              allowfullscreen></iframe>
          </div>
        </div>

        <nav class="site-footer__sitemap" aria-label="フッターナビゲーション">
          <div class="sitemap__top-row">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="sitemap__title">TOP</a>
          </div>

          <div class="sitemap__cols">
            <div class="sitemap__col sitemap__col--service-h">
              <a href="<?php echo esc_url( ludoa_url( 'service' ) ); ?>" class="sitemap__title">サービス</a>
            </div>
            <ul class="sitemap__col sitemap__sub sitemap__col--service-s">
              <li><a href="<?php echo esc_url( ludoa_url( 'service' ) ); ?>">月次給与・賞与計算</a></li>
              <li><a href="<?php echo esc_url( ludoa_url( 'service' ) ); ?>">起業・スタートアップ支援</a></li>
              <li><a href="<?php echo esc_url( ludoa_url( 'service' ) ); ?>">決算・記帳代行</a></li>
              <li><a href="<?php echo esc_url( ludoa_url( 'service' ) ); ?>">確定申告代行</a></li>
              <li><a href="<?php echo esc_url( ludoa_url( 'service' ) ); ?>">税務顧問</a></li>
              <li><a href="<?php echo esc_url( ludoa_url( 'service' ) ); ?>">節税対策</a></li>
            </ul>
            <div class="sitemap__col sitemap__col--company-h">
              <a href="<?php echo esc_url( home_url( '/#company' ) ); ?>" class="sitemap__title">企業情報</a>
            </div>
            <ul class="sitemap__col sitemap__sub sitemap__col--company-s">
              <li><a href="<?php echo esc_url( ludoa_url( 'features' ) ); ?>">私たちの強み</a></li>
              <li><a href="<?php echo esc_url( ludoa_url( 'message' ) ); ?>">代表あいさつ</a></li>
              <li><a href="<?php echo esc_url( ludoa_url( 'office' ) ); ?>">事務所概要</a></li>
            </ul>
            <div class="sitemap__standalone">
              <a href="<?php echo esc_url( ludoa_url( 'case' ) ); ?>" class="sitemap__title">事例紹介</a>
              <a href="<?php echo esc_url( ludoa_url( 'infomation' ) ); ?>" class="sitemap__title">お知らせ</a>
              <a href="<?php echo esc_url( ludoa_url( 'privacy' ) ); ?>" class="sitemap__title sitemap__privacy-sp">プライバシーポリシー</a>
            </div>
          </div>
        </nav>
      </div>

      <div class="site-footer__bottom">
        <a href="<?php echo esc_url( ludoa_url( 'privacy' ) ); ?>" class="site-footer__privacy">プライバシーポリシー</a>
        <p class="site-footer__copy">©2025 Yasui Tax Co. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>
