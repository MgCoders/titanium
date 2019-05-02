<?php

/**
 * @param WP_Customize_Manager $wp_customize
 */
function angle_customizer_staticfrontpage( $wp_customize ) {
    $section_id = 'static_front_page';
    $section    = $wp_customize->get_section( $section_id );
}

add_action( 'customize_register', 'angle_customizer_staticfrontpage', 20 );
