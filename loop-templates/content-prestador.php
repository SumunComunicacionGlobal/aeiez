<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class( 'hfeed-post' ); ?> id="post-<?php the_ID(); ?>">

	<div class="card h-100 stretch-linked-block">

		<div class="card-body">

			<header class="entry-header">

				<?php
				the_title(
					sprintf( '<h2 class="h3 entry-title card-title"><a class="stretched-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
					'</a></h2>'
				);
				?>

				<div class="entry-meta">
					<?php understrap_posted_on(); ?>
				</div><!-- .entry-meta -->

			</header><!-- .entry-header -->

			<div class="entry-content">

				<?php
				the_excerpt();
				understrap_link_pages();
				?>

				<?php smn_post_meta(); ?>

			</div><!-- .entry-content -->

			<footer class="entry-footer">

				<?php understrap_entry_footer(); ?>

			</footer><!-- .entry-footer -->

		</div>

		<div class="card-footer">

			<?php smn_read_more_button(); ?>

		</div>

	</div>

</article><!-- #post-## -->
