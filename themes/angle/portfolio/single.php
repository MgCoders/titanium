<?php

$client = get_post_meta( get_the_ID(), 'su_portfolio_item_client', true );
$slides = get_post_meta( get_the_ID(), 'wpzoom_slider', true );
$portfolios = get_the_terms( get_the_ID(), 'portfolio' );
?>

<?php get_header(); ?>

<nav class="portfolio_item-nav">

    <div class="inner-wrap">

        <div class="all_items"><a class="ir" href="<?php echo get_page_link(option::get('portfolio_url')); ?>"><span class="dashicons dashicons-screenoptions"></span></a></div>

        <?php
        $prev = get_previous_post();
        $next = get_next_post();
        ?>
        <ul class="portfolio_item-next">
            <?php if ( $next ) : ?>
                <li class="previous_item"><a href="<?php echo get_permalink( $next->ID ); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wpzoom' ), get_the_title( $next->ID ) ); ?>"><span class="dashicons dashicons-arrow-left-alt"></span></a></li>
            <?php endif; ?>

            <?php if ( $prev ) : ?>
                <li class="next_item"><a href="<?php echo get_permalink( $prev->ID ); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wpzoom' ), get_the_title( $prev->ID ) ); ?>"><span class="dashicons dashicons-arrow-right-alt"></span></a></li>
            <?php endif; ?>
        </ul>

    </div>
</nav>


<?php $entryCoverBackground = get_the_image( array( 'size' => 'featured', 'format' => 'array' ) ); ?>

<div class="page-header<?php if (has_post_thumbnail() ) { echo ' has-post-cover'; } ?>"<?php if ( isset( $entryCoverBackground['src'] ) ) : ?> style="background-image: url('<?php echo $entryCoverBackground['src'] ?>');"<?php endif; ?>>

    <div class="inner-wrap">

        <div class="page-header-content">

            <h1 class="archive-title">
                <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wpzoom' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
            </h1>

        </div>
    </div>
</div>



<div class="inner-wrap">

     <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="portfolio-meta">

            <?php if ($client) { ?>
               <span class="portfolio_item-client"><em><?php _e('Client', 'wpzoom'); ?></em> <?php echo $client; ?></span>
            <?php } ?>

            <?php if ( option::is_on( 'portfolio_date' ) ) { ?><span class="portfolio_item-date"><em><?php _e('Added on', 'wpzoom'); ?></em> <?php echo get_the_date(); ?></span><?php } ?>

            <?php if ( option::is_on( 'portfolio_category' ) ) { ?><span class="portfolio_item-category"><em><?php _e('Category', 'wpzoom'); ?></em>

                <?php if ($portfolios ) {
                    foreach ( $portfolios as $tax_menu_item ): ?>
                    <a href="<?php echo get_term_link($tax_menu_item,$tax_menu_item->taxonomy); ?>">
                        <?php echo $tax_menu_item->name; ?>
                    </a><br />
                <?php endforeach;
                } ?>

                </span>
            <?php } ?>

        </div>


        <div class="entry-content">

            <?php echo the_content(); ?>

            <?php edit_post_link( __( 'Edit', 'wpzoom' ), '<div class="entry-meta"><span class="edit-link">', '</span></div>' ); ?>
        </div>

    <?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>