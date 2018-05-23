<?php
/**
 * The Template for displaying all single posts.
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <?php $entryCoverBackground = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'featured' ); ?>

    <div class="page-header<?php if (has_post_thumbnail() && option::is_on( 'post_thumb' ) ) { echo ' has-post-cover'; } ?>"<?php if ( has_post_thumbnail() && option::is_on( 'post_thumb' ) ) { ?> style="background-image: url('<?php echo $entryCoverBackground; ?>')"<?php } ?>>

        <div class="inner-wrap">

            <div class="page-header-content">

                <?php the_title( '<h1 class="archive-title">', '</h1>' ); ?>

            </div>
        </div>
    </div>


    <div class="inner-wrap">

        <main id="main" class="site-main container-fluid" role="main">

            <section class="post-wrap">

                <div class="entry-meta">
                     <?php if ( option::is_on( 'post_author' ) ) { ?>
                         <span class="entry-author">
                             <?php _e('Written by', 'wpzoom'); ?>
                             <?php the_author_posts_link(); ?>
                         </span>
                     <?php } ?>

                     <?php if ( option::is_on( 'post_date' ) ) { ?><span class="entry-date"><?php _e('on', 'wpzoom'); ?> <?php echo get_the_date(); ?></span><?php } ?>

                     <?php if ( option::is_on( 'post_category' ) ) printf( '<span class="cat-links">' .__('in', 'wpzoom') . ' %s</span>', get_the_category_list( ', ' ) ); ?>


                     <?php edit_post_link( __( 'Edit', 'wpzoom' ), '<span class="edit-link">', '</span>' ); ?>

                     <div class="clear"></div>
                 </div>


                <?php get_template_part( 'content', 'single' ); ?>


                <?php if (option::get('post_comments') == 'on') : ?>

                    <?php comments_template(); ?>

                <?php endif; ?>

            </section><!-- .single-post -->

        </main><!-- #main -->

    </div>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>