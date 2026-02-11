<?php
/**
 * Block patterns registration for Medical Academic
 *
 * @package Medical Academic
 * @since 1.0.0
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register hero section pattern.
 */
function ma_theme_register_hero_pattern() {
	register_block_pattern(
		'ma-theme/hero-section',
		array(
			'title'       => __( 'Hero Section', 'ma-theme' ),
			'description' => __( 'A large hero section with heading, text, and button.', 'ma-theme' ),
			'categories'  => array( 'ma-theme-hero' ),
			'keywords'    => array( 'hero', 'banner', 'header' ),
			'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","bottom":"var:preset|spacing|90"}}},"backgroundColor":"information-foreground","textColor":"error-background","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-color has-information-foreground-background-color has-text-color has-error-background-color" style="padding-top:var(--wp--preset--spacing--90);padding-bottom:var(--wp--preset--spacing--90)">
	<!-- wp:heading {"textAlign":"center","level":1,"fontSize":"700"} -->
	<h1 class="wp-block-heading has-text-align-center has-700-font-size">{{hero_title}}</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","fontSize":"500"} -->
	<p class="has-text-align-center has-500-font-size">{{hero_description}}</p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|90"}}}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--90)">
		<!-- wp:button {"backgroundColor":"error-background","textColor":"information-foreground","className":"is-style-fill"} -->
		<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-information-foreground-color has-error-background-background-color has-text-color has-error-background-color wp-element-button">{{hero_button_text}}</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->',
		)
	);
}
add_action( 'init', 'ma_theme_register_hero_pattern' );

/**
 * Register call to action pattern.
 */
function ma_theme_register_cta_pattern() {
	register_block_pattern(
		'ma-theme/call-to-action',
		array(
			'title'       => __( 'Call to Action', 'ma-theme' ),
			'description' => __( 'A call to action section with heading and button.', 'ma-theme' ),
			'categories'  => array( 'ma-theme-cta' ),
			'keywords'    => array( 'cta', 'call to action', 'button' ),
			'content'     => '<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|90","bottom":"var:preset|spacing|90","left":"var:preset|spacing|90","right":"var:preset|spacing|90"}},"border":{"width":"1px","style":"solid"}},"borderColor":"neutral-900","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-border-color has-neutral-900-border-color" style="border-style:solid;border-width:1px;padding-top:var(--wp--preset--spacing--90);padding-right:var(--wp--preset--spacing--90);padding-bottom:var(--wp--preset--spacing--90);padding-left:var(--wp--preset--spacing--90)">
	<!-- wp:heading {"textAlign":"center","level":2} -->
	<h2 class="wp-block-heading has-text-align-center">{{cta_title}}</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center">{{cta_description}}</p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">{{cta_button_text}}</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->',
		)
	);
}
add_action( 'init', 'ma_theme_register_cta_pattern' );

/**
 * Register team section pattern.
 */
function ma_theme_register_team_pattern() {
	register_block_pattern(
		'ma-theme/team-section',
		array(
			'title'       => __( 'Team Section', 'ma-theme' ),
			'description' => __( 'A team section with multiple team member cards.', 'ma-theme' ),
			'categories'  => array( 'ma-theme-team' ),
			'keywords'    => array( 'team', 'members', 'staff' ),
			'content'     => '<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide">
	<!-- wp:heading {"textAlign":"center","level":2} -->
	<h2 class="wp-block-heading has-text-align-center">{{team_title}}</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center">{{team_description}}</p>
	<!-- /wp:paragraph -->

	<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|90","left":"var:preset|spacing|90"}}}} -->
	<div class="wp-block-columns">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"50%"}}} -->
			<figure class="wp-block-image size-large has-custom-border"><img alt="" style="border-radius:50%;aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"textAlign":"center","level":3} -->
			<h3 class="wp-block-heading has-text-align-center">{{team_member_1_name}}</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","textColor":"neutral-900"} -->
			<p class="has-text-align-center has-neutral-900-color has-text-color">{{team_member_1_role}}</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"50%"}}} -->
			<figure class="wp-block-image size-large has-custom-border"><img alt="" style="border-radius:50%;aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"textAlign":"center","level":3} -->
			<h3 class="wp-block-heading has-text-align-center">{{team_member_2_name}}</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","textColor":"neutral-900"} -->
			<p class="has-text-align-center has-neutral-900-color has-text-color">{{team_member_2_role}}</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"50%"}}} -->
			<figure class="wp-block-image size-large has-custom-border"><img alt="" style="border-radius:50%;aspect-ratio:1;object-fit:cover"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"textAlign":"center","level":3} -->
			<h3 class="wp-block-heading has-text-align-center">{{team_member_3_name}}</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","textColor":"neutral-900"} -->
			<p class="has-text-align-center has-neutral-900-color has-text-color">{{team_member_3_role}}</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->',
		)
	);
}
add_action( 'init', 'ma_theme_register_team_pattern' );
