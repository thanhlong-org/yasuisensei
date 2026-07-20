<?php
/**
 * Archive: 事例紹介 (case CPT)
 * Layout from html_asset/case/index.html — data from the case post type.
 *
 * @package Ludoa
 */
get_header();
?>
<main>
    <!-- ============ PAGE BANNER (FV) ============ -->
    <section class="page-banner" aria-label="事例紹介">
      <div class="page-banner__media" aria-hidden="true">
        <div class="page-banner__photo" role="img" aria-label="打ち合わせの様子"></div>
        <div class="page-banner__scroll">
          <span class="page-banner__scroll-line"></span>
          <span class="page-banner__scroll-text">SCROLL</span>
        </div>
      </div>

      <div class="page-banner__inner">
        <p class="page-banner__en" aria-hidden="true" data-reveal>Case</p>
        <h1 class="page-banner__jp" data-reveal data-reveal-delay="1">事例紹介</h1>
        <p class="page-banner__lead" data-reveal data-reveal-delay="2">
          未来への成長を支えた、<br />
          パートナーシップの記録。
        </p>
      </div>

      <nav class="page-banner__breadcrumb" aria-label="パンくずリスト" data-reveal data-reveal-delay="3">
        <ol class="breadcrumb">
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">TOP</a></li>
          <li>
            <span class="breadcrumb__sep" aria-hidden="true">
              <svg viewBox="0 0 10 10" width="10" height="10" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="3,1 7,5 3,9"/></svg>
            </span>
            <span class="breadcrumb__current" aria-current="page">事例紹介</span>
          </li>
        </ol>
      </nav>
    </section>

    <!-- ============ 事例紹介 (Case list) ============ -->
    <section class="cs" aria-label="事例紹介一覧">
      <div class="cs__inner">

        <!-- Service filter -->
        <?php
        $cs_current = isset( $_GET['svc'] ) ? sanitize_title( wp_unslash( $_GET['svc'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
        $cs_base    = get_post_type_archive_link( 'case' );
        ?>
        <nav class="cs-filter" aria-label="サービスで絞り込む">
          <a href="<?php echo esc_url( $cs_base ); ?>" class="cs-filter__btn<?php echo $cs_current ? '' : ' is-active'; ?>">すべて</a>
          <?php foreach ( ludoa_services() as $ludoa_service ) : ?>
          <a href="<?php echo esc_url( add_query_arg( 'svc', $ludoa_service->post_name, $cs_base ) ); ?>" class="cs-filter__btn<?php echo $cs_current === $ludoa_service->post_name ? ' is-active' : ''; ?>"><?php echo esc_html( get_the_title( $ludoa_service ) ); ?></a>
          <?php endforeach; ?>
        </nav>

        <div class="cs-list">

          <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
          <article class="cs-item" data-reveal>
            <span class="cs-deco cs-deco--tl" aria-hidden="true"></span>
            <span class="cs-deco cs-deco--tline" aria-hidden="true"></span>
            <span class="cs-deco cs-deco--bline" aria-hidden="true"></span>
            <span class="cs-deco cs-deco--br" aria-hidden="true"></span>
            <span class="cs-deco cs-deco--star-tr" aria-hidden="true"></span>
            <span class="cs-deco cs-deco--star-bl" aria-hidden="true"></span>
            <div class="cs-item__inner">
              <div class="cs-item__image" role="img" aria-label="<?php the_title_attribute(); ?>"<?php echo ludoa_bg_style(); // phpcs:ignore WordPress.Security.EscapeOutput ?>></div>
              <div class="cs-item__body">
                <h3 class="cs-item__title"><?php the_title(); ?></h3>
                <?php $tag = ludoa_case_tag(); ?>
                <?php if ( $tag ) : ?>
                <span class="cs-item__tag"><?php echo esc_html( $tag ); ?></span>
                <?php endif; ?>
                <p class="cs-item__desc"><?php echo esc_html( ludoa_excerpt( 90 ) ); ?></p>
                <div class="cs-item__footer">
                  <span class="cs-item__client"><?php echo esc_html( ludoa_scf( 'case_client' ) ); ?></span>
                  <a href="<?php the_permalink(); ?>" class="detail-btn cs-item__btn">
                    <span class="detail-btn__edge detail-btn__edge--t" aria-hidden="true"></span>
                    <span class="detail-btn__edge detail-btn__edge--b" aria-hidden="true"></span>
                    <span class="detail-btn__edge detail-btn__edge--l" aria-hidden="true"></span>
                    <span class="detail-btn__edge detail-btn__edge--r" aria-hidden="true"></span>
                    <span class="detail-btn__accent" aria-hidden="true"></span>
                    <span class="detail-btn__label">詳しく見る</span>
                  </a>
                </div>
              </div>
            </div>
          </article>
            <?php endwhile; ?>
          <?php else : ?>
          <p class="cs-list__empty">事例はまだありません。</p>
          <?php endif; ?>

        </div>

        <?php ludoa_pager( 'cs-pager' ); ?>
      </div>
    </section>

    <?php get_template_part( 'template-parts/cta' ); ?>
  </main>
<?php
get_footer();
