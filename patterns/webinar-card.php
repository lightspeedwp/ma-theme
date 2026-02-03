<?php
/**
 * Title: Webinar Card
 * Slug: ma-theme/webinar-card
 * Description: Display a webinar/event with custom fields including date, type, CPD points, and registration link.
 * Categories: posts, featured, education
 * Keywords: webinar, event, cpd, course, education, card
 * Block Types: core/query
 * Post Types: webinar
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Medical Academic
 * @since 1.0.0
 */
?>
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

	<!-- wp:acf/display-field {"name":"acf/display-field","data":{"field":"duration_minutes","_field":"field_webinar_duration_minutes"},"mode":"preview","className":"webinar-card__duration","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} /-->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button {"className":"is-style-fill"} -->
		<div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html__( 'Register Now', 'ma-theme' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
