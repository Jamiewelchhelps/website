# QED footer — particle dissolve

`qed-dissolve.html` is a self-contained animated footer graphic: no build step,
no dependencies. Open the file in a browser.

**Using real artwork (recommended):** drop an illustration next to the file as
`mountains.png` (or pass `?art=<url>`) and it becomes the artwork — scaled to
cover, anchored bottom-centre, with the logo, grid, links, dissolve and flecks
layered exactly as before. The procedural range below is only the fallback when
no image is present. The fleck spawner reads ink density straight from whatever
was drawn, so debris comes off the image's dark strokes automatically.

## What it does

An engraved pen-and-ink mountain range, a dashed layout grid, the QED lockup and
the three link columns **materialise left-to-right through a noisy threshold
mask**, hold, then dissolve back the same way. Along the moving edge the artwork
breaks into small ink flecks that drift off and fade.

Everything is drawn to a single `<canvas>` in a fixed "design space", so the whole
composition scales as one graphic:

- **Art** — three massifs whose skylines are **explicit polylines digitised from
  the reference frames** (`SIL.back/main/fore`), so the composition — the
  dominant summit right of centre, the tall left peak, the mid saddle — is the
  reference's own. Each polyline is serrated with fine ridged noise; arêtes fan
  from every prominent summit down to an undulating valley floor, and the panels
  between them are hatched as planes under the reference's lighting rule: a
  bright lit face left of every peak, a hard shadow flank falling right into the
  col, couloir channels streaking the faces, and a quiet scree wash below the
  valley line. Plus a conifer treeline. Drawn once into an offscreen canvas.
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
