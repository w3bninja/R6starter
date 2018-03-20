<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
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


<?php if( is_front_page() ) { ?>
	<?php
		$pageCount = 1;
		include(locate_template('template-parts/child-layouts/services-list.php'));
	?>
<?php } ?>

<?php if (is_page('services')) {?>
	<?php include(locate_template('template-parts/child-layouts/services-list.php')); ?>
<?php } elseif (is_page('faq')) { ?>
	questions
<?php } elseif (is_page('projects')) { ?>

	
	<?php include(locate_template('inc/post-type-categories.php')); ?>
	<?php include(locate_template('template-parts/child-layouts/project-list.php')); ?>
<?php } elseif (is_page('our-team')) { ?>
	<?php include(locate_template('template-parts/child-layouts/team-list.php')); ?>
<?php } elseif (is_page('contact-us')) { ?>
	<?php include(locate_template('template-parts/child-layouts/location-list.php')); ?>
<?php } ?>


