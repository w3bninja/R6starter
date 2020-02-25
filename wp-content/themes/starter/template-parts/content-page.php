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
		$pageCount = 3;
		include(locate_template('template-parts/child-layouts/services-list.php'));
	?>
	<hr>
	<?php include(locate_template('template-parts/child-layouts/blog-list.php')); ?>
<?php } ?>

<?php if (is_page('services')) {?>
	<?php include(locate_template('template-parts/child-layouts/services-list.php')); ?>
<?php } elseif (is_page('faq')) { ?>
	<?php include(locate_template('template-parts/child-layouts/faq-list.php')); ?>
<?php } elseif (is_page('projects')) { ?>
	<?php include(locate_template('inc/post-type-categories.php')); ?>
	<?php include(locate_template('template-parts/child-layouts/project-list.php')); ?>
<?php } elseif (is_page('our-team')) { ?>
	<?php include(locate_template('template-parts/child-layouts/team-list.php')); ?>
<?php } elseif (is_page('contact-us')) { ?>
<?php include(locate_template('inc/settings.php')); ?>
	<h5>Our Location</h5>
	<div class="contact-info">
		<address>
		<?php echo $address1; ?><?php echo $address2; ?><br>
		<?php echo $city; ?>, <?php echo $state; ?>. <?php echo $zip; ?>
		</address>

		Call Us Today!<br>
		<h5><?php echo $phone; ?></h5>
		<hr>
		<?php include(locate_template('inc/social-icons.php')); ?>
	</div>
<?php } elseif (is_page('maps')) { ?>
	<?php
		include(locate_template('inc/settings.php'));
		$fullAddress = $address1 . '' . $address2 . ',' . $city . ', ' . $state . ', ' . $zip;
	?>
		
		<h3>Static</h3>
		<?php $mapType = 1; include(locate_template('inc/map.php')); ?>
		<h3>Interactive</h3>
		<?php $mapType = 2; include(locate_template('inc/map.php')); ?>
		<h3>Multiple</h3>
		<?php $mapType = 5; include(locate_template('inc/map.php')); ?>
<?php } elseif (is_page('locations')) { ?>
	<?php $mapType = 5; include(locate_template('inc/map.php')); ?>

	<?php include(locate_template('template-parts/child-layouts/location-list.php')); ?>
<?php } ?>




