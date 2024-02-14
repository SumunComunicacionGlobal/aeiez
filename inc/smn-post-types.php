<?php 

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_post_type_support( 'page', 'excerpt' );
// add_action( 'init', 'smn_settings', 1000 );
// function smn_settings() {  
    // register_taxonomy_for_object_type('category', 'page');  
// }


if ( ! function_exists('custom_post_type_slide') ) {

// Register Custom Post Type
function custom_post_type_slide() {

	$labels = array(
		'name'                  => _x( 'Slides', 'Post Type General Name', 'smn' ),
		'singular_name'         => _x( 'Slide', 'Post Type Singular Name', 'smn' ),
		'menu_name'             => __( 'Slides', 'smn-admin' ),
		'name_admin_bar'        => __( 'Slides', 'smn-admin' ),
		'add_new'               => __( 'Añadir nueva Slide', 'smn-admin' ),
		'new_item'              => __( 'Nueva Slide', 'smn-admin' ),
		'edit_item'             => __( 'Editar Slide', 'smn-admin' ),
		'update_item'           => __( 'Actualizar Slide', 'smn-admin' ),
		'view_item'             => __( 'Ver Slide', 'smn-admin' ),
		'view_items'            => __( 'Ver Slide', 'smn-admin' ),
	);
	$args = array(
		'label'                 => __( 'Slides', 'smn' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'page-attributes' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 3,
		'menu_icon'             => 'dashicons-slides',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest' 			=> true,
		'taxonomies'			=> array(),
	);
	register_post_type( 'slide', $args );

}
// add_action( 'init', 'custom_post_type_slide', 0 );

}

if ( ! function_exists('custom_post_type_empresa') ) {

	// Register Custom Post Type
	function custom_post_type_empresa() {
	
		$labels = array(
			'name'                  => _x( 'Empresas', 'Post Type General Name', 'smn' ),
			'singular_name'         => _x( 'Empresa', 'Post Type Singular Name', 'smn' ),
			'menu_name'             => __( 'Empresas', 'smn-admin' ),
			'name_admin_bar'        => __( 'Empresa', 'smn-admin' ),
			'add_new'               => __( 'Añadir nueva Empresa', 'smn-admin' ),
			'new_item'              => __( 'Nueva Empresa', 'smn-admin' ),
			'edit_item'             => __( 'Editar Empresa', 'smn-admin' ),
			'update_item'           => __( 'Actualizar Empresa', 'smn-admin' ),
			'view_item'             => __( 'Ver Empresa', 'smn-admin' ),
			'view_items'            => __( 'Ver Empresas', 'smn-admin' ),
			'featured_image'		=> __( 'Logo', 'smn-admin' ),
			'set_featured_image'	=> __( 'Establecer Logo', 'smn-admin' ),
			'remove_featured_image'	=> __( 'Quitar Logo', 'smn-admin' ),
			'use_featured_image'	=> __( 'Usar como Logo', 'smn-admin' ),
		);
		$args = array(
			'label'                 => __( 'Empresas', 'smn' ),
			'labels'                => $labels,
			'description'			=> __( 'Directorio de empresas instaladoras', 'smn' ),
			'supports'              => array( 'title', 'author', 'custom-fields', 'revisions' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 4,
			'menu_icon'             => 'dashicons-networking',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => __( 'directorio-empresas', 'smn' ),
			'rewrite'				=> array(
											'slug'			=> __( 'directorio-empresas', 'smn' ),
											'with_front'	=> false
										),
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
			'show_in_rest' 			=> true,
			//'taxonomies'            => array( 'zona', 'colegiatura', 'asociacion', 'ambito', 'tipo_entidad', 'post_tag' ),
			'taxonomies'            => array( 'tipo_entidad', 'ambito', 'zona' ),
		);
		register_post_type( 'prestador', $args );
	
	}
	add_action( 'init', 'custom_post_type_empresa', 0 );
	
}

if ( ! function_exists('prestador_custom_post_type') ) {

	// Register Custom Post Type
	function prestador_custom_post_type() {
	
		$labels = array(
			'name'                  => _x( 'Prestadores de servicios', 'Post Type General Name', 'aessia' ),
			'singular_name'         => _x( 'Prestador de servicios', 'Post Type Singular Name', 'aessia' ),
			'menu_name'             => __( 'Prestadores', 'aessia-admin' ),
			'name_admin_bar'        => __( 'Prestador', 'aessia-admin' ),
			'archives'              => __( 'Archivos de Prestadores', 'aessia-admin' ),
			'attributes'            => __( 'Atributo de Prestador', 'aessia-admin' ),
			'parent_item_colon'     => __( 'Prestador superior:', 'aessia-admin' ),
			'all_items'             => __( 'Todos los Prestadores', 'aessia-admin' ),
			'add_new_item'          => __( 'Añadir nuevo Prestador', 'aessia-admin' ),
			'add_new'               => __( 'Añadir nuevo', 'aessia-admin' ),
			'new_item'              => __( 'Nuevo Prestador', 'aessia-admin' ),
			'edit_item'             => __( 'Editar Prestador', 'aessia-admin' ),
			'update_item'           => __( 'Actualizar Prestador', 'aessia-admin' ),
			'view_item'             => __( 'Ver Prestador', 'aessia-admin' ),
			'view_items'            => __( 'Ver Prestadores', 'aessia-admin' ),
			'search_items'          => __( 'Buscar Prestador', 'aessia-admin' ),
			'not_found'             => __( 'No encontrado', 'aessia-admin' ),
			'not_found_in_trash'    => __( 'No encontrado en la papelera', 'aessia-admin' ),
			'featured_image'        => __( 'Imagen principal', 'aessia-admin' ),
			'set_featured_image'    => __( 'Establecer Imagen principal', 'aessia-admin' ),
			'remove_featured_image' => __( 'Quitar Imagen principal', 'aessia-admin' ),
			'use_featured_image'    => __( 'Usar como Imagen principal', 'aessia-admin' ),
			'insert_into_item'      => __( 'Insertar en el Prestador', 'aessia-admin' ),
			'uploaded_to_this_item' => __( 'Subido a este Prestador', 'aessia-admin' ),
			'items_list'            => __( 'Lista de Prestadores', 'aessia-admin' ),
			'items_list_navigation' => __( 'Navegación de la lista de Prestadores', 'aessia-admin' ),
			'filter_items_list'     => __( 'Filtrar lista de Prestadores', 'aessia-admin' ),
		);
		$args = array(
			'label'                 => __( 'Prestador', 'aessia-admin' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'author', 'custom-fields', 'revisions' ),
			'taxonomies'            => array( 'zona', 'colegiatura', 'asociacion', 'ambito', 'tipo_entidad', 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 20,
			'menu_icon'             => 'dashicons-nametag',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			// 'has_archive'           => __( 'seguridad-industrial/prestadores/directorio', 'aessia' ),
			'has_archive'           => false,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => array(
											'slug'			=> __( 'seguridad-industrial/prestadores' ),
										),
			'query_var'				=> true,
			'capability_type'       => 'post',
			'show_in_rest'          => false,
		);
		// register_post_type( 'prestador', $args );
	
	}
	add_action( 'init', 'prestador_custom_post_type', 10 );
	
}

if ( ! function_exists('custom_post_type_circular') ) {

	// Register Custom Post Type
	function custom_post_type_circular() {
	
		$labels = array(
			'name'                  => _x( 'Circulares', 'Post Type General Name', 'smn' ),
			'singular_name'         => _x( 'Circular', 'Post Type Singular Name', 'smn' ),
			'menu_name'             => __( 'Circulares', 'smn-admin' ),
			'name_admin_bar'        => __( 'Circular', 'smn-admin' ),
			'add_new'               => __( 'Añadir nueva Circular', 'smn-admin' ),
			'new_item'              => __( 'Nueva Circular', 'smn-admin' ),
			'edit_item'             => __( 'Editar Circular', 'smn-admin' ),
			'update_item'           => __( 'Actualizar Circular', 'smn-admin' ),
			'view_item'             => __( 'Ver Circular', 'smn-admin' ),
			'view_items'            => __( 'Ver Circular', 'smn-admin' ),
	);
		$args = array(
			'label'                 => __( 'Circulares', 'smn' ),
			'labels'                => $labels,
			'description'			=> __( 'No te pierdas las novedades del sector y de AEIEZ', 'smn' ),
			'supports'              => array( 'title', 'editor', 'author', 'custom-fields', 'revisions', 'page-attributes' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-media-document',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => __( 'circulares', 'smn' ),
			'rewrite'				=> array(
											'slug'			=> __( 'circulares', 'smn' ),
											'with_front'	=> false
										),
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
			'show_in_rest' 			=> true,
			'taxonomies'			=> array( 'categoria_circular' ),
		);
		register_post_type( 'circular', $args );
	
	}
	add_action( 'init', 'custom_post_type_circular', 0 );
	
}

if ( ! function_exists('custom_post_type_ventaja') ) {

	// Register Custom Post Type
	function custom_post_type_ventaja() {
	
		$labels = array(
			'name'                  => _x( 'Ventajas', 'Post Type General Name', 'smn' ),
			'singular_name'         => _x( 'Ventaja', 'Post Type Singular Name', 'smn' ),
			'menu_name'             => __( 'Ventajas', 'smn-admin' ),
			'name_admin_bar'        => __( 'Ventaja', 'smn-admin' ),
			'add_new'               => __( 'Añadir nueva Ventaja', 'smn-admin' ),
			'new_item'              => __( 'Nueva Ventaja', 'smn-admin' ),
			'edit_item'             => __( 'Editar Ventaja', 'smn-admin' ),
			'update_item'           => __( 'Actualizar Ventaja', 'smn-admin' ),
			'view_item'             => __( 'Ver Ventaja', 'smn-admin' ),
			'view_items'            => __( 'Ver Ventaja', 'smn-admin' ),
			'featured_image'		=> __( 'Logo', 'smn-admin' ),
			'set_featured_image'	=> __( 'Establecer Logo', 'smn-admin' ),
			'remove_featured_image'	=> __( 'Quitar Logo', 'smn-admin' ),
			'use_featured_image'	=> __( 'Usar como Logo', 'smn-admin' ),
		);
		$args = array(
			'label'                 => __( 'Ventajas', 'smn' ),
			'labels'                => $labels,
			'description'			=> __( 'Descuentos y promociones para socios', 'smn' ),
			'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'page-attributes' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-money-alt',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => __( 'ventajas', 'smn' ),
			'rewrite'				=> array(
											'slug'			=> __( 'ventajas', 'smn' ),
											'with_front'	=> false
										),
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
			'show_in_rest' 			=> true,
			'taxonomies'			=> array( 'categoria_ventaja', 'origen' ),
		);
		register_post_type( 'ventaja', $args );
	
	}
	add_action( 'init', 'custom_post_type_ventaja', 0 );
	
}

if ( ! function_exists('custom_post_type_documento') ) {

	// Register Custom Post Type
	function custom_post_type_documento() {
	
		$labels = array(
			'name'                  => _x( 'Documentos', 'Post Type General Name', 'smn' ),
			'singular_name'         => _x( 'Documento', 'Post Type Singular Name', 'smn' ),
			'menu_name'             => __( 'Documentos', 'smn-admin' ),
			'name_admin_bar'        => __( 'Documento', 'smn-admin' ),
			'add_new'               => __( 'Añadir nuevo Documento', 'smn-admin' ),
			'new_item'              => __( 'Nuevo Documento', 'smn-admin' ),
			'edit_item'             => __( 'Editar Documento', 'smn-admin' ),
			'update_item'           => __( 'Actualizar Documento', 'smn-admin' ),
			'view_item'             => __( 'Ver Documento', 'smn-admin' ),
			'view_items'            => __( 'Ver Documentos', 'smn-admin' ),
			// 'featured_image'		=> __( 'Foto de perfil', 'smn-admin' ),
			// 'set_featured_image'	=> __( 'Establecer Foto de perfil', 'smn-admin' ),
			// 'remove_featured_image'	=> __( 'Quitar Foto de perfil', 'smn-admin' ),
			// 'use_featured_image'	=> __( 'Usar como Foto de perfil', 'smn-admin' ),
		);
		$args = array(
			'label'                 => __( 'Documentos', 'smn' ),
			'labels'                => $labels,
			'description'			=> __( 'Toda la documentación a tu alcance', 'smn' ),
			'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-media-document',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => __( 'documentos', 'smn' ),
			'rewrite'				=> array(
											'slug'			=> __( 'documentos', 'smn' ),
											'with_front'	=> false
										),
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
			'taxonomies'			=> array('categoria_documento'),
			'show_in_rest'			=> true,
		);
		register_post_type( 'documento', $args );
	
	}
	// add_action( 'init', 'custom_post_type_documento', 0 );
	
}

if ( ! function_exists('custom_post_type_evento') ) {

	// Register Custom Post Type
	function custom_post_type_evento() {
	
		$labels = array(
			'name'                  => _x( 'Formación y eventos', 'Post Type General Name', 'smn' ),
			'singular_name'         => _x( 'Formación/evento', 'Post Type Singular Name', 'smn' ),
			'menu_name'             => __( 'Formación/Eventos', 'smn-admin' ),
			'name_admin_bar'        => __( 'Evento', 'smn-admin' ),
			'add_new'               => __( 'Añadir nuevo Evento', 'smn-admin' ),
			'new_item'              => __( 'Nuevo Evento', 'smn-admin' ),
			'edit_item'             => __( 'Editar Evento', 'smn-admin' ),
			'update_item'           => __( 'Actualizar Evento', 'smn-admin' ),
			'view_item'             => __( 'Ver Evento', 'smn-admin' ),
			'view_items'            => __( 'Ver Eventos', 'smn-admin' ),
			// 'featured_image'		=> __( 'Foto de perfil', 'smn-admin' ),
			// 'set_featured_image'	=> __( 'Establecer Foto de perfil', 'smn-admin' ),
			// 'remove_featured_image'	=> __( 'Quitar Foto de perfil', 'smn-admin' ),
			// 'use_featured_image'	=> __( 'Usar como Foto de perfil', 'smn-admin' ),
		);
		$args = array(
			'label'                 => __( 'Formación/Eventos', 'smn' ),
			'labels'                => $labels,
			'description'			=> __( 'Cursos y eventos propios y en colaboración con otras organizaciones', 'smn' ),
			'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 6,
			'menu_icon'             => 'dashicons-nametag',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => __( 'formacion-eventos', 'smn' ),
			'rewrite'				=> array(
											'slug'			=> __( 'formacion-eventos', 'smn' ),
											'with_front'	=> false
										),
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
			'taxonomies'			=> array('categoria_evento', 'modalidad', 'origen' ),
			'show_in_rest'			=> true,
		);
		register_post_type( 'evento', $args );
	
	}
	add_action( 'init', 'custom_post_type_evento', 0 );
	
}

if ( ! function_exists('custom_post_type_team') ) {

// Register Custom Post Type
function custom_post_type_team() {

	$labels = array(
		'name'                  => _x( 'Miembros del equipo', 'Post Type General Name', 'smn' ),
		'singular_name'         => _x( 'Miembro del equipo', 'Post Type Singular Name', 'smn' ),
		'menu_name'             => __( 'Miembro del equipo', 'smn-admin' ),
		'name_admin_bar'        => __( 'Miembros del equipo', 'smn-admin' ),
		'add_new'               => __( 'Añadir nuevo Miembro del equipo', 'smn-admin' ),
		'new_item'              => __( 'Nuevo Miembro del equipo', 'smn-admin' ),
		'edit_item'             => __( 'Editar Miembro del equipo', 'smn-admin' ),
		'update_item'           => __( 'Actualizar Miembro del equipo', 'smn-admin' ),
		'view_item'             => __( 'Ver Miembro del equipo', 'smn-admin' ),
		'view_items'            => __( 'Ver Miembro del equipo', 'smn-admin' ),
		'featured_image'		=> __( 'Foto', 'smn-admin' ),
		'set_featured_image'	=> __( 'Establecer Foto', 'smn-admin' ),
		'remove_featured_image'	=> __( 'Quitar Foto', 'smn-admin' ),
		'use_featured_image'	=> __( 'Usar como Foto', 'smn-admin' ),
	);
	$args = array(
		'label'                 => __( 'Team members', 'smn' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-id',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'taxonomies'			=> array(),
	);
	register_post_type( 'team', $args );

}
// add_action( 'init', 'custom_post_type_team', 0 );

}

if ( ! function_exists('custom_post_type_producto') ) {

// Register Custom Post Type
function custom_post_type_producto() {

	$labels = array(
		'name'                  => _x( 'Productos', 'Post Type General Name', 'smn' ),
		'singular_name'         => _x( 'Producto', 'Post Type Singular Name', 'smn' ),
		'menu_name'             => __( 'Productos', 'smn-admin' ),
		'name_admin_bar'        => __( 'Producto', 'smn-admin' ),
		'add_new'               => __( 'Añadir nuevo Producto', 'smn-admin' ),
		'new_item'              => __( 'Nuevo Producto', 'smn-admin' ),
		'edit_item'             => __( 'Editar Producto', 'smn-admin' ),
		'update_item'           => __( 'Actualizar Producto', 'smn-admin' ),
		'view_item'             => __( 'Ver Producto', 'smn-admin' ),
		'view_items'            => __( 'Ver Productos', 'smn-admin' ),
		// 'featured_image'		=> __( 'Foto de perfil', 'smn-admin' ),
		// 'set_featured_image'	=> __( 'Establecer Foto de perfil', 'smn-admin' ),
		// 'remove_featured_image'	=> __( 'Quitar Foto de perfil', 'smn-admin' ),
		// 'use_featured_image'	=> __( 'Usar como Foto de perfil', 'smn-admin' ),
	);
	$args = array(
		'label'                 => __( 'Productos', 'smn' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 23,
		'menu_icon'             => 'dashicons-open-folder',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'taxonomies'			=> array('sector', 'product_cat', 'product_tag'),
		'show_in_rest'			=> true,
	);
	register_post_type( 'product', $args );

}
// add_action( 'init', 'custom_post_type_producto', 0 );

}

if ( ! function_exists('custom_post_type_partner') ) {

	// Register Custom Post Type
	function custom_post_type_partner() {
	
		$labels = array(
			'name'                  => _x( 'Partners', 'Post Type General Name', 'smn' ),
			'singular_name'         => _x( 'Partner', 'Post Type Singular Name', 'smn' ),
			'menu_name'             => __( 'Partners', 'smn-admin' ),
			'name_admin_bar'        => __( 'Partner', 'smn-admin' ),
			'add_new'               => __( 'Añadir nuevo Partner', 'smn-admin' ),
			'new_item'              => __( 'Nuevo Partner', 'smn-admin' ),
			'edit_item'             => __( 'Editar Partner', 'smn-admin' ),
			'update_item'           => __( 'Actualizar Partner', 'smn-admin' ),
			'view_item'             => __( 'Ver Partner', 'smn-admin' ),
			'view_items'            => __( 'Ver Partners', 'smn-admin' ),
			'featured_image'		=> __( 'Logo', 'smn-admin' ),
			'set_featured_image'	=> __( 'Establecer Logo', 'smn-admin' ),
			'remove_featured_image'	=> __( 'Quitar Logo', 'smn-admin' ),
			'use_featured_image'	=> __( 'Usar como Logo', 'smn-admin' ),
		);
		$args = array(
			'label'                 => __( 'Partners', 'smn' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 23,
			'menu_icon'             => 'dashicons-awards',
			'show_in_admin_bar'     => false,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
			'taxonomies'			=> array(),
			'show_in_rest'			=> true,
		);
		register_post_type( 'partner', $args );
	
	}
	// add_action( 'init', 'custom_post_type_partner', 0 );
	
}

if ( ! function_exists('custom_post_type_caso_de_exito') ) {

// Register Custom Post Type
function custom_post_type_caso_de_exito() {

	$labels = array(
		'name'                  => _x( 'Casos de éxito', 'Post Type General Name', 'smn' ),
		'singular_name'         => _x( 'Caso de éxito', 'Post Type Singular Name', 'smn' ),
		'menu_name'             => __( 'Casos de éxito', 'smn-admin' ),
		'name_admin_bar'        => __( 'Caso de éxito', 'smn-admin' ),
		'add_new'               => __( 'Añadir nuevo Caso de éxito', 'smn-admin' ),
		'new_item'              => __( 'Nuevo Caso de éxito', 'smn-admin' ),
		'edit_item'             => __( 'Editar Caso de éxito', 'smn-admin' ),
		'update_item'           => __( 'Actualizar Caso de éxito', 'smn-admin' ),
		'view_item'             => __( 'Ver Caso de éxito', 'smn-admin' ),
		'view_items'            => __( 'Ver Casos de éxito', 'smn-admin' ),
		// 'featured_image'		=> __( 'Foto de perfil', 'smn-admin' ),
		// 'set_featured_image'	=> __( 'Establecer Foto de perfil', 'smn-admin' ),
		// 'remove_featured_image'	=> __( 'Quitar Foto de perfil', 'smn-admin' ),
		// 'use_featured_image'	=> __( 'Usar como Foto de perfil', 'smn-admin' ),
	);
	$args = array(
		'label'                 => __( 'Casos de éxito', 'smn' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 23,
		'menu_icon'             => 'dashicons-format-quote',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'taxonomies'			=> array(''),
		'show_in_rest'			=> true,
	);
	register_post_type( 'caso-de-exito', $args );

}
// add_action( 'init', 'custom_post_type_caso_de_exito', 0 );

}

if ( ! function_exists('cpt_content_fragment_function') ) {

	// Register Custom Post Type
	function cpt_content_fragment_function() {

		$labels = array(
			'name'                => _x( 'Fragmentos', 'Post Type General Name', 'smn' ),
			'singular_name'       => _x( 'Fragmento', 'Post Type Singular Name', 'smn' ),
			'menu_name'           => __( 'Fragmentos de contenido reutilizables', 'smn-admin' ),
			'name_admin_bar'      => __( 'Fragmento', 'smn-admin' ),
			'parent_item_colon'   => __( 'Fragmento superior:', 'smn-admin' ),
			'all_items'           => __( 'Todos los Fragmentos de contenido', 'smn-admin' ),
			'add_new_item'        => __( 'Añadir nuevo Fragmento', 'smn-admin' ),
			'add_new'             => __( 'Añadir nuevo', 'smn-admin' ),
			'new_item'            => __( 'Nuevo Fragmento', 'smn-admin' ),
			'edit_item'           => __( 'Editar Fragmento', 'smn-admin' ),
			'update_item'         => __( 'Actualizar Fragmento', 'smn-admin' ),
			'view_item'           => __( 'Ver Fragmento', 'smn-admin' ),
			'search_items'        => __( 'Buscar Fragmento', 'smn-admin' ),
			'not_found'           => __( 'No se han encontrado Fragmentos', 'smn-admin' ),
			'not_found_in_trash'  => __( 'No se han encontrado Fragmentos en la papelera', 'smn-admin' ),
		);
		$args = array(
			'label'               => __( 'Fragmentos de contenido', 'smn' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'author' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-editor-insertmore',
			'show_in_admin_bar'   => false,
			'show_in_nav_menus'   => false,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest'			=> true,
		);

		register_post_type( 'content_fragment', $args );

	}

	// Hook into the 'init' action
	// add_action( 'init', 'cpt_content_fragment_function', 0 );

}

if ( ! function_exists( 'zona_custom_taxonomy' ) ) {

	// Register Custom Taxonomy
	function zona_custom_taxonomy() {
	
		$labels = array(
			'name'                       => _x( 'Zonas', 'Taxonomy General Name', 'aessia' ),
			'singular_name'              => _x( 'Zona', 'Taxonomy Singular Name', 'aessia' ),
			'menu_name'                  => __( 'Zona', 'aessia-admin' ),
			'all_items'                  => __( 'Todas las Zonas', 'aessia-admin' ),
			'parent_item'                => __( 'Zona superior', 'aessia-admin' ),
			'parent_item_colon'          => __( 'Zona superior:', 'aessia-admin' ),
			'new_item_name'              => __( 'Nombre de la nueva Zona', 'aessia-admin' ),
			'add_new_item'               => __( 'Añadir nueva Zona', 'aessia-admin' ),
			'edit_item'                  => __( 'Editar Zona', 'aessia-admin' ),
			'update_item'                => __( 'Actualizar Zona', 'aessia-admin' ),
			'view_item'                  => __( 'Ver Zona', 'aessia-admin' ),
			'separate_items_with_commas' => __( 'Separar Zonas con comas', 'aessia-admin' ),
			'add_or_remove_items'        => __( 'Añadir o quitar Zonas', 'aessia-admin' ),
			'choose_from_most_used'      => __( 'Elegir de entre las más usadas', 'aessia-admin' ),
			'popular_items'              => __( 'Zonas más usadas', 'aessia-admin' ),
			'search_items'               => __( 'Buscar', 'aessia-admin' ),
			'not_found'                  => __( 'No encontrada', 'aessia-admin' ),
			'no_terms'                   => __( 'No hay Zonas', 'aessia-admin' ),
			'items_list'                 => __( 'Lista de Zonas', 'aessia-admin' ),
			'items_list_navigation'      => __( 'Lista de navegación de Zonas', 'aessia-admin' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => false,
			'show_tagcloud'              => false,
			'rewrite'                    => false,
			'show_in_rest'               => false,
		);
		register_taxonomy( 'zona', array( 'prestador' ), $args );
	
	}
	add_action( 'init', 'zona_custom_taxonomy', 0 );
	
	}
	
	if ( ! function_exists( 'colegiatura_custom_taxonomy' ) ) {
	
	// Register Custom Taxonomy
	function colegiatura_custom_taxonomy() {
	
		$labels = array(
			'name'                       => _x( 'Colegiaturas', 'Taxonomy General Name', 'aessia' ),
			'singular_name'              => _x( 'Colegiatura', 'Taxonomy Singular Name', 'aessia' ),
			'menu_name'                  => __( 'Colegiaturas', 'aessia-admin' ),
			'all_items'                  => __( 'Todas las Colegiaturas', 'aessia-admin' ),
			'parent_item'                => __( 'Colegiatura superior', 'aessia-admin' ),
			'parent_item_colon'          => __( 'Colegiatura superior:', 'aessia-admin' ),
			'new_item_name'              => __( 'Nombre de la nueva Colegiatura', 'aessia-admin' ),
			'add_new_item'               => __( 'Añadir nueva Colegiatura', 'aessia-admin' ),
			'edit_item'                  => __( 'Editar Colegiatura', 'aessia-admin' ),
			'update_item'                => __( 'Actualizar Colegiatura', 'aessia-admin' ),
			'view_item'                  => __( 'Ver Colegiatura', 'aessia-admin' ),
			'separate_items_with_commas' => __( 'Separar Colegiaturas con comas', 'aessia-admin' ),
			'add_or_remove_items'        => __( 'Añadir o quitar Colegiaturas', 'aessia-admin' ),
			'choose_from_most_used'      => __( 'Elegir de entre las más usadas', 'aessia-admin' ),
			'popular_items'              => __( 'Colegiaturas más usadas', 'aessia-admin' ),
			'search_items'               => __( 'Buscar', 'aessia-admin' ),
			'not_found'                  => __( 'No encontrada', 'aessia-admin' ),
			'no_terms'                   => __( 'No hay Colegiaturas', 'aessia-admin' ),
			'items_list'                 => __( 'Lista de Colegiaturas', 'aessia-admin' ),
			'items_list_navigation'      => __( 'Lista de navegación de Colegiaturas', 'aessia-admin' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => false,
			'show_tagcloud'              => false,
			'rewrite'                    => false,
			'show_in_rest'               => false,
		);
		register_taxonomy( 'colegiatura', array( 'prestador', 'prestador_potencial' ), $args );
	
	}
	// add_action( 'init', 'colegiatura_custom_taxonomy', 0 );
	
	}
	
	if ( ! function_exists( 'asociacion_custom_taxonomy' ) ) {
	
	// Register Custom Taxonomy
	function asociacion_custom_taxonomy() {
	
		$labels = array(
			'name'                       => _x( 'Asociaciones', 'Taxonomy General Name', 'aessia' ),
			'singular_name'              => _x( 'Asociación', 'Taxonomy Singular Name', 'aessia' ),
			'menu_name'                  => __( 'Asociaciones', 'aessia-admin' ),
			'all_items'                  => __( 'Todas las Asociaciones', 'aessia-admin' ),
			'parent_item'                => __( 'Asociación superior', 'aessia-admin' ),
			'parent_item_colon'          => __( 'Asociación superior:', 'aessia-admin' ),
			'new_item_name'              => __( 'Nombre de la nueva Asociación', 'aessia-admin' ),
			'add_new_item'               => __( 'Añadir nueva Asociación', 'aessia-admin' ),
			'edit_item'                  => __( 'Editar Asociación', 'aessia-admin' ),
			'update_item'                => __( 'Actualizar Asociación', 'aessia-admin' ),
			'view_item'                  => __( 'Ver Asociación', 'aessia-admin' ),
			'separate_items_with_commas' => __( 'Separar Colegiaturas con comas', 'aessia-admin' ),
			'add_or_remove_items'        => __( 'Añadir o quitar Asociaciones', 'aessia-admin' ),
			'choose_from_most_used'      => __( 'Elegir de entre las más usadas', 'aessia-admin' ),
			'popular_items'              => __( 'Asociaciones más usadas', 'aessia-admin' ),
			'search_items'               => __( 'Buscar', 'aessia-admin' ),
			'not_found'                  => __( 'No encontrada', 'aessia-admin' ),
			'no_terms'                   => __( 'No hay Asociaciones', 'aessia-admin' ),
			'items_list'                 => __( 'Lista de Asociaciones', 'aessia-admin' ),
			'items_list_navigation'      => __( 'Lista de navegación de Asociaciones', 'aessia-admin' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => false,
			'show_tagcloud'              => false,
			'rewrite'                    => false,
			'show_in_rest'               => false,
		);
		register_taxonomy( 'asociacion', array( 'prestador', 'prestador_potencial' ), $args );
	
	}
	// add_action( 'init', 'asociacion_custom_taxonomy', 0 );
	
	}
	
	if ( ! function_exists( 'ambito_custom_taxonomy' ) ) {
	
	// Register Custom Taxonomy
	function ambito_custom_taxonomy() {
	
		$labels = array(
			'name'                       => _x( 'Ámbitos', 'Taxonomy General Name', 'aessia' ),
			'singular_name'              => _x( 'Ámbito', 'Taxonomy Singular Name', 'aessia' ),
			'menu_name'                  => __( 'Ámbito', 'aessia-admin' ),
			'all_items'                  => __( 'Todos los Ámbitos', 'aessia-admin' ),
			'parent_item'                => __( 'Ámbito superior', 'aessia-admin' ),
			'parent_item_colon'          => __( 'Ámbito superior:', 'aessia-admin' ),
			'new_item_name'              => __( 'Nombre del nuevo Ámbito', 'aessia-admin' ),
			'add_new_item'               => __( 'Añadir nuevo Ámbito', 'aessia-admin' ),
			'edit_item'                  => __( 'Editar Ámbito', 'aessia-admin' ),
			'update_item'                => __( 'Actualizar Ámbito', 'aessia-admin' ),
			'view_item'                  => __( 'Ver Ámbito', 'aessia-admin' ),
			'separate_items_with_commas' => __( 'Separar Ámbitos con comas', 'aessia-admin' ),
			'add_or_remove_items'        => __( 'Añadir o quitar Ámbitos', 'aessia-admin' ),
			'choose_from_most_used'      => __( 'Elegir de entre los más usados', 'aessia-admin' ),
			'popular_items'              => __( 'Ámbitos más usados', 'aessia-admin' ),
			'search_items'               => __( 'Buscar', 'aessia-admin' ),
			'not_found'                  => __( 'No encontrado', 'aessia-admin' ),
			'no_terms'                   => __( 'No hay Ámbitos', 'aessia-admin' ),
			'items_list'                 => __( 'Lista de Ámbitos', 'aessia-admin' ),
			'items_list_navigation'      => __( 'Lista de navegación de Ámbitos', 'aessia-admin' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => false,
			'show_tagcloud'              => false,
			'rewrite'                    => false,
			'show_in_rest'               => false,
		);
		register_taxonomy( 'ambito', array( 'prestador' ), $args );
	
	}
	add_action( 'init', 'ambito_custom_taxonomy', 0 );
	
	}
	
	if ( ! function_exists( 'tipo_entidad_custom_taxonomy' ) ) {
	
	// Register Custom Taxonomy
	function tipo_entidad_custom_taxonomy() {
	
		$labels = array(
			'name'                       => _x( 'Tipos de entidad', 'Taxonomy General Name', 'aessia' ),
			'singular_name'              => _x( 'Tipo de entidad', 'Taxonomy Singular Name', 'aessia' ),
			'menu_name'                  => __( 'Tipo de entidad', 'aessia-admin' ),
			'all_items'                  => __( 'Todos los Tipos de entidad', 'aessia-admin' ),
			'parent_item'                => __( 'Tipo de entidad superior', 'aessia-admin' ),
			'parent_item_colon'          => __( 'Tipo de entidad superior:', 'aessia-admin' ),
			'new_item_name'              => __( 'Nombre del nuevo Tipo de entidad', 'aessia-admin' ),
			'add_new_item'               => __( 'Añadir nuevo Tipo de entidad', 'aessia-admin' ),
			'edit_item'                  => __( 'Editar Tipo de entidad', 'aessia-admin' ),
			'update_item'                => __( 'Actualizar Tipo de entidad', 'aessia-admin' ),
			'view_item'                  => __( 'Ver Tipo de entidad', 'aessia-admin' ),
			'separate_items_with_commas' => __( 'Separar Tipos de entidad con comas', 'aessia-admin' ),
			'add_or_remove_items'        => __( 'Añadir o quitar Tipos de entidad', 'aessia-admin' ),
			'choose_from_most_used'      => __( 'Elegir de entre los más usados', 'aessia-admin' ),
			'popular_items'              => __( 'Tipos de entidad más usados', 'aessia-admin' ),
			'search_items'               => __( 'Buscar', 'aessia-admin' ),
			'not_found'                  => __( 'No encontrado', 'aessia-admin' ),
			'no_terms'                   => __( 'No hay Tipos de entidad', 'aessia-admin' ),
			'items_list'                 => __( 'Lista de Tipos de entidad', 'aessia-admin' ),
			'items_list_navigation'      => __( 'Lista de navegación de Tipos de entidad', 'aessia-admin' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => false,
			'show_tagcloud'              => false,
			'rewrite'                    => false,
			'show_in_rest'               => false,
		);
		register_taxonomy( 'tipo_entidad', array( 'prestador' ), $args );
	
	}
	add_action( 'init', 'tipo_entidad_custom_taxonomy', 0 );
	
	}

if ( ! function_exists( 'product_cat_function' ) ) {

	// Register Custom Taxonomy
	function product_cat_function() {

		$labels = array(
			'name'                       => _x( 'Familias de Producto', 'Taxonomy General Name', 'smn' ),
			'singular_name'              => _x( 'Familia de Producto', 'Taxonomy Singular Name', 'smn' ),
			'menu_name'                  => __( 'Familias de Producto', 'smn-admin' ),
			'all_items'                  => __( 'Todas las Familias de Producto', 'smn-admin' ),
			'parent_item'                => __( 'Familia de Producto superior', 'smn-admin' ),
			'parent_item_colon'          => __( 'Familia de Producto superior:', 'smn-admin' ),
			'new_item_name'              => __( 'Nueva Familia de Producto', 'smn-admin' ),
			'add_new_item'               => __( 'Añadir Nueva Familia de Producto', 'smn-admin' ),
			'edit_item'                  => __( 'Editar Familia de Producto', 'smn-admin' ),
			'update_item'                => __( 'Actualizar Familia de Producto', 'smn-admin' ),
			'view_item'                  => __( 'Ver Familia de Producto', 'smn-admin' ),
			'separate_items_with_commas' => __( 'Separar Familia de Producto con comas', 'smn-admin' ),
			'add_or_remove_items'        => __( 'Añadir o eliminar Familia de Producto', 'smn-admin' ),
			'choose_from_most_used'      => __( 'Elegir de entre las más usadas', 'smn-admin' ),
			'popular_items'              => __( 'Familias de Producto populares', 'smn-admin' ),
			'search_items'               => __( 'Buscar Familias de Producto', 'smn-admin' ),
			'not_found'                  => __( 'No encontrada', 'smn-admin' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'				 => true,
			'rewrite'					 => array(
											'slug'			=> __( 'product-cat', 'smn' ),
											'with_front'	=> true,
											'hierarchical'	=> false,
										 ),
		);

		register_taxonomy( 'product_cat', array( 'product' ), $args );

	}
	// Hook into the 'init' action
	// add_action( 'init', 'product_cat_function', 0 );

}

if ( ! function_exists( 'product_tag_function' ) ) {

	// Register Custom Taxonomy
	function product_tag_function() {

		$labels = array(
			'name'                       => _x( 'Etiquetas de Producto', 'Taxonomy General Name', 'smn' ),
			'singular_name'              => _x( 'Etiqueta de Producto', 'Taxonomy Singular Name', 'smn' ),
			'menu_name'                  => __( 'Etiquetas de Producto', 'smn-admin' ),
			'all_items'                  => __( 'Todas las Etiquetas de Producto', 'smn-admin' ),
			'parent_item'                => __( 'Etiqueta de Producto superior', 'smn-admin' ),
			'parent_item_colon'          => __( 'Etiqueta de Producto superior:', 'smn-admin' ),
			'new_item_name'              => __( 'Nueva Etiqueta de Producto', 'smn-admin' ),
			'add_new_item'               => __( 'Añadir Nueva Etiqueta de Producto', 'smn-admin' ),
			'edit_item'                  => __( 'Editar Etiqueta de Producto', 'smn-admin' ),
			'update_item'                => __( 'Actualizar Etiqueta de Producto', 'smn-admin' ),
			'view_item'                  => __( 'Ver Etiqueta de Producto', 'smn-admin' ),
			'separate_items_with_commas' => __( 'Separar Etiqueta de Producto con comas', 'smn-admin' ),
			'add_or_remove_items'        => __( 'Añadir o eliminar Etiqueta de Producto', 'smn-admin' ),
			'choose_from_most_used'      => __( 'Elegir de entre las más usadas', 'smn-admin' ),
			'popular_items'              => __( 'Etiquetas de Producto populares', 'smn-admin' ),
			'search_items'               => __( 'Buscar Etiquetas de Producto', 'smn-admin' ),
			'not_found'                  => __( 'No encontrada', 'smn-admin' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'				 => true,
			'rewrite'					 => array(
											'slug'			=> __( 'product-tag', 'smn' ),
											'with_front'	=> true,
											'hierarchical'	=> false,
										 ),
		);

		register_taxonomy( 'product_tag', array( 'product' ), $args );

	}
	// Hook into the 'init' action
	// add_action( 'init', 'product_tag_function', 0 );

}

if ( ! function_exists( 'custom_taxonomy_sector' ) ) {

// Register Custom Taxonomy
function custom_taxonomy_sector() {

	$labels = array(
		'name'                       => _x( 'Sectores', 'Taxonomy General Name', 'smn' ),
		'singular_name'              => _x( 'Sector', 'Taxonomy Singular Name', 'smn' ),
		'menu_name'                  => __( 'Sectores', 'smn-admin' ),
		'all_items'                  => __( 'Todos los Sectores', 'smn-admin' ),
		'parent_item'                => __( 'Sector superior', 'smn-admin' ),
		'parent_item_colon'          => __( 'Sector superior:', 'smn-admin' ),
		'new_item_name'              => __( 'Nombre del nuevo Sector', 'smn-admin' ),
		'add_new_item'               => __( 'Añadir nuevo Sector', 'smn-admin' ),
		'edit_item'                  => __( 'Editar Sector', 'smn-admin' ),
		'update_item'                => __( 'Actualizar Sector', 'smn-admin' ),
		'view_item'                  => __( 'Ver Sector', 'smn-admin' ),
		'separate_items_with_commas' => __( 'Separar Sectores con comas', 'smn-admin' ),
		'add_or_remove_items'        => __( 'Añadir o quitar Sectores', 'smn-admin' ),
		'choose_from_most_used'      => __( 'Elegir de entre los más usados', 'smn-admin' ),
		'popular_items'              => __( 'Sectores populares', 'smn-admin' ),
		'search_items'               => __( 'Buscar Sectores', 'smn-admin' ),
		'not_found'                  => __( 'No encontrado', 'smn-admin' ),
		'no_terms'                   => __( 'No hay Sectores', 'smn-admin' ),
		'items_list'                 => __( 'Lista de Sectores', 'smn-admin' ),
		'items_list_navigation'      => __( 'Navegación de la lista de Sectores', 'smn-admin' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'sector', array( 'product', 'empresa', 'prestador' ), $args );

}
// add_action( 'init', 'custom_taxonomy_sector', 10 );

}

if ( ! function_exists( 'zona_function' ) ) {

	// Register Custom Taxonomy
	function zona_function() {

		$labels = array(
			'name'                       => _x( 'Zonas', 'Taxonomy General Name', 'smn' ),
			'singular_name'              => _x( 'Zona', 'Taxonomy Singular Name', 'smn' ),
			'menu_name'                  => __( 'Zonas', 'smn-admin' ),
			'all_items'                  => __( 'Todas las Zonas', 'smn-admin' ),
			'parent_item'                => __( 'Zona superior', 'smn-admin' ),
			'parent_item_colon'          => __( 'Zona superior:', 'smn-admin' ),
			'new_item_name'              => __( 'Nueva Zona', 'smn-admin' ),
			'add_new_item'               => __( 'Añadir Nueva Zona', 'smn-admin' ),
			'edit_item'                  => __( 'Editar Zona', 'smn-admin' ),
			'update_item'                => __( 'Actualizar Zona', 'smn-admin' ),
			'view_item'                  => __( 'Ver Zona', 'smn-admin' ),
			'separate_items_with_commas' => __( 'Separar Zonas con comas', 'smn-admin' ),
			'add_or_remove_items'        => __( 'Añadir o eliminar Zona', 'smn-admin' ),
			'choose_from_most_used'      => __( 'Elegir de entre las más usadas', 'smn-admin' ),
			'popular_items'              => __( 'Zonas populares', 'smn-admin' ),
			'search_items'               => __( 'Buscar Zonas', 'smn-admin' ),
			'not_found'                  => __( 'No encontrada', 'smn-admin' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => false,
			'show_tagcloud'              => false,
			'show_in_rest'				 => true,
			'rewrite'					 => array(
											'slug'			=> __( 'zona', 'smn' ),
											'with_front'	=> true,
											'hierarchical'	=> false,
										 ),
		);

		register_taxonomy( 'zona', array( 'empresa', 'prestador' ), $args );

	}
	// Hook into the 'init' action
	//add_action( 'init', 'zona_function', 0 );

}

if ( ! function_exists( 'categoria_ventaja_function' ) ) {

	// Register Custom Taxonomy
	function categoria_ventaja_function() {

		$labels = array(
			'name'                       => _x( 'Tipos', 'Taxonomy General Name', 'smn' ),
			'singular_name'              => _x( 'Tipo', 'Taxonomy Singular Name', 'smn' ),
			'menu_name'                  => __( 'Tipos de ventajas', 'smn-admin' ),
			'all_items'                  => __( 'Todas las Categorías de ventajas', 'smn-admin' ),
			'parent_item'                => __( 'Categoría de ventaja superior', 'smn-admin' ),
			'parent_item_colon'          => __( 'Categoría de ventaja superior:', 'smn-admin' ),
			'new_item_name'              => __( 'Nueva Categoría de ventaja', 'smn-admin' ),
			'add_new_item'               => __( 'Añadir Nueva Categoría de ventaja', 'smn-admin' ),
			'edit_item'                  => __( 'Editar Categoría de ventaja', 'smn-admin' ),
			'update_item'                => __( 'Actualizar Categoría de ventaja', 'smn-admin' ),
			'view_item'                  => __( 'Ver Categoría de ventaja', 'smn-admin' ),
			'separate_items_with_commas' => __( 'Separar Categorías de ventajas con comas', 'smn-admin' ),
			'add_or_remove_items'        => __( 'Añadir o eliminar Categorías de Ventaja', 'smn-admin' ),
			'choose_from_most_used'      => __( 'Elegir de entre las más usadas', 'smn-admin' ),
			'popular_items'              => __( 'Categorías de ventajas populares', 'smn-admin' ),
			'search_items'               => __( 'Buscar Categorías de ventajas', 'smn-admin' ),
			'not_found'                  => __( 'No encontrada', 'smn-admin' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'				 => true,
			'rewrite'					 => array(
											'slug'			=> __( 'categoria-ventaja', 'smn' ),
											'with_front'	=> true,
											'hierarchical'	=> false,
										 ),
		);

		register_taxonomy( 'categoria_ventaja', array( 'ventaja' ), $args );

	}
	// Hook into the 'init' action
	add_action( 'init', 'categoria_ventaja_function', 0 );

}

if ( ! function_exists( 'origen_function' ) ) {

	// Register Custom Taxonomy
	function origen_function() {

		$labels = array(
			'name'                       => _x( 'Orígenes', 'Taxonomy General Name', 'smn' ),
			'singular_name'              => _x( 'Origen', 'Taxonomy Singular Name', 'smn' ),
			'menu_name'                  => __( 'Orígenes', 'smn-admin' ),
			'all_items'                  => __( 'Todos los Orígenes', 'smn-admin' ),
			'parent_item'                => __( 'Origen superior', 'smn-admin' ),
			'parent_item_colon'          => __( 'Origen superior:', 'smn-admin' ),
			'new_item_name'              => __( 'Nuevo Origen', 'smn-admin' ),
			'add_new_item'               => __( 'Añadir Nuevo Origen', 'smn-admin' ),
			'edit_item'                  => __( 'Editar Origen', 'smn-admin' ),
			'update_item'                => __( 'Actualizar Origen', 'smn-admin' ),
			'view_item'                  => __( 'Ver Origen', 'smn-admin' ),
			'separate_items_with_commas' => __( 'Separar Orígenes con comas', 'smn-admin' ),
			'add_or_remove_items'        => __( 'Añadir o eliminar Origen', 'smn-admin' ),
			'choose_from_most_used'      => __( 'Elegir de entre los más usados', 'smn-admin' ),
			'popular_items'              => __( 'Orígenes populares', 'smn-admin' ),
			'search_items'               => __( 'Buscar Orígenes', 'smn-admin' ),
			'not_found'                  => __( 'No encontrado', 'smn-admin' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => false,
			'show_tagcloud'              => false,
			'show_in_rest'				 => true,
			'rewrite'					 => array(
											'slug'			=> __( 'origen', 'smn' ),
											'with_front'	=> true,
											'hierarchical'	=> false,
										 ),
		);

		register_taxonomy( 'origen', array( 'ventaja', 'evento' ), $args );

	}
	// Hook into the 'init' action
	add_action( 'init', 'origen_function', 0 );

}

if ( ! function_exists( 'categoria_documento_function' ) ) {

	// Register Custom Taxonomy
	function categoria_documento_function() {

		$labels = array(
			'name'                       => _x( 'Categorías de Documento', 'Taxonomy General Name', 'smn' ),
			'singular_name'              => _x( 'Categoría de Documento', 'Taxonomy Singular Name', 'smn' ),
			'menu_name'                  => __( 'Categorías de Documento', 'smn-admin' ),
			'all_items'                  => __( 'Todas las Categorías de Documento', 'smn-admin' ),
			'parent_item'                => __( 'Categoría de Documento superior', 'smn-admin' ),
			'parent_item_colon'          => __( 'Categoría de Documento superior:', 'smn-admin' ),
			'new_item_name'              => __( 'Nueva Categoría de Documento', 'smn-admin' ),
			'add_new_item'               => __( 'Añadir Nueva Categoría de Documento', 'smn-admin' ),
			'edit_item'                  => __( 'Editar Categoría de Documento', 'smn-admin' ),
			'update_item'                => __( 'Actualizar Categoría de Documento', 'smn-admin' ),
			'view_item'                  => __( 'Ver Categoría de Documento', 'smn-admin' ),
			'separate_items_with_commas' => __( 'Separar Categorías de Documento con comas', 'smn-admin' ),
			'add_or_remove_items'        => __( 'Añadir o eliminar Cagetoría de Documento', 'smn-admin' ),
			'choose_from_most_used'      => __( 'Elegir de entre las más usadas', 'smn-admin' ),
			'popular_items'              => __( 'Categorías de Documento populares', 'smn-admin' ),
			'search_items'               => __( 'Buscar Categorías de Documento', 'smn-admin' ),
			'not_found'                  => __( 'No encontrada', 'smn-admin' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'				 => true,
			'rewrite'					 => array(
											'slug'			=> __( 'categoria-documento', 'smn' ),
											'with_front'	=> true,
											'hierarchical'	=> false,
										 ),
		);

		// register_taxonomy( 'categoria_documento', array( 'documento' ), $args );

	}
	// Hook into the 'init' action
	add_action( 'init', 'categoria_documento_function', 0 );

}

if ( ! function_exists( 'categoria_circular_function' ) ) {

	// Register Custom Taxonomy
	function categoria_circular_function() {

		$labels = array(
			'name'                       => _x( 'Categorías de Circular', 'Taxonomy General Name', 'smn' ),
			'singular_name'              => _x( 'Categoría de Circular', 'Taxonomy Singular Name', 'smn' ),
			'menu_name'                  => __( 'Categorías de Circular', 'smn-admin' ),
			'all_items'                  => __( 'Todas las Categorías de Circular', 'smn-admin' ),
			'parent_item'                => __( 'Categoría de Circular superior', 'smn-admin' ),
			'parent_item_colon'          => __( 'Categoría de Circular superior:', 'smn-admin' ),
			'new_item_name'              => __( 'Nueva Categoría de Circular', 'smn-admin' ),
			'add_new_item'               => __( 'Añadir Nueva Categoría de Circular', 'smn-admin' ),
			'edit_item'                  => __( 'Editar Categoría de Circular', 'smn-admin' ),
			'update_item'                => __( 'Actualizar Categoría de Circular', 'smn-admin' ),
			'view_item'                  => __( 'Ver Categoría de Circular', 'smn-admin' ),
			'separate_items_with_commas' => __( 'Separar Categorías de Circular con comas', 'smn-admin' ),
			'add_or_remove_items'        => __( 'Añadir o eliminar Cagetoría de Circular', 'smn-admin' ),
			'choose_from_most_used'      => __( 'Elegir de entre las más usadas', 'smn-admin' ),
			'popular_items'              => __( 'Categorías de Circular populares', 'smn-admin' ),
			'search_items'               => __( 'Buscar Categorías de Circular', 'smn-admin' ),
			'not_found'                  => __( 'No encontrada', 'smn-admin' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'				 => true,
			'rewrite'					 => array(
											'slug'			=> __( 'categoria-circular', 'smn' ),
											'with_front'	=> true,
											'hierarchical'	=> false,
										 ),
		);

		register_taxonomy( 'categoria_circular', array( 'circular' ), $args );

	}
	// Hook into the 'init' action
	add_action( 'init', 'categoria_circular_function', 0 );

}

if ( ! function_exists( 'categoria_evento_function' ) ) {

	// Register Custom Taxonomy
	function categoria_evento_function() {

		$labels = array(
			'name'                       => _x( 'Tipos', 'Taxonomy General Name', 'smn' ),
			'singular_name'              => _x( 'Tipo', 'Taxonomy Singular Name', 'smn' ),
			'menu_name'                  => __( 'Categorías de Evento', 'smn-admin' ),
			'all_items'                  => __( 'Todas las Categorías de Evento', 'smn-admin' ),
			'parent_item'                => __( 'Categoría de Evento superior', 'smn-admin' ),
			'parent_item_colon'          => __( 'Categoría de Evento superior:', 'smn-admin' ),
			'new_item_name'              => __( 'Nueva Categoría de Evento', 'smn-admin' ),
			'add_new_item'               => __( 'Añadir Nueva Categoría de Evento', 'smn-admin' ),
			'edit_item'                  => __( 'Editar Categoría de Evento', 'smn-admin' ),
			'update_item'                => __( 'Actualizar Categoría de Evento', 'smn-admin' ),
			'view_item'                  => __( 'Ver Categoría de Evento', 'smn-admin' ),
			'separate_items_with_commas' => __( 'Separar Categorías de Evento con comas', 'smn-admin' ),
			'add_or_remove_items'        => __( 'Añadir o eliminar Cagetoría de Evento', 'smn-admin' ),
			'choose_from_most_used'      => __( 'Elegir de entre las más usadas', 'smn-admin' ),
			'popular_items'              => __( 'Categorías de Evento populares', 'smn-admin' ),
			'search_items'               => __( 'Buscar Categorías de Evento', 'smn-admin' ),
			'not_found'                  => __( 'No encontrada', 'smn-admin' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'				 => true,
			'rewrite'					 => array(
											'slug'			=> __( 'categoria-evento', 'smn' ),
											'with_front'	=> true,
											'hierarchical'	=> false,
										 ),
		);

		register_taxonomy( 'categoria_evento', array( 'evento' ), $args );

	}
	// Hook into the 'init' action
	add_action( 'init', 'categoria_evento_function', 0 );

}

if ( ! function_exists( 'modalidad_function' ) ) {

	// Register Custom Taxonomy
	function modalidad_function() {

		$labels = array(
			'name'                       => _x( 'Modalidades', 'Taxonomy General Name', 'smn' ),
			'singular_name'              => _x( 'Modalidad', 'Taxonomy Singular Name', 'smn' ),
			'menu_name'                  => __( 'Modalidades', 'smn-admin' ),
			'all_items'                  => __( 'Todas las Modalidades', 'smn-admin' ),
			'parent_item'                => __( 'Modalidad superior', 'smn-admin' ),
			'parent_item_colon'          => __( 'Modalidad superior:', 'smn-admin' ),
			'new_item_name'              => __( 'Nueva Modalidad', 'smn-admin' ),
			'add_new_item'               => __( 'Añadir Nueva Modalidad', 'smn-admin' ),
			'edit_item'                  => __( 'Editar Modalidad', 'smn-admin' ),
			'update_item'                => __( 'Actualizar Modalidad', 'smn-admin' ),
			'view_item'                  => __( 'Ver Modalidad', 'smn-admin' ),
			'separate_items_with_commas' => __( 'Separar Modalidades con comas', 'smn-admin' ),
			'add_or_remove_items'        => __( 'Añadir o eliminar Modalidad', 'smn-admin' ),
			'choose_from_most_used'      => __( 'Elegir de entre las más usadas', 'smn-admin' ),
			'popular_items'              => __( 'Modalidades populares', 'smn-admin' ),
			'search_items'               => __( 'Buscar Modalidades', 'smn-admin' ),
			'not_found'                  => __( 'No encontrada', 'smn-admin' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'				 => true,
			'rewrite'					 => array(
											'slug'			=> __( 'modalidad-evento', 'smn' ),
											'with_front'	=> true,
											'hierarchical'	=> false,
										 ),
		);

		register_taxonomy( 'modalidad', array( 'evento' ), $args );

	}
	// Hook into the 'init' action
	add_action( 'init', 'modalidad_function', 0 );

}

function wpb_change_title_text( $title ){
     $screen = get_current_screen();
  
     if  ( 'portfolio_page' == $screen->post_type ) {
          $title = 'Título del proyecto';
     } elseif  ( 'slide' == $screen->post_type ) {
          $title = 'Título de la slide';
     } elseif  ( 'team' == $screen->post_type ) {
          $title = 'Nombre y apellidos';
     } elseif  ( 'product' == $screen->post_type ) {
          $title = 'Nombre del producto';
     }
  
     return $title;
}
add_filter( 'enter_title_here', 'wpb_change_title_text' );

// ADD NEW COLUMN
add_filter('manage_posts_columns', 'smn_columns_head');
add_filter('manage_pages_columns', 'smn_columns_head');
add_action('manage_posts_custom_column', 'smn_columns_content', 10, 2);
add_action('manage_pages_custom_column', 'smn_columns_content', 10, 2);
function smn_columns_head($defaults) {
	// $defaults = array('featured_image' => 'Imagen') + $defaults;
    $defaults['featured_image'] = 'Imagen';
    $defaults['extracto'] = 'Resumen';

    return $defaults;
}
 
// SHOW THE FEATURED IMAGE
function smn_columns_content($column_name, $post_ID) {
    if ($column_name == 'featured_image') {
    	echo '<div style="height:100px;">' . get_the_post_thumbnail( $post_ID, array(80,80) ) . '</div>';

    }
    if ($column_name == 'extracto') {
    	$post = get_post($post_ID);
    	echo $post->post_excerpt;
    }
}


?>