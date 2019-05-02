<?php
/**
 * Custom template tags.
 */

/* Comments Custom Template
==================================== */

if ( ! function_exists( 'angle_comment' ) ) :

	function angle_comment( $comment, $args, $depth ) {
     $GLOBALS['comment'] = $comment;
     switch ( $comment->comment_type ) :
         case '' :
             ?>
             <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
             <div id="comment-<?php comment_ID(); ?>">
                 <div class="comment-author vcard">
                     <?php echo get_avatar( $comment, 50 ); ?>
                     <?php printf( '<cite class="fn">%s</cite>', get_comment_author_link() ); ?>

                     <div class="comment-meta commentmetadata"><a
                             href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                             <?php printf( __( '%s @ %s', 'wpzoom' ), get_comment_date(), get_comment_time() ); ?></a>
                             <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => 'Reply', 'before' => '&nbsp;·&nbsp;&nbsp;' ) ) ); ?>
                             <?php edit_comment_link( __( 'Edit', 'wpzoom' ), '&nbsp;·&nbsp;&nbsp;' ); ?>

                     </div>
                     <!-- .comment-meta .commentmetadata -->

                 </div>
                 <!-- .comment-author .vcard -->
                 <?php if ( $comment->comment_approved == '0' ) : ?>
                     <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'wpzoom' ); ?></em>
                     <br/>
                 <?php endif; ?>

                 <div class="comment-body"><?php comment_text(); ?></div>

             </div><!-- #comment-##  -->

             <?php
             break;
         case 'pingback'  :
         case 'trackback' :
             ?>
             <li class="post pingback">
             <p><?php _e( 'Pingback:', 'wpzoom' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'wpzoom' ), ' ' ); ?></p>
             <?php
             break;
     endswitch;
 }
endif;