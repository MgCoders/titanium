<?php

/**
 * @param WP_Customize_Manager $wp_customize
 */
function angle_customizer_background( $wp_customize ) {
    $section_id = 'background_image';
    $section    = $wp_customize->get_section( $section_id );

    // Move and rename Background Color control to General section of Color Scheme panel
    $wp_customize->get_control( 'background_color' )->section = WPZOOM::$theme_raw_name . '_color-background';
    $wp_customize->get_control( 'background_color' )->label = __( 'Site Background Color', 'make' );
}

add_action( 'customize_register', 'angle_customizer_background', 20 );
