<?php
/**
 * The template used for displaying page content in page.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php edit_post_link( __( 'Edit', 'wpzoom' ), '<div class="entry-meta"><span class="edit-link">', '</span></div>' ); ?>

    <div class="entry-content">
        <?php the_content(); ?>
        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'wpzoom' ),
                'after'  => '</div>',
            ) );
        ?>
    </div><!-- .entry-content -->


</article><!-- #post-## -->