<?php
/*-----------------------------------------------------------------------------------*/
/* Initializing Widgetized Areas (Sidebars)										     */
/*-----------------------------------------------------------------------------------*/



/*----------------------------------*/
/* Homepage widgetized areas		*/
/*----------------------------------*/

register_sidebar( array(
    'name'          => 'Homepage: Column 1',
    'id'            => 'home-1',
    'description'   => 'Widget area for page template "Homepage (Widgetized)".',
    'before_widget' => '<div class="widget %2$s" id="%1$s">',
    'after_widget'  => '<div class="clear"></div></div>',
    'before_title'  => '<h3 class="title">',
    'after_title'   => '</h3>',
) );

register_sidebar( array(
    'name'          => 'Homepage: Column 2',
    'id'            => 'home-2',
    'description'   => 'Widget area for page template "Homepage (Widgetized)"',
    'before_widget' => '<div class="widget %2$s" id="%1$s">',
    'after_widget'  => '<div class="clear"></div></div>',
    'before_title'  => '<h3 class="title">',
    'after_title'   => '</h3>',
) );

register_sidebar( array(
    'name'          => 'Homepage: Column 3',
    'id'            => 'home-3',
    'description'   => 'Widget area for page template "Homepage (Widgetized)".',
    'before_widget' => '<div class="widget %2$s" id="%1$s">',
    'after_widget'  => '<div class="clear"></div></div>',
    'before_title'  => '<h3 class="title">',
    'after_title'   => '</h3>',
) );


register_sidebar( array(
     'name'          => 'Homepage: Full-width',
     'id'            => 'home',
     'description'   => 'Widget area for page template "Homepage (Widgetized)".',
     'before_widget' => '<div class="widget %2$s" id="%1$s">',
     'after_widget'  => '<div class="clear"></div></div>',
     'before_title'  => '<h3 class="title">',
     'after_title'   => '</h3>',
) );




/*----------------------------------*/
/* Footer widgetized areas		    */
/*----------------------------------*/

register_sidebar( array(
    'name'          => 'Footer: Column 1',
    'id'            => 'footer_1',
    'before_widget' => '<div class="widget %2$s" id="%1$s">',
    'after_widget'  => '<div class="clear"></div></div>',
    'before_title'  => '<h3 class="title">',
    'after_title'   => '</h3>',
) );

register_sidebar( array(
    'name'          => 'Footer: Column 2',
    'id'            => 'footer_2',
    'before_widget' => '<div class="widget %2$s" id="%1$s">',
    'after_widget'  => '<div class="clear"></div></div>',
    'before_title'  => '<h3 class="title">',
    'after_title'   => '</h3>',
) );

register_sidebar( array(
    'name'          => 'Footer: Column 3',
    'id'            => 'footer_3',
    'before_widget' => '<div class="widget %2$s" id="%1$s">',
    'after_widget'  => '<div class="clear"></div></div>',
    'before_title'  => '<h3 class="title">',
    'after_title'   => '</h3>',
) );

register_sidebar( array(
    'name'          => 'Footer: Column 4',
    'id'            => 'footer_4',
    'before_widget' => '<div class="widget %2$s" id="%1$s">',
    'after_widget'  => '<div class="clear"></div></div>',
    'before_title'  => '<h3 class="title">',
    'after_title'   => '</h3>',
) );


?>