<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_filter( 'dlm_cpt_dlm_download_args', 'smn_modificar_post_type_dlm_download', 10, 1 );
function smn_modificar_post_type_dlm_download( $args ) {

	$args['public'] = true;
	$args['publicly_queryable'] = true;
	$args['has_archive'] = __( 'documentos', 'smn' );
	$args['rewrite'] = true;
	// $args['description'] = false;
    $args['show_in_nav_menus'] = true;
    // $args['taxonomies'] = array_merge( $args['taxonomies'], array( 'marca', 'tipo-descarga') );
    // echo '<pre>'; print_r($args); echo '</pre>';

	// Labels
	$args['labels']['all_items'] = __( 'Todos los documentos', 'smn' );
	$args['labels']['name'] = __( 'Documentos', 'smn' );
	$args['labels']['singular_name'] = __( 'Documento', 'smn' );
	$args['labels']['add_new'] = __( 'Añadir nuevo', 'smn' );
	$args['labels']['add_new_item'] = __( 'Añadir nuevo documento', 'smn' );
    
    return $args;
}

add_filter( 'get_post_metadata', 'smn_dlm_downloads_members_only', 10, 5 );
function smn_dlm_downloads_members_only( $value, $object_id, $meta_key, $single, $meta_type ) {

	if ( '_members_only' == $meta_key ) {
		return 'yes';
	}
	// if ( '_redirect_only' == $meta_key ) {
	// 	return 'yes';
	// }

	return $value;

}

add_filter( 'dlm_download_get_the_download_link', 'smn_modify_dlm_download_link', 99999, 3 );
function smn_modify_dlm_download_link( $link, $download, $version ) {

	// echo '<br><br><br><br><br>test: ' . wpmem_login_url();

	if ( function_exists( 'wpmem_init' ) && !is_user_logged_in() ) {
		global $wp;
		$current_url = home_url( $wp->request );
		$link = wpmem_login_url( $current_url );
		// $link = get_home_url( null, 'acceder/?v=1' );
	}

	return $link;
}

// add_filter( 'template_redirect', function() {
//     if ( wpmem_is_blocked() && ! is_user_logged_in() ) {
//         wpmem_redirect_to_login();
//     }
// }, 999999 );