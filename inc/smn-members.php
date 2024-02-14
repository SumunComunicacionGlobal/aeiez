<?php 

// add_filter( 'wpmem_msg_defaults', 'smn_anadir_wpmem_msg_dialog_arr', 10, 3);
function smn_anadir_wpmem_msg_dialog_arr( $defaults, $tag, $dialogs ) {

	$defaults['div_before'] = '<div class="alert alert-secondary alert-dismissible fade show" role="alert">';
	$defaults['div_after'] = '  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>';

	return $defaults;
}


/**
 * This example allows you to disable any of the WP-Members
 * emails to users. Just update the settings array according
 * to the emails you want to disable.
 */
//  add_filter( 'wpmem_email_filter', 'my_wpmem_disable_emails', 10, 3 );
 function my_wpmem_disable_emails( $email, $wpmem_fields, $field_data ) {
    
    // Set what emails will be disabled. Example array includes
    // all possibilities, remove unnecessary tags.
    $settings = array(
        // 'newreg',
        'newmod',
        // 'appmod',
        // 'repass',
        // 'getuser',
    );
    
    // Check which email is being sent ($arr['tag']). If it is in
    // the $settings array, disable it.
    if ( in_array( $email['tag'], $settings ) ) {
        $email['disable'] = true;
    }
    
    return $email;
 }

// add_filter( 'wpmem_register_links_args', 'cambiar_estilos_listas_wp_members' );
add_filter( 'wpmem_member_links_args', 'cambiar_estilos_listas_wp_members' );
add_filter( 'wpmem_login_links_args', 'cambiar_estilos_listas_wp_members' );
add_filter( 'wpmem_status_links_args', 'cambiar_estilos_listas_wp_members' );
function cambiar_estilos_listas_wp_members( $arr ) {

    $arr['wrapper_before'] = '<ul class="list-group wpmem-links">';
    if(isset($arr['rows'])) {
        foreach ($arr['rows'] as $key => $row) {
            $arr['rows'][$key] = str_replace('<li>', '<li class="list-group-item">', $row);
        }
    }

    return $arr;
}

add_filter( 'wpmem_login_form_args', 'estilo_botones_wp_members', 10, 2 );
add_filter( 'wpmem_register_form_args', 'estilo_botones_wp_members', 10, 2 );
function estilo_botones_wp_members( $defaults, $action) {
    $defaults['button_class'] = 'btn btn-primary btn-lg';

    return $defaults;
}


function get_datos_usuario_footer() {

    if(!is_user_logged_in()) return false;

    $user_id = get_current_user_id();
    $nombre = get_user_meta( $user_id, 'first_name', true );
    // $empresa = get_user_meta( $user_id, 'empresa', true );
    // if( $empresa ) $nombre .= ' ('.$empresa.')';
    // $id_cliente = get_user_meta( $user_id, 'codigo_cliente', true );
    if ( !$nombre ) $nombre = do_shortcode( '[wpmem_field user_login]' );

    // $nombre = '<a href="' . wpmem_profile_url() . '" class="font-weight-bold">' . $nombre . '</a>';
    $nombre = '<span class="font-weight-bold">' . $nombre . '</span>';

    $r = '';

    $r .= sprintf( __( 'You are logged in as %s', 'wp-members' ), $nombre );

    // if( $id_cliente) $r .= ' / #' . $id_cliente;

    $r .= ' · ' . do_shortcode( '[wpmem_logout]' . __( 'Log out' ) . '[/wpmem_logout]' );

    return $r; 

}
function datos_usuario_footer() {
    echo get_datos_usuario_footer();
}

add_filter( 'wp_nav_menu_items', 'smn_add_login_menu_item', 10, 2 );
function smn_add_login_menu_item ( $items, $args ) {

  if( $args->theme_location == 'primary' ) {

    if ( is_user_logged_in() ) {
        $login_logout_url = wpmem_logout_link();
        // $login_logout_url = wpmem_profile_url();
        $login_logout_class = 'menu-item-logout';
        // $login_logout_class = 'menu-item-profile';
        $login_logout_text = __( 'Log out' );
        // $login_logout_text = __( 'Mi perfil', 'smn' );
    } else {
        $login_logout_url = wpmem_login_url();
        $login_logout_class = 'menu-item-login';
        $login_logout_text = __( 'Log in' );
    }

    $items .=  '<li class="menu-item ml-lg-1 btn btn-sm btn-primary menu-item-login-logout '.$login_logout_class.' nav-item" id="menu-item-login">';
        $items .= '<a href="'. $login_logout_url .'" class="nav-link">' . $login_logout_text . '</a>';
    $items .= '</li>';

    // if ( is_user_logged_in() ) {

    //     $items .=  '<li class="menu-item ml-lg-1 btn btn-sm btn-secondary menu-item-login-logout nav-item" id="menu-item-logout">';
    //         $items .= '<a href="'. wpmem_logout_link() .'" class="nav-link">' . __( 'Log out' ) . '</a>';
    //     $items .= '</li>';

    // }
  } 
  return $items;
}

add_action('wp_logout','smn_auto_redirect_after_logout');
function smn_auto_redirect_after_logout(){
  wp_safe_redirect( home_url() );
  exit();
}

// add_filter('allow_password_reset', 'disable_password');
// function disable_password() {
//     return false;
//     if(is_admin()) {
//         $userdata = wp_get_current_user();
//         $user = new WP_User($userdata->ID);
//         if(!empty($user->roles) && is_array($user->roles) && $user->roles[0] == 'subscriber')
//         return false;
//     }
//     return true;
// }

add_filter( 'wpmem_changepassword_form_defaults', function( $args ) {
    $args['heading'] = __( 'No está autorizado a cambiar su contraseña', 'smn' );
    $args['inputs'] = array();
    $args['button_text'] = __( 'Volver', 'smn' );
    $args['action'] = get_home_url();
    $args['redirect_to'] = get_home_url();
    
    return $args;
});

add_filter( 'wpmem_resetpassword_form_defaults', function( $args ) {
    $args['heading'] = __( 'No está autorizado a cambiar su contraseña', 'smn' );
    $args['inputs'] = array();
    $args['button_text'] = __( 'Volver', 'smn' );
    $args['action'] = get_home_url();
    $args['redirect_to'] = get_home_url();
    
    return $args;
});

add_filter( 'wpmem_forgot_link_str', 'my_forgot_link_str', 10, 2 );
function my_forgot_link_str( $str, $link ) {
	return false;
}