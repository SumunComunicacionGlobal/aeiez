<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function understrap_posted_on() {

    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
    }
    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() )
    );
    echo $time_string; // WPCS: XSS OK.

}



/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function understrap_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'understrap' ) );
		if ( $categories_list && understrap_categorized_blog() ) {
			/* translators: %s: Categories of current post */
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %s', 'understrap' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'understrap' ) );
		if ( $tags_list ) {
			/* translators: %s: Tags of current post */
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %s', 'understrap' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}
	// if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
	// 	echo '<span class="comments-link">';
	// 	comments_popup_link( esc_html__( 'Leave a comment', 'understrap' ), esc_html__( '1 Comment', 'understrap' ), esc_html__( '% Comments', 'understrap' ) );
	// 	echo '</span>';
	// }
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'understrap' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}

function smn_breadcrumb() {

	if ( is_front_page() ) return false;

	if(function_exists('bcn_display')) {
		echo '<div class="breadcrumb" typeof="BreadcrumbList" vocab="https://schema.org/">';
			echo '<div class="breadcrumb-inner">';
				bcn_display();
			echo '</div>';
		echo '</div>';
	} elseif ( function_exists( 'rank_math_the_breadcrumbs') ) {
		echo '<div class="breadcrumb">';
			echo '<div class="breadcrumb-inner">';
				rank_math_the_breadcrumbs(); 
			echo '</div>';
		echo '</div>';
		} elseif ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb( '<div id="breadcrumbs" class="breadcrumb"><div class="breadcrumb-inner">','</div></div>' );
	  }

}

function smn_get_breadcrumb() {
	ob_start();
	smn_breadcrumb();
	return ob_get_clean();
}

function smn_get_post_meta() {

	global $post;
	$r = '';
	$items = array();

	// $r .= $post->post_title . ' post_meta';

	$post_type = $post->post_type;

	if ( in_array( $post_type, array( 'post', 'documento', 'dlm_download' ) ) ) {
		$items[] = array(
			'label'			=> __( 'Fecha', 'smn' ),
			'value'			=> get_the_date()
		);
	}

	$post_type_object = get_post_type_object( $post_type );
	$taxonomies = $post_type_object->taxonomies;

	foreach ( $taxonomies as $tax ) {

		$term_list = get_the_term_list( $post->ID, $tax, '', ', ', '' );

		if ( $term_list ) {
			$tax_object = get_taxonomy( $tax );
			$tax_name = $tax_object->labels->singular_name;

			$items[] = array(
				'label'			=> $tax_name,
				'value'			=> $term_list
			);

		}

	}

	switch ($post_type) {
		case 'documento':
		case 'dlm_download':
				$field_group_id = 69;
			break;
		
		case 'evento':
			$field_group_id = 59;
			break;

		case 'ventaja':
			$field_group_id = 71;
			break;

		case 'prestador':
		case 'empresa':
					$field_group_id = 81;
			break;

		default:
			$field_group_id = false;
			break;
	}

	if ( $field_group_id ) {

		$fields = acf_get_fields( $field_group_id );

		foreach ( $fields as $field ) {

			$field_value = get_field( $field['name']);

			if ( isset( $field['append'] ) ) {

				if ( str_contains( $field['append'], '€' ) && $field_value == 0 ) {
					$field_value = __( 'Gratuito', 'smn' );
				} else {
					$field_value = $field_value . $field['append'];
				}
			
			}

			if ( $field_value && !empty( $field_value ) ) {

				if ( $field['name'] == 'telefono_notificaciones' ) {
					$field_value_sanitized = preg_replace('/[^0-9]/', '', $field_value);
					$field_value = '<a href="tel:'.$field_value_sanitized.'">'.$field_value.'</a>';
				}

				if ( $field['name'] == 'email_notificaciones' ) {
					$field_value = '<a href="mailto:'.$field_value.'">'.$field_value.'</a>';
				}

				if ( $field['name'] == 'direccion' ) {
					$google_maps_query = 'https://www.google.es/maps/search/?api=1&query=calle ' . $field_value . ' ' . get_field( 'codigo_postal' ) . ' ' . get_field( 'localidad' );
					$field_value = '<a href="'.$google_maps_query.'" target="_blank" rel="noopener noreferrer nofollow">'.$field_value.'</a>';
				}
				
				$items[] = array(
					'label'			=> $field['label'],
					'value'			=> $field_value
				);
			}
		}

	}

	if ( 'dlm_download' == $post_type ) {

		$download = download_monitor()->service( 'download_repository' )->retrieve_single( $post->ID );

		$filetype = $download->get_version()->get_filetype();
		$items[] = array(
			'label'		=> __( 'Formato', 'smn' ),
			'value'		=> strtoupper( $filetype )
		);

		$filesize = $download->get_version()->get_filesize_formatted();

		$items[] = array(
			'label'		=> __( 'Tamaño', 'smn' ),
			'value'		=> $filesize
		);
	}


	if ( $items ) {

		$r .= '<ul class="aeiez-meta list-group list-group-flush">';

			foreach ( $items as $item ) {

				$r .= '<li class="list-group-item px-0"><span class="meta-label">' . $item['label'] . '</span>: '. $item['value'] .'</li>';

			}

		$r .= '<ul>';

	}


	return $r;
}

function smn_post_meta() {
	echo smn_get_post_meta();
}

function smn_get_carousel_post_meta() {

	$r = '';
	$post_type = get_post_type();

	if ( 'evento' == $post_type ) {

		$linea_1 = get_field( 'organizador' );

		$linea_2 = array();
		$modalidad = get_the_term_list( null, 'modalidad', '', ' · ', '' );
		if ( $modalidad ) $linea_2[] = $modalidad;
		$precio = get_field( 'precio' );
		if ( $precio === '0' ) {
			$precio = __( 'Gratuito', 'smn' );
			$linea_2[] = $precio;
		} elseif ( $precio ) {
			$precio_field_object = get_field_object( 'precio' );
			if ( isset( $precio_field_object['append']) ) $precio .= $precio_field_object['append'];
			$linea_2[] = $precio;
		}

		$linea_3 = array();
		$duracion = get_field( 'duracion' );
		if ( $duracion ) $linea_3[] = $duracion;
		$inicio = get_field( 'inicio' );
		if ( $inicio ) $linea_3[] = $inicio;


		if ( $linea_1 ) $r .= '<p class="carousel-post-meta carousel-post-meta-destacado">' . $linea_1 . '</p>';
		if ( $linea_2 ) $r .= '<p class="carousel-post-meta carousel-post-meta-destacado">' . implode( ' - ', $linea_2 ) . '</p>';
		if ( $linea_3 ) $r .= '<p class="carousel-post-meta">' . implode( ' - ', $linea_3 ) . '</p>';
		
	} elseif( 'ventaja' == $post_type ) {

		// $linea_1 = get_the_term_list( get_the_ID(), 'origen', '', ' · ', '' );
		$linea_1 = get_field( 'provee' );

		// $linea_2 = array();
		// $modalidad = get_the_term_list( null, 'categoria_ventaja', '', ' · ', '' );
		// if ( $modalidad ) $linea_2[] = $modalidad;

		$linea_3 = array();
		$resumen = get_field( 'resumen_ventaja' );
		if ( $resumen ) $linea_3[] = $resumen;
		$hasta = get_field( 'valido_hasta' );
		if ( $hasta ) $linea_3[] = __( 'Valido hasta ', 'smn' ) . $hasta;


		if ( $linea_1 ) $r .= '<p class="carousel-post-meta carousel-post-meta-destacado">' . $linea_1 . '</p>';
		// if ( $linea_2 ) $r .= '<p class="carousel-post-meta carousel-post-meta-destacado">' . implode( ' - ', $linea_2 ) . '</p>';
		if ( $linea_3 ) $r .= '<p class="carousel-post-meta">' . implode( ' - ', $linea_3 ) . '</p>';

	}


	return $r;

}

function smn_carousel_post_meta() {
	echo smn_get_carousel_post_meta();
}

function smn_read_more_text() {
	echo smn_get_read_more_text();
}

function smn_get_read_more_text() {
	global $post;

	$post_type_object = get_post_type_object( $post->post_type );
	$post_type_label = $post_type_object->labels->singular_name;

	$read_more_text = sprintf( __( 'Ver %s', 'smn' ), $post_type_label );
	
	if ( 'dlm_download' == $post->post_type ) {
		$read_more_text = __( 'Descargar', 'smn' );
	}


	return $read_more_text;
}

function smn_read_more_button( $btn_classes = 'btn-outline-primary', $show_locked_text = true ) {
	echo smn_get_read_more_button( $btn_classes, $show_locked_text );
}

function smn_get_read_more_button( $btn_classes = 'btn-outline-primary', $show_locked_text = true ) {
	global $post;

	$is_blocked = wpmem_is_blocked( $post->ID );
	$blocked_text = '';

	$r = '';

	$read_more_button_class = 'rounded-pill';
	$read_more_button_icon = 'arrow';

	if ( !is_user_logged_in() && $is_blocked ) {
		$read_more_button_icon = 'locked';
	}

	if ( smn_is_columns_layout_post_type() ) {
		$read_more_button_class = '';
	}

	$r .= '<span class="btn btn-icon ' . $btn_classes . ' btn-icon-' . $read_more_button_icon . ' ' . $read_more_button_class . '">' . smn_get_read_more_text() . '</span>';

	if ( $show_locked_text && $is_blocked ) {
		$blocked_text =  __( 'Este contenido solo está disponible para los socios.', 'smn' );
		if ( !is_user_logged_in() ) {
			$blocked_text .= '<br><strong>' . __( 'Pulse para acceder', 'smn' ) . '</strong>';
		}

		$blocked_text = '<span class="blocked-text small">' . $blocked_text . '</span>';
	}

	if ( $blocked_text ) {
		$r = '<div class="read-more-button-group d-flex flex-wrap align-items-center">' . $r . $blocked_text . '</div>';
	}
	return $r;
}

function smn_is_columns_layout_post_type() {
    
    if ( is_archive() ) {
        $pt = get_post_type();
        if ( in_array( $pt, array('circular', 'empresa', 'prestador' ) ) ) return true;
    }

    return false;

}

function smn_document_image() {
	echo smn_get_document_image();
}

function smn_get_document_image() {

	$filetype = '';
	global $post;

	if ( 'dlm_download' == get_post_type() ) {
		$download = download_monitor()->service( 'download_repository' )->retrieve_single( $post->ID );
		$filetype = $download->get_version()->get_filetype();
	}

	echo '<div class="document-icon-wrapper mx-auto py-2 h-100 d-flex justify-content-center align-items-center has-'.$filetype.'-icon">';
		echo '<div class="document-icon-inner position-relative">';
			echo '<img src="'.get_stylesheet_directory_uri().'/img/document.svg" alt="'. __( 'Icono documento', 'smn' ) .'" width="160" height="170" />';
			echo '<span class="document-icon-label">'.$filetype.'</span>';
		echo '</div>';
	echo '</div>';

}

function smn_the_excerpt_the_content() {

	global $post;

	if ( $post->post_excerpt ) {
		the_excerpt();

		if ( $post->post_content ) { ?>
		
			<p>
				<a class="view-more position-relative z-index-1 font-weight-bold" data-toggle="collapse" href="#ver-mas-<?php echo $post->ID; ?>" aria-expanded="false" aria-controls="ver-mas-<?php echo $post->ID; ?>">
					<?php echo __( 'Ver más', 'smn' ); ?>
				</a>
			</p>
	
			<div class="collapse" id="ver-mas-<?php echo $post->ID; ?>">
				<?php the_content(); ?>
			</div>
		
		<?php }

	} else {
		the_content();
	}

}

function smn_get_post_bg_class() {
	
	$post_type = get_post_type();

	switch ( $post_type ) {
		case 'evento':
			$taxonomy = 'categoria_evento';
			break;
		
		case 'ventaja':
			$taxonomy = 'categoria_ventaja';
			break;
		
		default:
			$taxonomy = false;
			break;
	}

	if ( $taxonomy ) {

		$terms = wp_get_post_terms( get_the_ID(), $taxonomy );

		if ( $terms ) {
			$bg_color = get_term_meta( $terms[0]->term_id, 'term-color-name', true );
			
			if ( $bg_color ) {
				return 'bg-' . $bg_color . ' text-white';
			}
		}

	}

	return false;

}

function get_vcard() {

    // wp_enqueue_script( 'qr-code-and-vcard' );

    // unserialize
    // wqm_url
    // wqm_adr
    // wqm_email
    // wqm_tel
    // wqm_n - nombre

    ob_start(); ?>

    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/QrCode.min.js" type="application/javascript"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/vcard.js" type="application/javascript"></script>

    <a href="#descargar-vcard" id="export-vcard-link" class="vcard-section">
        <div id="qr_vcard"></div>
        <!-- <pre id="vcardcanvas"></pre> -->
        <p><?php _e( 'Descargar en mi móvil datos de contacto vCARD', 'smn' ); ?></p>
    </a>

    <script>

        var qrCard = {
            version: '3.0',
            lastName: '',
            middleName: '',
            firstName: '<?php the_title(); ?>',
            organization: '<?php the_title(); ?>',
            workPhone: '<?php echo get_field('telefono_notificaciones'); ?>',
            workEmail: '<?php echo get_field('email_notificaciones'); ?>',
            // url: 'http://acemecompany/johndoe',
            workUrl: '<?php echo get_field('sitio_web'); ?>',

            workAddress: {
                label: 'Dirección del trabajo',
                street: '<?php echo get_field('direccion'); ?>',
                city: '<?php echo get_field('localidad'); ?>',
                // stateProvince: 'CA',
                postalCode: '<?php echo get_field('codigo_postal'); ?>',
                // countryRegion: 'California Republic'
            },
    
        };

        function GenerarVcard() {
    
            var person = vCard.create(vCard.Version.THREE);
            person.add(vCard.Entry.FORMATTEDNAME, '<?php the_title(); ?>');
            person.add(vCard.Entry.NAME, '<?php the_title(); ?>');
            person.add(vCard.Entry.EMAIL, '<?php echo get_field('email_notificaciones'); ?>', vCard.Type.WORK);

            // person.add(vCard.Entry.LOGO, base64imgLogo, ';ENCODING=b;TYPE='+ typeLogo );
            // person.add(vCard.Entry.PHOTO, base64imgFoto, ';ENCODING=b;TYPE='+ typeFoto);

            person.add(vCard.Entry.PHONE, '<?php echo get_field('telefono_notificaciones'); ?>', vCard.Type.WORK);
            person.add(vCard.Entry.ADDRESS, ";;"+'<?php echo get_field('localidad'); ?>', vCard.Type.WORK);
            person.add(vCard.Entry.ORGANIZATION, '<?php the_title(); ?>');
            person.add(vCard.Entry.URL, '<?php echo get_field('sitio_web'); ?>');

            var link = vCard.export(person, '<?php the_title(); ?>', false) // use parameter true to force download
            // jQuery('#export-vcard-link')[0].appendChild(link);
      
        }

        // document.getElementById('vcardcanvas').innerHTML = qrCode.createVCard(qrCard);
        document.getElementById('qr_vcard').innerHTML = qrCode.createVCardQr(qrCard, {
            typeNumber: 15, 
            cellSize: 4
        });
        


    
        jQuery(document).ready(function() {
            jQuery('#export-vcard-link').click( function(e) {
                e.preventDefault();
                GenerarVcard();
                // var elemremove1 = jQuery('#vcardcanvas');
                // elemremove1.remove();
            });
        });

    
    </script> 

    <?php return ob_get_clean();

}

function smn_botones_mas_info() {

	$fields = array(
		'url_info' => __( 'Más información', 'smn' ),
		'url_inscripcion' => __( 'Inscripción', 'smn' )
	);

	foreach( $fields as $key => $label ) {

		$value = get_post_meta( get_the_ID(), $key, true );

		if ( !$value ) continue;

		$btn_class = 'btn btn-outline-primary';
		if ( 'url_inscripcion' == $key ) {
			$btn_class = 'btn-secondary';
		}
		echo '<a href="'.$value.'" target="_blank" rel="noopener noreferrer" class="mr-1 mb-1 btn ' . $btn_class . '">'. $label .'</a>';
	}

}