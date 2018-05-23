<?php
/**
 * Template Name: Homepage (Widgetized)
 */

get_header(); ?>

    <?php if (option::is_on('featured_posts_show') ) { // Show the Featured Slider
        get_template_part('wpzoom-slider');
    } ?>


<div class="inner-wrap">

    <?php if (option::is_on('intro') ) { ?>

        <div id="heading">

            <h2><?php echo option::get('intro_title'); ?></h2>

            <span class="description"><?php echo option::get('intro_content'); ?></span>

            <?php if (option::get('intro_url') != '') : ?>
                <a href="<?php echo option::get('intro_url'); ?>" class="action"><?php echo option::get('intro_btn'); ?> &rarr;</a>
            <?php endif; ?>
            <div class="clear"></div>
        </div><!-- / #heading -->

    <?php } ?>

    <?php
    $widgets_areas = (int) get_theme_mod( 'home-widget-columns', angle_get_default( 'home-widget-columns' ) );

    $has_active_sidebar = false;
    if ( $widgets_areas > 0 ) {
        $i = 1;

        while ( $i <= $widgets_areas ) {
            if ( is_active_sidebar( 'home-' . $i ) ) {
                $has_active_sidebar = true;
                break;
            }

            $i++;
        }
    }
    ?>

    <?php if ( $has_active_sidebar ) : ?>

            <div class="home_widgets cols-<?php echo $widgets_areas; ?>">

                <h3 class="section-title"><?php echo get_theme_mod( 'home-widget-section-text', angle_get_default( 'home-widget-section-text' ) ); ?></h3>

                <?php for ( $i = 1; $i <= $widgets_areas; $i ++ ) : ?>

                    <div class="home_column <?php echo ($i == $widgets_areas ? 'last' : ''); ?>">
                        <?php dynamic_sidebar( 'home-' . $i ) ?>
                    </div>

                <?php endfor; ?>

                <div class="clear"></div>

            </div>


        <div class="clear"></div>
    <?php endif; ?>


    <div class="home_widgets full-width-cols">
        <?php dynamic_sidebar('home') ?>
    </div>

</div>

<?php get_footer(); ?>