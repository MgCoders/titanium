<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <section class="entry-body">

        <div class="entry-content">
            <?php the_content(); ?>

            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'wpzoom' ),
                    'after'  => '</div>',
                ) );
            ?>


            <?php if ( option::is_on( 'post_tags' ) ) : ?>

                <?php
                the_tags(
                    '<div class="tag_list">' . __( 'Tags:', 'wpzoom' ). ' ',
                    '<span class="separator">,</span>',
                    '</div>'
                );
                ?>

            <?php endif; ?>
        </div><!-- .entry-content -->

    </section>

    <footer class="entry-footer">

        <?php if ( option::is_on( 'post_share' ) ) : ?>

            <div class="share">

                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode( get_permalink() ); ?>&text=<?php echo urlencode( get_the_title() ); ?>" target="_blank" title="<?php esc_attr_e( 'Tweet this on Twitter', 'wpzoom' ); ?>" class="twitter"><?php echo option::get( 'post_share_label_twitter' ); ?></a>

                <a href="https://facebook.com/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>&t=<?php echo urlencode( get_the_title() ); ?>" target="_blank" title="<?php esc_attr_e( 'Share this on Facebook', 'wpzoom' ); ?>" class="facebook"><?php echo option::get( 'post_share_label_facebook' ); ?></a>

                <a href="https://plus.google.com/share?url=<?php echo urlencode( get_permalink() ); ?>" target="_blank" title="<?php esc_attr_e( 'Post this to Google+', 'wpzoom' ); ?>" class="gplus"><?php echo option::get( 'post_share_label_gplus' ); ?></a>
                <div class="clear"></div>
            </div>

        <?php endif; ?>

        <?php if ( option::is_on( 'post_author' ) ) : ?>

            <div class="post_author">

                <?php echo get_avatar( get_the_author_meta( 'ID' ) , 65 ); ?>

                <span><?php _e( 'Written by', 'wpzoom' ); ?></span>

                <?php the_author_posts_link(); ?>

            </div>

        <?php endif; ?>

    </footer><!-- .entry-footer -->

    <div class="clear"></div>

</article><!-- #post -->