<?php
/**
 * Single: サービス詳細 (service CPT)
 * Layout from html_asset/advisory/index.html — data from the service post.
 * SCF fields override the sections; the advisory design content is the fallback.
 *
 * @package Ludoa
 */
get_header();

the_post();
$s           = ludoa_static_uri();
$archive_url = get_post_type_archive_link( 'service' );
$en          = ludoa_scf( 'service_en', null, get_post_field( 'post_name' ) );

$support = array_filter( (array) ludoa_scf( 'support_name', null, array() ) );
if ( ! $support ) {
	$support = array(
		'月次会計データの確認・チェック',
		'試算表の作成および業績報告',
		'税務相談・経営相談',
		'法人税・消費税に関する相談',
		'節税対策のご提案',
		'決算対策・納税予測',
		'税務署からの問い合わせ対応',
		'各種届出書の作成・提出',
	);
}

$issues = array_filter( (array) ludoa_scf( 'issue_text', null, array() ) );
if ( ! $issues ) {
	$issues = array(
		'税金がいくらかかるのか分からない',
		'節税対策をしたいが方法が分からない',
		'決算直前になって慌てたくない',
		'会計や税務の相談相手がいない',
	);
}

$flow_titles = array_filter( (array) ludoa_scf( 'flow_title', null, array() ) );
$flow_descs  = (array) ludoa_scf( 'flow_desc', null, array() );
$flow        = array();
foreach ( array_values( $flow_titles ) as $i => $title ) {
	$flow[] = array(
		'title' => $title,
		'desc'  => isset( $flow_descs[ $i ] ) ? $flow_descs[ $i ] : '',
	);
}
if ( ! $flow ) {
	$flow = array(
		array( 'title' => 'お問い合わせ', 'desc' => 'お問い合わせフォームまたはお電話にてお気軽にご相談ください。' ),
		array( 'title' => '初回相談', 'desc' => '現在のお悩みや事業内容、会計・税務の状況について詳しくお伺いします。' ),
		array( 'title' => 'ご提案・お見積り', 'desc' => 'ご状況に合わせて最適なサポート内容と料金をご提案いたします。' ),
		array( 'title' => 'ご契約', 'desc' => 'サービス内容にご納得いただいたうえで顧問契約を締結します。' ),
		array( 'title' => '月次サポート開始', 'desc' => '会計資料の確認や税務相談を行いながら、継続的に経営をサポートします。' ),
		array( 'title' => '決算・申告対応', 'desc' => '決算対策から各種申告まで一貫して対応し、適正な納税をサポートします。' ),
	);
}

$head_star = '<svg class="asy-head__star" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 9.34003C8.28596 9.88522 11.2145 5.76758 12.9027 0C12.8338 1.26255 12.8165 2.53945 12.6959 3.80201C12.3342 7.6901 13.0405 8.39311 17.795 8.76614C18.553 8.82353 19.3109 8.86657 20 8.90961C17.0543 10.0574 13.4022 10.66 11.4384 12.4964C9.44014 14.3759 9.0956 17.4749 7.57967 20C7.82084 18.2066 8.02756 16.3989 8.32041 14.6198C8.81998 11.5782 7.44186 9.95696 3.56589 9.94261C2.37726 9.94261 1.20586 9.56958 0.0344538 9.35438L0 9.34003Z"/></svg>';
$check     = '<svg class="asy-issues__check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2.5"/><path d="M7.5 12.4l3 3 6-6.4" stroke-width="2"/></svg>';

// Banner: featured image → per-service static banner.png (PC & SP) → CSS default.
$banner_style = ludoa_bg_style( null, 'full' );
if ( ! $banner_style ) {
	$slug = get_post_field( 'post_name' );
	if ( file_exists( get_template_directory() . "/static/{$slug}/img/banner.png" ) ) {
		$banner_style = ' style="background-image: url(\'' . esc_url( "{$s}/{$slug}/img/banner.png" ) . '\')"';
	}
}
?>
<main>
    <!-- ============ PAGE BANNER (FV) ============ -->
    <section class="page-banner" aria-label="<?php the_title_attribute(); ?>">
      <div class="page-banner__media" aria-hidden="true">
        <div class="page-banner__photo" role="img" aria-label="打ち合わせの様子"<?php echo $banner_style; // phpcs:ignore WordPress.Security.EscapeOutput ?>></div>
        <div class="page-banner__scroll">
          <span class="page-banner__scroll-line"></span>
          <span class="page-banner__scroll-text">SCROLL</span>
        </div>
      </div>

      <div class="page-banner__inner">
        <p class="page-banner__en" aria-hidden="true" data-reveal><?php echo esc_html( ucfirst( $en ) ); ?></p>
        <h1 class="page-banner__jp" data-reveal data-reveal-delay="1"><?php the_title(); ?></h1>
        <div class="page-banner__lead" data-reveal data-reveal-delay="2">
          <?php the_content(); ?>
        </div>
      </div>

      <nav class="page-banner__breadcrumb" aria-label="パンくずリスト" data-reveal data-reveal-delay="3">
        <ol class="breadcrumb">
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">TOP</a></li>
          <li>
            <span class="breadcrumb__sep" aria-hidden="true">
              <svg viewBox="0 0 10 10" width="10" height="10" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="3,1 7,5 3,9"/></svg>
            </span>
            <a href="<?php echo esc_url( $archive_url ); ?>">サービス</a></li>
          <li>
            <span class="breadcrumb__sep" aria-hidden="true">
              <svg viewBox="0 0 10 10" width="10" height="10" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="3,1 7,5 3,9"/></svg>
            </span>
            <span class="breadcrumb__current" aria-current="page"><?php the_title(); ?></span>
          </li>
        </ol>
      </nav>
    </section>

    <!-- ============ 支援内容 (Support content) ============ -->
    <section class="asy-support" aria-label="支援内容">
      <div class="asy-support__box" data-reveal>
        <div class="asy-head asy-head--center asy-head--light">
          <h2 class="asy-head__title">支援内容</h2>
          <span class="asy-head__rule" aria-hidden="true"><?php echo $head_star; // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
        </div>

        <ul class="asy-support__grid">
          <?php foreach ( array_values( $support ) as $i => $name ) : ?>
          <li class="asy-support__item"><span class="asy-support__num"><?php echo esc_html( str_pad( (string) ( $i + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span><span class="asy-support__name"><?php echo esc_html( $name ); ?></span></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </section>

    <!-- ============ 解決できる課題 (Problems solved) ============ -->
    <section class="asy-issues" aria-label="解決できる課題">
      <div class="asy-issues__inner">
        <div class="asy-head" data-reveal>
          <h2 class="asy-head__title">解決できる課題</h2>
          <span class="asy-head__rule" aria-hidden="true"><?php echo $head_star; // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
        </div>

        <ul class="asy-issues__grid" data-reveal>
          <?php foreach ( $issues as $issue ) : ?>
          <li class="asy-issues__item">
            <?php echo $check; // phpcs:ignore WordPress.Security.EscapeOutput ?>
            <span class="asy-issues__txt"><?php echo esc_html( $issue ); ?></span>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </section>

    <!-- ============ ご利用の流れ (Flow) ============ -->
    <section class="asy-flow" aria-label="ご利用の流れ">
      <div class="asy-flow__inner">
        <div class="asy-head" data-reveal>
          <h2 class="asy-head__title">ご利用の流れ</h2>
          <span class="asy-head__rule" aria-hidden="true"><?php echo $head_star; // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
        </div>

        <ol class="asy-flow__steps">
          <?php foreach ( array_values( $flow ) as $i => $step ) : ?>
          <li class="asy-flow__step" data-reveal>
            <span class="asy-flow__num" aria-hidden="true"><?php echo esc_html( str_pad( (string) ( $i + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
            <div class="asy-flow__body">
              <h3 class="asy-flow__title"><?php echo esc_html( $step['title'] ); ?></h3>
              <p class="asy-flow__desc"><?php echo esc_html( $step['desc'] ); ?></p>
            </div>
          </li>
          <?php endforeach; ?>
        </ol>
      </div>
    </section>

    <?php get_template_part( 'template-parts/service' ); ?>

    <?php get_template_part( 'template-parts/case' ); ?>

    <?php get_template_part( 'template-parts/cta' ); ?>
  </main>
<?php
get_footer();
