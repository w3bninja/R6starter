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
		$img = get_cfc_field('project-photos-group', 'project-photo', $post->ID );
		$locationAddress1 = get_cfc_field('address-group', 'address-1', $post->ID );
		$locationAddress2 = get_cfc_field('address-group', 'address-2', $post->ID );
		$locationCity = get_cfc_field('address-group', 'city', $post->ID );
		$locationState = get_cfc_field('address-group', 'state', $post->ID );
		$locationZip = get_cfc_field('address-group', 'postal-code', $post->ID );
		$fullAddress = $locationAddress1 . '' . $locationAddress2 . ', ' . $locationCity . ', ' . $locationState . ', ' . $locationZip;
		$fullAddressMapFormat = strtolower(str_replace(' ', '+', $fullAddress));
		?>
		<div class="col-sm-12 item">
			<div class="panel panel-default">
				<div class="panel-body">
					<?php
					the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
					the_content();
					?>
					<hr>
					<?php echo $fullAddress ?>
					<hr>
					<div class="text-right">
						<a href="<?php echo 'https://www.google.com/maps/dir//' . $fullAddressMapFormat ?>/" target="_blank"><small>Get Directions</small></a>
					</div>
					<hr>
						Static Map
					<img src="<?php echo 'http://maps.googleapis.com/maps/api/staticmap?center=' . $fullAddressMapFormat . '&zoom=15&scale=false&size=300x200&maptype=roadmap&format=png&visual_refresh=true&markers=size:mid%7Ccolor:0xff0000%7Clabel:%7C' . $fullAddressMapFormat ?>" class="img-responsive">
					
						Interactive Map
						<iframe src="<?php echo 'http://maps.google.com/maps?q=' . $fullAddressMapFormat . '&output=embed' ?>" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
						
					</div>
				</div>
				<div class="panel-footer">
					<a href="<?php the_permalink() ?>" class="btn btn-primary">Read More</a>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
</div>