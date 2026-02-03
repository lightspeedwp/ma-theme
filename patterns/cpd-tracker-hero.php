<?php
/**
 * Title: CPD Tracker Hero
 * Slug: ma-theme/cpd-tracker-hero
 * Description: Hero section with CPD points tracking and progress visualization for medical professionals.
 * Categories: hero, featured, education
 * Keywords: cpd, continuing education, points, progress, hero, tracking
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Medical Academic
 * @since 1.0.0
 */
?>
<!-- wp:cover {"dimRatio":70,"overlayColor":"primary","minHeight":500,"contentPosition":"center center","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);min-height:500px">
	<span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-70 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">
		<!-- wp:group {"layout":{"type":"constrained","contentSize":"1200px"}} -->
		<div class="wp-block-group">
			<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
			<div class="wp-block-columns alignwide are-vertically-aligned-center">
				<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%">
					<!-- wp:heading {"level":1,"style":{"typography":{"fontWeight":"700"}}} -->
					<h1 class="wp-block-heading" style="font-weight:700"><?php echo esc_html__( 'Track Your CPD Journey', 'ma-theme' ); ?></h1>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"fontSize":"large","style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|30"}}}} -->
					<p class="has-large-font-size" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--30)"><?php echo esc_html__( 'Access accredited webinars, courses, and digital resources. Earn CPD points and stay current with the latest medical advances.', 'ma-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
					<div class="wp-block-buttons">
						<!-- wp:button {"className":"is-style-fill"} -->
						<div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button" href="/webinars"><?php echo esc_html__( 'Browse Webinars', 'ma-theme' ); ?></a></div>
						<!-- /wp:button -->

						<!-- wp:button {"className":"is-style-outline"} -->
						<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/courses"><?php echo esc_html__( 'View Courses', 'ma-theme' ); ?></a></div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
					<!-- wp:group {"className":"cpd-tracker-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}},"border":{"radius":"12px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
					<div class="wp-block-group cpd-tracker-card has-base-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
						<!-- wp:heading {"textAlign":"center","level":3,"textColor":"primary","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} -->
						<h3 class="wp-block-heading has-text-align-center has-primary-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--20)"><?php echo esc_html__( 'Your CPD Progress', 'ma-theme' ); ?></h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"align":"center","fontSize":"xxx-large","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10"}},"typography":{"fontWeight":"700"}}} -->
						<p class="has-text-align-center has-xxx-large-font-size" style="margin-bottom:var(--wp--preset--spacing--10);font-weight:700"><?php echo esc_html__( '45 / 50', 'ma-theme' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}}} -->
						<p class="has-text-align-center" style="margin-bottom:var(--wp--preset--spacing--30)"><?php echo esc_html__( 'CPD Points Earned', 'ma-theme' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:separator {"className":"is-style-wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
						<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)"/>
						<!-- /wp:separator -->

						<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
						<p class="has-text-align-center has-small-font-size"><?php echo esc_html__( '90% Complete - Just 5 more points to reach your annual goal!', 'ma-theme' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
						<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)">
							<!-- wp:button {"width":100,"className":"is-style-outline"} -->
							<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-outline"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'View Dashboard', 'ma-theme' ); ?></a></div>
							<!-- /wp:button -->
						</div>
						<!-- /wp:buttons -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:group -->
	</div>
</div>
<!-- /wp:cover -->
