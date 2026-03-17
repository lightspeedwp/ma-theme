# GitHub Copilot Custom Instructions - Figma to WordPress Pattern Extraction

## When Converting Figma Designs to WordPress Patterns

Whenever you invoke Figma MCP server tools to create WordPress block patterns, follow these instructions:

---

## 1. Pre-Processing: Understand Theme Context

Before converting any Figma design to a WordPress pattern:

1. **Read `theme.json`** to extract all available presets:

   - Color palette (slugs and values)
   - Spacing sizes (slugs and values)
   - Font sizes (slugs and values)
   - Font families (slugs)
   - Typography scales

2. **Examine existing patterns** in `/patterns/` directory:

   - Read 2-3 example pattern files to understand structure
   - Note the pattern metadata format (Title, Slug, Categories, etc.)
   - Understand the theme's WordPress block markup conventions
   - Check for common spacing, layout, and styling patterns

3. **Store preset mappings** in memory for reference during conversion

---

## 2. Extract Design from Figma

Use the Figma MCP tools to extract the design:

```
mcp_figma_dev-mod_get_design_context
mcp_figma_dev-mod_get_screenshot
```

**Important Parameters:**

- `nodeId`: Extract from the Figma URL (e.g., `node-id=9-12` → `9-12`)
- `dirForAssetWrites`: Set to theme's assets directory for images/SVGs
- `clientFrameworks`: `wordpress`
- `clientLanguages`: `php,html`

**Parse the Generated Code:**

- Extract CSS variables: `var(--wp--preset--[type]--[slug], [fallback])`
- Identify layout structure (columns, groups, spacing)
- Note colors, typography, borders, spacing values
- Document interactive elements (buttons, links)

---

## 3. CSS Variable Conversion Rules

Convert CSS variables to WordPress block editor format:

**CSS Variable Format → WordPress Block Format**

```
var(--wp--preset--spacing--30, 20px)   →  var:preset|spacing|30
var(--wp--preset--color--accent-1)     →  var:preset|color|accent-1
var(--wp--preset--font-size--large)    →  var:preset|font-size|large
```

**Important:**

- In pattern PHP files, use the **inline style format**: `var(--wp--preset--spacing--30)`
- In theme.json files, use the **pipe format**: `var:preset|spacing|30`
- Always prefer variables over hardcoded values
- Match to nearest theme preset when variable doesn't exist

---

## 4. WordPress Pattern File Structure

**File Location:** `/patterns/[pattern-slug].php`

**Required Metadata (PHP DocBlock):**

```php
/**
 * Title: [Human-readable pattern name]
 * Slug: [theme-prefix]/[pattern-slug]
 * Categories: [category-1], [category-2]
 * Keywords: [keyword-1], [keyword-2], [keyword-3]
 * Post Types: page, post
 * Description: [Detailed description of the pattern's purpose and design]
 * Viewport Width: [optional - width in pixels for pattern preview]
 * Inserter: [yes/no - whether pattern appears in inserter]
 *
 * @package WordPress
 * @subpackage [Theme_Name]
 * @since [Theme Name] [Version]
 */
```

**CRITICAL: Post Types Field**

- The `Post Types:` field is **REQUIRED** for patterns to appear in the editor
- Common values: `page, post` (or include custom post types like `product`)
- Without this field, the pattern will not be registered properly

**Available Categories:**

- `featured` - Featured patterns
- `banner` - Hero/banner sections
- `call-to-action` - CTA sections
- `about` - About sections
- `contact` - Contact sections
- `gallery` - Image galleries
- `portfolio` - Portfolio items
- `testimonials` - Testimonial sections
- `pricing` - Pricing tables
- `team` - Team member grids
- `text` - Text-heavy content

---

## 5. WordPress Block Markup Structure

**Pattern Structure:**

```php
<?php
// Metadata docblock here
?>
<!-- wp:group {attributes} -->
<div class="wp-block-group">
    <!-- Nested blocks -->
</div>
<!-- /wp:group -->
```

**Common Blocks:**

**Group (Container):**

```html
<!-- wp:group {"style":{...},"layout":{"type":"constrained"}} -->
<div class="wp-block-group">...</div>
<!-- /wp:group -->
```

**Heading:**

```html
<!-- wp:heading {"textAlign":"center","fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size">
  <?php esc_html_e( 'Heading Text', 'themeslug' ); ?>
</h2>
<!-- /wp:heading -->
```

**Paragraph:**

```html
<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">
  <?php esc_html_e( 'Paragraph text', 'themeslug' ); ?>
</p>
<!-- /wp:paragraph -->
```

**Button:**

```html
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons">
  <!-- wp:button {"style":{...}} -->
  <div class="wp-block-button">
    <a class="wp-block-button__link wp-element-button">
      <?php esc_html_e( 'Button Text', 'themeslug' ); ?>
    </a>
  </div>
  <!-- /wp:button -->
</div>
<!-- /wp:buttons -->
```

**Image:**

```html
<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full">
  <img
    src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/[filename]"
    alt="<?php esc_attr_e( 'Alt text', 'themeslug' ); ?>"
  />
</figure>
<!-- /wp:image -->
```

**Columns:**

```html
<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide">
  <!-- wp:column -->
  <div class="wp-block-column">...</div>
  <!-- /wp:column -->
</div>
<!-- /wp:columns -->
```

---

## 6. Styling Attributes in Block Markup

Block attributes are JSON objects in the HTML comment:

**Color:**

```json
{
  "style": {
    "color": {
      "background": "var:preset|color|accent-1",
      "text": "var:preset|color|contrast"
    }
  }
}
```

**Spacing:**

```json
{
  "style": {
    "spacing": {
      "padding": {
        "top": "var:preset|spacing|30",
        "right": "var:preset|spacing|30",
        "bottom": "var:preset|spacing|30",
        "left": "var:preset|spacing|30"
      },
      "margin": {
        "top": "0",
        "bottom": "0"
      },
      "blockGap": "var:preset|spacing|40"
    }
  }
}
```

**Border:**

```json
{
  "style": {
    "border": {
      "color": "var:preset|color|contrast",
      "style": "solid",
      "width": "1px",
      "radius": "8px"
    }
  }
}
```

**Typography:**

```json
{
  "style": {
    "typography": {
      "fontSize": "2.25rem",
      "fontWeight": "600",
      "lineHeight": "1.2",
      "letterSpacing": "-0.02em"
    }
  }
}
```

**Note:** In the actual HTML element, use full CSS variable syntax:

```html
style="padding-top:var(--wp--preset--spacing--30)"
```

---

## 6.5. Block Metadata and Figma Layer Names

**CRITICAL:** Preserve Figma layer names in WordPress blocks using the `metadata` attribute. This improves pattern maintainability and editor experience.

**Extract Layer Names from Figma Code:**

When you call `mcp_figma_dev-mod_get_design_context`, the generated code includes `data-name` attributes:

```jsx
<div data-name="Card / CTest">
  <div data-name="Card Content">
    <p data-node-id="9:6">Card title</p>
    <p data-node-id="9:7">Card content</p>
  </div>
  <div data-name="Buttons / Test">
    <Button />
  </div>
</div>
```

**Convert to WordPress Block Metadata:**

Add the `metadata` object with a `name` property to block attributes:

```html
<!-- wp:group {"metadata":{"name":"Card / CTest"},"className":"is-style-card-ctest"} -->
<div class="wp-block-group is-style-card-ctest">
  <!-- wp:group {"metadata":{"name":"Card Content"},"style":{...}} -->
  <div class="wp-block-group">
    <!-- wp:heading -->
    <h2>Card title</h2>
    <!-- /wp:heading -->
  </div>
  <!-- /wp:group -->

  <!-- wp:buttons {"metadata":{"name":"Buttons / Test"}} -->
  <div class="wp-block-buttons">
    <!-- wp:button -->
    <div class="wp-block-button">...</div>
    <!-- /wp:button -->
  </div>
  <!-- /wp:buttons -->
</div>
<!-- /wp:group -->
```

**Benefits:**

- **Editor Navigation:** Names appear in WordPress List View instead of generic "Group" labels
- **Maintainability:** Clear identification of pattern components
- **Design-Code Alignment:** Preserves Figma's layer structure in WordPress
- **Debugging:** Easier to identify which block corresponds to which design element

**Rules:**

- Add metadata to **container blocks** (Group, Columns, Buttons, etc.)
- **Do NOT add** to content blocks (Heading, Paragraph, Image, Button) - they have visible content
- Use the exact layer name from Figma's `data-name` attribute
- Preserve the naming convention (e.g., "Card / CTest", "Buttons / Test")

---

## 7. Internationalization (i18n)

**CRITICAL:** All user-facing text MUST be wrapped in WordPress i18n functions:

**For escaped HTML output:**

```php
<?php esc_html_e( 'Text to translate', 'themeslug' ); ?>
```

**For attribute values:**

```php
<?php esc_attr_e( 'Alt text', 'themeslug' ); ?>
```

**For URL values:**

```php
<?php echo esc_url( get_template_directory_uri() ); ?>
```

**Never hardcode text** - always use i18n functions with proper text domain.

---

## 8. Pattern Naming Conventions

**File Naming:**

- Use kebab-case: `card-ctest.php`, `hero-medical.php`
- Be descriptive but concise
- Group related patterns with prefixes (e.g., `card-*`, `hero-*`, `cta-*`)

**Pattern Slug:**

- Format: `themeslug/pattern-name`
- Example: `twentytwentyfive/card-ctest`
- Must match filename (without extension)

**Pattern Title:**

- Human-readable, title case
- Example: "Card CTest", "Hero Medical Section"

---

## 9. Layout Types

WordPress supports different layout types for groups:

**Constrained (Default):**

```json
{ "layout": { "type": "constrained" } }
```

- Respects theme's `contentSize` and `wideSize`
- Centers content automatically

**Full Width:**

```json
{ "align": "full", "layout": { "type": "constrained" } }
```

- Spans full viewport width
- Inner content still respects `contentSize`

**Flex (for buttons, horizontal layouts):**

```json
{ "layout": { "type": "flex", "justifyContent": "center" } }
```

**Default (no constraints):**

```json
{ "layout": { "type": "default" } }
```

---

## 10. Conversion Workflow

**Step-by-step process:**

1. **Fetch Figma Design**

   - Use `mcp_figma_dev-mod_get_design_context` with node ID
   - Take screenshot with `mcp_figma_dev-mod_get_screenshot`
   - **CRITICAL: Study the design screenshot carefully** - note exact layout, spacing, button widths, alignment, full-width elements

2. **Analyze Generated Code**

   - Parse CSS variables from Tailwind/React output
   - Map colors to theme palette
   - Map spacing to theme spacing scale
   - **Map font sizes to closest theme preset** (critical - see Typography Mapping below)
   - Identify layout structure (columns, groups, nesting)
   - **Identify block styles used** (e.g., button styles from Figma)
   - **Note exact layout details**: full-width buttons (`"width":100`), flex layouts, alignment

3. **Check for Matching Section Style**

   - Look in `/styles/` directory for a matching section style JSON file
   - Check if a section style exists with the pattern name (e.g., `card-ctest.json`)
   - If found, apply it using `className="is-style-[slug]"` on the outer group
   - Remove inline styles that duplicate the section style (colors, borders, padding)
   - If no exact name match, check if another section style has matching design properties
   - Apply the best matching section style to maintain design consistency

4. **Typography Mapping**

   - Extract font sizes from Figma (e.g., `text-[36px]` → 36px)
   - Find the **closest matching preset** from theme.json:
     ```
     Figma Size → Closest Preset
     36px → xx-large (2.15rem ≈ 34px)
     22px → large (1.38rem ≈ 22px)
     20px → large (1.38rem ≈ 22px)
     16px → medium (1rem = 16px)
     14px → small (0.875rem = 14px)
     ```
   - **Never use hardcoded pixel values** for font sizes if a preset exists
   - Check font family from Figma (Manrope, Fira Code) and map to theme preset
   - Use `fontSize` attribute for size, not inline styles

5. **Block Styles Identification**

   - Check if Figma component references a specific style (e.g., "Buttons / Test")
   - Look for matching JSON file in `/styles/blocks/[block-type]/[style-name].json`
   - Apply the style using `className`: `"className":"is-style-[style-slug]"`
   - **Do not manually replicate style properties** - let the block style handle it

6. **Create Pattern Metadata**

   - Choose appropriate categories and keywords
   - Write descriptive title and description
   - Set proper slug with theme prefix
   - **Do NOT add Post Types, Viewport Width, or Inserter fields** - not needed in modern WordPress themes
   - Keep metadata minimal and consistent with existing theme patterns

7. **Build Block Markup**

   - Start with outer `wp:group` container
   - Apply section style if available: `className="is-style-[slug]"`
   - **Add Figma layer names as block metadata**: Extract `data-name` attributes from generated code and add to blocks as `"metadata":{"name":"Layer Name"}`
   - Nest blocks according to design hierarchy
   - Apply styling through `style` attribute JSON only when not handled by section/block styles
   - Use semantic HTML elements
   - **Apply block styles with `className` attribute when Figma references a style**
   - **Match layout exactly to Figma design**:
     - Full-width buttons: use `"width":100` attribute
     - Flex layouts: use appropriate `layout` configurations
     - Alignment: match text-align, justifyContent exactly
     - Spacing: match blockGap, padding, margins precisely

8. **Apply WordPress Presets**

   - Convert all CSS variables to `var:preset|type|slug` format in JSON attributes
   - Use `fontSize` attribute with preset slugs (e.g., `"fontSize":"xx-large"`)
   - Use `fontFamily` style when needed (e.g., Fira Code for code/content)
   - Use theme's color palette, spacing, and typography scales
   - Maintain visual fidelity to Figma design

9. **Internationalize Text**

   - Wrap all text in `esc_html_e()` or `esc_attr_e()`
   - Use theme text domain consistently
   - Match placeholder text to Figma content exactly (e.g., "Card title" not "Card Title")

10. **Connect Pattern to Figma with Code Connect**

    - After pattern creation, use `mcp_figma_dev-mod_add_code_connect_map` tool
    - Map the Figma component node ID to the pattern file
    - Provide the pattern file path as the `source` parameter
    - Provide the pattern name as the `componentName` parameter
    - Example: `nodeId: "9-12"`, `source: "patterns/card-ctest.php"`, `componentName: "Card CTest"`
    - This creates a bidirectional link between Figma design and WordPress code

11. **Validate**

- Check all required metadata is present (Title, Slug, Categories, Description)
- Verify block comments match HTML structure
- Ensure proper closing tags
- Test that all variables reference existing presets
- **Carefully compare rendered pattern to Figma design** - layout must match exactly

---

## 11. Common Pitfalls to Avoid

❌ **Don't:**

- Hardcode colors, spacing, or font sizes
- Forget closing block comments (`<!-- /wp:block -->`)
- Mix up pipe syntax (`var:preset|...`) and CSS syntax (`var(--wp--preset--...)`)
- Skip i18n functions for text
- Use incorrect text domain
- Forget to escape output (`esc_html_e`, `esc_attr_e`, `esc_url`)
- **Assume layout details** - always study the Figma screenshot carefully for:
  - Full-width buttons (`"width":100`)
  - Exact text alignment
  - Spacing and padding values
  - Element positioning and flex layouts

✅ **Do:**

- Always reference theme presets
- Keep block structure well-indented and readable
- Use proper WordPress escaping functions
- Include comprehensive metadata
- Test patterns in WordPress editor after creation
- Match existing theme pattern conventions
- **Study Figma design screenshots** before creating markup

---

## 12. Example Pattern Conversion

**Figma Component:** Card with yellow background, black border, title, text, button

**Generated Figma Code (excerpt):**

```jsx
<div className="bg-[var(--wp--preset--color--base,#ffee58)]
     border border-[var(--wp--preset--color--contrast,#111111)]
     rounded-[8px] p-[var(--wp--preset--spacing--30,18px)]">
```

**WordPress Pattern Output:**

```php
<!-- wp:group {"style":{"color":{"background":"var:preset|color|accent-1","text":"var:preset|color|contrast"},"border":{"color":"var:preset|color|contrast","style":"solid","width":"1px","radius":"8px"},"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
<div class="wp-block-group has-accent-1-background-color has-contrast-color" style="border-color:var(--wp--preset--color--contrast);border-style:solid;border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--30)">
```

---

## 13. Pattern Registration in functions.php

### Modern WordPress Themes (Block Themes)

**In WordPress 6.0+**, patterns placed in the `/patterns/` directory are **automatically registered** by WordPress. You do NOT need to manually register them in `functions.php`.

**What you DO need to check:**

1. **Check if custom pattern categories need registration:**
   - Search `functions.php` for existing pattern category registration
   - Look for: `register_block_pattern_category()`
   - If your pattern uses a custom category (not a core WordPress category), add it

**Example of pattern category registration:**

```php
if ( ! function_exists( 'themename_pattern_categories' ) ) :
    function themename_pattern_categories() {
        register_block_pattern_category(
            'themename_custom',
            array(
                'label'       => __( 'Custom Category', 'themename' ),
                'description' => __( 'Custom patterns for special use.', 'themename' ),
            )
        );
    }
endif;
add_action( 'init', 'themename_pattern_categories' );
```

### Legacy Themes or Manual Registration

**Only if using an older theme** or if patterns are NOT in the `/patterns/` directory:

1. **Search for existing pattern registration loop:**

   - Look in `functions.php` for `register_block_pattern()`
   - Check if there's a loop registering multiple patterns
   - Add your pattern to the existing array/loop

2. **If no registration exists, create a new function:**

```php
if ( ! function_exists( 'themename_register_block_patterns' ) ) :
    function themename_register_block_patterns() {
        $patterns = array(
            'card-ctest',
            // Add more pattern slugs here
        );

        foreach ( $patterns as $pattern ) {
            $pattern_file = get_template_directory() . '/patterns/' . $pattern . '.php';

            if ( file_exists( $pattern_file ) ) {
                register_block_pattern(
                    'themename/' . $pattern,
                    require $pattern_file
                );
            }
        }
    }
endif;
add_action( 'init', 'themename_register_block_patterns' );
```

**Important Notes:**

- Modern block themes handle pattern registration automatically
- Only add manual registration if patterns don't appear in the editor
- Always check for existing registration functions first
- Use theme prefix in function names to avoid conflicts

---

## 14. Validation Checklist

Before completing pattern creation:

- [ ] Pattern file created in `/patterns/` directory
- [ ] All required metadata present in DocBlock
- [ ] Pattern slug matches `themeslug/filename` format
- [ ] All CSS variables converted to theme presets
- [ ] All text wrapped in i18n functions with correct text domain
- [ ] Block comment structure matches HTML structure
- [ ] Proper escaping functions used (`esc_html_e`, `esc_attr_e`, `esc_url`)
- [ ] Spacing, colors, typography reference theme.json presets
- [ ] Layout type appropriate for design (constrained, flex, etc.)
- [ ] No hardcoded pixel values where presets exist
- [ ] Pattern follows theme's existing conventions
- [ ] Checked `functions.php` for custom category registration needs (if applicable)
- [ ] Pattern appears in WordPress editor inserter
- [ ] **Carefully compared rendered pattern to Figma design** - layout must match exactly

---

## 15. Advanced Features

**Viewport Width:**
Set preview width in inserter:

```php
* Viewport Width: 800
```

**Pattern Inserter:**
Control visibility in inserter:

```php
* Inserter: yes
```

**Block Patterns with Query Loops:**
For dynamic content (posts, custom post types):

```html
<!-- wp:query {"query":{"postType":"post","perPage":3}} -->
<div class="wp-block-query">
  <!-- wp:post-template -->
  <!-- Post content blocks -->
  <!-- /wp:post-template -->
</div>
<!-- /wp:query -->
```

---

## 16. Reference Resources

**WordPress Block Editor Handbook:**

- Block Patterns: https://developer.wordpress.org/block-editor/reference-guides/block-api/block-patterns/
- Theme.json: https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/

**Common Block References:**

- Group: `core/group`
- Columns: `core/columns`, `core/column`
- Heading: `core/heading`
- Paragraph: `core/paragraph`
- Button: `core/button`, `core/buttons`
- Image: `core/image`
- Spacer: `core/spacer`

---

## Priority Rules

1. **Theme Presets > Hardcoded Values** - Always use theme.json presets
2. **Semantic Structure > Visual Output** - Use proper block hierarchy
3. **Internationalization > Plain Text** - Always use i18n functions
4. **Validation > Speed** - Check all requirements before completing
5. **Consistency > Innovation** - Follow existing theme patterns

---

**This file ensures accurate, production-ready WordPress patterns from Figma designs every time.**
