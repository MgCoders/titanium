<?php get_header(); ?>

<?php
$taxonomy_obj = $wp_query->get_queried_object();
$taxonomy_nice_name = $taxonomy_obj->name;
?>

    <div class="page-header">

        <div class="inner-wrap">

            <h1 class="archive-title"><?php _e('Portfolio', 'wpzoom'); ?></h1>

        </div>

    </div>

    <section class="portfolio-sidebar">
        <div class="inner-wrap">
            <ul class="portfolio-taxonomies">
                <li class="cat-item cat-item-all"><a href="<?php echo get_page_link(option::get('portfolio_url')); ?>"><?php _e('All', 'wpzoom'); ?></a></li>
                <?php wp_list_categories( array( 'title_li' => '', 'hierarchical' => true,  'taxonomy' => 'portfolio', 'depth' => 1 ) ); ?>
            </ul>
        </div>
    </section>


    <div class="inner-wrap">

        <section id="main" class="portfolio-main" role="main">

            <ul class="portfolio-grid clearfix">

                <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

                   <?php get_template_part('portfolio/loop'); ?>

                <?php endwhile;  ?>

            </ul>

            <?php get_template_part( 'pagination' ); ?>
            <?php wp_reset_query(); ?>


        </section><!-- /#main -->

        <div class="clear"></div>

    </div><!--/.inner-wrap-->
<?php get_footer(); ?>