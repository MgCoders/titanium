<?php
/*
Template Name: Portfolio (isotope)
*/
?>

<?php get_header(); ?>

    <?php $entryCoverBackground = get_the_image( array( 'size' => 'featured', 'format' => 'array' ) ); ?>

    <div class="page-header<?php if (has_post_thumbnail() ) { echo ' has-post-cover'; } ?>"<?php if ( isset( $entryCoverBackground['src'] ) ) : ?> style="background-image: url('<?php echo $entryCoverBackground['src'] ?>');"<?php endif; ?>>

        <div class="inner-wrap">

            <div class="page-header-content">

                <h1 class="archive-title"><?php the_title(); ?></h1>

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php the_content(); ?>

                <?php endwhile; // end of the loop. ?>

            </div>
        </div>
    </div><!-- /.page-header -->

    <section class="portfolio-sidebar">
        <div class="inner-wrap">
            <ul class="portfolio-taxonomies portfolio-taxonomies-filter-by">
                <li class="cat-item cat-item-all current-cat"><a href="<?php echo get_page_link(option::get('portfolio_url')); ?>"><?php _e('All', 'wpzoom'); ?></a></li>
                <?php wp_list_categories( array( 'title_li' => '', 'hierarchical' => true,  'taxonomy' => 'portfolio', 'depth' => 1 ) ); ?>
            </ul>
        </div>
    </section>

    <div class="inner-wrap">

        <section id="main" class="portfolio-main" role="main">

            <ul class="portfolio-grid clearfix">

                <?php
                global $wp_query;
                global $paged;

                wp_reset_query();
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                $args = array(
                    'post_type' => 'portfolio_item',
                    'paged' => $paged,
                    'posts_per_page' => 99,
                    );

                $wp_query = new WP_Query($args);

                while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

                   <?php get_template_part('portfolio/loop'); ?>

                <?php endwhile;  ?>

            </ul>

            <?php wp_reset_query(); ?>

        </section><!-- /#main -->


        <div class="clear"></div>

    </div><!--/.inner-wrap-->
<?php get_footer(); ?>