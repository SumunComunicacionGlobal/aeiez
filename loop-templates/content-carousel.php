<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

global $post;

$card_class = '';
$bg_class = smn_get_post_bg_class();
$bg_light_class = 'bg-primary-10';

if ( $bg_class ) {
	$bg_classes_array = explode( ' ', $bg_class );
	$bg_color_array = explode( '-', $bg_classes_array[0] );
	if ( count($bg_color_array) == 3 ) {
		$bg_color_array[2] = '20';
		$bg_light_class = implode( '-', $bg_color_array );
	}
}

if ( $post->post_type == 'ventaja' ) {
	$bg_class = 'bg-white';
	$card_class = 'border border-light';
}

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
					sprintf( '<h2 class="h4 entry-title"><a class="stretched-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
					'</a></h2>'
				);
				?>

				<?php if ( 'ventaja' == get_post_type() ) : ?>

					<?php the_post_thumbnail( 'medium', array( 'class' => 'mx-auto my-2' ) ); ?>

				<?php endif; ?>

			</header><!-- .entry-header -->

		</div>

		<div class="card-body card-body-bottom <?php echo $bg_light_class; ?>">

			<div class="entry-content">

				<?php
				// the_excerpt();
				// understrap_link_pages();
				smn_carousel_post_meta();
				?>

			</div><!-- .entry-content -->

			<footer class="entry-footer">

				<?php understrap_entry_footer(); ?>

			</footer><!-- .entry-footer -->

			<div class="pusher"></div>

		</div>

	</div>

</article><!-- #post-## -->
