<?php
/**
 * Title: Section Header
 * Slug: ma-theme/section-header
 * Description: Section header with icon, title, description, and CTA link. Bottom border divider.
 * Categories: banner
 * Keywords: section, header, title, divider, cta, link
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Medical Academic
 * @since 1.0.0
 */

$section_title = esc_html__( 'CPD and Webinars', 'ma-theme' );
$section_desc  = esc_html__( 'Earn points and stay updated with expert-led sessions.', 'ma-theme' );
$cta_label     = esc_html__( 'View all CPD activities', 'ma-theme' );
?>
<!-- wp:group {"metadata":{"name":"Section Header"},"className":"is-style-section-header","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group is-style-section-header"><!-- wp:group {"metadata":{"name":"Content"},"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Title"},"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:outermost/icon-block {"iconName":"","iconColor":"contrast","iconColorValue":"var(--wp--preset--color--contrast)","width":"40px"} -->
<div class="wp-block-outermost-icon-block"><div class="icon-container has-contrast-color" style="color:var(--wp--preset--color--contrast);width:40px"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M220,48H76A12,12,0,0,0,64,60V84H36A12,12,0,0,0,24,96V200a28,28,0,0,0,28,28H200a28,28,0,0,0,28-28V60A12,12,0,0,0,220,48ZM48,200V108H64v92a4,4,0,0,1-8,0A12,12,0,0,0,48,200Zm156,4H83.83A27.84,27.84,0,0,0,88,192V72H208V200A4,4,0,0,1,204,204Zm-28-100H120a12,12,0,0,1,0-24h56a12,12,0,0,1,0,24Zm0,40H120a12,12,0,0,1,0-24h56a12,12,0,0,1,0,24Z"></path></svg></div></div>
<!-- /wp:outermost/icon-block -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading"><?php echo esc_html( $section_title ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"textColor":"neutral-700","fontSize":"300"} -->
<p class="has-neutral-700-color has-text-color has-300-font-size"><?php echo esc_html( $section_desc ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"is-style-cta-link-small-colour"} -->
<p class="is-style-cta-link-small-colour"><a href="#"><?php echo esc_html( $cta_label ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
