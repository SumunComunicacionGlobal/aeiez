<?php
/**
 * Declaring widgets
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


// add_action( 'widgets_init', 'understrap_widgets_init' );


function understrap_widgets_init() {
	
	register_sidebar(
		array(
			'name'          => __( 'Logo Tagline', 'understrap' ),
			'id'            => 'logo-tagline',
			'description'   => __( 'Aparece bajo el logo', 'understrap' ),
			'before_widget' => '<aside id="%1$s" class="%2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<p class="widget-title">',
			'after_title'   => '</p>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Right Sidebar', 'understrap' ),
			'id'            => 'right-sidebar',
			'description'   => __( 'Right sidebar widget area', 'understrap' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<p class="widget-title h3">',
			'after_title'   => '</p>',
		)
	);

	// register_sidebar(
	// 	array(
	// 		'name'          => __( 'Left Sidebar', 'understrap' ),
	// 		'id'            => 'left-sidebar',
	// 		'description'   => __( 'Left sidebar widget area', 'understrap' ),
	// 		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	// 		'after_widget'  => '</aside>',
	// 		'before_title'  => '<p class="widget-title">',
	// 		'after_title'   => '</p>',
	// 	)
	// );

	// register_sidebar(
	// 	array(
	// 		'name'          => __( 'Hero Slider', 'understrap' ),
	// 		'id'            => 'hero',
	// 		'description'   => __( 'Hero slider area. Place two or more widgets here and they will slide!', 'understrap' ),
	// 		'before_widget' => '<div class="carousel-item">',
	// 		'after_widget'  => '</div>',
	// 		'before_title'  => '',
	// 		'after_title'   => '',
	// 	)
	// );

	// register_sidebar(
	// 	array(
	// 		'name'          => __( 'Hero Canvas', 'understrap' ),
	// 		'id'            => 'herocanvas',
	// 		'description'   => __( 'Full size canvas hero area for Bootstrap and other custom HTML markup', 'understrap' ),
	// 		'before_widget' => '',
	// 		'after_widget'  => '',
	// 		'before_title'  => '',
	// 		'after_title'   => '',
	// 	)
	// );

	// register_sidebar(
	// 	array(
	// 		'name'          => __( 'Top Full', 'understrap' ),
	// 		'id'            => 'statichero',
	// 		'description'   => __( 'Full top widget with dynamic grid', 'understrap' ),
	// 		'before_widget' => '<div id="%1$s" class="footer-widget %2$s dynamic-classes">',
	// 		'after_widget'  => '</div><!-- .static-hero-widget -->',
	// 		'before_title'  => '<p class="widget-title">',
	// 		'after_title'   => '</p>',
	// 	)
	// );

    register_sidebar(
        array(
            'name'          => __( 'Pre footer', 'understrap' ),
            'id'            => 'prefooter',
            'description'   => __( 'Aparece antes del Pie de Página Completo', 'understrap' ),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s dynamic-classes">',
            'after_widget'  => '</div><!-- .footer-widget -->',
            'before_title'  => '<p class="widget-title">',
            'after_title'   => '</p>',
        )
    );

	register_sidebar(
        array(
            'name'          => __( 'Anuncios/Banners', 'understrap' ),
            'id'            => 'ads',
            'description'   => __( 'Aparece en el pie de página', 'understrap' ),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s col-md-6">',
            'after_widget'  => '</div><!-- .footer-widget -->',
            'before_title'  => '<p class="widget-title">',
            'after_title'   => '</p>',
        )
    );

	register_sidebar(
		array(
			'name'          => __( 'Footer Full', 'understrap' ),
			'id'            => 'footerfull',
			'description'   => __( 'Full sized footer widget with dynamic grid', 'understrap' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s dynamic-classes">',
			'after_widget'  => '</div><!-- .footer-widget -->',
			'before_title'  => '<p class="widget-title h2">',
			'after_title'   => '</p>',
		)
	);

    register_sidebar(
        array(
            'name'          => __( 'Después del pie de página completo', 'understrap' ),
            'id'            => 'after-footerfull',
            'description'   => __( 'Aparece después del Pie de Página Completo', 'understrap' ),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div><!-- .footer-widget -->',
            'before_title'  => '<p class="widget-title">',
            'after_title'   => '</p>',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Texto legal', 'understrap' ),
            'id'            => 'legal-text',
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div><!-- .footer-widget -->',
            'before_title'  => '<p class="widget-title">',
            'after_title'   => '</p>',
        )
    );

    // register_sidebar(
    //     array(
    //         'name'          => __( 'Copyright', 'understrap' ),
    //         'id'            => 'copyright',
    //         'description'   => __( 'Full sized footer widget with dynamic grid', 'understrap' ),
    //         'before_widget' => '<div id="%1$s" class="footer-widget %2$s dynamic-classes">',
    //         'after_widget'  => '</div><!-- .footer-widget -->',
    //         'before_title'  => '<p class="widget-title">',
    //         'after_title'   => '</p>',
    //     )
    // );

}

