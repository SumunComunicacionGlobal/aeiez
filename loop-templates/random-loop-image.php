<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( 'circular' != get_post_type() ) return false;

global $wp_query;

$current_post = $wp_query->current_post + 1;
$positions = array(1, 4, 5);
$random_loop_image_filename = 'random-loop-image-1.svg';

if ( !in_array( $current_post, $positions ) ) return false;

switch ( $current_post ) {
	case 4:
		$random_loop_image_filename = 'random-loop-image-2.svg';
		break;

	case 5:
		$random_loop_image_filename = 'random-loop-image-3.svg';
		break;
	
	default:
		$random_loop_image_filename = 'random-loop-image-1.svg';
		break;
}
?>

<div class="random-loop-image d-none d-lg-block <?php echo COLUMNS_LAYOUT_CLASSES; ?>">

	<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/<?php echo $random_loop_image_filename; ?>" alt="<?php echo __( 'Imagen decorativa aleatoria', 'smn' ); ?>" />

</div>