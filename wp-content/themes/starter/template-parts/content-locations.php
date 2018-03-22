<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package starter
 */

?>
<a href="/locations">Back to Locations</a>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php 
			$locationAddress1 = get_cfc_field('address-group', 'address-1', $post->ID );
			$locationAddress2 = get_cfc_field('address-group', 'address-2', $post->ID );
			$locationCity = get_cfc_field('address-group', 'city', $post->ID );
			$locationState = get_cfc_field('address-group', 'state', $post->ID );
			$locationZip = get_cfc_field('address-group', 'postal-code', $post->ID );
			$fullAddress = $locationAddress1 . '' . $locationAddress2 . ', ' . $locationCity . ', ' . $locationState . ', ' . $locationZip;
		?>
		
		<h3>Static</h3>
		<?php $mapType = 1; include(locate_template('inc/map.php')); ?>
		<h3>Interactive</h3>
		<?php $mapType = 2; include(locate_template('inc/map.php')); ?>
		<h3>Custom</h3>
		<?php $mapType = 4; include(locate_template('inc/map.php')); ?>

		<?php echo $fullAddress ?>
		
		
		
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'starter' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'starter' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
