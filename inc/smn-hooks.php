<?php
/**
 * Custom hooks.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_filter( 'wpcf7_form_tag', 'smn_wpcf7_form_control_class', 10, 2 );
function smn_wpcf7_form_control_class( $scanned_tag, $replace ) {

   $excluded_types = array(
        'acceptance',
        'checkbox',
        'radio',
   );

   if ( in_array( $scanned_tag['type'], $excluded_types ) ) return $scanned_tag;

   switch ($scanned_tag['type']) {
    case 'submit':
        $scanned_tag['options'][] = 'class:btn';
        $scanned_tag['options'][] = 'class:btn-primary';
        break;
    
    default:
        $scanned_tag['options'][] = 'class:form-control';
        break;
   }
   
   return $scanned_tag;
}

add_action( 'loop_start', 'archive_loop_start', 10 );
function archive_loop_start( $query ) {

    if ( smn_is_columns_layout_post_type() ) {
        echo '<div class="row">';
    }
}

add_action( 'loop_end', 'archive_loop_end', 10 );
function archive_loop_end( $query ) {

    if ( smn_is_columns_layout_post_type() ) {
            echo '</div>';
    }
}

add_filter( 'body_class', 'smn_body_classes' );
function smn_body_classes( $classes ) {

    if ( is_singular() ) {
        $navbar_bg = get_post_meta( get_the_ID(), 'navbar_bg', true );
        if ( 'transparent' == $navbar_bg ) {
            $classes[] = 'navbar-transparent';
        }

        if ( get_post_meta( get_the_ID(), 'small_hero', true ) ) $classes[] = 'has-small-hero';

    } else {
        // $classes[] = 'navbar-transparent';
    }

    if ( is_archive() && smn_is_columns_layout_post_type() ) {
        $classes[] = 'is-columns-layout-post-type';
    }

    return $classes;
}


add_filter( 'post_class', 'bootstrap_post_class', 10, 3 );
function bootstrap_post_class( $classes, $class, $post_id ) {

    if ( !is_user_logged_in() && wpmem_is_blocked( $post_id ) ) {
        $classes[] = 'wpmem-blocked';
    }
    if ( wpmem_is_hidden( $post_id ) ) {
        $classes[] = 'wpmem-hidden';
    }

    if ( smn_is_columns_layout_post_type() ) {
        $classes[] = COLUMNS_LAYOUT_CLASSES; 
    }

    return $classes;
}




// function understrap_add_site_info() {
	
//     if (is_active_sidebar( 'copyright' )) {
//         echo '<div class="row">';
//             dynamic_sidebar( 'copyright' );
//         echo '</div>';
//     }

// }

add_filter( 'understrap_site_info_content', 'site_info_do_shortcode' );
function site_info_do_shortcode( $site_info ) {
    return do_shortcode( $site_info );
}

add_action( 'wp_body_open', 'top_anchor');
function top_anchor() {
    echo '<div id="top">';
}

add_action( 'wp_footer', 'back_to_top' );
function back_to_top() {
    echo '<a href="#top" class="back-to-top"></a>';
}

function author_page_redirect() {
    if ( is_author() ) {
        wp_redirect( home_url() );
    }
}
add_action( 'template_redirect', 'author_page_redirect' );

function es_blog() {

    if( is_singular('post') || is_category() || is_tag() || ( is_home() && !is_front_page() ) ) {
        return true;
    }

    return false;
}

add_filter( 'theme_mod_understrap_sidebar_position', 'cargar_sidebar');
function cargar_sidebar( $valor ) {
    // global $wp_query;
    // if ( es_blog() ) {
    //     $valor = 'right';
    // } else {
        $valor = 'none';
    // }
    return $valor;
}


function smn_nav_menu_submenu_css_class( $classes, $args, $depth ) {

    if ( !$args->walker && ( 'primary' === $args->theme_location || 'top-bar' == $args->theme_location ) ) {
        $classes[] = 'dropdown-menu';
        // $classes[] = 'collapse';
    }

    return $classes;

}
add_filter( 'nav_menu_submenu_css_class', 'smn_nav_menu_submenu_css_class', 10, 3 );

function smn_add_menu_item_classes( $classes, $item, $args ) {

    // echo '<pre>'; print_r($args); echo '<pre>';
 
    if ( !$args->walker && ( 'primary' === $args->theme_location || 'top-bar' == $args->theme_location ) ) {
        $classes[] = "nav-item";

        if( in_array( 'current-menu-item', $classes ) ) {
            $classes[] = "active";
        }

        if ( in_array( 'menu-item-has-children', $classes ) ) {
            $classes[] = 'dropdown';
        }
    
    }
 
    return $classes;
}
add_filter( 'nav_menu_css_class' , 'smn_add_menu_item_classes' , 10, 4 );

function smn_add_menu_link_classes( $atts, $item, $args ) {

    if ( !$args->walker && ( 'primary' == $args->theme_location || 'top-bar' == $args->theme_location ) ) {

    // echo '<pre>'; print_r($atts); echo '<pre>';

    if ( 0 == $item->menu_item_parent ) {
            $atts['class'] = 'nav-link';
        } else {
            $atts['class'] = 'dropdown-item';
        }
    }

    if ( in_array( 'menu-item-has-children', $item->classes ) ) {
        if ( isset( $atts['class'] ) ) $atts['class'] .= ' dropdown-toggle';
    }

    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'smn_add_menu_link_classes', 10, 3 );

add_filter('nav_menu_item_args', function ($args, $item, $depth) {

    if ( !$args->walker && ( 'primary' == $args->theme_location || 'top-bar' == $args->theme_location ) ) {
        
        $args->link_after  = '<span class="sub-menu-toggler"></span>';

    }
    return $args;
}, 10, 3);

add_filter( 'parse_tax_query', 'smn_do_not_include_children_in_product_cat_archive' );
function smn_do_not_include_children_in_product_cat_archive( $query ) {
    if ( 
        ! is_admin() 
        && $query->is_main_query()
        && $query->is_tax( 'product_cat' )
    ) {
        $query->tax_query->queries[0]['include_children'] = 0;
    }
}

add_filter( 'get_the_author_description', 'smn_reemplazar_bio_por_firma', 10, 3 );
function smn_reemplazar_bio_por_firma( $value, $user_id, $original_user_id ) {
    if ( is_singular('circular') ) {
        $value = get_field( 'firma', 'user_' . $user_id );
    }

    return $value;
}

add_filter( 'rank_math/frontend/breadcrumb/items', function( $crumbs, $class ) {

    if ( !is_singular( 'circular' ) ) return $crumbs;

	$crumbs[count($crumbs) - 1][0] .=  ' ' . __( 'del', 'smn' ) . ' ' . get_the_date();
	return $crumbs;
}, 10, 2);

add_filter( 'post_link', 'smn_external_post_link', 10, 3 );
function smn_external_post_link( $permalink, $post, $leavename ) {
    
    if ( 'ventaja' != $post->post_type ) return $permalink;

    $external_link = get_post_meta( $post->ID, 'url_info', true );
    if ( $external_link ) {
        $permalink = $external_link;
    }

    return $permalink;

};

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
    if (!current_user_can('edit_posts') && !is_admin()) {
        show_admin_bar(false);
    }
}

add_filter( 'post_type_link', 'smn_alter_ventajas_permalink', 10, 4);
function smn_alter_ventajas_permalink( $permalink, $post, $leavename, $sample ) {
  
    if ( $post->post_type != 'ventaja' ) return $permalink;

    $url_info = get_post_meta( $post->ID, 'url_info', true );
    if ( $url_info ) {
        $permalink = $url_info;
    }

    return $permalink;
    
}

add_filter( 'the_title', 'smn_quitar_espacios_title', 10, 2 );
function smn_quitar_espacios_title( $post_title, $post_id ) {

    if ( 'prestador' !== get_post_type( $post_id ) ) return $post_title;

    $post_title = str_replace(
        array(
            'S. L.',
            'S. A.',
        ),
        array(
            'S.L.',
            'S.A.',
        ),
        $post_title
    );


    return $post_title;
}

add_filter( 'the_content', 'smn_mostrar_firma_circulares' );
function smn_mostrar_firma_circulares( $content ) {

    if ( !is_singular( 'circular' ) ) return $content;

    $content = '<div class="circular-content-wrapper">' . $content . '</div>';

    $content .= '<div class="author-firma">';

        $content .= get_the_author_meta( 'description' );

    $content .= '</div>';

    return $content;

}