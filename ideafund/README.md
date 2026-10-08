# IDEA Fund Partners — site redesign

A static, dependency-free redesign of ideafundpartners.com. Three pages
(`index.html`, `portfolio.html`, `team.html`), one stylesheet, ~40 lines of
vanilla JS, self-hosted variable fonts. No build step, no framework, no
external requests at runtime.

## Design system

- **Type** — Archivo (variable weight + width; the expanded-width cut does
  the masthead work), Newsreader italic (editorial accents), Spline Sans
  Mono (labels, data, numerals). All latin-subset woff2 in `assets/fonts/`.
- **Color** — billiard green `#16382b`, bone `#ece7dc`, sienna `#c04f27`.
  Tokens at the top of `assets/css/site.css`.
- **Brand mark** — the "cornerstone": three set blocks, the fourth drawn
  apart. Inline SVG in each header + `assets/favicon.svg`.
- **Map** — the hero's Southeast/Mid-Atlantic map is generated from US
  Census geodata (`us-atlas` via d3-geo, conic conformal projection) and
  inlined into `index.html`. Regeneration script lives with the repo
  history; city list and projection are trivial to edit.

## Company logos

`assets/logos/` is a drop-in folder: add `<slug>.svg` (e.g. `pendo.svg`,
`sense-photonics.svg` — slugs are in the `data-logo` attributes) and the
portfolio ledger swaps the set wordmark for the logo automatically.
Nothing breaks when a file is missing. Logos could not be fetched from
this build environment (network policy); source them from each company's
press kit.

## Preview locally

```
cd ideafund
python3 -m http.server 8000
```

## Deploy

Any static host (Netlify, Cloudflare Pages, S3, GitHub Pages). The current
site appears to run on Squarespace, which cannot serve custom pages like
these — launching means pointing the domain at a static host.

## Notes

- Header/footer are duplicated per page on purpose; three pages don't earn
  a templating step.
- Facts on the pages (founding year, funds, team roster and titles, exits)
  were compiled from public profiles — worth a pass from the firm before
  launch, especially team bios and portfolio descriptions.
