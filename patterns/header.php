<?php
/**
 * Title: Header
 * Slug: ma-theme/header
 * Description: Main site header with logo, site title, tagline, and navigation menu.
 * Categories: header
 * Keywords: header, navigation, menu, logo, site-title
 * Block Types: core/template-part/header
 * Inserter: no
 *
 * @package Medical Academic
 * @since 1.0.0
 */
?>
<!-- wp:group {"tagName":"header","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"backgroundColor":"error-background","layout":{"type":"constrained"}} -->
<header class="wp-block-group has-error-background-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)" role="banner">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:site-logo {"width":50,"shouldSyncIcon":true} /-->

			<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">
				<!-- wp:site-title {"level":0,"style":{"typography":{"fontWeight":"700"}},"fontSize":"400"} /-->
				<!-- wp:site-tagline {"fontSize":"300","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}},"color":{"text":"var:preset|color|contrast"}}} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:navigation {"ref":0,"textColor":"error-foreground","overlayBackgroundColor":"error-background","overlayTextColor":"error-foreground","layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"right","orientation":"horizontal"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"},"typography":{"fontWeight":"500"}},"fontSize":"300"} /-->
	</div>
	<!-- /wp:group -->
</header>
<!-- /wp:group -->
