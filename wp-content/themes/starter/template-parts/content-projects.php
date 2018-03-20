<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package starter
 */

?>

<a href="/projects">Back to Projects</a>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<div class="row">
			<div class="col-sm-6">
			<?php foreach( get_cfc_meta( 'project-photos-group' ) as $key => $value ){ ?>
				<?php $img = get_cfc_field( 'project-photos-group','project-photo', false, $key ); ?>
				<img src="<?php echo $img['url']; ?>" class="img-responsive">
				<?php echo get_cfc_field('project-photos-group', 'project-photo-description', false, $key ); ?>
			<?php }  ?>
			</div>
			<div class="col-sm-6">
				Services: <?php $dashed = false; include(locate_template('inc/post-category.php')); ?>
				<hr>
				Details:<?php the_content(); ?>
			</div>
		</div>
		
		
		<?php
			
			
			

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
