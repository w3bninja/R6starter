<div class="row">
<?php 
$args = array( 'post_type' => 'team', 'posts_per_page' => 10 );
$loop = new WP_Query( $args );
$i = 0;
while ( $loop->have_posts() ) : $loop->the_post();
	$img = get_cfc_field('team-details', 'team-thumbnail', $post->ID );
	if(!empty($img)){
		$tImg = wp_get_attachment_url($img);
	}else{
		$tImg =  get_bloginfo( 'template_url' ) . '/assets/img/x.png';
	}
	?>
	<div class="col-sm-3">
		<a href="#pop<?php echo $i; ?>" class="fancy">
			<img src="<?php echo $tImg; ?>" class="img-responsive">
			<h5><?php the_title(); ?></h5>
			<?php echo get_cfc_field('team-details', 'title', $post->ID );?>
			</a>
			<a href="<?php the_permalink() ?>" class="btn btn-primary">Full Page</a>
			<div id="pop<?php echo $i; ?>">
				<?php the_content(); ?>
			</div>
	</div>
<?php $i++; endwhile; ?>
</div>