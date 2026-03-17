---
name: figma-to-wordpress
description: "Import Figma design nodes into ma-theme as WordPress block patterns (PHP), style JSON variations, HTML template parts/templates, or a combination. Handles token mapping from Figma variables to theme.json presets, semantic WordPress block selection, pattern composition via wp:pattern references, and reuse of existing styles/patterns. Use when the user provides a Figma node URL or ID and wants to create theme artifacts from it. Supports simple components (buttons, separators) to complex layouts (cards, heroes, page templates). Approval-gated: always proposes before implementing."
---

# Figma to WordPress (ma-theme)

## Purpose

Convert Figma design system nodes into production-ready WordPress theme artifacts for `wp-content/themes/ma-theme/`. This skill is **approval-gated** — always propose first, implement only after user confirms.

## Source of Truth

- **Token registry**: read `references/token-registry.md` (bundled with this skill) for all valid token slugs
- **Block markup**: read `references/block-markup.md` (bundled) for valid WordPress block comment syntax
- **Pattern conventions**: read `references/pattern-conventions.md` (bundled) for file format, metadata headers, style JSON structure
- **Live theme.json**: `wp-content/themes/ma-theme/theme.json`
- **Existing styles**: `wp-content/themes/ma-theme/styles/**/*.json`
- **Existing patterns**: `wp-content/themes/ma-theme/patterns/*.php`
- **Ollie patterns** (convention reference): `wp-content/themes/ollie/patterns/*.php`

## Inputs

- Figma node URL or node ID (required)
- Preferred slug/name (optional)
- Output type (optional — ask if not specified)
- Constraints: e.g. "no new styles", "MVP", "no icons" (optional)

## Output Types

The skill produces one of three artifact types. If the user does not specify which, **ask before proceeding**.

### 1. Style JSON only

**When**: The Figma node defines a visual treatment without content structure — button variants, card shells, section backgrounds, separator styles.
**Creates**: `styles/blocks/<block-name>/<slug>.json` or `styles/sections/<category>/<slug>.json`
**Does not create**: Any PHP pattern or HTML template.

> **Note:** The design system style library is complete. Only create new style JSONs if the user explicitly requests it. See "Use only existing styles" in Critical Rules.

### 2. PHP pattern or HTML template/part

**When**: The Figma node defines a content structure with blocks, text, and layout — cards, heroes, CTAs, page sections.
**Creates**: `patterns/<slug>.php` (for insertable patterns) or `templates/<slug>.html` / `parts/<slug>.html` (for templates/parts).
**Style references**: Uses existing `is-style-*` classes only. Do not create new style JSON — choose the closest match from the available styles registry.

### 3. Both (style JSON + pattern/template)

**When**: The node needs a new reusable style variation AND a content structure that applies it. Only valid if the user explicitly requests a new style.
**Creates**: Style JSON first, then the pattern/template referencing it via `is-style-<slug>`.

> **Default behaviour**: Prefer output type 2 (pattern/template using existing styles). Only propose type 1 or 3 if no existing style fits and the user confirms.

---

## Workflow

### Phase 1 — Read context

Run these in parallel:

1. **Read Figma node** — use `mcp_figma_dev-mod_get_design_context` and `mcp_figma_dev-mod_get_screenshot` to understand structure, layers, and visual intent. Use `mcp_figma_dev-mod_get_variable_defs` to extract design tokens/variables.

2. **Read skill references** — load `references/token-registry.md` for token lookup. Load `references/block-markup.md` for valid block syntax. Load `references/pattern-conventions.md` for file format templates.

3. **Read existing theme artifacts** — scan `styles/blocks/` and `styles/sections/` for reusable style variations. Read 2-3 existing patterns from `patterns/` and `wp-content/themes/ollie/patterns/` to match conventions.

### Phase 2 — Map and plan

#### Determine output type

If the user didn't specify, ask:

> "This Figma node looks like a [card/section/button variant/page layout]. Should I create: (1) a style JSON only, (2) a PHP pattern, or (3) both?"

#### Map Figma values to tokens

For every design value in the Figma node (colors, spacing, typography, borders, shadows, radius):

1. Read `references/token-registry.md`
2. Find the exact hex/value match → use that slug
3. If no exact match, find nearest step in the same family (e.g. `cta-400` → `cta-500`)
4. If the value appears hardcoded/detached in Figma, tell the user: "This value `#XYZ` doesn't match any token exactly. The closest is `<slug>` (`#ABC`). Should I use that, or do you want to add a new token?"
5. Never invent token slugs that don't exist in theme.json

#### Select WordPress blocks

For each design element, choose the most semantic WordPress core block:

| Design element                   | Preferred block                                         | Fallback                    |
| -------------------------------- | ------------------------------------------------------- | --------------------------- |
| Post/page title in query context | `core/post-title`                                       | `core/heading`              |
| Post excerpt in query context    | `core/post-excerpt`                                     | `core/paragraph`            |
| Featured image for post          | `core/post-featured-image`                              | `core/image`                |
| Image with text overlay          | `core/cover`                                            | `core/group` + `core/image` |
| Author, date, categories         | `core/post-author`, `core/post-date`, `core/post-terms` | `core/paragraph`            |
| Repeating post list              | `core/query` + `core/post-template`                     | manual columns              |
| Navigation                       | `core/navigation`                                       | link lists                  |
| Icons / SVG graphics             | `outermost/icon-block`                                  | never use `core/image`      |
| CTA buttons                      | `core/buttons` + `core/button`                          | linked paragraph            |
| Site identity                    | `core/site-title`, `core/site-logo`                     | heading/image               |

Read `references/block-markup.md` for the exact block comment syntax for each.

#### Check reuse opportunities

Before creating anything new:

1. **Existing patterns** — Does `patterns/` already have a pattern for this component? If yes, reference it with `<!-- wp:pattern {"slug":"ma-theme/<slug>"} /-->` instead of recreating.
2. **Existing styles** — Check the "Available block style variations" registry in Critical Rules. Always apply via `is-style-<slug>` class. Do not create new style JSONs.
3. **Sub-patterns** — If the Figma node contains sub-components that already exist as patterns (cards, headers, CTAs), reference them via `wp:pattern` rather than writing their markup inline.

### Phase 3 — Propose (STOP for approval)

Present a structured proposal:

```
## Proposal: [Pattern Name]

**Output type**: [Style JSON only | PHP pattern | Both]
**File(s) to create**:
- `styles/blocks/<block>/slug.json` (if applicable)
- `patterns/<slug>.php` (if applicable)

**Reusing**:
- Patterns: [list of referenced ma-theme patterns]
- Styles: [list of is-style-* classes from existing style JSONs]

**Creating new**:
- Styles: [path + slug + intent for each new style JSON]

**Block map**:
| Figma layer | WordPress block | Confidence |
|---|---|---|
| [layer name] | core/[block] | high/medium/low |

**Token mapping summary**:
- Colors: [slugs used]
- Spacing: [slugs used]
- Typography: [sizes/families/weights]
- Borders: [radius/width]
- Shadows: [if any]

**Unresolved questions**: [any ambiguities or detached values]
```

Then ask: **"Approve this plan? Any changes before I implement?"**

Do not create any files until the user approves.

### Phase 4 — Implement (after approval)

1. Create style JSON files first (if any)
2. Create the pattern PHP or template HTML
3. Follow conventions from `references/pattern-conventions.md`:
   - Full metadata header with all applicable fields
   - `@package Medical Academic` / `@since 1.0.0`
   - i18n wrapping on all visible text (`esc_html__`, `esc_html_e`, `esc_attr_e`)
   - Text domain: `ma-theme`
4. Follow block syntax from `references/block-markup.md` exactly
5. Reference tokens from `references/token-registry.md` — never hardcode values

### Phase 5 — Clean up Figma-imported assets

The `mcp_figma_dev-mod_get_design_context` tool writes hash-named image and SVG files (e.g. `029ae3b1a24fe…png`) into the `dirForAssetWrites` directory. These are **not used** in WordPress patterns — patterns reference dynamic post data or theme-bundled assets, never Figma export hashes.

After implementation is complete, **always** delete these artifacts:

```bash
# Remove all hash-named Figma exports from assets/
cd assets/ && ls | grep -E '^[0-9a-f]{20,}\.(png|svg)$' | xargs rm -f
```

**Rules:**

- Only delete files whose names are 20+ hex characters followed by `.png` or `.svg` — these are Figma MCP artifacts.
- Never delete subdirectories (`fonts/`, `logos/`, etc.) or human-named files.
- Run this cleanup in every workflow invocation, even if the pattern doesn't reference images.

---

## Critical Rules

### No hardcoded values

Every color, spacing, font size, shadow, and radius must reference a theme.json token. If a value cannot be mapped to an existing token, ask the user — do not hardcode it.

### Two variable syntaxes (never mix them up)

- **Block JSON attributes** (inside `<!-- wp:block {...} -->`): `var:preset|type|slug`
  - Exception: top-level shorthand attributes (`backgroundColor`, `textColor`, `fontSize`, `fontFamily`, `borderColor`) take the slug directly, e.g. `"backgroundColor": "cta-500"`
- **CSS strings** (inside `styles.css`, inline `style=""` attributes): `var(--wp--preset--type--slug)`
- **Border radius** is always CSS variable format: `"radius": "var(--wp--preset--border-radius--200)"`

### Pattern composition over duplication

If the design contains a sub-component that already exists as an ma-theme pattern, always use `<!-- wp:pattern {"slug":"ma-theme/<slug>"} /-->`. Never duplicate the sub-pattern's block markup inside a parent pattern.

Patterns referenced as JSON-only styles are applied via `is-style-<slug>` classes — they are not embedded.

### Semantic block selection

Always prefer the most semantic core block. Use `references/block-markup.md` for the exact syntax. Only fall back to generic blocks (`core/group`, `core/paragraph`) when no semantic block fits.

### Section styles over inline styles

Always prefer creating or reusing a section style (`styles/sections/`) over applying visual properties inline in pattern block attributes. Section styles are reusable across multiple patterns that share the same visual shell (e.g. cards, hero sections, CTA blocks). They can also style child blocks via `styles.blocks` — use this to set default colors, typography, and link styles for blocks inside the section rather than repeating those attributes in every block comment.

**Workflow**: If the Figma node has a visual treatment (border, shadow, radius, background, child block styling) that will be shared across similar patterns, create a section style first, then apply it to the pattern via `is-style-<slug>`. Only use inline block attributes for values that are unique to that specific pattern instance (e.g. a content-width override, a one-off spacing adjustment).

### Use only existing styles — never create new style JSONs

The design system's block style variations are **complete**. When building patterns or templates, only reference styles that already exist in `styles/blocks/` and `styles/sections/`. Apply them via `is-style-<slug>` class names. **Do not create new style JSON files** unless the user explicitly requests it.

If a Figma node uses a visual treatment that doesn't map to any existing style, ask:

> "This component uses [describe treatment]. I don't see a matching style in `styles/blocks/`. Should I (1) use the closest existing style `<slug>`, or (2) create a new style JSON for it?"

#### Available block style variations

**Button** (`styles/blocks/button/`) — 21 styles:

| Slug                    | Type                        |
| ----------------------- | --------------------------- |
| `cta-solid-base`        | CTA solid, base size        |
| `cta-solid-medium`      | CTA solid, medium size      |
| `cta-solid-small`       | CTA solid, small size       |
| `cta-outline-base`      | CTA outline, base size      |
| `cta-outline-medium`    | CTA outline, medium size    |
| `cta-outline-small`     | CTA outline, small size     |
| `brand-solid-base`      | Brand solid, base size      |
| `brand-solid-medium`    | Brand solid, medium size    |
| `brand-solid-small`     | Brand solid, small size     |
| `brand-outline-base`    | Brand outline, base size    |
| `brand-outline-medium`  | Brand outline, medium size  |
| `brand-outline-small`   | Brand outline, small size   |
| `accent-solid-base`     | Accent solid, base size     |
| `accent-solid-medium`   | Accent solid, medium size   |
| `accent-solid-small`    | Accent solid, small size    |
| `accent-outline-base`   | Accent outline, base size   |
| `accent-outline-medium` | Accent outline, medium size |
| `accent-outline-small`  | Accent outline, small size  |
| `disabled-base`         | Disabled, base size         |
| `disabled-medium`       | Disabled, medium size       |
| `disabled-small`        | Disabled, small size        |

**Heading** (`styles/blocks/heading/`) — 8 styles:

| Slug            | Type                  |
| --------------- | --------------------- |
| `cta-link-h3`   | CTA link heading H3   |
| `cta-link-h4`   | CTA link heading H4   |
| `cta-link-h5`   | CTA link heading H5   |
| `cta-link-h6`   | CTA link heading H6   |
| `brand-link-h3` | Brand link heading H3 |
| `brand-link-h4` | Brand link heading H4 |
| `brand-link-h5` | Brand link heading H5 |
| `brand-link-h6` | Brand link heading H6 |

**Paragraph** (`styles/blocks/paragraph/`) — 26 styles:

| Slug                       | Type                      |
| -------------------------- | ------------------------- |
| `cta-link-large`           | CTA link, large           |
| `cta-link-medium`          | CTA link, medium          |
| `cta-link-small`           | CTA link, small           |
| `cta-link-base`            | CTA link, base            |
| `cta-link-tiny`            | CTA link, tiny            |
| `cta-link-category-base`   | CTA category link, base   |
| `cta-link-category-tiny`   | CTA category link, tiny   |
| `cta-link-small-colour`    | CTA colour link, small    |
| `cta-link-base-colour`     | CTA colour link, base     |
| `brand-link-large`         | Brand link, large         |
| `brand-link-medium`        | Brand link, medium        |
| `brand-link-small`         | Brand link, small         |
| `brand-link-base`          | Brand link, base          |
| `brand-link-tiny`          | Brand link, tiny          |
| `brand-link-category-base` | Brand category link, base |
| `brand-link-category-tiny` | Brand category link, tiny |
| `brand-link-small-colour`  | Brand colour link, small  |
| `brand-link-base-colour`   | Brand colour link, base   |
| `badge-cta-solid`          | Badge CTA solid           |
| `badge-brand-solid`        | Badge Brand solid         |
| `badge-accent-solid`       | Badge Accent solid        |
| `badge-white-solid`        | Badge White solid         |
| `badge-cta-outline`        | Badge CTA outline         |
| `badge-brand-outline`      | Badge Brand outline       |
| `badge-accent-outline`     | Badge Accent outline      |
| `badge-white-outline`      | Badge White outline       |

**Post Terms** (`styles/blocks/post-terms/`) — 1 style:

| Slug                | Type                          |
| ------------------- | ----------------------------- |
| `cta-category-base` | CTA category terms, uppercase |

**Section** (`styles/sections/`) — 2 styles:

| Slug            | Type                                                  |
| --------------- | ----------------------------------------------------- |
| `card-base`     | Base card shell (border, shadow lift on hover)        |
| `card-magazine` | Magazine card shell (no border, image zooms on hover) |

### Icons — use the Icon Block with Phosphor Icons only

All icons in patterns and templates must use the **Icon Block** plugin (`outermost/icon-block`). Never use inline `<svg>` elements, `<img>` tags, or `core/image` for icons.

**Icon source**: Icons must come exclusively from [Phosphor Icons](https://phosphoricons.com/). Copy the SVG markup from the Phosphor Icons website and paste it into the Icon Block's `icon` attribute.

**Figma icon matching**: When a Figma design contains an icon, find the closest or equivalent match in the Phosphor Icons set. If no exact match exists, choose the nearest visual equivalent and note the substitution in the proposal.

**Block markup example**:

```html
<!-- wp:outermost/icon-block {"iconName":"","iconColor":"cta-500","iconColorValue":"var(--wp--preset--color--cta-500)","width":"24px"} -->
<div class="wp-block-outermost-icon-block">
  <div class="icon-container has-cta-500-color" style="color:var(--wp--preset--color--cta-500);width:24px">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><!-- Phosphor icon SVG path here --></svg>
  </div>
</div>
<!-- /wp:outermost/icon-block -->
```

**Color**: Use theme.json color token slugs via `iconColor` / `iconColorValue`. Never hardcode hex values.
**Size**: Use `width` attribute (e.g. `"24px"`, `"32px"`, `"48px"`). Height scales proportionally.

### Import order: small to large

Components should be imported bottom-up — small atomic components first (buttons, badges, separators), then cards, then sections, then page layouts. This ensures sub-patterns exist before parent patterns reference them.

### Pattern metadata

Include the maximum useful metadata in pattern headers. See `references/pattern-conventions.md` for the full field list and examples.

### Theme variant safety

Use only base `theme.json` tokens. The 6 color variants (`mc.json`, `pm.json`, etc.) override at the variant level — patterns must not reference variant-specific values.

### Hover/active/focus-visible states — always use `styles.css`

All interactive states (hover, active, focus-visible) **must** be implemented in the style JSON `styles.css` field using `&` selectors — never via `elements.link.:hover` or any other theme.json shorthand for hover/active/focus states. The `styles.css` approach is the single source of truth for state styling across all block types (buttons, headings, links, groups, etc.).

Write each pseudo-state as a separate rule — never comma-combine selectors:

**Buttons and self-interactive blocks** (the block itself is the interactive element):

```
&{transition: background-color 200ms ease;} &:hover{...} &:focus-visible{...} &:active{...}
```

**Headings and blocks containing links** (child `<a>` elements are interactive):

```
&{transition: color 200ms ease;} & a{transition: color 200ms ease;} & a:hover{...} & a:active{...} & a:focus-visible{...}
```

Keep transitions between 150ms and 250ms (default 200ms). Include `:focus-visible` for accessibility whenever hover changes affordance.

**Why `styles.css` over `elements.link.:hover`?**

- Consistent approach across all block types — one pattern to learn
- Full control over transition timing, cursor, pointer-events, and outline styles
- Supports complex selectors (descendant `& a`)
- Avoids WordPress theme.json merge quirks with nested element state objects

---

## Reference Files

When you need to look up tokens, block syntax, or file formats, read these bundled references:

| Need                                                              | File                                |
| ----------------------------------------------------------------- | ----------------------------------- |
| Token slugs and values                                            | `references/token-registry.md`      |
| Valid block comment syntax                                        | `references/block-markup.md`        |
| Pattern header format, style JSON format, composition conventions | `references/pattern-conventions.md` |

Also read existing patterns for convention reference:

- **ma-theme patterns**: `wp-content/themes/ma-theme/patterns/*.php`
- **Ollie patterns** (gold standard for composition): `wp-content/themes/ollie/patterns/*.php`

---

## Validation Checklist

Before delivering any file, verify:

- [ ] All values reference theme.json tokens (no hardcoded colors/sizes/spacing)
- [ ] Block JSON uses `var:preset|type|slug`; CSS uses `var(--wp--preset--type--slug)`
- [ ] All text wrapped in i18n functions with `ma-theme` text domain
- [ ] Pattern slug matches filename: `ma-theme/<slug>` → `patterns/<slug>.php`
- [ ] Existing patterns referenced via `wp:pattern`, not duplicated
- [ ] Existing style variations reused via `is-style-*` — no new style JSONs created without explicit user request
- [ ] Block comments are valid and properly closed (every `<!-- wp:X -->` has `<!-- /wp:X -->`)
- [ ] HTML tags match block comment tags (e.g. `group` with `tagName:"article"` → `<article>`)
- [ ] **Block validation**: inner HTML classes/styles match the block comment attributes exactly (see rules below)
- [ ] Style JSON files have `$schema`, `version: 3`, `title`, `slug`, `blockTypes`
- [ ] Metadata header includes all applicable fields per `references/pattern-conventions.md`
- [ ] Interactive styles use separate `&:hover`, `&:focus-visible`, `&:active` selectors (not comma-combined)
- [ ] Figma layer ordering matches block ordering top-to-bottom
- [ ] Separator placement matches the visual divider position in the Figma design exactly

### Block validation rules

WordPress validates every block by comparing the block comment JSON to the inner HTML. Mismatches cause "Block contains unexpected or invalid content" errors. Key rules:

1. **Cover block with `contentPosition`**: The outer `<div>` MUST include `has-custom-content-position is-position-{position}` classes (e.g. `is-position-top-right`). Missing these causes validation failure.
2. **Cover block with `useFeaturedImage` + `dimRatio:0`**: MUST include `customOverlayColor` and `isUserOverlayColor:false` in the block comment. The overlay `<span>` must have `style="background-color:..."` matching the overlay color.
3. **Cover block dimensions**: Do NOT put `aspect-ratio` or `min-height:unset` as inline styles. WordPress renders dimensions from `style.dimensions.aspectRatio` in the block comment automatically.
4. **Border properties**: If `border.radius` is set, also include `border.width` (e.g. `"1px"`) in the block comment. The inner HTML needs `border-width:1px` in its style attribute.
5. **CSS variables in JSON**: Use unicode escapes for `--` in JSON strings: `\u002d\u002d` (e.g. `var(\u002d\u002dwp\u002d\u002dpreset\u002d\u002dborder-radius\u002d\u002d100)`).
6. **Whitespace**: WordPress editor saves blocks without indentation — no tabs before block comments. Closing tags run directly into opening tags. Match this format exactly.
7. **Class order**: Class names in HTML must match the order WordPress generates them. Use `references/block-markup.md` as reference.
