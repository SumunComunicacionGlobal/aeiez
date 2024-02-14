<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

global $post;

$card_class = 'border border-light';
$bg_class = 'bg-white';

?>

<article <?php post_class( 'hfeed-post carousel-post' ); ?> id="post-<?php the_ID(); ?>">

	<div class="card <?php echo $card_class; ?>">

		<div class="card-body card-body-top <?php echo $bg_class; ?>">

			<header class="entry-header">

				<?php if ( 'post' === get_post_type() ) : ?>

					<div class="entry-meta">
						<?php understrap_posted_on(); ?>
					</div><!-- .entry-meta -->

				<?php endif; ?>

				<?php
				the_title(
					sprintf( '<h2 class="h4 entry-title"><a class="stretched-link" href="%s" target="_blank" rel="bookmark">', esc_url( get_permalink() ) ),
					'</a></h2>'
				);
				?>

				<?php if ( 'ventaja' == get_post_type() ) : ?>

					<?php the_post_thumbnail( 'medium', array( 'class' => 'mx-auto my-2' ) ); ?>

				<?php endif; ?>

			</header><!-- .entry-header -->


			<footer class="entry-footer">

				<?php understrap_entry_footer(); ?>

			</footer><!-- .entry-footer -->

		</div>

		<div class="pusher"></div>

	</div>

</article><!-- #post-## -->
