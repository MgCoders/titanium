<?php

/*------------------------------------------*/
/* WPZOOM: Portfolio Posts     			    */
/*------------------------------------------*/

class Wpzoom_Portfolio_Posts extends WP_Widget {

	function __construct() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'portfolio-posts', 'description' => 'A list of portfolio posts, optionally filter by category.' );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'wpzoom-portfolio-posts' );

		/* Create the widget. */
		parent::__construct( 'wpzoom-portfolio-posts', 'WPZOOM: Portfolio', $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {

		extract( $args );

		/* User-selected settings. */
		$title 			= apply_filters('widget_title', $instance['title'] );
		$category 		= $instance['category'];
		$show_count 	= $instance['show_count'];
 		$show_title 	= $instance['hide_title'] ? false : true;
 		$show_category 	= $instance['show_category'] ? true : false;

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		echo '<ul class="portfolio-grid">';

		$query_opts = apply_filters('wpzoom_query', array(
			'posts_per_page' => $show_count,
			'post_type' => 'portfolio_item'
		));
		if ( $category ) $query_opts['portfolio'] = $category;

		query_posts($query_opts);
		if ( have_posts() ) : while ( have_posts() ) : the_post();

			$terms = get_the_terms( get_the_ID(), 'portfolio' );
			echo '<li class="portfolio_item">'; ?>

		           <div class="post-thumb">
			           <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'wpzoom'), get_the_title()); ?>">

	                        <?php get_the_image( array( 'size' => 'portfolio-thumb',  'width' => 600, 'height' => 400, 'link_to_post' => false  ) ); ?>

	        				<div class="item_overlay">
	        					<h4><?php _e('View Project', 'wpzoom'); ?></h4>
	        				</div>
	        			</a>
        			</div>

        		<?php

				if ( $show_title ) echo '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
				if ( $show_category)

					if (is_array($terms)) {
						$tcount = count($terms);
						$i = 0;
						foreach ($terms as $term) {
							$i++;

							echo '<span class="portfolio-sub">';
							echo $term->name;
							if ($i < $tcount) {echo ', '; }
							echo '</span>';
						}
					}


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
 		$instance['hide_title'] = $new_instance['hide_title'];
 		$instance['show_category'] = $new_instance['show_category'];

		return $instance;
	}

	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Latest Projects', 'category' => 0, 'show_count' => 6, 'hide_title' => false, 'show_category' => false );
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
 				$categories = (array) get_terms( 'portfolio', array( 'hierarchical' => false, 'orderby' => 'name' ) );

				foreach( $categories as $cat ) {
					echo '<option value="' . $cat->term_id . '"';

					if ( $cat->term_id == $instance['category'] ) echo  ' selected="selected"';

					echo '>' . $cat->name;

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
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_category'], 'on' ); ?> id="<?php echo $this->get_field_id( 'show_category' ); ?>" name="<?php echo $this->get_field_name( 'show_category' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'show_category' ); ?>">Display category</label>
		</p>


		<?php
	}
}

function wpzoom_register_pp_widget() {
	register_widget('Wpzoom_Portfolio_Posts');
}
add_action('widgets_init', 'wpzoom_register_pp_widget');