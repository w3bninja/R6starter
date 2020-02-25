<?php 
if (empty($pageCount)) {
    $pageCount = 100;
}
 ?>
<div class="row">
   <?php 
	$args = array( 'post_type' => 'locations', 'posts_per_page' => $pageCount );
	$loop = new WP_Query( $args );
	
	while ( $loop->have_posts() ) : $loop->the_post();
		$locationAddress1 	= get_cfc_field('location-group', 'location-address-1', $post->ID );
		$locationAddress2 	= get_cfc_field('location-group', 'location-address-2', $post->ID );
		$locationCity 		= get_cfc_field('location-group', 'location-city', $post->ID );
		$locationZip 		= get_cfc_field('location-group', 'location-postal-code', $post->ID );
		$locationLat = get_cfc_field('location-group', 'location-latitude', $post->ID );
		$locationLong = get_cfc_field('location-group', 'location-longitude', $post->ID );
		$fullAddress = $locationAddress1 . '' . $locationAddress2 . ', ' . $locationCity . ', ' . $locationState . ', ' . $locationZip;
		?>
		<div class="col-sm-12 item">
			
			<div class="row">
				<div class="col-sm-4">
					<?php $mapType = 1; include(locate_template('inc/map.php')); ?>
				</div>
				<div class="col-sm-8">
					<?php
					the_title( '<h4><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
					the_content();
					?>
					<?php echo $fullAddress ?>
					<br>
					<a href="<?php the_permalink() ?>" class="btn btn-primary">Read More</a>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
</div>