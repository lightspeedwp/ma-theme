---
name: pattern-extractor
description: Convert Figma designs into ma-theme WordPress block patterns with strict theme.json token mapping, reuse-or-create style workflow, icon discovery/staging, and an approval-first execution gate.
---

# Pattern Extractor (ma-theme)

## Purpose

Use this skill when importing a Figma design into `wp-content/themes/ma-theme/patterns` as a production-ready WordPress block pattern.

This skill is **approval-gated**:

1. Analyze and propose what to create/reuse.
2. Wait for user approval.
3. Implement pattern, styles, and icon assets.

Do not skip the proposal gate.

## Theme scope (source of truth)

Always read and use:

- `wp-content/themes/ma-theme/theme.json` (single source of truth for variables)
- `wp-content/themes/ma-theme/patterns/*.php` (pattern conventions)
- `wp-content/themes/ma-theme/styles/**/*.json` (existing block/section styles)
- `wp-content/themes/ma-theme/styles/animations/**` (reusable animation conventions and motion definitions)

### Required preset families from theme.json

- Colors: `settings.color.palette` (`base`, `contrast`, `neutral-*`, `cta-*`, `brand-*`, `accent-*`, status/focus colors)
- Spacing: `settings.spacing.spacingSizes` (slugs `5` to `100`)
- Font sizes: `settings.typography.fontSizes` (slugs `100` to `900`)
- Font families: `settings.typography.fontFamilies` (`heading`, `body`)
- Shadows: `settings.shadow.presets` (slugs `100` to `600`)
- Radius: `settings.border.radiusSizes` (slugs `0`, `100`..`500`; CSS var namespace `--wp--preset--border-radius--`)
- Custom tokens: `settings.custom.*` (including line-height tokens)

## Inputs

- Figma node URL or node ID
- Optional preferred pattern slug/name
- Optional constraints from user (e.g. “MVP”, “no new styles”, “no new icons”)

## Core block reference (canonical)

Use the official WordPress Core Blocks reference as the canonical block inventory:

- https://developer.wordpress.org/block-editor/reference-guides/core-blocks/

Do not default to generic content blocks when a more semantic core block exists.

## Mandatory workflow

### Phase 1 — Context loading

1. Read `theme.json` and build preset registries for color, spacing, font-size, font-family, shadow, radius.
2. Read 2–4 existing pattern files in `wp-content/themes/ma-theme/patterns`.
3. Scan all style files in:
   - `wp-content/themes/ma-theme/styles/sections/`
   - `wp-content/themes/ma-theme/styles/blocks/`
   - `wp-content/themes/ma-theme/styles/animations/`
4. Read Figma node via:
   - `mcp_figma_dev-mod_get_design_context`
   - `mcp_figma_dev-mod_get_screenshot`

### Phase 2 — Pattern variable identification (required)

Identify **all variables used by the pattern**, including:

- Background/text/border/icon colors
- Spacing (padding, margin, blockGap)
- Typography (font family, size, weight, line-height, letter-spacing)
- Border radius and border width/style
- Shadows
- Motion/animation values (transition properties, duration, easing, delay, transform/opacity behaviors)
- Layout values (content width, columns, alignment, full width)
- Interactive states (hover/focus/active for button-like elements)

Map every design value to the closest existing theme token. Prefer exact slug matches.

Motion guidance:

- Reuse definitions from `styles/animations/**` before creating new motion values.
- Keep transitions in the `150ms` to `250ms` range unless the user explicitly requests otherwise.
- Prefer `200ms` as default UI transition duration.

Hover state guidance:

- Treat hover/active/focus as first-class design tokens during mapping (background, text, border, shadow, transform, opacity).
- Record state deltas explicitly in the proposal (base -> hover, base -> active, base -> focus-visible).
- Ensure keyboard parity: any meaningful hover affordance should have an equivalent `:focus-visible` treatment.

### Phase 2.5 — Context-aware block selection (required)

Infer the correct WordPress core block from design and content intent before writing markup.

Examples of required semantic mapping:

- Author name/avatar/meta → `core/post-author`, `core/post-author-name`, `core/avatar`
- Featured image/media hero → `core/post-featured-image` or `core/image` / `core/cover` by context
- Excerpt/summary text tied to post entity → `core/post-excerpt`
- Post/page titles tied to post entity → `core/post-title`
- Post date/terms/meta → `core/post-date`, `core/post-terms`
- Repeatable post/card listing → `core/query`, `core/post-template`, child post blocks
- Site identity/footer identity → `core/site-title`, `core/site-tagline`, `core/site-logo`
- Navigation intent → `core/navigation` (not manual paragraph link lists)
- CTA link intent → `core/buttons` + `core/button`

Selection rules:

1. Prefer the most semantic block available in core blocks list.
2. Use generic layout/content blocks (`core/group`, `core/columns`, `core/paragraph`, `core/heading`) only when no better semantic block fits.
3. For dynamic content templates/cards, prefer post-aware blocks over static placeholders.
4. Keep block choices consistent with existing ma-theme pattern conventions where semantics are equivalent.

Fallback matrix (use when deciding between dynamic vs static blocks):

| Context                                | Prefer (dynamic/semantic)                                | Fallback (static/generic)                     |
| -------------------------------------- | -------------------------------------------------------- | --------------------------------------------- |
| Single post title in query/template    | `core/post-title`                                        | `core/heading`                                |
| Post excerpt/summary in query/template | `core/post-excerpt`                                      | `core/paragraph`                              |
| Featured image for post entity         | `core/post-featured-image`                               | `core/image` / `core/cover`                   |
| Post author/date/terms/meta            | `core/post-author`, `core/post-date`, `core/post-terms`  | `core/paragraph`                              |
| Repeating list of posts/cards          | `core/query` + `core/post-template`                      | manual `core/columns` / repeated `core/group` |
| Site identity (header/footer)          | `core/site-title`, `core/site-tagline`, `core/site-logo` | heading/paragraph/image                       |
| Navigational menu area                 | `core/navigation`                                        | list/paragraph links                          |
| Action controls                        | `core/buttons` + `core/button`                           | linked text in paragraph                      |

If fallback is used, document the reason in the proposal report.

For each mapped design element, include a confidence score in the proposal:

- `high`: exact semantic match
- `medium`: close semantic match with minor compromise
- `low`: fallback/generic block used

### Phase 3 — Reuse discovery (required before creation)

Before creating anything, determine what can be reused:

1. **Pattern reuse check**
   - Search for similar patterns in `wp-content/themes/ma-theme/patterns`.
   - Detect internal sub-pattern motifs (cards, CTA strips, hero, post cards, query layouts).

2. **Section style reuse check**
   - Search `wp-content/themes/ma-theme/styles/sections/**` for a suitable style.
   - Suitable = same semantic section intent + close token profile (colors/spacing/radius/shadow/layout).

3. **Block style reuse check**
   - For each core block in the pattern (button, separator, cover, quote, etc), search `wp-content/themes/ma-theme/styles/blocks/<block-name>/**`.
   - Reuse if style intent and token profile fit.

4. **Animation style reuse check**
   - Search `wp-content/themes/ma-theme/styles/animations/**` for reusable motion definitions or conventions before adding inline animation CSS.
   - Reuse when timing/easing/transition intent matches (micro-interaction, state transition, reveal).
   - If new animations are needed, add a new definition in `styles/animations/`.

### Phase 4 — Style creation rules (only if no suitable style exists)

If no suitable style exists, create one:

1. **Section style**
   - Path: `wp-content/themes/ma-theme/styles/sections/<suitably-named-subfolder>/<style-slug>.json`
   - If no subfolder exists yet, create one with clear taxonomy (e.g. `cards`, `hero`, `cta`, `content`).
   - `blockTypes` usually includes `core/group` and optionally `core/columns`.

2. **Block style**
   - Path: `wp-content/themes/ma-theme/styles/blocks/<block-name>/<style-slug>.json`
   - Example reference: `wp-content/themes/ma-theme/styles/blocks/button/cta-solid-base.json`

3. **Animation style artifact (when needed)**
   - Path: `wp-content/themes/ma-theme/styles/animations/<style-slug>.json` or companion docs in `wp-content/themes/ma-theme/styles/animations/README.md`.
   - Use for reusable motion contracts (durations/easing/property groups) that multiple block or section styles can follow.

4. **Style constraints**
   - Use only variables/tokens that exist in `theme.json`.
   - Do not introduce hardcoded colors/sizes when a preset exists.
   - Prefer reusable animation definitions from `styles/animations/**` over one-off inline values when repeated usage is likely.
   - Keep durations between `150ms` and `250ms` (default to `200ms`) unless explicitly overridden by the user.
   - Keep style intent narrow and reusable.
   5. **Interactive state constraints (required)**
      - Do not leave interactive states implicit when the design specifies them.
      - Prefer tokenized values for state changes (no hardcoded colors when presets exist).
      - Keep hover/focus/active transitions within `150ms` to `250ms` (default `200ms`).
      - Include `:focus-visible` styles for accessibility whenever hover changes meaningfully affect affordance.

### Phase 5 — Icon discovery and staging

1. Detect all SVG/icon usage from Figma.
2. Check whether each icon already exists in `wp-content/themes/ma-theme/assets/icons/`.
3. If folder does not exist, create `wp-content/themes/ma-theme/assets/icons/`.
4. For missing icons:
   - Prepare normalized SVG files for import into `assets/icons`.
   - Use clear kebab-case names (e.g. `calendar-check.svg`, `arrow-right.svg`).
   - Ensure SVGs are clean and reusable (no unnecessary metadata).

### Phase 6 — Proposal report (must happen before writing pattern/style content)

Return a structured plan and stop for approval.

The report must include:

1. Pattern file to create and final slug/title
2. Existing patterns to reference/reuse
3. Existing section styles to apply
4. Existing block styles to apply per block
5. New section styles to create (with file paths + names/slugs)
6. New block styles to create (with file paths + names/slugs)
7. Variable mapping summary (all token families used)
8. Icons found, existing icons matched, and missing icons with proposed filenames
9. Any assumptions or ambiguities
10. Context-aware block map (`design element -> chosen core block -> why`)
11. Confidence per block decision (`high` / `medium` / `low`)

After report, ask for explicit approval. Do not write final pattern/style files until approved.

### Phase 7 — Implementation after approval

After user confirms:

1. Create/update style files first (section/block styles).
2. Create the pattern in `wp-content/themes/ma-theme/patterns/<pattern-slug>.php`.
3. Apply selected styles in block markup using `className` (e.g. `is-style-...`) instead of duplicating style JSON inline when a style exists.
4. Use WordPress-aligned block comments and valid nested markup.
5. Add translation wrappers and escaping for all user-facing text.
6. Stage any missing icons in `assets/icons/` and reference appropriately.
7. Create a Code Connect mapping to the source Figma component/node when implementation is complete.
   - Tool: `mcp_figma_dev-mod_add_code_connect_map`
   - Required mapping fields:
     - `nodeId`: Figma node ID
     - `source`: pattern file path (for example: `wp-content/themes/ma-theme/patterns/<pattern-slug>.php`)
     - `componentName`: pattern/component name
     - `label`: `WordPress` if available, otherwise `Markdown`
   - Include a short confirmation in the final report that mapping was created.

## Pattern authoring standards (ma-theme)

### Metadata policy

Patterns should include the **maximum useful metadata** unless user says otherwise:

- `Title`
- `Slug` (`ma-theme/<pattern-slug>`)
- `Description`
- `Categories`
- `Keywords`
- `Block Types` (when appropriate)
- `Post Types` (when relevant)
- `Viewport Width`
- `Inserter: yes` by default (unless user says non-insertable)
- `@package Medical Academic`
- `@since <version>`

### Text/i18n policy

- Wrap visible strings with WordPress i18n (`esc_html__`, `esc_html_e`, `esc_attr_e` as appropriate).
- Use text domain: `ma-theme`.
- Escape URLs with `esc_url`.

### Variable format rules

- In block JSON attributes use preset syntax: `var:preset|type|slug`.
- In inline CSS use CSS variable syntax: `var(--wp--preset--type--slug)`.
- For radius in CSS/JSON values, use: `var(--wp--preset--border-radius--<slug>)` (not `--wp--preset--radius--`).
- For reusable motion, prefer values/conventions defined under `styles/animations/**`.
- Keep transition durations between `150ms` and `250ms` (default `200ms`) unless the user specifies otherwise.
- Do not mix formats incorrectly.
- Do not hardcode presentational CSS values in pattern PHP/HTML for card components (no inline `style="..."` for spacing/color/radius/shadow/width). Create/reuse section or block style variations and apply via `is-style-*` classes.

### Card implementation rules (required)

- For post cards with an image + overlaid tag, prefer `core/cover` with `useFeaturedImage:true` over `core/post-featured-image` + negative-margin overlays.
- Keep card content flush against media:
  - Card shell style must enforce `blockGap: 0`.
  - If constrained-flow margins still appear, add explicit CSS resets on immediate children (for example content wrapper `margin-top:0`).
- Align media overlay spacing with card content spacing (for example, cover inner padding equals content padding when specified by design).
- For full-width card actions/dividers, implement reusable block styles (`core/buttons`, `core/separator`) instead of inline width/margin overrides in pattern markup.
- When cards are used in query loops, avoid one-off styling in query pattern files; card visuals must be entirely controlled by reusable style files.

### Hover/active implementation rules (required)

Use this implementation order when creating style JSON files:

1. **Map base styles first**
   - Write base interactive element styles from theme tokens (color, border, radius, spacing, typography, shadow).

2. **Implement state styles in compilable form**
   - For `styles/blocks/button/*.json` variations, encode state selectors in `styles.css` using `&`-based selectors.
   - Preferred pattern:
     - `&{ ...base transition... }`
     - `&:hover{ ... }`
     - `&:focus-visible{ ... }`
     - `&:active{ ... }`
   - Compact example:

```json
{
  "$schema": "https://schemas.wp.org/trunk/theme.json",
  "version": 3,
  "title": "Accent Outline",
  "slug": "accent-outline",
  "blockTypes": ["core/button"],
  "styles": {
    "color": {
      "background": "transparent",
      "text": "var:preset|color|accent"
    },
    "border": {
      "color": "var:preset|color|accent",
      "width": "1px",
      "style": "solid",
      "radius": "var:preset|border-radius|sm"
    },
    "css": "&{transition:background-color 200ms ease,color 200ms ease,border-color 200ms ease;}&:hover{background-color:var(--wp--preset--color--accent);color:var(--wp--preset--color--base);}&:focus-visible{outline:2px solid var(--wp--preset--color--accent);outline-offset:2px;}&:active{background-color:var(--wp--preset--color--accent-700);border-color:var(--wp--preset--color--accent-700);color:var(--wp--preset--color--base);}"
  }
}
```

3. **Avoid non-portable pseudo-state JSON objects unless verified**
   - Do not assume JSON pseudo objects like `":hover"`/`":active"` compile in all variation paths.
   - If runtime support is uncertain, use explicit selectors in `styles.css` for deterministic output.

3.5 **Selector reliability rules (required)**

- Avoid comma-combined `&` selectors in a single rule block when authoring variation `styles.css` strings (for example avoid `&:hover,&:focus-visible{...}`).
- Write each selector as its own explicit rule (`&:hover{...}` and `&:focus-visible{...}`) to prevent malformed compiled selectors.
- Validate generated CSS output for every new interactive style slug after implementation.

4. **Button variation structure**
   - For button block variation partials in `styles/blocks/button/`, keep variation style properties in `styles` (variation root for the button link output path used by this theme).
   - Do not rely on `styles.elements.button` for these partials unless runtime-verified in this repository.

5. **State parity checks**
   - Verify both editor and frontend render hover/active/focus selectors for each new/reused button style slug.
   - Ensure disabled-style variants do not introduce misleading affordances (for example, keep non-interactive cursor and no contrasting hover shift).

### Figma layer-to-block metadata

For container blocks (Group, Columns, Buttons, Cover wrappers), preserve Figma names using block `metadata.name` when useful for editor list view.

### Link behavior mapping (required)

- Map link states from Figma link component naming:
  - **brand links**: `brand-700` default → `brand-500` hover/focus-visible + underline
  - **cta links**: default tokenized CTA base → CTA hover token + underline
  - **default/contrast links**: contrast default → mapped brand/cta hover token (as labeled in Figma node) + underline
- Apply link-state contracts in reusable block styles (`core/post-title`, `core/post-terms`, etc), not inline pattern markup.

## Matching heuristics

When mapping non-exact values, use this order:

1. Exact slug/value
2. Same family nearest numeric step (e.g. `cta-400` → `cta-500` if needed)
3. Semantic fallback (`base`, `contrast`, `neutral-*`)
4. For typography, nearest `font-size` slug by computed rem/px equivalence

Never invent slugs that are not in `theme.json`.

## Validation checklist

- Pattern file created in `wp-content/themes/ma-theme/patterns/`
- Pattern slug and filename align
- Inserter defaults to `yes` unless user overrides
- All text internationalized and escaped
- All style tokens exist in `theme.json`
- Existing suitable styles reused where possible
- New styles only created when needed and saved in correct paths
- Reusable animation definitions reused from `styles/animations/**` when applicable
- New animation definitions created in `styles/animations/` only when reuse is not suitable
- Icons checked in `assets/icons`; missing icons staged with final names
- Block comments and HTML structure are valid and balanced
- Visual layout matches Figma intent
- Hover/active/focus-visible states implemented and token-mapped where specified by design
- Hover/active/focus-visible behavior verified in both editor and frontend for interactive blocks
- Card implementations contain no inline presentational hardcoding in pattern PHP (spacing/color/radius/shadow/width handled by reusable styles)
- Card media/tag overlays use `core/cover` when overlay behavior is required by design
- Card shell/content are visually flush (no unintended top gap between media and content)
- Generated CSS selectors for new variations are syntactically valid (no malformed `:hover`/`:focus` output)

## Reporting template (use before approval)

1. **Pattern**: `<title>` → `wp-content/themes/ma-theme/patterns/<slug>.php`
2. **Reuse: Patterns**: `<list>`
3. **Reuse: Section styles**: `<list>`
4. **Reuse: Block styles**: `<list by block type>`
5. **Create: Section styles**: `<path + title + slug + intent>`
6. **Create: Block styles**: `<path + title + slug + intent>`
7. **Variables mapped**: `<color/spacing/typography/radius/shadow/layout summary>`
8. **Icons**:
   - Existing: `<icon -> file>`
   - Missing: `<icon -> proposed file in assets/icons>`
9. **Need confirmation on**: `<any unresolved naming/style choices>`

Then ask: “Approve this plan and proceed with implementation?”
