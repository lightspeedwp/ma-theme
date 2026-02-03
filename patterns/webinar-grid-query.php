<?php
/**
 * Title: Webinar Grid Query
 * Slug: ma-theme/webinar-grid-query
 * Description: A query loop displaying webinars in a responsive grid layout with filtering options.
 * Categories: query, posts, education
 * Keywords: webinar, grid, query, loop, events, cpd
 * Block Types: core/query
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
	<h2 class="wp-block-heading has-text-align-center" style="margin-bottom:var(--wp--preset--spacing--40)"><?php echo esc_html__( 'Upcoming Webinars & Events', 'ma-theme' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:query {"queryId":1,"query":{"perPage":6,"pages":0,"offset":0,"postType":"webinar","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null},"displayLayout":{"type":"flex","columns":3},"align":"wide"} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
			<!-- wp:group {"className":"webinar-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"radius":"8px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group webinar-card has-base-background-color has-background" style="border-radius:8px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}},"border":{"radius":"4px"}}} /-->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
				<div class="wp-block-group">
					<!-- wp:acf/display-field {"name":"acf/display-field","data":{"field":"webinar_type","_field":"field_webinar_webinar_type"},"mode":"preview","className":"webinar-card__type"} /-->

					<!-- wp:acf/display-field {"name":"acf/display-field","data":{"field":"cpd_points","_field":"field_webinar_cpd_points"},"mode":"preview","className":"webinar-card__cpd"} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|10"}}}} /-->

				<!-- wp:acf/display-field {"name":"acf/display-field","data":{"field":"event_date","_field":"field_webinar_event_date"},"mode":"preview","className":"webinar-card__date","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} /-->

				<!-- wp:post-excerpt {"moreText":"","excerptLength":25,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} /-->

				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button {"width":100,"className":"is-style-fill"} -->
					<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-fill"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Register Now', 'ma-theme' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
			<!-- wp:query-pagination-previous /-->
			<!-- wp:query-pagination-numbers /-->
			<!-- wp:query-pagination-next /-->
		<!-- /wp:query-pagination -->

		<!-- wp:query-no-results -->
			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center"><?php echo esc_html__( 'No webinars found.', 'ma-theme' ); ?></p>
			<!-- /wp:paragraph -->
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->
