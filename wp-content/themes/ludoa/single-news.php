<?php
/**
 * Single: お知らせ詳細 (news CPT)
 * Layout from html_asset/infomation/year-end/index.html — data from the news post.
 *
 * @package Ludoa
 */
get_header();

the_post();
$archive_url = get_post_type_archive_link( 'news' );
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
            <a href="<?php echo esc_url( $archive_url ); ?>">お知らせ</a>
          </li>
          <li>
            <span class="breadcrumb__sep" aria-hidden="true">
              <svg viewBox="0 0 10 10" width="10" height="10" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="3,1 7,5 3,9"/></svg>
            </span>
            <span class="breadcrumb__current" aria-current="page"><?php the_title(); ?></span>
          </li>
        </ol>
      </nav>
    </section>

    <!-- ============ お知らせ詳細 (News detail) ============ -->
    <section class="news-detail" aria-label="お知らせ詳細">
      <article class="news-detail__inner" data-reveal>
        <span class="nd-frame nd-frame--tline" aria-hidden="true"></span>
        <span class="nd-frame nd-frame--bline" aria-hidden="true"></span>
        <span class="nd-frame nd-frame--tl" aria-hidden="true"></span>
        <span class="nd-frame nd-frame--br" aria-hidden="true"></span>
        <span class="nd-frame nd-frame--star-tr" aria-hidden="true"></span>
        <span class="nd-frame nd-frame--star-bl" aria-hidden="true"></span>

        <div class="news-detail__body">
          <div class="news-detail__meta">
            <time class="news-detail__date" datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time>
            <span class="news-detail__tag"><?php echo esc_html( ludoa_news_tag() ); ?></span>
          </div>
          <h2 class="news-detail__title"><?php the_title(); ?></h2>
          <div class="news-detail__text">
            <?php the_content(); ?>
          </div>
        </div>
      </article>

      <div class="news-detail__back">
        <a href="<?php echo esc_url( $archive_url ); ?>" class="detail-btn">
          <span class="detail-btn__edge detail-btn__edge--t" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--b" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--l" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--r" aria-hidden="true"></span>
          <span class="detail-btn__accent" aria-hidden="true"></span>
          <span class="detail-btn__label">お知らせ一覧に戻る</span>
        </a>
      </div>
    </section>

    <?php get_template_part( 'template-parts/cta' ); ?>
  </main>
<?php
get_footer();
