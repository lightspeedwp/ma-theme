<?php
/**
 * Title: Header
 * Slug: ma-theme/header
 * Description: Site header with top bar (Publications dropdown, Login, Register), main bar (logo, navigation, search).
 * Categories: header
 * Keywords: header, navigation, menu, logo, search, login, register
 * Block Types: core/template-part/header
 * Viewport Width: 1400
 * Inserter: no
 *
 * @package Medical Academic
 * @since 1.0.0
 */

$login_text    = esc_html__( 'Login', 'ma-theme' );
$register_text = esc_html__( 'Register', 'ma-theme' );
?>
<!-- wp:group {"tagName":"header","metadata":{"name":"Header"},"align":"full","className":"is-style-header-section","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0","padding":{"top":"0","bottom":"0"}}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<header class="wp-block-group alignfull is-style-header-section has-base-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0"><!-- wp:group {"metadata":{"name":"Top Header Bar"},"align":"full","style":{"spacing":{"padding":{"left":"var:preset|spacing|20","right":"var:preset|spacing|20","top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)"><!-- wp:group {"align":"wide","style":{"dimensions":{"minHeight":"40px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group alignwide" style="min-height:40px"><!-- wp:navigation {"ref":4,"overlayMenu":"never","className":"is-style-header-nav","style":{"spacing":{"blockGap":"var:preset|spacing|5"},"typography":{"fontSize":"var:preset|font-size|200","fontWeight":"700"}},"layout":{"type":"flex","flexWrap":"nowrap"}} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-cta-link-base"} -->
<p class="is-style-cta-link-base"><a href="#">Login</a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"is-style-cta-register-link"} -->
<p class="is-style-cta-register-link"><a href="#">Register</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","className":"alignfull has-base-background-color has-background","style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}},"border":{"top":{"color":"var:preset|color|neutral-300","width":"1px"},"right":{},"bottom":{"color":"var:preset|color|neutral-300","width":"1px"},"left":{}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-background-color has-background" style="border-top-color:var(--wp--preset--color--neutral-300);border-top-width:1px;border-bottom-color:var(--wp--preset--color--neutral-300);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:group {"align":"wide","style":{"dimensions":{"minHeight":"60px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group alignwide" style="min-height:60px"><!-- wp:site-logo {"width":200,"shouldSyncIcon":false} /-->

<!-- wp:navigation {"ref":4,"overlayMenu":"never","className":"is-style-header-nav","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} /-->

<!-- wp:search {"label":"Search","showLabel":false,"buttonText":"Search","buttonPosition":"button-only","buttonUseIcon":true,"isSearchFieldHidden":true,"className":"is-style-header-search"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></header>
<!-- /wp:group -->