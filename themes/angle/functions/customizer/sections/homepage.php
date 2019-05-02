<?php

function angle_customizer_define_homepage_sections( $sections ) {
    $panel             = WPZOOM::$theme_raw_name . '_homepage';
    $homepage_sections = array();

    $theme_prefix = WPZOOM::$theme_raw_name . '_';

    /**
     * Homepage Templates
     */
    $homepage_sections['homepage-template'] = array(
        'title'   => __( 'Homepage Template', 'wpzoom' ),
        'options' => array(
            'home-widget-section-text' => array(
                'setting' => array(
                    'sanitize_callback' => 'angle_sanitize_text',
                ),
                'control' => array(
                    'label'             => __( 'Section Text', 'wpzoom' ),
                    'type'              => 'text',
                ),
            ),
            'home-widget-columns' => array(
                'setting' => array(
                    'sanitize_callback' => 'angle_sanitize_choice',
                ),
                'control' => array(
                    'label'   => __( 'Number of Columns in first Widgetized Area', 'wpzoom' ),
                    'type'    => 'select',
                    'choices' => array( '0', '1', '2', '3' ),
                )
            )
        )
    );

    return array_merge( $sections, $homepage_sections );
}

add_filter( 'zoom_customizer_sections', 'angle_customizer_define_homepage_sections' );
