<?php
/**
 * Title: CPD Activity Card
 * Slug: ma-theme/cpd-card
 * Description: A card for CPD activity posts with featured image, points badge, category, title, date, journal logo, excerpt, and CTA button.
 * Categories: 
 * Keywords: cpd, card, activity, continuing education, points
 * Block Types: 
 * Inserter: true
 * Viewport Width: 400
 *
 * @package Medical Academic
 * @since 1.0.0
 */

$badge_label  = esc_html__( '2 points', 'ma-theme' );
$button_label = esc_html__( 'View CPD activity', 'ma-theme' );
$logo_url     = get_template_directory_uri() . '/assets/logos/journal-placeholder.svg';
$logo_alt     = esc_attr__( 'Journal logo', 'ma-theme' );
?>
<!-- wp:group {"tagName":"article","metadata":{"name":"CPD Activity Card"},"className":"is-style-card-base","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<article class="wp-block-group is-style-card-base"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"customOverlayColor":"#FFF","isUserOverlayColor":false,"contentPosition":"top right","isDark":false,"style":{"dimensions":{"aspectRatio":"2/1"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}}}} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-top-right" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#FFF"></span><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"right","style":{"typography":{"fontWeight":"700","lineHeight":"1.5","letterSpacing":"0.05em"},"spacing":{"padding":{"top":"var:preset|spacing|5","right":"var:preset|spacing|10","bottom":"var:preset|spacing|5","left":"var:preset|spacing|10"}},"border":{"radius":"var(\u002d\u002dwp\u002d\u002dpreset\u002d\u002dborder-radius\u002d\u002d100)","width":"1px"}},"backgroundColor":"base","textColor":"cta-500","fontSize":"100"} -->
<p class="has-text-align-right has-cta-500-color has-base-background-color has-text-color has-background has-100-font-size" style="border-width:1px;border-radius:var(--wp--preset--border-radius--100);padding-top:var(--wp--preset--spacing--5);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--5);padding-left:var(--wp--preset--spacing--10);font-weight:700;letter-spacing:0.05em;line-height:1.5"><?php echo esc_html( $badge_label ); ?></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"metadata":{"name":"Card Content"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:post-terms {"term":"category","fontSize":"200"} /-->

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
<div class="wp-block-buttons"><!-- wp:button {"width":100,"className":"is-style-cta-outline-small"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-cta-outline-small"><a class="wp-block-button__link wp-element-button"><?php echo esc_html( $button_label ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></article>
<!-- /wp:group -->
