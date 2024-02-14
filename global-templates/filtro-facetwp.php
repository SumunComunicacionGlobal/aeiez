<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$facets = array();
$post_type = get_post_type();

switch ( $post_type ) {
	case 'prestador':
		$facets = array(
			'buscador',
			'tipo_entidad',
			'ambito',
			'zona',
			//'ciudad',
		);
		break;
	
	case 'ventaja':
		$facets = array(
			'buscador',
			'tipo_ventaja',
			'origen',
		);
		break;
		
	case 'circular':
		$facets = array(
			'buscador',
			'categoria_circular',
		);
		break;
		
	case 'evento':
		$facets = array(
			'buscador',
			'categoria_evento',
			'modalidad',
			'origen',
		);
		break;
			
	
	default:
		$facets = array(
			'buscador',
		);
		break;
}

if ( $facets ) {
?>

	<a href="javascript:;" class="facetwp-flyout-open btn btn-outline-primary d-lg-none mb-2"><?php echo __( 'Filtrar', 'smn' ); ?></a>

	<div class="d-none d-lg-block">

		<div class="filter-navbar filter-navbar-facetwp navbar-expand-lg">

			<div class="nav navbar-nav align-items-end">

				<?php 
				foreach ( $facets as $f ) {

					echo facetwp_display( 'facet', $f );

				}
				?>


			</div>

		</div>


		<?php echo facetwp_display( 'facet', 'limpiar_filtro' ); ?>

		<?php echo facetwp_display( 'facet', 'contador' ); ?>

	</div>

<?php }