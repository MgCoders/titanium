<?php


/* Registering metaboxes
============================================*/

add_action('admin_menu', 'wpzoom_options_box');

function wpzoom_options_box() {

	add_meta_box( 'wpzoom_top_button', 'Slideshow Options', 'wpzoom_top_button_options', 'slider', 'side', 'high' );

 	add_meta_box( 'startingup_portfolio_item_meta', 'Optional Details', 'su_portfolio_meta_box_options', 'portfolio_item', 'side', 'high' );
}


function wpz_newpost_head() {
    ?><style type="text/css">
        fieldset.fieldset-show { padding: 0.3em 0.8em 1em; border: 1px solid rgba(0, 0, 0, 0.2); -moz-border-radius: 3px; -webkit-border-radius: 3px; border-radius: 3px; }
        fieldset.fieldset-show p { margin: 0 0 1em; }
        fieldset.fieldset-show p:last-child { margin-bottom: 0; }
    </style><?php
}
add_action('admin_head-post-new.php', 'wpz_newpost_head', 100);
add_action('admin_head-post.php', 'wpz_newpost_head', 100);

/* Slideshow Options
============================================*/
function wpzoom_top_button_options() {
    global $post;

    ?>

    <p>
        <strong><label for="wpzoom_slide_url"><?php _e( 'Slide URL', 'wpzoom' ); ?></label></strong> (<?php _e('optional', 'wpzoom'); ?>)<br/>
        <input type="text" name="wpzoom_slide_url" id="wpzoom_slide_url" class="widefat"
               value="<?php echo esc_url( get_post_meta( $post->ID, 'wpzoom_slide_url', true ) ); ?>"/>
    </p>


    <fieldset class="fieldset-show">
        <legend><strong><?php _e( 'Slide Button', 'wpzoom' ); ?></strong></legend>

        <p>
            <label>
                <strong><?php _e( 'Title', 'wpzoom' ); ?></strong> <?php _e( '(optional)', 'wpzoom' ); ?>
                <input type="text" name="wpzoom_slide_button_title" id="wpzoom_slide_button_title" class="widefat" value="<?php echo esc_attr( get_post_meta( $post->ID, 'wpzoom_slide_button_title', true ) ); ?>" />
            </label>
        </p>

        <p>
            <label>
                <strong><?php _e( 'URL', 'wpzoom' ); ?></strong> <?php _e( '(optional)', 'wpzoom' ); ?>
                <input type="text" name="wpzoom_slide_button_url" id="wpzoom_slide_button_url" class="widefat" value="<?php echo esc_url( get_post_meta( $post->ID, 'wpzoom_slide_button_url', true ) ); ?>" />
            </label>
        </p>

   </fieldset>


<?php
}


/**
 * Callback that prints out the HTML for the edit screen section on portfolio_item
 * post/post-edit pages. Extends ZOOM_Portfolio.
 *
 * @return void
 */
function su_portfolio_meta_box_options() {
	global $post; ?>
    <fieldset>

        <p>
            <label for="su_portfolio_item_client" ><?php _e('Client\'s Name:', 'wpzoom'); ?></label><br />
            <input style="width: 255px;" type="text" name="su_portfolio_item_client" id="su_portfolio_item_client" value="<?php echo get_post_meta( $post->ID, 'su_portfolio_item_client', true ); ?>"/>
        </p>

    </fieldset>
    <?php
}

/**
 * Hook for saving custom fields for portfolio_item post type.
 *
 * @param  int $post_id The ID of the post which contains the field you will edit.
 * @return void
 */
function su_portfolio_meta_box_options_save_post( $post_id ) {
	// called after a post or page is saved
	if ( $parent_id = wp_is_post_revision( $post_id ) ) {
		$post_id = $parent_id;
	}

	if ( ! isset( $_POST['save'] ) && ! isset( $_POST['publish'] ) ) return;

	if ( $_POST['post_type'] !== 'portfolio_item' ) return;

	update_custom_meta( $post_id, $_POST['su_portfolio_item_client'], 'su_portfolio_item_client' );
}
add_action( 'save_post', 'su_portfolio_meta_box_options_save_post' );



add_action( 'save_post', 'custom_add_save' );

function custom_add_save( $post_id ) {

	// called after a post or page is saved
	if ( $parent_id = wp_is_post_revision( $post_id ) ) {
	  $post_id = $parent_id;
	}


	if ( isset( $_POST['save'] ) || isset( $_POST['publish'] ) ) {


		if ( isset( $_POST['wpzoom_slide_url'] ) )
		    update_custom_meta( $post_id, esc_url_raw( $_POST['wpzoom_slide_url'] ), 'wpzoom_slide_url' );

		if ( isset( $_POST['wpzoom_slide_button_title'] ) )
		    update_custom_meta( $post_id, $_POST['wpzoom_slide_button_title'] , 'wpzoom_slide_button_title' );

		if ( isset( $_POST['wpzoom_slide_button_url'] ) )
		    update_custom_meta( $post_id, esc_url_raw( $_POST['wpzoom_slide_button_url'] ), 'wpzoom_slide_button_url' );

 	}
}


/**
 * Updates meta field for portfolio post type,
 * creates them if don't exist.
 *
 * @param  int    $post_id     The ID of the post to which a custom field should be added.
 * @param  string $meta_value  The value of the custom field which should be added. If an array is given, it will be serialized into a string.
 * @param  mixed  $meta_key    The key of the custom field which should be added.
 * @return void
 */
function update_custom_meta( $post_id, $meta_value, $meta_key ) {
    // To create new meta
    if ( ! get_post_meta( $post_id, $meta_key ) ) {
        add_post_meta( $post_id, $meta_key, $meta_value );
    } else {
        // or to update existing meta
        update_post_meta( $post_id, $meta_key, $meta_value );
    }
}