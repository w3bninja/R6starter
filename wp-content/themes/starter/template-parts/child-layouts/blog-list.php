<?php 
if (empty($pageCount)) {
    $pageCount = 10;
}
 ?>
<h2>Recent Posts</h2>
<div class="row">





	
	<div class="col-sm-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<?php
						$args = array( 'numberposts' => '5', 'tax_query' => array(
								array(
									'taxonomy' => 'post_format',
									'field' => 'slug',
									'terms' => 'post-format-aside',
									'operator' => 'NOT IN'
								), 
								array(
									'taxonomy' => 'post_format',
									'field' => 'slug',
									'terms' => 'post-format-image',
									'operator' => 'NOT IN'
								)
						) );
					?>
					<?php
						$recent_posts = wp_get_recent_posts( $args );
						foreach( $recent_posts as $recent ){
					?>
					<?php echo '<a href="' . get_permalink($recent["ID"]) . '">' .   ( __($recent["post_title"])).'</a><br>' .   ( __($recent["post_excerpt"])).''; ?>
					<div class="panel-footer">
						<a href="<?php echo get_permalink($recent["ID"]) ?>" class="btn btn-primary">Read More</a>
					</div>
					<?php
						}
						wp_reset_query();
					?>
				</div>
			
		</div>
	</div>
</div>