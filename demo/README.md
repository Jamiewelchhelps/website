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

- **Art** — four layers of densely packed, narrow **faceted spires**, generated
  per layer (count, height/width ranges, one dominant summit right of centre).
  A mountain is an apex with a fan of serrated ridge lines falling to its base;
  adjacent ridges bound a facet hatched as one plane — small snow caps, grey
  rock, or cross-hatched near-black shadow, lit from the upper-left, darkening
  toward the foot so the masses connect. Adjacent planes are pushed apart in
  tone so every arête is a hard break; the skyline is the strongest line. Plus
  a conifer treeline. Drawn once into an offscreen canvas.
- **Dissolve** — a low-resolution threshold field `thr = x·(1-EDGE) + noise·EDGE`,
  where the noise mixes three scales: coarse chunks that let go as whole pieces,
  mid grain, and per-cell grit. A cell is visible when `progress > thr`, so a
  rising progress sweeps a ragged front across the frame. Applied with
  `destination-in` and **no upscale smoothing**, so the front stays hard-edged
  broken ink rather than a fade.
- **Flecks** — spawned only in cells straddling the front *and* containing ink,
  so debris comes off the drawing, never off blank paper.
- **Type** — redrawn every frame so hover states stay live; transparent, keyboard
  reachable `<a>` elements sit on top for hit-testing and focus.

## Knobs

| constant | effect |
| --- | --- |
| `EDGE` | width of the dissolve band (0.17 ≈ 17% of the frame); mask noise is small-cluster + sand-grain scaled |
| `CELL` | mask resolution in CSS px — smaller grain, more cost |
| `RAMP` | per-cell fade — near-binary at 0.012, keeps edges hard |
| `T_BUILD / T_HOLD / T_ERODE / T_GAP` | timeline, in ms |
| `LAYOUTS.wide` / `LAYOUTS.narrow` | the two compositions (swap at 860px / 1.15 aspect); `mSpan` is how much of the range a layout shows, so the drawing keeps its proportions |
| `RANGE_SPECS` | normalised peaks + ink weights per ridge layer |

`?t=0.6` freezes the dissolve at a given progress for screenshots.
`prefers-reduced-motion: reduce` renders the finished state and never animates.
