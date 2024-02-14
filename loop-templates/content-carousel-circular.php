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

<article <?php post_class( 'hfeed-post carousel-post carousel-post-circular' ); ?> id="post-<?php the_ID(); ?>">

	<div class="card bg-primary text-white">

		<div class="card-body">

			<header class="entry-header">

				<?php
				the_title(
					sprintf( '<h2 class="h4 entry-title"><a class="stretched-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
					'</a></h2>'
				);
				?>

				<div class="entry-meta">
					<?php understrap_posted_on(); ?>
				</div><!-- .entry-meta -->

				<?php
					$titulo_extendido = get_post_meta( get_the_ID(), 'titulo_extendido', true );
					if ( $titulo_extendido ) {
						echo '<p class="font-weight-bold">' . $titulo_extendido . '</p>';
					}
				?>

				<?php
				echo wp_trim_words( $post->post_content, 10, '[...]' );
				?>

			</header><!-- .entry-header -->

			<footer class="entry-footer">

				<?php understrap_entry_footer(); ?>

			</footer><!-- .entry-footer -->

			<div class="pusher"></div>

		</div>

		<div class="card-footer px-2 py-1">

			<?php smn_read_more_button( 'btn-primary btn-block text-white', false ); ?>

		</div>

	</div>

</article><!-- #post-## -->
