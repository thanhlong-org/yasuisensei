<?php
/**
 * Archive: お知らせ (news CPT)
 * Layout from html_asset/infomation/index.html — data from the news post type.
 *
 * @package Ludoa
 */
get_header();
?>
<main>
    <!-- ============ PAGE BANNER (FV) ============ -->
    <section class="page-banner" aria-label="お知らせ">
      <div class="page-banner__media" aria-hidden="true">
        <div class="page-banner__photo" role="img" aria-label="都市の風景"></div>
        <div class="page-banner__scroll">
          <span class="page-banner__scroll-line"></span>
          <span class="page-banner__scroll-text">SCROLL</span>
        </div>
      </div>

      <div class="page-banner__inner">
        <p class="page-banner__en" aria-hidden="true" data-reveal>Infomation</p>
        <h1 class="page-banner__jp" data-reveal data-reveal-delay="1">お知らせ</h1>
        <p class="page-banner__lead" data-reveal data-reveal-delay="2">
          日々の動きと重要なお知らせを届ける、<br />
          インフォメーション。
        </p>
      </div>

      <nav class="page-banner__breadcrumb" aria-label="パンくずリスト" data-reveal data-reveal-delay="3">
        <ol class="breadcrumb">
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">TOP</a></li>
          <li>
            <span class="breadcrumb__sep" aria-hidden="true">
              <svg viewBox="0 0 10 10" width="10" height="10" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="3,1 7,5 3,9"/></svg>
            </span>
            <span class="breadcrumb__current" aria-current="page">お知らせ</span>
          </li>
        </ol>
      </nav>
    </section>

    <!-- ============ お知らせ一覧 (News list) ============ -->
    <section class="news" aria-label="お知らせ一覧">
      <div class="news__inner">
        <div class="news__list">
          <?php if ( have_posts() ) : ?>
            <?php $delay = 0; ?>
            <?php while ( have_posts() ) : the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="news-item" data-reveal<?php echo $delay ? ' data-reveal-delay="' . esc_attr( min( $delay, 3 ) ) . '"' : ''; ?>>
            <p class="news-item__date"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?> ｜ <?php the_title(); ?></p>
            <span class="news-item__tag"><?php echo esc_html( ludoa_news_tag() ); ?></span>
            <p class="news-item__desc"><?php echo esc_html( ludoa_excerpt( 60 ) ); ?></p>
            <span class="news-item__line" aria-hidden="true"></span>
            <span class="news-item__accent" aria-hidden="true"></span>
          </a>
            <?php $delay++; ?>
            <?php endwhile; ?>
          <?php else : ?>
          <p class="news__empty">お知らせはまだありません。</p>
          <?php endif; ?>
        </div>

        <?php ludoa_pager( 'news-pager' ); ?>
      </div>
    </section>

    <?php get_template_part( 'template-parts/cta' ); ?>
  </main>
<?php
get_footer();
