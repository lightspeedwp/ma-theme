<?php
/**
 * Title: Post Meta
 * Slug: ma-theme/post-meta
 * Description: Post metadata including author, date, categories, and tags.
 * Categories: posts
 * Keywords: meta, author, date, category, tag
 * Inserter: no
 * Viewport Width: 800
 *
 * @package Medical Academic
 * @since 1.0.0
 */
?>
<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left"},"fontSize":"300"} -->
<div class="wp-block-group has-300-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40)" aria-label="<?php esc_attr_e( 'Post metadata', 'ma-theme' ); ?>">
	<!-- wp:post-author {"showAvatar":false,"byline":"<?php esc_attr_e( 'By', 'ma-theme' ); ?>","isLink":true} /-->

	<!-- wp:paragraph {"fontSize":"300"} -->
	<p class="has-300-font-size" aria-hidden="true">·</p>
	<!-- /wp:paragraph -->

	<!-- wp:post-date {"isLink":true} /-->

	<!-- wp:paragraph {"fontSize":"300"} -->
	<p class="has-300-font-size" aria-hidden="true">·</p>
	<!-- /wp:paragraph -->

	<!-- wp:post-terms {"term":"category","separator":", "} /-->
</div>
<!-- /wp:group -->
