<?php

function angle_option_defaults() {
    $defaults = array(
        /**
         * General
         */
        // Site Title & Tagline
        'hide-tagline'                        => 0,
        // Logo
        'logo'                                => '',
        'logo-retina-ready'                   => 0,
        'logo-favicon'                        => 0,
        /**
         * Typography
         */
        // Site Title & Tag Line
        'font-family-site-title'              => 'Roboto',
        'font-size-site-title'                => 32,
        'font-family-site-tagline'            => 'Roboto',
        'font-size-site-tagline'              => 16,
        // Navigation
        'font-family-nav'                     => 'Roboto',
        'font-size-nav'                       => 16,
        // Slider Title
        'font-family-slider-title'            => 'Roboto',
        'font-size-slider-title'              => 36,
        // Widgets
        'font-family-widgets'                 => 'Roboto',
        'font-size-widgets'                   => 20,
        // Post Title
        'font-family-post-title'              => 'Roboto',
        'font-size-post-title'                => 30,
        // Single Post Title
        'font-family-single-post-title'       => 'Roboto',
        'font-size-single-post-title'         => 36,
        // Page Title
        'font-family-page-title'              => 'Roboto',
        'font-size-page-title'                => 36,
        /**
         * Homepage
         */
        // Homepage Template
        'home-widget-columns'                 => 3,
        'home-widget-section-text'            => __( 'Our Services', 'wpzoom' ),
        /**
         * Color Scheme
         */
        // General
        'color-link'                          => '#222222',
        'color-text'                          => '#333333',
        'color-widget-title'                  => '#222222',
        // Background
        'color-background-header'             => '#ffffff',
        // Footer
        'color-footer-widget-area-background' => '#f8f8f8',
        'color-footer-text'                   => '#666666',
        'color-footer-copyright-background'   => '#0D0D0D',
        'color-footer-copyright-text'         => '#999999',
        /**
         * Header
         */
        // Background Image
        'header-background-image'             => '',
        'header-background-repeat'            => 'no-repeat',
        'header-background-position'          => 'center',
        'header-background-size'              => 'cover',
        /**
         * Footer
         */
        // Widget Areas
        'footer-widget-areas'                 => 4,
        // Copyright
        'footer-text'                         => sprintf( __( 'Copyright &copy; %1$s &mdash; %2$s. All Rights Reserved', 'wpzoom' ), date( 'Y' ), get_bloginfo( 'name' ) ),
    );

    return $defaults;
}

function angle_get_default( $option ) {
    $defaults = angle_option_defaults();
    $default  = ( isset( $defaults[ $option ] ) ) ? $defaults[ $option ] : false;

    return $default;
}
