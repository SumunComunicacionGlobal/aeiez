<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( is_singular() ) {
	$hide_hero = get_post_meta( get_the_ID(), 'hide_hero', true );
	if ( $hide_hero ) return false;
}

$image_id = false;
$title = '';
$description = '';
$background_dim = '100';
$has_image_class = '';

$short_description = '';

if ( is_singular('circular') ) {
	
} elseif ( is_singular() ) {
	$image_id = get_post_thumbnail_id( get_the_ID() );
	$title = get_the_title();
} elseif( is_home() ) {
	$blog_page_id = get_option( 'page_for_posts' );
	$title = get_the_title( $blog_page_id );
} elseif ( is_archive() ) {
	$image_id = get_term_meta( get_queried_object_id(), 'thumbnail_id', true );
	// if (!$image_id) $image_id = 145;
	$title = get_the_archive_title();
	if ( is_post_type_archive() && 'dlm_download' != get_post_type() ) {
		$pto = get_post_type_object( get_post_type() );
		$short_description = $pto->description;
	}
	if ( function_exists('ptad_get_post_type_description') && is_post_type_archive() ) {
		$post_type = get_post_type();
		$all_descriptions = (array) get_option( 'ptad_descriptions' );
		if( array_key_exists($post_type, $all_descriptions) ) {
			$description = wpautop( $all_descriptions[$post_type] );
		} else {
			$description = '';
		}
	} else {
		$description = get_the_archive_description();
	}


}

if ( $image_id ) {
	$background_dim = '90';
	$has_image_class = 'has-background-image';
}


?>

<header class="wp-block-cover alignfull is-style-image-header <?php echo $has_image_class; ?>">

	<span aria-hidden="true" class="wp-block-cover__background has-background-dim has-background-dim-<?php echo $background_dim; ?> has-primary-100-background-color"></span>

	<?php if ( $image_id ) echo wp_get_attachment_image( $image_id, 'large', false, array('class' => 'wp-block-cover__image-background') ); ?>

	<div class="wp-block-cover__inner-container container">

		<?php if ( is_singular( 'prestador' ) ) { ?>

			<div class="row">

				<div class="col-lg-6">

					<h1 class="entry-title"><?php echo $title; ?></h1>

				</div>

				<div class="col-lg-6 text-center text-white">

					<?php echo get_vcard(); ?>
				
				</div>

			</div>

		<?php } else { ?>
		
			<div class="wp-block-columns">

				<div class="wp-block-column">

					<?php if ( is_singular( array( 'post' ) ) ) { ?>

						<div class="entry-meta text-white">

							<?php understrap_posted_on(); ?>

						</div><!-- .entry-meta -->

					<?php } ?>

					<?php if ( $title ) { ?>
						<h1 class="entry-title"><?php echo $title; ?></h1>
					<?php } ?>

				</div>

				<div class="wp-block-column">

					<?php if ( $short_description ) { ?>

						<p class="has-large-font-size"><?php echo $short_description; ?></p>

					<?php } ?>

				</div>

			</div>

		<?php } ?>

	</div>

</header>

<?php if ( $description ) { ?>

	<div id="wrapper-description" class="wrapper">

		<div class="container">

			<?php smn_breadcrumb(); ?>

			<div class="lead">

				<?php echo $description; ?>

			</div>

		</div>

	</div>

<?php } elseif ( !is_singular('circular') ) { ?>

	<div class="container">

		<?php smn_breadcrumb(); ?>

	</div>

<?php } ?>
