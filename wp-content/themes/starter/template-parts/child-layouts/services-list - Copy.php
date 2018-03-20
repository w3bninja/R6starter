<?php 
if (empty($pageCount)) {
    $pageCount = 10;
}
 ?>
<div class="row">
   <?php 
	$args = array( 'post_type' => 'services', 'posts_per_page' => $pageCount );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		$img = get_cfc_field('service-group', 'thumbnail', $post->ID );
		?>
		<div class="col-sm-4">
			<div class="panel panel-default">
				<img src="<?php echo $img['url']; ?>" class="img-responsive">
				<div class="panel-body">
					<?php
					the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
					the_content();
					?>
				</div>
				<div class="panel-footer">
					<a href="<?php the_permalink() ?>" class="btn btn-primary">Read More</a>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
</div>