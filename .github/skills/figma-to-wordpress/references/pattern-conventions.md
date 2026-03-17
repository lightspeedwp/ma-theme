# Pattern & Style Conventions (ma-theme)

File format conventions, metadata headers, and style JSON structure for ma-theme.
Use as a template reference when creating new patterns or style files.

---

## PHP Pattern File Format

### Metadata Header

Every pattern in `patterns/` must include this header block:

```php
<?php
/**
 * Title: [Human-Readable Name]
 * Slug: ma-theme/[kebab-case-slug]
 * Description: [One-line description of the pattern]
 * Categories: [category1, category2]
 * Keywords: [keyword1, keyword2, keyword3]
 * Viewport Width: [pixel width for preview, e.g. 1400 or 400]
 * Inserter: [yes|no]
 * Block Types: [optional, e.g. core/query]
 * Post Types: [optional, e.g. webinar, digital_magazine]
 * Template Types: [optional, e.g. archive, category]
 *
 * @package Medical Academic
 * @since 1.0.0
 */
```

**Field rules:**

| Field          | Required | Notes                                                                          |
| -------------- | -------- | ------------------------------------------------------------------------------ |
| Title          | Yes      | Human-readable, used in pattern picker UI                                      |
| Slug           | Yes      | `ma-theme/<kebab-case>`, must match filename                                   |
| Description    | Yes      | Brief purpose description                                                      |
| Categories     | Yes      | Comma-separated. Use existing: `posts`, `featured`, `call-to-action`, `banner` |
| Keywords       | Yes      | Search terms for pattern picker                                                |
| Viewport Width | Yes      | 400 for cards, 1400 for full-width sections                                    |
| Inserter       | Yes      | `yes` by default. `no` for sub-patterns (cards used only inside query loops)   |
| Block Types    | Optional | Only when pattern maps to a specific block type                                |
| Post Types     | Optional | Only for custom post type patterns                                             |
| Template Types | Optional | Only for archive/template-specific patterns                                    |
| @package       | Yes      | Always `Medical Academic`                                                      |
| @since         | Yes      | Current version, typically `1.0.0`                                             |

### PHP Variables for Translatable Text

Define translatable strings as PHP variables before the markup:

```php
$hero_title   = esc_html__( 'Welcome to Our Site', 'ma-theme' );
$button_label = esc_html__( 'Get Started', 'ma-theme' );
?>
<!-- wp:heading ... -->
<h1 ...><?php echo esc_html( $hero_title ); ?></h1>
<!-- /wp:heading -->
```

**Escaping functions:**

- `esc_html__()` / `esc_html_e()` — for visible text content
- `esc_attr__()` / `esc_attr_e()` — for HTML attributes (alt text, aria-label)
- `esc_url()` — for URLs
- Text domain: always `ma-theme`

---

## Style JSON File Format

### Block Style Variation

For block-level visual treatments. Stored in `styles/blocks/<block-name>/<slug>.json`.

```json
{
  "$schema": "https://schemas.wp.org/wp/6.9/theme.json",
  "version": 3,
  "title": "CTA Solid Base",
  "slug": "cta-solid-base",
  "blockTypes": ["core/button"],
  "description": "Use for the primary action on a page.",
  "styles": {
    "color": {
      "background": "var:preset|color|cta-500",
      "text": "var:preset|color|base"
    },
    "border": {
      "radius": "var(--wp--preset--border-radius--200)",
      "width": "1px",
      "style": "solid",
      "color": "var:preset|color|cta-500"
    },
    "spacing": {
      "padding": {
        "top": "var:preset|spacing|5",
        "bottom": "var:preset|spacing|5",
        "left": "var:preset|spacing|10",
        "right": "var:preset|spacing|10"
      }
    },
    "typography": {
      "fontFamily": "var:preset|font-family|body",
      "fontSize": "var:preset|font-size|200",
      "fontWeight": "700",
      "lineHeight": "1.35",
      "letterSpacing": "0.03em"
    },
    "css": "&{transition: background-color 200ms ease, border-color 200ms ease, color 180ms ease;} &:hover{background-color: var(--wp--preset--color--cta-700); color: var(--wp--preset--color--base); border-color: var(--wp--preset--color--cta-700);} &:active{background-color: var(--wp--preset--color--cta-700); color: var(--wp--preset--color--base); border-color: var(--wp--preset--color--cta-700);}"
  }
}
```

**Key rules:**

- `$schema`: Always `https://schemas.wp.org/wp/6.9/theme.json`
- `version`: Always `3`
- `blockTypes`: Array of core block names this style applies to
- `styles.css`: **Required** for all interactive states (`:hover`, `:focus-visible`, `:active`). Always use the `styles.css` field — never use `elements.link.:hover` or other theme.json element state shorthands. Use `&` for self-interactive blocks (buttons) and `& a` for blocks containing links (headings). Write each pseudo-state as a separate rule — never comma-combine selectors.
- All values must reference theme.json tokens — never hardcode colors/sizes

### Heading Link Style Variation

For heading blocks that function as CTA links. Stored in `styles/blocks/heading/<slug>.json`. Uses `& a` descendant selectors in `styles.css` because the interactive element is the child `<a>`, not the heading block itself.

```json
{
  "$schema": "https://schemas.wp.org/wp/6.9/theme.json",
  "version": 3,
  "title": "CTA Link H3",
  "slug": "cta-link-h3",
  "blockTypes": ["core/heading"],
  "description": "H3 heading styled as a CTA link. Default text is contrast, hover and active states change to CTA orange.",
  "styles": {
    "color": {
      "text": "var:preset|color|contrast"
    },
    "typography": {
      "fontFamily": "var:preset|font-family|heading",
      "fontSize": "var:preset|font-size|500",
      "fontWeight": "600",
      "lineHeight": "1.25"
    },
    "elements": {
      "link": {
        "color": { "text": "var:preset|color|contrast" },
        "typography": { "textDecoration": "none" }
      }
    },
    "css": "&{transition: color 200ms ease;} & a{transition: color 200ms ease;} & a:hover{color: var(--wp--preset--color--cta-500); text-decoration: none;} & a:active{color: var(--wp--preset--color--cta-500); text-decoration: none;} & a:focus-visible{color: var(--wp--preset--color--cta-500); outline: 2px solid var(--wp--preset--color--focus-background); outline-offset: 2px;}"
  }
}
```

**Key differences from button styles:**

- `blockTypes`: `["core/heading"]` not `["core/button"]`
- **No border/spacing** — headings are text-only, not boxed components
- **`elements.link`** sets the base link appearance (color, text-decoration) — but hover/active/focus states are still in `styles.css`
- **`& a` selectors** in `css` — the heading block wraps the `<a>` element, so states target `& a:hover` not `&:hover`

### Section Style Variation

For section-level (group) visual treatments. Stored in `styles/sections/<category>/<slug>.json`.

```json
{
  "$schema": "https://schemas.wp.org/wp/6.9/theme.json",
  "version": 3,
  "title": "Dark CTA Section",
  "slug": "dark-cta-section",
  "blockTypes": ["core/group"],
  "description": "Full-width dark section with CTA styling.",
  "styles": {
    "color": {
      "background": "var:preset|color|contrast",
      "text": "var:preset|color|base"
    },
    "spacing": {
      "padding": {
        "top": "var:preset|spacing|70",
        "bottom": "var:preset|spacing|70",
        "left": "var:preset|spacing|30",
        "right": "var:preset|spacing|30"
      }
    }
  }
}
```

### Applying Styles in Pattern Markup

Reference a style variation via `className` in the block comment:

```html
<!-- wp:button {"className":"is-style-cta-solid-base"} -->
<div class="wp-block-button is-style-cta-solid-base">...</div>
<!-- /wp:button -->
```

The `is-style-` prefix maps to the `slug` in the style JSON.

### Section styles over inline styles

Always prefer section styles over inline block attributes for visual properties that will be reused across similar patterns. Section styles can also cascade child block styling via `styles.blocks`.

Example — `styles/sections/cards/card-base.json` (reusable card shell):

```json
{
  "$schema": "https://schemas.wp.org/wp/6.9/theme.json",
  "version": 3,
  "title": "Card Base",
  "slug": "card-base",
  "blockTypes": ["core/group"],
  "description": "Reusable card shell with white background, light border, rounded corners, and base shadow.",
  "styles": {
    "color": {
      "background": "var:preset|color|base",
      "text": "var:preset|color|contrast"
    },
    "border": {
      "radius": "var(--wp--preset--border-radius--200)",
      "width": "1px",
      "style": "solid",
      "color": "var:preset|color|neutral-200"
    },
    "shadow": "var:preset|shadow|200",
    "spacing": { "blockGap": "0" },
    "css": "&{overflow:hidden;}",
    "blocks": {
      "core/post-title": {
        "color": { "text": "var:preset|color|contrast" },
        "typography": { "fontFamily": "var:preset|font-family|heading", "fontWeight": "600", "lineHeight": "1.25" },
        "elements": {
          "link": { "color": { "text": "var:preset|color|contrast" }, ":hover": { "color": { "text": "var:preset|color|cta-700" } } }
        }
      },
      "core/post-terms": {
        "color": { "text": "var:preset|color|cta-700" },
        "typography": { "fontWeight": "700", "textTransform": "uppercase" },
        "elements": {
          "link": { "color": { "text": "var:preset|color|cta-700" }, ":hover": { "color": { "text": "var:preset|color|cta-500" } } }
        }
      },
      "core/post-excerpt": {
        "color": { "text": "var:preset|color|neutral-700" }
      },
      "core/post-date": {
        "color": { "text": "var:preset|color|neutral-700" }
      }
    }
  }
}
```

Applied in pattern markup:

```html
<!-- wp:group {"tagName":"article","className":"is-style-card-base","layout":{"type":"constrained"}} -->
<article class="wp-block-group is-style-card-base">
  <!-- card content blocks — no need to repeat color/border/shadow/typography inline -->
</article>
<!-- /wp:group -->
```

Child blocks (`post-title`, `post-terms`, `post-date`, etc.) inherit their styling from the section style — no inline attributes needed for those properties.

---

## Pattern Composition

### Referencing sub-patterns

When a pattern contains another pattern (e.g. a card inside a query loop, or a hero inside a page layout), always reference it by slug — never duplicate its block markup.

```html
<!-- wp:pattern {"slug":"ma-theme/post-card"} /-->
```

### Page-level composition (Ollie convention)

Page patterns are pure composition — no block markup, only pattern references:

```php
<?php
/**
 * Title: Homepage
 * Slug: ma-theme/page-home
 * Description: Full homepage layout composed of section patterns.
 * Categories: pages
 * Keywords: page, home, layout
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Medical Academic
 * @since 1.0.0
 */
?>
<!-- wp:pattern {"slug":"ma-theme/hero"} /-->
<!-- wp:pattern {"slug":"ma-theme/features"} /-->
<!-- wp:pattern {"slug":"ma-theme/testimonials"} /-->
<!-- wp:pattern {"slug":"ma-theme/call-to-action"} /-->
```

### Query loop + card pattern

```php
<!-- wp:query {"queryId":1,"query":{"perPage":"6","postType":"post","order":"desc","orderBy":"date","inherit":false},"align":"wide"} -->
<div class="wp-block-query alignwide">
	<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
		<!-- wp:pattern {"slug":"ma-theme/post-card"} /-->
	<!-- /wp:post-template -->
</div>
<!-- /wp:query -->
```

---

## Style Directory Organization

> **Important:** The block style library is complete. When building patterns, only use existing styles from this directory via `is-style-<slug>`. Do not create new style JSONs unless the user explicitly requests it.

```
styles/
├── blocks/
│   ├── button/           # Button style variations (21 files)
│   │   ├── cta-solid-{base,medium,small}.json
│   │   ├── cta-outline-{base,medium,small}.json
│   │   ├── brand-solid-{base,medium,small}.json
│   │   ├── brand-outline-{base,medium,small}.json
│   │   ├── accent-solid-{base,medium,small}.json
│   │   ├── accent-outline-{base,medium,small}.json
│   │   └── disabled-{base,medium,small}.json
│   ├── heading/          # Heading link style variations (8 files)
│   │   ├── cta-link-{h3,h4,h5,h6}.json
│   │   └── brand-link-{h3,h4,h5,h6}.json
│   ├── paragraph/        # Paragraph link + badge style variations (26 files)
│   │   ├── cta-link-{large,medium,small,base,tiny}.json
│   │   ├── brand-link-{large,medium,small,base,tiny}.json
│   │   ├── cta-link-category-{base,tiny}.json
│   │   ├── brand-link-category-{base,tiny}.json
│   │   ├── cta-link-{small,base}-colour.json
│   │   ├── brand-link-{small,base}-colour.json
│   │   ├── badge-{cta,brand,accent,white}-solid.json
│   │   └── badge-{cta,brand,accent,white}-outline.json
│   ├── post-terms/       # Post terms style variations (1 file)
│   │   └── cta-category-base.json
│   ├── group/            # Group/container variations (create as needed)
│   ├── separator/        # Separator variations (create as needed)
│   └── <block-name>/     # Other block types
├── sections/
│   ├── cards/            # Card shell styles (card-base.json, card-magazine.json)
│   ├── hero/             # Hero section styles
│   ├── cta/              # CTA section styles
│   └── <category>/       # Other section categories
├── animations/           # Reusable motion definitions (create as needed)
├── mc.json               # Medical Chronicle variant
├── mc-dark.json          # Medical Chronicle dark variant
├── pm.json               # Premium Medical variant
├── pm-dark.json          # Premium Medical dark variant
├── saoj.json             # SAOJ variant
└── sf.json               # Specialist Forum variant
```

**Naming**: `<descriptive-slug>.json` — kebab-case.
**Subfolder taxonomy**: Propose new subfolder names during the proposal phase. User approves.

---

## Existing Patterns (for reuse checking)

Before creating a new pattern, check if one already exists:

| Slug                             | Type                | Inserter |
| -------------------------------- | ------------------- | -------- |
| `ma-theme/post-card`             | Post card           | no       |
| `ma-theme/cpd-card`              | CPD activity card   | no       |
| `ma-theme/webinar-card`          | Webinar card        | yes      |
| `ma-theme/digital-magazine-card` | Magazine card       | yes      |
| `ma-theme/hero`                  | Hero section        | yes      |
| `ma-theme/call-to-action`        | CTA section         | yes      |
| `ma-theme/features`              | Features grid       | yes      |
| `ma-theme/header`                | Site header         | no       |
| `ma-theme/footer`                | Site footer         | no       |
| `ma-theme/query-posts-grid`      | Posts grid (3-col)  | yes      |
| `ma-theme/query-posts-list`      | Posts list          | yes      |
| `ma-theme/testimonials`          | Testimonials        | yes      |
| `ma-theme/pagination`            | Pagination          | yes      |
| `ma-theme/comments`              | Comments            | yes      |
| `ma-theme/post-meta`             | Post metadata       | no       |
| `ma-theme/sidebar`               | Sidebar             | yes      |
| `ma-theme/single-post-content`   | Single post content | yes      |

---

## Theme Variant Awareness

6 color scheme variants exist in `styles/`. Patterns must only use base `theme.json` token slugs — variant overrides happen at the variant JSON level. Never reference variant-specific values.
