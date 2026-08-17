# Drop the current site here

I can't reach gocloudforce.com from this environment (the network policy
blocks it), so I need the existing site provided directly before I can
rebuild it faithfully.

## Best option — save the pages (highest fidelity)

In Chrome or Edge, for each page:

1. Open the page (e.g. https://gocloudforce.com/about-us/)
2. Ctrl+S (Cmd+S on Mac)
3. Set "Save as type" to **Webpage, Complete**
4. Save into this `original/` folder

That captures the HTML, CSS, images and fonts, so I can match the existing
layout, colours and content exactly.

## Also good — page source

Ctrl+U on each page, select all, and paste the source into a file here
named after the page (e.g. `original/about-us.html`).

## Minimum viable — text plus screenshots

Paste the visible text of each page into a `.md` file here, and add a
screenshot of each page as an image. I can rebuild from that, though
spacing and exact styling will be approximations.

## Which pages?

At minimum I need every page that should exist in the rebuild. A quick
list of URLs is enough to tell me the site structure, even if you only
save a couple of them in full.

## What I still need to know

- Where the site is hosted now (WordPress? Squarespace? something else)
  and where the rebuild is meant to be deployed.
- Whether the rebuild should look the same as today (font swapped to
  Times New Roman) or is an opportunity to change the design too.
- Any logo, brand colours, or image assets you want carried over.
