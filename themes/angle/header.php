<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,500,900' rel='stylesheet' type='text/css'>

    <?php wp_head(); ?>

</head>
<body <?php body_class() ?>>

<div class="page-wrap">

    <header id="header">

        <div class="inner-wrap">

            <div class="navbar-brand">
                <?php if ( ! angle_has_logo() ) echo '<h1>'; ?>

                <a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'description' ); ?>">

                    <?php
                    if ( angle_has_logo() ) {
                        angle_logo();
                    } else {
                        bloginfo( 'name' );
                    }
                    ?>

                </a>

                <?php if ( ! angle_has_logo() ) echo '</h1>'; ?>

                <?php
                $hide_tagline = (int) get_theme_mod( 'hide-tagline', angle_get_default( 'hide-tagline' ) );
                ?>
                <?php if ( ! get_theme_mod( 'hide-tagline' ) ) : ?>
                    <p class="tagline"><?php bloginfo( 'description' ); ?></p>
                <?php endif; ?>
            </div><!-- .navbar-brand -->

            <nav class="main-navbar" role="navigation">

                <div class="navbar-header">
                    <?php if (has_nav_menu( 'primary' )) { ?>

                       <a class="navbar-toggle" href="#menu-main-slide">
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                       </a>


                       <?php wp_nav_menu( array(
                           'container_id'   => 'menu-main-slide',
                           'theme_location' => 'primary'
                       ) );
                   }  ?>


                </div>

                <div id="navbar-main">

                    <?php if (has_nav_menu( 'primary' )) {
                        wp_nav_menu( array(
                            'menu_class'     => 'nav navbar-nav dropdown sf-menu',
                            'theme_location' => 'primary'
                        ) );
                    } ?>

                </div><!-- #navbar-main -->

            </nav><!-- .navbar -->
            <div class="clear"></div>

        </div><!-- .inner-wrap -->

    </header>