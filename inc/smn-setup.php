<?php
/**
 * Theme basic setup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

add_action( 'after_setup_theme', 'smn_setup' );
function smn_setup() {

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'understrap' ),
		'top-bar' => __( 'Top Bar Menu', 'understrap' ),
        'legal' => __( 'Páginas legales', 'smn-admin' ),
        // 'account'  => __( 'Páginas de usuario', 'smn-admin' ),
        // 'movil'  => __( 'Menú móvil', 'smn-admin' ),
	) );

}

// add_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );
function understrap_all_excerpts_get_more_link( $post_excerpt ) {
	if ( ! is_admin() ) {
        if ( $post_excerpt ) $post_excerpt = $post_excerpt . ' [...]';
    }
	return $post_excerpt;
}

// add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function custom_excerpt_length( $length ) {
     return 25;
}

add_filter( 'get_the_archive_title', 'prefix_category_title' );
function prefix_category_title( $title ) {
    if ( is_tax() || is_category() || is_tag() ) {
        $title = single_term_title( '', false );
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    }
    return $title;
}

add_action( 'pre_get_posts', 'smn_pre_get_posts' );
function smn_pre_get_posts($query) {

    if ( !$query->is_main_query() || is_admin() ) return;

    if ( is_search() ) {
        $query->set('posts_per_page', 30);
    }

    if ( in_array( $query->get('post_type'), array('circular') ) ) {
        $query->set('posts_per_page', 6);
    }

    if ( get_query_var( 'post_type' ) == 'prestador' ) { 
		$query->set( 'order', 'ASC' );
		$query->set( 'orderby', 'title' );
	}

}