<?php
/**
 * Title: Collection Card
 * Slug: ma-theme/collection-card
 * Description: Collection card with featured image, CPD badge, title, progress bar, course count, journal logo, excerpt, and brand outline button.
 * Categories: posts, featured, education
 * Keywords: collection, card, journey, course, learndash, cpd
 * Viewport Width: 400
 * Inserter: no
 *
 * @package Medical Academic
 * @since 1.0.0
 */

$badge_label   = esc_html__( '2 points', 'ma-theme' );
$button_label  = esc_html__( 'Start Collection', 'ma-theme' );
$logo_url      = get_template_directory_uri() . '/assets/logos/journal-placeholder.svg';
$logo_alt      = esc_attr__( 'Journal logo', 'ma-theme' );
$course_count  = 3;
$course_label  = sprintf(
	/* translators: %d: number of courses */
	esc_html( _n( '%d course', '%d courses', $course_count, 'ma-theme' ) ),
	$course_count
);
$progress_pct  = 25;
?>
<!-- wp:group {"tagName":"article","metadata":{"name":"Collection Card"},"className":"is-style-card-base","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<article class="wp-block-group is-style-card-base"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"customOverlayColor":"#FFF","isUserOverlayColor":false,"contentPosition":"top right","isDark":false,"style":{"dimensions":{"aspectRatio":"2/1"},"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10"}}}} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-top-right" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#FFF"></span><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"right","className":"is-style-badge-cta-outline"} -->
<p class="has-text-align-right is-style-badge-cta-outline"><?php echo esc_html( $badge_label ); ?></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"metadata":{"name":"Card Content"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:post-title {"level":3,"isLink":true,"fontSize":"400"} /-->

<!-- wp:group {"metadata":{"name":"Progress Bar"},"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" aria-label="<?php printf( esc_attr__( '%d%% complete', 'ma-theme' ), $progress_pct ); ?>" role="progressbar" aria-valuenow="<?php echo esc_attr( $progress_pct ); ?>" aria-valuemin="0" aria-valuemax="100"><!-- wp:html -->
<div style="background-color:var(--wp--preset--color--brand-100);border-radius:9999px;height:6px;width:100%;overflow:hidden"><div style="background-color:var(--wp--preset--color--brand-500);border-radius:9999px;height:100%;width:<?php echo esc_attr( $progress_pct ); ?>%"></div></div>
<!-- /wp:html --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Courses and Logo"},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"2px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:outermost/icon-block {"iconName":"","iconColor":"neutral-700","iconColorValue":"var(--wp--preset--color--neutral-700)","width":"16px"} -->
<div class="wp-block-outermost-icon-block"><div class="icon-container has-neutral-700-color" style="color:var(--wp--preset--color--neutral-700);width:16px"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,160H40V56H216V200ZM184,96a8,8,0,0,1-8,8H80a8,8,0,0,1,0-16h96A8,8,0,0,1,184,96Zm0,32a8,8,0,0,1-8,8H80a8,8,0,0,1,0-16h96A8,8,0,0,1,184,128Zm0,32a8,8,0,0,1-8,8H80a8,8,0,0,1,0-16h96A8,8,0,0,1,184,160Z"></path></svg></div></div>
<!-- /wp:outermost/icon-block -->

<!-- wp:paragraph {"style":{"color":{"text":"var:preset|color|neutral-700"}},"fontSize":"200"} -->
<p class="has-text-color" style="color:var(--wp--preset--color--neutral-700);font-size:var(--wp--preset--font-size--200)"><?php echo esc_html( $course_label ); ?></p>
<!-- /wp:paragraph --></div>
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
<div class="wp-block-buttons"><!-- wp:button {"width":100,"className":"is-style-brand-outline-small"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-brand-outline-small"><a class="wp-block-button__link wp-element-button"><?php echo esc_html( $button_label ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></article>
<!-- /wp:group -->
