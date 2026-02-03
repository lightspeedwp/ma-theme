<?php
/**
 * Title: Speciality Filter Tabs
 * Slug: ma-theme/speciality-filter-tabs
 * Description: Tabbed interface to filter content by medical speciality taxonomy.
 * Categories: featured, query
 * Keywords: filter, tabs, speciality, taxonomy, category, navigation
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Medical Academic
 * @since 1.0.0
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"textAlign":"center","level":2,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}}} -->
	<h2 class="wp-block-heading has-text-align-center" style="margin-bottom:var(--wp--preset--spacing--40)"><?php echo esc_html__( 'Browse by Speciality', 'ma-theme' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:group {"className":"speciality-filter-tabs","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
	<div class="wp-block-group speciality-filter-tabs" style="margin-bottom:var(--wp--preset--spacing--40)">
		<!-- wp:button {"className":"is-style-outline speciality-filter-tabs__tab is-active"} -->
		<div class="wp-block-button is-style-outline speciality-filter-tabs__tab is-active"><a class="wp-block-button__link wp-element-button" href="#all"><?php echo esc_html__( 'All', 'ma-theme' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-outline speciality-filter-tabs__tab"} -->
		<div class="wp-block-button is-style-outline speciality-filter-tabs__tab"><a class="wp-block-button__link wp-element-button" href="#cardiology"><?php echo esc_html__( 'Cardiology', 'ma-theme' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-outline speciality-filter-tabs__tab"} -->
		<div class="wp-block-button is-style-outline speciality-filter-tabs__tab"><a class="wp-block-button__link wp-element-button" href="#neurology"><?php echo esc_html__( 'Neurology', 'ma-theme' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-outline speciality-filter-tabs__tab"} -->
		<div class="wp-block-button is-style-outline speciality-filter-tabs__tab"><a class="wp-block-button__link wp-element-button" href="#oncology"><?php echo esc_html__( 'Oncology', 'ma-theme' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-outline speciality-filter-tabs__tab"} -->
		<div class="wp-block-button is-style-outline speciality-filter-tabs__tab"><a class="wp-block-button__link wp-element-button" href="#pediatrics"><?php echo esc_html__( 'Pediatrics', 'ma-theme' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-outline speciality-filter-tabs__tab"} -->
		<div class="wp-block-button is-style-outline speciality-filter-tabs__tab"><a class="wp-block-button__link wp-element-button" href="#surgery"><?php echo esc_html__( 'Surgery', 'ma-theme' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:group -->

	<!-- wp:query {"queryId":3,"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":{"speciality":[]}},"displayLayout":{"type":"flex","columns":3},"align":"wide"} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"radius":"8px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-base-background-color has-background" style="border-radius:8px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}},"border":{"radius":"4px"}}} /-->

				<!-- wp:post-terms {"term":"speciality","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}}} /-->

				<!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}}} /-->

				<!-- wp:post-excerpt {"moreText":"","excerptLength":20,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} /-->

				<!-- wp:post-date {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}}} /-->
			</div>
			<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
			<!-- wp:query-pagination-previous /-->
			<!-- wp:query-pagination-numbers /-->
			<!-- wp:query-pagination-next /-->
		<!-- /wp:query-pagination -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->
