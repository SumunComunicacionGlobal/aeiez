<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $post;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="entry-content">

		<div class="row mb-3">

			<div class="col-md-6">

				<?php if ( 'prestador' == get_post_type() ) {
					echo '<p class="h2">' . __( 'Datos de la empresa', 'smn' ) . '</p>';
				} ?>

				<?php if ($post->post_excerpt) echo apply_filters( 'the_content', $post->post_excerpt ); ?>

				<?php smn_botones_mas_info(); ?>

			</div>

			<div class="col-md-6">

				<?php smn_post_meta(); ?>

			</div>

		</div>

		<?php
		the_content();
		understrap_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
