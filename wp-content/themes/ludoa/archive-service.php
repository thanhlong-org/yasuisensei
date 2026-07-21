<?php
/**
 * Archive: サービス (service CPT)
 * Layout from html_asset/service/index.html — data from the service post type.
 *
 * @package Ludoa
 */
get_header();
$s = ludoa_static_uri();
?>
<main>
    <!-- ============ PAGE BANNER (FV) ============ -->
    <section class="page-banner" aria-label="サービス">
      <div class="page-banner__media" aria-hidden="true">
        <div class="page-banner__photo" role="img" aria-label="会計業務の様子"></div>
        <div class="page-banner__scroll">
          <span class="page-banner__scroll-line"></span>
          <span class="page-banner__scroll-text">SCROLL</span>
        </div>
      </div>

      <div class="page-banner__inner">
        <p class="page-banner__en" aria-hidden="true" data-reveal>Service</p>
        <h1 class="page-banner__jp" data-reveal data-reveal-delay="1">サービス</h1>
        <p class="page-banner__lead" data-reveal data-reveal-delay="2">
          日々の不安を安心に変える、<br />
          充実のサポートラインナップ。
        </p>
      </div>

      <nav class="page-banner__breadcrumb" aria-label="パンくずリスト" data-reveal data-reveal-delay="3">
        <ol class="breadcrumb">
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">TOP</a></li>
          <li>
            <span class="breadcrumb__sep" aria-hidden="true">
              <svg viewBox="0 0 10 10" width="10" height="10" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="3,1 7,5 3,9"/></svg>
            </span>
            <span class="breadcrumb__current" aria-current="page">サービス</span>
          </li>
        </ol>
      </nav>
    </section>

  <div class="service-case-bg">
    <!-- ============ サービス (Service list) ============ -->
    <section class="service" aria-label="サービス内容" data-reveal>
      <div class="service__inner">
        <span class="service__deco service__deco--top-line" aria-hidden="true"></span>
        <span class="service__deco service__deco--bottom-line" aria-hidden="true"></span>
        <span class="service__deco service__deco--slash-tl" aria-hidden="true"></span>
        <span class="service__deco service__deco--slash-br" aria-hidden="true"></span>
        <span class="service__deco service__deco--star-tr" aria-hidden="true"></span>
        <span class="service__deco service__deco--star-bl" aria-hidden="true"></span>
        <img class="service__logo-deco" src="<?php echo $s; ?>/assets/img/logo-icon.svg" alt="" aria-hidden="true" />

        <div class="service__cols">
          <div class="service__left">
            <div class="service__image" role="img" aria-label="コンサルティングの様子"></div>
            <p class="service__desc">税務顧問とは、税金の申告や会計処理だけでなく、<br />事業運営に関するさまざまな課題を継続的にサポートする<br />サービスです。気軽に相談できる身近なパートナーとして、<br />お客様の事業を支えます。</p>
          </div>

          <ul class="service__list">
            <?php if ( have_posts() ) : ?>
              <?php $num = 0; ?>
              <?php $sv_imgs = array( 'service-consultant.png', 'sv2.png', 'sv3.png', 'sv4.png', 'sv5.png', 'sv6.png' ); ?>
              <?php while ( have_posts() ) : the_post(); $num++; ?>
            <li class="service-item" data-reveal data-sv-img="<?php echo esc_url( "$s/assets/img/home-sv/" . $sv_imgs[ ( $num - 1 ) % 6 ] ); ?>">
              <span class="service-item__num"><?php echo esc_html( str_pad( (string) $num, 2, '0', STR_PAD_LEFT ) ); ?></span>
              <span class="service-item__name"><?php the_title(); ?></span>
              <span class="service-item__en"><?php echo esc_html( ludoa_scf( 'service_en' ) ); ?></span>
              <span class="service-item__accent" aria-hidden="true"></span>
              <a href="<?php the_permalink(); ?>" class="service-item__cover" aria-label="<?php the_title_attribute(); ?>"></a>
            </li>
              <?php endwhile; ?>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </section>

    <?php get_template_part( 'template-parts/case' ); ?>
  </div>

    <?php get_template_part( 'template-parts/cta' ); ?>
  </main>
<?php
get_footer();
