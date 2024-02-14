<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$post_type = 'post';

if ( isset( $args['post_type'] ) ) {
	$post_type = $args['post_type'];
}

switch ( $post_type ) {
	case 'dlm_download':
	case 'documento':
			$template = 'circular';
		break;
	
	default:
		$template = $post_type;
		break;
}
$taxonomy = false;

$args = array(
	'posts_per_page'	=> 6,
	'post_type'			=> $post_type,
);

$q = new WP_Query($args);

if ( $q->have_posts() ) { ?>

	<div class="slick-carousel recent-carousel recent-carousel-<?php echo $template; ?>">

		<?php while ( $q->have_posts() ) { $q->the_post();

			get_template_part( 'loop-templates/content-carousel', $template );

		} ?>

	</div>

<?php }

wp_reset_postdata();
