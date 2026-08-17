# gocloudforce.com

## Times New Roman font override

`css/times-new-roman.css` forces all site text to Times New Roman.

### How to apply

Pick whichever matches how the site is built:

- **WordPress (any theme)** — Appearance → Customize → Additional CSS, paste
  the file contents, Publish.
- **Elementor** — Site Settings → Custom CSS (Elementor Pro), or use the
  WordPress Customizer route above.
- **Squarespace** — Website → Website Tools → Custom CSS.
- **Webflow** — Project Settings → Custom Code → Head, wrapped in `<style>` tags.
- **Static / custom site** — link the stylesheet *after* the theme CSS:
  `<link rel="stylesheet" href="/css/times-new-roman.css">`

### Notes

- The rules use `!important` so they win against theme styles.
- Icon fonts (Font Awesome, Elementor icons, Dashicons, Material Icons) are
  deliberately excluded — overriding them turns icons into stray letters.
- Code blocks stay monospaced. Delete the last block in the file if you want
  Times New Roman there too.
- If the theme loads a webfont (Google Fonts etc.), this only changes what
  renders; you can also dequeue the webfont afterwards to save a request.
