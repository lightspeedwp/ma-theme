<?php
/**
 * Title: Home CPD Section
 * Slug: ma-theme/home-cpd
 * Description: Home page CPD activities section with section header and a three-column query loop of CPD activity cards.
 * Categories: featured, posts
 * Keywords: cpd, activities, home, section, cards, query
 * Viewport Width: 1400
 * Inserter: yes
 *
 * @package Medical Academic
 * @since 1.0.0
 */
?>
<!-- wp:group {"metadata":{"name":"Home CPD Section"},"align":"full","className":"is-style-section-home","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-section-home">
<!-- wp:pattern {"slug":"ma-theme/section-header"} /-->

<!-- wp:query {"queryId":1,"query":{"perPage":"3","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"align":"wide"} -->
<div class="wp-block-query alignwide">
<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:pattern {"slug":"ma-theme/cpd-card"} /-->
<!-- /wp:post-template -->
</div>
<!-- /wp:query -->
</div>
<!-- /wp:group -->
