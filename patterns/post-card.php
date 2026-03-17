<?php
/**
 * Title: Post Card
 * Slug: ma-theme/post-card
 * Description: Post card with featured image, badge overlay, category, title, date with journal logo, excerpt, and brand outline button.
 * Categories: 
 * Keywords: post, card, article, blog
 * Block Types: 
 * Viewport Width: 400
 * Inserter: true
 *
 * @package Medical Academic
 * @since 1.0.0
 */

$badge_label  = esc_html__( 'tag', 'ma-theme' );
$button_label = esc_html__( 'Read more', 'ma-theme' );
$logo_url     = get_template_directory_uri() . '/assets/logos/journal-placeholder.svg';
$logo_alt     = esc_attr__( 'Journal logo', 'ma-theme' );
?>
<!-- wp:group {"tagName":"article","metadata":{"name":"Post Card"},"className":"is-style-card-base","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<article class="wp-block-group is-style-card-base"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"customOverlayColor":"#FFF","isUserOverlayColor":false,"contentPosition":"top left","isDark":false,"style":{"dimensions":{"aspectRatio":"2/1"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}}}} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-top-left" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#FFF"></span><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"className":"is-style-badge-brand-outline"} -->
<p class="is-style-badge-brand-outline"><?php echo esc_html( $badge_label ); ?></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"metadata":{"name":"Card Content"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:post-terms {"term":"category"} /-->

<!-- wp:post-title {"level":3,"isLink":true,"fontSize":"300"} /-->

<!-- wp:group {"metadata":{"name":"Date and Journal"},"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:post-date {"fontSize":"200"} /-->

<!-- wp:image {"width":"120px","height":"24px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $logo_alt ); ?>" style="width:120px;height:24px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-wide"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"excerptLength":20,"fontSize":"200"} /-->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"width":100,"className":"is-style-brand-outline-small"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-brand-outline-small"><a class="wp-block-button__link wp-element-button"><?php echo esc_html( $button_label ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></article>
<!-- /wp:group -->
