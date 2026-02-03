<?php
/**
 * Title: LifterLMS Course Card
 * Slug: ma-theme/course-card-lifterlms
 * Description: Display a LifterLMS course with subtitle, progress, and enrollment button.
 * Categories: posts, featured, education
 * Keywords: course, lifterlms, learning, education, training, card
 * Block Types: core/query
 * Post Types: course
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Medical Academic
 * @since 1.0.0
 */
?>
<!-- wp:group {"className":"course-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"radius":"8px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group course-card has-base-background-color has-background" style="border-radius:8px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}},"border":{"radius":"4px"}}} /-->

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
	<div class="wp-block-group">
		<!-- wp:post-terms {"term":"course_cat","className":"course-card__category"} /-->

		<!-- wp:post-terms {"term":"course_difficulty","className":"course-card__difficulty"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|10"}}}} /-->

	<!-- wp:acf/display-field {"name":"acf/display-field","data":{"field":"subtitle","_field":"field_sfwd_course_subtitle"},"mode":"preview","className":"course-card__subtitle","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} /-->

	<!-- wp:post-excerpt {"moreText":"","excerptLength":30,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} /-->

	<!-- wp:separator {"className":"is-style-wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}}} -->
	<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--20)"/>
	<!-- /wp:separator -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"className":"course-card__meta"} -->
		<p class="course-card__meta"><?php echo esc_html__( '12 Lessons', 'ma-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"course-card__duration"} -->
		<p class="course-card__duration"><?php echo esc_html__( '6 Hours', 'ma-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)">
		<!-- wp:button {"width":100,"className":"is-style-fill"} -->
		<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-fill"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Enroll Now', 'ma-theme' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
