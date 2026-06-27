---
name: wordpress-dev
description: >
  Build and customize WordPress sites: themes (classic + block), child themes, custom
  post types/taxonomies, the loop, template hierarchy, hooks (actions/filters),
  enqueueing assets, ACF custom fields, Gutenberg blocks, WooCommerce, security and
  performance. Use when user works on a WordPress site, theme, plugin, functions.php,
  PHP templates, Gutenberg/block editor, ACF, WooCommerce, or invokes /wordpress-dev.
---

WordPress dev mode. Theme/plugin work the WordPress way — hooks, not hacks.

## Golden rules

- **Never edit core** (`wp-admin`, `wp-includes`) or parent-theme files directly — updates wipe them
- **Always use a child theme** to customize an existing theme
- **Hooks over overrides** — `add_action`/`add_filter`, not copying template files unless needed
- **Escape on output, sanitize on input** — `esc_html()`, `esc_attr()`, `esc_url()`, `wp_kses()`; `sanitize_text_field()` in, nonces on forms
- **Enqueue, never hardcode** `<script>`/`<link>` — use `wp_enqueue_script/style`

## Template hierarchy (which file renders)

```
front-page.php → home.php          (blog index)
single-{post-type}.php → single.php
page-{slug}.php → page.php
archive-{cpt}.php → archive.php
taxonomy-{tax}.php → category.php / tag.php
search.php · 404.php · index.php   (final fallback)
```

## Child theme

```php
// child-theme/functions.php
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('parent', get_template_directory_uri().'/style.css');
    wp_enqueue_style('child', get_stylesheet_directory_uri().'/style.css', ['parent']);
});
```
`get_template_directory()` = parent. `get_stylesheet_directory()` = child/active. Don't confuse.

## The Loop

```php
if (have_posts()) :
    while (have_posts()) : the_post();
        the_title('<h2>', '</h2>');
        the_content();
    endwhile;
else :
    echo '<p>No posts.</p>';
endif;
```
Custom query: `new WP_Query($args)` then `wp_reset_postdata()` after. Never modify the main query in templates — use `pre_get_posts` hook.

## Custom post type + taxonomy

```php
add_action('init', function () {
    register_post_type('product', [
        'public' => true, 'has_archive' => true,
        'supports' => ['title','editor','thumbnail'],
        'show_in_rest' => true,            // enables Gutenberg + REST
        'rewrite' => ['slug' => 'products'],
        'labels' => ['name' => 'Products', 'singular_name' => 'Product'],
    ]);
});
```
Flush rewrite rules once after registering (visit Settings → Permalinks).

## Hooks

- `add_action('hook', 'cb', priority, args)` — do something
- `add_filter('hook', 'cb', priority, args)` — modify + **return** a value
- Common: `init`, `wp_enqueue_scripts`, `after_setup_theme`, `pre_get_posts`, `the_content`, `wp_head`, `save_post`
- Always `return` in filters or you blank the value

## ACF (Advanced Custom Fields)

```php
the_field('subtitle');                 // echo
$x = get_field('price');               // return
$rows = get_field('gallery');          // repeater/array
if (have_rows('items')) : while (have_rows('items')) : the_row();
    the_sub_field('label');
endwhile; endif;
```
Register field groups in code (`acf_add_local_field_group`) for version control on real projects.

## Gutenberg / blocks

- `register_block_type()` with `block.json` (modern). `show_in_rest=>true` on CPTs for editor
- `theme.json` controls global styles/settings in block themes — palette, typography, spacing
- ACF Blocks = fastest path to custom blocks without React
- Classic vs block theme: block theme uses `templates/*.html` + `theme.json`, no `header.php`/`footer.php`

## WooCommerce

- Override templates by copying `plugins/woocommerce/templates/x.php` → `theme/woocommerce/x.php`
- Hooks preferred: `woocommerce_before_shop_loop`, `woocommerce_single_product_summary`, etc.
- `wc_get_template_part()`, conditional tags: `is_shop()`, `is_product()`, `is_cart()`

## Security

- Nonces on every form/AJAX: `wp_nonce_field()` + `check_admin_referer()`/`wp_verify_nonce()`
- Capability checks: `current_user_can('edit_posts')`
- `$wpdb->prepare()` for all custom SQL — never interpolate input
- Escape ALL output. Sanitize ALL input.

## Performance

- Cache plugin (WP Super Cache / W3TC / LiteSpeed)
- Limit autoloaded options; clean transients
- `WP_Query` — set `'posts_per_page'`, `'no_found_rows'=>true` when no pagination
- Lazy-load images (native `loading="lazy"`), optimize via plugin
- Minimize plugins — each adds load + attack surface

## Multilingual

Polylang (free, lighter) or WPML (paid, full). See /web-i18n for hreflang/strategy.

## Output format

- Real code (PHP/template), match WP coding standards (snake_case functions, prefixed)
- Prefix custom functions to avoid collisions: `mytheme_setup()`
- Note which file it goes in (`functions.php`, `single.php`, plugin file)
- Flag if a change belongs in a plugin vs theme (functionality → plugin, presentation → theme)
