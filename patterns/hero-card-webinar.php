<?php
/**
 * Title: Hero Card — Webinar
 * Slug: ma-theme/hero-card-webinar
 * Description: Horizontal hero card for webinars with square image, post-type label, journal logo, title, date icon, and time icon.
 * Categories: 
 * Keywords: hero, card, webinar, featured, horizontal
 * Viewport Width: 520
 * Inserter: true
 *
 * @package Medical Academic
 * @since 1.0.0
 */

$type_label = esc_html__( 'Upcoming Webinar', 'ma-theme' );
$logo_url   = get_template_directory_uri() . '/assets/logos/journal-placeholder.svg';
$logo_alt   = esc_attr__( 'Journal logo', 'ma-theme' );
$time_label = esc_html__( '18:00 GMT', 'ma-theme' );
?>
<!-- wp:group {"tagName":"article","metadata":{"name":"Hero Card — Webinar"},"className":"is-style-card-hero","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<article class="wp-block-group is-style-card-hero" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"1","width":"100px","height":"100px","scale":"cover"} /-->

<!-- wp:group {"metadata":{"name":"Content"},"style":{"spacing":{"blockGap":"var:preset|spacing|5"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Label and Logo"},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-cta-link-category-tiny"} -->
<p class="is-style-cta-link-category-tiny"><?php echo esc_html( $type_label ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"width":"100px","height":"auto","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $logo_alt ); ?>" style="width:100px;height:auto"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:post-title {"level":3,"isLink":true,"fontSize":"300"} /-->

<!-- wp:group {"metadata":{"name":"Meta"},"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"2px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:outermost/icon-block {"iconName":"","iconColor":"neutral-700","iconColorValue":"var(--wp--preset--color--neutral-700)","width":"16px"} -->
<div class="wp-block-outermost-icon-block"><div class="icon-container has-neutral-700-color" style="color:var(--wp--preset--color--neutral-700);width:16px"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32Zm0,176H48V48H72v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24Z"></path></svg></div></div>
<!-- /wp:outermost/icon-block -->

<!-- wp:post-date {"fontSize":"200"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"2px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:outermost/icon-block {"iconName":"","iconColor":"neutral-700","iconColorValue":"var(--wp--preset--color--neutral-700)","width":"16px"} -->
<div class="wp-block-outermost-icon-block"><div class="icon-container has-neutral-700-color" style="color:var(--wp--preset--color--neutral-700);width:16px"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm64-88a8,8,0,0,1-8,8H128a8,8,0,0,1-8-8V72a8,8,0,0,1,16,0v48h48A8,8,0,0,1,192,128Z"></path></svg></div></div>
<!-- /wp:outermost/icon-block -->

<!-- wp:paragraph {"style":{"color":{"text":"var:preset|color|neutral-700"}},"fontSize":"200"} -->
<p class="has-text-color" style="color:var(--wp--preset--color--neutral-700);font-size:var(--wp--preset--font-size--200)"><?php echo esc_html( $time_label ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></article>
<!-- /wp:group -->
