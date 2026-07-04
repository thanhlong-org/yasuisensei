<?php
/**
 * Fallback template — used for the blog index, archives, search and 404.
 * The site is page-driven; every fixed page has its own page-{slug}.php.
 *
 * @package Ludoa
 */
get_header();
?>
<main>
  <section class="cs" style="padding:120px 0;">
    <div class="cs__inner" style="max-width:960px;margin:0 auto;padding:0 24px;">
      <?php if ( have_posts() ) : ?>
        <?php if ( is_home() || is_archive() || is_search() ) : ?>
          <h1 class="cs__heading"><?php the_archive_title( '', '' ) ? the_archive_title() : bloginfo( 'name' ); ?></h1>
        <?php endif; ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <article <?php post_class(); ?> style="margin-bottom:48px;">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div><?php the_excerpt(); ?></div>
          </article>
        <?php endwhile; ?>
        <?php the_posts_pagination(); ?>
      <?php else : ?>
        <h1 class="cs__heading">ページが見つかりません</h1>
        <p>お探しのページは存在しないか、移動した可能性があります。</p>
        <p><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップページへ戻る</a></p>
      <?php endif; ?>
    </div>
  </section>
</main>
<?php
get_footer();
