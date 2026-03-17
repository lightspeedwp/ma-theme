<?php
/**
 * Title: Digital Magazine Card
 * Slug: ma-theme/digital-magazine-card
 * Description: Magazine card with cover image that zooms on hover, title, excerpt, and CTA button.
 * Categories: 
 * Keywords: magazine, publication, issue, digital, card
 * Block Types: 
 * Post Types: 
 * Viewport Width: 400
 * Inserter: true
 *
 * @package Medical Academic
 * @since 1.0.0
 */

$button_label = esc_html__( 'Read Magazine', 'ma-theme' );
?>
<!-- wp:group {"tagName":"article","metadata":{"name":"Digital Magazine Card"},"className":"is-style-card-magazine","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<article class="wp-block-group is-style-card-magazine"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/4"} /-->

<!-- wp:group {"metadata":{"name":"Card Content"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:post-title {"level":3,"isLink":true,"fontSize":"300"} /-->

<!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"excerptLength":20,"fontSize":"200"} /-->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"width":100,"className":"is-style-cta-outline-small"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-cta-outline-small"><a class="wp-block-button__link wp-element-button"><?php echo esc_html( $button_label ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></article>
<!-- /wp:group -->
