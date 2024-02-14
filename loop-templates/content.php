<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$target = '';
if ( 'ventaja' == get_post_type() ) $target = ' target="_blank"';
?>

<article <?php post_class( 'hfeed-post stretch-linked-block' ); ?> id="post-<?php the_ID(); ?>">

	<div class="row no-gutters">

		<div class="col-md-4 hfeed-post-img-col">

			<?php if ( in_array( get_post_type(), array('documento', 'dlm_download') ) ) {

				smn_document_image();

			} else {

				echo get_the_post_thumbnail( $post->ID, 'medium_large', array('class' => 'h-100') ); 
				
			} ?>

		</div>

		<div class="col-md-8 card position-static">

			<div class="card-body">

				<header class="entry-header row">

					<div class="col-xl-6 position-static">

						<?php if ( 'post' === get_post_type() ) : ?>

							<div class="entry-meta">
								<?php understrap_posted_on(); ?>
							</div><!-- .entry-meta -->

						<?php endif; ?>

						<?php
						the_title(
							sprintf( '<h2 class="h3 entry-title card-title"><a class="stretched-link" href="%s" ' . $target . ' rel="bookmark">', esc_url( get_permalink() ) ),
							'</a></h2>'
						);
						?>

					</div>

				</header><!-- .entry-header -->

				<div class="row">

					<div class="col-xl-6">

						<div class="entry-content">

							<?php

							if ( 'dlm_download' == get_post_type() ) {
								smn_the_excerpt_the_content();
							} else {
								the_excerpt();
							}

							understrap_link_pages();
							?>

						</div><!-- .entry-content -->

						<footer class="entry-footer">

							<?php understrap_entry_footer(); ?>

						</footer><!-- .entry-footer -->

					</div>

					<div class="col-xl-6">

						<?php smn_post_meta(); ?>

					</div>

				</div>

			</div>

			<div class="card-footer">

				<div class="d-flex justify-content-end">

					<?php smn_read_more_button(); ?>

					<?php
					$url_incripcion = get_field( 'url_inscripcion' );
					if ( $url_incripcion ) { ?>

						<a class="btn btn-icon btn-icon-arrow btn-outline-secondary rounded-pill ml-2 z-index-1" href="<?php echo $url_incripcion; ?>" target="_blank" rel="noopener noreferrer"><?php echo __( 'Inscripción', 'smn' ); ?></a>

					<?php } ?>

				</div>

			</div>

		</div>

	</div>

</article><!-- #post-## -->
