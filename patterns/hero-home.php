<?php
/**
 * Title: Hero — Home
 * Slug: ma-theme/hero-home
 * Description: Full-width home page hero with headline, subtitle, CTA buttons on the left, and staggered hero cards on the right.
 * Categories: featured, call-to-action, banner
 * Keywords: hero, home, cta, featured, banner, landing, cards
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Medical Academic
 * @since 1.0.0
 */

$hero_title_main   = esc_html__( 'CPD, clinical insights, and trusted medical publishing', 'ma-theme' );
$hero_title_accent = esc_html__( '– in one place', 'ma-theme' );
$hero_description  = esc_html__( 'Join thousands of healthcare professionals accessing free CPD, expert-led webinars, latest research, supplements, and digital magazines.', 'ma-theme' );
$primary_button    = esc_html__( 'Register for free', 'ma-theme' );
$secondary_button  = esc_html__( 'Login', 'ma-theme' );
$disclaimer        = esc_html__( 'For registered healthcare professionals', 'ma-theme' );
?>
<!-- wp:group {"metadata":{"name":"Hero — Home"},"align":"full","className":"is-style-hero-home","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","right":"var:preset|spacing|20","left":"var:preset|spacing|20"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-hero-home" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--20)"><!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|70"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center alignwide"><!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"metadata":{"name":"Text Content"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":1,"style":{"typography":{"fontWeight":"700","letterSpacing":"0.02em"}},"fontSize":"800"} -->
<h1 class="wp-block-heading has-800-font-size" style="font-weight:700;letter-spacing:0.02em"><?php echo esc_html( $hero_title_main ); ?> <mark style="background-color:transparent" class="has-inline-color has-cta-500-color"><?php echo esc_html( $hero_title_accent ); ?></mark></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"neutral-700","fontSize":"300"} -->
<p class="has-neutral-700-color has-text-color has-300-font-size"><?php echo esc_html( $hero_description ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Footer"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:buttons {"layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-cta-solid-medium"} -->
<div class="wp-block-button is-style-cta-solid-medium"><a class="wp-block-button__link wp-element-button"><?php echo esc_html( $primary_button ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-cta-outline-medium"} -->
<div class="wp-block-button is-style-cta-outline-medium"><a class="wp-block-button__link wp-element-button"><?php echo esc_html( $secondary_button ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic"}},"textColor":"neutral-700","fontSize":"100"} -->
<p class="has-neutral-700-color has-text-color has-100-font-size" style="font-style:italic"><?php echo esc_html( $disclaimer ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"metadata":{"name":"Hero Cards"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:pattern {"slug":"ma-theme/hero-card-webinar"} /-->
<!-- wp:pattern {"slug":"ma-theme/hero-card-cpd"} /-->
<!-- wp:pattern {"slug":"ma-theme/hero-card-magazine"} /-->
<!-- wp:pattern {"slug":"ma-theme/hero-card-post"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
