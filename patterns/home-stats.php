<?php
/**
 * Title: Home Stats
 * Slug: ma-theme/home-stats
 * Description: A four-column stats counter bar displaying key metrics with large numbers and labels.
 * Categories: featured, banner
 * Keywords: stats, counters, numbers, metrics, home
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Medical Academic
 * @since 1.0.0
 */

$stat_1_number = esc_html__( '120+', 'ma-theme' );
$stat_1_label  = esc_html__( 'CPD activities', 'ma-theme' );
$stat_2_number = esc_html__( '30+', 'ma-theme' );
$stat_2_label  = esc_html__( 'Upcoming webinars', 'ma-theme' );
$stat_3_number = esc_html__( '15', 'ma-theme' );
$stat_3_label  = esc_html__( 'Digital magazines', 'ma-theme' );
$stat_4_number = esc_html__( '200+', 'ma-theme' );
$stat_4_label  = esc_html__( 'Research papers', 'ma-theme' );
?>
<!-- wp:group {"metadata":{"name":"Home Stats"},"align":"full","className":"is-style-stats-home","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-stats-home">
<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns alignwide">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"textAlign":"center","level":2,"style":{"spacing":{"margin":{"bottom":"0"}}}} -->
<h2 class="wp-block-heading has-text-align-center" style="margin-bottom:0"><?php echo esc_html( $stat_1_number ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php echo esc_html( $stat_1_label ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"textAlign":"center","level":2,"style":{"spacing":{"margin":{"bottom":"0"}}}} -->
<h2 class="wp-block-heading has-text-align-center" style="margin-bottom:0"><?php echo esc_html( $stat_2_number ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php echo esc_html( $stat_2_label ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"textAlign":"center","level":2,"style":{"spacing":{"margin":{"bottom":"0"}}}} -->
<h2 class="wp-block-heading has-text-align-center" style="margin-bottom:0"><?php echo esc_html( $stat_3_number ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php echo esc_html( $stat_3_label ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"textAlign":"center","level":2,"style":{"spacing":{"margin":{"bottom":"0"}}}} -->
<h2 class="wp-block-heading has-text-align-center" style="margin-bottom:0"><?php echo esc_html( $stat_4_number ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php echo esc_html( $stat_4_label ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->
