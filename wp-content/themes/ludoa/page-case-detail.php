<?php
/**
 * Template: 事例詳細
 * Converted from html_asset/case/detail/index.html
 *
 * @package Ludoa
 */
get_header();
$s = ludoa_static_uri();
?>
<main>
    <!-- ============ HERO (FV) — per-post; banner image is INLINE below ============ -->
    <section class="page-banner" aria-label="事例紹介詳細">
      <div class="page-banner__media" aria-hidden="true">
        <!-- WP: replace the inline url with the post's featured image -->
        <div class="page-banner__photo" role="img" aria-label="お客様の様子"
             style="background-image: url('<?php echo $s; ?>/assets/img/service-01.jpg')"></div>
        <div class="page-banner__scroll">
          <span class="page-banner__scroll-line"></span>
          <span class="page-banner__scroll-text">SCROLL</span>
        </div>
      </div>

      <nav class="page-banner__breadcrumb" aria-label="パンくずリスト" data-reveal>
        <ol class="breadcrumb">
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">TOP</a></li>
          <li>
            <span class="breadcrumb__sep" aria-hidden="true">
              <svg viewBox="0 0 10 10" width="10" height="10" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="3,1 7,5 3,9"/></svg>
            </span>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">事例紹介</a>
          </li>
        </ol>
      </nav>

      <div class="page-banner__inner">
        <div class="cd-hero__overlay">
          <h1 class="cd-hero__title" data-reveal>見出しが入ります見出しが入ります<br />見出しが入ります見出しが入ります</h1>
          <div class="cd-hero__meta" data-reveal data-reveal-delay="1">
            <span class="cd-hero__tag">税務顧問</span>
            <span class="cd-hero__client">株式会社○○様</span>
          </div>
        </div>
      </div>
    </section>

    <!-- ============ 本文 (Body) ============ -->
    <section class="cd-detail" aria-label="事例詳細">
      <article class="cd-detail__inner cd-reveal" data-reveal>
        <span class="cd-frame cd-frame--tline" aria-hidden="true"></span>
        <span class="cd-frame cd-frame--bline" aria-hidden="true"></span>
        <span class="cd-frame cd-frame--tl" aria-hidden="true"></span>
        <span class="cd-frame cd-frame--br" aria-hidden="true"></span>
        <span class="cd-frame cd-frame--star-tr" aria-hidden="true"><svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M0 9.34003C8.28596 9.88522 11.2145 5.76758 12.9027 0C12.8338 1.26255 12.8165 2.53945 12.6959 3.80201C12.3342 7.6901 13.0405 8.39311 17.795 8.76614C18.553 8.82353 19.3109 8.86657 20 8.90961C17.0543 10.0574 13.4022 10.66 11.4384 12.4964C9.44014 14.3759 9.0956 17.4749 7.57967 20C7.82084 18.2066 8.02756 16.3989 8.32041 14.6198C8.81998 11.5782 7.44186 9.95696 3.56589 9.94261C2.37726 9.94261 1.20586 9.56958 0.0344538 9.35438L0 9.34003Z"/></svg></span>
        <span class="cd-frame cd-frame--star-bl" aria-hidden="true"><svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M0 9.34003C8.28596 9.88522 11.2145 5.76758 12.9027 0C12.8338 1.26255 12.8165 2.53945 12.6959 3.80201C12.3342 7.6901 13.0405 8.39311 17.795 8.76614C18.553 8.82353 19.3109 8.86657 20 8.90961C17.0543 10.0574 13.4022 10.66 11.4384 12.4964C9.44014 14.3759 9.0956 17.4749 7.57967 20C7.82084 18.2066 8.02756 16.3989 8.32041 14.6198C8.81998 11.5782 7.44186 9.95696 3.56589 9.94261C2.37726 9.94261 1.20586 9.56958 0.0344538 9.35438L0 9.34003Z"/></svg></span>

        <div class="cd-detail__text">
          <p>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
          <p>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
          <p>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
        </div>
      </article>

      <div class="cd-detail__back">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="detail-btn">
          <span class="detail-btn__edge detail-btn__edge--t" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--b" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--l" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--r" aria-hidden="true"></span>
          <span class="detail-btn__accent" aria-hidden="true"></span>
          <span class="detail-btn__label">事例一覧に戻る</span>
        </a>
      </div>
    </section>

    <!-- ============ More Contents ============ -->
    <section class="cd-more" aria-label="関連する事例">
      <div class="cd-more__inner">
        <h2 class="cd-more__heading">More Contents</h2>
        <div class="cd-more__cards">

          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="cd-more-card cd-reveal" data-reveal>
            <span class="cd-frame cd-frame--tline" aria-hidden="true"></span>
            <span class="cd-frame cd-frame--bline" aria-hidden="true"></span>
            <span class="cd-frame cd-frame--tl" aria-hidden="true"></span>
            <span class="cd-frame cd-frame--br" aria-hidden="true"></span>
            <span class="cd-frame cd-frame--star-tr" aria-hidden="true"><svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M0 9.34003C8.28596 9.88522 11.2145 5.76758 12.9027 0C12.8338 1.26255 12.8165 2.53945 12.6959 3.80201C12.3342 7.6901 13.0405 8.39311 17.795 8.76614C18.553 8.82353 19.3109 8.86657 20 8.90961C17.0543 10.0574 13.4022 10.66 11.4384 12.4964C9.44014 14.3759 9.0956 17.4749 7.57967 20C7.82084 18.2066 8.02756 16.3989 8.32041 14.6198C8.81998 11.5782 7.44186 9.95696 3.56589 9.94261C2.37726 9.94261 1.20586 9.56958 0.0344538 9.35438L0 9.34003Z"/></svg></span>
            <span class="cd-frame cd-frame--star-bl" aria-hidden="true"><svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M0 9.34003C8.28596 9.88522 11.2145 5.76758 12.9027 0C12.8338 1.26255 12.8165 2.53945 12.6959 3.80201C12.3342 7.6901 13.0405 8.39311 17.795 8.76614C18.553 8.82353 19.3109 8.86657 20 8.90961C17.0543 10.0574 13.4022 10.66 11.4384 12.4964C9.44014 14.3759 9.0956 17.4749 7.57967 20C7.82084 18.2066 8.02756 16.3989 8.32041 14.6198C8.81998 11.5782 7.44186 9.95696 3.56589 9.94261C2.37726 9.94261 1.20586 9.56958 0.0344538 9.35438L0 9.34003Z"/></svg></span>
            <span class="cd-more-card__photo" style="background-image: url('<?php echo $s; ?>/assets/img/service-02.jpg')" aria-hidden="true"></span>
            <span class="cd-more-card__tag">税務顧問</span>
            <h3 class="cd-more-card__title">見出しが入ります。見出しが入ります。見出しが入ります。見出しが入ります。</h3>
            <span class="cd-more-card__client">○○様</span>
          </a>

          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="cd-more-card cd-reveal" data-reveal data-reveal-delay="1">
            <span class="cd-frame cd-frame--tline" aria-hidden="true"></span>
            <span class="cd-frame cd-frame--bline" aria-hidden="true"></span>
            <span class="cd-frame cd-frame--tl" aria-hidden="true"></span>
            <span class="cd-frame cd-frame--br" aria-hidden="true"></span>
            <span class="cd-frame cd-frame--star-tr" aria-hidden="true"><svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M0 9.34003C8.28596 9.88522 11.2145 5.76758 12.9027 0C12.8338 1.26255 12.8165 2.53945 12.6959 3.80201C12.3342 7.6901 13.0405 8.39311 17.795 8.76614C18.553 8.82353 19.3109 8.86657 20 8.90961C17.0543 10.0574 13.4022 10.66 11.4384 12.4964C9.44014 14.3759 9.0956 17.4749 7.57967 20C7.82084 18.2066 8.02756 16.3989 8.32041 14.6198C8.81998 11.5782 7.44186 9.95696 3.56589 9.94261C2.37726 9.94261 1.20586 9.56958 0.0344538 9.35438L0 9.34003Z"/></svg></span>
            <span class="cd-frame cd-frame--star-bl" aria-hidden="true"><svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M0 9.34003C8.28596 9.88522 11.2145 5.76758 12.9027 0C12.8338 1.26255 12.8165 2.53945 12.6959 3.80201C12.3342 7.6901 13.0405 8.39311 17.795 8.76614C18.553 8.82353 19.3109 8.86657 20 8.90961C17.0543 10.0574 13.4022 10.66 11.4384 12.4964C9.44014 14.3759 9.0956 17.4749 7.57967 20C7.82084 18.2066 8.02756 16.3989 8.32041 14.6198C8.81998 11.5782 7.44186 9.95696 3.56589 9.94261C2.37726 9.94261 1.20586 9.56958 0.0344538 9.35438L0 9.34003Z"/></svg></span>
            <span class="cd-more-card__photo" style="background-image: url('<?php echo $s; ?>/assets/img/service-03.jpg')" aria-hidden="true"></span>
            <span class="cd-more-card__tag">税務顧問</span>
            <h3 class="cd-more-card__title">見出しが入ります。見出しが入ります。見出しが入ります。</h3>
            <span class="cd-more-card__client">○○様</span>
          </a>

          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="cd-more-card cd-reveal" data-reveal data-reveal-delay="2">
            <span class="cd-frame cd-frame--tline" aria-hidden="true"></span>
            <span class="cd-frame cd-frame--bline" aria-hidden="true"></span>
            <span class="cd-frame cd-frame--tl" aria-hidden="true"></span>
            <span class="cd-frame cd-frame--br" aria-hidden="true"></span>
            <span class="cd-frame cd-frame--star-tr" aria-hidden="true"><svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M0 9.34003C8.28596 9.88522 11.2145 5.76758 12.9027 0C12.8338 1.26255 12.8165 2.53945 12.6959 3.80201C12.3342 7.6901 13.0405 8.39311 17.795 8.76614C18.553 8.82353 19.3109 8.86657 20 8.90961C17.0543 10.0574 13.4022 10.66 11.4384 12.4964C9.44014 14.3759 9.0956 17.4749 7.57967 20C7.82084 18.2066 8.02756 16.3989 8.32041 14.6198C8.81998 11.5782 7.44186 9.95696 3.56589 9.94261C2.37726 9.94261 1.20586 9.56958 0.0344538 9.35438L0 9.34003Z"/></svg></span>
            <span class="cd-frame cd-frame--star-bl" aria-hidden="true"><svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M0 9.34003C8.28596 9.88522 11.2145 5.76758 12.9027 0C12.8338 1.26255 12.8165 2.53945 12.6959 3.80201C12.3342 7.6901 13.0405 8.39311 17.795 8.76614C18.553 8.82353 19.3109 8.86657 20 8.90961C17.0543 10.0574 13.4022 10.66 11.4384 12.4964C9.44014 14.3759 9.0956 17.4749 7.57967 20C7.82084 18.2066 8.02756 16.3989 8.32041 14.6198C8.81998 11.5782 7.44186 9.95696 3.56589 9.94261C2.37726 9.94261 1.20586 9.56958 0.0344538 9.35438L0 9.34003Z"/></svg></span>
            <span class="cd-more-card__photo" style="background-image: url('<?php echo $s; ?>/assets/img/service-04.jpg')" aria-hidden="true"></span>
            <span class="cd-more-card__tag">税務顧問</span>
            <h3 class="cd-more-card__title">見出しが入ります。見出しが入ります。見出しが入ります。</h3>
            <span class="cd-more-card__client">○○様</span>
          </a>

        </div>
      </div>
    </section>

    <?php get_template_part( 'template-parts/cta' ); ?>
  </main>
<?php
get_footer();
