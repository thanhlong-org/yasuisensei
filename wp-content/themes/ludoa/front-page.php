<?php
/**
 * Template: ホーム
 * Converted from html_asset/index.html
 *
 * @package Ludoa
 */
get_header();
$s = ludoa_static_uri();
?>
<main>
    <!-- ============ HERO / FV ============ -->
    <section class="hero" id="hero" aria-label="First view">
      <!-- Background image (right ~75%) -->
      <div class="hero__bg" role="img" aria-label="高層ビルの空に向かって伸びる景観"></div>

      <!-- Slogan + English tagline (overlay).
           HTML order: tagline first, then title — matches SP stacking.
           On PC both are position:absolute so document order is irrelevant. -->
      <div class="hero__inner">
        <!-- SCROLL indicator (left edge) -->
        <div class="hero__scroll" aria-hidden="true">
          <span class="hero__scroll-line"></span>
          <span class="hero__scroll-text">SCROLL</span>
        </div>
        <p class="hero__tagline">
          Partnering with you for the next<br />
          decade of success.<br />
          — Yasui Tax Accounting Office
        </p>

        <h1 class="hero__title">
          <span class="hero__title-line"><span class="hero__title-text">守りの税務から、</span></span>
          <span class="hero__title-line hero__title-line--indent"><span class="hero__title-text">攻めの経営へ。</span></span>
        </h1>
      </div>
    </section>

    <!-- ============ FEATURES (三つのお約束) ============ -->
    <section class="features" id="features" aria-labelledby="features-title">
      <div class="features__inner">
        <h2 class="features__heading" data-reveal>
          <span class="features__heading-en" aria-hidden="true">Features</span>
          <span class="features__heading-jp" id="features-title">
            私たちの強み <span class="features__heading-sub">-3つのお約束-</span>
          </span>
        </h2>

        <!-- 3-circle Venn diagram -->
        <div class="features__venn" role="img" aria-label="3つの約束のベン図" data-reveal data-reveal-delay="1">
          <div class="venn-circle venn-circle--01">
            <span class="venn-circle__shine" aria-hidden="true"></span>
            <p class="venn-circle__promise">Promise</p>
            <p class="venn-circle__num">01</p>
            <p class="venn-circle__desc">「徹底した対話」で、<br />不安を安心に変えます</p>
          </div>
          <div class="venn-circle venn-circle--02">
            <span class="venn-circle__shine" aria-hidden="true"></span>
            <p class="venn-circle__promise">Promise</p>
            <p class="venn-circle__num">02</p>
            <p class="venn-circle__desc">「迅速なレスポンス」で、<br />経営のスピードを止めません</p>
          </div>
          <div class="venn-circle venn-circle--03">
            <span class="venn-circle__shine" aria-hidden="true"></span>
            <p class="venn-circle__promise">Promise</p>
            <p class="venn-circle__num">03</p>
            <p class="venn-circle__desc">「一歩先の提案」で、<br />共に未来を創ります</p>
          </div>
        </div>

        <!-- Description text (extra <br> for SP-only break) -->
        <p class="features__desc">
          安井税理士事務所は、経営者様が抱える<br />
          「言葉の壁」「時間の壁」「未来への壁」<br class="features__br--sp" />を取り払うために、<br />
          3つのルールを徹底しています。
        </p>
        <p class="features__desc">
          決断の連続である経営者様を一人で悩ませないよう、<br />
          迅速な回答で不安を即座に解消し、<br />
          常に伴走し続ける安心感をご提供します。
        </p>

        <a href="<?php echo esc_url( ludoa_url( 'features' ) ); ?>" class="detail-btn features__btn">
          <span class="detail-btn__edge detail-btn__edge--t" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--b" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--l" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--r" aria-hidden="true"></span>
          <span class="detail-btn__accent" aria-hidden="true"></span>
          <span class="detail-btn__label">詳しく見る</span>
        </a>
      </div>
    </section>

    <!-- ============ SERVICE + CASE (shared gradient wrapper) ============ -->
    <div class="service-case-bg">

    <!-- ============ SERVICE ============ -->
    <section class="service" id="service" aria-labelledby="service-title" data-reveal>
      <div class="service__inner">
        <h2 class="service__heading" data-reveal>
          <span class="service__heading-en" aria-hidden="true">Service</span>
          <span class="service__heading-jp" id="service-title">サービス</span>
        </h2>

        <!-- Decorative logo behind list (opacity 0.1) -->
        <img src="<?php echo $s; ?>/assets/img/logo-icon.svg" alt="" class="service__logo-deco" aria-hidden="true" />

        <!-- Top-right button: View case list -->
        <a href="<?php echo esc_url( get_post_type_archive_link( 'service' ) ); ?>" class="detail-btn service__btn">
          <span class="detail-btn__edge detail-btn__edge--t" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--b" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--l" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--r" aria-hidden="true"></span>
          <span class="detail-btn__accent detail-btn__accent--highlight" aria-hidden="true"></span>
          <span class="detail-btn__label">サービス一覧を見る</span>
        </a>

        <!-- Consultant image (left) -->
        <div class="service__image" role="img" aria-label="コンサルティングの様子"></div>

        <!-- Description text (below image, left column) -->
        <p class="service__desc">
          税務顧問とは、税金の申告や会計処理だけでなく、<br />
          事業運営に関するさまざまな課題を継続的にサポートする<br />
          サービスです。気軽に相談できる身近なパートナーとして、<br />
          お客様の事業を支えます。
        </p>

        <!-- Decorative frame around the service list:
             top-left slash + top line, bottom line + bottom-right slash + stars -->
        <span class="service__deco service__deco--top-line" aria-hidden="true"></span>
        <span class="service__deco service__deco--bottom-line" aria-hidden="true"></span>
        <span class="service__deco service__deco--slash-tl" aria-hidden="true"></span>
        <span class="service__deco service__deco--slash-br" aria-hidden="true"></span>
        <span class="service__deco service__deco--star-tr" aria-hidden="true"></span>
        <span class="service__deco service__deco--star-bl" aria-hidden="true"></span>

        <!-- Service items list (right column / SP center) -->
        <ul class="service__list">
          <?php $sv_imgs = array( 'service-consultant.png', 'sv2.png', 'sv3.png', 'sv4.png', 'sv5.png', 'sv6.png' ); ?>
          <?php foreach ( ludoa_services() as $i => $ludoa_service ) : ?>
          <li class="service-item" data-reveal data-sv-img="<?php echo esc_url( "$s/assets/img/home-sv/" . $sv_imgs[ $i % 6 ] ); ?>">
            <span class="service-item__num"><?php echo esc_html( str_pad( (string) ( $i + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
            <span class="service-item__name"><?php echo esc_html( get_the_title( $ludoa_service ) ); ?></span>
            <span class="service-item__en"><?php echo esc_html( ludoa_scf( 'service_en', $ludoa_service->ID ) ); ?></span>
            <span class="service-item__accent" aria-hidden="true"></span>
            <a href="<?php echo esc_url( get_permalink( $ludoa_service ) ); ?>" class="service-item__cover" aria-label="<?php echo esc_attr( get_the_title( $ludoa_service ) ); ?>"></a>
          </li>
          <?php endforeach; ?>
        </ul>

        <!-- SP-only button at bottom -->
        <a href="<?php echo esc_url( get_post_type_archive_link( 'service' ) ); ?>" class="detail-btn service__btn-sp">
          <span class="detail-btn__edge detail-btn__edge--t" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--b" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--l" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--r" aria-hidden="true"></span>
          <span class="detail-btn__accent detail-btn__accent--highlight" aria-hidden="true"></span>
          <span class="detail-btn__label">サービス一覧を見る</span>
        </a>
      </div>
    </section>

    <!-- ============ CASE (事例紹介) ============ -->
    <section class="case" id="case" aria-labelledby="case-title">
      <div class="case__inner">
        <h2 class="case__heading" data-reveal>
          <span class="case__heading-en" aria-hidden="true">Case</span>
          <span class="case__heading-jp" id="case-title">事例紹介</span>
        </h2>

        <!-- Top-right button -->
        <a href="<?php echo esc_url( get_post_type_archive_link( 'case' ) ); ?>" class="detail-btn case__btn">
          <span class="detail-btn__edge detail-btn__edge--t" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--b" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--l" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--r" aria-hidden="true"></span>
          <span class="detail-btn__accent detail-btn__accent--highlight" aria-hidden="true"></span>
          <span class="detail-btn__label">事例一覧を見る</span>
        </a>

        <!-- Case items — latest 3 posts of the case CPT -->
        <?php
        $front_cases = new WP_Query(
            array(
                'post_type'      => 'case',
                'posts_per_page' => 3,
                'no_found_rows'  => true,
            )
        );
        ?>
        <ul class="case__list">
          <?php $delay = 0; ?>
          <?php while ( $front_cases->have_posts() ) : $front_cases->the_post(); ?>
          <li class="case-item" data-reveal<?php echo $delay ? ' data-reveal-delay="' . esc_attr( $delay ) . '"' : ''; ?>>
            <span class="case-deco case-deco--tl" aria-hidden="true"></span>
            <span class="case-deco case-deco--tline" aria-hidden="true"></span>
            <span class="case-deco case-deco--bline" aria-hidden="true"></span>
            <span class="case-deco case-deco--br" aria-hidden="true"></span>
            <img src="<?php echo $s; ?>/assets/img/slossy-icon.svg" alt="" class="case-deco case-deco--star-tr" aria-hidden="true" />
            <img src="<?php echo $s; ?>/assets/img/slossy-icon.svg" alt="" class="case-deco case-deco--star-bl" aria-hidden="true" />

            <div class="case-item__image" role="img" aria-label="<?php the_title_attribute(); ?>"<?php echo ludoa_bg_style(); // phpcs:ignore WordPress.Security.EscapeOutput ?>></div>
            <span class="case-item__tag" aria-hidden="true"></span>
            <h3 class="case-item__title"><?php the_title(); ?></h3>
            <p class="case-item__desc"><?php echo esc_html( ludoa_excerpt( 81 ) ); ?></p>
            <div class="case-item__footer">
              <p class="case-item__client"><?php echo esc_html( ludoa_scf( 'case_client' ) ); ?></p>
              <a href="<?php the_permalink(); ?>" class="detail-btn case-item__btn case-item__btn--light">
                <span class="detail-btn__edge detail-btn__edge--t" aria-hidden="true"></span>
                <span class="detail-btn__edge detail-btn__edge--b" aria-hidden="true"></span>
                <span class="detail-btn__edge detail-btn__edge--l" aria-hidden="true"></span>
                <span class="detail-btn__edge detail-btn__edge--r" aria-hidden="true"></span>
                <span class="detail-btn__accent" aria-hidden="true"></span>
                <span class="detail-btn__label">詳しく見る</span>
              </a>
            </div>
          </li>
          <?php $delay++; ?>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </ul>

        <!-- SP-only bottom button -->
        <a href="<?php echo esc_url( get_post_type_archive_link( 'case' ) ); ?>" class="detail-btn case__btn-sp case-item__btn--light">
          <span class="detail-btn__edge detail-btn__edge--t" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--b" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--l" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--r" aria-hidden="true"></span>
          <span class="detail-btn__accent case__btn-sp-accent" aria-hidden="true"></span>
          <span class="detail-btn__label">事例紹介一覧を見る</span>
        </a>
      </div>
    </section>

    </div><!-- /.service-case-bg -->

    <!-- ============ COMPANY (企業情報) ============ -->
    <section class="company" id="company" aria-labelledby="company-title" data-reveal>
      <div class="company__inner">
        <h2 class="company__heading" data-reveal>
          <span class="company__heading-en" aria-hidden="true">Company</span>
          <span class="company__heading-jp" id="company-title">企業情報</span>
        </h2>

        <div class="company__body" data-reveal>
          <!-- Frame deco -->
          <span class="company__frame company__frame--tline" aria-hidden="true"></span>
          <span class="company__frame company__frame--bline" aria-hidden="true"></span>
          <span class="company__frame company__frame--tl" aria-hidden="true"></span>
          <span class="company__frame company__frame--br" aria-hidden="true"></span>
          <span class="company__frame company__frame--star-tr" aria-hidden="true"></span>
          <span class="company__frame company__frame--star-bl" aria-hidden="true"></span>

          <!-- Intro text (left) -->
          <div class="company__intro" data-reveal>
            <p class="company__intro-p">私たちは、<br />お客様との長期的な信頼関係を何よりも大切にしています。</p>
            <p class="company__intro-p">そのために、どのような想いで日々の業務に向き合い、<br />どのような強みを持ってご支援しているのか。</p>
            <p class="company__intro-p">安心してご相談いただくために、<br />まずは私たちのことを知っていただければ幸いです。</p>
          </div>

          <!-- Link rows (right) — expand to reveal a photo on hover -->
          <ul class="company__list">
            <li class="company-item company-item--01" data-reveal>
              <a href="<?php echo esc_url( ludoa_url( 'features' ) ); ?>" class="company-item__link">
                <span class="company-item__media" aria-hidden="true"></span>
                <span class="company-item__line company-item__line--top" aria-hidden="true"></span>
                <span class="company-item__bar-top" aria-hidden="true"></span>
                <span class="company-item__text">
                  <span class="company-item__title">私たちの強み</span>
                  <span class="company-item__en">Feature</span>
                </span>
                <span class="company-item__arrow" aria-hidden="true">
                  <img src="<?php echo $s; ?>/assets/img/arrow-icon.svg" alt="" width="40" height="40" />
                </span>
                <span class="company-item__line" aria-hidden="true"></span>
                <span class="company-item__accent" aria-hidden="true"></span>
              </a>
            </li>

            <li class="company-item company-item--02" data-reveal data-reveal-delay="1">
              <a href="<?php echo esc_url( ludoa_url( 'message' ) ); ?>" class="company-item__link">
                <span class="company-item__media" aria-hidden="true"></span>
                <span class="company-item__bar-top" aria-hidden="true"></span>
                <span class="company-item__text">
                  <span class="company-item__title">代表あいさつ</span>
                  <span class="company-item__en">Message</span>
                </span>
                <span class="company-item__arrow" aria-hidden="true">
                  <img src="<?php echo $s; ?>/assets/img/arrow-icon.svg" alt="" width="40" height="40" />
                </span>
                <span class="company-item__line" aria-hidden="true"></span>
                <span class="company-item__accent" aria-hidden="true"></span>
              </a>
            </li>

            <li class="company-item company-item--03" data-reveal data-reveal-delay="2">
              <a href="<?php echo esc_url( ludoa_url( 'office' ) ); ?>" class="company-item__link">
                <span class="company-item__media" aria-hidden="true"></span>
                <span class="company-item__bar-top" aria-hidden="true"></span>
                <span class="company-item__text">
                  <span class="company-item__title">事務所概要</span>
                  <span class="company-item__en">Office</span>
                </span>
                <span class="company-item__arrow" aria-hidden="true">
                  <img src="<?php echo $s; ?>/assets/img/arrow-icon.svg" alt="" width="40" height="40" />
                </span>
                <span class="company-item__line" aria-hidden="true"></span>
                <span class="company-item__accent" aria-hidden="true"></span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </section>

    <!-- ============ INFOMATION (お知らせ) ============ -->
    <section class="info" id="info" aria-labelledby="info-title">
      <div class="info__inner">
        <h2 class="info__heading" data-reveal>
          <span class="info__heading-en" aria-hidden="true">Infomation</span>
          <span class="info__heading-jp" id="info-title">お知らせ</span>
        </h2>

        <!-- Top-right button (PC) -->
        <a href="<?php echo esc_url( get_post_type_archive_link( 'news' ) ); ?>" class="detail-btn info__btn">
          <span class="detail-btn__edge detail-btn__edge--t" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--b" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--l" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--r" aria-hidden="true"></span>
          <span class="detail-btn__accent detail-btn__accent--highlight" aria-hidden="true"></span>
          <span class="detail-btn__label">お知らせ一覧を見る</span>
        </a>

        <!-- Decorative logo (PC, behind list, opacity 0.1) -->
        <img src="<?php echo $s; ?>/assets/img/logo-icon.svg" alt="" class="info__logo-deco" aria-hidden="true" />

        <!-- News rows — latest 3 posts of the news CPT -->
        <?php
        $front_news = new WP_Query(
            array(
                'post_type'      => 'news',
                'posts_per_page' => 3,
                'no_found_rows'  => true,
            )
        );
        ?>
        <ul class="info__list">
          <?php while ( $front_news->have_posts() ) : $front_news->the_post(); ?>
          <li class="info-item">
            <p class="info-item__date"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?> ｜ <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
            <span class="info-item__tag" aria-hidden="true"></span>
            <p class="info-item__desc"><?php echo esc_html( ludoa_excerpt( 30 ) ); ?></p>
            <span class="info-item__line" aria-hidden="true"></span>
            <span class="info-item__accent" aria-hidden="true"></span>
          </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </ul>

        <!-- SP-only bottom button (green accent) -->
        <a href="<?php echo esc_url( get_post_type_archive_link( 'news' ) ); ?>" class="detail-btn info__btn-sp">
          <span class="detail-btn__edge detail-btn__edge--t" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--b" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--l" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--r" aria-hidden="true"></span>
          <span class="detail-btn__accent detail-btn__accent--highlight" aria-hidden="true"></span>
          <span class="detail-btn__label">お知らせ一覧を見る</span>
        </a>
      </div>
    </section>

    <?php get_template_part( 'template-parts/cta' ); ?>
  </main>
<?php
get_footer();
