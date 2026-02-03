<?php
/**
 * Title: Digital Magazine Card
 * Slug: ma-theme/digital-magazine-card
 * Description: Display a digital magazine with issue number, publication date, and download/view links.
 * Categories: posts, featured, media
 * Keywords: magazine, publication, issue, pdf, digital, card
 * Block Types: core/query
 * Post Types: digital_magazine
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Medical Academic
 * @since 1.0.0
 */
?>
<!-- wp:group {"className":"digital-magazine-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"radius":"8px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group digital-magazine-card has-base-background-color has-background" style="border-radius:8px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/4","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}},"border":{"radius":"4px"}}} /-->

	<!-- wp:acf/display-field {"name":"acf/display-field","data":{"field":"issue_number","_field":"field_digital_magazine_issue_number"},"mode":"preview","className":"digital-magazine-card__issue","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}}} /-->

	<!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}}} /-->

	<!-- wp:acf/display-field {"name":"acf/display-field","data":{"field":"publication_date","_field":"field_digital_magazine_publication_date"},"mode":"preview","className":"digital-magazine-card__date","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} /-->

	<!-- wp:post-excerpt {"moreText":"","excerptLength":20,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}}} /-->

	<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"nowrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"className":"is-style-fill"} -->
		<div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html__( 'Read Online', 'ma-theme' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-outline"} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html__( 'Download PDF', 'ma-theme' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
