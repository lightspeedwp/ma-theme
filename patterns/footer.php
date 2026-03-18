<?php
/**
 * Title: Footer
 * Slug: ma-theme/footer
 * Description: Site footer with logo, tagline, three navigation columns, social icons, and copyright bar.
 * Categories: footer
 * Keywords: footer, navigation, social, copyright, links
 * Block Types: core/template-part/footer
 * Viewport Width: 1400
 * Inserter: no
 *
 * @package Medical Academic
 * @since 1.0.0
 */

$tagline_text      = esc_html__( 'Connecting healthcare professionals with trusted CPD, research, and clinical news.', 'ma-theme' );
$platform_title    = esc_html__( 'Platform', 'ma-theme' );
$publications_title = esc_html__( 'Publications', 'ma-theme' );
$support_title     = esc_html__( 'Support', 'ma-theme' );
$privacy_link      = esc_html__( 'Privacy policy', 'ma-theme' );
$terms_link        = esc_html__( 'Terms &amp; conditions', 'ma-theme' );
$copyright_text    = sprintf(
	/* translators: %s: current year */
	esc_html__( '© %s MedicalAcademic. All rights reserved.', 'ma-theme' ),
	gmdate( 'Y' )
);
$logo_url = get_template_directory_uri() . '/assets/logos/Medical Academic Logo - White.svg';
?>
<!-- wp:group {"tagName":"footer","metadata":{"name":"Footer"},"align":"full","className":"is-style-footer-section","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"0","left":"var:preset|spacing|20","right":"var:preset|spacing|20"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<footer class="wp-block-group alignfull is-style-footer-section" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--20);padding-bottom:0;padding-left:var(--wp--preset--spacing--20)" role="contentinfo">

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"},"layout":{"selfStretch":"fixed","flexSize":"260px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			<!-- wp:image {"sizeSlug":"full","linkDestination":"custom","style":{"layout":{"selfStretch":"fit","flexSize":null}}} -->
			<figure class="wp-block-image size-full"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php esc_attr_e( 'Medical Academic', 'ma-theme' ); ?>" /></a></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph {"textColor":"neutral-300","fontSize":"300"} -->
			<p class="has-neutral-300-color has-text-color has-300-font-size"><?php echo esc_html( $tagline_text ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:social-links {"iconColor":"base","iconColorValue":"var(--wp--preset--color--base)","size":"has-normal-icon-size","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|20"}}}} -->
			<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only" aria-label="<?php esc_attr_e( 'Social media links', 'ma-theme' ); ?>">
				<!-- wp:social-link {"url":"#","service":"x"} /-->
				<!-- wp:social-link {"url":"#","service":"linkedin"} /-->
				<!-- wp:social-link {"url":"#","service":"facebook"} /-->
			</ul>
			<!-- /wp:social-links -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"},"layout":{"selfStretch":"fixed","flexSize":"224px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"level":4,"style":{"typography":{"fontWeight":"700"}},"textColor":"base","fontSize":"400"} -->
			<h4 class="wp-block-heading has-base-color has-text-color has-400-font-size" style="font-weight:700"><?php echo esc_html( $platform_title ); ?></h4>
			<!-- /wp:heading -->

			<!-- wp:navigation {"ref":0,"overlayMenu":"never","className":"is-style-footer-nav","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"},"layout":{"selfStretch":"fixed","flexSize":"224px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"level":4,"style":{"typography":{"fontWeight":"700"}},"textColor":"base","fontSize":"400"} -->
			<h4 class="wp-block-heading has-base-color has-text-color has-400-font-size" style="font-weight:700"><?php echo esc_html( $publications_title ); ?></h4>
			<!-- /wp:heading -->

			<!-- wp:navigation {"ref":0,"overlayMenu":"never","className":"is-style-footer-nav","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"},"layout":{"selfStretch":"fixed","flexSize":"224px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"level":4,"style":{"typography":{"fontWeight":"700"}},"textColor":"base","fontSize":"400"} -->
			<h4 class="wp-block-heading has-base-color has-text-color has-400-font-size" style="font-weight:700"><?php echo esc_html( $support_title ); ?></h4>
			<!-- /wp:heading -->

			<!-- wp:navigation {"ref":0,"overlayMenu":"never","className":"is-style-footer-nav","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} /-->
		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

	<!-- wp:separator {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"0"}}},"backgroundColor":"neutral-900","className":"is-style-wide"} -->
	<hr class="wp-block-separator alignwide has-neutral-900-background-color has-background is-style-wide" style="margin-top:var(--wp--preset--spacing--40);margin-bottom:0" aria-hidden="true" />
	<!-- /wp:separator -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)">
		<!-- wp:paragraph {"textColor":"base","fontSize":"200"} -->
		<p class="has-base-color has-text-color has-200-font-size"><?php echo esc_html( $copyright_text ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"textColor":"base","fontSize":"200"} -->
			<p class="has-base-color has-text-color has-200-font-size"><a href="<?php echo esc_url( get_privacy_policy_url() ); ?>"><?php echo esc_html( $privacy_link ); ?></a></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"textColor":"base","fontSize":"200"} -->
			<p class="has-base-color has-text-color has-200-font-size"><a href="#"><?php echo esc_html( $terms_link ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

</footer>
<!-- /wp:group -->
