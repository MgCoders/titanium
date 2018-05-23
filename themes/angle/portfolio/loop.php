<?php
$portfolios = wp_get_post_terms( get_the_ID(), 'portfolio' );
$additional_classes = array();
if ( is_array( $portfolios ) ) foreach ( $portfolios as $portfolio ) $additional_classes[] = 'portfolio_' . $portfolio->term_id . '_item';
?>
<li id="post-<?php the_ID(); ?>" <?php post_class( $additional_classes ); ?>>
    <?php get_the_image( array( 'size' => 'portfolio-thumb', 'width' => 600, 'height' => 400, 'before' => '<div class="post-thumb">', 'after' => '</div>' ) ); ?>

    <h3><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wpzoom' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>

    <?php if (option::get('portfolio_display_category') == 'on') { ?>
        <span class="portfolio-sub">
            <?php if (is_array($portfolios)) {
                $tcount = count($portfolios);
                $i = 0;
                foreach ($portfolios as $term) {
                    $i++;

                    echo '<span class="portfolio-sub">';
                    echo $term->name;
                    if ($i < $tcount) {echo ', '; }
                    echo '</span>';
                }
            } ?>
        </span>
    <?php } ?>

    <div class="clear"></div>
</li><!-- #post-<?php the_ID(); ?> -->