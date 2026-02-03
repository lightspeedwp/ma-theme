<?php
/**
 * Title: Digital Magazine Archive Hero
 * Slug: ma-theme/magazine-archive-hero
 * Description: Hero section for digital magazine archive with search and filtering capabilities.
 * Categories: hero, featured, media
 * Keywords: magazine, archive, hero, publications, search, filter
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Medical Academic
 * @since 1.0.0
 */
?>
<!-- wp:cover {"url":"","dimRatio":80,"overlayColor":"contrast","minHeight":400,"contentPosition":"center center","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);min-height:400px">
	<span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-80 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">
		<!-- wp:group {"layout":{"type":"constrained","contentSize":"900px"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontWeight":"700"}}} -->
			<h1 class="wp-block-heading has-text-align-center" style="font-weight:700"><?php echo esc_html__( 'Digital Magazine Archive', 'ma-theme' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","fontSize":"large","style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|40"}}}} -->
			<p class="has-text-align-center has-large-font-size" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--40)"><?php echo esc_html__( 'Access our complete collection of medical journals and publications. Stay informed with the latest research and clinical insights.', 'ma-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:search {"label":"<?php echo esc_attr__( 'Search magazines', 'ma-theme' ); ?>","showLabel":false,"placeholder":"<?php echo esc_attr__( 'Search by issue, topic, or publication date...', 'ma-theme' ); ?>","width":100,"widthUnit":"%","buttonText":"<?php echo esc_attr__( 'Search', 'ma-theme' ); ?>","buttonPosition":"button-inside","buttonUseIcon":true,"className":"magazine-search-bar","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}}} /-->

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"},"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"className":"magazine-filter-label"} -->
				<p class="magazine-filter-label"><?php echo esc_html__( 'Filter by:', 'ma-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:button {"className":"is-style-outline is-small"} -->
				<div class="wp-block-button is-style-outline is-small"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Latest Issues', 'ma-theme' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-outline is-small"} -->
				<div class="wp-block-button is-style-outline is-small"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( '2025', 'ma-theme' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-outline is-small"} -->
				<div class="wp-block-button is-style-outline is-small"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( '2024', 'ma-theme' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-outline is-small"} -->
				<div class="wp-block-button is-style-outline is-small"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'All Archives', 'ma-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
</div>
<!-- /wp:cover -->
