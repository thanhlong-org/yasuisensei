<?php
/**
 * Template part: service
 * Converted from html_asset/partials/service.html — cards from the service CPT.
 *
 * @package Ludoa
 */
$s = ludoa_static_uri();

$arrow_star = '<svg viewBox="0 0 19 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 9.34C7.87 9.89 10.65 5.77 12.26 0c-.26 2-.26 2.5 0 4 .26 3.5.39 4.39 4.91 4.77.72.06 1.44.1 2.09.14-2.8 1.15-6.27 1.75-8.13 3.59C7.97 14.38 7 17.5 6.2 20c.23-1.79.43-3.6.7-5.38.52-3.29-.7-3.83-4.51-4.68-.99-.22-2.24-.37-3.36-.59L0 9.34Z"/></svg>';
?>
    <!-- ============ サービス (Service) ============ -->
    <section class="svc" aria-labelledby="svc-heading">
      <span class="svc__deco" aria-hidden="true"></span>
      <div class="svc__inner">
        <h2 class="svc__heading" id="svc-heading" data-reveal>
          <span class="svc__heading-en" aria-hidden="true">Service</span>
          <span class="svc__heading-jp">サービス</span>
        </h2>

        <div class="svc__grid">
          <?php foreach ( ludoa_services() as $i => $ludoa_service ) : ?>
          <?php
          $photo = get_the_post_thumbnail_url( $ludoa_service, 'large' );
          if ( ! $photo ) {
            $photo = sprintf( '%s/assets/img/service-%02d.webp', $s, ( $i % 6 ) + 1 );
          }
          ?>
          <?php $is_current = is_singular( 'service' ) && get_the_ID() === $ludoa_service->ID; ?>
          <a class="svc-card<?php echo $is_current ? ' is-current' : ''; ?>" href="<?php echo esc_url( get_permalink( $ludoa_service ) ); ?>"<?php echo $is_current ? ' aria-current="page"' : ''; ?> data-reveal<?php echo ( $i % 3 ) ? ' data-reveal-delay="' . esc_attr( $i % 3 ) . '"' : ''; ?>>
            <div class="svc-card__photo" style="background-image: url('<?php echo esc_url( $photo ); ?>')" aria-hidden="true"></div>
            <span class="svc-card__edge svc-card__edge--t" aria-hidden="true"></span>
            <span class="svc-card__edge svc-card__edge--b" aria-hidden="true"></span>
            <span class="svc-card__edge svc-card__edge--l" aria-hidden="true"></span>
            <span class="svc-card__edge svc-card__edge--r" aria-hidden="true"></span>
            <span class="svc-card__num" aria-hidden="true"><?php echo esc_html( str_pad( (string) ( $i + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
            <div class="svc-card__body">
              <h3 class="svc-card__title"><?php echo esc_html( get_the_title( $ludoa_service ) ); ?></h3>
              <p class="svc-card__en"><?php echo esc_html( ludoa_scf( 'service_en', $ludoa_service->ID ) ); ?></p>
              <span class="svc-card__arrow" aria-hidden="true">
                <span class="svc-card__arrow-line"></span>
                <span class="svc-card__arrow-head"></span>
                <span class="svc-card__arrow-star"><?php echo $arrow_star; // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
              </span>
            </div>
          </a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
