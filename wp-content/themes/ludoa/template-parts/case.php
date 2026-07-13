<?php
/**
 * Template part: case — latest 3 posts of the case CPT.
 * Layout from html_asset/partials/case.html.
 *
 * @package Ludoa
 */
$fcase_query = new WP_Query(
	array(
		'post_type'      => 'case',
		'posts_per_page' => 3,
		'no_found_rows'  => true,
	)
);
$fcase_archive = get_post_type_archive_link( 'case' );
?>
    <!-- ============ 事例紹介 (Case) ============ -->
    <section class="fcase" aria-labelledby="fcase-title">
      <div class="fcase__inner">
        <div class="fcase__head">
          <h2 class="fcase__heading" data-reveal>
            <span class="fcase__heading-en" aria-hidden="true">CASE</span>
            <span class="fcase__heading-jp" id="fcase-title">事例紹介</span>
          </h2>
          <a href="<?php echo esc_url( $fcase_archive ); ?>" class="detail-btn fcase__btn--list">
            <span class="detail-btn__edge detail-btn__edge--t" aria-hidden="true"></span>
            <span class="detail-btn__edge detail-btn__edge--b" aria-hidden="true"></span>
            <span class="detail-btn__edge detail-btn__edge--l" aria-hidden="true"></span>
            <span class="detail-btn__edge detail-btn__edge--r" aria-hidden="true"></span>
            <span class="detail-btn__accent" aria-hidden="true"></span>
            <span class="detail-btn__label">事例一覧を見る</span>
          </a>
        </div>

        <ul class="fcase__list">
          <?php $delay = 0; ?>
          <?php while ( $fcase_query->have_posts() ) : $fcase_query->the_post(); ?>
          <li class="fcase-item" data-reveal<?php echo $delay ? ' data-reveal-delay="' . esc_attr( $delay ) . '"' : ''; ?>>
            <span class="fcase-deco fcase-deco--tl" aria-hidden="true"></span>
            <span class="fcase-deco fcase-deco--tline" aria-hidden="true"></span>
            <span class="fcase-deco fcase-deco--bline" aria-hidden="true"></span>
            <span class="fcase-deco fcase-deco--br" aria-hidden="true"></span>
            <span class="fcase-deco fcase-deco--star-tr" aria-hidden="true"></span>
            <span class="fcase-deco fcase-deco--star-bl" aria-hidden="true"></span>
            <div class="fcase-card">
              <div class="fcase-card__image" role="img" aria-label="<?php the_title_attribute(); ?>"<?php echo ludoa_bg_style(); // phpcs:ignore WordPress.Security.EscapeOutput ?>></div>
              <?php $fcase_tag = ludoa_scf( 'case_tag' ); ?>
              <?php if ( $fcase_tag ) : ?>
              <span class="fcase-card__tag"><?php echo esc_html( $fcase_tag ); ?></span>
              <?php endif; ?>
              <div class="fcase-card__body">
                <h3 class="fcase-card__title"><?php the_title(); ?></h3>
                <p class="fcase-card__client"><?php echo esc_html( ludoa_scf( 'case_client' ) ); ?></p>
              </div>
              <a href="<?php the_permalink(); ?>" class="detail-btn fcase-card__btn">
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

        <a href="<?php echo esc_url( $fcase_archive ); ?>" class="detail-btn fcase__btn--sp">
          <span class="detail-btn__edge detail-btn__edge--t" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--b" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--l" aria-hidden="true"></span>
          <span class="detail-btn__edge detail-btn__edge--r" aria-hidden="true"></span>
          <span class="detail-btn__accent" aria-hidden="true"></span>
          <span class="detail-btn__label">事例一覧を見る</span>
        </a>
      </div>
    </section>
