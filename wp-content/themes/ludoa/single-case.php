<?php
/**
 * Single: 事例詳細 (case CPT)
 * Layout from html_asset/case/detail/index.html — data from the case post.
 *
 * @package Ludoa
 */
get_header();
$s = ludoa_static_uri();

the_post();
$hero_url = get_the_post_thumbnail_url( null, 'full' );
if ( ! $hero_url ) {
	$hero_url = "$s/assets/img/service-01.jpg";
}
$case_tag    = ludoa_scf( 'case_tag' );
$case_client = ludoa_scf( 'case_client' );
$archive_url = get_post_type_archive_link( 'case' );
?>
<main>
    <!-- ============ HERO (FV) — featured image as banner ============ -->
    <section class="page-banner" aria-label="事例紹介詳細">
      <div class="page-banner__media" aria-hidden="true">
        <div class="page-banner__photo" role="img" aria-label="<?php the_title_attribute(); ?>"
             style="background-image: url('<?php echo esc_url( $hero_url ); ?>')"></div>
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
            <a href="<?php echo esc_url( $archive_url ); ?>">事例紹介</a>
          </li>
        </ol>
      </nav>

      <div class="page-banner__inner">
        <div class="cd-hero__overlay">
          <h1 class="cd-hero__title" data-reveal><?php the_title(); ?></h1>
          <div class="cd-hero__meta" data-reveal data-reveal-delay="1">
            <?php if ( $case_tag ) : ?>
            <span class="cd-hero__tag"><?php echo esc_html( $case_tag ); ?></span>
            <?php endif; ?>
            <?php if ( $case_client ) : ?>
            <span class="cd-hero__client"><?php echo esc_html( $case_client ); ?></span>
            <?php endif; ?>
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
          <?php the_content(); ?>
        </div>
      </article>

      <div class="cd-detail__back">
        <a href="<?php echo esc_url( $archive_url ); ?>" class="detail-btn">
          <span class="detail-btn__edge detail-btn__edge--t" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--b" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--l" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--r" aria-hidden="true"></span>
          <span class="detail-btn__accent" aria-hidden="true"></span>
          <span class="detail-btn__label">事例一覧に戻る</span>
        </a>
      </div>
    </section>

    <!-- ============ More Contents (他の事例) ============ -->
    <?php
    $more_query = new WP_Query(
        array(
            'post_type'      => 'case',
            'posts_per_page' => 3,
            'post__not_in'   => array( get_the_ID() ),
            'no_found_rows'  => true,
        )
    );
    ?>
    <?php if ( $more_query->have_posts() ) : ?>
    <section class="cd-more" aria-label="関連する事例">
      <div class="cd-more__inner">
        <h2 class="cd-more__heading">More Contents</h2>
        <div class="cd-more__cards">

          <?php $delay = 0; ?>
          <?php while ( $more_query->have_posts() ) : $more_query->the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="cd-more-card cd-reveal" data-reveal<?php echo $delay ? ' data-reveal-delay="' . esc_attr( $delay ) . '"' : ''; ?>>
            <span class="cd-frame cd-frame--tline" aria-hidden="true"></span>
            <span class="cd-frame cd-frame--bline" aria-hidden="true"></span>
            <span class="cd-frame cd-frame--tl" aria-hidden="true"></span>
            <span class="cd-frame cd-frame--br" aria-hidden="true"></span>
            <span class="cd-frame cd-frame--star-tr" aria-hidden="true"><svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M0 9.34003C8.28596 9.88522 11.2145 5.76758 12.9027 0C12.8338 1.26255 12.8165 2.53945 12.6959 3.80201C12.3342 7.6901 13.0405 8.39311 17.795 8.76614C18.553 8.82353 19.3109 8.86657 20 8.90961C17.0543 10.0574 13.4022 10.66 11.4384 12.4964C9.44014 14.3759 9.0956 17.4749 7.57967 20C7.82084 18.2066 8.02756 16.3989 8.32041 14.6198C8.81998 11.5782 7.44186 9.95696 3.56589 9.94261C2.37726 9.94261 1.20586 9.56958 0.0344538 9.35438L0 9.34003Z"/></svg></span>
            <span class="cd-frame cd-frame--star-bl" aria-hidden="true"><svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M0 9.34003C8.28596 9.88522 11.2145 5.76758 12.9027 0C12.8338 1.26255 12.8165 2.53945 12.6959 3.80201C12.3342 7.6901 13.0405 8.39311 17.795 8.76614C18.553 8.82353 19.3109 8.86657 20 8.90961C17.0543 10.0574 13.4022 10.66 11.4384 12.4964C9.44014 14.3759 9.0956 17.4749 7.57967 20C7.82084 18.2066 8.02756 16.3989 8.32041 14.6198C8.81998 11.5782 7.44186 9.95696 3.56589 9.94261C2.37726 9.94261 1.20586 9.56958 0.0344538 9.35438L0 9.34003Z"/></svg></span>
            <?php $more_photo = get_the_post_thumbnail_url( null, 'large' ); ?>
            <span class="cd-more-card__photo" style="background-image: url('<?php echo esc_url( $more_photo ? $more_photo : "$s/assets/img/service-02.jpg" ); ?>')" aria-hidden="true"></span>
            <?php $more_tag = ludoa_scf( 'case_tag' ); ?>
            <?php if ( $more_tag ) : ?>
            <span class="cd-more-card__tag"><?php echo esc_html( $more_tag ); ?></span>
            <?php endif; ?>
            <h3 class="cd-more-card__title"><?php the_title(); ?></h3>
            <span class="cd-more-card__client"><?php echo esc_html( ludoa_scf( 'case_client' ) ); ?></span>
          </a>
          <?php $delay++; ?>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>

        </div>
      </div>
    </section>
    <?php else : ?>
    <?php wp_reset_postdata(); ?>
    <?php endif; ?>

    <?php get_template_part( 'template-parts/cta' ); ?>
  </main>
<?php
get_footer();
