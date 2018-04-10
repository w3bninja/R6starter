<div class="row">
<?php 
$args = array( 'post_type' => 'team', 'posts_per_page' => 10 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
	$img = get_cfc_field('team-details', 'team-thumbnail', $post->ID );
	?>
	<div class="col-sm-4">
		<div class="panel panel-default">
			<img src="<?php echo $img['url']; ?>" class="img-responsive">
			<div class="panel-body">
				<?php
				the_title( '<h4><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
				the_content();
				?>
				<?php echo get_cfc_field('team-details', 'title', $post->ID );?>
			</div>
			<div class="panel-footer">
				<a href="<?php the_permalink() ?>" class="btn btn-primary">Read More</a>
			</div>
		</div>
	</div>
<?php endwhile; ?>
</div>