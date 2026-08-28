# IDEA Fund Partners — site redesign

A static, dependency-free redesign of ideafundpartners.com. Three pages
(`index.html`, `portfolio.html`, `team.html`), one stylesheet, ~60 lines of
vanilla JS, and self-hosted variable fonts (Source Serif 4 + Inter, latin
subset, ~300 KB total). No build step, no framework, no external requests.

## Preview locally

Any static server works:

```
cd ideafund
python3 -m http.server 8000
```

## Deploy

Upload the folder contents to any static host (Netlify, Cloudflare Pages,
S3, GitHub Pages). If the current site stays on Squarespace, this needs to
move to a real host instead — Squarespace can't serve custom pages like
these.

## Notes

- Design system lives entirely in `assets/css/site.css` (custom properties
  at the top control color, type, and spacing).
- The header/footer are duplicated per page on purpose; with only three
  pages, an include system costs more than it saves. If pages multiply,
  fold this into a templating step.
- Facts on the pages (founding year, funds, team roster and titles, exits)
  were compiled from public profiles in August 2026 — worth a pass from the
  firm before launch, especially the team bios and the portfolio
  descriptions.
