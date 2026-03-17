# Theme Token Registry (ma-theme)

Source of truth: `wp-content/themes/ma-theme/theme.json`

Use this file to look up valid token slugs when mapping Figma design values.
Two reference syntaxes per token — use the correct one for the context:

- **Block JSON attributes**: `var:preset|<type>|<slug>`
- **CSS strings** (e.g. `styles.css` in style JSON): `var(--wp--preset--<type>--<slug>)`

---

## Colors (`color`) — 48 total

Block JSON: `var:preset|color|<slug>` · CSS: `var(--wp--preset--color--<slug>)`

### Base / Contrast

| Slug       | Hex     | Usage                       |
| ---------- | ------- | --------------------------- |
| `base`     | #FFFFFF | White / light background    |
| `contrast` | #111111 | Dark text / dark background |

### Neutral (9 shades)

| Slug          | Hex     |
| ------------- | ------- |
| `neutral-100` | #F9F9FA |
| `neutral-200` | #E3E3EA |
| `neutral-300` | #CCCCD5 |
| `neutral-400` | #B7B7BE |
| `neutral-500` | #A4A4A5 |
| `neutral-600` | #878788 |
| `neutral-700` | #6B6B6C |
| `neutral-800` | #4F4F4F |
| `neutral-900` | #323232 |

### CTA — Orange/Red (9 shades)

| Slug      | Hex     |
| --------- | ------- |
| `cta-100` | #FFFBFA |
| `cta-200` | #FDCFC3 |
| `cta-300` | #F9A78E |
| `cta-400` | #F2815D |
| `cta-500` | #E85E2E |
| `cta-600` | #C34719 |
| `cta-700` | #8E3715 |
| `cta-800` | #5B2610 |
| `cta-900` | #5B2610 |

### Brand — Cyan (9 shades)

| Slug        | Hex     |
| ----------- | ------- |
| `brand-100` | #D5F8FF |
| `brand-200` | #83E9FF |
| `brand-300` | #49E0FF |
| `brand-400` | #10D7FF |
| `brand-500` | #00B2D5 |
| `brand-600` | #0085A1 |
| `brand-700` | #00596D |
| `brand-800` | #002E39 |
| `brand-900` | #000405 |

### Accent — Teal (9 shades)

| Slug         | Hex     |
| ------------ | ------- |
| `accent-100` | #C2FDFF |
| `accent-200` | #74F2F7 |
| `accent-300` | #40ECF1 |
| `accent-400` | #14DEE3 |
| `accent-500` | #12A9AC |
| `accent-600` | #117D7E |
| `accent-700` | #0E5253 |
| `accent-800` | #092A2A |
| `accent-900` | #010404 |

### Status

| Slug                     | Hex       | Usage              |
| ------------------------ | --------- | ------------------ |
| `information-foreground` | #0D66D0   | Info text/icons    |
| `information-background` | #0D66D01a | Info panel bg      |
| `success-foreground`     | #138027   | Success text/icons |
| `success-background`     | #1380271a | Success panel bg   |
| `warning-foreground`     | #CB6F0F   | Warning text/icons |
| `warning-background`     | #CB6F0F1a | Warning panel bg   |
| `error-foreground`       | #C9242D   | Error text/icons   |
| `error-background`       | #C9242D1a | Error panel bg     |

### Focus / Interactive

| Slug               | Hex     | Usage                |
| ------------------ | ------- | -------------------- |
| `focus-foreground` | #FFFFFF | Focus ring text      |
| `focus-background` | #00B2D5 | Focus ring / outline |

---

## Spacing (`spacing`)

Block JSON: `var:preset|spacing|<slug>` · CSS: `var(--wp--preset--spacing--<slug>)`

| Slug  | Name     | Value                                                 |
| ----- | -------- | ----------------------------------------------------- |
| `5`   | XXS      | `clamp(0.25rem, calc(0.227rem + 0.006vw), 0.313rem)`  |
| `10`  | XS       | `clamp(0.438rem, calc(0.368rem + 0.018vw), 0.625rem)` |
| `20`  | S        | `clamp(0.875rem, calc(0.736rem + 0.036vw), 1.25rem)`  |
| `30`  | M        | `clamp(1.25rem, calc(1.018rem + 0.06vw), 1.875rem)`   |
| `40`  | L        | `clamp(1.625rem, calc(1.3rem + 0.083vw), 2.5rem)`     |
| `50`  | XL       | `clamp(2.063rem, calc(1.668rem + 0.101vw), 3.125rem)` |
| `60`  | XXL      | `clamp(2.313rem, calc(1.779rem + 0.137vw), 3.75rem)`  |
| `70`  | XXXL     | `clamp(2.625rem, calc(1.975rem + 0.167vw), 4.375rem)` |
| `80`  | XXXXL    | `clamp(3rem, calc(2.257rem + 0.19vw), 5rem)`          |
| `90`  | Giant    | `clamp(3.5rem, calc(2.711rem + 0.202vw), 5.625rem)`   |
| `100` | Colossal | `clamp(4rem, calc(3.164rem + 0.214vw), 6.25rem)`      |

**Quick size guide** (approximate px at 1440px viewport):
5≈5px · 10≈10px · 20≈20px · 30≈30px · 40≈40px · 50≈50px · 60≈60px · 70≈70px · 80≈80px · 90≈90px · 100≈100px

---

## Font Sizes (`font-size`)

Block JSON: `var:preset|font-size|<slug>` · CSS: `var(--wp--preset--font-size--<slug>)`

| Slug  | Name     | Base             | Fluid range      |
| ----- | -------- | ---------------- | ---------------- |
| `100` | Tiny     | 0.75rem (12px)   | 0.7rem → 0.75rem |
| `200` | Base     | 1rem (16px)      | 0.85rem → 1rem   |
| `300` | Small    | 1.15rem (18.4px) | 1rem → 1.15rem   |
| `400` | Medium   | 1.5rem (24px)    | 1.25rem → 1.5rem |
| `500` | Large    | 2rem (32px)      | 1.6rem → 2rem    |
| `600` | X-Large  | 2.5rem (40px)    | 2.1rem → 2.5rem  |
| `700` | Huge     | 3rem (48px)      | 2.4rem → 3rem    |
| `800` | Gigantic | 4rem (64px)      | 3.1rem → 4rem    |
| `900` | Colossal | 5rem (80px)      | 3.5rem → 5rem    |

---

## Font Families (`font-family`)

Block JSON: `var:preset|font-family|<slug>` · CSS: `var(--wp--preset--font-family--<slug>)`

| Slug      | Name       | Stack                    | Weights available  |
| --------- | ---------- | ------------------------ | ------------------ |
| `heading` | Montserrat | `Montserrat, sans-serif` | 100–900            |
| `body`    | Ubuntu     | `Ubuntu, sans-serif`     | 300, 400, 500, 700 |

---

## Shadows (`shadow`)

Block JSON: `var:preset|shadow|<slug>` · CSS: `var(--wp--preset--shadow--<slug>)`

| Slug  | Name    | Value                                    |
| ----- | ------- | ---------------------------------------- |
| `100` | Tiny    | `0.5px 2px 3px 0.5px rgba(17,17,17,0.2)` |
| `200` | Base    | `0.5px 2px 6px 1px rgba(17,17,17,0.2)`   |
| `300` | Small   | `1px 4px 12px 4px rgba(17,17,17,0.2)`    |
| `400` | Medium  | `1px 4px 12px 4px rgba(17,17,17,0.3)`    |
| `500` | Large   | `2px 4px 12px 5px rgba(17,17,17,0.3)`    |
| `600` | X-Large | `2px 6px 12px 6px rgba(17,17,17,0.3)`    |

---

## Border Radius (`border-radius`)

CSS only (no block JSON shorthand): `var(--wp--preset--border-radius--<slug>)`

In block JSON `style.border.radius`, use the CSS variable string directly:
`"radius": "var(--wp--preset--border-radius--200)"`

| Slug  | Name    | Value    |
| ----- | ------- | -------- |
| `0`   | none    | `0`      |
| `100` | small   | `4px`    |
| `200` | medium  | `8px`    |
| `300` | large   | `16px`   |
| `400` | x-large | `24px`   |
| `500` | round   | `9999px` |

---

## Layout

| Property    | Value    |
| ----------- | -------- |
| contentSize | `768px`  |
| wideSize    | `1280px` |

---

## Custom Tokens

CSS: `var(--wp--custom--<path-with-dashes>)`

### Line Heights

| Path                 | Value  |
| -------------------- | ------ |
| `lineHeight.heading` | `1.25` |
| `lineHeight.body`    | `1.5`  |

### Color Aliases

| Path                        | Maps to     |
| --------------------------- | ----------- | ----- | ------------ |
| `color.txt.base`            | `var:preset | color | base`        |
| `color.txt.grey`            | `var:preset | color | neutral-700` |
| `color.txt.contrast`        | `var:preset | color | contrast`    |
| `color.bg.base`             | `var:preset | color | base`        |
| `color.bg.cta`              | `var:preset | color | cta-100`     |
| `color.bg.brand`            | `var:preset | color | brand-100`   |
| `color.bg.accent`           | `var:preset | color | accent-100`  |
| `color.input.background`    | `var:preset | color | neutral-100` |
| `color.input.border`        | `var:preset | color | neutral-500` |
| `color.input.text`          | `var:preset | color | neutral-700` |
| `color.disabled.background` | `var:preset | color | neutral-200` |
| `color.disabled.border`     | `var:preset | color | neutral-600` |
| `color.disabled.text`       | `var:preset | color | neutral-600` |
| `color.cta.light`           | `var:preset | color | cta-100`     |
| `color.cta.core`            | `var:preset | color | cta-500`     |
| `color.cta.dark`            | `var:preset | color | cta-800`     |
| `color.brand.light`         | `var:preset | color | brand-100`   |
| `color.brand.core`          | `var:preset | color | brand-500`   |
| `color.brand.dark`          | `var:preset | color | brand-700`   |
| `color.accent.light`        | `var:preset | color | accent-100`  |
| `color.accent.core`         | `var:preset | color | accent-500`  |
| `color.accent.dark`         | `var:preset | color | accent-700`  |

---

## Matching Heuristic

When a Figma value doesn't have an exact token match:

1. **Exact hex match** — search this registry for the hex value
2. **Same family, nearest step** — e.g. Figma #E85E2E → `cta-500`, Figma #C44A1A → `cta-600`
3. **Semantic fallback** — `base`, `contrast`, `neutral-*`
4. **Ask user** — if no reasonable match exists within ±1 step
