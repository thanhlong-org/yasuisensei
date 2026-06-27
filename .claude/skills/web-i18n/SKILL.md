---
name: web-i18n
description: >
  Build multilingual / internationalized (i18n) websites and apps. Covers translation
  file structure, language switching, locale routing (URL strategy), RTL support,
  date/number/currency formatting, pluralization, SEO hreflang, and framework-specific
  patterns (vanilla JS, React/Vue/Next i18n, Laravel, WordPress). Use when user asks to
  make a site "đa ngôn ngữ", "multilingual", add language switching, translate a site,
  set up i18n/l10n, or invokes /web-i18n.
---

Multilingual web mode. Locale-correct, SEO-correct, maintainable.

## First decide: URL strategy

| Strategy | Example | Use when |
|----------|---------|----------|
| Subdirectory | `site.com/vi/`, `site.com/en/` | Default. Best SEO, one domain, simplest |
| Subdomain | `vi.site.com` | Separate infra/CDN per locale |
| Query param | `site.com?lang=vi` | Avoid — weak SEO, not crawled well |
| ccTLD | `site.vn`, `site.com` | Large budget, strong per-country presence |

Pick subdirectory unless reason otherwise. Always set a default locale + fallback.

## Translation file structure

- Key by **meaning/role**, never by the English text: `nav.home` not `"Home"`
- One file per locale: `vi.json`, `en.json` — identical key trees
- Namespace by feature: `auth.login.title`, `cart.empty`
- Never concatenate translated fragments — word order differs per language. Use full strings with placeholders.

```json
{ "greeting": "Xin chào, {name}!", "cart": { "items": "{count} sản phẩm" } }
```

## Pluralization

Languages have different plural rules. Use ICU MessageFormat or framework plural API — never `if (n===1)`.

```
{count, plural, =0 {No items} one {# item} other {# items}}
```
Vietnamese has no plural inflection; English has 2 forms; Arabic 6, Russian 4. Library handles it.

## Formatting — use Intl, never manual

```js
new Intl.DateTimeFormat('vi-VN').format(date)
new Intl.NumberFormat('vi-VN', {style:'currency', currency:'VND'}).format(price)
new Intl.RelativeTimeFormat('vi').format(-3, 'day')
```
Don't hardcode `dd/mm/yyyy` or `$` — locale decides separator, order, symbol position.

## RTL (Arabic, Hebrew)

- `<html dir="rtl" lang="ar">` — toggle `dir` per locale
- Use CSS logical properties: `margin-inline-start` not `margin-left`, `padding-inline`, `inset-inline`
- `text-align: start` not `left`
- Flip directional icons (arrows) with `[dir=rtl] .icon { transform: scaleX(-1); }`

## SEO (critical for multilingual)

```html
<link rel="alternate" hreflang="vi" href="https://site.com/vi/page">
<link rel="alternate" hreflang="en" href="https://site.com/en/page">
<link rel="alternate" hreflang="x-default" href="https://site.com/">
```
- Every page lists ALL its language versions incl. itself
- `x-default` for the fallback/selector page
- Set `<html lang="...">` correctly per page
- Translate `<title>`, `<meta description>`, slugs, `og:locale`

## Language switcher

- Switch should keep user on the SAME page in new locale, not dump to homepage
- Show language in its own name: "Tiếng Việt", "English", "日本語" — not flags (flags ≠ languages)
- Persist choice: cookie/localStorage + respect `Accept-Language` on first visit
- Provide manual override; never lock by IP geolocation alone

## Framework patterns

- **Vanilla JS**: load `{locale}.json`, `data-i18n="key"` attrs, swap on switch
- **React**: `react-i18next` or `react-intl`
- **Vue**: `vue-i18n`
- **Next.js**: `next-intl` or built-in i18n routing (App Router: `[locale]` segment)
- **Laravel**: `lang/{locale}/` files, `__('key')`, `{{ __('messages.welcome') }}`, locale middleware
- **WordPress**: Polylang or WPML plugin (see /wordpress-dev)

## Checklist

- All UI strings externalized (no hardcoded text in markup/components)
- Date/number/currency via Intl
- hreflang on every page
- `<html lang>` + `dir` correct per locale
- Switcher preserves current page
- Fallback locale set for missing keys
- Fonts cover all target scripts (CJK, Arabic glyphs)
