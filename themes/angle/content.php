<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ( option::is_on( 'index_thumb' ) ) {
        get_the_image( array( 'size' => 'loop', 'width' => option::get('thumb_width'), 'height' => option::get('thumb_height'), 'before' => '<div class="post-thumb">', 'after' => '</div>' ) );
    } ?>

    <section class="entry-body">

        <header class="entry-header">
            <?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

            <div class="entry-meta">
                <?php if ( option::is_on( 'display_author' ) ) { ?>
                    <span class="entry-author">
                        <?php _e('Written by', 'wpzoom'); ?>
                        <?php the_author_posts_link(); ?>
                    </span>
                <?php } ?>

                <?php if ( option::is_on( 'display_date' ) ) { ?><span class="entry-date"><?php _e('on', 'wpzoom'); ?> <?php echo get_the_date(); ?></span><?php } ?>

                <?php if ( option::is_on( 'display_category' ) ) printf( '<span class="cat-links">' .__('in', 'wpzoom') . ' %s</span>', get_the_category_list( ', ' ) ); ?>

                <?php if ( option::is_on( 'display_comments' ) ) { ?><span class="comments-no"><?php comments_popup_link( __('0 comments', 'wpzoom'), __('1 comment', 'wpzoom'), __('% comments', 'wpzoom'), '', __('Comments are Disabled', 'wpzoom')); ?></span><?php } ?>

                <?php edit_post_link( __( 'Edit', 'wpzoom' ), '<span class="edit-link">', '</span>' ); ?>

                <div class="clear"></div>
            </div>

        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php if (option::get('display_content') == 'Full Content') {
                the_content(''.__('Read More &rarr;', 'wpzoom').'');
            }
            if (option::get('display_content') == 'Excerpt')  {
                the_excerpt();
            } ?>
        </div>
    </section>

    <div class="clear"></div>
</article><!-- #post -->