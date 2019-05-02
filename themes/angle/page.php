<?php get_header(); ?>

<?php $entryCoverBackground = get_the_image( array( 'size' => 'featured', 'format' => 'array' ) ); ?>

<div class="page-header<?php if (has_post_thumbnail() ) { echo ' has-post-cover'; } ?>"<?php if ( isset( $entryCoverBackground['src'] ) ) : ?> style="background-image: url('<?php echo $entryCoverBackground['src'] ?>');"<?php endif; ?>>

    <div class="inner-wrap">

        <div class="page-header-content">

            <h1 class="archive-title"><?php the_title(); ?></h1>

        </div>
    </div>
</div>


<div class="inner-wrap">

    <main id="main" class="site-main" role="main">

        <section class="post-wrap">

            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'content', 'page' ); ?>

                <?php if (option::get('comments_page') == 'on') { ?>
                    <?php comments_template(); ?>
                <?php } ?>

            <?php endwhile; // end of the loop. ?>

        </section><!-- .single-post -->

    </main><!-- #main -->

</div>

<?php get_footer(); ?>