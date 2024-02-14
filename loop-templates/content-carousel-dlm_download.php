<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$bg_class = 'bg-primary text-white';
?>

<article <?php post_class( 'hfeed-post carousel-post-documento' ); ?> id="post-<?php the_ID(); ?>">

	<div class="carousel-post-preview-wrapper d-flex h-100">

		<div class="carousel-post-preview bg-primary text-white mr-1">

			test

		</div>

		<div class="card bg-primary text-white mr-1 d-none">

			<?php the_post_thumbnail( 'medium', array( 'class' => 'card-img-top' ) ); ?>

			<div class="card-body">

				<header class="entry-header">

					<div class="entry-meta">
						<?php understrap_posted_on(); ?>
					</div><!-- .entry-meta -->

					<?php
					the_title(
						sprintf( '<p class="h5 entry-title"><a class="stretched-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
						'</a></p>'
					);
					?>

					<?php
						$titulo_extendido = get_post_meta( get_the_ID(), 'titulo_extendido', true );
						if ( $titulo_extendido ) {
							echo '<p class="font-weight-bold">' . $titulo_extendido . '</p>';
						}
					?>

				</header><!-- .entry-header -->

				<footer class="entry-footer">

					<?php understrap_entry_footer(); ?>

				</footer><!-- .entry-footer -->

				<div class="pusher"></div>

			</div>

			<div class="card-footer bg-primary px-2 py-1 pb-2 text-right">

				<?php smn_read_more_button( 'btn-outline-light rounded-0 text-white', false ); ?>

			</div>

		</div>

	</div>

</article><!-- #post-## -->
