---
name: frontend-slicing
description: >
  Convert designs (Figma, PSD, image mockups) into pixel-perfect, responsive,
  production-ready HTML/CSS. Covers asset extraction, slicing workflow, BEM/utility
  naming, spacing/typography token mapping, responsive breakpoint translation, and
  cross-browser pixel accuracy. Use when user asks to "cắt HTML/CSS", "slice a design",
  convert Figma/PSD to code, build a static frontend from a mockup, or invokes
  /frontend-slicing. Complements /html-css (which covers raw HTML/CSS technique).
---

Frontend slicing mode. Turn design → clean, responsive, pixel-accurate HTML/CSS.

## Workflow

1. **Read design first** — identify layout regions (header, hero, sections, footer), the grid, repeating components, and global tokens (colors, fonts, spacing scale) BEFORE writing markup.
2. **Extract tokens** → CSS custom properties. Map every repeated value once: colors, font sizes, spacing, radii, shadows, breakpoints.
3. **Structure semantic HTML** — section by section, top to bottom. Components before pages.
4. **Style mobile-first** — base = smallest frame, then `@media (min-width)` up to desktop frame.
5. **Verify pixel accuracy** — overlay design vs render, check spacing/font/color at each breakpoint.

## Asset extraction

- Export images at 1x AND 2x (retina): `srcset="img.png 1x, img@2x.png 2x"`
- Prefer SVG for icons/logos — inline for color control, sprite/`<use>` for repeated
- Use `<picture>` for art-direction or modern format fallback (WebP/AVIF → JPG)
- Compress raster: WebP/AVIF first, fallback JPG. PNG only for transparency on flat art
- Icon fonts dead — use SVG. Don't slice icons as PNG when vector exists

## Token mapping (design → CSS vars)

```css
:root {
  /* Colors — name by role, not value */
  --color-primary: #2e7d32;
  --color-text: #1a1a1a;
  --color-muted: #6b7280;
  --color-bg: #ffffff;
  /* Spacing scale — match design's 4/8px system */
  --space-1: 4px; --space-2: 8px; --space-3: 16px; --space-4: 24px; --space-6: 48px;
  /* Type scale */
  --fs-sm: 14px; --fs-base: 16px; --fs-lg: 20px; --fs-xl: 32px;
  /* Radii / shadow */
  --radius: 8px;
  --shadow-card: 0 4px 12px rgba(0,0,0,.08);
  /* Breakpoints (reference; CSS can't use vars in media queries) */
}
```

## Naming

- BEM for component-heavy static sites: `.card`, `.card__title`, `.card--featured`
- Utility-first (Tailwind-style) ok if project uses it — match existing convention
- Don't mix conventions in one project. Match what's already there.
- Class names describe role/component, never appearance (`.btn-primary` not `.btn-green`)

## Responsive translation

- Design usually gives 2-3 frames (mobile 375, tablet 768, desktop 1440). Interpolate between.
- Convert fixed px widths → fluid: `%`, `clamp()`, `minmax()`, `fr`
- Container: `width: min(100% - 2rem, 1200px); margin-inline: auto;`
- Grid for page sections (2D), flex for component rows (1D)
- Fluid type: `font-size: clamp(1.5rem, 4vw, 2rem)` instead of breakpoint jumps where smooth
- Test: 320, 375, 768, 1024, 1440px

## Pixel accuracy checklist

- Spacing matches design's margin/padding exactly (use the spacing scale, no arbitrary px)
- Line-height matches — designers set it; don't default to browser
- Letter-spacing on headings often non-zero in design — copy it
- Font weights exact (400/500/600/700) — load only weights used
- Border radius, shadow blur/spread copied 1:1
- Image aspect ratio locked with `aspect-ratio` + `object-fit: cover` (no CLS)

## Common pitfalls

- Don't hardcode heights on text containers — content reflows, use `min-height`
- Don't slice text as image — real text for SEO/a11y/scaling
- Watch `box-sizing: border-box` globally (`*, *::before, *::after { box-sizing: border-box; }`)
- Reset/normalize margins before slicing
- Designer's "16px gap" = `gap`, not nested margins

## Output format

- Deliver full HTML + CSS, section by section if large
- Inline the `:root` token block first
- Note any design value that's ambiguous and what you assumed
- Flag fonts that need loading (`@font-face` or Google Fonts link)
