<?php
/**
 * Title: Webinar Card
 * Slug: ma-theme/webinar-card
 * Description: Webinar card with featured image, CPD badge overlay, category, title, date with icon, journal logo, excerpt, and CTA button.
 * Categories: 
 * Keywords: webinar, event, cpd, course, education, card
 * Block Types: 
 * Post Types: 
 * Viewport Width: 400
 * Inserter: true
 *
 * @package Medical Academic
 * @since 1.0.0
 */

$badge_label  = esc_html__( '2 points', 'ma-theme' );
$button_label = esc_html__( 'View Webinar', 'ma-theme' );
$logo_url     = get_template_directory_uri() . '/assets/logos/journal-placeholder.svg';
$logo_alt     = esc_attr__( 'Journal logo', 'ma-theme' );
?>
<!-- wp:group {"tagName":"article","metadata":{"name":"Webinar Card"},"className":"is-style-card-base","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<article class="wp-block-group is-style-card-base"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"customOverlayColor":"#FFF","isUserOverlayColor":false,"contentPosition":"top right","isDark":false,"style":{"dimensions":{"aspectRatio":"2/1"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}}}} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-top-right" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#FFF"></span><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"right","className":"is-style-badge-cta-outline"} -->
<p class="has-text-align-right is-style-badge-cta-outline"><?php echo esc_html( $badge_label ); ?></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"metadata":{"name":"Card Content"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:post-terms {"term":"category","className":"is-style-cta-category-base"} /-->

<!-- wp:post-title {"level":3,"isLink":true,"fontSize":"300"} /-->

<!-- wp:group {"metadata":{"name":"Date and Journal"},"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:outermost/icon-block {"iconName":"","iconColor":"neutral-700","iconColorValue":"var(--wp--preset--color--neutral-700)","width":"16px"} -->
<div class="wp-block-outermost-icon-block"><div class="icon-container has-neutral-700-color" style="color:var(--wp--preset--color--neutral-700);width:16px"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32Zm0,176H48V48H72v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24Z"></path></svg></div></div>
<!-- /wp:outermost/icon-block -->

<!-- wp:post-date {"fontSize":"200"} /--></div>
<!-- /wp:group -->

<!-- wp:image {"width":"120px","height":"24px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $logo_alt ); ?>" style="width:120px;height:24px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-wide"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"excerptLength":20,"fontSize":"200"} /-->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"width":100,"className":"is-style-brand-solid-small"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-brand-solid-small"><a class="wp-block-button__link wp-element-button"><?php echo esc_html( $button_label ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></article>
<!-- /wp:group -->
