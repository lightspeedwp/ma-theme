<?php
/**
 * Title: WooCommerce Product Showcase
 * Slug: ma-theme/product-showcase-woocommerce
 * Description: Featured products section with pricing, ratings, and add to cart buttons.
 * Categories: woocommerce, featured, ecommerce
 * Keywords: woocommerce, products, shop, store, ecommerce, featured
 * Block Types: woocommerce/product-query
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Medical Academic
 * @since 1.0.0
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"contrast-light","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-contrast-light-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"textAlign":"center","level":2,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} -->
	<h2 class="wp-block-heading has-text-align-center" style="margin-bottom:var(--wp--preset--spacing--20)"><?php echo esc_html__( 'Featured Products', 'ma-theme' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
	<p class="has-text-align-center" style="margin-bottom:var(--wp--preset--spacing--50)"><?php echo esc_html__( 'Discover our carefully selected medical education resources and learning materials.', 'ma-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:query {"queryId":2,"query":{"perPage":4,"pages":0,"offset":0,"postType":"product","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"__woocommerceAttributes":[],"__woocommerceStockStatus":["instock"]},"namespace":"woocommerce/product-query","displayLayout":{"type":"flex","columns":4},"align":"wide"} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
			<!-- wp:group {"className":"product-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"radius":"8px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group product-card has-base-background-color has-background" style="border-radius:8px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:woocommerce/product-image {"isDescendentOfQueryLoop":true,"aspectRatio":"1:1","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}},"border":{"radius":"4px"}}} /-->

				<!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|10"}},"typography":{"fontSize":"1.125rem"}}} /-->

				<!-- wp:woocommerce/product-rating {"isDescendentOfQueryLoop":true,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}}} /-->

				<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"fontSize":"large","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}}} /-->

				<!-- wp:woocommerce/product-button {"isDescendentOfQueryLoop":true,"width":100,"className":"is-style-fill"} /-->
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

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:button {"className":"is-style-outline"} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/shop"><?php echo esc_html__( 'View All Products', 'ma-theme' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
