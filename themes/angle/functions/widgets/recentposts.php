<?php

/*------------------------------------------*/
/* WPZOOM: Recent Posts           */
/*------------------------------------------*/

class Wpzoom_Feature_Posts extends WP_Widget {

	function __construct() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'feature-posts', 'description' => 'A list of posts, optionally filter by category.' );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'wpzoom-feature-posts' );

		/* Create the widget. */
		parent::__construct( 'wpzoom-feature-posts', 'WPZOOM: Recent Posts', $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {

		extract( $args );

		/* User-selected settings. */
		$title 			= apply_filters('widget_title', $instance['title'] );
		$category 		= $instance['category'];
		$show_count 	= $instance['show_count'];
		$show_date 		= $instance['show_date'] ? true : false;
		$show_thumb 	= $instance['show_thumb'] ? true : false;
		$show_title 	= $instance['hide_title'] ? false : true;

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		echo '<ul class="feature-posts-list">';

		$query_opts = apply_filters('wpzoom_query', array(
			'posts_per_page' => $show_count,
			'post_type' => 'post',
			'post__not_in' => get_option( 'sticky_posts' )
		));
		if ( $category ) $query_opts['cat'] = $category;

		query_posts($query_opts);
		if ( have_posts() ) : while ( have_posts() ) : the_post();
			$echo_thumb = $show_thumb && array_key_exists('url', get_the_image( array( 'format' => 'array' ) ) );
			$echo_title = $show_title && get_the_title();

			/* Skip posts without title and thumb. */
			if ( ! $echo_thumb && ! $echo_title ) {
				continue;
			}

			echo '<li>';

 				if ( $show_thumb && has_post_thumbnail() ) {
					echo '<div class="post-thumb"><a href="' . get_permalink() . '"><img src="' . ui::thumbIt( absint( get_post_thumbnail_id() ), absint( $instance['thumb_width'] ), absint( $instance['thumb_height'] ) ) . '" height="' . $instance['thumb_height'] . '" width="' . $instance['thumb_width'] . '"></a></div>';
 				}

 				if ( $show_date ) echo '<small>' . get_the_date() . '</small>';

 				if ( $show_title ) echo '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3><br />';


			echo '<div class="clear"></div></li>';
			endwhile; else:
			endif;

			//Reset query_posts
			wp_reset_query();
		echo '</ul><div class="clear"></div>';

		/* After widget (defined by themes). */
		echo $after_widget;
	}


	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['category'] = $new_instance['category'];
		$instance['show_count'] = $new_instance['show_count'];
		$instance['show_date'] = $new_instance['show_date'];
		$instance['show_thumb'] = $new_instance['show_thumb'];
		$instance['hide_title'] = $new_instance['hide_title'];
		$instance['thumb_width'] = $new_instance['thumb_width'];
		$instance['thumb_height'] = $new_instance['thumb_height'];

		return $instance;
	}

	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Recent Posts', 'category' => 0, 'show_count' => 5, 'show_date' => false, 'show_thumb' => false, 'hide_title' => false, 'thumb_width' => 90, 'thumb_height' => 75 );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label><br />
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" type="text" class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>">Category:</label>
			<select id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>">
				<option value="0" <?php if ( !$instance['category'] ) echo 'selected="selected"'; ?>>All</option>
				<?php
				$categories = get_categories(array('type' => 'post'));

				foreach( $categories as $cat ) {
					echo '<option value="' . $cat->cat_ID . '"';

					if ( $cat->cat_ID == $instance['category'] ) echo  ' selected="selected"';

					echo '>' . $cat->cat_name . ' (' . $cat->category_count . ')';

					echo '</option>';
				}
				?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'show_count' ); ?>">Show:</label>
			<input id="<?php echo $this->get_field_id( 'show_count' ); ?>" name="<?php echo $this->get_field_name( 'show_count' ); ?>" value="<?php echo $instance['show_count']; ?>" type="text" size="2" /> posts
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['hide_title'], 'on' ); ?> id="<?php echo $this->get_field_id( 'hide_title' ); ?>" name="<?php echo $this->get_field_name( 'hide_title' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'hide_title' ); ?>">Hide post title</label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_date'], 'on' ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'show_date' ); ?>">Display post date</label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_thumb'], 'on' ); ?> id="<?php echo $this->get_field_id( 'show_thumb' ); ?>" name="<?php echo $this->get_field_name( 'show_thumb' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'show_thumb' ); ?>">Display post thumbnail</label>
		</p>

		<?php
		// only allow thumbnail dimensions if GD library supported
		if ( function_exists('imagecreatetruecolor') ) {
		?>
		<p>
		   <label for="<?php echo $this->get_field_id( 'thumb_width' ); ?>">Thumbnail size</label> <input type="text" id="<?php echo $this->get_field_id( 'thumb_width' ); ?>" name="<?php echo $this->get_field_name( 'thumb_width' ); ?>" value="<?php echo $instance['thumb_width']; ?>" size="3" /> x <input type="text" id="<?php echo $this->get_field_id( 'thumb_height' ); ?>" name="<?php echo $this->get_field_name( 'thumb_height' ); ?>" value="<?php echo $instance['thumb_height']; ?>" size="3" />
		</p>
		<?php
		}
		?>

		<?php
	}
}

function wpzoom_register_fp_widget() {
	register_widget('Wpzoom_Feature_Posts');
}
add_action('widgets_init', 'wpzoom_register_fp_widget');