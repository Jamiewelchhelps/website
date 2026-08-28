# QED footer — particle dissolve

`qed-dissolve.html` is a self-contained animated footer graphic: no build step, no
assets, no dependencies. Open the file in a browser.

## What it does

An engraved pen-and-ink mountain range, a dashed layout grid, the QED lockup and
the three link columns **materialise left-to-right through a noisy threshold
mask**, hold, then dissolve back the same way. Along the moving edge the artwork
breaks into small ink flecks that drift off and fade.

Everything is drawn to a single `<canvas>` in a fixed "design space", so the whole
composition scales as one graphic:

- **Art** — four ridge layers generated from peak humps + fBm detail, shaded with
  fall-line hatching whose density follows the light (upper-left), plus spurs,
  cliff striations, a snowline and a conifer treeline. Drawn once into an
  offscreen canvas.
- **Dissolve** — a low-resolution threshold field `thr = x·(1-EDGE) + noise·EDGE`
  (smooth clumps + per-cell grit). A cell is visible when `progress > thr`, so a
  rising progress value sweeps a ragged front across the frame. Applied with
  `destination-in`.
- **Flecks** — spawned only in cells straddling the front *and* containing ink,
  so debris comes off the drawing, never off blank paper.
- **Type** — redrawn every frame so hover states stay live; transparent, keyboard
  reachable `<a>` elements sit on top for hit-testing and focus.

## Knobs

| constant | effect |
| --- | --- |
| `EDGE` | width of the dissolve band (0.215 ≈ 21% of the frame) |
| `CELL` | mask resolution in CSS px — smaller grain, more cost |
| `RAMP` | per-cell fade, stops cells popping |
| `T_BUILD / T_HOLD / T_ERODE / T_GAP` | timeline, in ms |
| `LAYOUTS.wide` / `LAYOUTS.narrow` | the two compositions (swap at 860px / 1.15 aspect) |
| `RANGE_SPECS` | normalised peaks + ink weights per ridge layer |

`?t=0.6` freezes the dissolve at a given progress for screenshots.
`prefers-reduced-motion: reduce` renders the finished state and never animates.
