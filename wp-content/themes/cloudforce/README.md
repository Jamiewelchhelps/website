# Cloudforce WordPress theme

A ground-up replacement for the legacy `cfwp` theme. Same WordPress install,
same hosting, same CMS — rebuilt front end.

## What it is

- **A real WordPress theme**, not a static export. WordPress keeps running,
  editors keep editing, the blog keeps publishing.
- **No page builder and no jQuery.** The legacy theme loaded jQuery plus eight
  plugins (fancybox, swiper, nice-select, device, swipe, preloading, tween,
  lottie). This ships ~180 lines of vanilla JS for a menu toggle and a scroll
  reveal.
- **Token-driven design.** Every colour, size, space and typeface is a CSS
  custom property in one block at the top of `assets/css/main.css`.
- **Homepage copy lives in the Customizer**, not in template files, so it can
  be edited without a developer.

## Install

1. Copy the `cloudforce` folder to `wp-content/themes/` on the server.
2. **Appearance → Themes → Activate** ("Cloudforce").
3. **Appearance → Menus** — create menus and assign them to these locations:
   - Primary Menu (site header)
   - Footer: Our Approach / Solutions / Insights / About (footer columns)
   - Footer: Legal (bottom row)
4. **Appearance → Customize → Homepage Content** — every homepage section is
   there. Defaults are the current live copy, so it renders correctly before
   you change anything.
5. **Settings → Reading** — set the homepage to a static page so
   `front-page.php` is used.

Keep `cfwp` installed but inactive until you're happy, so switching back is
one click.

## Changing the font to Times New Roman

This was the original request, left un-applied deliberately. It is a two-line
edit in `assets/css/main.css`:

```css
:root {
  --font-body: "Times New Roman", Times, serif;
  --font-heading: var(--font-body);
}
```

Nothing else needs to move. Every heading, paragraph, button, menu item and
footer link inherits from those two variables — verified in a browser by
overriding just those two properties and confirming all fourteen tested
elements switched. Code blocks stay monospaced via `--font-mono`.

## Editing the homepage

**Appearance → Customize → Homepage Content**, with a panel per section:

| Panel | Controls |
| --- | --- |
| Hero | Eyebrow, title, lead, two CTAs |
| Hero Promo Banner | Title, text, link, image |
| Approach | "Systems Thinking." heading, body, CTA |
| Areas of Focus | "Areas of (Hyper)focus." heading, body, CTA |
| Capabilities | The five numbered cards (Build → Imagine) |
| Team | "Technologists on Call." heading, body, CTA |
| Contact | "Your turn." heading, body, form embed, fallback CTA |
| Awards & Badges | Heading plus up to four badge images |

Clearing a field hides that element. Clearing every field in a section hides
the whole section — no empty boxes.

**Contact form:** paste the existing HubSpot, Gravity Forms or Contact Form 7
shortcode into Customize → Contact → Contact Form. It renders through
`do_shortcode()`, so whatever the site uses today keeps working. Until one is
set, the section shows a "Talk To A Human" button instead of a blank space.

## Verified

Rendered through a WordPress-function stub harness and driven in Chromium:

- All seven templates render with zero PHP warnings or notices.
- Homepage HTML parses with no unclosed or mismatched tags.
- No horizontal overflow at 1440px or 390px.
- No JavaScript console errors.
- Mobile menu opens on click, closes on Escape, and keeps `aria-expanded`
  in sync.
- 14 of 14 text/background pairs meet WCAG AA contrast, measured on composited
  pixels rather than declared values.

## Still needed

These need input that isn't in the repo yet:

- **Brand colours.** The palette in `:root` is a placeholder. Replace the six
  `--brand-*` / `--accent-*` values with the real ones and the whole site
  retones.
- **The logo.** Upload via Customize → Site Identity. Falls back to the site
  name as text.
- **Award badges.** The Microsoft certification, Fortune, Inc. and Washington
  Post badges from the current site — add via Customize → Awards & Badges.
- **Inner pages.** Only the homepage has a bespoke layout. `/about-us/`,
  `/our-approach/`, `/solutions/`, `/insights/`, `/careers/` currently use the
  generic `page.php`. Building bespoke templates for those needs their content,
  which wasn't in the saved file.

## Structure

```
cloudforce/
├── style.css                  Theme header only; styles live in assets/
├── functions.php              Setup, menus, enqueues, widget areas
├── front-page.php             Homepage; composes the section partials
├── header.php  footer.php     Shared chrome
├── index.php  archive.php  single.php  page.php  search.php  404.php
├── searchform.php
├── assets/
│   ├── css/main.css           Design tokens + all styles
│   └── js/main.js             Menu toggle, scroll reveal
│   └── js/customizer.js       Live preview for title/tagline
├── inc/
│   ├── customizer.php         Settings, defaults, sanitisation
│   └── template-tags.php      Output helpers
└── template-parts/
    ├── content-card.php  content-none.php
    └── sections/             hero, approach, focus, team, awards, contact
```
