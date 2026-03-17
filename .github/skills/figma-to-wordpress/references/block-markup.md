# WordPress Block Markup Reference

Valid block comment examples for pattern authoring in ma-theme.
Each example is copy-paste-ready. Use these as templates — never invent block comment syntax.

**Canonical block inventory**: https://developer.wordpress.org/block-editor/reference-guides/core-blocks/

---

## Variable Syntax Quick Reference

| Context                           | Syntax                          | Example                                                                      |
| --------------------------------- | ------------------------------- | ---------------------------------------------------------------------------- |
| Block JSON attribute values       | `var:preset\|type\|slug`        | `"backgroundColor": "cta-500"` or `"fontSize": "var:preset\|font-size\|400"` |
| Inline CSS / `styles.css` in JSON | `var(--wp--preset--type--slug)` | `var(--wp--preset--color--cta-500)`                                          |

**Shorthand color/fontSize/fontFamily**: Some block attributes accept the slug directly:

- `"backgroundColor": "cta-500"` (not `var:preset|color|cta-500`)
- `"textColor": "contrast"` (not `var:preset|color|contrast`)
- `"fontSize": "400"` (slug directly)
- `"fontFamily": "heading"` (slug directly)

**Inside `style` object**: Use the `var:preset|type|slug` format:

- `"style": {"spacing": {"padding": {"top": "var:preset|spacing|30"}}}`
- `"style": {"typography": {"fontSize": "var:preset|font-size|400"}}`

---

## Layout Containers

### Group — Constrained (centered content, max-width)

```html
<!-- wp:group {"metadata":{"name":"Section Name"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|40"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--30)">
  <!-- child blocks here -->
</div>
<!-- /wp:group -->
```

### Group — Flex Row (horizontal)

```html
<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"},"fontSize":"300"} -->
<div class="wp-block-group has-300-font-size">
  <!-- child blocks here -->
</div>
<!-- /wp:group -->
```

### Group — Flex Column (vertical stack)

```html
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group">
  <!-- child blocks here -->
</div>
<!-- /wp:group -->
```

### Group — With semantic tag

```html
<!-- wp:group {"tagName":"article","style":{"spacing":{"blockGap":"var:preset|spacing|20"},"border":{"radius":"8px","width":"1px"}},"borderColor":"neutral-900","layout":{"type":"constrained"}} -->
<article class="wp-block-group has-border-color has-neutral-900-border-color" style="border-width:1px;border-radius:8px">
  <!-- child blocks here -->
</article>
<!-- /wp:group -->
```

### Columns + Column

```html
<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns alignwide">
  <!-- wp:column {"width":"50%"} -->
  <div class="wp-block-column" style="flex-basis:50%">
    <!-- child blocks -->
  </div>
  <!-- /wp:column -->
  <!-- wp:column {"width":"50%"} -->
  <div class="wp-block-column" style="flex-basis:50%">
    <!-- child blocks -->
  </div>
  <!-- /wp:column -->
</div>
<!-- /wp:columns -->
```

---

## Typography Blocks

### Heading

```html
<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontWeight":"700"}},"fontSize":"600"} -->
<h2 class="wp-block-heading has-text-align-center has-600-font-size" style="font-weight:700"><?php esc_html_e( 'Heading Text', 'ma-theme' ); ?></h2>
<!-- /wp:heading -->
```

Level 1 example:

```html
<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontWeight":"700"}},"fontSize":"700"} -->
<h1 class="wp-block-heading has-text-align-center has-700-font-size" style="font-weight:700"><?php echo esc_html( $hero_title ); ?></h1>
<!-- /wp:heading -->
```

### Paragraph

```html
<!-- wp:paragraph {"align":"center","textColor":"neutral-700","fontSize":"300"} -->
<p class="has-text-align-center has-neutral-700-color has-text-color has-300-font-size"><?php esc_html_e( 'Description text here.', 'ma-theme' ); ?></p>
<!-- /wp:paragraph -->
```

With inline typography styles:

```html
<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"cta-500","fontSize":"200"} -->
<p class="has-cta-500-color has-text-color has-200-font-size" style="font-style:normal;font-weight:500"><?php esc_html_e( 'Label text', 'ma-theme' ); ?></p>
<!-- /wp:paragraph -->
```

---

## Media Blocks

### Image

```html
<!-- wp:image {"sizeSlug":"full","linkDestination":"none","align":"wide"} -->
<figure class="wp-block-image alignwide size-full"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/patterns/images/example.webp" alt="<?php esc_attr_e( 'Description', 'ma-theme' ); ?>" /></figure>
<!-- /wp:image -->
```

### Cover (with overlay)

```html
<!-- wp:cover {"dimRatio":60,"overlayColor":"contrast","minHeight":600,"contentPosition":"center center","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);min-height:600px">
  <span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-60 has-background-dim"></span>
  <div class="wp-block-cover__inner-container">
    <!-- child blocks -->
  </div>
</div>
<!-- /wp:cover -->
```

### Cover (with featured image for cards)

**Critical:** When `useFeaturedImage:true` with `dimRatio:0`, you MUST include `customOverlayColor` and `isUserOverlayColor:false`. The overlay `<span>` must have a matching `style="background-color:..."`. Do NOT put `aspect-ratio` or `min-height` as inline styles on the div — WordPress handles that from `style.dimensions.aspectRatio` in the block comment.

```html
<!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"customOverlayColor":"#FFF","isUserOverlayColor":false,"contentPosition":"top right","isDark":false,"style":{"dimensions":{"aspectRatio":"2/1"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}}}} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-top-right" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">
  <span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#FFF"></span>
  <div class="wp-block-cover__inner-container">
    <!-- overlay content like badges -->
  </div>
</div>
<!-- /wp:cover -->
```

**Cover with overlay color (non-zero dimRatio):**

```html
<!-- wp:cover {"useFeaturedImage":true,"dimRatio":30,"overlayColor":"contrast","contentPosition":"bottom left","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left">
  <span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-30 has-background-dim"></span>
  <div class="wp-block-cover__inner-container">
    <!-- overlay content -->
  </div>
</div>
<!-- /wp:cover -->
```

---

## Button Blocks

### Buttons container + Button

```html
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
<div class="wp-block-buttons">
  <!-- wp:button {"className":"is-style-cta-solid-base"} -->
  <div class="wp-block-button is-style-cta-solid-base">
    <a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Get Started', 'ma-theme' ); ?></a>
  </div>
  <!-- /wp:button -->
  <!-- wp:button {"className":"is-style-brand-outline-base"} -->
  <div class="wp-block-button is-style-brand-outline-base">
    <a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Learn More', 'ma-theme' ); ?></a>
  </div>
  <!-- /wp:button -->
</div>
<!-- /wp:buttons -->
```

Available button style slugs (from `styles/blocks/button/`):
`cta-solid-base`, `cta-solid-medium`, `cta-solid-small`,
`cta-outline-base`, `cta-outline-medium`, `cta-outline-small`,
`brand-solid-base`, `brand-solid-medium`, `brand-solid-small`,
`brand-outline-base`, `brand-outline-medium`, `brand-outline-small`,
`accent-solid-base`, `accent-solid-medium`, `accent-solid-small`,
`accent-outline-base`, `accent-outline-medium`, `accent-outline-small`,
`disabled-base`, `disabled-medium`, `disabled-small`

Full-width button:

```html
<!-- wp:button {"width":100,"className":"is-style-cta-solid-base"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-cta-solid-base">
  <a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Register Now', 'ma-theme' ); ?></a>
</div>
<!-- /wp:button -->
```

---

## Post Dynamic Blocks (for use inside query loops or templates)

### Post Featured Image

```html
<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"border":{"radius":{"topLeft":"8px","topRight":"8px"}}}} /-->
```

### Post Title

```html
<!-- wp:post-title {"isLink":true,"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"var:preset|spacing|10"}}},"fontSize":"400"} /-->
```

### Post Excerpt

```html
<!-- wp:post-excerpt {"moreText":"Continue reading","excerptLength":20} /-->
```

### Post Date

```html
<!-- wp:post-date /-->
```

### Post Author

```html
<!-- wp:post-author {"showAvatar":false,"showBio":false,"isLink":true} /-->
```

### Post Terms (categories/tags)

```html
<!-- wp:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"200"} /-->
```

---

## Query Loop (posts grid with card pattern)

```html
<!-- wp:query {"queryId":1,"query":{"perPage":"6","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"align":"wide"} -->
<div class="wp-block-query alignwide">
  <!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","columnCount":3}} -->
  <!-- wp:pattern {"slug":"ma-theme/post-card"} /-->
  <!-- /wp:post-template -->
  <!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"}} -->
  <!-- wp:query-pagination-previous /-->
  <!-- wp:query-pagination-numbers /-->
  <!-- wp:query-pagination-next /-->
  <!-- /wp:query-pagination -->
  <!-- wp:query-no-results -->
  <!-- wp:paragraph {"align":"center"} -->
  <p class="has-text-align-center"><?php esc_html_e( 'No posts found.', 'ma-theme' ); ?></p>
  <!-- /wp:paragraph -->
  <!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
```

Custom post type query (e.g. webinar):

```html
<!-- wp:query {"queryId":2,"query":{"perPage":"9","postType":"webinar","order":"desc","orderBy":"date","inherit":false},"align":"wide"} -->
<div class="wp-block-query alignwide">
  <!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
  <!-- wp:pattern {"slug":"ma-theme/webinar-card"} /-->
  <!-- /wp:post-template -->
</div>
<!-- /wp:query -->
```

---

## Pattern Composition (referencing other patterns)

```html
<!-- wp:pattern {"slug":"ma-theme/header"} /-->
<!-- wp:pattern {"slug":"ma-theme/hero"} /-->
<!-- wp:pattern {"slug":"ma-theme/post-card"} /-->
```

Always reference existing patterns instead of duplicating their markup.
If a section contains cards, query loops, or other existing pattern content,
use `<!-- wp:pattern {"slug":"ma-theme/<slug>"} /-->` inside the parent.

---

## Icon Block (outermost/icon-block)

All icons must use the Icon Block plugin. Source icons exclusively from [Phosphor Icons](https://phosphoricons.com/). Find the closest match if the Figma design uses a different icon set.

### Basic icon

```html
<!-- wp:outermost/icon-block {"iconName":"","iconColor":"cta-500","iconColorValue":"var(--wp--preset--color--cta-500)","width":"24px"} -->
<div class="wp-block-outermost-icon-block">
  <div class="icon-container has-cta-500-color" style="color:var(--wp--preset--color--cta-500);width:24px">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z"></path></svg>
  </div>
</div>
<!-- /wp:outermost/icon-block -->
```

### Icon with link

```html
<!-- wp:outermost/icon-block {"iconName":"","iconColor":"brand-500","iconColorValue":"var(--wp--preset--color--brand-500)","width":"32px","linkUrl":"https://example.com","label":"External link"} -->
<div class="wp-block-outermost-icon-block">
  <a class="icon-container has-brand-500-color" style="color:var(--wp--preset--color--brand-500);width:32px" href="https://example.com" aria-label="External link">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="..."></path></svg>
  </a>
</div>
<!-- /wp:outermost/icon-block -->
```

### Icon with background

```html
<!-- wp:outermost/icon-block {"iconName":"","iconColor":"base","iconColorValue":"var(--wp--preset--color--base)","iconBackgroundColor":"cta-500","iconBackgroundColorValue":"var(--wp--preset--color--cta-500)","width":"48px","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}},"border":{"radius":"var(--wp--preset--border-radius--100)"}}} -->
<div class="wp-block-outermost-icon-block">
  <div class="icon-container has-base-color has-cta-500-background-color" style="color:var(--wp--preset--color--base);background-color:var(--wp--preset--color--cta-500);width:48px;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10);border-radius:var(--wp--preset--border-radius--100)">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="..."></path></svg>
  </div>
</div>
<!-- /wp:outermost/icon-block -->
```

**Key attributes:**

| Attribute                  | Purpose                                    | Example                                 |
| -------------------------- | ------------------------------------------ | --------------------------------------- |
| `iconColor`                | Color slug from theme.json                 | `"cta-500"`                             |
| `iconColorValue`           | CSS variable for the color                 | `"var(--wp--preset--color--cta-500)"`   |
| `iconBackgroundColor`      | Background color slug                      | `"brand-500"`                           |
| `iconBackgroundColorValue` | CSS variable for background                | `"var(--wp--preset--color--brand-500)"` |
| `width`                    | Icon width (height scales)                 | `"24px"`, `"32px"`, `"48px"`            |
| `linkUrl`                  | Wraps icon in `<a>`                        | URL string                              |
| `label`                    | Accessible label (renders as `aria-label`) | Description string                      |
| `title`                    | Tooltip text                               | Description string                      |

**Rules:**

- Always use `fill="currentColor"` on the `<svg>` — color is controlled via block attributes
- Phosphor Icons viewBox is always `"0 0 256 256"`
- The `icon` attribute (SVG HTML) is parsed from the `.icon-container` inner HTML
- Use `label` attribute for any icon that conveys meaning (not purely decorative)

---

## Separator

```html
<!-- wp:separator {"className":"is-style-wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}}} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--20)" aria-hidden="true" />
<!-- /wp:separator -->
```

---

## Site Identity Blocks

### Site Title

```html
<!-- wp:site-title {"style":{"typography":{"fontWeight":"700"}},"fontSize":"400"} /-->
```

### Site Logo

```html
<!-- wp:site-logo {"width":120} /-->
```

### Navigation

```html
<!-- wp:navigation {"layout":{"type":"flex","justifyContent":"center"}} /-->
```

---

## Template Parts and Templates

### Template Part reference (in .html templates)

```html
<!-- wp:template-part {"slug":"header","area":"header"} /-->
<!-- wp:template-part {"slug":"footer","area":"footer"} /-->
```

### Pattern reference (in .html templates or .php patterns)

```html
<!-- wp:pattern {"slug":"ma-theme/hero"} /-->
```

---

## Common Attribute Patterns

### metadata.name — Label for List View in the editor

```json
{ "metadata": { "name": "Hero Section" } }
```

### className — Apply style variations

```json
{ "className": "is-style-cta-solid-base" }
```

### style object — Inline token references

```json
{
  "style": {
    "spacing": {
      "padding": { "top": "var:preset|spacing|40", "bottom": "var:preset|spacing|40" },
      "margin": { "top": "0", "bottom": "0" },
      "blockGap": "var:preset|spacing|20"
    },
    "border": {
      "radius": "var(--wp--preset--border-radius--200)",
      "width": "1px",
      "style": "solid"
    },
    "typography": {
      "fontWeight": "600",
      "fontStyle": "normal",
      "lineHeight": "1.3",
      "letterSpacing": "0.03em",
      "textTransform": "uppercase",
      "textDecoration": "none"
    },
    "dimensions": {
      "minHeight": "400px"
    },
    "elements": {
      "link": {
        "color": { "text": "var:preset|color|brand-500" }
      }
    }
  }
}
```

### Layout types

| Type          | Use for                         | Key properties                                                   |
| ------------- | ------------------------------- | ---------------------------------------------------------------- |
| `constrained` | Centered content with max-width | `contentSize`, `wideSize`                                        |
| `flex`        | Horizontal or vertical flex     | `orientation`, `justifyContent`, `verticalAlignment`, `flexWrap` |
| `grid`        | CSS grid                        | `columnCount` or `minimumColumnWidth`                            |

### Top-level shorthand attributes (slug directly, no `var:preset`)

```json
{
  "backgroundColor": "cta-500",
  "textColor": "base",
  "borderColor": "neutral-300",
  "fontSize": "400",
  "fontFamily": "heading"
}
```
