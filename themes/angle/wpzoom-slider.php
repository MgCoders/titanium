<?php
$sliderLoop = new WP_Query( array(
	'post_type' 	 => 'slider',
	'posts_per_page' => option::get( 'featured_posts_posts' )
) );
?>

<div class="slider-wrap">

    <div class="inner-wrap">

		<div id="slider">

			<?php if ( $sliderLoop->have_posts() ) : ?>

				<ul class="slides">

					<?php while ( $sliderLoop->have_posts() ) : $sliderLoop->the_post(); ?>

						<?php
						$slide_url = trim( get_post_meta( get_the_ID(), 'wpzoom_slide_url', true ) );
						$btn_title = trim( get_post_meta( get_the_ID(), 'wpzoom_slide_button_title', true ) );
						$btn_url = trim( get_post_meta( get_the_ID(), 'wpzoom_slide_button_url', true ) );
						$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'featured');
						$small_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'featured-small');

						$style = ' style="background-image:url(\'' . $small_image_url[0] . '\')" data-bigimg="' . $large_image_url[0] . '"' ;
						?>

						<li<?php echo $style; ?>>
		 					<div class="li-wrap">
			 					<div class="slide-content">

									<?php if ( empty( $slide_url ) ) : ?>

										<?php the_title( '<h3 class="missing-url">', '</h3>' ); ?>

									<?php else: ?>

										<?php the_title( sprintf( '<h3><a href="%s">', esc_url( $slide_url ) ), '</a></h3>' ); ?>

									<?php endif; ?>

									<?php if ( !empty( $btn_title ) && !empty( $btn_url ) ) {
										?><div class="slide_button">
		 									<a href="<?php echo esc_url($btn_url) ?>"><?php echo esc_html($btn_title) ?></a>
										</div><?php
									} ?>
								</div>
							</div>
			 			</li>
					<?php endwhile; ?>

				</ul>


			<?php else: ?>

				<div class="empty-slider">
					<p><strong><?php _e( 'You are now ready to set-up your Slideshow content.', 'wpzoom' ); ?></strong></p>

					<p>
						<?php
						printf(
							__( 'For more information about adding posts to the slider, please <strong><a href="%1$s">read the documentation</a></strong> or <a href="%2$s">add a new post</a>.', 'wpzoom' ),
							'http://www.wpzoom.com/documentation/angle/',
							admin_url( 'post-new.php?post_type=slider' )
						);
						?>
					</p>
				</div>

			<?php endif; ?>

		</div>

     </div>

</div>

<?php wp_reset_query(); ?>